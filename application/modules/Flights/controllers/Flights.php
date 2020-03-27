<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Flights extends MX_Controller {

    public function __construct() 
	{
		parent :: __construct();

		$chk = modules::run('Home/is_main_module_enabled', 'flights');

		if ( ! $chk ) { Module_404(); }

		// For contact detail display in header.
		$this->data['phone'] = $this->load->get_var('phone');
		$this->data['contactemail'] = $this->load->get_var('contactemail');

		$this->data['usersession'] = $this->session->userdata('pt_logged_customer');
		$this->data['appModule'] = "flights";
        $this->load->library('Flights/Flights_lib');
        $this->data['flight_lib'] = $this->Flights_lib;

		$languageid = $this->uri->segment(2);
		$this->validlang = pt_isValid_language($languageid);

		if( $this->validlang ) {
			$this->data['lang_set'] =  $languageid;
		} else {
			$this->data['lang_set'] = $this->session->userdata('set_lang');
		}

		$defaultlang = pt_get_default_language();
		if ( empty($this->data['lang_set']) ) {
			$this->data['lang_set'] = $defaultlang;
		}

		// For menu `HOME` and `My Account` link in header.
		$this->lang->load("front", $this->data['lang_set']);

		$user_id = $this->session->userdata('pt_logged_customer');
		$this->data['userAuthorization'] = (isset($user_id) && ! empty($user_id)) ? 1 : 0;

		$this->data['pageTitle'] = "Flights List";
    }

    public function index()
    {
        $this->theme->view('modules/flights/flight_listing', $this->data, $this);

    }
    public function faq()
    {
        $this->theme->view('modules/flights/faq', $this->data, $this);
    }
	public function jobs()
    {
        $this->theme->view('modules/flights/jobs', $this->data, $this);
    }
    public function bookingstatus()
    {


        if(isset($_GET['booking_number']) && isset($_GET['last_name'])) 
        {
            $booking_id = $_GET['booking_number'];
            $this->load->model('Flights_model');

            $booking_data = $this->Flights_model->get_booking_for_status($booking_id,$_GET['last_name']);
            $billing_data = $this->Flights_model->get_billing_for_payment($booking_id);
            $pass_data = $this->Flights_model->get_passengerData($booking_id);
            $segments_data = $this->Flights_model->get_segmentsData($booking_id);

            $this->data['booking_data'] = $booking_data;
            $this->data['billing_data'] = $billing_data;
            $this->data['pass_data'] = $pass_data;
            $this->data['segments_data'] = $segments_data;
        }
        $this->theme->view('modules/flights/booking_status', $this->data, $this);
    }
    public function search()
    {
        $this->load->model('Flights/Flights_model');
        $discounts = $this->Flights_model->getDiscounts();
        $uri = $this->uri->uri_string();
        $payload = explode("/", $uri);
        if(($uri != "flights" ) && ($payload[1] != "0")) {
            $payload = explode("/", $uri);

            if ($this->input->get('p')) {
                $page = $this->input->get('p');
            } else {
                $page = 1;
            }
            $this->load->library('session');
            $searchManualQuery = [];
            $searchManualQuery['destination'] = $payload[2];
            $searchManualQuery['origin'] = $payload[1];
            $searchManualQuery['departure'] = $payload[3];
            if ($payload[4] != 0) {
                $searchManualQuery['arrival'] = $payload[4];
            }
            $searchManualQuery['cabinclass'] = $payload[6];
            $searchManualQuery['triptype'] = $payload[5];
            $searchManualQuery['passenger'] = array(
                'total' => $payload[9] + $payload[8] + $payload[7],
                'adult' => $payload[7],
                'children' => $payload[8],
                'infant' => $payload[9]
            );
            $this->session->set_userdata('searchManualQuery', $searchManualQuery);
            $result = $this->Flights_model->get_route($payload,0,0,app()->service("ModuleService")->get('flights')->test);
            if(empty($result) && app()->service("ModuleService")->get('flights')->test == "true")
            {
                $result = $this->Flights_model->get_route($payload,0,0,app()->service("ModuleService")->get('flights')->test);

            }
            $this->load->library('pagination');
            $config['base_url'] = base_url().implode("/",$payload);
            $config['total_rows'] = count($result);
            $config['use_page_numbers'] = TRUE;

            if($payload[5] == "round") {
                $config['per_page'] = 20*2;
            }
            else {
                $config['per_page'] = 20;
            }

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";

            $config["uri_segment"] = 14;
            $config['page_query_string'] = true;
            $config['query_string_segment'] = 'p';

            $config['attributes'] = array('class' => 'page-link');
            $this->pagination->initialize($config);
            $limit = $config['per_page'];

            $offset = ($page-1) *$limit;
            $str_links = $this->pagination->create_links();
            $str_links =  str_replace("&amp;","?",$str_links);
            $data["links"] =  explode('&nbsp;',$str_links );

            $data['result'] = $this->Flights_model->get_route($payload, $limit, $offset,app()->service("ModuleService")->get('flights')->test);
            $dataset = $this->Flights_model->get_airlines($payload,app()->service("ModuleService")->get('flights')->test);


        }else{

            if(count($payload) == 1) {

                $payload = ["flights",0,0,0,0,0,0,1,0,0,0,0,0];

            }
            $data["links"] = $this->pagination->create_links();
            $data["links"] =  str_replace("&amp;","?",$data["links"]);
            $dataset = $this->Flights_model->get_airlines_all($payload,app()->service("ModuleService")->get('flights')->test);
            $data['result'] = $this->Flights_model->get_route_all($payload,app()->service("ModuleService")->get('flights')->test);

        }
            $Airlines = [];
            $carriers = [];
            for($i = 13; $i<=count($payload);$i++)
            {
                array_push($carriers,str_replace('-',' ',$payload[$i]));
            }

            foreach ($dataset as &$res)
            {
                $res = (array) $res;
                if(in_array($res['name'], $carriers)) {
                    $res['check'] = true;
                } else {
                    $res['check'] = false;
                }
                $res = (object) $res;
                array_push($Airlines, $res);
            }
            $data['airlines'] = $Airlines;
            $data['payload'] = $payload;
            $data['discount'] = $discounts[0]->discount;
            $data['searchManualQuery'] = $searchManualQuery;
            $this->theme->view('modules/flights/flight_listing', $data, $this);


    }
    function addBilling()
    {
        session_start();
        $this->load->model('Flights/Flights_model');

        $this->Flights_model->add_flights_billing();
    }
    function updateBilling()
    {
        session_start();
        $this->load->model('Flights/Flights_model');

        $this->Flights_model->update_flights_billing();
    }
    
    function bookingconfirm()
    {
        $booking_id = $_GET['booking_id'];
        $uri = $this->uri->uri_string();
        $payload = explode("/", $uri);
        $this->load->library('session');
        $result = $this->Flights_model->get_aeroimg(str_replace("-"," ",$payload[6]));
        
        $result->tax = $taxpay*$price;
        $result->deposite = $depositepay*($price+$result->tax);
        $result->total_price = $price+$result->tax;
        $result->adults = $payload[11];
        $result->id = $payload[3];

        $this->load->model('Flights_model');
        $booking_data = $this->Flights_model->get_booking_for_payment($booking_id);
        $billing_data = $this->Flights_model->get_billing_for_payment($booking_id);
        $pass_data = $this->Flights_model->get_passengerData($booking_id);
        $segments_data = $this->Flights_model->get_segmentsData($booking_id);

        $this->data['booking_data'] = $booking_data;
        $this->data['billing_data'] = $billing_data;
        $this->data['pass_data'] = $pass_data;
        $this->data['segments_data'] = $segments_data;

        
        $this->load->model('Admin/Emails_model');
        $this->Emails_model->SendConfirmationEmail($booking_data);
        
        $this->data["module"] = $result;
        $this->data["booking_id"] = $booking_id;
        $this->setMetaData($this->data['module']->title, $this->data['module']->metadesc, $this->data['module']->keywords);
        $this->theme->view('modules/flights/booking_confirm', $data, $this);
    }
    function bookingnotconfirm()
    {
        $booking_id = $_GET['booking_id'];
        $uri = $this->uri->uri_string();
        $payload = explode("/", $uri);
        $this->load->library('session');
        $result = $this->Flights_model->get_aeroimg(str_replace("-"," ",$payload[6]));
        
        $result->tax = $taxpay*$price;
        $result->deposite = $depositepay*($price+$result->tax);
        $result->total_price = $price+$result->tax;
        $result->adults = $payload[11];
        $result->id = $payload[3];
        $this->data["module"] = $result;
        $this->data["booking_id"] = $booking_id;
        $this->setMetaData($this->data['module']->title, $this->data['module']->metadesc, $this->data['module']->keywords);
        $this->theme->view('modules/flights/booking_not_confirm', $data, $this);
    }
    function paynow()
    {
        //print_r($_POST);
        session_start();
        // echo $_SESSION['single_ticket_price'];

        $this->load->model('Flights/Flights_model');
        $discounts = $this->Flights_model->getDiscounts();
        $booking_id = $this->Flights_model->add_flights_booking($_POST,round($_SESSION['single_ticket_price'],1));

        $_SESSION['booking_id'] = $booking_id;
        $_SESSION['POSTDATA'] = $_POST;

        $this->load->model('Admin/Payments_model');
        $paygateways = $this->Payments_model->getAllPaymentsBack();
        $this->data['msg'] = json_decode($this->Payments_model->getGatewayMsg($this->data['invoice']->paymethod, $this->data['invoice']));
        $this->data['paymentGateways'] = $paygateways['activeGateways'];
        $this->data['payOnArrival'] = $this->Payments_model->payOnArrivalIsActive($paygateways['activeGateways']);
        $singleGateway = $this->Payments_model->onlySinglePaymentGatewayActive($paygateways['activeGateways']);
        if ($singleGateway['status'] == "yes") {
          $this->data['singleGateway'] = $singleGateway['name'];
        }
        else {
          $this->data['singleGateway'] = "";
        }
      
//sort on basic of order
      usort($this->data['paymentGateways'],
      function ($a, $b) {
        return $a['order'] - $b['order'];
      }
      );
        $this->theme->view('Admin/modules/global/flight_pay', $data, $this);

    }
    function payagain()
    {
        //print_r($_POST);
        session_start();
        // echo $_SESSION['single_ticket_price'];

        $this->load->model('Flights/Flights_model');
        //$discounts = $this->Flights_model->getDiscounts();
        //$booking_id = $this->Flights_model->add_flights_booking($_POST,round($_SESSION['single_ticket_price'],1));
        $reject_status = $this->Flights_model->get_reject_booking_payment($_GET['bookingid']);
        
        if($reject_status[0]->reject_status<3 && $reject_status[0]->paidstatus=='unpaid')
        {
            $booking_id = $_GET['bookingid'];
            $reject_status[0]->reject_status++;
            $this->Flights_model->update_reject_booking_payment($_GET['bookingid'],$reject_status[0]->reject_status);
            $_SESSION['booking_id'] = $_GET['bookingid'];
            $booking_data = $this->Flights_model->get_booking_for_payment($booking_id);
            $billing_data = $this->Flights_model->get_billing_for_payment($booking_id);
            $pass_data = $this->Flights_model->get_passengerData($booking_id);
            $segments_data = $this->Flights_model->get_segmentsData($booking_id);

            $this->data['booking_data'] = $booking_data;
            $this->data['billing_data'] = $billing_data;
            $this->data['pass_data'] = $pass_data;
            $this->data['segments_data'] = $segments_data;

            $this->load->model('Admin/Payments_model');
            $paygateways = $this->Payments_model->getAllPaymentsBack();
            $this->data['msg'] = json_decode($this->Payments_model->getGatewayMsg($this->data['invoice']->paymethod, $this->data['invoice']));
            $this->data['paymentGateways'] = $paygateways['activeGateways'];
            $this->data['payOnArrival'] = $this->Payments_model->payOnArrivalIsActive($paygateways['activeGateways']);
            $singleGateway = $this->Payments_model->onlySinglePaymentGatewayActive($paygateways['activeGateways']);
            if ($singleGateway['status'] == "yes") {
              $this->data['singleGateway'] = $singleGateway['name'];
            }
            else {
              $this->data['singleGateway'] = "";
            }
          
    //sort on basic of order
          usort($this->data['paymentGateways'],
          function ($a, $b) {
            return $a['order'] - $b['order'];
          }
          );
            $this->theme->view('Admin/modules/global/flight_pay_again', $data, $this);

        }
        else
        {
            redirect("flights/bookingnotconfirm?booking_id=".$_GET['bookingid']."&reject=valid");
        }
        
        

        

    }
    function flightsbooking()
    {
        $uri = $this->uri->uri_string();
        $payload = explode("/", $uri);
        $this->load->library('session');
        $result = $this->Flights_model->get_aeroimg(str_replace("-"," ",$payload[6]));
        $discounts = $this->Flights_model->getDiscounts();
        $result->tax = $taxpay*$price;
        $result->deposite = $depositepay*($price+$result->tax);
        $result->total_price = $price+$result->tax;
        $result->adults = $payload[11];
        $result->id = $payload[3];
        $this->data["module"] = $result;
        $this->data["discounts"] = $discounts[0]->discount;
        $this->setMetaData($this->data['module']->title, $this->data['module']->metadesc, $this->data['module']->keywords);
        $this->theme->view('modules/flights/flightsbooking', $this->data, $this);
    }
    function book() {
        $uri = $this->uri->uri_string();
        $payload = explode("/", $uri);
        $this->load->model('Flights/Flights_model');
        $this->load->model('Admin/Countries_model');
        $this->data['allcountries'] = $this->Countries_model->get_all_countries();
        $this->load->library("Paymentgateways");
        $this->data['hideHeader'] = "1";
        $this->load->model('Admin/Payments_model');
        $result = $this->Flights_model->get_aeroimg(str_replace("-"," ",$payload[6]));
        $tax = $this->Flights_model->get_taxdeposite($payload[3]);
        $price = 0;
        foreach ($tax as $res)
        {
            $price  = $price + ($res->adults_price * $payload[4])+ ($res->child_price * $payload[5]) + ($res->infants_price * $payload[6]);
        }
        $date_time = array();
        foreach ($tax as $index=>$res)
        {
            $date_time_temp = array();
            $trans_locations = json_decode($res->transact);
            if($res->date_departure == "0000-00-00"){
             $date_departure = date("Y-m-d");
            }else{
                $date_departure = $res->date_departure;
            }
            $from_object = (object)["from_code"=>$res->from_code,"date"=>$date_departure,"time"=>$res->time_departure];
            array_push($date_time_temp,$from_object);

            for($j=0;$j<count($trans_locations);$j++)
            {
                    $date = json_decode($res->date_trans)[$j];
                    if (empty($date)) {
                        $date = date("Y-m-d", strtotime(($j + 1) . " day", strtotime(date('Y-m-d'))));
                    }
                    $from_object = (object)["from_code" => json_decode($trans_locations[$j])->code, "date" => $date, "time" => json_decode($res->time_trans)[$j]];
                    array_push($date_time_temp, $from_object);
            }
            if($res->date_arrival == "0000-00-00"){
                $date = date("Y-m-d",strtotime((count($trans_locations)+1)." day", strtotime(date("Y-m-d"))));
            }else{
                $date = $res->date_arrival;
            }
            $from_object = (object)["from_code"=>$res->to_code,"date"=>$date,"time"=>$res->time_departure];
            array_push($date_time_temp,$from_object);

            $date_time[$index] = $date_time_temp;
        }
        $this->data["date_time"] = $date_time_temp;
        $price = $this->Flights_lib->convertAmount($price);
        $taxpay = $tax[0]->tax/100;
        $depositepay = $tax[0]->deposite/100;
        $result->tax = $taxpay*$price;
        $result->deposite = $depositepay*($price+$result->tax);
        $result->total_price = $price+$result->tax;
        $result->adults = $payload[11];
        $result->id = $payload[3];
        $this->data["module"] = $result;
        $this->data["tax"] = $tax;
        $this->data["payload"] = $payload;
        $this->load->model('Admin/Accounts_model');
        $loggedin = $this->loggedin = $this->session->userdata('pt_logged_customer');
        $this->lang->load("front", $this->data['lang_set']);
        $this->data['profile'] = $this->Accounts_model->get_profile_details($loggedin);
        $this->setMetaData($this->data['module']->title, $this->data['module']->metadesc, $this->data['module']->keywords);
        $this->theme->view('booking', $this->data, $this);

    }

}