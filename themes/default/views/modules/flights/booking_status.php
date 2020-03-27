<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&amp;display=swap" rel="stylesheet">
<style>
    .formpadding
    {
        padding: 40px 0;
            font-family: 'Josefin Sans', serif;
    }
    .formpadding td
    {
        font-family: 'Josefin Sans', serif !important;   
    }
    h3
    {
      font-family: 'Josefin Sans', serif !important;   
    }
</style>
<section class="formpadding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form id="bookingdetails" action="<?php echo base_url(); ?>flights/bookingstatus" method="GET">
                
                    <div class="pass_form">
                        <h3>Booking Status</h3>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>
                                        Booking Number
                                    </label>
                                    <input type="text" class="form-control" name="booking_number" required>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                        Last Name
                                    </label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                                
                            </div>
                        </div>
                        <br>
                       
                    </div> 

                    <style>

                        .pay_now
                        {
                            margin: 20px auto 0;
                            width: auto !important;
                            text-transform: none;
                        }
                    </style>
                   

                    <div class="clearfix"></div>
                    <!-- Start Tour Travellers data fields -->
                    <input type="submit" name="submit" value="Check Booking Status" class="btn btn-success btn-lg btn-block pay_now">
                    <!-- End Tour Travellers data fields -->
                </form>
            </div>
        </div>
        <?php if(isset($_GET['booking_number']) && isset($_GET['last_name']) && count($booking_data)>0) { ?>
            <div class="row">
                <div class="col-md-12">
                    <style type="text/css">
                        @media only screen and (max-width: 600px) 
                        {
                            table[class="contenttable"] {
                                width: 320px !important;
                                border-width: 3px!important;
                            }
                            table[class="tablefull"] {
                                width: 100% !important;
                            }
                            table[class="tablefull"] + table[class="tablefull"] td {
                                padding-top: 0px !important;
                            }
                            table td[class="tablepadding"] {
                                padding: 15px !important;
                            }
                        }
                    </style>

                    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                      <tr>
                        <td align="center" valign="top"><table class="contenttable" border="0" cellpadding="0" cellspacing="0" width="600" bgcolor="#ffffff" style="border-width:1px; border-style: solid; border-collapse: separate; border-color:#ededed; margin-top:20px; font-family:Arial, Helvetica, sans-serif">
                            
                            <tr>
                              <td style="padding:0px;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                  <tbody>
                                    <tr>
                                      <td style="border:4px solid #eee; border-radius:4px; padding:25px 0px;"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                          <tbody>
                                            <tr>
                                              <td style="font-size:14px; padding:0px 25px;" width="50"><img alt="" src="http://demo.harnishdesign.net/html/quickai/email-template/flight-email-template/booking-successful.png"></td>
                                              <td style="font-size:16px; font-weight:600; color:#777; line-height:26px; padding-right:20px;"><span style="font-size:13px;">Hi, <?php echo $booking_data[0]->custfirstname.' '.$booking_data[0]->custlastname; ?></span><br>
                                                Your flight booking status is <span style="color:#28a745;"><?php echo $booking_data[0]->bookingstatus; ?></span>.</td>
                                            </tr>
                                          </tbody>
                                        </table></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                            </tr>
                            <tr>
                              <td style="padding:20px;"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="font-size:14px; line-height:28px;"><span style="color:#7a7a7a;">Booking Reference Number -</span> <a style="outline:none; color:#0071cc; text-decoration:none;" href="#"><?php echo $booking_data[0]->booking_id; ?></a></td>
                                    </tr>
                                    <tr>
                                      <td style="font-size:14px; line-height:28px;"><span style="color:#7a7a7a;">Booking Status -</span> <?php echo $booking_data[0]->bookingstatus; ?></td>
                                    </tr>
                                    <tr>
                                      <td style="font-size:14px; line-height:28px;">Thank you for booking your travel itinerary with Tripmeng.</td>
                                    </tr>
                                  </tbody>
                                </table></td>
                            </tr>
                            <tr>
                              <td class="tablepadding" style="background:#f8f8f8;border-top:1px solid #e9e9e9;border-bottom:1px solid #e9e9e9;padding:13px 20px;"><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                                  <tbody>
                                    <tr>
                                      <td style="font-size:14px; line-height:20px;"><span style="color:#909090">Booking Date:</span><br />
                                        <span style="color:#000000;display:inline-block"><?php echo $booking_data[0]->booking_datetime; ?></span></td>
                                      <td style="font-size:14px; line-height:20px;"><span style="color:#909090">Booking No:</span><br />
                                        <a style="outline:none; color:#0071cc; text-decoration:none;" href="#"><?php echo $booking_data[0]->booking_id; ?></a></td>
                                      <td style="font-size:14px; line-height:20px;"><span style="color:#909090">Payment:</span><br />
                                        by <?php echo $booking_data[0]->payment_gateway; ?></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                            </tr>
                            <tr>
                              <td style="padding:25px 20px 0px;"><h3 style="margin:0; font-weight:normal; color:#444444;">
                                Flight Details
                                </h3></td>
                            </tr>
                            <?php
                            foreach($segments_data as $s)
                            {
                                ?>
                                <tr>
                                  <td class="tablepadding" style="padding:20px;"><table class="" style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;">
                                      <thead>
                                        <tr>
                                          <td style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;padding:7px;color:#777777">Flight</td>
                                          <td style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;padding:7px;color:#777777">Depart</td>
                                          <td style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;padding:7px;color:#777777">Arrive</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td width="25%" valign="top" style="border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px;line-height:22px;"><img class="img-fluid" alt="" src="<?php echo $s->carrier_img; ?>"><br />
                                            <?php echo $s->carrier_name; ?><br />
                                            <span style="font-size:13px; color:#555;"><?php echo $s->flight_number; ?></span><br>
                                            <span style="font-size:15px; color:#555;"><?php echo $s->segment_type; ?></span></td>
                                          <td valign="top" style="border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;padding:7px;line-height:22px;"> <?php echo $s->depart_name; ?> (<?php echo $s->depart_code; ?>)<br />
                                            <span style="font-size:14px; color:#111111;"><?php echo $s->depart_date; ?>, <?php echo $s->depart_time; ?></span><br />
                                            <span style="font-size:13px; color:#555555;">Travel Time: <?php echo $s->duration; ?></span><br />
                                            <span style="font-size:13px; color:#555555;">Cabin Class: <?php echo $s->cabin_type; ?></span><br />

                                          <td valign="top" style="border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;padding:7px;line-height:22px;"> <?php echo $s->arrive_name; ?> (<?php echo $s->arrive_code; ?>)<br />
                                            <span style="font-size:14px; color:#111111;"><?php echo $s->arrive_date; ?>, <?php echo $s->arrive_time; ?></span><br />
                                        </tr>
                                      </tbody>
                                    </table></td>
                                </tr>
                                <?php
                            }
                            ?>
                            
                            
                            <tr>
                              <td style="padding:0px 20px 0px;"><h3 style="margin:0; font-weight:normal; color:#444444;">
                                Passenger Information
                                </h3></td>
                            </tr>
                            <tr>
                              <td class="tablepadding" style="padding:20px 20px 25px;"><table class="" style="border-collapse:collapse;width:100%;border-top:1px solid #dddddd;border-left:1px solid #dddddd;">
                                  <thead>
                                    <tr>
                                      <td style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;padding:7px;color:#777777">Type</td>
                                      <td align="center" style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;padding:7px;color:#777777">Name</td>
                                      <td align="center" style="font-size:13px;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;background-color:#efefef;font-weight:bold;padding:7px;color:#777777">Passport #</td>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    foreach($pass_data as $p)
                                    {
                                        ?>
                                        <tr>
                                          <td width="25%" valign="top" style="border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;text-align:left;padding:7px;line-height:22px;"><?php echo $p->pass_type; ?></td>
                                          <td width="50%" valign="top" align="center" style="border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;padding:7px;line-height:22px;"> <?php echo $p->pass_first_name.' '.$p->pass_last_name; ?> </td>
                                          <td width="25%" valign="top" align="center" style="border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;padding:7px;line-height:22px;"> <?php echo $p->pass_passport; ?> </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    
                                  </tbody>
                                </table></td>
                            </tr>
                            
                           
                          </table></td>
                      </tr>
                      
                    </table>
                </div>
            </div>                      
        <?php }
        else if(isset($_GET['booking_number']) && isset($_GET['last_name'])) {
           ?>
           <h3>Booking Not Found</h3>
           <?php
         } 
        ?>
    </div>
</section>

