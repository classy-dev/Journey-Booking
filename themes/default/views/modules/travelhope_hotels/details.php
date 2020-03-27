<link rel="stylesheet" href="<?php echo $theme_url; ?>assets/css/travelport.css" />
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<link href="<?php echo $theme_url; ?>assets/include/slider/slider.min.css" rel="stylesheet" />
<script src="<?php echo $theme_url; ?>assets/include/slider/slider.js"></script>
<style>
.rooms-search__container.details-page-view form input{font-size:1.125rem;font-weight:500;height:40px;}
</style>
<div class="container">
    <div class="acc-details__description">
        <div class="description">
            <div class="description__header">
                <div class="description__title text-700 c-very-dark-grey">
                    <span class="h2 strong"><?=$hotel->company_name?></span>
                    <span class="go-right mob-fs10">
                    <?php for($star = 0; $star < $hotel->rating; $star++): ?>
                        <i class="star star icon-star-5"></i>
                    <?php endfor; ?>
                    </span>
                </div>
            </div>
            <div class="description__address c-text-grey text-xs-regular">
                <span class="description__address-text text-s-regular-sm">
                    <?=$hotel->address?>
                </span>
            </div>
        </div>
    </div>

    <div>
        <div class="col-md-8">
            <div style="width:100%" class="row fotorama bg-dark" data-width="1000" data-height="490" data-allowfullscreen="true" data-autoplay="true" data-nav="thumbs">
                <?php if(isset($hotel->images) && !empty($hotel->images)): ?>
                    <?php foreach($hotel->images as $image): ?>
                        <img style="width:100%;height:450px !important" src="<?=$image?>">
                    <?php endforeach; ?>
                <?php else: ?>
                    <img style="width:100%;height:450px !important" src="<?=$hotel->slider_image?>">
                <?php endif; ?>
            </div>
        </div>
    </div>


<div class="col-md-4">
<iframe width="100%" height="558" style="position: static; background: #eee;" 
  src="https://maps.google.com/maps?q=<?php echo $hotel->latitude; ?>,<?php echo $hotel->longitude; ?>&hl=es;z=14&amp;output=embed"
 >
 </iframe>

 <!--<iframe  id="mapframe" width="100%" height="558" src="https://www.google.com/maps/embed/v1/place?q=<?php //echo $module->latitude; ?>,<?php //echo $module->longitude; ?>&amp;key=<?php echo $app_settings[0]->mapApi; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>-->
</div>
<div class="clearfix"></div>
    <section>
        <div class="overview">
            <div class="overview__body">
                <h4  class="overview__header h4">Overview</h4>
                <p class="text-s-regular c-text-grey overview__content--less">
                    <?=$hotel->description?>
                </p>
            </div>
        </div>
    </section>
    <section class="acc-details__rooms-section" id="rooms">
        <div class="acc-details__search-header">
            <div class="text-l c-dark-blue acc-details__search-header__title">Rooms available</div>
        </div>
        <div class="availability-search">
            <div class="rooms-search">
                <div class="rooms-search__container details-page-view">
                    <form action='<?=base_url("thhotels/recheck/{$hotel->company_name}")?>' method="post">
                        <div style="width:100%">
                            <div class="form-group col-md-3">
                                <label class="go-right"><?php echo trans('07');?></label>
                                <input type="text" placeholder="<?php echo trans('07'); ?>" name="checkin" value="<?=$searchForm->getCheckin()?>" class="form-control hpcheckin">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="go-right"><?php echo trans('09');?></label>
                                <input type="text" placeholder="<?php echo trans('09'); ?>" name="checkout" value="<?=$searchForm->getCheckout()?>" class="form-control hpcheckout">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="go-right"><?php echo trans('010');?></label>
                                <select class="form-control fs12" name="adults">
                                    <option value="1" <?=($searchForm->adults == 1)?"selected":""?>>1</option>
                                    <option value="2" <?=($searchForm->adults == 2)?"selected":""?>>2</option>
                                    <option value="3" <?=($searchForm->adults == 3)?"selected":""?>>3</option>
                                    <option value="4" <?=($searchForm->adults == 4)?"selected":""?>>4</option>
                                    <option value="5" <?=($searchForm->adults == 5)?"selected":""?>>5</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="go-right">Children</label>
                                <select class="form-control fs12" name="children">
                                    <option value="1" <?=($searchForm->children == 0)?"selected":""?>>0</option>
                                    <option value="1" <?=($searchForm->children == 1)?"selected":""?>>1</option>
                                    <option value="2" <?=($searchForm->children == 2)?"selected":""?>>2</option>
                                    <option value="3" <?=($searchForm->children == 3)?"selected":""?>>3</option>
                                    <option value="4" <?=($searchForm->children == 4)?"selected":""?>>4</option>
                                    <option value="5" <?=($searchForm->children == 5)?"selected":""?>>5</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="hidden" name="hotel_id" value='<?=$hotel->id?>'>
                                <input type="hidden" name="custom_payload" value='<?=$custom_payload?>'>
                                <input type="hidden" name="search_form" value='<?=$search_form?>'>
                                <button type="submit" class="btn btn-danger" style="margin-top: 25px;"><i class="icon_set_1_icon-66"></i>
                                    <span id="btn-submit-text"><?php echo trans('012'); ?></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="acc-details__search-results hotelRateDetail">
            <div class="room-cards">
                <?php if(! empty($hotel->rooms) ): ?>
                    <?php foreach($hotel->rooms as $index => $room): ?>
                        <div class="room-card">
                            <div class="room-card__container">
                                <div class="room-card__body">
                                    <div class="room-card__content">
                                        <div class="room-card__image-box">
                                            <?php $image = (!empty($room->image[0])) ? $room->image[0] : $theme_url.'assets/img/hotel.jpg'?>
                                            <img class="room-card__image" src="<?=$image?>">
                                        </div>
                                        <div class="room-card__content--left">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><?=str_replace(',', '<br>', $room->room_descriptions)?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="room-card__content--right">
                                            <div class="room-price__container">
                                                <span class="text-l c-dark-blue"><?=$room->price?></span>
                                            </div>
                                            <span class="text-xs-regular c-text-grey">Total price including taxes and fees</span>
                                            <form action='<?=base_url("thhotels/checkout/{$hotel->company_name}")?>' method="post">
                                                <input type="hidden" name="room" value='<?=base64_encode(json_encode($room))?>'>
                                                <input type="hidden" name="hotel" value='<?=base64_encode(json_encode($hotel))?>'>
                                                <input type="hidden" name="search_form" value='<?=base64_encode($searchForm->getInJson())?>'>
                                                <button class="core-btn-primary room-card__book-now-btn" type="submit">Book now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php if(!empty($hotel->amenities)): ?>
        <section class="acc-details__facilities_section" id="facilities">
            <div>
                <h2 class="text-l c-dark-blue">Hotel facilities</h2>
                <div class="hotel-facilities">
                    <div class="hotel-facilities__container row">
                        <?php foreach($hotel->amenities as $amenity): ?>
                            <div class="col-md-3">
                                <div class="hotel-facility">
                                    <i class="fa fa-check text-success"></i>
                                    <span class="text-s-regular c-text-grey"><?=$amenity->title?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>

<script>
    $(function(){
        $("[name=hotelRateDetail]").on('submit', function(e) {
            e.preventDefault();
            var payload = $(this).serialize();
            $('#btn-submit-text').text('SEARCHING...');
            $.get('<?=base_url("hotelport/rateAndRule")?>', payload, function(resp) {
                $('#btn-submit-text').empty().text('SEARCHING');
                $('.hotelRateDetail').empty().html(resp.body);
            });
        });
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('[name=checkin]').datepicker({
            format: 'yyyy-mm-dd',
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        })
        .on('changeDate', function(e){
            $(this).datepicker('hide');
            var newDate = new Date(e.date);
            checkout.setValue(newDate.setDate(newDate.getDate() + 1));
            $('[name=checkout]').focus();
        }).data('datepicker');

        // Checkout time
        var checkout = $('[name=checkout]').datepicker({
            format: 'yyyy-mm-dd',
            onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        }).data('datepicker');

        // Default fill up date
        if(checkin.element.val()) {
            checkin.setValue(checkin.element.val());
        }
        if(checkout.element.val()) {
            checkout.setValue(checkout.element.val());
        }
    });
</script>