<?php
    $query = new StdClass();
    $query->triptype = 'oneway';
    $query->cabinclass = 'economy';
    $query->origin = "";
    $query->destination = "";
    $query->departure = "";
    $query->arrival = "";
    $query->passenger = array('total' => 1, 'adult' => 1, 'children' => 0, 'infant' => 0);
?>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
<style>
    .select2-results
    {
        width: 400px;
    }
    .select2-results .select2-result-label
    {
        padding: 5px 8px 0;
        border:1px solid #dfdfdf;
    }
    .flight-code
    {
        display: inline-block;
        width: 20%;
        vertical-align: top;
        margin-top: 5px;
        text-align: center;
        font-family: 'Josefin Sans', serif;
        font-weight: 600;
    }
    .detail
    {
        display: inline-block;
        width: 78%;
        font-family: 'Josefin Sans', serif;
    }
    .detail span
    {
            display: block;
        line-height: 20px;
    }
    .detail .choosen
    {
        display: none;
    }
    .detail span.select2-match
    {
        display: inline-block;
    }
    .detail span.country
    {
        color: #a1a1a1;
    }
    .select2-chosen .detail span,
    .deparuteTimeDiv .detail span,
    .arrivalTimeDiv .detail span,
    .totalManualPassengerDiv .detail span
    {
        display: none;
    }
    .select2-chosen .detail .choosen,
    .deparuteTimeDiv .detail .choosen,
    .arrivalTimeDiv .detail .choosen,
    .totalManualPassengerDiv .detail .choosen
    {
            display: block;
            line-height: 22px;
            color: #000;
    }
    .select2-chosen .detail .city,
    .deparuteTimeDiv .detail .city,
    .arrivalTimeDiv .detail .city,
    .totalManualPassengerDiv .detail .city
    {
            font-weight: 600;
    }
    .select2-chosen .detail,
    .deparuteTimeDiv .detail,
    .arrivalTimeDiv .detail,
    .totalManualPassengerDiv .detail
    {
        text-align: left;
            vertical-align: super;
    }
    .select2-chosen .flight-code,
    .deparuteTimeDiv .flight-code,
    .arrivalTimeDiv .flight-code,
    .totalManualPassengerDiv .flight-code
    {
        margin-top: -3px;
    }
    .select2-container .select2-choice,
    .select2-chosen
    {
        padding-left: 0 !important;
        overflow: visible;
    }
    .select2-container .select2-choice>.select2-chosen
    {
        overflow: visible;
    }
    .select2-chosen
    {
        width: 100% !important;
    }
    .select2-results .select2-highlighted {
        background: #e9e9e9;
        color: #000;
    }
    .select2-container .select2-choice
    {
        border-right: 1px solid #a7a7a7;
    }
    .deparuteTimeDiv,
    .arrivalTimeDiv,
    .totalManualPassengerDiv
    {
            position: absolute;
            background: #fff;
            height: 100%;
            width: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 999999;
            cursor: pointer;
            border-right: 1px solid #a7a7a7;
    }
    .deparuteTimeDiv .flight-code,
    .arrivalTimeDiv .flight-code,
    .totalManualPassengerDiv .flight-code
    {
            color: #000;
            font-size: 20px;
            line-height: 50px;
            margin-top: 5px;
            width: 25%;
    }
    .deparuteTimeDiv .detail,
    .arrivalTimeDiv .detail,
    .totalManualPassengerDiv .detail
    {
        padding: 10px 0 0 0;
        width: 72%;
    }
    .sk-chase {
      width: 40px;
      height: 40px;
      position: relative;
      animation: sk-chase 2.5s infinite linear both;
      margin: 0 auto;
    }

    .sk-chase-dot {
      width: 100%;
      height: 100%;
      position: absolute;
      left: 0;
      top: 0; 
      animation: sk-chase-dot 2.0s infinite ease-in-out both; 
    }

    .sk-chase-dot:before {
      content: '';
      display: block;
      width: 25%;
      height: 25%;
      background-color: #fff;
      border-radius: 100%;
      animation: sk-chase-dot-before 2.0s infinite ease-in-out both; 
    }

    .sk-chase-dot:nth-child(1) { animation-delay: -1.1s; }
    .sk-chase-dot:nth-child(2) { animation-delay: -1.0s; }
    .sk-chase-dot:nth-child(3) { animation-delay: -0.9s; }
    .sk-chase-dot:nth-child(4) { animation-delay: -0.8s; }
    .sk-chase-dot:nth-child(5) { animation-delay: -0.7s; }
    .sk-chase-dot:nth-child(6) { animation-delay: -0.6s; }
    .sk-chase-dot:nth-child(1):before { animation-delay: -1.1s; }
    .sk-chase-dot:nth-child(2):before { animation-delay: -1.0s; }
    .sk-chase-dot:nth-child(3):before { animation-delay: -0.9s; }
    .sk-chase-dot:nth-child(4):before { animation-delay: -0.8s; }
    .sk-chase-dot:nth-child(5):before { animation-delay: -0.7s; }
    .sk-chase-dot:nth-child(6):before { animation-delay: -0.6s; }

    @keyframes sk-chase {
      100% { transform: rotate(360deg); } 
    }

    @keyframes sk-chase-dot {
      80%, 100% { transform: rotate(360deg); } 
    }

    @keyframes sk-chase-dot-before {
      50% {
        transform: scale(0.4); 
      } 100%, 0% {
        transform: scale(1.0); 
      } 
    }
    .spinwrap
    {
            width: calc(100% - 40px);
        margin: 0 auto;
        position: absolute;
        z-index: 999999999999999999999999999;
        background: #0031bc;
        height: 115px;
        left: 0;
        right: 0;
    }
</style>
<div class="spinwrap">
    <div class="sk-chase">
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
    </div>
</div>      

<form autocomplete="off" name="flightmanualSearch" action="<?php echo base_url('flights'); ?>" method="GET" role="search">
    <div class="col-md-2 form-group go-right col-xs-12">
        <div class="row">
            <div class="clearfix"></div>
            <input type="text" name="" value="" id="location_from">
            <input type="hidden" name="origin" value="" id="location_from_code">
        </div>
    </div>
    <div class="col-md-2 form-group go-right col-xs-12">
        <div class="row">
            <div class="clearfix"></div>
            <input type="text" name="" value="" id="location_to">
            <input type="hidden" name="destination" value="" id="location_to_code">
        </div>
    </div>
    <div class="bgfade col-md-2 form-group go-right col-xs-12 focusDateInput">
        <div class="row">
            <div class="clearfix"></div>
            <i class="iconspane-lg icon_set_1_icon-53"></i>
            <input autocomplete="false" type="date" placeholder="<?php echo trans('0472'); ?>" name="departure" value="<?php echo $query->departure; ?>" class="form form-control input-lg departureTime" required>
            <div class="deparuteTimeDiv">
                <div class="flight-code">
                    <span></span>
                </div>
                <div class="detail">
                        <div class="country choosen city">Select Date</div>
                        <div class="country choosen"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="bgfade col-md-2 form-group go-right col-xs-12 focusDateInput">
        <div class="row">
            <div class="clearfix"></div>
            <i class="iconspane-lg icon_set_1_icon-53"></i>
            <input autocomplete="false" type="date" placeholder="<?php echo trans('0473'); ?>" name="arrival" value="<?php echo $query->arrival; ?>" class="form form-control input-lg arrivalTime">
            <div class="arrivalTimeDiv">
                <div class="flight-code">
                    <span>31</span>
                </div>
                <div class="detail">
                        <div class="country choosen city">Oct, 2019</div>
                        <div class="country choosen">Thursday</div>
                </div>

            </div>
            <div class="arrivalTimeDiv onewaytype">
                
                <div class="detail">
                        <div class="country choosen city">One Way</div>
                        <div class="country choosen">Set Return Type</div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-2 form-group go-right col-xs-12">
        <div class="row">
            <div class="clearfix"></div>
            <i class="iconspane-lg icon_set_1_icon-70"></i>
            <input type="text" name="totalManualPassenger" value="<?php echo $query->passenger['total']; ?>" placeholder="0" class="form form-control input-lg travellerclass" data-toggle="modal" data-target="#manual_flightTravelers" required/>
            <div class="totalManualPassengerDiv">
                <div class="flight-code">
                    <span>2</span>
                </div>
                <div class="detail">
                        <div class="country choosen city">Traveller</div>
                        <div class="country choosen">1 Adult</div>
                </div>

            </div>
            <style>
                .guests input {
                    background: transparent;
                    border: 0;
                    outline: 0;
                    cursor: pointer
                }

                .guests .qty-result-text {
                    font-size: 40px;
                    line-height: 40px
                }

                @media(min-width:992px) {
                    .guests .qty-result-text {
                        font-size: 80px;
                        line-height: 50px
                    }
                }

                .guests input::-webkit-outer-spin-button,
                .guests input::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                    margin: 0
                }

                .guests .guest-list {
                    display: none;
                    background-color: #fff;
                    position: fixed;
                    z-index: 99999999999999999999999999999999999999999;
                    margin: 0;
                    padding: 0;
                    -moz-box-shadow: 0 0 10px rgba(0, 0, 0, .5);
                    -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, .5);
                    box-shadow: 0 0 10px rgba(0, 0, 0, .5);
                    left: 0;
                    right: 0;
                    width: 100%;
                    top: 0
                }

                .guests .guest-list li {
                    color: #3a3d45;
                    padding: 0;
                    list-style-type: none;
                    padding: 10px 0
                }

                .guests .guest-list li.header,
                .guests .guest-list li.footer {
                    background-color: #111236;
                    color: #fff;
                    padding: 20px 15px;
                        background-color: #111236;
                    font-family: 'Josefin Sans', sans-serif;
                    color: #fff;
                }

                .guests .guest-list li.header .qty-apply,
                .guests .guest-list li.footer .qty-apply {
                    font-size: 70%;
                    padding: 4px;
                    border: 1px solid #006a9f;
                    cursor: pointer;
                    float: right;
                    -moz-border-radius: 100%;
                    -webkit-border-radius: 100%;
                    border-radius: 100%
                }

                .guests .guest-list li div {
                    font-size: large;
                    float: left
                }

                .guests .guest-list li div:nth-child(1) {
                    width: 30%;
                    padding-left: 10px;
                }

                .guests .guest-list li div:nth-child(2) {
                    width: 35%;
                    padding-top:0px;
                }

                .guests .guest-list li div:nth-child(2) span {
                    font-size: 18px;
                    padding: 3px 10px;
                    display: inline-block;
                    font-weight: 300;
                    color: #111236;
                    font-family: 'Josefin Sans', sans-serif;
                }

                .guests .guest-list li div:nth-child(2) span small {
                    display: block;
                    font-weight: 200;
                    opacity: 0.7;
                }

                .guests .guest-list li div:nth-child(3) {
                    width: 35%;
                    text-align: right;
                    padding-right: 10px;
                    padding-top: 0px
                }

                .guests .guest-list li div>span {
                    font-size: 70%
                }

                .guests .guest-list li .qty-amount {
                        width: 40px;
                    height: 40px;
                    line-height: 50px;
                    text-align: center;
                    border: 2px solid #111236;
                    border-radius: 100%;
                    font-weight: 500;
                }

                .guests .guest-list li .qty-btn {
                    border: 2px solid #111236;
                    border-radius: 100%;
                    font-size: 20px;
                    width: 40px;
                    height: 40px;
                    line-height: 30px;
                    margin-left: 7px;
                    outline: none;
                    -moz-transition: all .5s;
                    -o-transition: all .5s;
                    -webkit-transition: all .5s;
                    transition: all .5s;
                    color: #111236;
                }

                .guests .guest-list li .qty-btn:hover {
                    background-color: #111236;
                    color: #fff;
                    border-color: #111236;
                }

                @media(min-width:768px) {
                    .guests .guest-list {
                        position: absolute;
                        width: auto;
                        min-width: 350px;
                        left: 0;
                        top: 93px
                    }
                }

                @media(min-width:992px) {
                    .guests .guest-list {
                        top: auto;
                        bottom: auto;
                        left: auto;
                        position: relative;
                    }
                }

                .guests {
                    position: relative;
                    padding-top: 0px;
                        padding-top: 0px;
                    position: absolute;
                    right: 232px;
                    top: 170px;
                }
                .promo-section .guests
                {
                    position: relative;
                    padding-top: 0px;
                        padding-top: 0px;
                    position: absolute;
                    right: 20px;
                    top: 125px;
                }
                .guests .date-value {
                    -moz-transition: all .5s;
                    -o-transition: all .5s;
                    -webkit-transition: all .5s;
                    transition: all .5s;
                    font-family: "Playfair Display", serif
                }

                .guests:before {
                    position: absolute;
                    content: attr(data-text);
                    left: 0;
                    top: 0
                }

                .guests:hover .date-value {
                    -moz-transform: translateX(15px);
                    -ms-transform: translateX(15px);
                    -o-transform: translateX(15px);
                    -webkit-transform: translateX(15px);
                    transform: translateX(15px)
                }

                @media(min-width:992px) {
                    
                    .guests .qty-result {
                        font-size: 80px;
                        line-height: 50px
                    }
                    
                    
                    .guests .qty-result {
                        height: 80px
                    }
                    
                }
                .guests:before
                {
                        font-weight: 500;
                    margin-bottom: 5px;
                }
                .guests .guest-list li.header .qty-apply, .guests .guest-list li.footer .qty-apply
                {
                    font-size: 100%;
                    border: 0;
                    margin-top: -5px;
                }
                .guests:before {
                    font-weight: 500;
                    margin-bottom: 5px;
                    font-family: 'Josefin Sans', sans-serif;
                    font-size: 18px;
                }
                @media(max-width: 991px)
                {
                    .guests
                    {
                        width:100%;
                    }
                   
                }
                .guests .result,
                .guests:before
                {
                    display: none;
                }
                .promo-section
                {
                    overflow: visible;
                }
                @media only screen and (max-width: 770px)
                {
                    .promo-section {
                        height: 700px !important;
                    }
                }
                @media only screen and (max-width: 770px)
                {
                    .select2-drop-active {
                        margin-top: 0px !important;
                        background: white;
                        height: auto;
                    }
                    .select2-results
                    {
                        width: auto;
                    }
                }
            </style>
            
            
        </div>

    </div>
    <div class="bgfade col-md-2 col-xs-12 search-button">
        <div class="clearfix"></div>
        <button type="submit"  class="btn-primary btn btn-lg btn-block pfb0">
        <?php echo trans('012'); ?>
        </button>
    </div>
    <div class="guests guest1" data-text="Total Passengers:">
                <div class="result">
                    <input class="qty-result" type="text" value="1" id="qty-result" readonly="readonly" />
                    <div class="qty-result-text date-value" id="qty-result-text"></div>
                </div>
                <!--=== guests list ===-->
                <ul class="guest-list">

                    <li class="header">
                        Please choose number of Passengers <span class="qty-apply"><i class="fa fa-close"></i></span>
                    </li>

                    <!--=== adults ===-->

                    <li class="clearfix">

                        <!--=== Adults value ===-->

                        <div>
                            <input class="qty-amount" value="1" type="text" id="ticket-adult" data-value="1" readonly="readonly" />
                        </div>

                        <div>
                            <span>Adults <small>12+ years</small></span>
                        </div>

                        <!--=== Add/remove quantity buttons ===-->

                        <div>
                            <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-adult" />
                            <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-adult" />
                        </div>

                    </li>

                    <!--=== chilrens ===-->

                    <li class="clearfix">

                        <!--=== Adults value ===-->

                        <div>
                            <input class="qty-amount" value="0" type="text" id="ticket-children" data-value="0" readonly="readonly" />
                        </div>

                        <!--=== Label ===-->

                        <div>
                            <span>Children <small>2-12 years</small></span>
                        </div>


                        <!--=== Add/remove quantity buttons ===-->

                        <div>
                            <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-children" />
                            <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-children" />
                        </div>

                    </li>

                    <!--=== Infants ===-->

                    <li class="clearfix">

                        <!--=== Adults value ===-->

                        <div>
                            <input class="qty-amount" value="0" type="text" id="ticket-infants" data-value="0" readonly="readonly" />
                        </div>

                        <!--=== Label ===-->

                        <div>
                            <span>Infants <small>Under 2 years</small></span>
                        </div>

                        <!--=== Add/remove quantity buttons ===-->

                        <div>
                            <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-infants" />
                            <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-infants" />
                        </div>
                    </li>

                </ul>
            </div>
    <!--/ .row -->
    <div class="modal fade" id="manual_flightTravelers" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo trans('0446');?></h4>
                </div>
                <div class="modal-body">
                    <section>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="form-input" class="col-sm-3 col-xs-3 control-label"><?php echo trans('010');?></label>
                                <div class="col-sm-5 col-xs-5 madult">
                                    <input type="text" name="madult" value="<?php echo $query->passenger['adult']; ?>" placeholder="1" class="travellercount form-control travellerclass" required/>
                                    
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <label class="help-block">(12+yrs)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-input" class="col-sm-3 col-xs-3 control-label"><?php echo trans('011');?></label>
                                <div class="col-sm-5 col-xs-5 mchildren">
                                    <input type="text" name="mchildren" value="<?php echo $query->passenger['children']; ?>" placeholder="1" class="travellercount form-control travellerclass" required/>
                                    
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <label class="help-block">(4+yrs)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-input" class="col-sm-3 col-xs-3 control-label"><?php echo trans('0282');?></label>
                                <div class="col-sm-5 col-xs-5 minfant">
                                    <input type="text" name="minfant" value="<?php echo $query->passenger['infant']; ?>" placeholder="1" class="travellercount form-control travellerclass" required/>
                                    
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <label class="help-block">(2+yrs)</label>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block btn-lg bb" data-dismiss="modal" id="sumManualPassenger"><?php echo trans('0233');?></button>
                </div>
            </div>
        </div>
    </div>
    <!--/ .modal -->
    <div class="clearfix"></div>
    <div class="trip-check">
        <div class="col-md-2 col-xs-6 w120">
            <div class="pure-checkbox">
                <input id="oneway" name="triptype" type="radio" class="checkbox triptype" value="oneway" data-type="oneway" <?php if($query->triptype == "oneway") { ?> checked <?php } ?>>
                <label for="oneway" class="onewaycheck" data-type="oneway">&nbsp;<?php echo trans('0384');?></label>
            </div>
        </div>
        <div class="col-md-2 col-xs-6 w120">
            <div class="pure-checkbox">
                <input id="round" name="triptype" type="radio" class="checkbox triptype" value="round" data-type="round" <?php if($query->triptype == "round") { ?> checked <?php } ?>>
                <label for="round" class="roundcheck" data-type="round">&nbsp;<?php echo trans('0385');?> </label>
            </div>
        </div>
        <div class="go-text-right form-horizontal">
            <div class="col-md-2 form-group go-right col-xs-12">
                <div class="clearfix"></div>
                <select class="form-control fs12 class" name="cabinclass">
                    <option value="economy" <?php echo ($query->cabinclass == "economy") ? "selected" : ""; ?>><?php echo trans('0552');?></option>
                    <option value="business" <?php echo ($query->cabinclass == "business") ? "selected" : ""; ?>><?php echo trans('0553');?></option>
                    <option value="first" <?php echo ($query->cabinclass == "first") ? "selected" : ""; ?>><?php echo trans('0554');?></option>
                </select>
            </div>
        </div>
    </div>
</form>
