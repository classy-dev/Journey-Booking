</div> <!--/ .body-section -->

<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
<style>
    #content
    {
        font-family: 'Josefin Sans', serif;
        font-size: 14px;
        padding: 0px 0;
    }
    .featured-box.style-1, .featured-box.style-2, .featured-box.style-3 {
        padding-left: 50px;
        padding-top: 8px;
    }
    .featured-box.style-1 .featured-box-icon, .featured-box.style-2 .featured-box-icon, .featured-box.style-3 .featured-box-icon {
        position: absolute;
        top: 20px;
        left: 10px;
        margin-bottom: 0;
        font-size: 30px;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        text-align: center;
    }
    .featured-box .featured-box-icon {
        display: inline-block;
        font-size: 35px;
        height: 45px;
        line-height: 45px;
        padding: 0;
        width: 45px;
        margin-top: 0;
        margin-bottom: 12px;
        color: #0071cc !important;
        border-radius: 0;
    }
    /* =================================== */
    /*  Footer Styles
    /* =================================== */
    #footer {
      color: #252b33;
      padding: 0px 0px 35px 0px;
      padding: 0 0 2rem 0;
      margin-top: 1.5rem;
    }
    #footer .nav .nav-item {
      display: inline-block;
      line-height: 12px;
      margin: 0;
      padding: 0 10px;
    }
    #footer .nav .nav-item:first-child {
      padding-left: 0px;
    }
    #footer .nav .nav-item:last-child {
      padding-right: 0px;
    }
    #footer .nav .nav-item .nav-link {
      padding-left: 0;
      padding-right: 0;
      color: #252b33;
      -webkit-transition: all 0.2s ease;
      transition: all 0.2s ease;
    }
    #footer .nav .nav-item .nav-link:focus {
      color: #0071cc;
      -webkit-transition: all 0.2s ease;
      transition: all 0.2s ease;
    }
    #footer .nav .nav-link:hover {
      color: #0071cc;
      -webkit-transition: all 0.2s ease;
      transition: all 0.2s ease;
    }
    #footer .footer-copyright {
      border-top: 1px solid #e6e9ec;
      padding: 32px 0px 0px;
      margin-top: 2rem;
      margin-top: 32px;
      text-align: center;
    }
    #footer .footer-copyright .copyright-text {
      color: #67727c;
      margin: 12px 0 0 0;
      padding: 0;
    }
    #footer .nav.flex-column .nav-item {
      padding: 0px;
    }
    #footer .nav.flex-column .nav-item .nav-link {
      margin: 0.8rem 0px;
      padding: 0px;
      color: #67727c;
    }
    #footer .nav.flex-column .nav-item .nav-link:hover {
      color: #0071cc;
      -webkit-transition: all 0.2s ease;
      transition: all 0.2s ease;
    }
    #footer.footer-text-light {
      color: rgba(250, 250, 250, 0.8);
    }
    #footer.footer-text-light .nav .nav-item .nav-link {
      color: rgba(250, 250, 250, 0.8);
    }
    #footer.footer-text-light .nav .nav-item .nav-link:hover {
      color: #fafafa;
    }
    #footer.footer-text-light .footer-copyright {
      border-color: rgba(250, 250, 250, 0.15);
      color: rgba(250, 250, 250, 0.5);
    }
    #footer.footer-text-light.bg-primary {
      color: #fff;
    }
    #footer.footer-text-light.bg-primary .nav .nav-item .nav-link {
      color: #fff;
    }
    #footer.footer-text-light.bg-primary .nav .nav-item .nav-link:hover {
      color: rgba(250, 250, 250, 0.7);
    }
    #footer.footer-text-light.bg-primary .footer-copyright {
      border-color: rgba(250, 250, 250, 0.15);
      color: rgba(250, 250, 250, 0.9);
    }
    #footer.footer-text-light.bg-primary .footer-copyright .copyright-text {
      color: rgba(250, 250, 250, 0.9);
    }
    #footer.footer-text-light.bg-primary a {
      color: #fff;
    }
    #footer.footer-text-light.bg-primary a:hover {
      color: rgba(250, 250, 250, 0.7);
    }

    /* Payments Images */
    .payments-types {
      margin: 0;
      padding: 0;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      list-style: none;
    }
    .payments-types li {
      margin: 0px 10px 8px 0px;
    }
    .payments-types li a {
      -webkit-transition: all 0.2s ease;
      transition: all 0.2s ease;
      opacity: 1;
    }
    .payments-types li img {
      display: flex;
    }
    .payments-types li:hover a {
      opacity: 0.8;
    }

    /* Newsleter */
    .newsletter .form-control {
      height: 38px !important;
      font-size: 14px;
    }
    .newsletter .btn {
      height: 38px;
      padding-top: 0;
      padding-bottom: 0px;
      font-size: 14px;
      background: #546d89;
      border-color: #546d89;
    }
    .newsletter .btn:hover {
      background: #415b78;
    }

    /* Social Icons */
    .social-icons {
      margin: 0;
      padding: 0;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      list-style: none;
    }
    .social-icons li {
      margin: 0px 2px 4px;
      padding: 0;
      border-radius: 100%;
      overflow: visible;
    }
    .social-icons li:last-child {
      margin-right: 0px;
    }
    .social-icons li a {
      background: #d4d4d4;
      border-radius: 100%;
      display: block;
      height: 34px;
      line-height: 34px;
      width: 34px;
      font-size: 16px;
      text-align: center;
      color: #fff;
      text-decoration: none;
      -webkit-transition: all 0.2s ease;
      transition: all 0.2s ease;
    }
    .social-icons li i {
      line-height: inherit;
    }
    .social-icons.social-icons-sm li a {
      width: 30px;
      height: 30px;
      line-height: 30px;
      font-size: 14px;
    }
    .social-icons.social-icons-lg li a {
      width: 40px;
      height: 40px;
      line-height: 40px;
      font-size: 20px;
    }
    .social-icons.social-icons-dark li a {
      background: #555;
    }
    .social-icons li:hover a {
      background: #171717;
      color: #333;
      -webkit-transition: all 0.2s ease;
      transition: all 0.2s ease;
    }
    .social-icons li:hover.social-icons-twitter a, .social-icons.social-icons-colored li.social-icons-twitter a {
      background: #00ACEE;
      color: #fff;
    }
    .social-icons li:hover.social-icons-facebook a, .social-icons.social-icons-colored li.social-icons-facebook a {
      background: #3B5998;
      color: #fff;
    }
    .social-icons li:hover.social-icons-linkedin a, .social-icons.social-icons-colored li.social-icons-linkedin a {
      background: #0E76A8;
      color: #fff;
    }
    .social-icons li:hover.social-icons-rss a, .social-icons.social-icons-colored li.social-icons-rss a {
      background: #EE802F;
      color: #fff;
    }
    .social-icons li:hover.social-icons-google a, .social-icons.social-icons-colored li.social-icons-google a {
      background: #DD4B39;
      color: #fff;
    }
    .social-icons li:hover.social-icons-pinterest a, .social-icons.social-icons-colored li.social-icons-pinterest a {
      background: #cc2127;
      color: #fff;
    }
    .social-icons li:hover.social-icons-youtube a, .social-icons.social-icons-colored li.social-icons-youtube a {
      background: #C4302B;
      color: #fff;
    }
    .social-icons li:hover.social-icons-instagram a, .social-icons.social-icons-colored li.social-icons-instagram a {
      background: #3F729B;
      color: #fff;
    }
    .social-icons li:hover.social-icons-skype a, .social-icons.social-icons-colored li.social-icons-skype a {
      background: #00AFF0;
      color: #fff;
    }
    .social-icons li:hover.social-icons-email a, .social-icons.social-icons-colored li.social-icons-email a {
      background: #6567A5;
      color: #fff;
    }
    .social-icons li:hover.social-icons-vk a, .social-icons.social-icons-colored li.social-icons-vk a {
      background: #2B587A;
      color: #fff;
    }
    .social-icons li:hover.social-icons-xing a, .social-icons.social-icons-colored li.social-icons-xing a {
      background: #126567;
      color: #fff;
    }
    .social-icons li:hover.social-icons-tumblr a, .social-icons.social-icons-colored li.social-icons-tumblr a {
      background: #34526F;
      color: #fff;
    }
    .social-icons li:hover.social-icons-reddit a, .social-icons.social-icons-colored li.social-icons-reddit a {
      background: #C6C6C6;
      color: #fff;
    }
    .social-icons li:hover.social-icons-delicious a, .social-icons.social-icons-colored li.social-icons-delicious a {
      background: #205CC0;
      color: #fff;
    }
    .social-icons li:hover.social-icons-stumbleupon a, .social-icons.social-icons-colored li.social-icons-stumbleupon a {
      background: #F74425;
      color: #fff;
    }
    .social-icons li:hover.social-icons-digg a, .social-icons.social-icons-colored li.social-icons-digg a {
      background: #191919;
      color: #fff;
    }
    .social-icons li:hover.social-icons-blogger a, .social-icons.social-icons-colored li.social-icons-blogger a {
      background: #FC4F08;
      color: #fff;
    }
    .social-icons li:hover.social-icons-flickr a, .social-icons.social-icons-colored li.social-icons-flickr a {
      background: #FF0084;
      color: #fff;
    }
    .social-icons li:hover.social-icons-vimeo a, .social-icons.social-icons-colored li.social-icons-vimeo a {
      background: #86C9EF;
      color: #fff;
    }
    .social-icons li:hover.social-icons-yahoo a, .social-icons.social-icons-colored li.social-icons-yahoo a {
      background: #720E9E;
      color: #fff;
    }
    .social-icons li:hover.social-icons-googleplay a, .social-icons.social-icons-colored li.social-icons-googleplay a {
      background: #DD4B39;
      color: #fff;
    }
    .social-icons li:hover.social-icons-apple a, .social-icons.social-icons-colored li.social-icons-apple a {
      background: #000;
      color: #fff;
    }
    .social-icons.social-icons-colored li:hover a {
      background: #d4d4d4;
      color: #333;
    }

    /* Login/Signup Modal Dialog */
    #login-signup .modal-dialog,
    #login-signup-page {
      max-width: 430px;
    }

    /* Back to Top */
    #back-to-top {
      display: none;
      position: fixed;
      z-index: 1030;
      bottom: 8px;
      right: 10px;
      background-color: rgba(0, 0, 0, 0.2);
      text-align: center;
      color: #fff;
      font-size: 18px;
      width: 36px;
      height: 36px;
      line-height: 36px;
      border-radius: 100%;
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
      -webkit-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);
    }
    #back-to-top:hover {
      background-color: #0071cc;
      -webkit-box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
    }

    @media (max-width: 575px) {
      #back-to-top {
        z-index: 1029;
      }
    }
    .featuredsection
    {
        padding: 0px 0;
        font-family: 'Josefin Sans', serif;
    }

</style>
<style>
    #footer
    {
            background-color: #0071cc !important;
        padding-top: 3rem!important;
            font-family: 'Josefin Sans', serif;
    color: #fff;
    font-size: 16px;
    }
    #footer .nav .nav-item .nav-link
    {
        color: #fff;
    }
    #footer .nav .nav-item .nav-link:hover
    {
        color: #000;
    }
    #footer .footer-copyright .copyright-text,
    #footer .footer-copyright .copyright-text a
    {
        color: #fff;
    }
    .newsletter .sub_email
    {
        display: inline-block;
        float: left;
        width: 70%;
    }
    .newsletter .sub_newsletter
    {
        display: inline-block;
        float: left;
        width: 30%;
    }
</style>

<section class="section bg-light pt-4 pb-3 featuredsection">
  
      <div class="container">
            <hr>
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="featured-box text-center">
              <div class="featured-box-icon"> <i class="fas fa fa-lock"></i> </div>
              <h4>100% Secure Payments</h4>
              <p>Moving your card details to a much more secured place.</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="featured-box text-center">
              <div class="featured-box-icon"> <i class="fas fa fa-thumbs-up"></i> </div>
              <h4>Trust pay</h4>
              <p>100% Payment Protection. Easy Return Policy.</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="featured-box text-center">
              <div class="featured-box-icon"> <i class="fas fa fa-bullhorn"></i> </div>
              <h4>Refer &amp; Earn</h4>
              <p>Invite a friend and earn up to $100.</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="featured-box text-center">
              <div class="featured-box-icon"> <i class="far fa fa-life-ring"></i> </div>
              <h4>24X7 Support</h4>
              <p>We're here to help. Have a query and need help ? <a href="#">Click here</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
	

	
    <footer id="footer" class="-text-light mt-0 pt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3 mb-md-0">
          <p>Secure Payment with</p>
          <ul class="payments-types">
            <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="assets/img/visa.png" alt="visa" title="" data-original-title="Visa"></a></li>
            <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="assets/img/discover.png" alt="discover" title="" data-original-title="Discover"></a></li>
            <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="assets/img/paypal.png" alt="paypal" title="" data-original-title="PayPal"></a></li>
            <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="assets/img/american.png" alt="american express" title="" data-original-title="American Express"></a></li>
            <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="assets/img/mastercard.png" alt="discover" title="" data-original-title="Discover"></a></li>
          </ul>
        </div>
	<!--	
<div class="col-md-4 mb-3 mb-md-0 newsletter" >
<p>Tripmeng.com is accredited by</p>
          <ul class="payments-types">
            <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="assets/img/visa.png" alt="visa" title="" data-original-title="Visa"></a></li>
            <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="assets/img/discover.png" alt="discover" title="" data-original-title="Discover"></a></li>
           
          </ul>
</div>
-->
        <div class="col-md-4 mb-3 mb-md-0 newsletter" >
          <?php if(isModuleActive('newsletter')){ ?>
                    
                    <p><?php echo trans('023');?></p>
                    <div class="col-md-12">
                        <div id="message-newsletter_2"></div>
                        <form role="search" onsubmit="return false;">
                        </form>
                        <div class="row">
                            <input type="email" class="form-control input-lg fccustom2 sub_email form-group" id="exampleInputEmail1" placeholder="<?php echo trans('023');?> <?php echo trans('0403');?>" required>
                            
                            <button type="submit" class="btn btn-danger btn-block sub_newsletter ttu"> <?php echo trans('024');?></button>
                        </div>
                        <ul class="nav navbar-nav">
                            <li>
                                <a class="newstext" href="javascript:void(0);">
                                    <div class="wow fadeIn subscriberesponse"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                
                <?php } ?>
        </div>		
        <div class="col-md-4 d-flex align-items-md-end flex-column">
          <p>Keep in touch</p>
          <ul class="social-icons social-icons-colored">
            <li class="social-icons-facebook"><a data-toggle="tooltip" href="http://www.facebook.com/" target="_blank" title="" data-original-title="Facebook"><i class="fab fa fa-facebook-f"></i></a></li>
            <li class="social-icons-twitter"><a data-toggle="tooltip" href="http://www.twitter.com/" target="_blank" title="" data-original-title="Twitter"><i class="fab fa fa-twitter"></i></a></li>
            <li class="social-icons-google"><a data-toggle="tooltip" href="http://www.google.com/" target="_blank" title="" data-original-title="Google"><i class="fab fa fa-google"></i></a></li>
            <li class="social-icons-linkedin"><a data-toggle="tooltip" href="http://www.linkedin.com/" target="_blank" title="" data-original-title="Linkedin"><i class="fab fa fa-linkedin"></i></a></li>
            <li class="social-icons-youtube"><a data-toggle="tooltip" href="http://www.youtube.com/" target="_blank" title="" data-original-title="Youtube"><i class="fab fa fa-youtube"></i></a></li>
            <li class="social-icons-instagram"><a data-toggle="tooltip" href="http://www.instagram.com/" target="_blank" title="" data-original-title="Instagram"><i class="fab fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="footer-copyright">
        <ul class="nav justify-content-center">
          <li class="nav-item"> <a class="nav-link active" href="<?php echo base_url(); ?>About-Us">About Us</a> </li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>flights/faq/">Faq</a> </li>
		  <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>flights/jobs/">Jobs</a> </li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>How-to-Book">How to Book</a> </li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>Terms-of-Use">Terms of Use</a> </li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>Privacy-Policy">Privacy Policy</a> </li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>b2b">B2B Travel</a> </li>
        </ul>
        <p class="copyright-text">Copyright © 2020 <a href="<?php echo base_url(); ?>">Tripmeng</a>. All Rights Reserved.</p>
	  </div>
    </div>
  </footer>
<?php include 'scripts.php'; ?>
</body>
</html>