<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');


class TravelhopeFlights extends MX_Controller {

    const Module = "TravelhopeFlights";
    private $config = [];

    public function __construct() 
	{
		parent :: __construct();
		$chk = $this->App->service('ModuleService')->isActive(self::Module);
        if (!$chk) {
            Error_404($this);
        }

        modules::load('Front');
        $this->data['lang_set'] = $this->session->userdata('set_lang');
        $this->data['phone'] = $this->load->get_var('phone');
        $this->data['contactemail'] = $this->load->get_var('contactemail');
        $defaultlang = pt_get_default_language();
        if (empty($this->data['lang_set'])) {
          $this->data['lang_set'] = $defaultlang;
        }
        $this->lang->load("front", $this->data['lang_set']);
        $this->data['appModule'] = self::Module;

        $this->load->library('TravelhopeFlights/ApiClient');
        $this->load->library('Model/SearchForm');
        $this->load->library('Hotels/Hotels_lib');
        $this->load->model('TravelhopeFlights/BookinngEngineBookings');
        $this->config = $this->App->service('ModuleService')->get(self::Module)->apiConfig;
    }

    public function index()
    {
        redirect('/');
    }

    /**
     * @param mixed ...$args
     */
    public function search(...$args)
    {
        $thfBooking = new BookinngEngineBookings();
        $session_key = time();
        $thfBooking->setSessionKey($session_key);
        $this->session->set_userdata('kiwi_local_session_key', $session_key);

        $searchForm = new SearchForm();
        $searchForm->parseUriString($args);
        $searchForm->ota_id = $this->config->ota_id;
        $searchForm->currency = $this->Hotels_lib->currencycode;

        $this->session->set_userdata('searchfilghtsQuery', $args);

        $thfBooking->setSearchRequest(json_encode($searchForm));
        $thfBooking->setOrigin($searchForm->from_code);
        $thfBooking->setDestination($searchForm->to_code);
        $thfBooking->setDepartureDate($searchForm->date_from);
        $thfBooking->setArrivalDate($searchForm->return_from);
        $thfBooking->setAdults($searchForm->adults);
        $thfBooking->setChildren($searchForm->children);
        $thfBooking->setInfants($searchForm->infants);

        $thope = new ApiClient($this->config);
        $response = $thope->sendRequest('GET', 'search', $searchForm);

        $thfBooking->setSearchResponse('');
        $thfBooking->save();

        $data['flights']  = json_decode($response, true );
        $this->session->set_userdata('flights', $data['flights']);
    
        $data['thfSearchForm'] = $searchForm;
        $data["payload"] = $args;
        $data['pageTitle'] = count($data['flights']['data']).' Travel Hope Flights' ;

        $this->theme->view('modules/travelhope_flight/listing', $data, $this);
    }

    public function checkout()
    {
        $thfBooking = new BookinngEngineBookings();
        $kiwi_local_session_key = $this->session->userdata('kiwi_local_session_key');
        $thfBooking->loadBySessionKey($kiwi_local_session_key);

        $payload = $this->input->post();

        if (empty($payload)) {
            redirect(site_url());
        }

        $this->load->model('Amadeus/Amadeus_model');
        $searchForm = new SearchForm();
        $searchForm->parseUriString(json_decode($this->input->post('payload')));
        $data["searchForm"] = $searchForm;
        $data['flight_id'] = $this->input->post('flight_id');
        $pnum = $data["searchForm"]->adults + $data["searchForm"]->children + $data["searchForm"]->infants;
        $params = array(
            'bnum' => $pnum,
            'pnum' => $pnum,
            'custom_payload' => array(
                'booking_token' => $this->input->post('booking_token'),
                'visitor_uniqeid' => $this->input->post('visitor_uniqid'),
            ),
            'flight_id' => $data['flight_id'],
            'adults' => $data["searchForm"]->adults,
            'children' => $data["searchForm"]->children,
            'infants' => $data["searchForm"]->infants,
            'ota_id' => $this->config->ota_id,
            'vendor' => 5
        );

        $thfBooking->setCheckoutRequest(json_encode($params));
        $thope = new ApiClient($this->config);
        file_put_contents(APPPATH . 'logs/kiwi/checkout_req.json', json_encode($params));
        $response = $thope->sendRequest('POST', 'details', json_encode($params), ["Content-Type:application/json"]);
        file_put_contents(APPPATH . 'logs/kiwi/checkout_resp.json', $response);
        $contents = json_decode($response);

        $data['api_response'] = $contents;
        if ($contents->status != 'error')
        {
            // Prepare response
            $itinrary = new stdClass();
            $itinrary->outbound = new stdClass();
            $itinrary->inbound = new stdClass();
            $itinrary->outbound->segments = array();
            $itinrary->inbound->segments = array();

            foreach ($contents->data->flights as $flight) {
                if ($flight->return == 0) {
                    array_push($itinrary->outbound->segments, $flight);
                } else if ($flight->return == 1) {
                    array_push($itinrary->inbound->segments, $flight);
                }
            }

            $contents->data->flights  = $itinrary;
            $contents->data->{"triptype"} = $searchForm->flight_type;

            // Fake data for pre-populate the checkout form, only in sandbox mode.
            $fakedata = new StdClass();
            $fakedata->sandbox_mode = 0;
            if ($fakedata->sandbox_mode) {
                $fakedata->sandbox_mode = 1;
                $fakedata->name = '';
                $fakedata->surname = '';
                $fakedata->email = '';
                $fakedata->phone_number = '';
                $fakedata->birthday = '';
                $fakedata->hold_bags = '1';
                $fakedata->nationality = '';
                $fakedata->card_number = '';
                $fakedata->expiration = '';
                $fakedata->cvv = '';
            }
            $data['fakedata'] = $fakedata;

            $data['params']       = $params;
            $data['passengers']   = array(
                'adults'   => $searchForm->adults,
                'children' => $searchForm->children,
                'infants'  => $searchForm->infants
            );
            $data['title']        = 'Flight Checkout';
            $data['payment_info'] = array(
                'flight_price' => $this->input->post( 'flight_price' ),
                'currency'     => $this->input->post( 'currency' )
            );
            $thfBooking->setCheckoutResponse(json_encode($contents->data));
            $thfBooking->setCurrency($contents->data->currency);
            $thfBooking->setTotal($contents->data->total);
            $thfBooking->setBookFee($contents->data->book_fee);
            $thfBooking->update();

            $data['dataAdapter'] = $contents->data;
            $data['active_tab']  = "flights";
            $data["payload"]     = $this->session->userdata('thflights_payload');
            $data['countries']   = $this->Amadeus_model->countries();
            $data['kiwi_local_session_key'] = $kiwi_local_session_key;

            $user_id = $this->session->userdata('pt_logged_customer');
            $data['userAuthorization'] = (isset($user_id) && ! empty($user_id)) ? 1 : 0;
        }
        $data['pageTitle'] = 'Booking';
        $this->theme->view('modules/travelhope_flight/checkout', $data, $this);
    }

    public function flight_recheck()
    {
        $kiwi_local_session_key = $this->input->post('kiwi_local_session_key');
        $thfBooking = new BookinngEngineBookings();
        $thfBooking->loadBySessionKey($kiwi_local_session_key);
        //dd($thfBooking);
        $thope = new ApiClient($this->config);
        $response = $thope->sendRequest('POST', 'details', $thfBooking->getCheckoutRequest(), ["Content-Type:application/json"]);
        $contents  = json_decode($response);
        //dd( $contents);

        $is_flight_valid = 0;
        if ($contents->data->flights_checked == true && $contents->data->flights_invalid == false) {
            $is_flight_valid = 1;
        }

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode([
            'is_flight_valid' => $is_flight_valid
        ]));
    }

    function filter()
    {
        $response = $this->session->userdata( 'flights' );

        $post     = $this->input->post();

        $price = explode( ",", $post['price'] );
        $min   = $price[0];
        $max   = $price[1];
        $all   = [];

        if ( ! empty( $post['flights'] ) && ! empty( $post['stop'] ) ) {
            foreach ( $response['data'] as $value ) {
                $stops_return = 0;
                $stops        = 0;
                $airline      = array();

                foreach ( $value['route'] as $route ) {
                    if ( $route['return'] == 1 ) {
                        $stops_return ++;
                        if ( ! in_array( $route['airline'], $airline ) ) {
                            array_push( $airline, $route['airline'] );
                        }
                    } else {
                        if ( ! in_array( $route['airline'], $airline ) ) {
                            array_push( $airline, $route['airline'] );
                        }
                        $stops ++;
                    }
                }
                if ( $stops_return == 0 ) {
                    $stops_array = array( $stops );
                } else {
                    $stops_array = array( $stops, $stops_return );
                }
                if ( ! empty( array_intersect( $stops_array, $post['stop'] ) ) && ! empty( array_intersect( $airline, $post['flights'] ) ) && $value['flight_price'] >= $min && $value['flight_price'] <= $max ) {
                    $all[] = $value;
                }
            }
        } else if ( ! empty( $post['flights'] ) ) {
            foreach ( $response['data'] as $value ) {
                $stops_return = 0;
                $stops        = 0;
                $airline      = array();
                foreach ( $value['route'] as $route ) {
                    if ( $route['return'] == 1 ) {
                        $stops_return ++;
                        if ( ! in_array( $route['airline'], $airline ) ) {
                            array_push( $airline, $route['airline'] );
                        }
                    } else {
                        if ( ! in_array( $route['airline'], $airline ) ) {
                            array_push( $airline, $route['airline'] );
                        }
                        $stops ++;
                    }
                }
                if ( ! empty( array_intersect( $airline, $post['flights'] ) ) && $value['flight_price'] >= $min && $value['flight_price'] <= $max ) {
                    $all[] = $value;
                }
            }
        } else if ( ! empty( $post['stop'] ) ) {
            foreach ( $response['data'] as $value ) {
                $stops_return = 0;
                $stops        = 0;
                $airline      = array();
                foreach ( $value['route'] as $route ) {
                    if ( $route['return'] == 1 ) {
                        $stops_return ++;
                        if ( ! in_array( $route['airline'], $airline ) ) {
                            array_push( $airline, $route['airline'] );
                        }
                    } else {
                        if ( ! in_array( $route['airline'], $airline ) ) {
                            array_push( $airline, $route['airline'] );
                        }
                        $stops ++;
                    }
                }
                if ( $stops_return == 0 ) {
                    $stops_array = array( $stops );
                } else {
                    $stops_array = array( $stops, $stops_return );
                }
                if ( ! empty( array_intersect( $stops_array, $post['stop'] ) ) && $value['flight_price'] >= $min && $value['flight_price'] <= $max ) {
                    $all[] = $value;
                }
            }
        } else {
            foreach ( $response['data'] as $value ) {
                $count = count( $value['route'] );
                if ( $value['flight_price'] >= $min && $value['flight_price'] <= $max ) {
                    $all[] = $value;
                }
            }
        }
        $data['stops'] = $stops;
        $data['flights'] = $all;
        $this->theme->partial( 'modules/travelhope_flight/partials/flights_filter', $data );
    }

    public function booking()
    {
        $user_id = $this->session->userdata('pt_logged_customer');
        $kiwi_local_session_key = $this->session->userdata('kiwi_local_session_key');

        $thfBooking = new BookinngEngineBookings();
        $thfBooking->loadBySessionKey($kiwi_local_session_key);
        $thfBooking->setUserId($user_id);

        $payload = $this->input->post();
        $dataAdapter = json_decode($payload['dataAdapter']);
        $passengers = $this->parsePassengers($payload);

        if ($this->config->api_environment == 'sandbox') {
            $passengers['adults'][0]['name'] = 'test';
            $passengers['adults'][0]['surname'] = 'test';
        }

        file_put_contents(APPPATH.'logs/kiwi/checkout_form.json', json_encode($payload));

        $this->load->library('Model/Booking');
        $booking = new Booking();
        $booking->setCustomPayload($dataAdapter->custom_payload);
        $booking->setFlightId($payload['flight_id']);
        $booking->setAccount([
            'title' => $passengers['adults'][0]['title'],
            'first_name' => $passengers['adults'][0]['name'],
            'last_name' => $passengers['adults'][0]['surname'],
            'email' => $passengers['adults'][0]['email'],
            'mobile_code' => substr($passengers['adults'][0]['phone'], 0, 2),
            'number' => $passengers['adults'][0]['phone'],
        ]);
        $booking->setAdults($passengers['adults']);
        $booking->setChildren($passengers['children']);
        $booking->setInfants($passengers['infants']);
        $booking->setPaymentDetails([
            'name_card' => $payload['name_card'],
            'card_no' => $payload['card_no'],
            'month' => $payload['month'],
            'year' => $payload['year'],
            'security_code' => $payload['security_code']
        ]);
        $flightData = $this->getFlightData($dataAdapter);
        $booking->setFlightData($flightData);
        $booking->setVoucher(0);
        $booking->setOtaId($this->config->ota_id);
        $booking->setVendor(5);
        $booking->setIpAddress('127.0.0.1');

        file_put_contents(APPPATH.'logs/kiwi/booking_payload.json', $booking->toJson());
        $thfBooking->setBookingRequest($booking->toJson());

        $thope = new ApiClient($this->config);
        $response = $thope->sendRequest('POST', 'booking', $booking->toJson(), ["Content-Type:application/json"]);

        file_put_contents(APPPATH.'logs/kiwi/booking_response.json', $response);
        $thfBooking->setBookingResponse($response);
        $response = json_decode($response);

        if (! empty($response->booking_id)) {
            // log response in db.
            $thfBooking->setBookingId($response->booking_id);
        }
        $thfBooking->update();
        $response->{'invoice_url'} = base_url("thflights/invoice/{$thfBooking->getId()}?n=y");

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($response));
    }

    private function parsePassengers($payload)
    {
        $passenger['adults'] = array();
        $passenger['children'] = array();
        $passenger['infants'] = array();

        for ($index = 0; $index < count($payload['title']); $index++)
        {
            $category = $payload['category'][$index];
            array_push($passenger[$category], array(
                'title' => $payload['title'][$index],
                'name' => $payload['name'][$index],
                'surname' => $payload['surname'][$index],
                'email' => $payload['email'][$index],
                'phone' => $payload['phone'][$index],
                'birthday' => $payload['birthday'][$index],
                'expiration' => $payload['expiration'][$index],
                'cardno' => $payload['cardno'][$index],
                'nationality' => $payload['nationality'][$index],
//                'hold_bags' => $payload['hold_bags'][$index],
                'hold_bags' => 1,
                'category' => $category,
            ));
        }

        return $passenger;
    }

    private function getFlightData($dataAdapter)
    {
        $flightData = array();
        foreach (['outbound', 'inbound'] as $segment_type)
        {
            foreach ($dataAdapter->flights->{$segment_type}->segments as $segment)
            {
                array_push($flightData, array(
                    "operating_airline_iata" => $segment->operating_airline->iata,
                    "operating_airline_name" => $segment->operating_airline->name,
                    "from_city" => $segment->from_city,
                    "from_code" => $segment->from_code,
                    "to_code" => $segment->to_code,
                    "departure_time" => $segment->departure_time,
                    "to_city" => $segment->to_city,
                    "arrival_time" => $segment->arrival_time,
                    "price" => $dataAdapter->total,
                    "flight_id" => $segment->flight_id,
                    "timestamp" => time(),
                    "to_country" => $segment->to_country,
                    "from_country" => $segment->from_country,
                    "to_station" => $segment->to_station,
                    "from_station" => $segment->from_station,
                    "flight_no" => $segment->flight_no
                ));
            }
        }

        return $flightData;
    }
}
