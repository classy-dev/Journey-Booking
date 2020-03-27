<style>
    .table { margin-bottom: 5px; }
    .filter {
        background: #fff;
    }
    .filter label {
        color: #0f0f0f;
    }
    .filterstext span {
        padding: 5px 0px;
    }
</style>
<div class="search_head">
    <div class="container"><br>
        <?php require $themeurl. 'views/modules/travelhope_hotels/search_form.php';?>
        <div class="clearfix"></div>
    </div>
</div>
<div class="listingbg">
    <div class="container offset-0">
        <div class="clearfix"></div>
        <div class="col-md-3 hidden-sm hidden-xs filter">
            <!-- FILTERS -->
            <form name="fFilters" action="#" method="POST" role="search">
                <div style="padding:10px 10px 10px 10px">
                    <div class="textline">
                        <span class="filterstext"><span><i class="icon_set_1_icon-95"></i><?=trans('0191')?></span></span>
                    </div>
                </div>
                <div class="clearfix"></div>

                <!-- Price range -->
                <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#priceOrderFilter">
                    <?=trans('0598')?> <span class="collapsearrow"></span>
                </button>
                <div id="priceOrderFilter" class="collapse in">
                    <div class="panel-body">
                        <div class="go-right"><input type="radio" id="priceOrderDes" name="priceOrder" value="des">&nbsp;&nbsp;<label class="go-left" for="priceOrderDes"><?=trans('0599')?></label></div>
                        <div class="go-right"><input type="radio" id="priceOrderAsc" name="priceOrder" value="acs">&nbsp;&nbsp;<label class="go-left" for="priceOrderAsc"><?=trans('0600')?></label></div>
                    </div>
                </div>

                <!-- Star ratings -->
                <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse1">
                    <?php echo trans('0601');?> <span class="collapsearrow"></span>
                </button>
                <div id="collapse1" class="collapse in">
                    <div class="hpadding20">
                        <br>
                        <?php for($radios = 0; $radios < 5; $radios++): ?>
                            <?php $checked = ($radios+1 == $input->stars)?'checked':''; ?>
                            <div class="rating" style="font-size: 14px;">
                                <label class="rating-stars" for="<?=$radios+1?>" data-value="<?=$radios?>">
                                    <div class="iradio_square-grey <?=$checked?>" style="position: relative;">
                                        <input type="radio" <?=$checked?> id="<?=$radios+1?>" name="stars" class="go-right radio" value="<?=$radios+1?>" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                                    </div>
                                    <i class="fa <?=($radios >= 0)?'star fa-star':'fa-star-o'?>"></i>
                                    <i class="fa <?=($radios >= 1)?'star fa-star':'fa-star-o'?>"></i>
                                    <i class="fa <?=($radios >= 2)?'star fa-star':'fa-star-o'?>"></i>
                                    <i class="fa <?=($radios >= 3)?'star fa-star':'fa-star-o'?>"></i>
                                    <i class="fa <?=($radios >= 4)?'star fa-star':'fa-star-o'?>"></i>
                                </label>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                </div>
                <!-- End of Star ratings -->
                <!-- Price Range -->
                <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse2">
                    <?php echo trans('0301');?> <span class="collapsearrow"></span>
                </button>
                <div id="collapse2" class="collapse in">
                    <div class="panel-body text-center">
                        <?php
                            $selectedprice =  "10, 5000";
                            $minprice = 10;
                            $maxprice = 5000;
                            $step = 500;
                        ?>
                        <input type="text" id="price-range-slider" name="price" class="col-md-12" value="<?=$selectedprice?>"
                               data-slider-min="<?=$minprice?>"
                               data-slider-max="<?=$maxprice?>"
                               data-slider-step="<?=$step?>"
                               data-slider-value="[<?=$selectedprice?>]">
                    </div>
                </div>
                <!-- End of Price Range -->
                <br/>
                <button style="border-radius:0px;margin-bottom:0px;" type="button" class="btn btn-primary br25 btn-lg btn-block loader" id="searchform"></button>
            </form>
        </div>

        <div class="col-md-9 col-xs-12">
            <div class="itemscontainer">
                <table class="bgwhite table table-striped" id="listing">
                    <?php if(isset($hotels) && ! empty($hotels)): ?>
                        <?php foreach($hotels as $hotel): 
                            $url = preg_replace('/\s+|&/', '-', $hotel->company_name);
                            ?>
                            <tr data-price="<?=$hotel->price?>" data-stars="<?=$hotel->rating?>">
                                <td class="wow fadeIn p-10-0">
                                    <div class="col-md-3 col-xs-5 go-right rtl_pic">
                                        <div class="img_list">
                                            <div class="review text-center size18 hidden-xs"><?=$hotel->rating.' / 5'?></div>
                                            <a href='<?=base_url("thhotels/detail/{$url}")?>'>
                                                <img src="<?= $hotel->image ?>" class="center-block loader" alt="<?= $url ?>">
                                                <div class="short_info"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-4 g0-left">
                                        <div class="row">
                                            <h4 class="RTL go-text-right mt0 list_title">
                                                <a href='<?=base_url("thhotels/detail/{$url}")?>'><b><?= $hotel->company_name ?></b></a>
                                            </h4>
                                            <a class="go-right ellipsisFIX go-text-right mob-fs14" href="javascript:void(0);" title="<?=$hotel->city_name?>">
                                                <i style="margin-left: -3px;" class="mob-fs14 icon-location-6 go-right"></i><?=$hotel->city_name?>  </a>
                                            <?php for($star = 1; $star <= 5; $star++): ?>
                                                <?php if($hotel->rating < $star): ?>
                                                    <i class="star star fa fa-star-o"></i>
                                                <?php else: ?>
                                                    <i class="star fa fa-star"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>

                                            <p style="margin: 7px 0px 7px 0px;" class="grey RTL fs12 hidden-xs">
                                                <?=strlen($hotel->description) > 250 ? substr($hotel->description,0,250)."..." : $hotel->description;?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-4 col-sm-4 go-left pull-right price_tab">
                                        <div class="fs26 text-center"><small><?= $hotel->currencies ?></small> <strong><?= $hotel->price ?></strong></div>
                                        <form action='<?=base_url("thhotels/detail/{$url}")?>' method="post">
                                            <input type="hidden" name="hotel_id" value='<?=$hotel->id?>'>
                                            <input type="hidden" name="custom_payload" value='<?=json_encode($hotel->custom_payload)?>'>
                                            <input type="hidden" name="search_form" value='<?=json_encode($searchForm)?>'>
                                            <button type="submit" class="btn btn-primary br25 loader loader btn-block">
                                                <?php echo trans('0177');?>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <div class="clearfix"></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var rows = $('#listing').find('tr');

    $(function () {
        $( "#price-range-slider" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                console.log( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
    });

    // Sorting according to prices.
    $("[name^=priceOrder]").click(function() {
        var order = $(this).val();
        var tb = $('#listing');

        var rows = tb.find('tr');
        rows.sort(function(a, b) {
            var keyA = $(a).data('price');
            var keyB = $(b).data('price');

            if (order == 'acs') {
                return keyA - keyB;
            } else {
                return keyB - keyA;
            }
        });

        $.each(rows, function(index, row) {
            tb.append(row);
        });
    });

    $("[class^=rating-stars]").click(function() {
        var star = $(this).data('value');
        var tb = $('#listing');
        tb.empty(); // clear rows
        $.each(rows, function (index, row, rows) {
            console.log($(row).data('stars'), ' - ', star);
            if ($(row).data('stars') == star) {
                tb.append(row);
            }
        });
    });

    $("form[name=fFilters]").on("submit", function(e) {
        e.preventDefault();
    });
</script>