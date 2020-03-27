<?php
header('Access-Control-Allow-Origin: *');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . 'modules/Api/libraries/REST_Controller.php';
class Travelhope_flights extends REST_Controller {
    const Module = "TravelhopeFlights";
    private $config = [];
    function __construct() {
        // Construct our parent class
        parent :: __construct();

        if(!$this->isValidApiKey){
            $this->response($this->invalidResponse, 400);
        }
        /*Load Library and Model*/
        $this->load->library('TravelhopeFlights/ApiClient');
        $this->load->library('TravelhopeFlights/Model/SearchForm');
        $this->load->library('Hotels/Hotels_lib');
        $this->load->model('TravelhopeFlights/BookinngEngineBookings');
        $this->config = $this->App->service('ModuleService')->get(self::Module)->apiConfig;
        $this->output->set_content_type('application/json');
    }

    /*Travel Hope Flights Get all Data List */
    public function search_post()
    {
        $thfBooking = new BookinngEngineBookings();
        $milliseconds = round(microtime(true) * 1000);
        $thfBooking->setSessionKey($milliseconds);
        $searchForm = new SearchForm();
        $searchForm->ota_id = $this->config->ota_id;
        $searchForm->currency = $this->Hotels_lib->currencycode;

        $searchForm->from_code = $this->post('from_code');
        $searchForm->to_code = $this->post('to_code');
        $searchForm->date_from = $this->post('date_from');
        $searchForm->return_from = $this->post('return_from');
        $searchForm->adults = $this->post('adults');
        $searchForm->children = $this->post('children');
        $searchForm->infants = $this->post('infants');
        $searchForm->flight_type = $this->post('flight_type');
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


        if (!empty ($response)) {
        echo  $response;
        }else{

        $this->response(array('response' => '', 'error' => array('status' => FALSE,'msg' => 'Record not found')), 200);

        }
    }

    /*Travel Hope Flights Detail Api*/
    public function detail_post(){
        $getdetail = $this->post();
        $getdetail['ota_id'] = $this->config->ota_id;
        $thope = new ApiClient($this->config);
        $response = $thope->sendRequest('POST', 'details', json_encode($getdetail), ["Content-Type:application/json"]);
        $contents = $response;
        echo  $contents;
    }

    /*Travel Hope Flights Booking*/
    public function booking_post(){


        $this->load->library('TravelhopeFlights/Model/Booking');
        $booking = new Booking();
        $booking->setCustomPayload($this->post('custom_payload'));
        $booking->setFlightId($this->post('flight_id'));
        $booking->setAccount($this->post('account'));
        $booking->setAdults($this->post('adults'));
        $booking->setChildren($this->post('children'));
        $booking->setInfants($this->post('infants'));
        $booking->setPaymentDetails($this->post('payment_details'));

        $flightData = $this->post('flight_data');
        $booking->setFlightData($flightData);
        $booking->setVoucher(0);
        $booking->setOtaId($this->config->ota_id);
        $booking->setVendor(5);
        $booking->setIpAddress('127.0.0.1');


        $thope = new ApiClient($this->config);
        $response = $thope->sendRequest('POST', 'booking', $booking->toJson(), ["content-Type:application/json"]);

        echo  $response;
    }
}