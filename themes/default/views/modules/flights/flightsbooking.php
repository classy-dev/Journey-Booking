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
        
        margin-bottom:50px;width: auto;
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

<?php
$session_key = '';
if(isset($_GET['session_key']))
{
    $session_key = $_GET['session_key'];
}

$agent_id = '';
if(isset($_GET['agent_id']))
{
    $agent_id = $_GET['agent_id'];
}

$AirlineOutboundLegId = '';
if(isset($_GET['AirlineOutboundLegId']))
{
    $AirlineOutboundLegId = $_GET['AirlineOutboundLegId'];
}

$AirlineInboundLegId = '';
if(isset($_GET['AirlineInboundLegId']))
{
    $AirlineInboundLegId = $_GET['AirlineInboundLegId'];
}

$adults = 0;
if(isset($_GET['adults']))
{
    $adults = $_GET['adults'];
}

$child = 0;
if(isset($_GET['child']))
{
    $child = $_GET['child'];
}

$infants = 0;
if(isset($_GET['infants']))
{
    $infants = $_GET['infants'];
}

$url = "https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/pricing/uk2/v1.0/".$session_key."?pageIndex=0&pageSize=1000";
$url = filter_var($url, FILTER_SANITIZE_URL);
$curl = curl_init();
$options =array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "x-rapidapi-host: skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
        "x-rapidapi-key: a641f074a2msh2cfd35a1866f161p1e7310jsnf03764502d9e"
    )
);
    //print_r($options);
curl_setopt_array($curl,$options);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$response = json_decode($response, true);


$Itineraries = $response['Itineraries'];
$Legs = $response['Legs'];
$Segments = $response['Segments'];
$Carriers = $response['Carriers'];
$Agents = $response['Agents'];
$Places = $response['Places'];
$Query = $response['Query'];
class AirLineData
{
    public $AirlineName = '';
    public $AirlineImg = '';
    public $AirlinePrice = 0;
    public $AirlineOutboundLegId = '';
    public $AirlineOutboundSegmentsIDs = array();
    public $AirlineOutboundStopsIDs = array();
    public $AirlineAgentId = 0;
    public $AirlineInboundLegId = '';
    public $AirlineInboundSegmentsIDs = array();
    public $AirlineInboundStopsIDs = array();
    public $AirlineOutboundDate = '';
    public $AirlineInboundDate = 0;
}

$flight_data = new AirLineData();
$i = 0;
$o = 0;
$count = 0;
foreach($Itineraries as $it => $val)
{

    if($val['OutboundLegId']==$AirlineOutboundLegId && $o==0)
    {
        $count++;
        $flight_data->AirlineOutboundDate = $Query['OutboundDate'];
        
        $prices = $val['PricingOptions'];
        foreach($prices as $pp =>$p)
        {
            $agent = $p['Agents'][0];
            
            foreach($Agents as $agt => $a)
            {
                
                if($a['Id']==$agent)
                {   
                    $flight_data->AirlineName = $a['Name'];
                    $flight_data->AirlineImg = $a['ImageUrl'];
                    $flight_data->AirlineAgentId = $a['Id'];

                    break;
                }
                
            }
            if($flight_data->AirlineName != '')
            {
                $flight_data->AirlinePrice = round($p['Price'] -  ($p['Price']*($discounts/100)),1);   
                break;   
            }

        }
        if($flight_data->AirlineName != '')
        {
            $OutboundLegId = $val['OutboundLegId']; 
            
            $flight_data->AirlineOutboundLegId = $OutboundLegId;
            
                foreach($Legs as $ll =>$l)
                {
                    if($l['Id']==$OutboundLegId)
                    {
                        foreach($l['SegmentIds'] as $segmentID => $id)
                        {
                            array_push($flight_data->AirlineOutboundSegmentsIDs,$id);
                        }
                        foreach($l['Stops'] as $Stops => $id)
                        {
                            array_push($flight_data->AirlineOutboundStopsIDs,$id);
                        }
                        
                        $o=1;
                        break;
                    }
                }
                
        }
        
    }
    
    if($val['InboundLegId']==$AirlineInboundLegId && $i==0)
    {
     
        $flight_data->AirlineInboundDate = $Query['InboundDate'];
        
        
            $InboundLegId = $val['InboundLegId']; 
            
            $flight_data->AirlineInboundLegId = $InboundLegId;
            
                foreach($Legs as $ll =>$l)
                {
                    if($l['Id']==$InboundLegId)
                    {
                        foreach($l['SegmentIds'] as $segmentID => $id)
                        {
                            array_push($flight_data->AirlineInboundSegmentsIDs,$id);
                        }
                        foreach($l['Stops'] as $Stops => $id)
                        {
                            array_push($flight_data->AirlineInboundStopsIDs,$id);
                        }
                        $i=1;
                        
                        break;
                    }
                }
                
        
        
    }

}
if($count == 0)
{
    redirect('flights/flightsbooking/?session_key='.$session_key.'&agent_id='.$agent_id.'&AirlineOutboundLegId='.$AirlineOutboundLegId.'&AirlineInboundLegId='.$AirlineInboundLegId.'&adults='.$adults.'&child='.$child.'&infants='.$infants);
}
?>

<?php if($result == "success" && $appModule == "ean"){ ?>
    <!-- Start Result of Expedia booking for submit -->
    <div class="modal-dialog modal-lg" style="z-index: 10;">
        <div class="modal-content">
            <div class="modal-body">
                <br><br>
                <div class="center-block">
                    <center>
                        <button class="btn btn-circle block-center btn-lg btn-success"><i class="fa fa-check"></i></button>
                        <h3 class="text-center"><?php echo trans('0409');?> <b class="text-success wow flash animted animated"><?php echo trans('0135');?></b></h3>
                        <p class="text-center"><?php echo $msg;?></p>
                        <p><?php echo trans('0540'); ?>: <?php echo $itineraryID; ?></p>
                        <p><?php echo trans('0539'); ?>: <?php echo $confirmationNumber; ?></p>
                        <?php if(!empty($nightlyRateTotal)){ ?>
                            <p><strong>Total Nightly Rate: <?php echo $currency." ".$nightlyRateTotal; ?></strong></p>
                        <?php } ?>
                        <?php if(!empty($SalesTax)){ ?>
                            <p><strong>Sales Tax: <?php echo $currency." ".$SalesTax; ?></strong></p>
                        <?php } ?>
                        <?php if(!empty($HotelOccupancyTax)){ ?>
                            <p>><strong>Hotel Occupancy Tax: <?php echo $currency." ".$HotelOccupancyTax; ?></strong></p>
                        <?php } ?>
                        <?php if(!empty($TaxAndServiceFee)){ ?>
                            <p><strong>Tax and Service Fee: <?php echo $currency." ".$TaxAndServiceFee; ?></strong></p>
                        <?php } ?>
                        <p><b>  <?php echo trans('0124');?> :</b> <?php echo $currency.$grandTotal;?> (<?php echo trans('0538'); ?>) </p>
                        <p><?php echo trans('0537'); ?> </p>
                        <?php if(!empty($checkInInstructions)){ ?>
                            <p><strong><?php echo trans('0458'); ?></strong> : <?php echo strip_tags($checkInInstructions); ?></p>
                        <?php } ?>
                        <?php if(!empty($specialCheckInInstructions)){ ?>
                            <p><strong>Special Check-in Instructions</strong> : <?php echo strip_tags($specialCheckInInstructions); ?></p>
                        <?php } ?>
                        <?php if(!empty($nonRefundable)){ ?>
                            <p><strong><?php echo trans('0309'); ?></strong> : <?php echo $cancellationPolicy; ?></p>
                        <?php } ?>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!-- End Result of Expedia booking for submit -->
<?php  }else{ ?>
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
                    
                    <div class="col-md-6 offset-0 go-right" style="margin-bottom:50px;">
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
                                <?php session_start(); $_SESSION['single_ticket_price'] = $flight_data->AirlinePrice; 
                                
                                ?>


                                <form id="bookingdetails" action="<?php echo base_url(); ?>flights/paynow" method="POST">
                                    
                                    <input type="hidden" name="adults" value="<?php echo $adults; ?>">
                                    <input type="hidden" name="childs" value="<?php echo $child; ?>">
                                    <input type="hidden" name="infants" value="<?php echo $infants; ?>">
                                    <?php

                                    if($AirlineInboundLegId!='')
                                    {
                                        ?>
                                        <input type="hidden" name="flight_type" value="return">
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <input type="hidden" name="flight_type" value="oneway">
                                        <?php
                                    }

                                     ?>
                                    


                                    <?php

                                    $total_pass = $adults;
                                    for($i=0;$i<$total_pass;$i++)
                                    {
                                        ?>
                                        <div class="pass_form">
                                            <h3>Passenger <?php echo $i+1; ?> - Adult ticket</h3>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>
                                                            First Name
                                                        </label>
                                                        <input type="text" class="form-control" name="adultfirstname_<?php echo $i+1; ?>" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>
                                                            Middle Name
                                                        </label>
                                                        <input type="text" class="form-control" name="adultmiddlename_<?php echo $i+1; ?>" >
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>
                                                            Last Name
                                                        </label>
                                                        <input type="text" class="form-control" name="adultlastname_<?php echo $i+1; ?>" required>
                                                    </div>

                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>
                                                            Nationality
                                                        </label>
                                                        <input type="text"  class="form-control" name="adultnationality_<?php echo $i+1; ?>" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Gender:</p>
                                                        <div class="pure-checkbox">
                                                            <input id="oneway" name="genderadult_<?php echo $i+1; ?>" type="radio" class="checkbox triptype" value="male" data-type="oneway" required>
                                                            <label for="oneway" class="onewaycheck" data-type="oneway">&nbsp;Male</label>
                                                        </div>
                                                        <div class="pure-checkbox">
                                                            <input id="round" name="genderadult_<?php echo $i+1; ?>" type="radio" class="checkbox triptype" value="female" data-type="round" required>
                                                            <label for="round" class="roundcheck" data-type="round">&nbsp;Female</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>
                                                            Date of Birth
                                                        </label>
                                                        <input autocomplete="false" type="date" placeholder="<?php echo trans('0472'); ?>" name="adultdobdate_<?php echo $i+1; ?>" value="1985-01-01" class=" form-control dobdate" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>
                                                            Passport Number
                                                        </label>
                                                        <input type="text" class="form-control" name="adultidnumer_<?php echo $i+1; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <?php
                                    }
                                    ?>
                                    <?php

                                    $total_pass = $child;
                                    for($i=0;$i<$total_pass;$i++)
                                    {

                                        ?>
                                        <div class="pass_form">
                                            <h3>Passenger <?php echo $i+1; ?> - Child ticket</h3>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>
                                                            First Name
                                                        </label>
                                                        <input type="text" class="form-control" name="childfirstname_<?php echo $i+1; ?>" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>
                                                            Middle Name
                                                        </label>
                                                        <input type="text" class="form-control" name="childmiddlename_<?php echo $i+1; ?>" >
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>
                                                            Last Name
                                                        </label>
                                                        <input type="text" class="form-control" name="childlastname_<?php echo $i+1; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>
                                                            Nationality
                                                        </label>
                                                        <input type="text"  class="form-control" name="childnationality_<?php echo $i+1; ?>" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Gender:</p>
                                                        <div class="pure-checkbox">
                                                            <input id="oneway" name="genderchild_<?php echo $i+1; ?>" type="radio" class="checkbox triptype" value="male" data-type="oneway" required>
                                                            <label for="oneway" class="onewaycheck" data-type="oneway">&nbsp;Male</label>
                                                        </div>
                                                        <div class="pure-checkbox">
                                                            <input id="round" name="genderchild_<?php echo $i+1; ?>" type="radio" class="checkbox triptype" value="female" data-type="round" required>
                                                            <label for="round" class="roundcheck" data-type="round">&nbsp;Female</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>
                                                            Date of Birth
                                                        </label>
                                                        <input autocomplete="false" type="date" placeholder="<?php echo trans('0472'); ?>" name="childdobdate_<?php echo $i+1; ?>" value="1985-01-01" class=" form-control dobdate" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>
                                                            Passport Number
                                                        </label>
                                                        <input type="text" class="form-control" name="childidnumer_<?php echo $i+1; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <?php
                                    }
                                    ?>
                                    <?php

                                    $total_pass = $infants;
                                    for($i=0;$i<$total_pass;$i++)
                                    {
                                        ?>
                                        <div class="pass_form">
                                            <h3>Passenger <?php echo $i+1; ?> - Infant ticket</h3>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label>
                                                            First Name
                                                        </label>
                                                        <input type="text" class="form-control" name="infantsfirstname_<?php echo $i+1; ?>" required> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>
                                                            Last Name
                                                        </label>
                                                        <input type="text" class="form-control" name="infantsmiddlename_<?php echo $i+1; ?>" >
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>
                                                            Last Name
                                                        </label>
                                                        <input type="text" class="form-control" name="infantslastname_<?php echo $i+1; ?>"required >
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>
                                                            Nationality
                                                        </label>
                                                        <input type="text"  class="form-control" name="infantsnationality_<?php echo $i+1; ?>" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Gender:</p>
                                                        <div class="pure-checkbox">
                                                            <input id="oneway" name="genderinfants_<?php echo $i+1; ?>" type="radio" class="checkbox triptype" value="male" data-type="oneway" required>
                                                            <label for="oneway" class="onewaycheck" data-type="oneway">&nbsp;Male</label>
                                                        </div>
                                                        <div class="pure-checkbox">
                                                            <input id="round" name="genderinfants_<?php echo $i+1; ?>" type="radio" class="checkbox triptype" value="female" data-type="round" required>
                                                            <label for="round" class="roundcheck" data-type="round">&nbsp;Female</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <label>
                                                            Date of Birth
                                                        </label>
                                                        <input autocomplete="false" type="date" placeholder="<?php echo trans('0472'); ?>" name="infantsdobdate_<?php echo $i+1; ?>" value="1985-01-01" class=" form-control dobdate" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>
                                                            Passport Number
                                                        </label>
                                                        <input type="text" class="form-control" name="infantsidnumer_<?php echo $i+1; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <?php
                                    }
                                    ?>
                                    <br><br><br>
                                    <div class="pass_form">
                                            <h3>Contact Information</h3>
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
                                                            Country
                                                        </label>
                                                        <input type="text" id="nationality_select" class="form-control" name="country" required> 
                                                    </div>

                                                </div>
                                            </div>
                                    </div> 
                                    <?php
                                        $o = 0;
                                        $in = 0;
                                        foreach($Legs as $lg => $l)
                                        {

                                            if($l['Id']==$flight_data->AirlineOutboundLegId && $o==0)
                                            {
                                                $o=1;
                                                $DepartureDateTime = $l['Departure'];
                                                $datedepart = explode('T',$DepartureDateTime);
                                                $dated = $datedepart[0];
                                                $timed = $datedepart[1];

                                                $ArrivalDateTime = $l['Arrival'];
                                                $datearive = explode('T',$ArrivalDateTime);
                                                $datea = $datearive[0];
                                                $timea = $datearive[1];

                                                $timeDeparture = explode(':',$timed);
                                                $timeArrival = explode(':',$timea);
                                                $OriginStation = $l['OriginStation'];
                                                $OriginName = '';
                                                $OriginCode = '';
                                                $DestinationStation = $l['DestinationStation'];
                                                $DestinationName = '';
                                                $DestinationCode = '';
                                                foreach($Places as $pp => $p)
                                                {
                                                    if($p['Id']==$OriginStation)
                                                    {
                                                        $OriginName = $p['Name'];
                                                        $OriginCode = $p['Code'];
                                                        break;
                                                    }
                                                }
                                                foreach($Places as $pp => $p)
                                                {
                                                    if($p['Id']==$DestinationStation)
                                                    {
                                                        $DestinationName = $p['Name'];
                                                        $DestinationCode = $p['Code'];
                                                        break;
                                                    }
                                                }
                                                
                                                ?>
                                                <input type="hidden" name="location_to" value="<?php echo $DestinationName; ?>">
                                                <input type="hidden" name="location_from" value="<?php echo $OriginName; ?>">
                                                <input type="hidden" name="location_to_code" value="<?php echo $DestinationCode; ?>">
                                                <input type="hidden" name="location_from_code" value="<?php echo $OriginCode; ?>">

                                                
                                                            <?php 
                                                            $segment_count = 1;                                                                    
                                                            foreach($flight_data->AirlineOutboundSegmentsIDs as $id)
                                                            {
                                                                
                                                                $DepartureDateTime = $Segments[$id]['DepartureDateTime'];
                                                                $datedepart = explode('T',$DepartureDateTime);
                                                                $dated = $datedepart[0];
                                                                $timed = $datedepart[1];

                                                                $ArrivalDateTime = $Segments[$id]['ArrivalDateTime'];
                                                                $datearive = explode('T',$ArrivalDateTime);
                                                                $datea = $datearive[0];
                                                                $timea = $datearive[1];

                                                                $Carrier = $Segments[$id]['Carrier'];
                                                        
                                                                $CarrierName = '';
                                                                $CarrierImg = '';
                                                                foreach($Carriers as $cc => $c)
                                                                {
                                                                    if($Carrier==$c['Id'])
                                                                    {
                                                                        $CarrierImg = $c['ImageUrl'];
                                                                        $CarrierName = $c['Name'];
                                                                        break;
                                                                    }
                                                                }
                                                                $FlightNumber = $Segments[$id]['FlightNumber'];

                                                                $OriginStation = $Segments[$id]['OriginStation'];
                                                                $DestinationStation = $Segments[$id]['DestinationStation'];

                                                              
                                                                $SegmentOriginName = '';
                                                                $SegmentOriginCode = '';
                                                                
                                                                $SegmentDestinationName = '';
                                                                $SegmentDestinationCode = '';
                                                                foreach($Places as $pp => $p)
                                                                {
                                                                    if($p['Id']==$OriginStation)
                                                                    {
                                                                        $SegmentOriginName = $p['Name'];
                                                                        $SegmentOriginCode = $p['Code'];
                                                                        break;
                                                                    }
                                                                }
                                                                foreach($Places as $pp => $p)
                                                                {
                                                                    if($p['Id']==$DestinationStation)
                                                                    {
                                                                        $SegmentDestinationName = $p['Name'];
                                                                        $SegmentDestinationCode = $p['Code'];
                                                                        break;
                                                                    }
                                                                }
                                                                

                                                                $Duration = $Segments[$id]['Duration'];
                                                                $duration_segment_hours = floor($Duration/60);
                                                                $duration_segment_minutes = $Duration - (60*$duration_segment_hours);


                                                                if($wt!='')
                                                                {
                                                                    $h = 0;
                                                                    $m = 0;
                                                                    $zz = explode(':', $timed);
                                                                    $ww = explode(':', $wt);

                                                                    $wwhours = (int)$ww[0];
                                                                    for(;$wwhours!=(int)$zz[0];)
                                                                    {
                                                                        $wwhours++;
                                                                        if($wwhours>=24)
                                                                        {
                                                                            $wwhours=0;
                                                                        }   
                                                                        $h++;
                                                                    }
                                                                    $wwmins = (int)$ww[1];
                                                                    for(;$wwmins!=(int)$zz[1];)
                                                                    {
                                                                        $wwmins++;
                                                                        if($wwmins>=60)
                                                                        {
                                                                            $h--;
                                                                            $wwmins=0;
                                                                        }   
                                                                        $m++;
                                                                    }
                                                                   
                                                                    $wait_time='asd';
                                                                }
                                                                
                                                                ?>
                                                                <?php 
                                                                if($wait_time!='')
                                                                {
                                                                    ?>
                                                                    
                                                                   
                                                                    <?php
                                                                }

                                                                ?>
                <input type="hidden" name="depart_code_<?php echo $segment_count; ?>" value="<?php echo $SegmentOriginCode; ?>">
                <input type="hidden" name="depart_name_<?php echo $segment_count; ?>" value="<?php echo $SegmentOriginName; ?>">
                <input type="hidden" name="arrive_code_<?php echo $segment_count; ?>" value="<?php echo $SegmentDestinationCode; ?>">
                <input type="hidden" name="arrive_name_<?php echo $segment_count; ?>" value="<?php echo $SegmentDestinationName; ?>">
                <input type="hidden" name="flight_leg_number_<?php echo $segment_count; ?>" value="<?php echo $segment_count; ?>">
                <input type="hidden" name="carrier_name_<?php echo $segment_count; ?>" value="<?php echo $CarrierName; ?>">
                <input type="hidden" name="carrier_img_<?php echo $segment_count; ?>" value="<?php echo $CarrierImg; ?>">
                <input type="hidden" name="flight_number_<?php echo $segment_count; ?>" value="<?php echo $FlightNumber; ?>">
                <input type="hidden" name="cabin_type_<?php echo $segment_count; ?>" value="<?php echo $Query['CabinClass']; ?>">
                <input type="hidden" name="duration_<?php echo $segment_count; ?>" value="<?php echo $duration_segment_hours; ?>h <?php echo $duration_segment_minutes; ?>m">
                <input type="hidden" name="depart_date_<?php echo $segment_count; ?>" value="<?php echo $dated; ?>">
                <input type="hidden" name="depart_time_<?php echo $segment_count; ?>" value="<?php echo $timed; ?>">
                <input type="hidden" name="arrive_date_<?php echo $segment_count; ?>" value="<?php echo $datea; ?>">
                <input type="hidden" name="arrive_time_<?php echo $segment_count; ?>" value="<?php echo $timea; ?>">
                <input type="hidden" name="segment_type_<?php echo $segment_count; ?>" value="Outbound">
                
                <?php $segment_count++; ?>




                                                                
                                                                 
                                                                <?php
                                                                $wt=$timea;
                                                                $wait_time = '';
                                                            }
                                                            
                                                            ?>
                                                            

                                                       
                                                <?php
                                                if($flight_data->AirlineInboundLegId=='')
                                                {
                                                    break;
                                                }
                                            }
                                            if($flight_data->AirlineInboundLegId!='')
                                            {
                                                if($l['Id']==$flight_data->AirlineInboundLegId && $in==0)
                                                {
                                                    $in=1;
                                                    $DepartureDateTime = $l['Departure'];
                                                    $datedepart = explode('T',$DepartureDateTime);
                                                    $dated = $datedepart[0];
                                                    $timed = $datedepart[1];

                                                    $ArrivalDateTime = $l['Arrival'];
                                                    $datearive = explode('T',$ArrivalDateTime);
                                                    $datea = $datearive[0];
                                                    $timea = $datearive[1];

                                                    $timeDeparture = explode(':',$timed);
                                                    $timeArrival = explode(':',$timea);
                                                    $OriginStation = $l['OriginStation'];
                                                    $OriginName = '';
                                                    $OriginCode = '';
                                                    $DestinationStation = $l['DestinationStation'];
                                                    $DestinationName = '';
                                                    $DestinationCode = '';
                                                    foreach($Places as $pp => $p)
                                                    {
                                                        if($p['Id']==$OriginStation)
                                                        {
                                                            $OriginName = $p['Name'];
                                                            $OriginCode = $p['Code'];
                                                            break;
                                                        }
                                                    }
                                                    foreach($Places as $pp => $p)
                                                    {
                                                        if($p['Id']==$DestinationStation)
                                                        {
                                                            $DestinationName = $p['Name'];
                                                            $DestinationCode = $p['Code'];
                                                            break;
                                                        }
                                                    }
                                                    $wt='';
                                                    ?>
                                                    
                                                           
                                                                <?php 

                                                                foreach($flight_data->AirlineInboundSegmentsIDs as $id)
                                                                {
                                                                    
                                                                    $DepartureDateTime = $Segments[$id]['DepartureDateTime'];
                                                                    $datedepart = explode('T',$DepartureDateTime);
                                                                    $dated = $datedepart[0];
                                                                    $timed = $datedepart[1];

                                                                    $ArrivalDateTime = $Segments[$id]['ArrivalDateTime'];
                                                                    $datearive = explode('T',$ArrivalDateTime);
                                                                    $datea = $datearive[0];
                                                                    $timea = $datearive[1];

                                                                    $Carrier = $Segments[$id]['Carrier'];
                                                            
                                                                    $CarrierName = '';
                                                                    $CarrierImg = '';
                                                                    foreach($Carriers as $cc => $c)
                                                                    {
                                                                        if($Carrier==$c['Id'])
                                                                        {
                                                                            $CarrierImg = $c['ImageUrl'];
                                                                            $CarrierName = $c['Name'];
                                                                            break;
                                                                        }
                                                                    }
                                                                    $FlightNumber = $Segments[$id]['FlightNumber'];

                                                                    $OriginStation = $Segments[$id]['OriginStation'];
                                                                    $DestinationStation = $Segments[$id]['DestinationStation'];

                                                                  
                                                                    $SegmentOriginName = '';
                                                                    $SegmentOriginCode = '';
                                                                    
                                                                    $SegmentDestinationName = '';
                                                                    $SegmentDestinationCode = '';
                                                                    foreach($Places as $pp => $p)
                                                                    {
                                                                        if($p['Id']==$OriginStation)
                                                                        {
                                                                            $SegmentOriginName = $p['Name'];
                                                                            $SegmentOriginCode = $p['Code'];
                                                                            break;
                                                                        }
                                                                    }
                                                                    foreach($Places as $pp => $p)
                                                                    {
                                                                        if($p['Id']==$DestinationStation)
                                                                        {
                                                                            $SegmentDestinationName = $p['Name'];
                                                                            $SegmentDestinationCode = $p['Code'];
                                                                            break;
                                                                        }
                                                                    }
                                                                    

                                                                    $Duration = $Segments[$id]['Duration'];
                                                                    $duration_segment_hours = floor($Duration/60);
                                                                    $duration_segment_minutes = $Duration - (60*$duration_segment_hours);


                                                                    if($wt!='')
                                                                    {
                                                                        $h = 0;
                                                                        $m = 0;
                                                                        $zz = explode(':', $timed);
                                                                        $ww = explode(':', $wt);

                                                                        $wwhours = (int)$ww[0];
                                                                        for(;$wwhours!=(int)$zz[0];)
                                                                        {
                                                                            $wwhours++;
                                                                            if($wwhours>=24)
                                                                            {
                                                                                $wwhours=0;
                                                                            }   
                                                                            $h++;
                                                                        }
                                                                        $wwmins = (int)$ww[1];
                                                                        for(;$wwmins!=(int)$zz[1];)
                                                                        {
                                                                            $wwmins++;
                                                                            if($wwmins>=60)
                                                                            {
                                                                                $h--;
                                                                                $wwmins=0;
                                                                            }   
                                                                            $m++;
                                                                        }
                                                                       
                                                                        $wait_time='asd';
                                                                    }
                                                                    
                                                                    ?>
                                                                    <?php 
                                                                    if($wait_time!='')
                                                                    {
                                                                        ?>
                                                                        
                                                                      
                                                                        <?php
                                                                    }

                                                                    ?>
                <input type="hidden" name="depart_code_<?php echo $segment_count; ?>" value="<?php echo $SegmentOriginCode; ?>">
                <input type="hidden" name="depart_name_<?php echo $segment_count; ?>" value="<?php echo $SegmentOriginName; ?>">
                <input type="hidden" name="arrive_code_<?php echo $segment_count; ?>" value="<?php echo $SegmentDestinationCode; ?>">
                <input type="hidden" name="arrive_name_<?php echo $segment_count; ?>" value="<?php echo $SegmentDestinationName; ?>">
                <input type="hidden" name="flight_leg_number_<?php echo $segment_count; ?>" value="<?php echo $segment_count; ?>">
                <input type="hidden" name="carrier_name_<?php echo $segment_count; ?>" value="<?php echo $CarrierName; ?>">
                <input type="hidden" name="carrier_img_<?php echo $segment_count; ?>" value="<?php echo $CarrierImg; ?>">
                <input type="hidden" name="flight_number_<?php echo $segment_count; ?>" value="<?php echo $FlightNumber; ?>">
                <input type="hidden" name="cabin_type_<?php echo $segment_count; ?>" value="<?php echo $Query['CabinClass']; ?>">
                <input type="hidden" name="duration_<?php echo $segment_count; ?>" value="<?php echo $duration_segment_hours; ?>h <?php echo $duration_segment_minutes; ?>m">
                <input type="hidden" name="depart_date_<?php echo $segment_count; ?>" value="<?php echo $dated; ?>">
                <input type="hidden" name="depart_time_<?php echo $segment_count; ?>" value="<?php echo $timed; ?>">
                <input type="hidden" name="arrive_date_<?php echo $segment_count; ?>" value="<?php echo $datea; ?>">
                <input type="hidden" name="arrive_time_<?php echo $segment_count; ?>" value="<?php echo $timea; ?>">
                <input type="hidden" name="segment_type_<?php echo $segment_count; ?>" value="Inbound">
                <?php $segment_count++; ?>
                                                                     
                                                                    <?php
                                                                    $wt=$timea;
                                                                    $wait_time = '';
                                                                }
                                                                
                                                                ?>
                                                                

                                                           
                                                    <?php
                                                    break;
                                                }
                                                
                                            }
                                        }


                                        ?>
                                    <style>

                                        .pay_now
                                        {
                                            margin: 20px auto 0;
                                            width: auto !important;
                                        }
                                    </style>
                                    <input type="hidden" name="total_segments" value="<?php echo --$segment_count; ?>">

                                    <div class="clearfix"></div>
                                    <!-- Start Tour Travellers data fields -->
                                    <input type="submit" name="submit" value="Pay Now" class="btn btn-success btn-lg btn-block pay_now">
                                    <!-- End Tour Travellers data fields -->
                                </form>
                                <?php if(!empty($module->policy)){ ?>
                                    <div class="alert alert-info">
                                        <strong class="RTL go-right"><?php echo trans('045');?></strong><br>
                                        <p class="RTL" style="font-size:12px"><?php echo $module->policy;?></p>
                                    </div>
                                <?php } ?>
                                
                                <!-- End Other Modules Booking left section -->
                            <?php } ?>
                        </div>
                    </div>


                    <div class="col-md-6 summary">
                        <div class="m-check-travel" id="FlightInfo">
                            <?php
                            $o = 0;
                            $in = 0;
                            $wt='';
                            foreach($Legs as $lg => $l)
                            {

                                if($l['Id']==$flight_data->AirlineOutboundLegId && $o==0)
                                {
                                    $o=1;
                                    $DepartureDateTime = $l['Departure'];
                                    $datedepart = explode('T',$DepartureDateTime);
                                    $dated = $datedepart[0];
                                    $timed = $datedepart[1];

                                    $ArrivalDateTime = $l['Arrival'];
                                    $datearive = explode('T',$ArrivalDateTime);
                                    $datea = $datearive[0];
                                    $timea = $datearive[1];

                                    $timeDeparture = explode(':',$timed);
                                    $timeArrival = explode(':',$timea);
                                    $OriginStation = $l['OriginStation'];
                                    $OriginName = '';
                                    $OriginCode = '';
                                    $DestinationStation = $l['DestinationStation'];
                                    $DestinationName = '';
                                    $DestinationCode = '';
                                    foreach($Places as $pp => $p)
                                    {
                                        if($p['Id']==$OriginStation)
                                        {
                                            $OriginName = $p['Name'];
                                            $OriginCode = $p['Code'];
                                            break;
                                        }
                                    }
                                    foreach($Places as $pp => $p)
                                    {
                                        if($p['Id']==$DestinationStation)
                                        {
                                            $DestinationName = $p['Name'];
                                            $DestinationCode = $p['Code'];
                                            break;
                                        }
                                    }
                                    $passdata = '';
                                    if($adults>0)
                                    {
                                        $passdata .= $adults.' Adults, ';
                                    }
                                    if($child>0)
                                    {
                                        $passdata .= $child.' Childs, ';
                                    }
                                    if($infants>0)
                                    {
                                        $passdata .= $infants.' Infants';
                                    }
                                    $link = ''.$OriginCode.'/';
                                    $link .= ''.$DestinationCode.'/';
                                    $link .= ''.$flight_data->AirlineOutboundDate.'/';
                                    $link .= ''.$flight_data->AirlineInboundDate.'/';
                                    if($flight_data->AirlineInboundDate!=0)
                                    {
                                        $link .= 'round/';
                                    }
                                    else
                                    {
                                        $link .= 'oneway/';
                                    }
                                    $link .= ''.$Query['CabinClass'].'/';
                                    $link .= ''.$adults.'/';
                                    $link .= ''.$child.'/';
                                    $link .= ''.$infants.'/';
                                    $link .= '/0/0/0';
                                    ?>
                                    <div class="m-check-travel__header">
                                        <span class="m-check-travel__cityname"><?php echo $OriginName; ?></span>
                                        <i class="fi fi-arrow-<?php if($flight_data->AirlineInboundLegId!=''){echo 'two';}else{echo 'one';}?>-way"></i>
                                        <span class="m-check-travel__cityname"><?php echo $DestinationName; ?></span>
                                        <div class="m-check-travel__date">
                                            <span class="m-check-travel__time"><?php echo $dated; ?></span>
                                            <span>|</span>
                                            <span class="m-check-travel__adult"><?php echo $passdata; ?></span>
                                        </div>
                                        <a href="<?php echo base_url(); ?>flights/<?php echo $link; ?>" class="m-check-travel__edit"><i class="fi fi-edit"></i>Change Flight</a>
                                    </div>
                                    <div class="m-check-travel__con">
                                        <div class="m-check-flight">
                                            <div class="flight-result">
                                                <div class="m-check-flight__status">Departure flight
                                                    <!-- -->:
                                                    <!-- --><?php echo $OriginName; ?>
                                                    <!-- -->-
                                                    <!-- --><?php echo $DestinationName; ?>
                                                </div>
                                                <?php 
                                                        
                                                foreach($flight_data->AirlineOutboundSegmentsIDs as $id)
                                                {
                                                    
                                                    $DepartureDateTime = $Segments[$id]['DepartureDateTime'];
                                                    $datedepart = explode('T',$DepartureDateTime);
                                                    $dated = $datedepart[0];
                                                    $timed = $datedepart[1];

                                                    $ArrivalDateTime = $Segments[$id]['ArrivalDateTime'];
                                                    $datearive = explode('T',$ArrivalDateTime);
                                                    $datea = $datearive[0];
                                                    $timea = $datearive[1];

                                                    $Carrier = $Segments[$id]['Carrier'];
                                            
                                                    $CarrierName = '';
                                                    $CarrierImg = '';
                                                    foreach($Carriers as $cc => $c)
                                                    {
                                                        if($Carrier==$c['Id'])
                                                        {
                                                            $CarrierImg = $c['ImageUrl'];
                                                            $CarrierName = $c['Name'];
                                                            break;
                                                        }
                                                    }
                                                    $FlightNumber = $Segments[$id]['FlightNumber'];

                                                    $OriginStation = $Segments[$id]['OriginStation'];
                                                    $DestinationStation = $Segments[$id]['DestinationStation'];

                                                  
                                                    $SegmentOriginName = '';
                                                    $SegmentOriginCode = '';
                                                    
                                                    $SegmentDestinationName = '';
                                                    $SegmentDestinationCode = '';
                                                    foreach($Places as $pp => $p)
                                                    {
                                                        if($p['Id']==$OriginStation)
                                                        {
                                                            $SegmentOriginName = $p['Name'];
                                                            $SegmentOriginCode = $p['Code'];
                                                            break;
                                                        }
                                                    }
                                                    foreach($Places as $pp => $p)
                                                    {
                                                        if($p['Id']==$DestinationStation)
                                                        {
                                                            $SegmentDestinationName = $p['Name'];
                                                            $SegmentDestinationCode = $p['Code'];
                                                            break;
                                                        }
                                                    }
                                                    

                                                    $Duration = $Segments[$id]['Duration'];
                                                    $duration_segment_hours = floor($Duration/60);
                                                    $duration_segment_minutes = $Duration - (60*$duration_segment_hours);


                                                    if($wt!='')
                                                    {
                                                        $h = 0;
                                                        $m = 0;
                                                        $zz = explode(':', $timed);
                                                        $ww = explode(':', $wt);

                                                        $wwhours = (int)$ww[0];
                                                        for(;$wwhours!=(int)$zz[0];)
                                                        {
                                                            $wwhours++;
                                                            if($wwhours>=24)
                                                            {
                                                                $wwhours=0;
                                                            }   
                                                            $h++;
                                                        }
                                                        $wwmins = (int)$ww[1];
                                                        for(;$wwmins!=(int)$zz[1];)
                                                        {
                                                            $wwmins++;
                                                            if($wwmins>=60)
                                                            {
                                                                $h--;
                                                                $wwmins=0;
                                                            }   
                                                            $m++;
                                                        }
                                                       
                                                        $wait_time='asd';
                                                    }
                                                    
                                                    ?>
                                                    <?php 
                                                    if($wait_time!='')
                                                    {
                                                        ?>
                                                        
                                                        <div class="m-check-flight__transfer">Transfer in
                                                            <!-- -->
                                                            <!-- --><?php echo $SegmentOriginName; ?>
                                                            <!-- -->&nbsp;
                                                            <!-- --><?php echo $h; ?>
                                                            <!-- -->h
                                                            <!-- --><?php echo $m; ?>
                                                            <!-- -->m
                                                        </div>
                                                        <?php
                                                    }

                                                    ?>
                                                    <div class="m-check-flight__item u-clearfix">
                                                        <div class="m-check-flight__airport"><span class="m-check-flight__depart"><span class=""><?php echo $dated; ?></span><?php echo $timed; ?></span><span class="m-check-flight__arrive"><span class=""><?php echo $datea; ?></span><?php echo $timea; ?></span>
                                                            <div class="m-check-flight__wrap"><span class="m-check-flight__line"><em class="m-check-flight__s-point"></em><em class="m-check-flight__e-point"><i></i></em></span><span class="m-check-flight__line m-check-flight__s-line"></span>
                                                                <div class="m-check-flight__from"><?php echo $SegmentOriginName; ?></div>
                                                                <div class="m-check-flight__to"><?php echo $SegmentDestinationName; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-check-flight__airline">
                                                            <div class="c-result-airline result-airline"><img src="<?php echo $CarrierImg; ?>" alt="" class="c-result-airline__logo">
                                                                <div class="c-result-airline__wrap">
                                                                    <div class="c-result-airline__name"><?php echo $CarrierName; ?></div>
                                                                    <div class="c-result-airline__flight-num"><span class="flight-number"><span class="flightNo"><?php echo $FlightNumber; ?></span><span class="craftSpan"></span><span class="craftModel"><?php echo $Query['CabinClass']; ?></span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-check-flight__duration"><span class="m-check-flight__hour"><?php echo $duration_segment_hours; ?><!-- -->h<!-- --><?php echo $duration_segment_minutes; ?><!-- -->m</span>
                                                        </div>
                                                    </div>
                                                     
                                                    <?php
                                                    $wt=$timea;
                                                    $wait_time = '';
                                                }
                                                
                                                ?>
                                                

                                                
                                            </div>
                                           
                                    <?php
                                    if($flight_data->AirlineInboundLegId=='')
                                    {
                                        break;
                                    }
                                }
                                if($flight_data->AirlineInboundLegId!='')
                                {
                                    if($l['Id']==$flight_data->AirlineInboundLegId && $in==0)
                                    {
                                        $in=1;
                                        $DepartureDateTime = $l['Departure'];
                                        $datedepart = explode('T',$DepartureDateTime);
                                        $dated = $datedepart[0];
                                        $timed = $datedepart[1];

                                        $ArrivalDateTime = $l['Arrival'];
                                        $datearive = explode('T',$ArrivalDateTime);
                                        $datea = $datearive[0];
                                        $timea = $datearive[1];

                                        $timeDeparture = explode(':',$timed);
                                        $timeArrival = explode(':',$timea);
                                        $OriginStation = $l['OriginStation'];
                                        $OriginName = '';
                                        $OriginCode = '';
                                        $DestinationStation = $l['DestinationStation'];
                                        $DestinationName = '';
                                        $DestinationCode = '';
                                        foreach($Places as $pp => $p)
                                        {
                                            if($p['Id']==$OriginStation)
                                            {
                                                $OriginName = $p['Name'];
                                                $OriginCode = $p['Code'];
                                                break;
                                            }
                                        }
                                        foreach($Places as $pp => $p)
                                        {
                                            if($p['Id']==$DestinationStation)
                                            {
                                                $DestinationName = $p['Name'];
                                                $DestinationCode = $p['Code'];
                                                break;
                                            }
                                        }
                                        $wt='';
                                        ?>
                                        
                                                <div class="flight-result">
                                                    <div class="m-check-flight__status">Return flight
                                                        <!-- -->:
                                                        <!-- --><?php echo $OriginName; ?>
                                                        <!-- -->-
                                                        <!-- --><?php echo $DestinationName; ?>
                                                    </div>
                                                    <?php 
                                                            
                                                    foreach($flight_data->AirlineInboundSegmentsIDs as $id)
                                                    {
                                                        
                                                        $DepartureDateTime = $Segments[$id]['DepartureDateTime'];
                                                        $datedepart = explode('T',$DepartureDateTime);
                                                        $dated = $datedepart[0];
                                                        $timed = $datedepart[1];

                                                        $ArrivalDateTime = $Segments[$id]['ArrivalDateTime'];
                                                        $datearive = explode('T',$ArrivalDateTime);
                                                        $datea = $datearive[0];
                                                        $timea = $datearive[1];

                                                        $Carrier = $Segments[$id]['Carrier'];
                                                
                                                        $CarrierName = '';
                                                        $CarrierImg = '';
                                                        foreach($Carriers as $cc => $c)
                                                        {
                                                            if($Carrier==$c['Id'])
                                                            {
                                                                $CarrierImg = $c['ImageUrl'];
                                                                $CarrierName = $c['Name'];
                                                                break;
                                                            }
                                                        }
                                                        $FlightNumber = $Segments[$id]['FlightNumber'];

                                                        $OriginStation = $Segments[$id]['OriginStation'];
                                                        $DestinationStation = $Segments[$id]['DestinationStation'];

                                                      
                                                        $SegmentOriginName = '';
                                                        $SegmentOriginCode = '';
                                                        
                                                        $SegmentDestinationName = '';
                                                        $SegmentDestinationCode = '';
                                                        foreach($Places as $pp => $p)
                                                        {
                                                            if($p['Id']==$OriginStation)
                                                            {
                                                                $SegmentOriginName = $p['Name'];
                                                                $SegmentOriginCode = $p['Code'];
                                                                break;
                                                            }
                                                        }
                                                        foreach($Places as $pp => $p)
                                                        {
                                                            if($p['Id']==$DestinationStation)
                                                            {
                                                                $SegmentDestinationName = $p['Name'];
                                                                $SegmentDestinationCode = $p['Code'];
                                                                break;
                                                            }
                                                        }
                                                        

                                                        $Duration = $Segments[$id]['Duration'];
                                                        $duration_segment_hours = floor($Duration/60);
                                                        $duration_segment_minutes = $Duration - (60*$duration_segment_hours);


                                                        if($wt!='')
                                                        {
                                                            $h = 0;
                                                            $m = 0;
                                                            $zz = explode(':', $timed);
                                                            $ww = explode(':', $wt);

                                                            $wwhours = (int)$ww[0];
                                                            for(;$wwhours!=(int)$zz[0];)
                                                            {
                                                                $wwhours++;
                                                                if($wwhours>=24)
                                                                {
                                                                    $wwhours=0;
                                                                }   
                                                                $h++;
                                                            }
                                                            $wwmins = (int)$ww[1];
                                                            for(;$wwmins!=(int)$zz[1];)
                                                            {
                                                                $wwmins++;
                                                                if($wwmins>=60)
                                                                {
                                                                    $h--;
                                                                    $wwmins=0;
                                                                }   
                                                                $m++;
                                                            }
                                                           
                                                            $wait_time='asd';
                                                        }
                                                        
                                                        ?>
                                                        <?php 
                                                        if($wait_time!='')
                                                        {
                                                            ?>
                                                            
                                                            <div class="m-check-flight__transfer">Transfer in
                                                                <!-- -->
                                                                <!-- --><?php echo $SegmentOriginName; ?>
                                                                <!-- -->&nbsp;
                                                                <!-- --><?php echo $h; ?>
                                                                <!-- -->h
                                                                <!-- --><?php echo $m; ?>
                                                                <!-- -->m
                                                            </div>
                                                            <?php
                                                        }

                                                        ?>
                                                        <div class="m-check-flight__item u-clearfix">
                                                            <div class="m-check-flight__airport"><span class="m-check-flight__depart"><span class=""><?php echo $dated; ?></span><?php echo $timed; ?></span><span class="m-check-flight__arrive"><span class=""><?php echo $datea; ?></span><?php echo $timea; ?></span>
                                                                <div class="m-check-flight__wrap"><span class="m-check-flight__line"><em class="m-check-flight__s-point"></em><em class="m-check-flight__e-point"><i></i></em></span><span class="m-check-flight__line m-check-flight__s-line"></span>
                                                                    <div class="m-check-flight__from"><?php echo $SegmentOriginName; ?></div>
                                                                    <div class="m-check-flight__to"><?php echo $SegmentDestinationName; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="m-check-flight__airline">
                                                                <div class="c-result-airline result-airline"><img src="<?php echo $CarrierImg; ?>" alt="" class="c-result-airline__logo">
                                                                    <div class="c-result-airline__wrap">
                                                                        <div class="c-result-airline__name"><?php echo $CarrierName; ?></div>
                                                                        <div class="c-result-airline__flight-num"><span class="flight-number"><span class="flightNo"><?php echo $FlightNumber; ?></span><span class="craftSpan"></span><span class="craftModel"><?php echo $Query['CabinClass']; ?></span></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="m-check-flight__duration"><span class="m-check-flight__hour"><?php echo $duration_segment_hours; ?><!-- -->h<!-- --><?php echo $duration_segment_minutes; ?><!-- -->m</span>
                                                            </div>
                                                        </div>
                                                         
                                                        <?php
                                                        $wt=$timea;
                                                        $wait_time = '';
                                                    }
                                                    
                                                    ?>
                                                    

                                                    
                                                </div>
                                               
                                        <?php
                                        break;
                                    }
                                    
                                }
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
                                            <dl class="u-clearfix"><dt class="c-summary-common__name f-bold">Adults</dt>
                                                <dd class="c-summary-common__price f-bold">$<?php echo $flight_data->AirlinePrice; ?> x <?php echo $adults; ?></dd>
                                            </dl>
                                            <?php if($child>0)
                                            {
                                                ?>
                                                <dl class="u-clearfix"><dt class="c-summary-common__name f-bold">Childs</dt>
                                                    <dd class="c-summary-common__price f-bold">$<?php echo $flight_data->AirlinePrice; ?> x <?php echo $child; ?></dd>
                                                </dl>
                                                <?php
                                            }
                                            ?>
                                            <?php if($infants>0)
                                            {
                                                ?>
                                                <dl class="u-clearfix"><dt class="c-summary-common__name f-bold">Infants</dt>
                                                    <dd class="c-summary-common__price f-bold">$<?php echo $flight_data->AirlinePrice; ?> x <?php echo $infants; ?></dd>
                                                </dl>
                                                <?php
                                            }
                                            ?>
                                            <?php

                                            $total_price = ($adults*$flight_data->AirlinePrice) + ($child*$flight_data->AirlinePrice) + ($infants*$flight_data->AirlinePrice);

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
<?php } ?>
<?php if($appModule == "ean"){ ?>
    <!-- Start JS for Expedia -->
    <script type="text/javascript">
        $(function(){$(".submitresult").hide()})
        function expcheck(){$(".submitresult").html("").fadeOut("fast");var cardno=$("#card-number").val();var cardtype=$("#cardtype").val();var email=$("#card-holder-email").val();var country=$("#country").val();var cvv=$("#cvv").val();var city=$("#card-holder-city").val();var state=$("#card-holder-state").val();var postalcode=$("#card-holder-postalcode").val();var firstname=$("#card-holder-firstname").val();var lastname=$("#card-holder-lastname").val();var policy=$("#policy").val();var minMonth=new Date().getMonth()+1;var minYear=new Date().getFullYear();var month=parseInt($("#expiry-month").val(),10);var year=parseInt($("#expiry-year").val(),10);if(country=="US"){if($.trim(postalcode)==""){$(".submitresult").html("Enter Postal Code").fadeIn("slow");return!1}else if($.trim(state)==""){$(".submitresult").html("Enter State").fadeIn("slow");return!1}}
            if($.trim(firstname)==""){$(".submitresult").html("Enter First Name").fadeIn("slow");return!1}else if($.trim(lastname)==""){$(".submitresult").html("Enter Last Name").fadeIn("slow");return!1}else if($.trim(cardno)==""){$(".submitresult").html("Enter Card number").fadeIn("slow");return!1}else if($.trim(cardtype)==""){$(".submitresult").html("Select Card Type").fadeIn("slow");return!1}else if(month<=minMonth&&year<=minYear){$(".submitresult").html("Invalid Expiration Date").fadeIn("slow");return!1}else if($.trim(cvv)==""){$(".submitresult").html("Enter Security Code").fadeIn("slow");return!1}else if($.trim(country)==""){$(".submitresult").html("Select Country").fadeIn("slow");return!1}else if($.trim(city)==""){$(".submitresult").html("Enter City").fadeIn("slow");return!1}else if($.trim(email)==""){$(".submitresult").html("Enter Email").fadeIn("slow");return!1}else if(!$('#policy').is(':checked')){$(".submitresult").html("Please Accept Cancellation Policy").fadeIn("slow");return!1}else{$(".paynowbtn").hide();$(".submitresult").removeClass("alert-danger");$(".submitresult").html("<div id='rotatingDiv'></div>").fadeIn("slow")}}
        function isNumeric(evt)
        {var e=evt||window.event;var charCode=e.which||e.keyCode;if(charCode>31&&(charCode<47||charCode>57))
            return!1;if(e.shiftKey)return!1;return!0}
    </script>
    <!-- End JS for Expedia -->
<?php }?>
<style>
    #rotatingImg { display: none; }
    .booking-bg { padding: 10px 0 5px 0; width: 100%; background-image: url('<?php echo $theme_url; ?>assets/images/step-bg.png'); background-color: #222; text-align: center; }
    .bookingFlow__message { color: white; font-size: 18px; margin-top: 5px; margin-bottom: 15px; letter-spacing: 1px; }
    .select2-choice { font-size: 13px !important; padding: 0 0 0 10px!important; }
</style>
<?php if($appModule != "ean"){ ?>
    <script src="<?php echo base_url(); ?>assets/js/booking.js"></script>
<?php } ?>
<div class="clearfix"></div>
<script>
    var dobdate = $('.dobdate').each(function(){
        $(this).datepicker({
             format: 'yyyy-mm-dd'
           }).on('changeDate', function(){
           $(this).datepicker('hide');
         }).data('datepicker');;
    });


    
</script>