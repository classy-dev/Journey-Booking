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
<style>
    
    .page-preloader svg {
      overflow: visible;
      width: 100px;
      height: 150px;
    }
    .page-preloader svg g {
      animation: slide 2s linear infinite;
    }
    .page-preloader svg g:nth-child(2) {
      animation-delay: 0.5s;
    }
    .page-preloader svg g:nth-child(2) path {
      animation-delay: 0.5s;
      stroke-dasharray: 0px 158px;
      stroke-dashoffset: 1px;
    }
    .page-preloader svg path {
      stroke: url(#gradient);
      stroke-width: 20px;
      stroke-linecap: round;
      fill: none;
      stroke-dasharray: 0 157px;
      stroke-dashoffset: 0;
      animation: escalade 2s cubic-bezier(0.8, 0, 0.2, 1) infinite;
    }

    @keyframes slide {
      0% {
        transform: translateY(-50px);
      }
      100% {
        transform: translateY(50px);
      }
    }
    @keyframes escalade {
      0% {
        stroke-dasharray: 0 157px;
        stroke-dashoffset: 0;
      }
      50% {
        stroke-dasharray: 156px 157px;
        stroke-dashoffset: 0;
      }
      100% {
        stroke-dasharray: 156px 157px;
        stroke-dashoffset: -156px;
      }
    }

</style>
     
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



$departureCheap = $departure;
$arrivalCheap = $arrival;

$departure = '';
$arrival = '';

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
    #search
    {
        text-align: center;
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
                    <h3 class="booking-title no_flight"></h3>
            
                </div>
                <style>
                    .results_loader
                        {
                                width: calc(100% - 40px);
                            margin: 0 auto;
                            position: absolute;
                            z-index: 999999999999999999999999999;
                                background: #f1f2f8;
                            height: 115px;
                            left: 0;
                            right: 0;
                        }
                        .results_loader .sk-chase-dot:before
                        {
                                background-color: #000;
                        }
                </style>
                <div class="results_loader search_result_loader">
                    <div class="sk-chase">
                      <div class="sk-chase-dot"></div>
                      <div class="sk-chase-dot"></div>
                      <div class="sk-chase-dot"></div>
                      <div class="sk-chase-dot"></div>
                      <div class="sk-chase-dot"></div>
                      <div class="sk-chase-dot"></div>
                    </div>
                </div> 
                <script>
                    <?php $session_key = preg_replace('/[^A-Za-z0-9\-]/', '', $session_key); ?>
                    var rld = '<?php if(isset($_GET["reload"])){echo $_GET["reload"];} ?>';
                    $.ajax({
                            url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckFlightCount/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_outbounddepart=<?php echo $query_outbounddepart;?>&query_outboundarrive=<?php echo $query_outboundarrive;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_returndepart=<?php echo $query_returndepart;?>&query_returnarrive=<?php echo $query_returnarrive;?>&discount=<?php echo $discount; ?>",
                            success: function (result, page) 
                            {

                                
                                if(result==="no")
                                {
                                    var count = 0;
                                    while(result==='no')
                                    {
                                        count++;
                                        if(count>3)
                                        {
                                            break;
                                        }
                                        if(rld=='false')
                                        {
                                           result = 'false';

                                        }
                                        $.ajax({
                                            url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckFlightCount/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_outbounddepart=<?php echo $query_outbounddepart;?>&query_outboundarrive=<?php echo $query_outboundarrive;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_returndepart=<?php echo $query_returndepart;?>&query_returnarrive=<?php echo $query_returnarrive;?>&discount=<?php echo $discount; ?>",
                                            success: function (res, page) 
                                            {
                                                if(rld=='false')
                                                {
                                                   result = 'false'; 
                                                }
                                                if(res==="no")
                                                {
                                                    
                                                    $('.no_flight').html("<strong>Sorry, No Flights Available Currently</strong>");
                                                    $('.resultcontainer').hide();
                                                }
                                                else
                                                {
                                                    result = res;

                                                    $('.resultcontainer').show();
                                                    DirectPrice();
                                                }
                                                var preloader = $('.search_result_loader');
                                                    preloader.fadeOut(500);
                                            }
                                        }
                                        );
                                    
                                    }
                                    if(rld==='false')
                                    {
                                         var pl = $('.page-preloader');
                                         pl.fadeOut(500);
                                    }
                                                   



                                    
                                }
                                else
                                {
                                    
                                    $('.resultcontainer').show();
                                    DirectPrice();
                                    var preloader = $('.search_result_loader');
                                    preloader.fadeOut(500);
                                }
                            }
                        }
                        );
                </script>
                
                
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
<style>
    .resultcontainer
    {
        display: none;
    }
</style>
<div class="listingbg">
    <div class="container resultcontainer">
        <div class="col-md-3 ">
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
                                    <span class="price DirectPrice">$&nbsp;<?php if($DirectPrice==0){echo "Not Available";}else{echo $DirectPrice;} ?></span>
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
                                    <span class="price OnePrice">$&nbsp;<?php if($OnePrice==0){echo "Not Available";}else{echo $OnePrice;} ?></span>
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
                                    <span class="price TwoPrice">$&nbsp;<?php if($TwoPrice==0){echo "Not Available";}else{echo $TwoPrice;} ?></span>
                                    
  
 

                                </div>
                            </div>
                        </div> 
                        <style>
                            .panel-body
                            {
                                position: relative;
                            }
                            .stops_result_loader
                            {
                                    width: 100%;
                                    margin: 0 auto;
                                    position: absolute;
                                    z-index: 999999999999999999999999999;
                                    background: #f1f2f8;
                                    height: 100%;
                                    left: 0;
                                    right: 0;
                                    /* top: auto; */
                                    bottom: 0;
                            }
                            .stops_result_loader .sk-chase
                            {
                                    margin: 50px auto;
                            }
                        </style>
                        <div class="results_loader stops_result_loader">
                            <div class="sk-chase">
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                            </div>
                        </div> 
                        <script>
                            
                            function DirectPrice()
                            {
                                $.ajax({
                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckDirectStops/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_outbounddepart=<?php echo $query_outbounddepart;?>&query_outboundarrive=<?php echo $query_outboundarrive;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_returndepart=<?php echo $query_returndepart;?>&query_returnarrive=<?php echo $query_returnarrive;?>&discount=<?php echo $discount; ?>",
                                    success: function (result, page) 
                                    {

                                        
                                        if(result==="0")
                                        {
                                            
                                                $.ajax({
                                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckDirectStops/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_outbounddepart=<?php echo $query_outbounddepart;?>&query_outboundarrive=<?php echo $query_outboundarrive;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_returndepart=<?php echo $query_returndepart;?>&query_returnarrive=<?php echo $query_returnarrive;?>&discount=<?php echo $discount; ?>",
                                                    success: function (result, page) 
                                                    {
                                                        if(result==="0")
                                                        {
                                                            
                                                            $('.DirectPrice').html("Not Available");
                                                        }
                                                        else
                                                        {
                                                            $('.DirectPrice').html("$&nbsp;"+result);
                                                        }
                                                        OnePrice();
                                                    }
                                                }
                                                );
                                            



                                            
                                        }
                                        else
                                        {
                                            $('.DirectPrice').html("$&nbsp;"+result);
                                            OnePrice();
                                        }
                                    }
                                }
                                );
                            }
                        </script>
                        <script>
                            
                            function OnePrice()
                            {
                                $.ajax({
                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckOneStops/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_outbounddepart=<?php echo $query_outbounddepart;?>&query_outboundarrive=<?php echo $query_outboundarrive;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_returndepart=<?php echo $query_returndepart;?>&query_returnarrive=<?php echo $query_returnarrive;?>&discount=<?php echo $discount; ?>",
                                    success: function (result, page) 
                                    {

                                        
                                        if(result==="0")
                                        {
                                            
                                                $.ajax({
                                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckOneStops/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_outbounddepart=<?php echo $query_outbounddepart;?>&query_outboundarrive=<?php echo $query_outboundarrive;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_returndepart=<?php echo $query_returndepart;?>&query_returnarrive=<?php echo $query_returnarrive;?>&discount=<?php echo $discount; ?>",
                                                    success: function (result, page) 
                                                    {
                                                        if(result==="0")
                                                        {
                                                            
                                                            $('.OnePrice').html("Not Available");
                                                        }
                                                        else
                                                        {
                                                            $('.OnePrice').html("$&nbsp;"+result);
                                                        }
                                                        TwoPrice();
                                                    }
                                                }
                                                );
                                            



                                            
                                        }
                                        else
                                        {
                                            $('.OnePrice').html("$&nbsp;"+result);
                                            TwoPrice();
                                        }
                                    }
                                }
                                );
                            }
                        </script>
                        <script>
                            
                            function TwoPrice()
                            {
                                $.ajax({
                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckTwoStops/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_outbounddepart=<?php echo $query_outbounddepart;?>&query_outboundarrive=<?php echo $query_outboundarrive;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_returndepart=<?php echo $query_returndepart;?>&query_returnarrive=<?php echo $query_returnarrive;?>&discount=<?php echo $discount; ?>",
                                    success: function (result, page) 
                                    {

                                        
                                        if(result==="0")
                                        {
                                            
                                                $.ajax({
                                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckTwoStops/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_outbounddepart=<?php echo $query_outbounddepart;?>&query_outboundarrive=<?php echo $query_outboundarrive;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_returndepart=<?php echo $query_returndepart;?>&query_returnarrive=<?php echo $query_returnarrive;?>&discount=<?php echo $discount; ?>",
                                                    success: function (result, page) 
                                                    {
                                                        if(result==="0")
                                                        {
                                                            
                                                            $('.TwoPrice').html("Not Available");
                                                        }
                                                        else
                                                        {
                                                            $('.TwoPrice').html("$&nbsp;"+result);
                                                        }
                                                        Airlines();
                                                        var preloader = $('.stops_result_loader');
                                                            preloader.fadeOut(500);
                                                    }
                                                }
                                                );
                                            



                                            
                                        }
                                        else
                                        {
                                            $('.TwoPrice').html("$&nbsp;"+result);
                                            var preloader = $('.stops_result_loader');
                                            preloader.fadeOut(500);
                                            Airlines();
                                        }
                                    }
                                }
                                );
                            }
                        </script>
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
                                
                                    <div id="time-range3">
                                        <h5>Journey Duration</h5>
                                        <p><span class="slider-time"></span> - <span class="slider-time2"></span>

                                        </p>
                                        <div class="sliders_step1">
                                            <div id="slider-range3"></div>
                                        </div>
                                    </div>
                                    
                            </div>
                        </div>
                        <style>
                            
                            .duration_result_loader
                            {
                                    width: 100%;
                                    margin: 0 auto;
                                    position: absolute;
                                    z-index: 999999999999999999999999999;
                                    background: #f1f2f8;
                                    height: 100%;
                                    left: 0;
                                    right: 0;
                                    /* top: auto; */
                                    bottom: 0;
                            }
                            .duration_result_loader .sk-chase
                            {
                                    margin: 50px auto;
                            }
                        </style>
                        <div class="results_loader duration_result_loader">
                            <div class="sk-chase">
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
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
                        
                         
                     <style>
                            
                            .airline_result_loader
                            {
                                    width: 100%;
                                    margin: 0 auto;
                                    position: absolute;
                                    z-index: 999999999999999999999999999;
                                    background: #f1f2f8;
                                    height: 100%;
                                    left: 0;
                                    right: 0;
                                    /* top: auto; */
                                    bottom: 0;
                            }
                            .airline_result_loader .sk-chase
                            {
                                    margin: 50px auto;
                            }
                        </style>
                        <div class="results_loader airline_result_loader">
                            <div class="sk-chase">
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                            </div>
                        </div>                   
                    </div>
                    <script>
                            
                        function Airlines()
                        {
                            $.ajax({
                                url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckAirlines/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>",
                                success: function (result, page) 
                                {

                                    var abc = <?php echo json_encode($payload); ?>;
                                    var ab = Object.keys(abc).map(function (key) { return abc[key]; });
                                    if(result==="0")
                                    {
                                        
                                            $.ajax({
                                                url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckAirlines/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>",
                                                success: function (result, page) 
                                                {
                                                    BestPrice();
                                                    $('#collapse4').html(result);
                                                    var preloader = $('.stops_result_loader');
                                                        preloader.fadeOut(500);
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
                                                }
                                            }
                                            );
                                        



                                        
                                    }
                                    else
                                    {
                                        $('#collapse4').html(result);
                                        BestPrice();
                                        var preloader = $('.stops_result_loader');
                                        preloader.fadeOut(500);
                                    }
                                    
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
                                }
                            }
                            );
                        }
                    </script>
                  </div>
                </div>
              </div> 
        </div>
        
        <div class="col-md-9 ">
            <ul class="nav nav-pills">
                <li class="active">
                    <a class="CheckBestPrice" data-toggle="pill" href="#best">
                        
                    </a>
                    <style>
                            
                            .best_result_loader
                            {
                                    width: 100%;
                                    margin: 0 auto;
                                    position: absolute;
                                    z-index: 999999999999999999999999999;
                                    background: #f1f2f8;
                                    height: 100%;
                                    left: 0;
                                    right: 0;
                                    /* top: auto; */
                                    bottom: 0;
                            }
                            .best_result_loader .sk-chase
                            {
                                    margin: 50px auto;
                            }
                        </style>
                        <div class="results_loader best_result_loader">
                            <div class="sk-chase">
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                            </div>
                        </div>                   
                    
                    <script>
                            
                        function BestPrice()
                        {
                            $.ajax({
                                url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckBestPrice/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&discount=<?php echo $discount; ?>",
                                success: function (result, page) 
                                {

                                    
                                    if(result==="0")
                                    {
                                        var count = 0;
                                        while(result==='0')
                                        {
                                            count++;
                                            if(count>3)
                                            {
                                                break;
                                            }
                                            $.ajax({
                                                url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckBestPrice/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&discount=<?php echo $discount; ?>",
                                                success: function (res, page) 
                                                {
                                                    if(res==="0")
                                                    {
                                                        
                                                    }
                                                    else
                                                    {
                                                        result = res;
                                                        $('.CheckBestPrice').html(res);
                                                    CheapPrice();
                                                    var preloader = $('.best_result_loader');
                                                        preloader.fadeOut(500);
                                                        var pl = $('.page-preloader');
                                                        pl.fadeOut(500);
                                                        
                                                    }
                                                    
                                                }
                                            }
                                            );
                                        }
                                        
                                    }
                                    else
                                    {
                                        $('.CheckBestPrice').html(result);
                                        CheapPrice();
                                        var preloader = $('.best_result_loader');
                                        preloader.fadeOut(500);
                                        var pl = $('.page-preloader');
                                            pl.fadeOut(500);
                                    }
                                }
                            }
                            );
                        }
                    </script>
                </li>
                
                <li>
                    <a class="CheckCheapPrice" data-toggle="pill" href="#cheapest">
                        
                    </a>
                    <style>
                            
                            .cheap_result_loader
                            {
                                    width: 100%;
                                    margin: 0 auto;
                                    position: absolute;
                                    z-index: 999999999999999999999999999;
                                    background: #f1f2f8;
                                    height: 100%;
                                    left: 0;
                                    right: 0;
                                    /* top: auto; */
                                    bottom: 0;
                            }
                            .cheap_result_loader .sk-chase
                            {
                                    margin: 50px auto;
                            }
                        </style>
                        <div class="results_loader cheap_result_loader">
                            <div class="sk-chase">
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                            </div>
                        </div>                   
                    
                    <script>
                            
                        function CheapPrice()
                        {
                            $.ajax({
                                url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckCheapPrice/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&discount=<?php echo $discount; ?>",
                                success: function (result, page) 
                                {

                                    
                                    if(result==="0")
                                    {
                                        var count = 0;
                                        while(result==='0')
                                        {
                                            count++;
                                            if(count>3)
                                            {
                                                break;
                                            }
                                            $.ajax({
                                                url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckCheapPrice/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&discount=<?php echo $discount; ?>",
                                                success: function (res, page) 
                                                {
                                                    if(res==="0")
                                                    {
                                                        
                                                    }
                                                    else
                                                    {
                                                        result = res;
                                                        $('.CheckCheapPrice').html(res);
                                                        FastPrice();
                                                        var preloader = $('.cheap_result_loader');
                                                            preloader.fadeOut(500);
                                                    }
                                                }
                                            }
                                            );
                                        }
                                        
                                    }
                                    else
                                    {
                                        $('.CheckCheapPrice').html(result);
                                        FastPrice();
                                        var preloader = $('.cheap_result_loader');
                                        preloader.fadeOut(500);
                                    }
                                }
                            }
                            );
                        }
                    </script>
                </li>
                
                <li>
                    <a class="CheckFastestPrice" data-toggle="pill" href="#fastest">
                        
                    </a>
                    <style>
                            
                            .fastest_result_loader
                            {
                                    width: 100%;
                                    margin: 0 auto;
                                    position: absolute;
                                    z-index: 999999999999999999999999999;
                                    background: #f1f2f8;
                                    height: 100%;
                                    left: 0;
                                    right: 0;
                                    /* top: auto; */
                                    bottom: 0;
                            }
                            .fastest_result_loader .sk-chase
                            {
                                    margin: 50px auto;
                            }
                        </style>
                        <div class="results_loader fastest_result_loader">
                            <div class="sk-chase">
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                            </div>
                        </div>                   
                    
                    <script>
                            
                        function FastPrice()
                        {
                            $.ajax({
                                url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckFastestPrice/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&discount=<?php echo $discount; ?>",
                                success: function (result, page) 
                                {

                                    
                                    if(result==="0")
                                    {
                                        var count = 0;
                                        while(result==='0')
                                        {
                                            count++;
                                            if(count>3)
                                            {
                                                break;
                                            }
                                            $.ajax({
                                                url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckFastestPrice/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&discount=<?php echo $discount; ?>",
                                                success: function (res, page) 
                                                {
                                                    if(res==="0")
                                                    {
                                                        
                                                    }
                                                    else
                                                    {
                                                        result = res;
                                                        $('.CheckFastestPrice').html(res);
                                                        BestListing();
                                                        var preloader = $('.fastest_result_loader');
                                                            preloader.fadeOut(500);
                                                    }
                                                }
                                            }
                                            );
                                        }
                                            
                                        
                                        
                                    }
                                    else
                                    {
                                        $('.CheckFastestPrice').html(result);
                                        BestListing();
                                        var preloader = $('.fastest_result_loader');
                                        preloader.fadeOut(500);
                                    }
                                }
                            }
                            );
                        }
                    </script>
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
$query_stop = '';

if(isset($_GET['stops']))
{
    $query_stop = $_GET['stops'];
}
else
{
    $query_stop = '0,1,2';
}
if($query_airline_ids==='')
{
    $inputAirlineIdArray = $NewcarrierIDArray;
}

 ?>
<style>
    .listingcontent
    {
        position: relative;
    }
</style>
              <div class="tab-content listingcontent">
                <div id="best" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12 bestlisting">
                        </div>
                        <style>
                            
                            .best_listing_loader
                            {
                                    width: 100%;
                                    margin: 0 auto;
                                    position: absolute;
                                    z-index: 999999999999999999999999999;
                                    background: #f1f2f8;
                                    height: 100%;
                                    left: 0;
                                    right: 0;
                                    /* top: auto; */
                                    bottom: 0;
                            }
                            .best_listing_loader .sk-chase
                            {
                                    margin: 50px auto;
                            }
                        </style>
                        <div class="results_loader best_listing_loader">
                            <div class="sk-chase">
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                            </div>
                        </div>                   
                    
                        <script>
                                
                            function BestListing()
                            {
                                $.ajax({
                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/GetBestListing/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&stops=<?php echo $query_stop;?><?php echo $inbound; ?><?php echo $adults; ?><?php echo $children; ?><?php echo $infant; ?>&discount=<?php echo $discount; ?>",
                                    success: function (result, page) 
                                    {
                                        
                                        if(result==="0")
                                        {
                                            var count = 0;
                                            while(result==='0')
                                            {
                                                count++;
                                                if(count>3)
                                                {
                                                    break;
                                                }
                                                $.ajax({
                                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/GetBestListing/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&stops=<?php echo $query_stop;?><?php echo $inbound; ?><?php echo $adults; ?><?php echo $children; ?><?php echo $infant; ?>&discount=<?php echo $discount; ?>",
                                                    success: function (res, page) 
                                                    {
                                                        if(res==="0")
                                                        {
                                                            
                                                        }
                                                        else
                                                        {
                                                            result = res;
                                                            $('.bestlisting').html(res);
                                                            CheapListing();
                                                            var preloader = $('.best_listing_loader');
                                                                preloader.fadeOut(500);
                                                                var pl = $('.page-preloader');
                                                                pl.fadeOut(500);
                                                                clearInterval(myvar);
                                                        }
                                                    }
                                                }
                                                );
                                            }
                                            
                                        }
                                        else
                                        {
                                            $('.bestlisting').html(result);
                                            CheapListing();
                                            var preloader = $('.best_listing_loader');
                                            preloader.fadeOut(500);
                                            var pl = $('.page-preloader');
                                            pl.fadeOut(500);
                                            clearInterval(myvar);
                                        }
                                    }
                                }
                                );
                            }
                        </script>
                    </div>

                </div>
                <div id="cheapest" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 cheaplisting">
                        

                        </div>
                        <style>
                            
                            .cheap_listing_loader
                            {
                                    width: 100%;
                                    margin: 0 auto;
                                    position: absolute;
                                    z-index: 999999999999999999999999999;
                                    background: #f1f2f8;
                                    height: 100%;
                                    left: 0;
                                    right: 0;
                                    /* top: auto; */
                                    bottom: 0;
                            }
                            .cheap_listing_loader .sk-chase
                            {
                                    margin: 50px auto;
                            }
                        </style>
                        <div class="results_loader cheap_listing_loader">
                            <div class="sk-chase">
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                            </div>
                        </div>                   
                    
                        <script>
                                
                            function CheapListing()
                            {
                                $.ajax({
                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/GetCheapListing/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&stops=<?php echo $query_stop;?><?php echo $inbound; ?><?php echo $adults; ?><?php echo $children; ?><?php echo $infant; ?>&discount=<?php echo $discount; ?>",
                                    success: function (result, page) 
                                    {

                                        
                                        if(result==="0")
                                        {
                                            var count = 0;
                                            while(result==='0')
                                            {
                                                count++;
                                                if(count>3)
                                                {
                                                    break;
                                                }
                                                $.ajax({
                                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/GetCheapListing/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&stops=<?php echo $query_stop;?><?php echo $inbound; ?><?php echo $adults; ?><?php echo $children; ?><?php echo $infant; ?>&discount=<?php echo $discount; ?>",
                                                    success: function (res, page) 
                                                    {
                                                        if(res==="0")
                                                        {
                                                            
                                                        }
                                                        else
                                                        {
                                                             result = res;
                                                            $('.cheaplisting').html(res);
                                                            FastListing();
                                                            var preloader = $('.cheap_listing_loader');
                                                                preloader.fadeOut(500);
                                                        }
                                                    }
                                                }
                                                );
                                            }
                                            
                                        }
                                        else
                                        {
                                            $('.cheaplisting').html(result);
                                            FastListing();
                                            var preloader = $('.cheap_listing_loader');
                                            preloader.fadeOut(500);
                                        }
                                    }
                                }
                                );
                            }
                        </script>
                    </div>
                </div>
                <div id="fastest" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 fastlisting">
                        

                        </div>
                        <style>
                            
                            .fast_listing_loader
                            {
                                    width: 100%;
                                    margin: 0 auto;
                                    position: absolute;
                                    z-index: 999999999999999999999999999;
                                    background: #f1f2f8;
                                    height: 100%;
                                    left: 0;
                                    right: 0;
                                    /* top: auto; */
                                    bottom: 0;
                            }
                            .fast_listing_loader .sk-chase
                            {
                                    margin: 50px auto;
                            }
                        </style>
                        <div class="results_loader fast_listing_loader">
                            <div class="sk-chase">
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                              <div class="sk-chase-dot"></div>
                            </div>
                        </div>                   
                    
                        <script>
                                
                            function FastListing()
                            {
                                $.ajax({
                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/GetFastListing/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&stops=<?php echo $query_stop;?><?php echo $inbound; ?><?php echo $adults; ?><?php echo $children; ?><?php echo $infant; ?>&discount=<?php echo $discount; ?>",
                                    success: function (result, page) 
                                    {

                                        
                                        if(result==="0")
                                        {
                                            var count = 0;
                                            while(result==='0')
                                            {
                                                count++;
                                                if(count>3)
                                                {
                                                    break;
                                                }
                                                $.ajax({
                                                    url: "<?php echo base_url(); ?>admin/ajaxcalls/GetFastListing/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_airline_ids=<?php echo $query_airline_ids;?>&stops=<?php echo $query_stop;?><?php echo $inbound; ?><?php echo $adults; ?><?php echo $children; ?><?php echo $infant; ?>&discount=<?php echo $discount; ?>",
                                                    success: function (res, page) 
                                                    {
                                                        if(res==="0")
                                                        {
                                                            
                                                        }
                                                        else
                                                        {
                                                             result = res;
                                                            $('.fastlisting').html(res);
                                                        
                                                            var preloader = $('.fast_listing_loader');
                                                            preloader.fadeOut(500);
                                                            var pl = $('.page-preloader');
                                                            pl.fadeOut(500);
                                                        }
                                                    }
                                                }
                                                );
                                            
                                            }
                                        }
                                        else
                                        {
                                            $('.fastlisting').html(result);
                                            
                                            var preloader = $('.fast_listing_loader');
                                            preloader.fadeOut(500);

                                            var pl = $('.page-preloader');
                                            pl.fadeOut(500);
                                        }
                                    }
                                }
                                );
                            }
                        </script>
                    </div>
                </div>
            


            
            
            
        </div>
    </div>
</div>

<?php


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
        


        ?>
        var max_hours = 0;
        $.ajax({
            url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckMaxHours/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_outbounddepart=<?php echo $query_outbounddepart;?>&query_outboundarrive=<?php echo $query_outboundarrive;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_returndepart=<?php echo $query_returndepart;?>&query_returnarrive=<?php echo $query_returnarrive;?>",
            success: function (result, page) 
            {

                
                if(result==="0")
                {
                }
                else
                {
                    max_hours = result;
                    $.ajax({
                        url: "<?php echo base_url(); ?>admin/ajaxcalls/CheckMinHours/?session_key=<?php echo $session_key;?>&departure=<?php echo $departureCheap;?>&arrival=<?php echo $arrivalCheap;?>&query_outbounddepart=<?php echo $query_outbounddepart;?>&query_outboundarrive=<?php echo $query_outboundarrive;?>&query_flight_duration=<?php echo $query_flight_duration;?>&query_returndepart=<?php echo $query_returndepart;?>&query_returnarrive=<?php echo $query_returnarrive;?>",
                        success: function (result, page) 
                        {
                            var fd = <?php echo $fd; ?>;
                            fd = parseFloat(fd);
                            if(fd==0)
                            {
                                fd = max_hours;
                            }
                            var min_hours = 0;
                            min_hours = result;
                            $('#time-range3 .slider-time').html(min_hours + ' hours');
                            $('#time-range3 .slider-time2').html(fd + ' hours');
                            $("#slider-range3").slider({
            
                                min: parseFloat(min_hours),
                                max: parseFloat(max_hours),
                                step: 0.5,
                                value: [parseFloat(fd)]
                            });
                            $("#slider-range3").on('slide',function(sliderValue){

                                    var v = sliderValue.value;
                                    
                                

                                    $('#time-range3 .slider-time2').html(v + ' hours');
                                    //alert(sliderValue.value);
                                });
                            var preloader = $('.duration_result_loader');
                            preloader.fadeOut(500);

                        }
                    }
                    );
                    
                }
            }
        }
        );
        
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
            var session_key= '<?php echo $session_key; ?>';
            var reload = '<?php if(isset($_GET['reload'])){echo $_GET['reload'];} ?>';
            if((session_key===null || session_key==='') && reload==='true')
            {
                window.location.href = "<?php echo  base_url();?>"+ab.toString().replace(/,/gi,'/')+"?reload=false";
            }
            else if((session_key===null || session_key==='') && reload==='false')
            {}
            else if((session_key===null || session_key==='') && reload==='')
            {
                window.location.href = "<?php echo  base_url();?>"+ab.toString().replace(/,/gi,'/')+"?reload=true";
            }


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
<style>
    .page-preloader
    {
        position: fixed;
        z-index: 9999999999999999999999999999999999999999999999999999999;
        background: #fff;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
    }
    .page-preloader svg {
        overflow: visible;
        width: 100px;
        height: 150px;
        margin: 0 auto;
        margin: 10% 45% 5%;
        text-align: center;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }
    .page-preloader
    {
        font-family: 'Josefin Sans', serif;
        
    }
    .loader
    {
        -webkit-box-align: stretch;
        -webkit-align-items: stretch;
        -ms-flex-align: stretch;
        align-items: stretch;
        background: #efeee5;
        bottom: 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        left: 0;
        margin-top: 55px;
        min-height: 100vh;
        overflow-y: scroll;
        padding-bottom: 142px;
        position: fixed;
        right: 0;
        top: 0;
        z-index: 1;
    }

    .loader {
        -webkit-box-align: stretch;
        -webkit-align-items: stretch;
        -ms-flex-align: stretch;
        align-items: stretch;
        background: #efeee5;
        bottom: 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        left: 0;
        margin-top: 55px;
        min-height: 100vh;
        overflow-y: scroll;
        padding-bottom: 142px;
        position: fixed;
        right: 0;
        top: 0;
        z-index: 1
    }

    @media screen and (max-width:767px) {
        .loader {
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-top: 0;
            padding-bottom: 0
        }
    }

    .login-view .loader {
        margin-top: 0;
        padding-bottom: 0;
        overflow-y: hidden
    }

    .loader .loader__blocks {
        -webkit-box-align: stretch;
        -webkit-align-items: stretch;
        -ms-flex-align: stretch;
        align-items: stretch;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-flex: 10;
        -webkit-flex-grow: 10;
        -ms-flex-positive: 10;
        flex-grow: 10;
        height: 33%;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: 100%
    }

    @media screen and (max-width:767px) {
        .loader .loader__blocks {
            display: none
        }
    }

    @media screen and (min-width:768px) and (max-width:999px) {
        .loader .loader__blocks {
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap
        }
        .loader .loader__blocks .loader__block__promo {
            margin-bottom: 20px
        }
        .loader .loader__blocks .loader__block__banner {
            margin-bottom: 100px
        }
    }

    @media screen and (min-width:768px) and (max-width:999px) {
        .loader .loader__blocks .banner {
            margin-top: 30px;
            width: 100%
        }
    }

    @media screen and (min-width:1000px) {
        .loader .loader__blocks .banner {
            margin-left: 20px
        }
    }

    .loader .loader__blocks__content {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    @media screen and (min-width:1000px) {
        .loader .loader__blocks__content {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row
        }
    }

    @media screen and (min-width:768px) and (max-width:999px) {
        .loader .loader__blocks__content {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column
        }
    }

    @media screen and (max-width:767px) {
        .loader .loader__blocks--newDesign,
        .loader .loader__blocks--welcome {
            display: block;
            -webkit-box-flex: 0;
            -webkit-flex-grow: 0;
            -ms-flex-positive: 0;
            flex-grow: 0;
            height: auto
        }
        .loader .loader__blocks--newDesign .promo__payment--with-welcome,
        .loader .loader__blocks--welcome .promo__payment--with-welcome {
            display: none
        }
        .loader .loader__blocks--newDesign .promo__content__header,
        .loader .loader__blocks--welcome .promo__content__header {
            font-size: 20px
        }
        .loader .loader__blocks--newDesign .loader__block__promo,
        .loader .loader__blocks--welcome .loader__block__promo {
            margin: 0 auto
        }
    }

    .loader .loader__blocks--newDesign .promo .promo__payment,
    .loader .loader__blocks--welcome .promo .promo__payment {
        background-color: #f9fbf6;
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
        border-top: 2px solid #efeee5
    }

    .loader .loader__blocks--newDesign .promo .promo__content__list>li>span:first-child,
    .loader .loader__blocks--welcome .promo .promo__content__list>li>span:first-child {
        color: #f9fbf6
    }

    .loader .loader__blocks--newDesign .promo .promo__content__list .icon-Buttons_CheckBig,
    .loader .loader__blocks--welcome .promo .promo__content__list .icon-Buttons_CheckBig {
        background-color: #92be14;
        border-radius: 50%;
        color: #f9fbf6;
        height: 26px;
        line-height: 26px;
        margin-right: 10px;
        margin-top: -3px;
        text-align: center;
        width: 26px
    }

    @media screen and (min-width:1000px) {
        .loader .loader__blocks--newDesign .promo {
            min-width: auto
        }
    }

    .loader .loader__blocks--newDesign .promo .promo__content {
        padding: 30px 24px
    }

    .loader-header {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: .5;
        -webkit-flex-grow: .5;
        -ms-flex-positive: .5;
        flex-grow: .5;
        height: 33%;
        -webkit-justify-content: space-around;
        -ms-flex-pack: distribute;
        justify-content: space-around;
        min-height: 150px;
        text-align: center;
        width: 100%
    }

    .loader-header:only-child {
        height: 100%
    }

    @media screen and (max-width:767px) {
        .loader-header {
            -webkit-box-flex: 0;
            -webkit-flex-grow: 0;
            -ms-flex-positive: 0;
            flex-grow: 0;
            height: auto
        }
    }

    @media screen and (min-width:768px) and (max-width:999px) {
        .loader-header {
            min-height: 100px
        }
    }

    .loader-header .loader-header__content__message-wrapper {
        -webkit-align-self: center;
        -ms-flex-item-align: center;
        align-self: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    .loader-header .loader-header__content__message-wrapper--message {
        border-right: none;
        display: inline-block;
        line-height: 24px;
        padding-right: 0
    }

    .loader-header .loader-header__content__message-wrapper-with-welcome {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column
    }

    .loader-header .loader-header__content__message-wrapper-with-welcome .loader-welcome-message__text {
        
        font-weight: 400;
        color: #007cc3;
        font-size: 43px;
        font-weight: 700;
        line-height: 43px
    }

    html[lang=th] .loader-header .loader-header__content__message-wrapper-with-welcome .loader-welcome-message__text:not(.price__value) {
        font-family: Kanit;
        font-smoothing: subpixel-antialiased;
        -webkit-font-smoothing: subpixel-antialiased;
        font-weight: 300
    }

    .wf-inactive .loader-header .loader-header__content__message-wrapper-with-welcome .loader-welcome-message__text,
    .wf-linotte-n4-active .loader-header .loader-header__content__message-wrapper-with-welcome .loader-welcome-message__text,
    .wf-linotte-n4-inactive .loader-header .loader-header__content__message-wrapper-with-welcome .loader-welcome-message__text {
        visibility: visible
    }

    @media screen and (max-width:767px) {
        .loader-header .loader-header__content__message-wrapper-with-welcome .loader-welcome-message__text {
            font-size: 26px
        }
    }

    .loader-header .loader-header__content__message-wrapper-with-welcome .loader-header__content__message-wrapper__one-moment {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding-top: 20px
    }

    .loader-header .loader-header__content__message-wrapper-with-welcome .loader-header__content__message-wrapper__one-moment .loading-spinner {
        margin: 0 10px 0 0
    }

    .loader-header .loader-header__content__message-wrapper-with-welcome .loader-header__content__message-wrapper__one-moment .one-moment-loader__text {
        
        font-weight: 500;
        color: #414141;
        font-size: 19px
    }

    html[lang=th] .loader-header .loader-header__content__message-wrapper-with-welcome .loader-header__content__message-wrapper__one-moment .one-moment-loader__text:not(.price__value) {
        font-family: Kanit;
        font-smoothing: subpixel-antialiased;
        -webkit-font-smoothing: subpixel-antialiased;
        font-weight: 300
    }

    .wf-inactive .loader-header .loader-header__content__message-wrapper-with-welcome .loader-header__content__message-wrapper__one-moment .one-moment-loader__text,
    .wf-linotte-n5-active .loader-header .loader-header__content__message-wrapper-with-welcome .loader-header__content__message-wrapper__one-moment .one-moment-loader__text,
    .wf-linotte-n5-inactive .loader-header .loader-header__content__message-wrapper-with-welcome .loader-header__content__message-wrapper__one-moment .one-moment-loader__text {
        visibility: visible
    }

    .loader-header .loader-header__group {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        width: auto
    }

    @media screen and (max-width:767px) {
        .loader-header .loader-header__group {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column
        }
    }

    .loader-header .loader-header__content {
        
        font-weight: 600;
        color: #007cc3;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        font-size: 19px;
        max-width: 500px;
        padding: 10px;
        position: relative;
        width: auto
    }

    html[lang=th] .loader-header .loader-header__content:not(.price__value) {
        font-family: Kanit;
        font-smoothing: subpixel-antialiased;
        -webkit-font-smoothing: subpixel-antialiased;
        font-weight: 300
    }

    .wf-inactive .loader-header .loader-header__content,
    .wf-linotte-n6-active .loader-header .loader-header__content,
    .wf-linotte-n6-inactive .loader-header .loader-header__content {
        visibility: visible
    }

    @media screen and (min-width:768px) {
        .loader-header .loader-header__content {
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-align-self: center;
            -ms-flex-item-align: center;
            -ms-grid-row-align: center;
            align-self: center;
            border-bottom: none;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            float: left;
            height: auto;
            line-height: 11px;
            margin-bottom: 0
        }
    }

    @media screen and (min-width:0) and (max-width:319px) {
        .loader-header .loader-header__content {
            margin-bottom: 10px
        }
    }

    .loader-header .loader-header__content__loader-spinner {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        float: left;
        margin-right: 15px;
        min-height: 36px;
        min-width: 36px
    }

    .loader-header .loader-header__logos-wrapper {
        float: none
    }

    @media screen and (min-width:768px) {
        .loader-header .loader-header__logos-wrapper {
            float: left
        }
    }

    .loader-header .loader-header__logos-wrapper .loader-header__logos-wrapper--divider {
        border-bottom: 2px dotted #b3dff9;
        display: block;
        margin: 10px auto;
        min-height: 1px
    }

    @media screen and (min-width:768px) {
        .loader-header .loader-header__logos-wrapper .loader-header__logos-wrapper--divider {
            border-bottom: none;
            border-right: 2px dotted #b3dff9;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-flex-flow: initial;
            -ms-flex-flow: initial;
            flex-flow: initial;
            -webkit-flex-wrap: nowrap;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            float: left;
            min-height: 36px;
            padding-left: 5px
        }
    }

    .loader-header .loader-header__logos-wrapper .loader-header__logos-wrapper__logos {
        display: inline-block;
        height: 55px;
        text-align: center;
        width: auto
    }

    @media screen and (min-width:768px) {
        .loader-header .loader-header__logos-wrapper .loader-header__logos-wrapper__logos {
            float: left;
            text-align: left;
            margin-left: 15px;
            min-width: 150px;
            width: auto
        }
    }

    .loader-header .loader-header__logos-wrapper .loader-header__logos-wrapper__logos .loader-header__logos__airline-logo {
        max-height: 55px;
        max-width: 140px;
        opacity: 1;
        position: relative;
        top: 0;
        -webkit-transition: all 1s ease-out;
        transition: all 1s ease-out;
        vertical-align: middle
    }

    .loader-header .loader-header__logos-wrapper .loader-header__logos-wrapper__logos .loader-header__logos__airline-logo.fadeIn {
        opacity: .3;
        -webkit-transition: opacity .5s linear;
        transition: opacity .5s linear;
        -webkit-transform: translateY(5px);
        transform: translateY(5px)
    }

    .loader-header .loader-header__logos-wrapper .loader-header__logos-wrapper__logos .loader-header__logos__airline-logo.fadeOut {
        -webkit-transform: translateY(-8px);
        transform: translateY(-8px);
        opacity: 0
    }

    .loader-header .loader-header__logos-wrapper .loader-header__logos-wrapper__logos:before {
        content: "";
        display: inline-block;
        height: 100%;
        vertical-align: middle
    }

    .loader__header--newDesign {
        height: auto;
        min-height: auto
    }

    @media screen and (min-width:768px) {
        .loader__header--newDesign {
            margin-bottom: 40px;
            margin-top: 50px
        }
    }

    @media screen and (max-width:767px) {
        .loader__header--newDesign .loader-header__content {
            padding: 20px
        }
        .loader__header--newDesign .loader-header__content__message-wrapper {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1
        }
    }

    .loader .loading-spinner {
        height: 36px;
        margin-right: 15px;
        width: 36px
    }

    
        .loader .loading-spinner {
            background: url(<?php echo base_url(); ?>themes/default/assets/img/loader_@2X.webp) no-repeat left center;
            background-size: 100% auto
        }
        .loading-spinner {
        -webkit-animation: rotation infinite .7s;
        animation: rotation infinite .7s;
        background: url(<?php echo base_url(); ?>themes/default/assets/img/loader.webp) no-repeat center center;
        text-align: center
    }

    @media screen and (-webkit-min-device-pixel-ratio:2),
    screen and (min-resolution:2dppx) {
        .loading-spinner {
            background: url(<?php echo base_url(); ?>themes/default/assets/img/loader_@2X.webp) no-repeat center center;
            background-size: 100% auto
        }
    }

    .loading-spinner>div {
        width: 12px;
        height: 12px;
        border-radius: 100%;
        display: inline-block;
        -webkit-animation: bouncedelay 1.4s infinite ease-in-out;
        animation: bouncedelay 1.4s infinite ease-in-out;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both
    }
    
    @-webkit-keyframes rotation {
        0% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }
        10% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(36deg);
            transform: rotate(36deg)
        }
        20% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(72deg);
            transform: rotate(72deg)
        }
        30% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(108deg);
            transform: rotate(108deg)
        }
        40% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(144deg);
            transform: rotate(144deg)
        }
        50% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg)
        }
        60% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(216deg);
            transform: rotate(216deg)
        }
        70% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(252deg);
            transform: rotate(252deg)
        }
        80% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(288deg);
            transform: rotate(288deg)
        }
        90% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(324deg);
            transform: rotate(324deg)
        }
        100% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg)
        }
    }

    @keyframes rotation {
        0% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(0);
            transform: rotate(0)
        }
        10% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(36deg);
            transform: rotate(36deg)
        }
        20% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(72deg);
            transform: rotate(72deg)
        }
        30% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(108deg);
            transform: rotate(108deg)
        }
        40% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(144deg);
            transform: rotate(144deg)
        }
        50% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg)
        }
        60% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(216deg);
            transform: rotate(216deg)
        }
        70% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(252deg);
            transform: rotate(252deg)
        }
        80% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(288deg);
            transform: rotate(288deg)
        }
        90% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(324deg);
            transform: rotate(324deg)
        }
        100% {
            -webkit-animation-timing-function: steps(1, end);
            animation-timing-function: steps(1, end);
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg)
        }
    }

    .loader-progress {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center
    }

    .loader-progress__container {
        padding-top: 15px;
        width: 300px
    }

    .loader-progress__line-bg {
        background-color: #fff;
        border-radius: 4px;
        height: 4px
    }

    .loader-progress__line-value {
        background-color: #ff7f00;
        border-radius: 4px;
        height: 4px;
        -webkit-transition: width .5s;
        transition: width .5s
    }

    .loader-progress__description {
        font-family: Roboto, sans-serif;
        font-weight: 400;
        color: #757575;
        font-size: 13px;
        padding-top: 25px
    }

    .wf-inactive .loader-progress__description,
    .wf-roboto-n4-active .loader-progress__description,
    .wf-roboto-n4-inactive .loader-progress__description {
        visibility: visible
    }

    .loader-progress__title {
        font-weight: 700
    }

    .loader-offset {
        -moz-transform-origin: 0 0
    }


    .promo {
        background-color: #fff;
        border-radius: 10px
    }

    @media screen and (min-width:1000px) {
        .promo {
            min-width: 501px;
            margin-left: 0
        }
    }

    .promo .promo__payment {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding: 25px
    }

    .promo .promo__payment .payment__pay-safely {
        display: none
    }

    .promo .promo__payment--with-welcome {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column
    }

    .promo .promo__payment--with-welcome .payment__pay-safely {
        
        font-weight: 600;
        color: #007cc3;
        display: block;
        font-size: 25px;
        font-weight: 700;
        margin-bottom: 10px
    }

    html[lang=th] .promo .promo__payment--with-welcome .payment__pay-safely:not(.price__value) {
        font-family: Kanit;
        font-smoothing: subpixel-antialiased;
        -webkit-font-smoothing: subpixel-antialiased;
        font-weight: 300
    }

    .wf-inactive .promo .promo__payment--with-welcome .payment__pay-safely,
    .wf-linotte-n6-active .promo .promo__payment--with-welcome .payment__pay-safely,
    .wf-linotte-n6-inactive .promo .promo__payment--with-welcome .payment__pay-safely {
        visibility: visible
    }

    .promo .payment__items {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex
    }

    .promo .promo__payment__item {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        min-width: 88px;
        text-align: center
    }

    .promo .promo__content {
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding: 30px
    }

    .promo .promo__content__header {
        color: #007cc3;
        font-size: 25px;
        margin-top: 0
    }

    .promo .promo__content__list {
        list-style: none;
        padding: 0;
        margin: 0
    }

    .promo .promo__content__list>li {
        color: #007cc3;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row;
        
        font-weight: 500;
        font-size: 20px;
        -webkit-box-pack: start;
        -webkit-justify-content: flex-start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        line-height: 26px;
        margin-bottom: 20px
    }

    html[lang=th] .promo .promo__content__list>li:not(.price__value) {
        font-family: Kanit;
        font-smoothing: subpixel-antialiased;
        -webkit-font-smoothing: subpixel-antialiased;
        font-weight: 300
    }

    .wf-inactive .promo .promo__content__list>li,
    .wf-linotte-n5-active .promo .promo__content__list>li,
    .wf-linotte-n5-inactive .promo .promo__content__list>li {
        visibility: visible
    }

    .promo .promo__content__list>li:last-child {
        margin-bottom: 0
    }

    .promo .promo__content__list>li>span {
        color: #1a91da;
        -webkit-flex-shrink: 20;
        -ms-flex-negative: 20;
        flex-shrink: 20;
        margin-right: 10px
    }

    .promo .promo__content__list>li>span:first-child {
        color: #92be14;
        -webkit-flex-shrink: 1;
        -ms-flex-negative: 1;
        flex-shrink: 1
    }


    .sprite-payment {
        background-image: url(<?php echo base_url(); ?>themes/default/assets/img/sprite-1553086358385-payment.webp)
    }

    @media (-webkit-min-device-pixel-ratio:2),
    (min-resolution:192dpi) {
        .sprite-payment {
            background-image: url(<?php echo base_url(); ?>themes/default/assets/img/sprite-1553086358385-payment@2x.webp);
            background-size: 97px 1206px
        }
    }

    .sprite-payment-visa-credit-card {
        background-position: 0 0;
        width: 52px;
        height: 18px
    }

    .sprite-payment-e-nets {
        background-position: 0 -18px;
        width: 69px;
        height: 19px
    }

    .sprite-payment-klarna {
        background-position: 0 -37px;
        width: 69px;
        height: 19px
    }

    .sprite-payment-hdfc-bank {
        background-position: 0 -56px;
        width: 94px;
        height: 19px
    }

    .sprite-payment-paypal {
        background-position: 0 -75px;
        width: 69px;
        height: 20px
    }

    .sprite-payment-rupay {
        background-position: 0 -95px;
        width: 69px;
        height: 22px
    }

    .sprite-payment-diners {
        background-position: 0 -116px;
        width: 69px;
        height: 22px
    }

    .sprite-payment-alipay {
        background-position: 0 -138px;
        width: 69px;
        height: 22px
    }

    .sprite-payment-itz-cash {
        background-position: 0 -160px;
        width: 50px;
        height: 24px
    }

    .sprite-payment-trustly {
        background-position: 0 -184px;
        width: 69px;
        height: 25px
    }

    .sprite-payment-safeshop {
        background-position: 0 -208px;
        width: 97px;
        height: 25px
    }

    .sprite-payment-visa {
        background-position: 0 -233px;
        width: 69px;
        height: 25px
    }

    .sprite-payment-p24 {
        background-position: 0 -258px;
        width: 69px;
        height: 26px
    }

    .sprite-payment-upi {
        background-position: 0 -284px;
        width: 69px;
        height: 27px
    }

    .sprite-payment-poli {
        background-position: 0 -311px;
        width: 69px;
        height: 27px
    }

    .sprite-payment-bancontact-mister-cash {
        background-position: 0 -338px;
        width: 45px;
        height: 28px
    }

    .sprite-payment-giropay {
        background-position: 0 -366px;
        width: 60px;
        height: 29px
    }

    .sprite-payment-e-bleue {
        background-position: 0 -395px;
        width: 82px;
        height: 29px
    }

    .sprite-payment-netbanking {
        background-position: 0 -424px;
        width: 44px;
        height: 29px
    }

    .sprite-payment-eps {
        background-position: 0 -453px;
        width: 36px;
        height: 29px
    }

    .sprite-payment-visa-electron {
        background-position: 0 -482px;
        width: 44px;
        height: 29px
    }

    .sprite-payment-visa-debit {
        background-position: 0 -511px;
        width: 59px;
        height: 29px
    }

    .sprite-payment-postfinance {
        background-position: 0 -540px;
        width: 44px;
        height: 29px
    }

    .sprite-payment-bleue {
        background-position: 0 -569px;
        width: 59px;
        height: 29px
    }

    .sprite-payment-sofort-banking {
        background-position: 0 -598px;
        width: 60px;
        height: 29px
    }

    .sprite-payment-sofort-en {
        background-position: 0 -627px;
        width: 60px;
        height: 29px
    }

    .sprite-payment-sofort {
        background-position: 0 -656px;
        width: 60px;
        height: 29px
    }

    .sprite-payment-state-bank-of-india {
        background-position: 0 -685px;
        width: 28px;
        height: 29px
    }

    .sprite-payment-amex {
        background-position: 0 -714px;
        width: 30px;
        height: 30px
    }

    .sprite-payment-ideal {
        background-position: 0 -744px;
        width: 34px;
        height: 30px
    }

    .sprite-payment-maestro {
        background-position: 0 -774px;
        width: 38px;
        height: 30px
    }

    .sprite-payment-bancontact {
        background-position: 0 -804px;
        width: 41px;
        height: 30px
    }

    .sprite-payment-mastercard {
        background-position: 0 -834px;
        width: 38px;
        height: 30px
    }

    .sprite-payment-jcb {
        background-position: 0 -864px;
        width: 38px;
        height: 30px
    }

    .sprite-payment-discover {
        background-position: 0 -894px;
        width: 46px;
        height: 30px
    }

    .sprite-payment-unionpay {
        background-position: 0 -924px;
        width: 46px;
        height: 30px
    }

    .sprite-payment-iyzico {
        background-position: 0 -954px;
        width: 69px;
        height: 35px
    }

    .sprite-payment-klarna-pay-now {
        background-position: 0 -989px;
        width: 52px;
        height: 36px
    }

    .sprite-payment-klarna-pay-later {
        background-position: 0 -1025px;
        width: 52px;
        height: 36px
    }

    .sprite-payment-apple-pay {
        background-position: 0 -1061px;
        width: 54px;
        height: 36px
    }

    .sprite-payment-federal-bank {
        background-position: 0 -1097px;
        width: 94px;
        height: 36px
    }

    .sprite-payment-klarna-slice-it {
        background-position: 0 -1133px;
        width: 52px;
        height: 36px
    }

    .sprite-payment-google-pay {
        background-position: 0 -1169px;
        width: 55px;
        height: 37px
    }
</style>
<div class="page-preloader">
    <div class="loader">
        <div class="loader-header">
            <div class="loader-header__group">
                <div class="loader-header__content">
                    <div class="loading-spinner"></div>
                    <div class="loader-header__content__message-wrapper">
                        <div class="loader-header__content__message-wrapper--message">We are now comparing airlines</div>
                    </div>
                </div>
                <div class="loader-header__logos-wrapper">
                    <div class="loader-header__logos-wrapper--divider"></div>
                    <div class="loader-header__logos-wrapper__logos"><img alt="KL" class="loader-header__logos__airline-logo" data-xivart-elm="airline-code__KL" src="assets/img/flights/1.png"></div>
                </div>
            </div>
        </div>
        <div class="loader__blocks">
            <div class="loader__blocks__content">
                <div class="loader__block loader__block__promo">
                    <div class="promo">
                        <div class="promo__content">
                            <h2 class="promo__content__header">Why book with Tripmeng.com?</h2>
                            <ul class="promo__content__list">
                                <li><span class="fa fa-check"></span>Save on great deals!</li>
                                <li><span class="fa fa-check"></span>Simple and fast booking</li>
                                <li><span class="fa fa-check"></span>Tripmeng.com is a member of IATA</li>
                            </ul>
                        </div>
                        <div class="promo__payment">
                            <div class="payment__pay-safely"><span>Pay safely with:</span></div>
                            <div class="payment__items">
                                <div class="promo__payment__item promo__payment__item--amex">
                                    <div class="sprite-payment sprite-payment-amex"></div>
                                </div>
                                <div class="promo__payment__item promo__payment__item--visa-credit-card">
                                    <div class="sprite-payment sprite-payment-visa-credit-card"></div>
                                </div>
                                <div class="promo__payment__item promo__payment__item--paypal">
                                    <div class="sprite-payment sprite-payment-paypal"></div>
                                </div>
                                <div class="promo__payment__item promo__payment__item--discover">
                                    <div class="sprite-payment sprite-payment-discover"></div>
                                </div>
                                <div class="promo__payment__item promo__payment__item--mastercard">
                                    <div class="sprite-payment sprite-payment-mastercard"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div> 
<style>
    .loader
    {
        overflow: hidden;
    }
</style>
<script>
    
    var i=1;
 myvar = window.setInterval(function(){
    i++;
    if(i>=15)
    {
        i=1;
    }
    $('.loader-header__logos__airline-logo').addClass('fadeOut');
  $('.loader-header__logos__airline-logo').attr("src","<?php echo base_url(); ?>themes/default/assets/img/flights/"+i+".png");
  $('.loader-header__logos__airline-logo').removeClass('fadeOut');
}, 2000);

</script>