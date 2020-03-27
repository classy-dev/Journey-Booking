<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Creditcard extends MX_Controller {

  function __construct(){

    parent::__construct();
    if(empty($_POST)){
      exit;
    }


 }

 function flight_booking()
 {
    $settings = $this->Settings_model->get_settings_data();
  $this->load->helper('invoice');
  $this->load->model('Admin/Payments_model');
  $this->load->model('Flights/Flights_model');

  $gateway = $this->input->post('paymethod');

  $bookid = $this->input->post('bookingid');
  
  //$invoicdata = invoiceDetails($bookid,$ref);
  $bookingdata = $this->Flights_model->get_booking_for_payment($bookid);
  $billingdata = $this->Flights_model->get_billing_for_payment($bookid);
  

  require_once "./application/modules/Gateways/" . $gateway . ".php";
  $params = $this->Payments_model->getGatewayParams($gateway);

  $params['charset'] = "UTF-8";
  $params['invoiceid'] = $bookid;
  //$params['userid'] = $invoicdata->bookingUser;
  

  $params['firstname'] = $billingdata[0]->customerfirstname;
  $params['lastname'] = $billingdata[0]->customerlastname;
  $params['email'] = $billingdata[0]->email;
  $params['companyname'] = $settings[0]->site_title;
  //$params['invoiceref'] = $bookid;
  $params['amount'] = $bookingdata[0]->total_price;
  $params['currency'] = "USD";
  $params['cccvv'] = $this->input->post('cvv');
  $params['cardexp'] = $this->input->post('expMonth')."-".$this->input->post('expYear');
  $params['cardnum'] = $this->input->post('cardnum');
  //for stripe expiry year and month
  $params['expMonth'] = $this->input->post('expMonth');
  $params['address'] = $billingdata[0]->address;
  $params['city'] = $billingdata[0]->city;
  $params['zip'] = $billingdata[0]->zip;
  $params['state'] = $billingdata[0]->state;
  $params['country'] = $billingdata[0]->country;
  $params['expYear'] = $this->input->post('expYear');


/*echo "<pre>";
     print_r($params);
  echo "</pre>";
  exit;*/

  if (function_exists($gateway . "_capture")) {
      $msg = call_user_func($gateway . "_capture",$params);
    }
  print_r($msg);
    if($msg['status'] == "success"){
        $tran_id = '';
        if(isset($msg['transactionid']))
        {
            $tran_id = $msg['transactionid'];    
        }
        

        $this->Flights_model->update_booking_after_payment($bookid,$tran_id,$gateway);

        $this->load->model('Admin/Emails_model');

        $this->Emails_model->paid_sendEmail_customer($invoicdata);
        $this->Emails_model->paid_sendEmail_admin($invoicdata);
        $this->Emails_model->paid_sendEmail_supplier($invoicdata);
        $this->Emails_model->paid_sendEmail_owner($invoicdata);
        

        redirect("flights/bookingconfirm?booking_id=".$bookid);

    }else{
    $this->session->set_flashdata('invoiceerror',$msg['msg']);
    redirect("flights/bookingnotconfirm?booking_id=".$bookid);
    }

       
       //redirect("invoice?id=".$invoicdata->id."&sessid=".$invoicdata->code);

 }
 function index(){
  
  $settings = $this->Settings_model->get_settings_data();
  $this->load->helper('invoice');
  $this->load->model('Admin/Payments_model');

  $gateway = $this->input->post('paymethod');

  $bookid = $this->input->post('bookingid');
  $ref = $this->input->post('refno');
  $invoicdata = invoiceDetails($bookid,$ref);

  require_once "./application/modules/Gateways/" . $gateway . ".php";
  $params = $this->Payments_model->getGatewayParams($gateway);

  $params['charset'] = "UTF-8";
  $params['invoiceid'] = $invoicdata->id;
  $params['userid'] = $invoicdata->bookingUser;
  $params['firstname'] = $this->input->post('firstname');
  $params['lastname'] = $this->input->post('lastname');
  $params['email'] = $invoicdata->accountEmail;
  $params['companyname'] = $settings[0]->site_title;
  $params['invoiceref'] = $invoicdata->code;
  $params['amount'] = $invoicdata->checkoutAmount;
  $params['currency'] = $invoicdata->currCode;
  $params['cccvv'] = $this->input->post('cvv');
  $params['cardexp'] = $this->input->post('expMonth')."-".$this->input->post('expYear');
  $params['cardnum'] = $this->input->post('cardnum');
  //for stripe expiry year and month
  $params['expMonth'] = $this->input->post('expMonth');
  $params['expYear'] = $this->input->post('expYear');
/*echo "<pre>";
     print_r($params);
  echo "</pre>";
  exit;*/
  if (function_exists($gateway . "_capture")) {
      $msg = call_user_func($gateway . "_capture",$params);
    }


    if($msg['status'] == "success"){

      updateInvoiceStatus($invoicdata->id,$invoicdata->checkoutAmount,$msg['transactionid'],$gateway,"paid", $invoicdata->module,$invoicdata->checkoutTotal);

        $this->load->model('Admin/Emails_model');

        $this->Emails_model->paid_sendEmail_customer($invoicdata);
        $this->Emails_model->paid_sendEmail_admin($invoicdata);
        $this->Emails_model->paid_sendEmail_supplier($invoicdata);
        $this->Emails_model->paid_sendEmail_owner($invoicdata);

    }else{
    $this->session->set_flashdata('invoiceerror',$msg['msg']);

    }

       
       redirect("invoice?id=".$invoicdata->id."&sessid=".$invoicdata->code);

 }



}
