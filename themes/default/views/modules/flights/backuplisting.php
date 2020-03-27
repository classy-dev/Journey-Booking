<style>
    .summary  { border-right: solid 2px rgb(0, 93, 247); color: #ffffff; background: #4285f4; padding: 14px; float: left; font-size: 14px; }
    .sideline { margin-top: 15px; margin-bottom: 15px; padding-left: 15px; display: table-cell; border-left: solid 1px #e7e7e7; }
    .localarea { margin-top: 15px; margin-bottom: 15px; padding-left: 15px; }
    .captext  { display: block; font-size: 14px; font-weight: 400; color: #23527c; line-height: 1.2em; text-transform: capitalize; }
    .ellipsis { max-width: 250px; white-space: nowrap !important; overflow: hidden !important; text-overflow: ellipsis !important; }
    .noResults { right: 30px; top: 26px; color: #008cff; font-size: 16px; }
    .table { margin-bottom: 5px; }
    .fa-arrow-right { font-size: 10px; }
    a.disabled { pointer-events: none; cursor: default; }
    .table-striped>tbody>tr:nth-of-type(odd) { background-color: #EEEEEE; }

    .section-title h2{margin-bottom: 0;}

    .section-title a{color: #d81e47;}
    .section-title a:hover{text-decoration: underline;}

    .back-title h3 {
        position: absolute;
        font-size: 90px;
        text-transform: uppercase;
        text-align: center;
        left: 0;
        right: 0;
        z-index: 1;
        top: 30px;
        color: #fff;
        text-shadow: 0 0 15px #cccccc20;
    }
    .section-title
    {
        margin-bottom: 100px;
        margin-top: 50px;
    }
    .section-title h2
    {
            color: #111236;
            font-size: 36px;
            position: relative;
            z-index: 10;
            font-family: 'Josefin Sans', serif;
    }
</style>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
<div class="header-mob hidden-xs">
    <div class="container">
        <div class="col-xs-2 text-leftt">
            <a data-toggle="tooltip" data-placement="right" title="<?php echo trans('0533');?>" class="icon-angle-left pull-left mob-back" onclick="goBack()"></a>
        </div>
        <div class="col-xs-1 text-center pull-right hidden-xs ttu hidden-lg">
            <div class="row">
                <a class="btn btn-success btn-xs btn-block" data-toggle="collapse" data-target="#modify" aria-expanded="false" aria-controls="modify">
                    <i class="icon-filter mob-filter"></i>
                    <span><?php echo trans('0106');?></span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="search_head">
    <div class="container">
        <?php echo searchForm($appModule); ?>
    </div>
</div>
<div class="clearfix"></div>
<style>
        
        .mt_search
        {
                position: relative;
                top: auto;
                left: auto;
                width: 100%;
                height: auto;
                padding: 20px 0 0 0;
                margin: 0 auto;
        }
        .mt_search .nav-tabs
        {
            display: none;
        }
        .mt_search .nav-tabs.flight
        {
            display: block;
        }
        
        #search h3,
        .mt_search h3
        {
            font-weight: 100;
             font-family: 'Josefin Sans', serif;
        }
        .popup-text
        {
            color: #111236;
        }
        @media (min-width: 768px)
        {
            .modal-dialog {
                width:750px;
                margin: 30px auto;
            }
        }
        .modal-body
        {
            padding: 0;
        }
        .mt_search h3
        {
            padding-left: 20px;
            color: #fff;
        }
        .modal-body {
           background: #111236;
        }
        .modal-header,
        .modal-content
        {
            background: #111236;
            border: 0;
        }
        .modal-body .close
        {
            color: #fff;
            position: relative;
            opacity: 1;
            padding: 11px;
            z-index: 9999999999999999;
        }
        #search .flight-item
        {
                width: 16%;
                float: left;
                box-shadow: 1px 1px 20px #cccccc67;
                padding: 5px;
                margin: 15px;
                font-family: 'Josefin Sans', serif;
                text-align: center;
        }
        #search .flight-item h4,
        #search .flight-item h5
        {
            font-family: 'Josefin Sans', serif;
            font-size: 16px;
            color: #000;
        }
        #search .flight-item h4
        {
            margin-bottom: 5px;
        }
        #search .flight-item h5
        {
            font-size: 15px;
            font-weight: 100;
        }
        #search .flight-item img
        {
            width: 60px;
            margin: 10px auto;
        }
        #search .flight-item a
        {
                color: #111236;
                font-size: 26px;
        }
        @media(max-width: 991px)
        {
            #search .flight-item
            {
                width: 40%;
                float: none;
            }
        }
        @media(max-width: 500px)
        {
            #search .flight-item
            {
                width: 95%;
            }
        }
        .flight-details
        {
            box-shadow: 1px 1px 20px #cccccc67;
            margin:20px 0;
        }
        .flight-details .header
        {
            padding: 10px 20px;
            background: #111236;
        }
        .flight-details .header h3
        {
                font-weight: 600;
                margin: 0;
                color: #fff;
        }
        .flight-details .outbound
        {
            padding: 20px;
            min-height: 150px;
        }
        .flight-details .img-caption
        {
            width: 20%;
            float: left;
        }
        .flight-details .details
        {
            width: 80%;
            float: left;
            margin-top: 25px;
        }
        .flight-details .img-caption h4
        {
            font-family: 'Josefin Sans', serif;
            text-align: center;
        }
        .flight-details .img-caption img
        {
            width: 60px;
            margin: 5px auto;
        }
        .flight-details .details .depart,
        .flight-details .details .land
        {
            width: 50%;
            float: left;
        }
        .flight-details .details .depart i,
        .flight-details .details .land i
        {
                float: left;
                font-size: 18px;
                color: #111236;
                margin-right: 10px;
                line-height: 40px;
        }
        .flight-details .details .depart h4,
        .flight-details .details .land h4
        {
                font-family: 'Josefin Sans', serif;
            font-size: 16px;
            margin: 0;
        }
        .flight-details .details .depart p,
        .flight-details .details .land p
        {
                font-family: 'Josefin Sans', serif;
                 color: #000;
        }
        .flight-details .details .land i
        {
            -ms-transform: rotate(90deg);
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }
        .flight-details .ticket-price
        {
            padding: 15px;
        }
        .flight-details .ticket-price h4
        {
                font-family: 'Josefin Sans', serif;
            margin-bottom: 0;
        }
        .flight-details .ticket-price h3
        {
            color: #111236;
            font-size: 36px;
            margin-bottom: 0;
        }
        .flight-details .ticket-price h3 span
        {
            color: #000;
            font-size: 18px;
        }
        .flight-details .ticket-price p
        {
            font-family: 'Josefin Sans', serif;
            color: #000;
        }
        .flight-details .ticket-price a
        {
                font-family: 'Josefin Sans', serif;
            color: #111236;
        }
        .flight-details .ticket-price a.btn
        {
            color: #111236;
            font-size: 20px;
            font-family: 'Josefin Sans', serif;
            border-color: #111236;
        }
        .flight-details .ticket-price a.btn:hover
        {
            color: #fff;
            background: #111236;
        }
        #search
        {
            padding: 20px 0;
        }
        .listingbg
        {
            padding-bottom: 30px; 
        }
        .section-title h2
        {
            font-family: 'Josefin Sans', serif;
        }
    </style>
    
    <?php

$searchManualQuery = $data['searchManualQuery'];
//print_r($searchManualQuery);
$departure = '';
$arrival = '';

foreach($result as $i => $re) {  $check = true;
        $departure = $re->from_code;
        $arrival = $re->to_code;
        break;
     } 
$adults = '';
if($searchManualQuery['passenger']['adult']>0)
{
    $adults = '&adults='.$searchManualQuery['passenger']['adult'];
}

$children = '';
if($searchManualQuery['passenger']['children']>0)
{
    $children = '&children='.$searchManualQuery['passenger']['children'];
}

$infant = '';
if($searchManualQuery['passenger']['infant']>0)
{
    $infant = '&infants='.$searchManualQuery['passenger']['infant'];
}

$inbound = '';
if($searchManualQuery['triptype']=='round')
{
    $inbound = '&inboundDate='.$searchManualQuery['arrival'];
}

$curl = curl_init();
$op = array(
    CURLOPT_URL => "https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/pricing/v1.0",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_VERBOSE => true,
    CURLOPT_HEADER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
     CURLOPT_POSTFIELDS => "country=US&currency=USD&locale=en-US&originPlace=".$searchManualQuery['origin']."-sky&destinationPlace=".$searchManualQuery['destination']."-sky&outboundDate=".$searchManualQuery['departure'].$adults.$children.$infant.$inbound."&cabinClass=".$searchManualQuery['cabinclass'],
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "x-rapidapi-host: skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
        "x-rapidapi-key: a641f074a2msh2cfd35a1866f161p1e7310jsnf03764502d9e"
    ),
);
//echo $op[CURLOPT_POSTFIELDS];
curl_setopt_array($curl, $op);

$response = curl_exec($curl);
$err = curl_error($curl);


curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $newResponse =explode('/',$response);
}
//echo $response;

$s_key = explode(' ',$newResponse[9]);
$session_key = explode('Server',$s_key[0]);
$session_key = explode(' ',$session_key[0]);
$session_key = $session_key[0];


$query_outbounddepart= '';
if(isset($_GET['outbounddepart']))
{
    $query_outbounddepart = '&outboundDepartStartTime='.$_GET['outbounddepart'];
}
$query_outboundarrive= '';
if(isset($_GET['outboundarrive']))
{
    $query_outboundarrive = '&outboundDepartEndTime='.$_GET['outboundarrive'];
}


$query_returndepart= '';
if(isset($_GET['returndepart']))
{
    $query_returndepart = '&inboundDepartStartTime='.$_GET['returndepart'];
}
$query_returnarrive= '';
if(isset($_GET['returnarrive']))
{
    $query_returnarrive = '&inboundDepartEndTime='.$_GET['returnarrive'];
}


$query_flight_duration= '';
if(isset($_GET['flight_duration']))
{
    $query_flight_duration = '&duration='.$_GET['flight_duration'];
}
$url = "https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/pricing/uk2/v1.0/".$session_key."?originAirports=".$departure."-sky&destinationAirports=".$arrival."-sky".$query_outbounddepart."".$query_outboundarrive."".$query_flight_duration."".$query_returndepart."".$query_returnarrive."&pageIndex=0&pageSize=1000";
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

$departureCheap = $departure;
$arrivalCheap = $arrival;

$departure = '';
$arrival = '';

$dataCount = 0;
 ?>
<?php 
foreach($result as $i => $re) {  $check = true;
        $departure = $re->from_location;
        $departure = $departure.' ('.$re->from_code.')';
        $arrival = $re->to_location;
        $arrival = $arrival.' ('.$re->to_code.')';
        break;
     } 

?>
<?php


$Itineraries = $response['Itineraries'];
$Legs = $response['Legs'];
$Segments = $response['Segments'];
$Carriers = $response['Carriers'];
$Agents = $response['Agents'];
$Places = $response['Places'];

$carrierIDArray = array();
$durationArray = array();

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
}

$AirLineDataArray = array();

$i = 0;
$listing_count = 0;
foreach($Itineraries as $it => $val)
{
    $dataCount++;
    $d = new AirLineData();
    $prices = $val['PricingOptions'];
    foreach($prices as $pp =>$p)
    {


        $agent = $p['Agents'][0];
        
        foreach($Agents as $agt => $a)
        {
            if($a['Id']==$agent && $a['Type']=='Airline')
            {   
                $d->AirlineName = $a['Name'];
                $d->AirlineImg = $a['ImageUrl'];
                $d->AirlineAgentId = $a['Id'];
                break;
            }
            
        }
        if($d->AirlineName != '')
        {
            $d->AirlinePrice = round($p['Price'] -  ($p['Price']*($discount/100)),1);   
            break;   
        }

    }
    if($d->AirlineName != '')
    {
        $OutboundLegId = $val['OutboundLegId']; 

        $d->AirlineOutboundLegId = $OutboundLegId;
        
            foreach($Legs as $ll =>$l)
            {
                if($l['Id']==$OutboundLegId)
                {
                    foreach($l['SegmentIds'] as $segmentID => $id)
                    {
                        array_push($d->AirlineOutboundSegmentsIDs,$id);
                    }
                    foreach($l['Stops'] as $Stops => $id)
                    {
                        array_push($d->AirlineOutboundStopsIDs,$id);
                    }
                    array_push($durationArray, $l['Duration']);
                    foreach($l['Carriers'] as $Stops => $id)
                    {
                        array_push($carrierIDArray,$id);

                    }
                    
                    break;
                }
            }
            if($inbound!='')
            {
                $InboundLegId = $val['InboundLegId']; 
                $d->AirlineInboundLegId = $InboundLegId;
                foreach($Legs as $ll =>$l)
                {
                    if($l['Id']==$InboundLegId)
                    {
                        foreach($l['SegmentIds'] as $segmentID => $id)
                        {
                            array_push($d->AirlineInboundSegmentsIDs,$id);
                        }
                        foreach($l['Stops'] as $Stops => $id)
                        {
                            array_push($d->AirlineInboundStopsIDs,$id);
                        }
                        array_push($durationArray, $l['Duration']);
                        foreach($l['Carriers'] as $Stops => $id)
                        {
                            array_push($carrierIDArray,$id);
                        }
                        break;
                    }
                }
            }
            $listing_count++;
            array_push($AirLineDataArray,$d);
            
       
        
        
        
    }
}


$directStopPriceArray = array();
$oneStopPriceArray = array();
$twoStopPriceArray = array();

foreach($AirLineDataArray as $arr)
{
    $stp = count($arr->AirlineOutboundStopsIDs);
    $stp2 = count($arr->AirlineInboundStopsIDs); 
        
        if($stp+$stp2 == 0)
        {
            array_push($directStopPriceArray, $arr->AirlinePrice);
        }
        else if($stp+$stp2 == 1)
        {
            array_push($oneStopPriceArray, $arr->AirlinePrice);
        }
        else 
        {
            array_push($twoStopPriceArray, $arr->AirlinePrice);
        }
}
$DirectPrice =0;
if(count($directStopPriceArray))
{
    $DirectPrice = min($directStopPriceArray);
}
$OnePrice = 0;
if(count($oneStopPriceArray))
{
    $OnePrice = min($oneStopPriceArray);
}
$TwoPrice = 0;
if(count($twoStopPriceArray))
{
    $TwoPrice = min($twoStopPriceArray);
}

$duration_max_hours = floor(max($durationArray)/60);

$duration_max_minutes = max($durationArray)-(60*$duration_max_hours);
if($duration_max_minutes>=30)
{
    $duration_max_hours = $duration_max_hours + 0.5;    
}


$duration_min_hours = floor(min($durationArray)/60);

$duration_min_minutes = min($durationArray)-(60*$duration_min_hours);
if($duration_min_minutes>=30)
{
    $duration_min_hours = $duration_min_hours + 0.5;    
}

$carrierIDArray = array_unique($carrierIDArray);
$carrierNameArray = array();
$carrierImgArray = array();
$NewcarrierIDArray = array();






$placesIDArray = array();
$placesNameArray = array();
$placesCodeArray = array();

foreach($Places as $pp => $p)
{
    array_push($placesIDArray, $p['Id']);
    array_push($placesNameArray, $p['Name']);
    array_push($placesCodeArray, $p['Code']);
}


 ?>



<style>
    .datepicker.dropdown-menu
    {
        z-index: 9999999999999999999999999;
    }
    .flight-box-styling hr
    {
            margin-top: 10px;
    margin-bottom: 5px;
    border: 0;
    border-top: 1px solid #dedede;
    }
    .flight-box-styling h3
    {
        font-size: 20px;
        margin-top: 18px;
    }
</style>
<section id="search">
        <div class="container">
            <div class="row">
                 
                <!-- <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Search Results</h2>
                        <div class="back-title"><h3>Search Results</h3></div>
                    </div>

                </div>
            -->
            
                <div class="col-md-12">
                    <h3 class="booking-title"><strong><?php echo $departure; ?></strong> to <strong><?php echo $arrival; ?></strong></h3>
                    <h3 class="booking-title btitlefont2"><?php echo $searchManualQuery['triptype'].' '.$searchManualQuery['cabinclass']; ?> class departuring on <strong><?php echo $searchManualQuery['departure']; ?></strong> for <?php echo $searchManualQuery['passenger']['adult']; ?> Adult, <?php echo $searchManualQuery['passenger']['children']; ?> Child, <?php echo $searchManualQuery['passenger']['infant']; ?> Infant.
                    </h3>
            <?php if($dataCount==0){echo ' <h3 class="booking-title"><strong>Sorry, No Flights Available Currently</strong></h3>';} ?>
                </div>
                
                
                
            </div>
        </div>
    </section>  
    <style>
        .panel-default>.panel-heading
        {
            padding: 5px !important;
            font-family: 'Josefin Sans', serif;
            background: transparent !important;
        }
        .panel-heading i
        {
            float: right;
        }
        .panel-heading h5
        {
            text-transform: capitalize;
            font-size: 18px;
            margin-bottom: 0;
        }
        .panel-group .panel
        {
            background: transparent;
            border:0;
        }
        .panel-default>.panel-heading a:focus
        {
            text-decoration: none;
        }
        .panel-default>.panel-heading a i
        {
                -webkit-transition: all 0.2s ease;
                -moz-transition: all 0.2s ease;
                -o-transition: all 0.2s ease;
                transition: all 0.2s ease;
        }
        .panel-default>.panel-heading a.collapsed i
        {
            -webkit-transform:rotate(180deg);
            transform:rotate(180deg);
        }
        .checkbox_wrapper
        {
                margin-top: .75rem;
            margin-bottom: .75rem;
        }
        .checbox_label
        {
                position: relative;
            /* display: inline-block; */
            /* padding-left: 1.5rem; */
            margin: 0;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 400;
            letter-spacing: normal;
            display: block;
            padding-left: 1.875rem;
        }
        
        .checbox_label input
        {
            position: absolute;
            top: .1875rem;
            left: 0;
            width: 1.5rem;
            height: 1.5rem;
            margin: 0;
            padding: 0;
            border: 0;
            background: url(http://localhost/easy/themes/default/assets/img/empty.svg) no-repeat;
            cursor: pointer;
            vertical-align: text-bottom;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .checkbox_wrapper.labelchecked input
        {
            background: url(http://localhost/easy/themes/default/assets/img/checked.svg) no-repeat;
        }
        .checbox_label svg
        {
            width: 0.75rem;
            height: 0.75rem;
            position: absolute;
            top: .375rem;
            left: .1875rem;
            display: none;
            width: 16px !important;
            height: 14px !important;
            margin: 0;
            padding: 0;
            border: 0;
            cursor: pointer;
            vertical-align: text-bottom;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            display: block;
            fill: #fff;
            fill: var(--bpk-checkbox-checked-color,#fff);
        }
        .checkbox_wrapper.labelchecked svg
        {
            fill: #0770e3;
            fill: var(--bpk-checkbox-checked-color,#0770e3);
        }
        .checbox_label span
        {
                margin: 10px;
            font-size: 14px;
            line-height: 1.125rem;
            font-weight: 400;
            letter-spacing: normal;
            vertical-align: baseline;
            font-family: 'Josefin Sans', serif;
        }
        .checkbox_wrapper .price
        {
                font-size: 12px;
            line-height: 1.125rem;
            font-weight: 400;
            letter-spacing: normal;
            color: #68697f;
            display: block;
            margin-left: 35px;
            font-family: 'Josefin Sans', serif;
        }
        body
        {
                background: #f1f2f8;
        }
        @media(min-width: 992px)
        {
            #accordion .col-md-12
            {
                padding: 0 5px;
            }
        }
    </style>
<style>
    .nav-pills>li
    {
        width: 33%;
    }
    .nav-pills li a
    {
            color: #042759;
            background-color: #fff;
            font-family: 'Josefin Sans', serif;
            padding: 14px 15px 10px
    }
    .nav-pills li a h5,
    .nav-pills li a p
    {
        color: #333;
        margin: 5px 0;
    }
    .nav-pills li a h3
    {
        font-size: 32px;
        font-weight: 600;
            margin: 5px 0;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus
    {
            color: #fff!important;
            background-color: #042759!important;
    }
    .nav-pills>li.active>a h5, .nav-pills>li.active>a:hover h5, .nav-pills>li.active>a:focus h5,
    .nav-pills>li.active>a p, .nav-pills>li.active>a:hover p, .nav-pills>li.active>a:focus p
    {
        color: #fff!important;
    }
    .nav-pills li a:hover
    {
        background: #fff!important;
    }
    .nav-pills li:first-child a
    {
        border-top-left-radius: .375rem !important;
        border-bottom-left-radius: .375rem !important;
        box-shadow: inset -1px 0 0 0 #f1f2f8;
    }
    .nav-pills li:last-child a
    {
        border-top-right-radius: .375rem !important;
        border-bottom-right-radius: .375rem !important;
    }
    .nav-pills li:nth-child(2) a
    {
        box-shadow: inset -1px 0 0 0 #f1f2f8;
    }
    .nav-pills>li+li
    {
        margin: 0;
    }
    .airlinesnames
    {
        vertical-align: sub !important;
    }
</style>
<?php

$query_stop = '';

if(isset($_GET['stops']))
{
    $query_stop = $_GET['stops'];
}
else
{
    $query_stop = '0,1,2';
}



$query_airline_ids= '';

if(isset($_GET['airlines_ids']))
{
    $query_airline_ids = $_GET['airlines_ids'];
}

if($query_airline_ids!='')
{
    $inputAirlineIdArray = explode(',',$query_airline_ids);
}






 ?>
 <?php if($dataCount!=0) : ?>
<div class="listingbg">
    <div class="container">
        <div class="col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#" href="#collapse1"><h5>Stops <i class="fa fa-angle-down"></i></h5></a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkbox_wrapper check_stops <?php if(strpos($query_stop,'0')!==FALSE||$query_stop=='0'){echo 'labelchecked';} ?>" data-val="0">
                                    <label class="checbox_label label_unchecked">
                                        <input type="checkbox" class="" name="direct" aria-label="Direct" aria-invalid="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  class="BpkCheckbox_bpk-checkbox__icon__1KuPa" style="width: 0.75rem; height: 0.75rem;"><path d="M9.4 20c-.5 0-.9-.2-1.3-.5l-5.8-5.1c-.4-.4-.5-1-.1-1.4l1.3-1.5c.4-.4 1-.5 1.4-.1l4 3.5c.2.1.4.1.6 0l9.2-10.5c.4-.4 1-.5 1.4-.1l1.5 1.3c.4.4.5 1 .1 1.4L10.9 19.3c-.4.5-.9.7-1.5.7z"></path>
                                        </svg>
                                        <span class="" aria-hidden="true">Direct</span>
                                    </label>
                                    <span class="price">$&nbsp;<?php if($DirectPrice==0){echo "Not Available";}else{echo $DirectPrice;} ?></span>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkbox_wrapper check_stops <?php if(strpos($query_stop,'1')!==FALSE||$query_stop=='1'){echo 'labelchecked';} ?>" data-val="1">
                                    <label class="checbox_label label_unchecked">
                                        <input type="checkbox" class="" name="onestop" aria-label="Direct" aria-invalid="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  class="BpkCheckbox_bpk-checkbox__icon__1KuPa" style="width: 0.75rem; height: 0.75rem;"><path d="M9.4 20c-.5 0-.9-.2-1.3-.5l-5.8-5.1c-.4-.4-.5-1-.1-1.4l1.3-1.5c.4-.4 1-.5 1.4-.1l4 3.5c.2.1.4.1.6 0l9.2-10.5c.4-.4 1-.5 1.4-.1l1.5 1.3c.4.4.5 1 .1 1.4L10.9 19.3c-.4.5-.9.7-1.5.7z"></path>
                                        </svg>
                                        <span class="" aria-hidden="true">1 Stop</span>
                                    </label>
                                    <span class="price">$&nbsp;<?php if($OnePrice==0){echo "Not Available";}else{echo $OnePrice;} ?></span>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkbox_wrapper check_stops <?php if(strpos($query_stop,'2')!==FALSE||$query_stop=='2'){echo 'labelchecked';} ?>" data-val="2,3,4,5,6,7">
                                    <label class="checbox_label label_unchecked">
                                        <input type="checkbox" class="" name="twostop" aria-label="Direct" aria-invalid="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  class="BpkCheckbox_bpk-checkbox__icon__1KuPa" style="width: 0.75rem; height: 0.75rem;"><path d="M9.4 20c-.5 0-.9-.2-1.3-.5l-5.8-5.1c-.4-.4-.5-1-.1-1.4l1.3-1.5c.4-.4 1-.5 1.4-.1l4 3.5c.2.1.4.1.6 0l9.2-10.5c.4-.4 1-.5 1.4-.1l1.5 1.3c.4.4.5 1 .1 1.4L10.9 19.3c-.4.5-.9.7-1.5.7z"></path>
                                        </svg>
                                        <span class="" aria-hidden="true">2+ Stops</span>
                                    </label>
                                    <span class="price">$&nbsp;<?php if($TwoPrice==0){echo "Not Available";}else{echo $TwoPrice;} ?></span>
                                    
  
 

                                </div>
                            </div>
                        </div>               
                    </div>
                  </div>
                </div>
                <style>
                                    .tooltip.top
                                    {
                                        display: none;
                                    }
                                    .slider-selection
                                    {
                                        background-color: #000;
                                    }
                                    #time-range1 h5,
                                    #time-range2 h5,
                                    #time-range3 h5
                                    {
                                        font-size: 18px;
                                            margin: 5px 0;
                                            font-family: 'Josefin Sans', serif;
                                    }
                                    .slider.slider-horizontal
                                    {
                                        width: 100% !important;
                                    }
                                    #time-range2
                                    {
                                        margin: 40px 0 0 0;
                                    }
                                    #time-range1 p,
                                    #time-range2 p,
                                    #time-range3 p
                                    {
                                        font-size: 15px;
                                            margin: 5px 0;
                                            font-family: 'Josefin Sans', serif;
                                    }
                </style>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#" href="#collapse3"><h5>Journey Duration <i class="fa fa-angle-down"></i></h5></a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <script>
                                  $( function() {
                                    
                                    
                                  } );
                                  
                                  </script>
                                    <div id="time-range3">
                                        <h5>Journey Duration</h5>
                                        <p><span class="slider-time"><?php echo $duration_min_hours; ?> hours</span> - <span class="slider-time2"><?php echo $duration_max_hours; ?> hours</span>

                                        </p>
                                        <div class="sliders_step1">
                                            <div id="slider-range3"></div>
                                        </div>
                                    </div>
                                    
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#" href="#collapse4"><h5>Airlines <i class="fa fa-angle-down"></i></h5></a>
                    </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <?php
                            foreach($carrierIDArray as $arr)
                            {

                                foreach($Carriers as $cc => $c)
                                {
                                    if($arr == $c['Id'])
                                    {
                                        array_push($carrierNameArray,$c['Name']);
                                        array_push($carrierImgArray,$c['ImageUrl']);
                                        array_push($NewcarrierIDArray,$c['Id']);
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="checkbox_wrapper check_airline <?php if($query_airline_ids===''){echo "labelchecked";}else if(strpos($query_airline_ids,strval($arr))!==FALSE){echo "labelchecked";} ?> " data-val="<?php echo $c['Id']; ?>">
                                                    <label class="checbox_label label_unchecked ">
                                                        <input type="checkbox" class="" name="direct" aria-label="Direct" aria-invalid="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  class="BpkCheckbox_bpk-checkbox__icon__1KuPa" style="width: 0.75rem; height: 0.75rem;"><path d="M9.4 20c-.5 0-.9-.2-1.3-.5l-5.8-5.1c-.4-.4-.5-1-.1-1.4l1.3-1.5c.4-.4 1-.5 1.4-.1l4 3.5c.2.1.4.1.6 0l9.2-10.5c.4-.4 1-.5 1.4-.1l1.5 1.3c.4.4.5 1 .1 1.4L10.9 19.3c-.4.5-.9.7-1.5.7z"></path>
                                                        </svg>
                                                        <span class="airlinesnames" aria-hidden="true"><?php echo $c['Name']; ?></span>
                                                    </label>
                                                </div>
                                            </div>
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
              </div> 
        </div>
        <div class="col-md-9">
            <ul class="nav nav-pills">
                <li class="active">
                    <a data-toggle="pill" href="#best">
                        <?php
                            $price = 0;
                            $duration = 0;
                            foreach($AirLineDataArray as $arr)
                            {
                                $aircheck = 0;
                                $stopcheck = 0;
                                foreach($Legs as $lg => $l)
                                {
                                    if($l['Id']==$arr->AirlineOutboundLegId)
                                    {
                                        $price = $arr->AirlinePrice;
                                        $duration = $l['Duration'];

                                        break;
                                    }
                                }
                                break;
                            }

                            $besthours= floor($duration/60);
                            $bestminutes = $duration - (60*$besthours);

                         ?>
                        <h5>Best</h5>
                        <h3>$<?php echo $price; ?></h3>
                        <p><?php echo $besthours; ?>h <?php echo $bestminutes; ?> (average)</p>
                    </a>
                </li>
                <li>
                    <a data-toggle="pill" href="#cheapest">
                        <?php

                        $urlcheap = "https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/pricing/uk2/v1.0/".$session_key."?sortType=price&sortOrder=asc&originAirports=".$departureCheap."-sky&destinationAirports=".$arrivalCheap."-sky".$query_flight_duration."&pageIndex=0&pageSize=1000";
                        $urlcheap = filter_var($urlcheap, FILTER_SANITIZE_URL);
                        $curl = curl_init();
                        $options =array(
                            CURLOPT_URL => $urlcheap,
                            CURLOPT_RETURNTRANSFER => true,
                            
                            CURLOPT_HTTPHEADER => array(
                                "content-type: application/x-www-form-urlencoded",
                                "x-rapidapi-host: skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
                                "x-rapidapi-key: a641f074a2msh2cfd35a1866f161p1e7310jsnf03764502d9e"
                            )
                        );
                            //print_r($options);
                        curl_setopt_array($curl,$options);

                        $responseCheap = curl_exec($curl);
                        $err = curl_error($curl);
                        //echo $responseCheap;
                        curl_close($curl);
                        $responseCheap = json_decode($responseCheap, true);

                        $ItinerariesCheap = $responseCheap['Itineraries'];

                        //print_r($responseCheap);

                        $AirLineDataCheapArray = array();

                        $i = 0;

                        foreach($ItinerariesCheap as $it => $val)
                        {
                            $d = new AirLineData();
                            $prices = $val['PricingOptions'];
                            foreach($prices as $pp =>$p)
                            {


                                $agent = $p['Agents'][0];
                                
                                foreach($Agents as $agt => $a)
                                {
                                    if($a['Id']==$agent && $a['Type']=='Airline')
                                    {   
                                        $d->AirlineName = $a['Name'];
                                        $d->AirlineImg = $a['ImageUrl'];
                                        $d->AirlineAgentId = $a['Id'];
                                        break;
                                    }
                                    
                                }
                                if($d->AirlineName != '')
                                {
                                    $d->AirlinePrice = round($p['Price'] -  ($p['Price']*($discount/100)),1);   
                                    break;   
                                }

                            }
                            if($d->AirlineName != '')
                            {
                                $OutboundLegId = $val['OutboundLegId']; 

                                $d->AirlineOutboundLegId = $OutboundLegId;
                                
                                    foreach($Legs as $ll =>$l)
                                    {
                                        if($l['Id']==$OutboundLegId)
                                        {
                                            foreach($l['SegmentIds'] as $segmentID => $id)
                                            {
                                                array_push($d->AirlineOutboundSegmentsIDs,$id);
                                            }
                                            foreach($l['Stops'] as $Stops => $id)
                                            {
                                                array_push($d->AirlineOutboundStopsIDs,$id);
                                            }
                                            
                                            
                                            break;
                                        }
                                    }
                                    if($inbound!='')
                                    {
                                        $InboundLegId = $val['InboundLegId']; 
                                        $d->AirlineInboundLegId = $InboundLegId;
                                        foreach($Legs as $ll =>$l)
                                        {
                                            if($l['Id']==$InboundLegId)
                                            {
                                                foreach($l['SegmentIds'] as $segmentID => $id)
                                                {
                                                    array_push($d->AirlineInboundSegmentsIDs,$id);
                                                }
                                                foreach($l['Stops'] as $Stops => $id)
                                                {
                                                    array_push($d->AirlineInboundStopsIDs,$id);
                                                }
                                                
                                                break;
                                            }
                                        }
                                    }
                                    array_push($AirLineDataCheapArray,$d);
                            }
                        }




                         ?>
                         <?php
                            $price = 0;
                            $duration = 0;
                            foreach($AirLineDataCheapArray as $arr)
                            {
                                $aircheck = 0;
                                $stopcheck = 0;
                                foreach($Legs as $lg => $l)
                                {
                                    if($l['Id']==$arr->AirlineOutboundLegId)
                                    {
                                        $price = $arr->AirlinePrice;
                                        $duration = $l['Duration'];

                                        break;
                                    }
                                }
                                break;
                            }

                            $besthours= floor($duration/60);
                            $bestminutes = $duration - (60*$besthours);

                         ?>
                        <h5>Cheapest</h5>
                        <h3>$<?php echo $price; ?></h3>
                        <p><?php echo $besthours; ?>h <?php echo $bestminutes; ?> (average)</p>
                    </a>
                </li>
                <li>
                    <a data-toggle="pill" href="#fastest">
                        <?php

                        $urlcheap = "https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/pricing/uk2/v1.0/".$session_key."?sortType=duration&sortOrder=asc&originAirports=".$departureCheap."-sky&destinationAirports=".$arrivalCheap."-sky".$query_flight_duration."&pageIndex=0&pageSize=1000";
                        $urlcheap = filter_var($urlcheap, FILTER_SANITIZE_URL);
                        $curl = curl_init();
                        $options =array(
                            CURLOPT_URL => $urlcheap,
                            CURLOPT_RETURNTRANSFER => true,
                            
                            CURLOPT_HTTPHEADER => array(
                                "content-type: application/x-www-form-urlencoded",
                                "x-rapidapi-host: skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
                                "x-rapidapi-key: a641f074a2msh2cfd35a1866f161p1e7310jsnf03764502d9e"
                            )
                        );
                            //print_r($options);
                        curl_setopt_array($curl,$options);

                        $responseCheap = curl_exec($curl);
                        $err = curl_error($curl);
                        //echo $responseCheap;
                        curl_close($curl);
                        $responseCheap = json_decode($responseCheap, true);

                        $ItinerariesCheap = $responseCheap['Itineraries'];

                        //print_r($responseCheap);

                        $AirLineDataDurationArray = array();

                        $i = 0;

                        foreach($ItinerariesCheap as $it => $val)
                        {
                            $d = new AirLineData();
                            $prices = $val['PricingOptions'];
                            foreach($prices as $pp =>$p)
                            {


                                $agent = $p['Agents'][0];
                                
                                foreach($Agents as $agt => $a)
                                {
                                    if($a['Id']==$agent && $a['Type']=='Airline')
                                    {   
                                        $d->AirlineName = $a['Name'];
                                        $d->AirlineImg = $a['ImageUrl'];
                                        $d->AirlineAgentId = $a['Id'];
                                        break;
                                    }
                                    
                                }
                                if($d->AirlineName != '')
                                {
                                    $d->AirlinePrice = round($p['Price'] -  ($p['Price']*($discount/100)),1);   
                                    break;   
                                }

                            }
                            if($d->AirlineName != '')
                            {
                                $OutboundLegId = $val['OutboundLegId']; 

                                $d->AirlineOutboundLegId = $OutboundLegId;
                                
                                    foreach($Legs as $ll =>$l)
                                    {
                                        if($l['Id']==$OutboundLegId)
                                        {
                                            foreach($l['SegmentIds'] as $segmentID => $id)
                                            {
                                                array_push($d->AirlineOutboundSegmentsIDs,$id);
                                            }
                                            foreach($l['Stops'] as $Stops => $id)
                                            {
                                                array_push($d->AirlineOutboundStopsIDs,$id);
                                            }
                                            
                                            
                                            break;
                                        }
                                    }
                                    if($inbound!='')
                                    {
                                        $InboundLegId = $val['InboundLegId']; 
                                        $d->AirlineInboundLegId = $InboundLegId;
                                        foreach($Legs as $ll =>$l)
                                        {
                                            if($l['Id']==$InboundLegId)
                                            {
                                                foreach($l['SegmentIds'] as $segmentID => $id)
                                                {
                                                    array_push($d->AirlineInboundSegmentsIDs,$id);
                                                }
                                                foreach($l['Stops'] as $Stops => $id)
                                                {
                                                    array_push($d->AirlineInboundStopsIDs,$id);
                                                }
                                                
                                                break;
                                            }
                                        }
                                    }
                                    array_push($AirLineDataDurationArray,$d);
                            }
                        }




                         ?>
                         <?php
                            $price = 0;
                            $duration = 0;
                            foreach($AirLineDataDurationArray as $arr)
                            {
                                $aircheck = 0;
                                $stopcheck = 0;
                                foreach($Legs as $lg => $l)
                                {
                                    if($l['Id']==$arr->AirlineOutboundLegId)
                                    {
                                        $price = $arr->AirlinePrice;
                                        $duration = $l['Duration'];

                                        break;
                                    }
                                }
                                break;
                            }

                            $besthours= floor($duration/60);
                            $bestminutes = $duration - (60*$besthours);

                         ?>
                        <h5>Fastest</h5>
                        <h3>$<?php echo $price; ?></h3>
                        <p><?php echo $besthours; ?>h <?php echo $bestminutes; ?> (average)</p>
                    </a>
                </li>
                
              </ul>
              <style>
                  .ticket-wrapper
                  {
                        margin: .75rem 0;
                  }
                  .ticket-detail, .ticket-price
                  {
                    box-shadow: 0 1px 3px 0 rgba(37,32,31,.3);
                        transition: all .3s ease-in-out;
                  }
                  .ticket-wrapper:hover .ticket-detail, .ticket-wrapper:hover .ticket-price
                  {
                    box-shadow: 0 2px 10px 2px rgba(37,32,31,.3);
                  }
                  .ticket-detail
                  {
                        position: relative;
                    background-color: #fff;
                    border-radius: 0;
                    padding: .75rem;
                        z-index: 0;
                        width: 66%;
                        display: inline-block;
                            position: relative;
                    background-color: #fff;
                    border-radius: 0;
                    padding: .75rem;
                    z-index: 0;
                    width: 66%;
                    display: inline-block;
                    flex: 2 1 auto;
                    border-radius: .375rem 0 0 .375rem;
                  }
                  .ticket-line
                  {
                        position: relative;
                        z-index: 1;
                        background-color: #fff;
                        background-image: linear-gradient(#dddde5,#dddde5);
                        background-repeat: repeat-y;
                        background-position: 50% 0;
                        background-size: .125rem .5rem;
                        width: .75rem;
                        margin: .375rem -4px;
                        padding: .375rem 0;
                        display: inline-block;
                        width: .75rem;
                        margin: .375rem auto;
                        padding: .375rem 0;
                        position: relative;
                        z-index: 1;
                        flex: 0 0 auto;
                        background-color: #fff;
                        background-image: linear-gradient(#dddde5,#dddde5);
                        background-repeat: repeat-y;
                        background-position: 50% 0;
                        background-size: .125rem .5rem;
                        width: .75rem;
                        margin: 0.45rem auto;
                        padding: 3.375rem 0;
                  }
                  .ticket-line .top-notch,
                  .ticket-line .bottom-notch
                  {
                        position: absolute;
                        width: .75rem;
                        height: .375rem;
                        overflow: hidden;
                  }
                  .ticket-line .top-notch
                  {
                    top: -.375rem;
                  }
                  .ticket-line .bottom-notch
                  {
                        bottom: -.375rem;
                  }
                  .ticket-line .top-notch:after
                  {
                    position: relative;
                    content: "";
                    display: block;
                    width: 1.5rem;
                    height: 1.5rem;
                    transform: translateZ(0);
                    border: .375rem solid #fff;
                    border-radius: .75rem;
                    box-shadow: inset 0 1px 3px 0 rgba(37,32,31,.3);
                    right: -50%;
                    bottom: 200%;
                    left: -50%;
                  }
                  .ticket-line .bottom-notch:after
                  {
                    position: relative;
                    content: "";
                    display: block;
                    width: 1.5rem;
                    height: 1.5rem;
                    transform: translateZ(0);
                    border: .375rem solid #fff;
                    border-radius: .75rem;
                    box-shadow: inset 0 1px 3px 0 rgba(37,32,31,.3);
                    right: -50%;
                    bottom: 100%;
                    left: -50%;
                  }
                  .ticket-price
                  {
                    position: relative;
                    background-color: #fff;
                    z-index: 0;
                    min-width: 30%;
                    border-radius: 0 .375rem .375rem 0;
                    padding: .75rem;
                    padding: 1.125rem;
                    justify-content: center;
                    align-items: center;
                    width: 32%;
                    display: inline-block;
                    position: relative;
                    background-color: #fff;
                    z-index: 0;
                    min-width: 30%;
                    border-radius: 0 .375rem .375rem 0;
                    display: flex;
                    padding: 1.125rem;
                    justify-content: center;
                    align-items: center;
                    flex: 0 0 32%;
                  }
                  .ticket-leg-info .ticket-img
                  {
                    width: 22%;
                    display: inline-block;
                    float: left;
                  }
                  .ticket-leg-info .ticket-img button
                  {
                    padding: 0;
                  }
                  .ticket-leg-info .ticket-leg-info-detail
                  {
                    width: 78%;
                    display: inline-block;
                    float: left;
                        display: flex;
                  }
                  .ticket-leg-info
                  {
                    padding: 15px 0;
                    position: relative;
                    display: flex;
                  }
                  .route-from
                  {
                    display: flex;
                        max-width: 32%;
                        padding-right: .375rem;
                        flex-direction: column;
                        align-items: flex-end;
                        flex: 0 1 32%;
                        text-align: right;
                  }
                  .route-time
                  {
                    font-size: 32px;
                    line-height: 1.875rem;
                    font-weight: 400;
                    letter-spacing: normal;
                    color: #444560;
                  }
                  .route-code
                  {
                    font-size: 20px;
                    line-height: 1.5rem;
                    font-weight: 400;
                    letter-spacing: normal;
                  }
                  .route-code button
                  {
                        font-size: 20px;
                        line-height: 1.5rem;
                        font-weight: 400;
                        letter-spacing: normal;
                        background: transparent;
                        color: #68697f;
                        cursor: help;
                        padding: 0;
                        margin: 10px 0 0;
                  }
                  .route-stop
                  {
                        max-width: 36%;
                        padding: 0 .375rem;
                        flex: 0 1 36%;
                        text-align: center;
                  }
                  .route-duration
                  {
                    font-size: 16px;
                    line-height: 1.125rem;
                    font-weight: 400;
                    letter-spacing: normal;
                    color: #444560;
                    margin-bottom: 10px;
                  }
                  .route-line
                  {
                        position: relative;
                        display: block;
                        width: 90%;
                        height: .125rem;
                        margin: .375rem auto;
                        padding: 0;
                        border-radius: .375rem;
                        background-color: #68697f;
                        line-height: 0;
                        text-align: center;
                  }
                  .route-line:after
                  {
                    position: absolute;
                    top: 50%;
                    right: -.375rem;
                    content: "";
                    display: block;
                    width: 1rem;
                    height: 1rem;
                    margin-top: -.5rem;
                    background-color: #fff;
                    background-image: url(https://js.skyscnr.com/sttc/acorn/static/media/plane-end.c2f1764f.svg);
                    background-repeat: no-repeat;
                    background-position: 100% 50%;
                    background-size: .75rem;
                  }
                  .route-current-stop
                  {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    align-items: baseline;
                    margin-top: 10px;
                  }
                  .direct
                  {
                        font-size: 16px;
                        line-height: 1.125rem;
                        font-weight: 400;
                        letter-spacing: normal;
                        color: #00a698;
                  }
                  .route-current-stop button
                  {
                        font-size: 16px;
                        line-height: normal;
                        font-weight: 400;
                        letter-spacing: normal;
                        color: #444560;
                        background: transparent;
                        padding: 0;
                  }
                  .route-to
                  {
                        display: flex;
                        max-width: 32%;
                        padding-left: .375rem;
                        flex-direction: column;
                        align-items: flex-start;
                        flex: 0 1 32%;
                        text-align: left;
                  }
                  .ticket-detail button:hover
                  {
                    color: #000;
                  }
                  .ticket-leg-info
                  {
                    font-family: 'Josefin Sans', serif;
                  }
                  .stop-point
                  {
                    position: relative;
                    top: -.125rem;
                    display: inline-block;
                    width: .375rem;
                    height: .375rem;
                    margin: 0 4%;
                    border-radius: .375rem;
                    background-color: #d1435b;
                    background-image: none;
                    line-height: 0;
                    box-shadow: 0 0 0 0.125rem #fff;
                    zoom: 1;
                  }
                  .ticket-wrapper .a_div
                  {
                    position: relative;
                        display: block;
                        display: flex;
                        flex-direction: row;
                        align-items: stretch;
                        color: #111236;
                        text-decoration: none;
                        /* box-shadow: 0 1px 3px 0 rgba(37,32,31,.3); */
                        border-radius: .375rem;
                        z-index: 0;
                        /* box-shadow: none; */
                        overflow: visible;
                  }
                  .price-container
                  {
                                            display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        align-content: center;
                  }
                  .display-price
                  {
                        display: flex;
                        align-items: center;
                        font-size: 26px;
                        line-height: 1.875rem;
                        font-weight: 400;
                        letter-spacing: normal;
                        font-weight: 700;
                        font-family: 'Josefin Sans', serif;
                  }
                  .price-container a
                  {
                    display: inline-block;
                    margin: 7px 0;
                    padding: .375rem 1.125rem;
                    border: 0;
                    background-image: linear-gradient(-180deg,#00a698,#00a698);
                    background-image: linear-gradient(-180deg,var(--bpk-button-primary-gradient-start-color,#00a698),var(--bpk-button-primary-gradient-end-color,#00a698));
                    font-weight: 700;
                    line-height: 1.5rem;
                    text-align: center;
                    text-decoration: none;
                    box-shadow: none;
                    cursor: pointer;
                    vertical-align: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                    color: #fff;
                    color: var(--bpk-button-primary-text-color,#fff);
                    background-color: #00a698;
                    background-color: var(--bpk-button-primary-background-color,#00a698);
                    border-radius: .25rem;
                    border-radius: var(--bpk-button-border-radius,.25rem);
                    font-size: 1.1875rem;
                    font-size: var(--bpk-button-font-size,1.1875rem);
                    font-family: 'Josefin Sans', serif;
                  }

                  .tooltip.in
                  {
                    opacity: 1;
                  }
                  .tooltip.top .tooltip-arrow
                  {
                        border-top-color: #000;
                  }
                  .tooltip-inner
                  {
                        color: #000;
                        text-align: center;
                        background-color: #fff;
                        font-family: 'Josefin Sans', serif;
                        box-shadow: 0px 3px 18px 1px rgba(37, 32, 31, 0.32);
                  }
                  .showstop
                  {
                    color: #d1435b;
                  }
                  @media(max-width: 768px)
                  {
                    .ticket-wrapper .a_div
                    {
                        display: block;
                    }
                    .ticket-detail
                    {
                        width: 100%;
                    }
                    .ticket-line
                    {
                        display: none;
                    }
                    .ticket-price
                    {
                            width: 100%;
                    }
                    .ticket-leg-info
                    {
                        display: block;
                    }
                    .ticket-leg-info .ticket-img
                    {
                        width: 100%;
                        float: none;
                        margin: 20px auto;
                        text-align: center;
                    }
                    .ticket-leg-info .ticket-leg-info-detail
                    {
                        width: 100%;
                        float: none;
                    }
                  }
                  .ticket-img img
                  {
                    width: 60px;
                  }
              </style>
                <style>
                    .ticket-detail .head:focus, .ticket-detail .head:active
                    {
                        text-decoration: none;
                    }
                    .ticket-detail .panel-default
                    {
                        border:0;
                        margin: 0;
                    }   
                    .airlinedetails
                    {
                            margin-left: 70px;
                        margin-bottom: 20px;
                    }
                    .airlinedetails img
                    {
                            display: inline-block;
                        width: 60px;
                    }
                    .airlinedetails h5
                    {
                        display: inline-block;
                            margin-left: 20px;
                            font-size: 14px;
                            font-family: 'Josefin Sans', serif;
                    }
                    .leg_flight_detail
                    {
                            font-family: 'Josefin Sans', serif;
                        width: 100%;
                        display: flex;
                        align-items: center;
                        font-size: 16px;
                    }
                    .leg_duration
                    {
                        width: 15%;
                        display: inline-block;
                        float: left;
                        text-align: center;
                    }
                    .diagram
                    {
                            width: 6%;
                        display: inline-block;
                        /* float: left; */
                        display: flex;
                        padding-top: .375rem;
                        padding-right: 1.125rem;
                        padding-bottom: .375rem;
                        flex-direction: column;
                        justify-content: space-between;
                    }
                    .diagram:before,
                    .diagram:after
                    {
                        content: "";
                        display: block;
                        z-index: 2;
                        width: .625rem;
                        height: .625rem;
                        border: .125rem solid #b2b2bf;
                        border-radius: 100%;
                        background: #fff;
                    }
                    .diagram .timeline_track
                    {
                            position: relative;
                        left: .25rem;
                        display: flex;
                        flex-grow: 1;
                        height: 25px;
                    }
                    .diagram .timeline_track:after
                    {
                            position: relative;
                        content: "";
                        width: .125rem;
                        background-color: #b2b2bf;
                    }
                    .timing
                    {
                            width: 15%;
                        display: inline-block;
                        float: left;
                    }
                    .airports
                    {
                        width: 50%;
                        display: inline-block;
                        float: left;
                    }
                    .stay_at_airport
                    {
                            position: relative;
                        display: flex;
                        margin: .75rem -.75rem;
                        padding-top: .75rem;
                        padding-bottom: .75rem;
                        border-radius: .375rem;
                        background: #f1f2f8;
                        color: #d1435b;
                    }
                    .stay_duration
                    {
                            display: flex;
                        width: 4rem;
                        min-width: 1.875rem;
                        margin-left: 17px;
                        justify-content: center;
                        align-items: center;
                    }
                    .stay_title
                    {
                        position: relative;
                        display: inline-block;
                        padding-left: 1.75rem;
                    }
                    .display-price-total
                    {
                            font-family: 'Josefin Sans', serif;
                            font-size: 16px;
                            margin: 0;
                    }
                </style>

<?php

if($query_airline_ids==='')
{
    $inputAirlineIdArray = $NewcarrierIDArray;
}

 ?>
              <div class="tab-content">
                <div id="best" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $k=0;
                            foreach($AirLineDataArray as $arr)
                            {
                                $aircheck = 0;
                                $stopcheck = 0;
                                foreach($Legs as $lg => $l)
                                {
                                    if($l['Id']==$arr->AirlineOutboundLegId)
                                    {
                                        foreach($l['Carriers'] as $lc => $llc)
                                        {
                                            if(array_search(strval($llc), $inputAirlineIdArray)===FALSE)
                                            {
                                                $aircheck = 1;
                                            }
                                            else
                                            {
                                                $aircheck = 0;
                                                break;
                                            }
                                        }

                                        break;
                                    }

                                }

                                $s = count($arr->AirlineOutboundStopsIDs);
                                $s = $s + count($arr->AirlineInboundStopsIDs);
                                

                                if(strpos($query_stop,strval($s))===FALSE)
                                {
                                    $stopcheck = 1;
                                }
                                
                                if($aircheck==0 && $stopcheck ==0)
                                {
                                    
                                
                                ?>
                                <div class="ticket-wrapper">
                                    <div class="a_div">
                                        <div class="ticket-detail">
                                            <?php

                                            
                                            foreach($Legs as $lg => $l)
                                            {
                                                if($l['Id']==$arr->AirlineOutboundLegId)
                                                {
                                                    $CarrierName = '';
                                                    $CarrierImg = '';
                                                    
                                                    foreach($l['Carriers'] as $lc => $llc)
                                                    {
                                                        $carval = array_search($llc, $NewcarrierIDArray);
                                                        
                                                
                                                        $CarrierName = $carrierNameArray[$carval];
                                                        $CarrierImg = $carrierImgArray[$carval];
                                                        break;
                                                            
                                                    }
                                                    


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
                                                    $DestinationStation = $l['DestinationStation'];

                                                    

                                                    $carval = array_search($OriginStation, $placesIDArray);
                                                    $OriginStationName = $placesNameArray[$carval];
                                                    $OriginStationCode = $placesCodeArray[$carval];


                                                    $carval = array_search($DestinationStation, $placesIDArray);
                                                    $DestinationStationName = $placesNameArray[$carval];
                                                    $DestinationStationCode = $placesCodeArray[$carval];


                                                    $stopCodeArray = array();

                                                    foreach($l['Stops'] as $stops => $id)
                                                    {
                                                        array_push($stopCodeArray, $id);
                                                    }
                                                    $stopName = array();
                                                    $stopCode = array();

                                                    foreach($stopCodeArray as $id)
                                                    {   
                                                        $carval = array_search($id, $placesIDArray);
                                                        array_push($stopName, $placesNameArray[$carval]);
                                                        array_push($stopCode, $placesCodeArray[$carval]);

                                                    }

                                                    $flight_duration = $l['Duration'];

                                                    $flight_duration_hours = floor($flight_duration/60);
                                                    $flight_duration_minutes = $flight_duration - (60*$flight_duration_hours);
                                                    $wait_time = 0;
                                                    $wt='';
                                                    ?>
                                                    <div class="panel panel-default">
                                                      <a data-toggle="collapse" data-parent="#" href="#leg<?php echo $k; ?>" class="head">
                                                        <div class="ticket-leg-info">
                                                            <div class="ticket-img">
                                                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $CarrierName; ?>">
                                                                    <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                </button>
                                                            </div>
                                                            <div class="ticket-leg-info-detail">
                                                                <div class="route-from">
                                                                    <div class="route-time">
                                                                        <?php echo $timeDeparture[0].":".$timeDeparture[1]; ?>
                                                                    </div>
                                                                    <div class="route-code">
                                                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $OriginStationName; ?>"><?php echo $OriginStationCode; ?></button>
                                                                    </div>
                                                                </div> 
                                                                <div class="route-stop">
                                                                    <div class="route-duration">
                                                                        <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?>
                                                                    </div>
                                                                    <div class="route-line">
                                                                        <?php
                                                                            if(count($stopName)>=1)
                                                                            {
                                                                                foreach($stopName as $n)
                                                                                {
                                                                                    echo '<span class="stop-point"></span>';
                                                                                }
                                                                            }
                                                                            else
                                                                            {

                                                                            }


                                                                         ?>
                                                                        
                                                                    </div>
                                                                    <div class="route-current-stop">
                                                                        <?php

                                                                        if(count($stopName)>=1)
                                                                        {
                                                                            echo '<span class="direct showstop">'.count($stopName).' stops</span>';
                                                                            $i=0;
                                                                            foreach($stopName as $n)
                                                                            {
                                                                                ?>
                                                                                <span>
                                                                                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $n ?>">
                                                                                        <?php echo $stopCode[$i]; ?>
                                                                                    </button>
                                                                                </span>
                                                                                <?php
                                                                                $i++;
                                                                            }

                                                                        }
                                                                        else
                                                                        {
                                                                            echo '<span class="direct">direct</span>';
                                                                        }



                                                                         ?>
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="route-to">
                                                                    <div class="route-time">
                                                                        <?php echo $timeArrival[0].":".$timeArrival[1]; ?>
                                                                    </div>
                                                                    <div class="route-code">
                                                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $DestinationStationName; ?>"><?php echo $DestinationStationCode; ?></button>
                                                                    </div>
                                                                </div>        
                                                            </div>  
                                                        </div>
                                                      </a>
                                                      <div id="leg<?php echo $k++; ?>" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <?php 
                                                                
                                                                foreach($arr->AirlineOutboundSegmentsIDs as $id)
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

                                                                    $carval = array_search($Carrier, $NewcarrierIDArray);

                                                            
                                                                    $CarrierName = $carrierNameArray[$carval];
                                                                    $CarrierImg = $carrierImgArray[$carval];
                                                                    $FlightNumber = $Segments[$id]['FlightNumber'];

                                                                    $OriginStation = $Segments[$id]['OriginStation'];
                                                                    $DestinationStation = $Segments[$id]['DestinationStation'];

                                                                    $carval = array_search($OriginStation, $placesIDArray);
                                                                    $OriginStationName = $placesNameArray[$carval];
                                                                    $OriginStationCode = $placesCodeArray[$carval];


                                                                    $carval = array_search($DestinationStation, $placesIDArray);
                                                                    $DestinationStationName = $placesNameArray[$carval];
                                                                    $DestinationStationCode = $placesCodeArray[$carval];
                                                                    

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
                                                                        <div class="stay_at_airport">
                                                                            <span class="stay_duration"><?php echo $h; ?>h <?php echo $m; ?></span>
                                                                            <span class="stay_title">Connect in airport</span>
                                                                        </div>
                                                                        <?php
                                                                    }

                                                                    ?>
                                                                    <div class="leg_detail">
                                                                        <div class="airlinedetails">
                                                                            <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                            <h5><?php echo $CarrierName; ?> | <?php echo $FlightNumber; ?></h5>
                                                                        </div>
                                                                        <div class="leg_flight_detail">
                                                                            <div class="leg_duration">
                                                                                <?php echo $duration_segment_hours."h ".$duration_segment_minutes; ?>
                                                                            </div>
                                                                            <div class="diagram">
                                                                                <div class="timeline_track">
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <div class="timing">
                                                                                <div class="time"><?php echo $timed; ?></div>
                                                                                <div class="time"><?php echo $timea; ?></div>
                                                                            </div>
                                                                            <div class="airports">
                                                                                <div class="airport_name">
                                                                                    <?php echo $OriginStationCode." ".$OriginStationName; ?>
                                                                                </div>
                                                                                <div class="airport_name">
                                                                                    <?php echo $DestinationStationCode." ".$DestinationStationName; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     
                                                                    <?php
                                                                    $wt=$timea;
                                                                    $wait_time = '';
                                                                }
                                                                
                                                                ?>
                                                                <br>    
                                                                <p><strong>Journey duration:</strong> <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?></p>
                                                                
                                                        </div>
                                                      </div>

                                                    </div>
                                                    
                                                    <?php
                                                    if($inbound=='')
                                                    {
                                                        break;
                                                    }
                                                }
                                                if($inbound!='')
                                                {
                                                    if($l['Id']==$arr->AirlineInboundLegId)
                                                    {
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


                                                        $CarrierName = '';
                                                        $CarrierImg = '';
                                                        foreach($l['Carriers'] as $lc => $llc)
                                                        {
                                                            $carval = array_search($llc, $NewcarrierIDArray);

                                                    
                                                            $CarrierName = $carrierNameArray[$carval];
                                                            $CarrierImg = $carrierImgArray[$carval];
                                                            break;
                                                                
                                                        }
                                                        $OriginStation = $l['OriginStation'];
                                                        $DestinationStation = $l['DestinationStation'];

                                                        $carval = array_search($OriginStation, $placesIDArray);
                                                        $OriginStationName = $placesNameArray[$carval];
                                                        $OriginStationCode = $placesCodeArray[$carval];


                                                        $carval = array_search($DestinationStation, $placesIDArray);
                                                        $DestinationStationName = $placesNameArray[$carval];
                                                        $DestinationStationCode = $placesCodeArray[$carval];

                                                        $stopCodeArray = array();


                                                        foreach($l['Stops'] as $stops => $id)
                                                        {
                                                            array_push($stopCodeArray, $id);
                                                        }
                                                        $stopName = array();
                                                        $stopCode = array();

                                                        foreach($stopCodeArray as $id)
                                                        {   
                                                            $carval = array_search($id, $placesIDArray);
                                                            array_push($stopName, $placesNameArray[$carval]);
                                                            array_push($stopCode, $placesCodeArray[$carval]);

                                                        }

                                                        $flight_duration = $l['Duration'];

                                                        $flight_duration_hours = floor($flight_duration/60);
                                                        $flight_duration_minutes = $flight_duration - (60*$flight_duration_hours);
                                                        $wait_time = 0;
                                                        $wt='';
                                                        ?>
                                                        <div class="panel panel-default">
                                                          <a data-toggle="collapse" data-parent="#" href="#leg<?php echo $k; ?>" class="head">
                                                            <div class="ticket-leg-info">
                                                                <div class="ticket-img">
                                                                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $CarrierName; ?>">
                                                                        <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                    </button>
                                                                </div>
                                                                <div class="ticket-leg-info-detail">
                                                                    <div class="route-from">
                                                                        <div class="route-time">
                                                                            <?php echo $timeDeparture[0].":".$timeDeparture[1]; ?>
                                                                        </div>
                                                                        <div class="route-code">
                                                                            <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $OriginStationName; ?>"><?php echo $OriginStationCode; ?></button>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="route-stop">
                                                                        <div class="route-duration">
                                                                            <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?>
                                                                        </div>
                                                                        <div class="route-line">
                                                                            <?php
                                                                                if(count($stopName)>=1)
                                                                                {
                                                                                    foreach($stopName as $n)
                                                                                    {
                                                                                        echo '<span class="stop-point"></span>';
                                                                                    }
                                                                                }
                                                                                else
                                                                                {

                                                                                }


                                                                             ?>
                                                                            
                                                                        </div>
                                                                        <div class="route-current-stop">
                                                                            <?php

                                                                            if(count($stopName)>=1)
                                                                            {
                                                                                echo '<span class="direct showstop">'.count($stopName).' stops</span>';
                                                                                $i=0;
                                                                                foreach($stopName as $n)
                                                                                {
                                                                                    ?>
                                                                                    <span>
                                                                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $n ?>">
                                                                                            <?php echo $stopCode[$i]; ?>
                                                                                        </button>
                                                                                    </span>
                                                                                    <?php
                                                                                    $i++;
                                                                                }

                                                                            }
                                                                            else
                                                                            {
                                                                                echo '<span class="direct">direct</span>';
                                                                            }



                                                                             ?>
                                                                            
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="route-to">
                                                                        <div class="route-time">
                                                                            <?php echo $timeArrival[0].":".$timeArrival[1]; ?>
                                                                        </div>
                                                                        <div class="route-code">
                                                                            <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $DestinationStationName; ?>"><?php echo $DestinationStationCode; ?></button>
                                                                        </div>
                                                                    </div>        
                                                                </div>  
                                                            </div>
                                                          </a>
                                                          <div id="leg<?php echo $k++; ?>" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <?php 
                                                                    
                                                                    foreach($arr->AirlineInboundSegmentsIDs as $id)
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
                                                                        $FlightNumber = $Segments[$id]['FlightNumber'];

                                                                        $carval = array_search($Carrier, $NewcarrierIDArray);

                                                                
                                                                        $CarrierName = $carrierNameArray[$carval];
                                                                        $CarrierImg = $carrierImgArray[$carval];

                                                                        $OriginStation = $Segments[$id]['OriginStation'];
                                                                        $DestinationStation = $Segments[$id]['DestinationStation'];

                                                                        $carval = array_search($OriginStation, $placesIDArray);
                                                                        $OriginStationName = $placesNameArray[$carval];
                                                                        $OriginStationCode = $placesCodeArray[$carval];


                                                                        $carval = array_search($DestinationStation, $placesIDArray);
                                                                        $DestinationStationName = $placesNameArray[$carval];
                                                                        $DestinationStationCode = $placesCodeArray[$carval];

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
                                                                            <div class="stay_at_airport">
                                                                                <span class="stay_duration"><?php echo $h; ?>h <?php echo $m; ?></span>
                                                                                <span class="stay_title">Connect in airport</span>
                                                                            </div>
                                                                            <?php
                                                                        }

                                                                        ?>
                                                                        <div class="leg_detail">
                                                                            <div class="airlinedetails">
                                                                                <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                                <h5><?php echo $CarrierName; ?> | <?php echo $FlightNumber; ?></h5>
                                                                            </div>
                                                                            <div class="leg_flight_detail">
                                                                                <div class="leg_duration">
                                                                                    <?php echo $duration_segment_hours."h ".$duration_segment_minutes; ?>
                                                                                </div>
                                                                                <div class="diagram">
                                                                                    <div class="timeline_track">
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                <div class="timing">
                                                                                    <div class="time"><?php echo $timed; ?></div>
                                                                                    <div class="time"><?php echo $timea; ?></div>
                                                                                </div>
                                                                                <div class="airports">
                                                                                    <div class="airport_name">
                                                                                        <?php echo $OriginStationCode." ".$OriginStationName; ?>
                                                                                    </div>
                                                                                    <div class="airport_name">
                                                                                        <?php echo $DestinationStationCode." ".$DestinationStationName; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                         
                                                                        <?php
                                                                        $wt=$timea;
                                                                        $wait_time = '';
                                                                    }
                                                                    
                                                                    ?>
                                                                    <br>    
                                                                    <p><strong>Journey duration:</strong> <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?></p>
                                                                    
                                                            </div>
                                                          </div>

                                                        </div>
                                                        
                                                        <?php
                                                        break;
                                                    }
                                                }
                                                

                                            }
                                            



                                             ?>
                                            
                                            
                                        </div>
                                        <div class="ticket-line">
                                            <div class="top-notch">
                                            </div>
                                            <div class="bottom-notch">
                                            </div>
                                        </div>
                                        <div class="ticket-price">
                                            <div class="price-container">
                                                <div class="display-price">
                                                    $<?php echo $arr->AirlinePrice; ?>
                                                </div>
                                                <div class="display-price-total">


                                                    <?php
                                                    $passAdult = 0;
                                                    $passChild = 0;
                                                    $passInfant = 0;
                                                        if($searchManualQuery['passenger']['adult']>0)
                                                        {
                                                            $passAdult =$searchManualQuery['passenger']['adult'];
                                                        }
                                                        if($searchManualQuery['passenger']['children']>0)
                                                        {
                                                            $passChild =$searchManualQuery['passenger']['children'];
                                                        }
                                                        if($searchManualQuery['passenger']['infant']>0)
                                                        {
                                                            $passInfant =$searchManualQuery['passenger']['infant'];
                                                        }

                                                        $totalPrice = ($passAdult*$arr->AirlinePrice) + ($passChild*$arr->AirlinePrice) + ($passInfant*$arr->AirlinePrice);
                                                        if($totalPrice>$arr->AirlinePrice)
                                                        {
                                                            echo '$'.$totalPrice.' Total';    
                                                        }
                                                        
                                                        $booklink = '?session_key='.$session_key;
                                                        $booklink .= '&agent_id='.$arr->AirlineAgentId;
                                                        $booklink .= '&AirlineOutboundLegId='.$arr->AirlineOutboundLegId;

                                                        if($arr->AirlineInboundLegId!='')
                                                        {
                                                            $booklink .= '&AirlineInboundLegId='.$arr->AirlineInboundLegId;
                                                        }
                                                        $booklink .= '&adults='.$passAdult;
                                                        $booklink .= '&child='.$passChild;
                                                        $booklink .= '&infants='.$passInfant;


                                                     ?>
                                                </div>
                                                <a href="<?php echo  base_url();?>flights/flightsbooking/<?php echo $booklink; ?>" class="select-button">Select&nbsp;<span style="line-height: 1.125rem; display: inline-block; margin-top: 0.1875rem; vertical-align: top;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="BpkIcon_bpk-icon--rtl-support__2-_zb" fill="white" style="width: 1.125rem; height: 1.125rem;"><path d="M14.4 19.5l5.7-5.3c.4-.4.7-.9.8-1.5.1-.3.1-.5.1-.7s0-.4-.1-.6c-.1-.6-.4-1.1-.8-1.5l-5.7-5.3c-.8-.8-2.1-.7-2.8.1-.8.8-.7 2.1.1 2.8l2.7 2.5H5c-1.1 0-2 .9-2 2s.9 2 2 2h9.4l-2.7 2.5c-.5.4-.7 1-.7 1.5s.2 1 .5 1.4c.8.8 2.1.8 2.9.1z"></path></svg></span></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $i++;
                                }
                            }



                             ?>

                            
                            





                        </div>
                    </div>
                </div>
                <div id="cheapest" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12">
                            <?php

                            foreach($AirLineDataCheapArray as $arr)
                            {
                                $aircheck = 0;
                                $stopcheck = 0;
                                foreach($Legs as $lg => $l)
                                {
                                    if($l['Id']==$arr->AirlineOutboundLegId)
                                    {
                                        foreach($l['Carriers'] as $lc => $llc)
                                        {
                                            if(array_search(strval($llc), $inputAirlineIdArray)===FALSE)
                                            {
                                                $aircheck = 1;
                                            }
                                            else
                                            {
                                                $aircheck = 0;
                                                break;
                                            }
                                        }

                                        break;
                                    }

                                }

                                $s = count($arr->AirlineOutboundStopsIDs);
                                $s = $s + count($arr->AirlineInboundStopsIDs);
                                

                                if(strpos($query_stop,strval($s))===FALSE)
                                {
                                    $stopcheck = 1;
                                }
                                
                                if($aircheck==0 && $stopcheck ==0)
                                {
                                    
                                
                                ?>
                                <div class="ticket-wrapper">
                                    <div class="a_div">
                                        <div class="ticket-detail">
                                            <?php

                                            
                                            foreach($Legs as $lg => $l)
                                            {
                                                if($l['Id']==$arr->AirlineOutboundLegId)
                                                {
                                                    $CarrierName = '';
                                                    $CarrierImg = '';
                                                    
                                                    foreach($l['Carriers'] as $lc => $llc)
                                                    {
                                                        $carval = array_search($llc, $NewcarrierIDArray);
                                                        
                                                
                                                        $CarrierName = $carrierNameArray[$carval];
                                                        $CarrierImg = $carrierImgArray[$carval];
                                                        break;
                                                            
                                                    }
                                                    


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
                                                    $DestinationStation = $l['DestinationStation'];

                                                    

                                                    $carval = array_search($OriginStation, $placesIDArray);
                                                    $OriginStationName = $placesNameArray[$carval];
                                                    $OriginStationCode = $placesCodeArray[$carval];


                                                    $carval = array_search($DestinationStation, $placesIDArray);
                                                    $DestinationStationName = $placesNameArray[$carval];
                                                    $DestinationStationCode = $placesCodeArray[$carval];


                                                    $stopCodeArray = array();

                                                    foreach($l['Stops'] as $stops => $id)
                                                    {
                                                        array_push($stopCodeArray, $id);
                                                    }
                                                    $stopName = array();
                                                    $stopCode = array();

                                                    foreach($stopCodeArray as $id)
                                                    {   
                                                        $carval = array_search($id, $placesIDArray);
                                                        array_push($stopName, $placesNameArray[$carval]);
                                                        array_push($stopCode, $placesCodeArray[$carval]);

                                                    }

                                                    $flight_duration = $l['Duration'];

                                                    $flight_duration_hours = floor($flight_duration/60);
                                                    $flight_duration_minutes = $flight_duration - (60*$flight_duration_hours);
                                                    $wait_time = 0;
                                                    $wt='';
                                                    ?>
                                                    <div class="panel panel-default">
                                                      <a data-toggle="collapse" data-parent="#" href="#leg<?php echo $k; ?>" class="head">
                                                        <div class="ticket-leg-info">
                                                            <div class="ticket-img">
                                                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $CarrierName; ?>">
                                                                    <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                </button>
                                                            </div>
                                                            <div class="ticket-leg-info-detail">
                                                                <div class="route-from">
                                                                    <div class="route-time">
                                                                        <?php echo $timeDeparture[0].":".$timeDeparture[1]; ?>
                                                                    </div>
                                                                    <div class="route-code">
                                                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $OriginStationName; ?>"><?php echo $OriginStationCode; ?></button>
                                                                    </div>
                                                                </div> 
                                                                <div class="route-stop">
                                                                    <div class="route-duration">
                                                                        <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?>
                                                                    </div>
                                                                    <div class="route-line">
                                                                        <?php
                                                                            if(count($stopName)>=1)
                                                                            {
                                                                                foreach($stopName as $n)
                                                                                {
                                                                                    echo '<span class="stop-point"></span>';
                                                                                }
                                                                            }
                                                                            else
                                                                            {

                                                                            }


                                                                         ?>
                                                                        
                                                                    </div>
                                                                    <div class="route-current-stop">
                                                                        <?php

                                                                        if(count($stopName)>=1)
                                                                        {
                                                                            echo '<span class="direct showstop">'.count($stopName).' stops</span>';
                                                                            $i=0;
                                                                            foreach($stopName as $n)
                                                                            {
                                                                                ?>
                                                                                <span>
                                                                                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $n ?>">
                                                                                        <?php echo $stopCode[$i]; ?>
                                                                                    </button>
                                                                                </span>
                                                                                <?php
                                                                                $i++;
                                                                            }

                                                                        }
                                                                        else
                                                                        {
                                                                            echo '<span class="direct">direct</span>';
                                                                        }



                                                                         ?>
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="route-to">
                                                                    <div class="route-time">
                                                                        <?php echo $timeArrival[0].":".$timeArrival[1]; ?>
                                                                    </div>
                                                                    <div class="route-code">
                                                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $DestinationStationName; ?>"><?php echo $DestinationStationCode; ?></button>
                                                                    </div>
                                                                </div>        
                                                            </div>  
                                                        </div>
                                                      </a>
                                                      <div id="leg<?php echo $k++; ?>" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <?php 
                                                                
                                                                foreach($arr->AirlineOutboundSegmentsIDs as $id)
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

                                                                    $carval = array_search($Carrier, $NewcarrierIDArray);

                                                            
                                                                    $CarrierName = $carrierNameArray[$carval];
                                                                    $CarrierImg = $carrierImgArray[$carval];
                                                                    $FlightNumber = $Segments[$id]['FlightNumber'];

                                                                    $OriginStation = $Segments[$id]['OriginStation'];
                                                                    $DestinationStation = $Segments[$id]['DestinationStation'];

                                                                    $carval = array_search($OriginStation, $placesIDArray);
                                                                    $OriginStationName = $placesNameArray[$carval];
                                                                    $OriginStationCode = $placesCodeArray[$carval];


                                                                    $carval = array_search($DestinationStation, $placesIDArray);
                                                                    $DestinationStationName = $placesNameArray[$carval];
                                                                    $DestinationStationCode = $placesCodeArray[$carval];
                                                                    

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
                                                                        <div class="stay_at_airport">
                                                                            <span class="stay_duration"><?php echo $h; ?>h <?php echo $m; ?></span>
                                                                            <span class="stay_title">Connect in airport</span>
                                                                        </div>
                                                                        <?php
                                                                    }

                                                                    ?>
                                                                    <div class="leg_detail">
                                                                        <div class="airlinedetails">
                                                                            <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                            <h5><?php echo $CarrierName; ?> | <?php echo $FlightNumber; ?></h5>
                                                                        </div>
                                                                        <div class="leg_flight_detail">
                                                                            <div class="leg_duration">
                                                                                <?php echo $duration_segment_hours."h ".$duration_segment_minutes; ?>
                                                                            </div>
                                                                            <div class="diagram">
                                                                                <div class="timeline_track">
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <div class="timing">
                                                                                <div class="time"><?php echo $timed; ?></div>
                                                                                <div class="time"><?php echo $timea; ?></div>
                                                                            </div>
                                                                            <div class="airports">
                                                                                <div class="airport_name">
                                                                                    <?php echo $OriginStationCode." ".$OriginStationName; ?>
                                                                                </div>
                                                                                <div class="airport_name">
                                                                                    <?php echo $DestinationStationCode." ".$DestinationStationName; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     
                                                                    <?php
                                                                    $wt=$timea;
                                                                    $wait_time = '';
                                                                }
                                                                
                                                                ?>
                                                                <br>    
                                                                <p><strong>Journey duration:</strong> <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?></p>
                                                                
                                                        </div>
                                                      </div>

                                                    </div>
                                                    
                                                    <?php
                                                    if($inbound=='')
                                                    {
                                                        break;
                                                    }
                                                }
                                                if($inbound!='')
                                                {
                                                    if($l['Id']==$arr->AirlineInboundLegId)
                                                    {
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


                                                        $CarrierName = '';
                                                        $CarrierImg = '';
                                                        foreach($l['Carriers'] as $lc => $llc)
                                                        {
                                                            $carval = array_search($llc, $NewcarrierIDArray);

                                                    
                                                            $CarrierName = $carrierNameArray[$carval];
                                                            $CarrierImg = $carrierImgArray[$carval];
                                                            break;
                                                                
                                                        }
                                                        $OriginStation = $l['OriginStation'];
                                                        $DestinationStation = $l['DestinationStation'];

                                                        $carval = array_search($OriginStation, $placesIDArray);
                                                        $OriginStationName = $placesNameArray[$carval];
                                                        $OriginStationCode = $placesCodeArray[$carval];


                                                        $carval = array_search($DestinationStation, $placesIDArray);
                                                        $DestinationStationName = $placesNameArray[$carval];
                                                        $DestinationStationCode = $placesCodeArray[$carval];

                                                        $stopCodeArray = array();


                                                        foreach($l['Stops'] as $stops => $id)
                                                        {
                                                            array_push($stopCodeArray, $id);
                                                        }
                                                        $stopName = array();
                                                        $stopCode = array();

                                                        foreach($stopCodeArray as $id)
                                                        {   
                                                            $carval = array_search($id, $placesIDArray);
                                                            array_push($stopName, $placesNameArray[$carval]);
                                                            array_push($stopCode, $placesCodeArray[$carval]);

                                                        }

                                                        $flight_duration = $l['Duration'];

                                                        $flight_duration_hours = floor($flight_duration/60);
                                                        $flight_duration_minutes = $flight_duration - (60*$flight_duration_hours);
                                                        $wait_time = 0;
                                                        $wt='';
                                                        ?>
                                                        <div class="panel panel-default">
                                                          <a data-toggle="collapse" data-parent="#" href="#leg<?php echo $k; ?>" class="head">
                                                            <div class="ticket-leg-info">
                                                                <div class="ticket-img">
                                                                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $CarrierName; ?>">
                                                                        <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                    </button>
                                                                </div>
                                                                <div class="ticket-leg-info-detail">
                                                                    <div class="route-from">
                                                                        <div class="route-time">
                                                                            <?php echo $timeDeparture[0].":".$timeDeparture[1]; ?>
                                                                        </div>
                                                                        <div class="route-code">
                                                                            <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $OriginStationName; ?>"><?php echo $OriginStationCode; ?></button>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="route-stop">
                                                                        <div class="route-duration">
                                                                            <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?>
                                                                        </div>
                                                                        <div class="route-line">
                                                                            <?php
                                                                                if(count($stopName)>=1)
                                                                                {
                                                                                    foreach($stopName as $n)
                                                                                    {
                                                                                        echo '<span class="stop-point"></span>';
                                                                                    }
                                                                                }
                                                                                else
                                                                                {

                                                                                }


                                                                             ?>
                                                                            
                                                                        </div>
                                                                        <div class="route-current-stop">
                                                                            <?php

                                                                            if(count($stopName)>=1)
                                                                            {
                                                                                echo '<span class="direct showstop">'.count($stopName).' stops</span>';
                                                                                $i=0;
                                                                                foreach($stopName as $n)
                                                                                {
                                                                                    ?>
                                                                                    <span>
                                                                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $n ?>">
                                                                                            <?php echo $stopCode[$i]; ?>
                                                                                        </button>
                                                                                    </span>
                                                                                    <?php
                                                                                    $i++;
                                                                                }

                                                                            }
                                                                            else
                                                                            {
                                                                                echo '<span class="direct">direct</span>';
                                                                            }



                                                                             ?>
                                                                            
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="route-to">
                                                                        <div class="route-time">
                                                                            <?php echo $timeArrival[0].":".$timeArrival[1]; ?>
                                                                        </div>
                                                                        <div class="route-code">
                                                                            <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $DestinationStationName; ?>"><?php echo $DestinationStationCode; ?></button>
                                                                        </div>
                                                                    </div>        
                                                                </div>  
                                                            </div>
                                                          </a>
                                                          <div id="leg<?php echo $k++; ?>" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <?php 
                                                                    
                                                                    foreach($arr->AirlineInboundSegmentsIDs as $id)
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
                                                                        $FlightNumber = $Segments[$id]['FlightNumber'];

                                                                        $carval = array_search($Carrier, $NewcarrierIDArray);

                                                                
                                                                        $CarrierName = $carrierNameArray[$carval];
                                                                        $CarrierImg = $carrierImgArray[$carval];

                                                                        $OriginStation = $Segments[$id]['OriginStation'];
                                                                        $DestinationStation = $Segments[$id]['DestinationStation'];

                                                                        $carval = array_search($OriginStation, $placesIDArray);
                                                                        $OriginStationName = $placesNameArray[$carval];
                                                                        $OriginStationCode = $placesCodeArray[$carval];


                                                                        $carval = array_search($DestinationStation, $placesIDArray);
                                                                        $DestinationStationName = $placesNameArray[$carval];
                                                                        $DestinationStationCode = $placesCodeArray[$carval];

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
                                                                            <div class="stay_at_airport">
                                                                                <span class="stay_duration"><?php echo $h; ?>h <?php echo $m; ?></span>
                                                                                <span class="stay_title">Connect in airport</span>
                                                                            </div>
                                                                            <?php
                                                                        }

                                                                        ?>
                                                                        <div class="leg_detail">
                                                                            <div class="airlinedetails">
                                                                                <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                                <h5><?php echo $CarrierName; ?> | <?php echo $FlightNumber; ?></h5>
                                                                            </div>
                                                                            <div class="leg_flight_detail">
                                                                                <div class="leg_duration">
                                                                                    <?php echo $duration_segment_hours."h ".$duration_segment_minutes; ?>
                                                                                </div>
                                                                                <div class="diagram">
                                                                                    <div class="timeline_track">
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                <div class="timing">
                                                                                    <div class="time"><?php echo $timed; ?></div>
                                                                                    <div class="time"><?php echo $timea; ?></div>
                                                                                </div>
                                                                                <div class="airports">
                                                                                    <div class="airport_name">
                                                                                        <?php echo $OriginStationCode." ".$OriginStationName; ?>
                                                                                    </div>
                                                                                    <div class="airport_name">
                                                                                        <?php echo $DestinationStationCode." ".$DestinationStationName; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                         
                                                                        <?php
                                                                        $wt=$timea;
                                                                        $wait_time = '';
                                                                    }
                                                                    
                                                                    ?>
                                                                    <br>    
                                                                    <p><strong>Journey duration:</strong> <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?></p>
                                                                    
                                                            </div>
                                                          </div>

                                                        </div>
                                                        
                                                        <?php
                                                        break;
                                                    }
                                                }
                                                

                                            }
                                            



                                             ?>
                                            
                                            
                                        </div>
                                        <div class="ticket-line">
                                            <div class="top-notch">
                                            </div>
                                            <div class="bottom-notch">
                                            </div>
                                        </div>
                                        <div class="ticket-price">
                                            <div class="price-container">
                                                <div class="display-price">
                                                    $<?php echo $arr->AirlinePrice; ?>
                                                </div>
                                                <div class="display-price-total">


                                                    <?php
                                                    $passAdult = 0;
                                                    $passChild = 0;
                                                    $passInfant = 0;
                                                        if($searchManualQuery['passenger']['adult']>0)
                                                        {
                                                            $passAdult =$searchManualQuery['passenger']['adult'];
                                                        }
                                                        if($searchManualQuery['passenger']['children']>0)
                                                        {
                                                            $passChild =$searchManualQuery['passenger']['children'];
                                                        }
                                                        if($searchManualQuery['passenger']['infant']>0)
                                                        {
                                                            $passInfant =$searchManualQuery['passenger']['infant'];
                                                        }

                                                        $totalPrice = ($passAdult*$arr->AirlinePrice) + ($passChild*$arr->AirlinePrice) + ($passInfant*$arr->AirlinePrice);
                                                        if($totalPrice>$arr->AirlinePrice)
                                                        {
                                                            echo '$'.$totalPrice.' Total';    
                                                        }
                                                        
                                                        $booklink = '?session_key='.$session_key;
                                                        $booklink .= '&agent_id='.$arr->AirlineAgentId;
                                                        $booklink .= '&AirlineOutboundLegId='.$arr->AirlineOutboundLegId;

                                                        if($arr->AirlineInboundLegId!='')
                                                        {
                                                            $booklink .= '&AirlineInboundLegId='.$arr->AirlineInboundLegId;
                                                        }
                                                        $booklink .= '&adults='.$passAdult;
                                                        $booklink .= '&child='.$passChild;
                                                        $booklink .= '&infants='.$passInfant;


                                                     ?>
                                                </div>
                                                <a href="<?php echo  base_url();?>flights/flightsbooking/<?php echo $booklink; ?>" class="select-button">Select&nbsp;<span style="line-height: 1.125rem; display: inline-block; margin-top: 0.1875rem; vertical-align: top;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="BpkIcon_bpk-icon--rtl-support__2-_zb" fill="white" style="width: 1.125rem; height: 1.125rem;"><path d="M14.4 19.5l5.7-5.3c.4-.4.7-.9.8-1.5.1-.3.1-.5.1-.7s0-.4-.1-.6c-.1-.6-.4-1.1-.8-1.5l-5.7-5.3c-.8-.8-2.1-.7-2.8.1-.8.8-.7 2.1.1 2.8l2.7 2.5H5c-1.1 0-2 .9-2 2s.9 2 2 2h9.4l-2.7 2.5c-.5.4-.7 1-.7 1.5s.2 1 .5 1.4c.8.8 2.1.8 2.9.1z"></path></svg></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $i++;
                                }
                            }



                             ?>

                            
                            





                        </div>
                    </div>
                </div>
                <div id="fastest" class="tab-pane fade">
                  <div class="row">
                        <div class="col-md-12">
                            <?php
                            
                            foreach($AirLineDataDurationArray as $arr)
                            {
                                $aircheck = 0;
                                $stopcheck = 0;
                                foreach($Legs as $lg => $l)
                                {
                                    if($l['Id']==$arr->AirlineOutboundLegId)
                                    {
                                        foreach($l['Carriers'] as $lc => $llc)
                                        {
                                            if(array_search(strval($llc), $inputAirlineIdArray)===FALSE)
                                            {
                                                $aircheck = 1;
                                            }
                                            else
                                            {
                                                $aircheck = 0;
                                                break;
                                            }
                                        }

                                        break;
                                    }

                                }

                                $s = count($arr->AirlineOutboundStopsIDs);
                                $s = $s + count($arr->AirlineInboundStopsIDs);
                                

                                if(strpos($query_stop,strval($s))===FALSE)
                                {
                                    $stopcheck = 1;
                                }
                                
                                if($aircheck==0 && $stopcheck ==0)
                                {
                                    
                                
                                ?>
                                <div class="ticket-wrapper">
                                    <div class="a_div">
                                        <div class="ticket-detail">
                                            <?php

                                            
                                            foreach($Legs as $lg => $l)
                                            {
                                                if($l['Id']==$arr->AirlineOutboundLegId)
                                                {
                                                    $CarrierName = '';
                                                    $CarrierImg = '';
                                                    
                                                    foreach($l['Carriers'] as $lc => $llc)
                                                    {
                                                        $carval = array_search($llc, $NewcarrierIDArray);
                                                        
                                                
                                                        $CarrierName = $carrierNameArray[$carval];
                                                        $CarrierImg = $carrierImgArray[$carval];
                                                        break;
                                                            
                                                    }
                                                    


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
                                                    $DestinationStation = $l['DestinationStation'];

                                                    

                                                    $carval = array_search($OriginStation, $placesIDArray);
                                                    $OriginStationName = $placesNameArray[$carval];
                                                    $OriginStationCode = $placesCodeArray[$carval];


                                                    $carval = array_search($DestinationStation, $placesIDArray);
                                                    $DestinationStationName = $placesNameArray[$carval];
                                                    $DestinationStationCode = $placesCodeArray[$carval];


                                                    $stopCodeArray = array();

                                                    foreach($l['Stops'] as $stops => $id)
                                                    {
                                                        array_push($stopCodeArray, $id);
                                                    }
                                                    $stopName = array();
                                                    $stopCode = array();

                                                    foreach($stopCodeArray as $id)
                                                    {   
                                                        $carval = array_search($id, $placesIDArray);
                                                        array_push($stopName, $placesNameArray[$carval]);
                                                        array_push($stopCode, $placesCodeArray[$carval]);

                                                    }

                                                    $flight_duration = $l['Duration'];

                                                    $flight_duration_hours = floor($flight_duration/60);
                                                    $flight_duration_minutes = $flight_duration - (60*$flight_duration_hours);
                                                    $wait_time = 0;
                                                    $wt='';
                                                    ?>
                                                    <div class="panel panel-default">
                                                      <a data-toggle="collapse" data-parent="#" href="#leg<?php echo $k; ?>" class="head">
                                                        <div class="ticket-leg-info">
                                                            <div class="ticket-img">
                                                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $CarrierName; ?>">
                                                                    <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                </button>
                                                            </div>
                                                            <div class="ticket-leg-info-detail">
                                                                <div class="route-from">
                                                                    <div class="route-time">
                                                                        <?php echo $timeDeparture[0].":".$timeDeparture[1]; ?>
                                                                    </div>
                                                                    <div class="route-code">
                                                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $OriginStationName; ?>"><?php echo $OriginStationCode; ?></button>
                                                                    </div>
                                                                </div> 
                                                                <div class="route-stop">
                                                                    <div class="route-duration">
                                                                        <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?>
                                                                    </div>
                                                                    <div class="route-line">
                                                                        <?php
                                                                            if(count($stopName)>=1)
                                                                            {
                                                                                foreach($stopName as $n)
                                                                                {
                                                                                    echo '<span class="stop-point"></span>';
                                                                                }
                                                                            }
                                                                            else
                                                                            {

                                                                            }


                                                                         ?>
                                                                        
                                                                    </div>
                                                                    <div class="route-current-stop">
                                                                        <?php

                                                                        if(count($stopName)>=1)
                                                                        {
                                                                            echo '<span class="direct showstop">'.count($stopName).' stops</span>';
                                                                            $i=0;
                                                                            foreach($stopName as $n)
                                                                            {
                                                                                ?>
                                                                                <span>
                                                                                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $n ?>">
                                                                                        <?php echo $stopCode[$i]; ?>
                                                                                    </button>
                                                                                </span>
                                                                                <?php
                                                                                $i++;
                                                                            }

                                                                        }
                                                                        else
                                                                        {
                                                                            echo '<span class="direct">direct</span>';
                                                                        }



                                                                         ?>
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="route-to">
                                                                    <div class="route-time">
                                                                        <?php echo $timeArrival[0].":".$timeArrival[1]; ?>
                                                                    </div>
                                                                    <div class="route-code">
                                                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $DestinationStationName; ?>"><?php echo $DestinationStationCode; ?></button>
                                                                    </div>
                                                                </div>        
                                                            </div>  
                                                        </div>
                                                      </a>
                                                      <div id="leg<?php echo $k++; ?>" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <?php 
                                                                
                                                                foreach($arr->AirlineOutboundSegmentsIDs as $id)
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

                                                                    $carval = array_search($Carrier, $NewcarrierIDArray);

                                                            
                                                                    $CarrierName = $carrierNameArray[$carval];
                                                                    $CarrierImg = $carrierImgArray[$carval];
                                                                    $FlightNumber = $Segments[$id]['FlightNumber'];

                                                                    $OriginStation = $Segments[$id]['OriginStation'];
                                                                    $DestinationStation = $Segments[$id]['DestinationStation'];

                                                                    $carval = array_search($OriginStation, $placesIDArray);
                                                                    $OriginStationName = $placesNameArray[$carval];
                                                                    $OriginStationCode = $placesCodeArray[$carval];


                                                                    $carval = array_search($DestinationStation, $placesIDArray);
                                                                    $DestinationStationName = $placesNameArray[$carval];
                                                                    $DestinationStationCode = $placesCodeArray[$carval];
                                                                    

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
                                                                        <div class="stay_at_airport">
                                                                            <span class="stay_duration"><?php echo $h; ?>h <?php echo $m; ?></span>
                                                                            <span class="stay_title">Connect in airport</span>
                                                                        </div>
                                                                        <?php
                                                                    }

                                                                    ?>
                                                                    <div class="leg_detail">
                                                                        <div class="airlinedetails">
                                                                            <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                            <h5><?php echo $CarrierName; ?> | <?php echo $FlightNumber; ?></h5>
                                                                        </div>
                                                                        <div class="leg_flight_detail">
                                                                            <div class="leg_duration">
                                                                                <?php echo $duration_segment_hours."h ".$duration_segment_minutes; ?>
                                                                            </div>
                                                                            <div class="diagram">
                                                                                <div class="timeline_track">
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                            <div class="timing">
                                                                                <div class="time"><?php echo $timed; ?></div>
                                                                                <div class="time"><?php echo $timea; ?></div>
                                                                            </div>
                                                                            <div class="airports">
                                                                                <div class="airport_name">
                                                                                    <?php echo $OriginStationCode." ".$OriginStationName; ?>
                                                                                </div>
                                                                                <div class="airport_name">
                                                                                    <?php echo $DestinationStationCode." ".$DestinationStationName; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                     
                                                                    <?php
                                                                    $wt=$timea;
                                                                    $wait_time = '';
                                                                }
                                                                
                                                                ?>
                                                                <br>    
                                                                <p><strong>Journey duration:</strong> <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?></p>
                                                                
                                                        </div>
                                                      </div>

                                                    </div>
                                                    
                                                    <?php
                                                    if($inbound=='')
                                                    {
                                                        break;
                                                    }
                                                }
                                                if($inbound!='')
                                                {
                                                    if($l['Id']==$arr->AirlineInboundLegId)
                                                    {
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


                                                        $CarrierName = '';
                                                        $CarrierImg = '';
                                                        foreach($l['Carriers'] as $lc => $llc)
                                                        {
                                                            $carval = array_search($llc, $NewcarrierIDArray);

                                                    
                                                            $CarrierName = $carrierNameArray[$carval];
                                                            $CarrierImg = $carrierImgArray[$carval];
                                                            break;
                                                                
                                                        }
                                                        $OriginStation = $l['OriginStation'];
                                                        $DestinationStation = $l['DestinationStation'];

                                                        $carval = array_search($OriginStation, $placesIDArray);
                                                        $OriginStationName = $placesNameArray[$carval];
                                                        $OriginStationCode = $placesCodeArray[$carval];


                                                        $carval = array_search($DestinationStation, $placesIDArray);
                                                        $DestinationStationName = $placesNameArray[$carval];
                                                        $DestinationStationCode = $placesCodeArray[$carval];

                                                        $stopCodeArray = array();


                                                        foreach($l['Stops'] as $stops => $id)
                                                        {
                                                            array_push($stopCodeArray, $id);
                                                        }
                                                        $stopName = array();
                                                        $stopCode = array();

                                                        foreach($stopCodeArray as $id)
                                                        {   
                                                            $carval = array_search($id, $placesIDArray);
                                                            array_push($stopName, $placesNameArray[$carval]);
                                                            array_push($stopCode, $placesCodeArray[$carval]);

                                                        }

                                                        $flight_duration = $l['Duration'];

                                                        $flight_duration_hours = floor($flight_duration/60);
                                                        $flight_duration_minutes = $flight_duration - (60*$flight_duration_hours);
                                                        $wait_time = 0;
                                                        $wt='';
                                                        ?>
                                                        <div class="panel panel-default">
                                                          <a data-toggle="collapse" data-parent="#" href="#leg<?php echo $k; ?>" class="head">
                                                            <div class="ticket-leg-info">
                                                                <div class="ticket-img">
                                                                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $CarrierName; ?>">
                                                                        <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                    </button>
                                                                </div>
                                                                <div class="ticket-leg-info-detail">
                                                                    <div class="route-from">
                                                                        <div class="route-time">
                                                                            <?php echo $timeDeparture[0].":".$timeDeparture[1]; ?>
                                                                        </div>
                                                                        <div class="route-code">
                                                                            <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $OriginStationName; ?>"><?php echo $OriginStationCode; ?></button>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="route-stop">
                                                                        <div class="route-duration">
                                                                            <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?>
                                                                        </div>
                                                                        <div class="route-line">
                                                                            <?php
                                                                                if(count($stopName)>=1)
                                                                                {
                                                                                    foreach($stopName as $n)
                                                                                    {
                                                                                        echo '<span class="stop-point"></span>';
                                                                                    }
                                                                                }
                                                                                else
                                                                                {

                                                                                }


                                                                             ?>
                                                                            
                                                                        </div>
                                                                        <div class="route-current-stop">
                                                                            <?php

                                                                            if(count($stopName)>=1)
                                                                            {
                                                                                echo '<span class="direct showstop">'.count($stopName).' stops</span>';
                                                                                $i=0;
                                                                                foreach($stopName as $n)
                                                                                {
                                                                                    ?>
                                                                                    <span>
                                                                                        <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $n ?>">
                                                                                            <?php echo $stopCode[$i]; ?>
                                                                                        </button>
                                                                                    </span>
                                                                                    <?php
                                                                                    $i++;
                                                                                }

                                                                            }
                                                                            else
                                                                            {
                                                                                echo '<span class="direct">direct</span>';
                                                                            }



                                                                             ?>
                                                                            
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="route-to">
                                                                        <div class="route-time">
                                                                            <?php echo $timeArrival[0].":".$timeArrival[1]; ?>
                                                                        </div>
                                                                        <div class="route-code">
                                                                            <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="<?php echo $DestinationStationName; ?>"><?php echo $DestinationStationCode; ?></button>
                                                                        </div>
                                                                    </div>        
                                                                </div>  
                                                            </div>
                                                          </a>
                                                          <div id="leg<?php echo $k++; ?>" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <?php 
                                                                    
                                                                    foreach($arr->AirlineInboundSegmentsIDs as $id)
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
                                                                        $FlightNumber = $Segments[$id]['FlightNumber'];

                                                                        $carval = array_search($Carrier, $NewcarrierIDArray);

                                                                
                                                                        $CarrierName = $carrierNameArray[$carval];
                                                                        $CarrierImg = $carrierImgArray[$carval];

                                                                        $OriginStation = $Segments[$id]['OriginStation'];
                                                                        $DestinationStation = $Segments[$id]['DestinationStation'];

                                                                        $carval = array_search($OriginStation, $placesIDArray);
                                                                        $OriginStationName = $placesNameArray[$carval];
                                                                        $OriginStationCode = $placesCodeArray[$carval];


                                                                        $carval = array_search($DestinationStation, $placesIDArray);
                                                                        $DestinationStationName = $placesNameArray[$carval];
                                                                        $DestinationStationCode = $placesCodeArray[$carval];

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
                                                                            <div class="stay_at_airport">
                                                                                <span class="stay_duration"><?php echo $h; ?>h <?php echo $m; ?></span>
                                                                                <span class="stay_title">Connect in airport</span>
                                                                            </div>
                                                                            <?php
                                                                        }

                                                                        ?>
                                                                        <div class="leg_detail">
                                                                            <div class="airlinedetails">
                                                                                <img src="<?php echo $CarrierImg; ?>" class="img-responsive">
                                                                                <h5><?php echo $CarrierName; ?> | <?php echo $FlightNumber; ?></h5>
                                                                            </div>
                                                                            <div class="leg_flight_detail">
                                                                                <div class="leg_duration">
                                                                                    <?php echo $duration_segment_hours."h ".$duration_segment_minutes; ?>
                                                                                </div>
                                                                                <div class="diagram">
                                                                                    <div class="timeline_track">
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                                <div class="timing">
                                                                                    <div class="time"><?php echo $timed; ?></div>
                                                                                    <div class="time"><?php echo $timea; ?></div>
                                                                                </div>
                                                                                <div class="airports">
                                                                                    <div class="airport_name">
                                                                                        <?php echo $OriginStationCode." ".$OriginStationName; ?>
                                                                                    </div>
                                                                                    <div class="airport_name">
                                                                                        <?php echo $DestinationStationCode." ".$DestinationStationName; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                         
                                                                        <?php
                                                                        $wt=$timea;
                                                                        $wait_time = '';
                                                                    }
                                                                    
                                                                    ?>
                                                                    <br>    
                                                                    <p><strong>Journey duration:</strong> <?php echo $flight_duration_hours."h ".$flight_duration_minutes; ?></p>
                                                                    
                                                            </div>
                                                          </div>

                                                        </div>
                                                        
                                                        <?php
                                                        break;
                                                    }
                                                }
                                                

                                            }
                                            



                                             ?>
                                            
                                            
                                        </div>
                                        <div class="ticket-line">
                                            <div class="top-notch">
                                            </div>
                                            <div class="bottom-notch">
                                            </div>
                                        </div>
                                        <div class="ticket-price">
                                            <div class="price-container">
                                                <div class="display-price">
                                                    $<?php echo $arr->AirlinePrice; ?>
                                                </div>
                                                <div class="display-price-total">


                                                    <?php
                                                    $passAdult = 0;
                                                    $passChild = 0;
                                                    $passInfant = 0;
                                                        if($searchManualQuery['passenger']['adult']>0)
                                                        {
                                                            $passAdult =$searchManualQuery['passenger']['adult'];
                                                        }
                                                        if($searchManualQuery['passenger']['children']>0)
                                                        {
                                                            $passChild =$searchManualQuery['passenger']['children'];
                                                        }
                                                        if($searchManualQuery['passenger']['infant']>0)
                                                        {
                                                            $passInfant =$searchManualQuery['passenger']['infant'];
                                                        }

                                                        $totalPrice = ($passAdult*$arr->AirlinePrice) + ($passChild*$arr->AirlinePrice) + ($passInfant*$arr->AirlinePrice);
                                                        if($totalPrice>$arr->AirlinePrice)
                                                        {
                                                            echo '$'.$totalPrice.' Total';    
                                                        }
                                                        
                                                        $booklink = '?session_key='.$session_key;
                                                        $booklink .= '&agent_id='.$arr->AirlineAgentId;
                                                        $booklink .= '&AirlineOutboundLegId='.$arr->AirlineOutboundLegId;

                                                        if($arr->AirlineInboundLegId!='')
                                                        {
                                                            $booklink .= '&AirlineInboundLegId='.$arr->AirlineInboundLegId;
                                                        }
                                                        $booklink .= '&adults='.$passAdult;
                                                        $booklink .= '&child='.$passChild;
                                                        $booklink .= '&infants='.$passInfant;


                                                     ?>
                                                </div>
                                                <a href="<?php echo  base_url();?>flights/flightsbooking/<?php echo $booklink; ?>" class="select-button">Select&nbsp;<span style="line-height: 1.125rem; display: inline-block; margin-top: 0.1875rem; vertical-align: top;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" class="BpkIcon_bpk-icon--rtl-support__2-_zb" fill="white" style="width: 1.125rem; height: 1.125rem;"><path d="M14.4 19.5l5.7-5.3c.4-.4.7-.9.8-1.5.1-.3.1-.5.1-.7s0-.4-.1-.6c-.1-.6-.4-1.1-.8-1.5l-5.7-5.3c-.8-.8-2.1-.7-2.8.1-.8.8-.7 2.1.1 2.8l2.7 2.5H5c-1.1 0-2 .9-2 2s.9 2 2 2h9.4l-2.7 2.5c-.5.4-.7 1-.7 1.5s.2 1 .5 1.4c.8.8 2.1.8 2.9.1z"></path></svg></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $i++;
                                }
                            }



                             ?>

                            
                            





                        </div>
                    </div>
                
              </div>
            


            
            
            
        </div>
    </div>
</div><?php


$query_flight_duration= '';
if(isset($_GET['flight_duration']))
{
    $query_flight_duration = $_GET['flight_duration'];
}


 ?>

<script>
    $(document).ready(function() {
        var abc = <?php echo json_encode($payload); ?>;
        var ab = Object.keys(abc).map(function (key) { return abc[key]; });
        $('#Refundable').on('ifChecked ifUnchecked', function(event){
            $(event.target).change();
            if($('#Refundable').is(":checked"))
            {
                ab[12] = 1;

            }else{
                ab[12] = 0;
            }
            window.location.href = "<?php echo  base_url();?>"+ab.toString().replace(/,/gi,'/');
        });
        var checkboxes = $('[id^=checkair]');
        checkboxes.on('ifChecked ifUnchecked', function (event) {
            $(event.target).change();
            var arr = [];
            for(var i = 13 ;i <= ab.length ; i++)
            {
                ab.splice(i,1);
            }
            $('input.airlines_filter:checkbox:checked').each(function () {
                arr.push($(this).val().replace(/ /gi,'-'));
            });
            ab = ab.concat(arr);
            window.location.href = "<?php echo  base_url();?>"+ab.toString().replace(/,/gi,'/');
        });
        $('[id^=nonstop]').on('ifChecked ifUnchecked', function(event){
            $(event.target).change();
            var arr = [];
            $('[id^=nonstop]:checkbox:checked').each(function () {
                arr.push($(this).val())
            });

            if(arr.indexOf("yes") != -1)
            {
                ab[11] = 1;
            }else{
                ab[11] = 0;
            }
            if(arr.indexOf("no") !== -1)
            {
                ab[10] = 1;
                console.log("0")
            }else{
                ab[10] = 0;
                console.log("1")
            }
            window.location.href = "<?php echo  base_url();?>"+ab.toString().replace(/,/gi,'/');
        });
        $( ".bookbtn" ).click(function() {
            var ab = $('#bookpass_'+$(this).data('setting_id')).val();
            console.log(ab);
            window.location.href = "<?php echo  base_url();?>"+"flights/book/"+ab;
        });
        $(".checbox_label").click(function(e){
            e.preventDefault();
            $(this).parent().toggleClass("labelchecked");
            if($(this).parent().hasClass("check_stops"))
            {
                var str = "?stops=";
                $('#collapse1').find('.labelchecked').each(function(){
                    str = str +","+ $(this).attr('data-val');
                });
                var str2 = "&airlines_ids=";
                $('#collapse4').find('.labelchecked').each(function(){
                    str2 = str2 + $(this).attr('data-val')+",";
                });
                window.location.href = "<?php echo  base_url();?>"+ab.toString().replace(/,/gi,'/')+""+str+str2;
                
            }
            if($(this).parent().hasClass("check_airline"))
            {
                
                var str = "?stops=";
                $('#collapse1').find('.labelchecked').each(function(){
                    str = str +","+ $(this).attr('data-val');
                });
                var str2 = "&airlines_ids=";
                $('#collapse4').find('.labelchecked').each(function(){
                    str2 = str2 + $(this).attr('data-val')+",";
                });
                window.location.href = "<?php echo  base_url();?>"+ab.toString().replace(/,/gi,'/')+""+str+str2;
            }

        });
        
        <?php

        $fd=0;        

        if($query_flight_duration!='')
        {
            $fd = $query_flight_duration/60;
        }
        else
        {
            $fd = $duration_max_hours;
        }


        ?>

        $("#slider-range3").slider({
            
            min: <?php echo $duration_min_hours; ?>,
            max: <?php echo $duration_max_hours; ?>,
            step: 0.5,
            value: [<?php echo $fd; ?>]
        });
            $("#slider-range3").on('slideStop',function(sliderValue){
                var v = sliderValue.value;
                v= v*60;

                var querystring = "&flight_duration="+v;
                var str = "?stops=";
                $('#collapse1').find('.labelchecked').each(function(){
                    str = str +","+ $(this).attr('data-val');
                });
                var str2 = "&airlines_ids=";
                $('#collapse4').find('.labelchecked').each(function(){
                    str2 = str2 + $(this).attr('data-val')+",";
                });
                window.location.href = "<?php echo  base_url();?>"+ab.toString().replace(/,/gi,'/')+""+str+str2+querystring;
            });
            $("#slider-range3").on('slide',function(sliderValue){

                var v = sliderValue.value;
                
            

            $('#time-range3 .slider-time2').html(v + ' hours');
                //alert(sliderValue.value);
            });

    });
</script>
<script>
    function update_date(param,index){
        var payload = <?php echo json_encode($payload); ?>;
        payload[index] = param;
        var jspayload = Object.keys(payload).map(function (key) { return payload[key]; });
        window.location.href = "<?php echo  base_url();?>"+jspayload.toString().replace(/,/gi,'/');
    }
</script>
<?php endif; ?>