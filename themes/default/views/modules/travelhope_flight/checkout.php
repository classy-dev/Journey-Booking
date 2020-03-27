<br><br>
<?php if ($api_response->status == 'error'): ?>
    <div class="container">
        <div class="alert alert-danger"><?=$api_response->data?></div>
    </div>
<?php else: ?>
<style>h5{font-weight:bold} .font-size-h2 { font-size: font-size: 14px; }</style>
<div class="header-mob mob-mt">
    <div class="container">
        <div class="row">
            <div class="col-xs-2 col-sm-1 text-left">
                <a data-toggle="tooltip" data-placement="right" title="" class="icon-angle-left pull-left mob-back" onclick="goBack()" data-original-title="Back"></a>
            </div>
            <div class="col-xs-8 col-sm-10">
                <div class="mob-trip-info-head ttu">
                    <div class="mt10"></div>
                    <span><strong class="ellipsis ttu"><span><i class="icon_set_1_icon-87 go-right"></i><span><?php echo trans('0558');?></span> <span class="countprice"></span></span></strong></span>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">

<div class="col-md-8">
    <div class="mb15">
        <div class="alert alert-danger text-center font-size-h2" id="countdown">00:00</div>
        <?php if ($fakedata->sandbox_mode): ?>
            <div class="alert alert-danger"><?php echo trans('0597');?></div>
        <?php endif; ?>
        <?php if ($userAuthorization == 0): ?>
        <div class="row mb15">
            <div class="col-md-6">
                <a data-toggle="tab" href="#login" class="btn btn-primary btn-block">Login for Booking</a>
            </div>
            <div class="col-md-6">
                <a data-toggle="tab" href="#guest" class="btn btn-default btn-block">Guest Booking</a>
            </div>
        </div>
        <div class="tab-content">
            <div id="login" class="tab-pane fade in active">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="" id="email" placeholder="Enter email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="" id="password" placeholder="Enter password" class="form-control">
                </div>
            </div>
            <div id="guest" class="tab-pane fade">
                <div class="form-group">
                    <h3>Guest booking</h3>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

<form name="ticketBookingForm">
    <div class="">
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo trans('0566');?></div>
            <div class="panel-body">
                <!-- passengers -->
                <?php foreach ($searchForm->getPassengers() as $index => $passenger): ?>
                    <section>
                        <h4><strong class="text-primary"><?= ucfirst($passenger) .' '. ($index + 1)?></strong></h4>
                        <div class="row">
                            <hr style="width: 95%; text-align: left;">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <select class="form-control" id="title" name="title[]" required>
                                        <option value="Mr."><?php echo trans('0567');?>.</option>
                                        <option value="Ms."><?php echo trans('0568');?>.</option>
                                        <option value="Master."><?php echo trans('0569');?>.</option>
                                        <option value="Miss."><?php echo trans('0570');?>.</option>
                                        <option value="Mrs."><?php echo trans('0571');?>.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name[]" required value="<?php echo $fakedata->name; ?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="surname">Surname:</label>
                                    <input type="text" class="form-control" id="surname" name="surname[]" required value="<?php echo $fakedata->surname; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email[]" required value="<?php echo $fakedata->email; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" id="phone" name="phone[]" required value="<?php echo $fakedata->phone_number; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthday">Birthday:</label>
                                    <input type="text" class="form-control" id="birthday" name="birthday[]" required value="<?php echo $fakedata->birthday; ?>">
                                    <small class="text-muted">e.g 1990-01-01</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cardno">Passport Number:</label>
                                    <input type="text" class="form-control" id="cardno" name="cardno[]" required value="<?php echo $fakedata->card_number; ?>">
                                    <small class="text-muted">number of a travel document (ID or passport)</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expiration">Expiration:</label>
                                    <input type="text" class="form-control" id="expiration" name="expiration[]" required value="<?php echo $fakedata->expiration; ?>">
                                    <small class="text-muted">expiration of travel document (e.g 2020-01-01)</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nationality">Nationality:</label>
                                    <select style="padding: 0px; height: 40px;" name="nationality[]" class="form-control" id="nationality">
                                        <?php foreach ($countries as $country): ?>
                                            <option value="<?=$country['iso']?>"><?=$country['name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-muted">nationality of the passenger (alpha-2 format e.g PK)</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
<!--                                    <label for="hold_bags">Hold Bags:</label>-->
                                    <input type="hidden" class="form-control" id="hold_bags" name="hold_bags[]" required value="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
<!--                                    <label for="category">Category:</label>-->
                                    <input type="hidden" class="form-control" id="category" name="category[]" required value="<?php echo $passenger; ?>">
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div> <!--/ ."panel panel-default: Travellers Info -->
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo trans('0459');?></div>
            <div class="panel-body">
                <section>
                    <div class="row">
                        <div class="col-md-6  go-right">
                            <div class="form-group ">
                                <label  class="required go-right"><?php echo trans('0330');?></label>
                                <select class="form-control" name="name_card" id="cardtype" required>
                                    <option value=""><?php echo trans('0573');?></option>
                                    <option value="AX"><?php echo trans('0574');?></option>
                                    <option value="DS"><?php echo trans('0575');?></option>
                                    <option value="CA" <?=($fakedata->sandbox_mode) ? 'selected' : ''?>><?php echo trans('0576');?></option>
                                    <option value="VI"><?php echo trans('0577');?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6  go-left">
                            <div class="form-group ">
                                <label  class="required go-right"><?php echo trans('0316');?></label>
                                <input type="text" class="form-control" name="card_no" value="<?php echo $fakedata->card_number; ?>" required id="card-number" placeholder="Credit Card Number">
                            </div>
                        </div>
                        <div class="col-md-3 go-right">
                            <div class="form-group ">
                                <label  class="required  go-right"><?php echo trans('0329');?></label>
                                <select class="form-control" name="month" id="expiry-month" required>
                                    <option value=""><?php echo trans('0578');?></option>
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
                                    <option value="12" <?=($fakedata->sandbox_mode) ? 'selected' : ''?>><?php echo trans('0328');?> (12)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 go-left">
                            <div class="form-group">
                                <label  class="required go-right">&nbsp;</label>
                                <select class="form-control" name="year" id="expiry-year" required>
                                    <option value=""><?php echo trans('0579');?></option>
                                    <?php for($y = date("Y");$y <= date("Y") + 10;$y++): ?>
                                        <?php
                                        $selected = "";
                                        if ($fakedata->sandbox_mode) {
                                            if ($y == (date("Y") + 10)) {
                                                $selected = 'selected';
                                            }
                                        }
                                        ?>
                                        <option value="<?php echo $y?>" <?=$selected?>><?php echo $y; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 go-left">
                            <div class="form-group">
                                <label  class="required go-right"><?php echo trans('0331');?></label>
                                <input type="text" class="form-control" name="security_code" required id="cvv" placeholder="<?php echo trans('0331');?>" value="<?php echo $fakedata->cvv; ?>">
                            </div>
                        </div>
                        <div class="col-md-3 go-left">
                            <label  class="required go-right">&nbsp;</label>
                            <img src="<?php echo base_url(); ?>assets/img/cc.png" class="img-responsive" />
                        </div>
                    </div> <!--/ .row -->
                </section>
            </div>
        </div> <!--/ ."panel panel-default: Payment Information -->
        <div class="alert alert-danger">
            <strong class="RTL go-right"><?php echo trans('045');?></strong>
            <hr>
            <p class="RTL" style="font-size:12px"><?php echo trans('0461');?>.</p>
        </div> <!--/ .alert alert-danger -->
        <div class="form-group">
            <input type="hidden" name="dataAdapter" value='<?=json_encode($dataAdapter)?>'>
            <input type="hidden" name="flight_id" value='<?=$flight_id?>'>
            <button onclick="scrollWin(0, -15000)" type="submit" class="btn btn-action btn-lg btn-block completebook upClick" <?=($is_flight_valid)?'enabled':'disabled'?> id="confirmBooking"><?php echo trans('0306');?></button>
        </div> <!--/ .form-group -->
    </div> <!--/ .container -->
</form>
<div class="loader-wrapper"></div>
</div>


<div class="col-md-4">

 <div class="mb15 bs bgwhite">
        <div class="panel-body" style="margin-top: 25px;">
            <div>
                <div class="col-xs-4 col-md-2">
                    <div class="row">
                        <?php $first_segment = $dataAdapter->flights->outbound->segments[0];?>
                        <img class="img-responsive" src="<?=base_url(sprintf('uploads/images/flights/airlines/%s.png', $first_segment->operating_airline->iata))?>" style="width: 100%;" alt="WY">
                    </div>
                </div>
                <div class="col-md-10">
                    <div style="margin-top:5px" class="fs18 dark bold RTL go-right mob-fs10"><?=$first_segment->operating_airline->name?></div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="col-xs-4 col-md-12">
                    <div class="clearfix"></div>
                    <div class="grey RTL go-right mob-fs10">
                        <?php foreach($dataAdapter->flights->outbound->segments as $segment): ?>
                            <p>
                                <i class="fa fa-plane"></i> <?= $segment->from_city ?> <i class="fa fa-long-arrow-right"></i> <?= $segment->to_city ?>
                            <div class="clearfix"></div>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <?= date('Y-m-d H:i', $segment->departure_time) ?> <?= date('Y-m-d H:i', $segment->arrival_time) ?>
                            </p>
                        <?php endforeach; ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="mob-fs10">
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 total_div mob-fs10">
                    <div class="booking-deposit">
                    </div>
                    <table style="margin-bottom:0px;" class="table table_summary">
                        <tbody>
                        <tr>
                            <td><?= trans('0562');?></td>
                            <td class="text-right"><?= $dataAdapter->currency.' '.$dataAdapter->total; ?></td>
                        </tr>
                        <tr>
                            <td class="booking-deposit-font"><strong><?php echo trans('0563');?> </strong></td>
                            <td class="text-right">
                                <strong><span class="booking-deposit-font go-left"><?= $dataAdapter->book_fee; ?></span></strong>
                            </td>
                        </tr>
                        <tr><td></td><td></td></tr>
                        </tbody>
                    </table>
                    <div class="left size14 dark">&nbsp;<?= trans('0124');?> :</div>
                    <div style="padding-top:0px;">
                        <span class="right lred2 bold fs18"><strong><?= $dataAdapter->currency.' '.$dataAdapter->total; ?></strong></span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#details"><strong><?php echo trans('052');?><i class="icon-angle-down"></i></strong><i class=""></i></a>
                    </h4>
                </div>
                <div id="details" class="panel-collapse collapse">
                    <div class="panel-body">
                        <section>
                            <div>
                                <h5><strong class="text-primary">Outbound</strong></h5>
                                <?php foreach($dataAdapter->flights->outbound->segments  as $segment): ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5><?= trans('08');?></h5>
                                            <p><?= date('Y-m-d H:i', $segment->departure_time) ?></p>
                                            <p><?= date('Y-m-d H:i', $segment->arrival_time) ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5><?= $segment->operating_airline->iata; ?></h5>
                                            <p><?= $segment->from_city; ?></p>
                                            <p><?= $segment->to_city; ?></p>
                                        </div>
                                        <div class="col-md-12">
                                            <h5><?= trans('0564');?>: <?= $segment->flight_no ?></h5>
                                            <p><?= $segment->operating_airline->name; ?></p>
                                            <p><?= trans('0565');?>: <?= date('H:i', $segment->departure_time) ?></p>
                                        </div>
                                        <!--<div class="col-md-2">
                                            <h5>Class: N/A</h5>
                                        </div>-->
                                    </div> <!--/ .row -->
                                <?php endforeach; ?>
                                <hr>
                                <?php if($dataAdapter->triptype == 'return'): ?>
                                    <h5><strong class="text-primary">Inbound</strong></h5>
                                    <?php foreach($dataAdapter->flights->inbound->segments as $segment): ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5><?= trans('08');?></h5>
                                                <p><?= date('Y-m-d H:i', $segment->departure_time) ?></p>
                                                <p><?= date('Y-m-d H:i', $segment->arrival_time) ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <h5><?= $segment->operating_airline->iata; ?></h5>
                                                <p><?= $segment->from_city; ?></p>
                                                <p><?= $segment->to_city; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <h5><?= trans('0564');?>: <?= $segment->flight_no ?></h5>
                                                <p><?= $segment->operating_airline->name; ?></p>
                                                <p><?= trans('0565');?>: <?= date('H:i', $segment->departure_time) ?></p>
                                            </div>
                                            <!--<div class="col-md-2">
                                                <h5>Economy</h5>
                                            </div>-->
                                        </div> <!--/ .row -->
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div>
                            </div>
                        </section>
                    </div>
                    <div class="panel-footer">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script>
    function scrollWin(x, y) {
        window.scrollBy(x, y);
    }

    $(document).ready(function() {
        $("[name^=nationality]").select2();

        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

        const countdownBox = 'countdown';

        // Set the date we're counting down to
        var expiry_minutes = '10';
        var countDownDate = new Date(new Date().getTime() + expiry_minutes * 60000).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById(countdownBox).innerHTML = minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                // Unhold seats.
                if (v.seats.length > 0) {
                    v.unHoldSeat(v.seats);
                } else {
                    document.getElementById(countdownBox).innerHTML = "EXPIRED";
                    setTimeout(function () { window.location.href = '<?=base_url()?>'; }, 3000);
                }
            }
        }, 1000);

        var flights_checked = '<?=$is_flight_valid?>';
        function get_flight_details () {
            $.ajax({
                type: "POST",
                url: "<?=base_url('thflights/flight_recheck')?>",
                data: {
                    "kiwi_local_session_key": '<?=$kiwi_local_session_key?>'
                },
                beforeSend: function () {
                    $('.completebook').text('Availability Checking....');
                },
                success: function (data) {
                    console.log(data);
                    if (parseInt(data.is_flight_valid) == 1) {
                        $('#confirmBooking').attr("disabled", false);
                        $('.completebook').text('Complete Booking');
                    } else {
                        setTimeout(function () {
                            get_flight_details();
                        }, 5000);
                    }
                }
            });
        }
        if (flights_checked == 0) {
            console.log('recheck flight');
            get_flight_details();
        } else {
            console.log('ok for booking');
        }

        function do_booking(form) {
            var payload = form.serializeArray();
            $('.loader-wrapper').show();
            $('#confirmBooking').attr("disabled", true);
            $.post( base_url + 'thflights/booking', payload, function(response) {
                console.log(response);
                $('.loader-wrapper').hide();
                $('#body-section').html(response.body);
                $('#confirmBooking').attr("disabled", false);
                if (response.status == true) {
                    window.location.href = response.invoice_url;
                } else {
                    var message = response.error.more_info;
                    if (message == undefined) {
                        message = response.error.message;
                    }
                    alert(message);
                }
            });
        }
        const auth_check = '<?=$userAuthorization?>';
        $("[name='ticketBookingForm']").on('submit', function(e) {
            e.preventDefault();
            var form = $(this);

            if (auth_check == 1) {
                do_booking(form);
            } else {
                // Authenticate first
                var fEmail = $('#login [name=email]');
                var fPassword = $('#login [name=password]');
                const payload = {
                    email: fEmail.val(),
                    password: fPassword.val()
                };
                $.post(base_url + 'auth/signin', payload, function (response) {
                    if (response.status == 'success') {
                        do_booking(form);
                    } else {
                        fEmail.css('border', 'solid 1px red');
                        fPassword.css('border', 'solid 1px red');
                        alert('Authentication Error: ' + response.message);
                    }
                });
            }
        });
    });
</script>
<?php endif; ?>

<style>
.select2-choice {
    height: 36px!important;
    line-height: 60px!important;
}
.select2-container .select2-choice>.select2-chosen {
    line-height: 25px;
}
</style>
<br><br><br>