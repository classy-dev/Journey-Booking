<link href="<?php echo base_url() ?>assets/xcrud/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>assets/xcrud/plugins/jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>assets/xcrud/plugins/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css">

<link href="<?php echo base_url() ?>assets/xcrud/themes/bootstrap/xcrud.css" rel="stylesheet" type="text/css">
<?php if($msg!='' && $msg=='issue')
{
	echo '<div class="alert alert-success">' . "Ticket Issue Successfully" . '</div>';
}
else if($msg!='' && $msg=='Cancelled')
{
	echo '<div class="alert alert-success">' . "Booking Cancelled" . '</div>';
}
if($msg!='' && $msg=='Verifying')
{
	echo '<div class="alert alert-success">' . "Booking is in verfication process" . '</div>';
}
if($msg!='' && $msg=='Processing')
{
	echo '<div class="alert alert-success">' . "Booking is Processing" . '</div>';
} 
if($msg!='' && $msg=='ticketresend')
{
	echo '<div class="alert alert-success">' . "Ticket has been resent" . '</div>';
}?>
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="panel-title pull-left">Booking Details</span>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
	    <div class="xcrud">
	        <div class="xcrud-container">
				<div class="xcrud-list-container">
				    <table class="xcrud-list table table-striped table-hover">
					    <thead>
					        <tr class="xcrud-th">
					            
					            <th class="xcrud-column ">Booking ID</th>
					            <th class="xcrud-column ">Payment Status</th>
					            <th  class="xcrud-column ">Booking Status</th>
					            <th  class="xcrud-column ">Departure</th>
					            <th  class="xcrud-column ">Arrival</th>
					            <th  class="xcrud-column ">Type</th>
					            <th  class="xcrud-column ">Booking Date and Time</th>
					            <th  class="xcrud-column ">Single Ticket Price</th>
					            <th  class="xcrud-column ">Adults</th>
					            <th  class="xcrud-column ">Childs</th>
					            <th  class="xcrud-column ">Infants</th>
					            <th class="xcrud-column ">Total Price</th>
					            <th class="xcrud-column ">Transaction ID</th>
					            <th class="xcrud-column ">Payment Method</th>
					            
					        </tr>
					    </thead>
					    <tbody>
					        <tr class="xcrud-row xcrud-row-0">
					            
					            <td><?php echo $booking_data[0]->booking_id; ?></td>
					            <td><?php echo $booking_data[0]->paidstatus; ?></td>
					            <td><?php echo $booking_data[0]->bookingstatus; ?></td>
					            <td><?php echo $booking_data[0]->location_from.' - '.$booking_data[0]->location_from_code; ?></td>
					            <td><?php echo $booking_data[0]->location_to.' - '.$booking_data[0]->location_to_code; ?></td>
					            <td><?php echo $booking_data[0]->flight_type; ?></td>
					            <td><?php echo $booking_data[0]->booking_datetime; ?></td>
					            <td>$<?php echo $booking_data[0]->single_ticket_price; ?></td>
					            <td><?php echo $booking_data[0]->adults; ?></td>
					            <td><?php echo $booking_data[0]->childs; ?></td>
					            <td><?php echo $booking_data[0]->infants; ?></td>
					            <td>$<?php echo $booking_data[0]->total_price; ?></td>
					            <td><?php echo $booking_data[0]->transactionid; ?></td>
					            <td><?php echo $booking_data[0]->payment_gateway; ?></td>
					            
					            
					        </tr>
					    </tbody>
					    <tfoot>
					    </tfoot>
					</table>
				</div>
			</div>
			        
	    </div>
	</div>
		
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="panel-title pull-left">Customer Details</span>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
	    <div class="xcrud">
	        <div class="xcrud-container">
				<div class="xcrud-list-container">
				    <table class="xcrud-list table table-striped table-hover">
					    <thead>
					        <tr class="xcrud-th">
					            
					            <th class="xcrud-column ">First Name</th>
					            <th class="xcrud-column ">Middle Name</th>
					            <th class="xcrud-column ">Last Name</th>
					            <th class="xcrud-column ">Email</th>
					            <th class="xcrud-column ">Phone</th>
					            <th class="xcrud-column ">Country</th>
					            
					        </tr>
					    </thead>
					    <tbody>
					        <tr class="xcrud-row xcrud-row-0">
					            
					            <td><?php echo $booking_data[0]->custfirstname; ?></td>
					            <td><?php echo $booking_data[0]->custmiddlename; ?></td>
					            <td><?php echo $booking_data[0]->custlastname; ?></td>
					            <td><?php echo $booking_data[0]->custemail; ?></td>
					            <td><?php echo $booking_data[0]->custphone; ?></td>
					            <td><?php echo $booking_data[0]->custcountry; ?></td>
					            
					        </tr>
					    </tbody>
					    <tfoot>
					    </tfoot>
					</table>
				</div>
			</div>
			        
	    </div>
	</div>
		
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="panel-title pull-left">Billing Details</span>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
	    <div class="xcrud">
	        <div class="xcrud-container">
				<div class="xcrud-list-container">
				    <table class="xcrud-list table table-striped table-hover">
					    <thead>
					        <tr class="xcrud-th">
					            
					            <th class="xcrud-column ">First Name</th>
					            <th class="xcrud-column ">Middle Name</th>
					            <th class="xcrud-column ">Last Name</th>
					            <th class="xcrud-column ">Email</th>
					            <th class="xcrud-column ">Phone</th>
					            <th class="xcrud-column ">Address</th>
					            <th class="xcrud-column ">City</th>
					            <th class="xcrud-column ">Zip</th>
					            <th class="xcrud-column ">State</th>
					            <th class="xcrud-column ">Country</th>
					            
					        </tr>
					    </thead>
					    <tbody>
					        <tr class="xcrud-row xcrud-row-0">
					            
					            <td><?php echo $billing_data[0]->customerfirstname; ?></td>
					            <td><?php echo $billing_data[0]->customermiddlename; ?></td>
					            <td><?php echo $billing_data[0]->customerlastname; ?></td>
					            <td><?php echo $billing_data[0]->email; ?></td>
					            <td><?php echo $billing_data[0]->mobile; ?></td>
					            <td><?php echo $billing_data[0]->address; ?></td>
					            <td><?php echo $billing_data[0]->city; ?></td>
					            <td><?php echo $billing_data[0]->zip; ?></td>
					            <td><?php echo $billing_data[0]->state; ?></td>
					            <td><?php echo $billing_data[0]->country; ?></td>
					            
					        </tr>
					    </tbody>
					    <tfoot>
					    </tfoot>
					</table>
				</div>
			</div>
			        
	    </div>
	</div>
		
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <span class="panel-title pull-left">Passengers Information</span>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
	    <div class="xcrud">
	        <div class="xcrud-container">
				<div class="xcrud-list-container">
				    <table class="xcrud-list table table-striped table-hover">
					    <thead>
					        <tr class="xcrud-th">
					            
					            <th class="xcrud-num">#</th>
					            <th class="xcrud-column ">Passenger Type</th>
					            <th class="xcrud-column ">First Name</th>
					            <th class="xcrud-column ">Middle Name</th>
					            <th  class="xcrud-column ">Last Name</th>
					            <th  class="xcrud-column ">Nationality</th>
					            <th  class="xcrud-column ">Gender</th>
					            <th  class="xcrud-column ">Date of Birth</th>
					            <th  class="xcrud-column ">Passport Number</th>
					            
					        </tr>
					    </thead>
					    <tbody>
					        <?php
					        $i=0;
					        	foreach($pass_data as $p)
					        	{
					        		?>
					        		<tr class="xcrud-row xcrud-row-<?php echo ($i%2); ?>">
					            
							            <td><?php echo ++$i; ?></td>
							            <td><strong><?php echo $p->pass_type; ?></strong></td>
							            <td><?php echo $p->pass_first_name; ?></td>
							            <td><?php echo $p->pass_middle_name; ?></td>
							            <td><?php echo $p->pass_last_name; ?></td>
							            <td><?php echo $p->pass_nationality; ?></td>
							            <td><?php echo $p->pass_gender; ?></td>
							            <td><?php echo $p->pass_dob; ?></td>
							            <td><?php echo $p->pass_passport; ?></td>
							            
							        </tr>
					        		<?php

					        	}



					         ?>

					        
					    </tbody>
					    <tfoot>
					    </tfoot>
					</table>
				</div>
			</div>
			        
	    </div>
	</div>
		
</div>
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
    }
</style>

<div class="row">
	<div class="col-md-12">
		<div class="m-check-travel" id="FlightInfo">
		    <div class="m-check-travel__header">
		        <span class="m-check-travel__cityname"><?php echo $booking_data[0]->location_from; ?></span>
		        <i class="fi fi-arrow-two-way"></i>
		        <span class="m-check-travel__cityname"><?php echo $booking_data[0]->location_to; ?></span>
		        <div class="m-check-travel__date">
		            <span class="m-check-travel__adult"><?php echo $booking_data[0]->adults; ?> Adults, <?php echo $booking_data[0]->childs; ?> Childs, <?php echo $booking_data[0]->infants; ?> Infants</span>
		        </div>
		        
		    </div>
		    <div class="m-check-travel__con">
		        <div class="m-check-flight">
		        	
		        	<div class="flight-result">
		                <div class="m-check-flight__status">Departure flight
		                    <!-- -->:
		                    <!-- --><?php echo $booking_data[0]->location_from; ?>
		                    <!-- -->-
		                    <!-- --><?php echo $booking_data[0]->location_to; ?> 
		                </div>
		                <?php

		                
				        	foreach($segments_data as $s)
				        	{
				        		if($s->segment_type=='Outbound')
				        		{

				        		?>
				        		
				                <div class="m-check-flight__item u-clearfix">
				                    <div class="m-check-flight__airport">
				                    	<span class="m-check-flight__depart">
				                    		<span class=""><?php echo $s->depart_date; ?></span>
				                    		<?php echo $s->depart_time; ?>
				                    	</span>
				                    	<span class="m-check-flight__arrive">
				                    		<span class=""><?php echo $s->arrive_date; ?></span>
				                    		<?php echo $s->arrive_time; ?>
				                    	</span>
				                        <div class="m-check-flight__wrap">
				                        	<span class="m-check-flight__line">
				                        		<em class="m-check-flight__s-point"></em><em class="m-check-flight__e-point"><i></i></em></span><span class="m-check-flight__line m-check-flight__s-line"></span>
				                            <div class="m-check-flight__from"><?php echo $s->depart_name; ?></div>
				                            <div class="m-check-flight__to"><?php echo $s->arrive_name; ?></div>
				                        </div>
				                    </div>
				                    <div class="m-check-flight__airline">
				                        <div class="c-result-airline result-airline">
				                        	<img src="<?php echo $s->carrier_img; ?>" alt="" class="c-result-airline__logo">
				                            <div class="c-result-airline__wrap">
				                                <div class="c-result-airline__name"><?php echo $s->carrier_name; ?></div>
				                                <div class="c-result-airline__flight-num"><span class="flight-number"><span class="flightNo"><?php echo $s->flight_number; ?></span><span class="craftSpan"></span><span class="craftModel"><?php echo $s->cabin_type; ?></span></span>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="m-check-flight__duration"><span class="m-check-flight__hour"><?php echo $s->duration; ?></span>
				                    </div>
				                </div>
				        		<?php

				        		}
				        	}


				        ?>
		                

		               

		            </div>
	            <?php


	            if($booking_data[0]->flight_type=='return')
	            {

	            	?>
	            	<div class="flight-result">
		                <div class="m-check-flight__status">Return flight
		                    <!-- -->:
		                    <!-- --><?php echo $booking_data[0]->location_to; ?>
		                    <!-- -->-
		                    <!-- --><?php echo $booking_data[0]->location_from; ?> 
		                </div>
		                <?php

		                
				        	foreach($segments_data as $s)
				        	{
				        		if($s->segment_type=='Inbound')
				        		{

				        		?>
				        		
				                <div class="m-check-flight__item u-clearfix">
				                    <div class="m-check-flight__airport">
				                    	<span class="m-check-flight__depart">
				                    		<span class=""><?php echo $s->depart_date; ?></span>
				                    		<?php echo $s->depart_time; ?>
				                    	</span>
				                    	<span class="m-check-flight__arrive">
				                    		<span class=""><?php echo $s->arrive_date; ?></span>
				                    		<?php echo $s->arrive_time; ?>
				                    	</span>
				                        <div class="m-check-flight__wrap">
				                        	<span class="m-check-flight__line">
				                        		<em class="m-check-flight__s-point"></em><em class="m-check-flight__e-point"><i></i></em></span><span class="m-check-flight__line m-check-flight__s-line"></span>
				                            <div class="m-check-flight__from"><?php echo $s->depart_name; ?></div>
				                            <div class="m-check-flight__to"><?php echo $s->arrive_name; ?></div>
				                        </div>
				                    </div>
				                    <div class="m-check-flight__airline">
				                        <div class="c-result-airline result-airline">
				                        	<img src="<?php echo $s->carrier_img; ?>" alt="" class="c-result-airline__logo">
				                            <div class="c-result-airline__wrap">
				                                <div class="c-result-airline__name"><?php echo $s->carrier_name; ?></div>
				                                <div class="c-result-airline__flight-num"><span class="flight-number"><span class="flightNo"><?php echo $s->flight_number; ?></span><span class="craftSpan"></span><span class="craftModel"><?php echo $s->cabin_type; ?></span></span>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="m-check-flight__duration"><span class="m-check-flight__hour"><?php echo $s->duration; ?></span>
				                    </div>
				                </div>
				        		<?php

				        		}
				        	}


				        ?>
		                

		               

		            </div>

		            <?php
		        }
	            ?>
		        </div>
		    </div>
		</div>
	</div>
</div>			
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="panel-title pull-left">Actions</span>
        <div class="clearfix"></div>
    </div>
    <?php
    if($booking_data[0]->bookingstatus=="Pending" || $booking_data[0]->bookingstatus== "Verifying" || $booking_data[0]->bookingstatus== "Processing")
    {

	     ?>
	    <div class="panel-body" align="center">
		    <div class="col-md-3">
		    	<a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal">Issue Ticket</a>
		    </div>
		    <div class="col-md-3">
		    	<a href="<?php echo base_url() ?>admin/flights/processing/?booking_id=<?php echo $booking_data[0]->booking_id; ?>" class="btn btn-default">Processing</a>
		    </div>
		    <div class="col-md-3">
		    	<a href="<?php echo base_url() ?>admin/flights/SendVerificationEmail/?booking_id=<?php echo $booking_data[0]->booking_id; ?>" class="btn btn-info">Verification Email</a>
		    </div>
		    <div class="col-md-3">
		    	<a href="<?php echo base_url() ?>admin/flights/changeStatus/?booking_id=<?php echo $booking_data[0]->booking_id; ?>&status=cancel" class="btn btn-danger">Cancel Booking</a>
		    </div>

		</div>
		<?php
	}
	?>

<?php
    if($booking_data[0]->bookingstatus=="Cancelled")
    {

	     ?>
	    <div class="panel-body" align="center">
		    <div class="col-md-12">
		    	<h3>This Booking Has Been Cancelled</h3>
		    </div>

		</div>
		<?php
	}
	?>

	<?php
    if($booking_data[0]->bookingstatus=="Ticket Issued")
    {

	     ?>
	    <div class="panel-body" align="center">
		    <div class="col-md-2 col-md-offset-5">
		    	<a href="<?php echo base_url(); ?>admin/flights/ResendTicket?booking_id=<?php echo $booking_data[0]->booking_id; ?>" class="btn btn-success">Resend Ticket</a>
		    </div>
		    
		</div>
		<?php
	}
	?>
		
</div>
<script src="<?php echo base_url() ?>assets/xcrud/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/xcrud/plugins/jcrop/jquery.Jcrop.min.js"></script>
<script src="<?php echo base_url() ?>assets/xcrud/plugins/timepicker/jquery-ui-timepicker-addon.js"></script>
<script src="<?php echo base_url() ?>assets/xcrud/plugins/xcrud.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/adminbooking.js"></script>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      	<?php echo form_open_multipart('admin/flights/uploadTicket'); ?>
      	
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Ticket</h4>
      </div>
      <div class="modal-body">
        <h3>Ticket Must in a PDF file Combined.</h3>
        <input type="hidden" value="<?php echo $booking_data[0]->booking_id; ?>" name="booking_id">
        <input type="file" name="userfile"  />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Send Ticket</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<script>
	$(document).ready(function(){
		$.ajax({url: "<?php echo base_url();?>application/modules/Admin/views/modules/global/status.php", success: function(result){
		    
		  }});
	});
</script>