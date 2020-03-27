<?php 
    session_start(); 
    $single_ticket_price = $_SESSION['single_ticket_price'];
    $booking_id = $_SESSION['booking_id']; 
    $data = $_SESSION['POSTDATA']; 
    $adults = $data['adults'];
    $childs = $data['childs'];
    $infants = $data['infants'];
    $flight_type = $data['flight_type'];
    $customerfirstname = $data['customerfirstname'];
    $customermiddlename = $data['customermiddlename'];
    $customerlastname = $data['customerlastname'];
    $mobile = $data['mobile'];
    $email = $data['email'];
    $location_to = $data['location_to'];
    $location_from = $data['location_from'];
    $location_to_code = $data['location_to_code'];
    $location_from_code = $data['location_from_code'];
    $total_segments = $data['total_segments'];
    $cabin_type = $data['cabin_type_1'];
    $depart_date_1 = $data['depart_date_1'];
    $depart_time_1 = $data['depart_time_1'];

    $arrive_date_1 = $data['depart_date_1'];
    $arrive_time_1 = $data['depart_time_1'];
    
    $depart_date_2 = '';
    $depart_time_2 = '';

    $arrive_date_2 = '';
    $arrive_time_2 = '';
        
    $carrier_name_1 = $data['carrier_name_1'];
    $carrier_img_1 = $data['carrier_img_1'];
    $carrier_name_2 = '';
    $carrier_img_2 = '';
    $i=1;
    for(;$i<=$total_segments;$i++)
    {
        if($data['segment_type_'.$i]=="Outbound")
        {
            $arrive_date_1 = $data['arrive_date_'.$i];
            $arrive_time_1 = $data['arrive_time_'.$i];
        }
        
    }
    $i--;
    if($flight_type=='return')
    {
        $depart_date_2 = $data['depart_date_'.$i];
        $depart_time_2 = $data['depart_time_'.$i];
        
    }
    for($i=1;$i<=$total_segments;$i++)
    {
        
        if($data['segment_type_'.$i]=="Inbound")
        {
            $arrive_date_2 = $data['arrive_date_'.$i];
            $arrive_time_2 = $data['arrive_time_'.$i];
            $carrier_name_2 = $data['carrier_name_'.$i];
            $carrier_img_2 = $data['carrier_img_'.$i];
        }
    }


?>

<br><br>
<style>
    body { background:#eee}
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
        color: white !important;
        cursor: default;
        background: #76ce85;
    }
    .nav-tabs>li>a {
        background: rgba(0, 0, 0, 0.09);
        border-radius: 0px;
        color: #000 !important;
        padding: 10px;
        font-size: 14px;
    }

    .switch-ios.switch-light {
        margin-top: 5px !important;
    }

</style>

<style>
    .btn-circle {border-radius: 50%;font-size: 54px;padding: 10px 20px;}
</style>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
<link href="<?php echo base_url(); ?>themes/default/assets/css/flight_booking.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>themes/default/assets/css/passenger_booking.css" rel="stylesheet" type="text/css">
<style>
    .m-check-flight__e-point, .m-check-flight__m-dot, .m-check-flight__s-point
    {
        left: 0;
    }
    .m-book-summary-side {
        width: auto;
        float: none;
    }
    .m-check-flight__airport,
    .m-check-flight__airline
    {
        width: 50%;
    }
    .m-check-flight__transfer
    {
        width: 100%;
        margin-left: 0;
    }
    #FlightInfo,
    .m-book-summary-side
    {
            font-family: 'Josefin Sans', serif;
    }
    .m-check-travel__cityname
    {
            font-size: 24px;
    }
    .m-check-flight__s-line
    {
        display: none;
    }
    .m-check-flight__wrap
    {
        padding-left: 35px;
    }
    .m-check-flight__line
    {
        left: 15px;
    }
    .c-result-airline__logo
    {
            width: 50px;
        position: relative;
        display: inline-block;
        margin-top: 2px;
    }
    .m-check-flight__airline .c-result-airline__wrap
    {
            padding-left: 10px;
        position: relative;
        display: inline-block;
    }
    .m-book-summary-side .fn-stuck-menu
    {
        
        margin-bottom:20px;width: auto;
    }
    .c-result-airline
    {
        text-align: right;
    }
    @media(max-width: 1024px)
    {
        .m-check-flight__airport,
        .m-check-flight__airline
        {
            width: 35%;
        }
        .m-check-flight__airline
        {
            width: 65%;
        }
    }
    @media(max-width: 768px)
    {
        .m-check-travel a
        {
            position: relative;
            left: 0;
            top: 0;
        }
        .m-check-flight__duration
        {
            margin-top: 50px;
        }
        .c-result-airline__logo
        {
            width: 120px;
        }
    }
</style>




    <div class="container booking">
        <!-- Start Fail Result of Expedia booking for submit -->
        <?php if($result == "fail" && $appModule == "ean"){ ?>
            <div class="alert alert-danger wow bounce" role="alert">
                <p><?php echo $msg;?></p>
            </div>
        <?php } ?>
        <!-- End Fail Result of Expedia booking for submit -->
        <div class="container offset-0">
            <div class="loadinvoice">
                <div class="acc_section">
                    <!-- RIGHT CONTENT -->
                    
                    <div class="col-md-7 offset-0 go-right" style="margin-bottom:50px;">
                        <div class="clearfix"></div>
                        <div class="">
                            <div class="result"></div>
                            <?php if(!empty($error)){ ?>
                                <h1 class="text-center strong"><?php echo trans('0432');?></h1>
                                <h3 class="text-center"><?php echo trans('0431');?></h3>
                            <?php }else{ ?>
                            <!-- Start Other Modules Booking left section -->
                            <?php if($appModule != "ean") { ?>
                                
                                <style>
                                    .pure-checkbox
                                    {
                                        float: left;
                                        display: inline-block;
                                        margin-left: 15px;
                                    }
                                    .dobdate
                                    {
                                        cursor: pointer;
                                    }
                                    .pass_form
                                    {
                                        font-family: 'Josefin Sans', serif;
                                        padding: 15px 15px 20px;
                                        background: #fff;
                                        border-radius: 5px;
                                        box-shadow: 0px 2px 18px 8px rgba(0,0,0,0.1);
                                        margin:0 0 20px;
                                    }
                                    .select2-chosen
                                    {
                                            padding: 2px 0 0 10px !important;
                                            line-height: 35px !important;
                                    }
                                    .select2-container .select2-choice
                                    {
                                            padding: 0 !important;
                                            height: 35px !important;
                                    }
                                    .select2-container
                                    {
                                            padding: 0 !important;
                                            width: 100%;
                                            height: 40px !important;
                                    }
                                </style>
                                

                                                
                                                


                                                        <div class="collapse" id="pay">
                                                            <div class="well">



                                                            <div class="modal-header" style="margin-bottom: 0px;">
                                                            <h4 class="modal-title" id="myModalLabel"><?php echo trans('0377');?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form text-left">
                                                                <div class="form-group">
                                                                    <label for="form-input" class="hidden-xs col-sm-4 control-label text-left" style="padding: 5px; font-size: 24px;"><?php echo trans('0154');?>
                                                                        
                                                                    </label>
                                                                    <div class="col-sm-8 col-md-8 col-xs-12">
                                                                        <select class="form-control form selectx" name="gateway" id="gateway">
                                                                            <option value=""><?php echo trans('0159');?></option>
                                                                            <?php foreach ($paymentGateways as $pay) { if($pay['name'] != "payonarrival"){ ?>
                                                                            <option value="<?php echo $pay['name']; ?>" <?php makeSelected($invoice->paymethod, $pay['name']); ?> ><?php echo $pay['gatewayValues'][$pay['name']]['name']; ?></option>
                                                                            <?php } } ?>
                                                                        </select>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <center>
                                                                        <div  id="response"></div>
                                                                    </center>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="col-sm-12 creditcardform" >
                                                                    <form  role="form" action="<?php echo base_url();?>creditcard/flight_booking" method="POST">
                                                                        <fieldset>
                                                                            <div class="row">
                                                                                <div class="col-md-6  go-right" style="display: none">
                                                                                    <div class="form-group ">
                                                                                        <label class="required go-right"><?php echo trans('0171');?></label>
                                                                                        <input type="text" class="form-control" name="firstname" value="none" id="card-holder-firstname" placeholder="<?php echo trans('0171');?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6  go-left" style="display: none">
                                                                                    <div class="form-group ">
                                                                                        <label class="required go-right"><?php echo trans('0172');?></label>
                                                                                        <input type="text" class="form-control" name="lastname" value="none" id="card-holder-lastname" placeholder="<?php echo trans('0172');?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <div class="col-md-12  go-right">
                                                                                    <div class="form-group ">
                                                                                        <label class="required go-right"><?php echo trans('0316');?></label>
                                                                                        <input type="text" class="form-control" name="cardnum" id="card-number" placeholder="<?php echo trans('0316');?>" onkeypress="return isNumeric(event)" >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <div class="col-md-3 go-right">
                                                                                    <div class="form-group ">
                                                                                        <label style="font-size:13px"class="required  go-right"><?php echo trans('0329');?></label>
                                                                                        <select class="form-control col-sm-2" name="expMonth" id="expiry-month">
                                                                                            <option value="01"><?php echo trans('0317');?> (01)</option>
                                                                                            <option value="02"><?php echo trans('0318');?> (02)</option>
                                                                                            <option value="03"><?php echo trans('0319');?> (03)</option>
                                                                                            <option value="04"><?php echo trans('0320');?> (04)</option>
                                                                                            <option value="05"><?php echo trans('0321');?> (05)</option>
                                                                                            <option value="06"><?php echo trans('0322');?> (06)</option>
                                                                                            <option value="07"><?php echo trans('0323');?> (07)</option>
                                                                                            <option value="08"><?php echo trans('0324');?> (08)</option>
                                                                                            <option value="09"><?php echo trans('0325');?> (09)</option>
                                                                                            <option value="10"><?php echo trans('0326');?> (10)</option>
                                                                                            <option value="11"><?php echo trans('0327');?> (11)</option>
                                                                                            <option value="12"><?php echo trans('0328');?> (12)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 go-left">
                                                                                    <div class="form-group">
                                                                                        <label class="required go-right">&nbsp;</label>
                                                                                        <select class="form-control" name="expYear" id="expiry-year">
                                                                                            <?php for($y = date("Y");$y <= date("Y") + 10;$y++){?>
                                                                                            <option value="<?php echo $y?>"><?php echo $y; ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 go-left">
                                                                                    <div class="form-group">
                                                                                        <label class="required go-right">&nbsp;</label>
                                                                                        <input type="text" class="form-control" name="cvv" id="cvv" placeholder="<?php echo trans('0331');?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 go-left">
                                                                                    <label class="required go-right">&nbsp;</label>
                                                                                    <img src="<?php echo base_url(); ?>assets/img/cc.png" class="img-responsive">
                                                                                </div>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            <br>
                                                                            <div class="form-group">
                                                                                <div class="alert alert-danger submitresult"></div>
                                                                                <input type="hidden" name="paymethod" id="creditcardgateway" value="" />
                                                                                <input type="hidden" name="bookingid" id="bookingid" value="<?php echo $booking_id;?>" />
                                                                                
                                                                                <button type="submit" class="btn btn-success btn-lg paynowbtn pull-left" onclick="return expcheck();"><?php echo trans('0117');?></button>
                                                                            </div>
                                                                        </fieldset>
                                                                    </form>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        </div>
                                                </div>

                               
                                       
                                              
                                    <form action="" id="Billing_form">
                                        <div class="pass_form">
                                            <h3>Billing Address</h3>
                                            <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>
                                                            First Name
                                                        </label>
                                                        <input type="text" class="form-control" name="customerfirstname" required> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>
                                                            Middle Name
                                                        </label>
                                                        <input type="text" class="form-control" name="customermiddlename"> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>
                                                            Last Name
                                                        </label>
                                                        <input type="text" class="form-control" name="customerlastname" required> 
                                                    </div>
                                                    

                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>
                                                            Mobile Number
                                                        </label>
                                                        <input type="text" class="form-control" name="mobile"required >
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>
                                                            Email
                                                        </label>
                                                        <input type="email" class="form-control" name="email"required >
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>
                                                            Address
                                                        </label>
                                                        <textarea class="form-control" name="address" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>
                                                            City
                                                        </label>
                                                        <input type="text" class="form-control" name="city" required> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>
                                                            Zip
                                                        </label>
                                                        <input type="text" class="form-control" name="zip" required> 
                                                    </div>

                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>
                                                            State
                                                        </label>
                                                        <input type="text" class="form-control" name="state" required> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>
                                                            Country
                                                        </label>
                                                        <input type="text" id="nationality_select" class="form-control" name="country" required> 
                                                    </div>

                                                </div>
                                            </div>
                                            <input type="button" name="" value="Pay Now" class="btn btn-success btn-lg btn-block pay_now">
                                        </div> 
                                    </form>
                                    
                                    <style>

                                        .pay_now
                                        {
                                            margin: 20px auto 0;
                                            width: auto !important;
                                        }
                                    </style>
                                    
                                    <div class="clearfix"></div>
                                    
                                
                                
                                <!-- End Other Modules Booking left section -->
                            <?php } ?>
                        </div>
                    </div>


                    <div class="col-md-5 summary">
                        <div class="m-book-summary-side f-12" id="PricePanel">
                            <div class="J_PriceStickUp fn-stuck-menu" x24-ignore-attr="style" style="position: relative; top: 0px;">
                                <div class="m-book-summary-side__inner">
                                    <div>
                                        <div class="c-summary-common c-summary-common_type">
                                            <dl class="u-clearfix"><dt class="c-summary-common__name f-bold">Adults</dt>
                                                <dd class="c-summary-common__price f-bold">$<?php echo $single_ticket_price; ?> x <?php echo $adults; ?></dd>
                                            </dl>
                                            <?php if($childs>0)
                                            {
                                                ?>
                                                <dl class="u-clearfix"><dt class="c-summary-common__name f-bold">Childs</dt>
                                                    <dd class="c-summary-common__price f-bold">$<?php echo $single_ticket_price; ?> x <?php echo $childs; ?></dd>
                                                </dl>
                                                <?php
                                            }
                                            ?>
                                            <?php if($infants>0)
                                            {
                                                ?>
                                                <dl class="u-clearfix"><dt class="c-summary-common__name f-bold">Infants</dt>
                                                    <dd class="c-summary-common__price f-bold">$<?php echo $single_ticket_price; ?> x <?php echo $infants; ?></dd>
                                                </dl>
                                                <?php
                                            }
                                            ?>
                                            <?php

                                            $total_price = ($adults*$single_ticket_price) + ($childs*$single_ticket_price) + ($infants*$single_ticket_price);

                                            ?>
                                        </div>
                                        <div class="flex m-book-summary-side__totalWrapper">
                                            <div class="c-summary-common__768_tip flex1">All prices are in <b>US dollars</b>.</div>
                                            <div class="m-book-summary-side__brick flex1"><span class="m-book-summary-side__total f-14 f-bold">Total</span><span class="o-price-flight f-bold f-24">$<?php echo $total_price; ?></span><i class="fi fi-double-arrow-down"></i></div>
                                        </div>
                                    </div>
                                    <div></div>
                                    <div>
                                        <div class="c-summary-common__tip">All prices are in <b>US dollars</b>.</div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="m-check-travel" id="FlightInfo">
                            <div class="m-check-travel__header">
                                <span class="m-check-travel__cityname"><?php echo $location_from; ?></span>
                                <i class="fi fi-arrow-<?php if($flight_type=='return'){echo 'two';}else{echo 'one';}?>-way"></i>
                                <span class="m-check-travel__cityname"><?php echo $location_to; ?></span>
                                <div class="m-check-travel__date">
                                    <span class="m-check-travel__time">Departure: <?php echo $location_from; ?>
                                        <?php 
                                        if($flight_type=='return')
                                        {
                                            echo ' | Return: '.$depart_date_2;
                                            
                                        }
                                        $pass_info .= $adults.' Adults';

                                        if($childs>0)
                                        {
                                            $pass_info .= ', '.$childs.' Childs';
                                        }
                                        if($infants>0)
                                        {
                                            $pass_info .= ', '.$infants.' Infants';
                                        }



                                         ?>
                                    </span>
                                    <span>|</span>
                                    <span class="m-check-travel__adult"><?php echo $pass_info; ?></span>
                                </div>
                                
                            </div>
                            <div class="m-check-travel__con">
                                <div class="m-check-flight">
                                    <div class="flight-result">
                                        <div class="m-check-flight__status">Departure flight
                                        <!-- -->:
                                        <!-- --><?php echo $location_from.'  ('.$location_from_code.')'; ?>                                                    <!-- -->-
                                        <!-- --><?php echo $location_to.'  ('.$location_to_code.')'; ?>
                                        </div>
                                                                                                                                                    
                                        
                                        <div class="m-check-flight__item u-clearfix">
                                            <div class="m-check-flight__airport"><span class="m-check-flight__depart"><span class=""><?php echo $depart_date_1; ?></span><?php echo $depart_time_1; ?></span><span class="m-check-flight__arrive"><span class=""><?php echo $arrive_date_1; ?></span><?php echo $arrive_time_1; ?></span>
                                                <div class="m-check-flight__wrap"><span class="m-check-flight__line"><em class="m-check-flight__s-point"></em><em class="m-check-flight__e-point"><i></i></em></span><span class="m-check-flight__line m-check-flight__s-line"></span>
                                                    <div class="m-check-flight__from"><?php echo $location_from; ?></div>
                                                    <div class="m-check-flight__to"><?php echo $location_to; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-check-flight__airline">
                                                <div class="c-result-airline result-airline"><img src="<?php echo $carrier_img_1; ?>" alt="" class="c-result-airline__logo">
                                                    <div class="c-result-airline__wrap">
                                                        <div class="c-result-airline__name"><?php echo $carrier_name_1; ?></div>
                                                        <div class="c-result-airline__flight-num"><span class="flight-number"><span class="craftSpan"></span><span class="craftModel"><?php echo $cabin_type; ?></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                             
                                    </div>
                                    <?php

                                    if($flight_type=='return')
                                    {
                                        ?>
                                        <div class="flight-result">
                                            <div class="m-check-flight__status">Return flight
                                            <!-- -->:
                                            <!-- --><?php echo $location_to.'  ('.$location_to_code.')'; ?>                                                    <!-- -->-
                                            <!-- --><?php echo $location_from.'  ('.$location_from_code.')'; ?>
                                            </div>
                                                                                                                                                        
                                            
                                            <div class="m-check-flight__item u-clearfix">
                                                <div class="m-check-flight__airport"><span class="m-check-flight__depart"><span class=""><?php echo $depart_date_2; ?></span><?php echo $depart_time_2; ?></span><span class="m-check-flight__arrive"><span class=""><?php echo $arrive_date_2; ?></span><?php echo $arrive_time_2; ?></span>
                                                    <div class="m-check-flight__wrap"><span class="m-check-flight__line"><em class="m-check-flight__s-point"></em><em class="m-check-flight__e-point"><i></i></em></span><span class="m-check-flight__line m-check-flight__s-line"></span>
                                                        <div class="m-check-flight__from"><?php echo $location_to; ?></div>
                                                        <div class="m-check-flight__to"><?php echo $location_from; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-check-flight__airline">
                                                    <div class="c-result-airline result-airline"><img src="<?php echo $carrier_img_2; ?>" alt="" class="c-result-airline__logo">
                                                        <div class="c-result-airline__wrap">
                                                            <div class="c-result-airline__name"><?php echo $carrier_name_2; ?></div>
                                                            <div class="c-result-airline__flight-num"><span class="flight-number"><span class="craftSpan"></span><span class="craftModel"><?php echo $cabin_type; ?></span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                                 
                                        </div>
                                        <?php
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="m-book-summary-side f-12" id="PricePanel">
                            <div class="J_PriceStickUp fn-stuck-menu" x24-ignore-attr="style" style="position: relative; top: 0px;">
                                <div class="m-book-summary-side__inner">
                                    <div>
                                        <div class="c-summary-common c-summary-common_type">
                                            <h3>Customer Details</h3>
                                            <br>
                                            <dl class="u-clearfix"><dt class="c-summary-common__name f-bold">Name:</dt>
                                                <dd class="c-summary-common__price f-bold">
                                                    <?php echo $customerfirstname." ".$customerlastname; ?>
                                                </dd>
                                            </dl>
                                            <dl class="u-clearfix"><dt class="c-summary-common__name f-bold">Email:</dt>
                                                <dd class="c-summary-common__price f-bold">
                                                    <?php echo $email; ?>
                                                </dd>
                                            </dl>
                                            <dl class="u-clearfix"><dt class="c-summary-common__name f-bold">Phone Number:</dt>
                                                <dd class="c-summary-common__price f-bold">
                                                    <?php echo $mobile; ?>
                                                </dd>
                                            </dl>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                        

                        <!--  *****************************************************  -->
                        <!--                      HOTELS MODULE                      -->
                        <!--  *****************************************************  -->


                        <!--  *****************************************************  -->
                        <!--                      FLIGHTS MODULE                     -->
                        <!--  *****************************************************  -->
                        <div class="clearfix"></div>
                        
                        <!--  *****************************************************  -->
                        <!--                      FLIGHTS MODULE                     -->
                        <!--  *****************************************************  -->


                                
                                <?php } ?>
                                <!--  *****************************************************  -->
                                <!--                    Expedia MODULE                       -->
                                <!--  *****************************************************  -->

                                

                                <div class="clearfix"></div>
                                <!--
        <?php if($appModule != "ean"){ ?>
        <div class="panel-footer row" style="background: #E6EDF7;font-size:12px">
          <p><?php echo trans('0461');?></p>
        </div>
        <?php } ?>-->
                                <!--
        <?php if(!empty($phone)){ ?>
        <div class="panel-body">
          <h4 class="opensans text-center"><i class="icon_set_1_icon-57"></i><?php echo trans('061');?></h4>
          <p class="opensans size30 lblue xslim text-center"><?php echo $phone; ?></p>
        </div>
        <?php } ?>
        -->
                            </div>
                        </div>
                    </div>

                    <!-- Booking Final Starting -->
                    <div class="col-md-12 offset-0 final_section go-right"  style="display:none;">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="step-pane" id="step4">
                                    <div id="rotatingDiv" class="show"></div>
                                    <h2 class="text-center"><?php echo trans('0179');?></h2>
                                    <p class="text-center"><?php echo trans('0180');?></p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
    </div>


<style>
    #rotatingImg { display: none; }
    .booking-bg { padding: 10px 0 5px 0; width: 100%; background-image: url('<?php echo $theme_url; ?>assets/images/step-bg.png'); background-color: #222; text-align: center; }
    .bookingFlow__message { color: white; font-size: 18px; margin-top: 5px; margin-bottom: 15px; letter-spacing: 1px; }
    .select2-choice { font-size: 13px !important; padding: 0 0 0 10px!important; }
    .well
    {
        background: #fff;
            font-family: 'Josefin Sans', serif;
            padding: 0;
    }
</style>
<?php if($appModule != "ean"){ ?>
    <script src="<?php echo base_url(); ?>assets/js/booking.js"></script>
<?php } ?>
<div class="clearfix"></div>
<script>
     var target_date = new Date('<?php echo $invoice->expiryFullDate; ?>').getTime();
  var target_date = '<?php echo $invoice->expiryUnixtime * 1000; ?>';
  var invoiceStatus = "<?php echo $invoice->status; ?>";

  // variables for time units
   var days, hours, minutes, seconds;

  // get tag element
   var countdown = document.getElementById('countdown');
   var ccc = new Date().getTime();
   if(invoiceStatus == "unpaid"){
        // update the tag with id "countdown" every 1 second
        setInterval(function () {

      // find the amount of "seconds" between now and target
       var current_date = new Date().getTime();
       var seconds_left = (target_date - current_date) / 1000;

      // do some time calculations
       days = parseInt(seconds_left / 86400);
       seconds_left = seconds_left % 86400;
       hours = parseInt(seconds_left / 3600);
       seconds_left = seconds_left % 3600;
       minutes = parseInt(seconds_left / 60);
       seconds = parseInt(seconds_left % 60);

      // format countdown string + set tag value
       countdown.innerHTML = '<span class="days">' + days +  ' <b><?php echo trans("0440");?></b></span> <span class="hours">' + hours + ' <b><?php echo trans("0441");?></b></span> <span class="minutes">'
       + minutes + ' <b><?php echo trans("0442");?></b></span> <span class="seconds">' + seconds + ' <b><?php echo trans("0443");?></b></span>';
       }, 1000);
   }

  $(function(){
  $(".submitresult").hide();
  loadPaymethodData();
  $(".arrivalpay").on("click",function(){
  var id = $(this).prop("id");
  var module = $(this).data("module");
  var check = confirm("<?php echo trans('0483')?>");
  if(check){
  $.post("<?php echo base_url();?>invoice/updatePayOnArrival", {id: id,module: module}, function(resp){
  location.reload();
  }); }
  });

  $('#response').on('click','input[type="image"],input[type="submit"]',function(){
  setTimeout(function(){

  $("#response").html("<div id='rotatingDiv'></div>");
  }, 500)
  });

  $("#gateway").on("change",function(){
  var gateway = $(this).val();
  $("#response").html("<div id='rotatingDiv'></div>");
  $.post("<?php echo base_url();?>invoice/getGatewaylink/12/3859", {gateway: gateway}, function(resp){

 var response = $.parseJSON(resp);
console.log(response);
if(response.gateway === 'mollie'){
      console.log(response.htmldata._links.checkout.href);
      window.location.href = response.htmldata._links.checkout.href;
  }
    if(response.gateway === 'paystack') {
      if(response.htmldata.status === 'success') {
        window.location.href = response.htmldata.message;
      }
    } else {
        if(response.iscreditcard == "1"){
          $(".creditcardform").fadeIn("slow");
          $("#creditcardgateway").val(response.gateway);
          $("#response").html("");
          }else{
          $(".creditcardform").hide();
          $("#response").html(response.htmldata);
          $('#response').find('input[name=return]').val("<?php echo base_url().'flights/bookingconfirm/?booking_id='.$booking_id; ?>");
          $('#response').find('input[name=amount]').val("<?php echo $total_price; ?>");
          $('#response').find('input[name=cancel_return]').val("<?php echo base_url().'flights/bookingnotconfirm/?booking_id='.$booking_id; ?>");
          }
    }
  });



  })



  $('.pay_now').click(function(){
    $("#Billing_form").hide();
    $('#pay').addClass('in');
    $(".creditcardform").hide();
    $.post("<?php echo base_url(); ?>flights/Flights/addBilling",$("#Billing_form").serialize(), function(response)
    {
      
      });

  });

  });
   function expcheck(){
   $(".submitresult").html("").fadeOut("fast");
   var cardno = $("#card-number").val();
   var firstname = $("#card-holder-firstname").val();
   var lastname = $("#card-holder-lastname").val();
   var minMonth = new Date().getMonth() + 1;
   var minYear = new Date().getFullYear();
   var month = parseInt($("#expiry-month").val(), 10);
   var year = parseInt($("#expiry-year").val(), 10);

   if($.trim(firstname) == ""){
   $(".submitresult").html("Enter First Name").fadeIn("slow");
   return false;
   }else if($.trim(lastname) == ""){
   $(".submitresult").html("Enter Last Name").fadeIn("slow");
   return false;
   }else if($.trim(cardno) == ""){
   $(".submitresult").html("Enter Card number").fadeIn("slow");
   return false;
   }else if(month <= minMonth && year <= minYear){
   $(".submitresult").html("Invalid Expiration Date").fadeIn("slow");
   return false;

   }else{
   $(".paynowbtn").hide();
   $(".submitresult").removeClass("alert-danger");
   $(".submitresult").html("<div id='rotatingDiv'></div>").fadeIn("slow");
   }
   }
    function loadPaymethodData(){
   var gateway = $("#gateway").val();
   var invoiceStatus = "unpaid";

   if(invoiceStatus == "unpaid"){
   if(gateway != ""){
   $.post("<?php echo base_url();?>invoice/getGatewaylink/12/3859", {gateway: gateway}, function(resp){
   var response = $.parseJSON(resp);
   console.log(response);
   if(response.iscreditcard == "1"){
   $(".creditcardform").fadeIn("slow");
   $("#creditcardgateway").val(response.gateway);
   $("#response").html("");
   }else{
   $(".creditcardform").hide();
   $("#response").html(response.htmldata);
   $('#response').find('input[name=return]').val("<?php echo base_url().'flights/bookingconfirm/?booking_id='.$booking_id; ?>");
          $('#response').find('input[name=amount]').val("<?php echo $total_price; ?>");
          $('#response').find('input[name=cancel_return]').val("<?php echo base_url().'flights/bookingnotconfirm/?booking_id='.$booking_id; ?>");
   }
   });
   }
   }
   }
    
</script>