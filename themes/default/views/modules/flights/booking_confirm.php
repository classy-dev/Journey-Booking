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
    .m-check-flight__airline
    {
        max-width: 400px;
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
        padding-left: 50px;
    }
    .m-check-flight__line
    {
        left: 25px;
    }
    .c-result-airline__logo
    {
            width: 80px;
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
    body
    {
        font-size: 14px;
        background: #fff;
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
            <style>
                hr
                {
                        border: 0;
                        border-top: 1px solid #e5e5e5;
                }
                .booking_details
                {
                        padding: 20px;
                    background: #fff;
                    border-radius: 10px;
                    margin-bottom: 20px;
                        font-family: 'Josefin Sans', serif;
                }
                .thank_you i
                {
                        padding: 10px;
                        background: #fff;
                        border-radius: 50%;
                        font-size: 22px;
                        border: 1px solid #12345e;
                        color: #12345e;
                        margin-right: 10px;
                            vertical-align: top;
                }
                .thank_you .message
                {
                    display: inline-block;
                }
                .thank_you .message p
                {
                    margin: 0;
                }
                .thank_you .message p span
                {
                    color: #bababa;
                }
                dl.term-description {
                    font-size: 15px;
                }
                dl.term-description dt {
                    border-right: 1px solid #f5f5f5;
                    color: #27e;
                    font-weight: 400;
                    padding-right: 5px;
                    clear: both;
                }
                dl.term-description dt, dl.term-description dd {
                    line-height: 1.3333em;
                    display: inline-block;
                    width: 50%;
                    padding-top: 0.5em;
                    padding-bottom: 0.5em;
                }
                dl.term-description dd {
                    padding-left: 20px;
                }
            </style>
                <div class="col-md-12">
                    
                    <div class="booking_details">
                        <h3>Booking Confirmation</h3>
                        <hr>
                        <div class="thank_you">
                            <i class="fa fa-thumbs-up"></i>
                            <div class="message">
                                <p>Thank You. Your Booking Order is Confirmed Now.</p>
                                <p>Your ticket will be sent to you after verification in 24 hours.</p>
                                <p><span>A confirmation email has been sent to your provided email address.</span></p>
                            </div>          
                        </div>
                        <hr>
                        <h3>Traveler Information</h3>
                        <dl class="term-description">
                            <dt>Booking number:</dt><dd><?php echo $data["booking_id"] ?></dd>
                            <dt>First name:</dt><dd><?php echo $booking_data[0]->custfirstname; ?></dd>
                            <dt>Last name:</dt><dd><?php echo $booking_data[0]->custlastname; ?></dd>
                            <dt>E-mail address:</dt><dd><?php echo $booking_data[0]->custemail; ?></dd>
                            <dt>Phone:</dt><dd><?php echo $booking_data[0]->custphone; ?></dd>
                            <dt>Country:</dt><dd><?php echo $booking_data[0]->custcountry; ?></dd>
                        </dl>
                        <hr>
                        <h3>Payment</h3>
                        <p style="text-transform: uppercase;"><?php echo $booking_data[0]->payment_gateway; ?></p>
                        <hr>
                        <h3>Booking Status</h3>
                        <a href="<?php echo base_url(); ?>flights/bookingstatus?booking_number=<?php echo $data["booking_id"] ?>&last_name=<?php echo $booking_data[0]->custlastname; ?>">Click Here to view Booking Status</a>
                    </div>
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

 