<?php if(isModuleActive( 'tours')){ ?>
<link rel="stylesheet" href="<?php echo $theme_url; ?>assets/css/featuredtours.css" />
<div class="container">
<div class="title text-center">
<h2 class="destination-title go-text-right ttu text-center">
<i class="icon_set_1_icon-30"></i> <?php echo trans('0451');?>
</h2>
</div>
<div class="vc_row wpb_row vc_inner vc_row-fluid vc_column-gap-30 RTL">
<div class="">
<div class="row hotel-list image-box hotel listing-style1 add-clearfix featured_tours">
<?php foreach($featuredTours as $item){ ?>
  <div class="col-md-3">
    <article class="box" id="tour-36" style="height: 488px;">
      <figure>
        <a href="<?php echo $item->slug;?>" class="hover-effect popup-gallery">
        <img width="" height="" alt="" src="<?php echo $item->thumbnail;?>">
        </a>
      </figure>
      <div class="details">
        <h4 class="box-title go-text-right">
          <span><?php echo character_limiter($item->title,25);?></span>
          <small>
          <i class="fa fa-map-marker"></i> <?php echo character_limiter($item->location,20);?>
          </small>
        </h4>
        <div class="feedback">
          <div class="five-stars-container" title="<?php echo character_limiter($item->title,25);?>">
            <span class="stars"><?php echo $item->stars;?></span>
          </div>
          <span class="review">
          <?php echo $item->avgReviews->overall ?> <?php echo trans('042');?>
          </span>
        </div>
        <div class="go-text-right">
        <?php echo $item->tourDays; ?> <?php echo trans('0275');?> / <?php echo $item->tourNights; ?> <?php echo trans('0276');?>
        </div>
        <div class="row discover_more">
          <div class="col-md-7 price_container go-right" style="position: absolute;">
            <div class="row">
              <div class="col-md-12">
              <?php if($item->price > 0){ ?>
                <div class="price">
                  <div class="amount"><span class="amo"><?php echo $item->price;?></span></div>
                  <div class="currency">
                    <?php echo $item->currCode;?>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 ">
                <div class="hint">
                  <?php echo trans('0367');?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 action_container go-left" style="position: absolute;">
            <a class="button btn-small" href="<?php echo $item->slug;?>" style="display:table;">
            <?php echo trans( '0142'); ?>
            </a>
          </div>
        </div>
      </div>
    </article>
  </div>
  <?php } ?>
</div>
</div>
</div>
</div>
<?php } ?>