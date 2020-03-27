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
<form autocomplete="off" id="trflight" action="<?php echo base_url('trflight/search'); ?>" method="GET" role="search">
    <div class="col-md-2 form-group go-right col-xs-12">
        <div class="row">
            <div class="clearfix"></div>
            <i class="iconspane-lg icon_set_1_icon-41"></i>
            <input type="text" name="origin" value="<?=$searchForm->from_code?>" class="widget-select2" id="origin" required='required'>
        </div>
    </div>
    <div class="col-md-2 form-group go-right col-xs-12">
        <div class="row">
            <div class="clearfix"></div>
            <i class="iconspane-lg icon_set_1_icon-41"></i>
            <input type="text" name="destination" value="<?=$searchForm->to_code?>" id="destination" class="widget-select2" required='required'>
        </div>
    </div>
    <div class="bgfade col-md-2 form-group go-right col-xs-6 focusDateInput">
        <div class="row">
            <div class="clearfix"></div>
            <i class="iconspane-lg icon_set_1_icon-53"></i>
            <input autocomplete="false" type="text" id="departure" placeholder="<?php echo trans('0472'); ?>" name="departure" value="<?php echo $searchForm->date_from; ?>" class="form form-control input-lg departureTime" required>
        </div>
    </div>
    <div class="bgfade col-md-2 form-group go-right col-xs-6 focusDateInput">
        <div class="row">
            <div class="clearfix"></div>
            <i class="iconspane-lg icon_set_1_icon-53"></i>
            <input autocomplete="false" type="text"  id="arrival" placeholder="<?php echo trans('0473'); ?>" name="arrival" value="<?php echo $query->arrival; ?>" class="form form-control input-lg arrivalTime">
        </div>
    </div>
    <div class="col-md-1 form-group go-right col-xs-12">
        <div class="row">
            <div class="clearfix"></div>
            <i class="iconspane-lg icon_set_1_icon-70"></i>
            <input type="text" name="totalManualPassenger" value="<?php echo $query->passenger['total']; ?>" placeholder="0" class="form form-control input-lg" data-toggle="modal" data-target="#manual_flightTravelers" required>
        </div>
    </div>
    <div class="bgfade col-md-3 col-xs-12 search-button">
        <div class="clearfix"></div>
        <button type="submit"  class="btn-primary btn btn-lg btn-block pfb0">
            <?php echo trans('012'); ?>
        </button>
    </div>
    <!--/ .row -->
    <div class="modal fade" id="manual_flightTravelers" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm wow flipInY" role="document">
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
                                <div class="col-sm-5 col-xs-5">
                                    <select class="travellercount form-control" id="madult" name="madult">
                                        <option value="1" <?php echo ($query->passenger['adult'] == 1) ? "selected" : ""; ?>>1</option>
                                        <option value="2" <?php echo ($query->passenger['adult'] == 2) ? "selected" : ""; ?>>2</option>
                                        <option value="3" <?php echo ($query->passenger['adult'] == 3) ? "selected" : ""; ?>>3</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <label class="help-block">(12+yrs)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-input" class="col-sm-3 col-xs-3 control-label"><?php echo trans('011');?></label>
                                <div class="col-sm-5 col-xs-5">
                                    <select class="travellercount form-control" id="mchildren" name="mchildren" value="<?php echo $query->passenger['children']; ?>">
                                        <option value="0" <?php echo ($query->passenger['children'] == 0) ? "selected" : ""; ?>>0</option>
                                        <option value="1" <?php echo ($query->passenger['children'] == 1) ? "selected" : ""; ?>>1</option>
                                        <option value="2" <?php echo ($query->passenger['children'] == 2) ? "selected" : ""; ?>>2</option>
                                        <option value="3" <?php echo ($query->passenger['children'] == 3) ? "selected" : ""; ?>>3</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <label class="help-block">(4+yrs)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="form-input" class="col-sm-3 col-xs-3 control-label"><?php echo trans('0282');?></label>
                                <div class="col-sm-5 col-xs-5">
                                    <select class="travellercount form-control" id="minfant" name="minfant" value="<?php echo $query->passenger['infant']; ?>">
                                        <option value="0" <?php echo ($query->passenger['infant'] == 0) ? "selected" : ""; ?>>0</option>
                                        <option value="1" <?php echo ($query->passenger['infant'] == 1) ? "selected" : ""; ?>>1</option>
                                        <option value="2" <?php echo ($query->passenger['infant'] == 2) ? "selected" : ""; ?>>2</option>
                                        <option value="3" <?php echo ($query->passenger['infant'] == 3) ? "selected" : ""; ?>>3</option>
                                    </select>
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
                <label for="oneway" data-type="oneway">&nbsp;<?php echo trans('0384');?></label>
            </div>
        </div>
        <div class="col-md-2 col-xs-6 w120">
            <div class="pure-checkbox">
                <input id="round" name="triptype" type="radio" class="checkbox triptype" value="return" data-type="round" <?php if($query->triptype == "return") { ?> checked <?php } ?>>
                <label for="round" data-type="round">&nbsp;<?php echo trans('0385');?> </label>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    function objectifyForm(formArray) {
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++){
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }
    $("#thflights").submit(function(e){
        e.preventDefault();
        var formData = objectifyForm($(this).serializeArray());
        var origin_airlines = $("#origin").val();
        var destination_airlines = $("#destination").val();
        var departure_date_airlines = $("#departure").val();
        var return_date_airlines = $("#arrival").val();
        var madult_airlines = $("#madult").val();
        var mchildren_airlines = $("#mchildren").val();
        var minfant_airlines = $("#minfant").val();
        var triptype_airlines = formData.triptype;
        var endpoint = $(this).attr('action')+'/';
        if (triptype_airlines == "return") {
            var new_url = endpoint+origin_airlines+"/"+destination_airlines+"/"+triptype_airlines+"/"+departure_date_airlines+'/'+return_date_airlines+"/"+madult_airlines+"/"+mchildren_airlines+"/"+minfant_airlines;
        } else {
            var new_url = endpoint+origin_airlines+"/"+destination_airlines+"/"+triptype_airlines+"/"+departure_date_airlines+"/"+madult_airlines+"/"+mchildren_airlines+"/"+minfant_airlines;
        }
        document.getElementById("overlay").style.display = "block";
        window.location.replace(new_url);
    });
</script>
<script type="text/javascript">
    function total_passengers() {
        var madult = parseInt(document.getElementById('madult').value);
        var mchildren = parseInt(document.getElementById('mchildren').value);
        var minfant = parseInt(document.getElementById('minfant').value);
        var total_passenger = madult + mchildren + minfant;
        $("#totalManualPassenger").val(total_passenger);
    }
    function change_date_departure(departure){
        document.getElementById('departure_date').value = departure;
        $("#sabre_search").submit();
    }
</script>
<div id="overlay">
    <div id="text">
        <img src="<?php echo base_url(''); ?>uploads/images/flights/airlines/flight.gif" alt="Searching flight"><br>
        Please Wait ...
    </div>
</div>
<style type="text/css">
    #overlay {
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #fff;
        z-index: 99999;
        cursor: pointer;
    }

    #text{
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 50px;
        color: black;
        text-align: center;
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
    }
</style>