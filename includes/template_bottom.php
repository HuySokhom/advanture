<!--Footer Widget Area Start-->
<div class="footer-widget-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-footer-widget contact-text-info">
                    <h4>Contact Us</h4>
                    <div class="footer-widget-list">
                        <ul>
                            <li class="icon send">
                                <?php echo nl2br(STORE_ADDRESS); ?>
                            </li>
                            <li class="icon envelope">
                                <?php echo STORE_OWNER_EMAIL_ADDRESS; ?>
                            </li>
                            <li class="icon phone">
                                <?php echo STORE_PHONE; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-footer-widget">
                    <h4>About Us</h4>
                    <div class="footer-widget-list">
                        <ul class="widget-lists">
                            <li><a href="<?php echo tep_href_link(FILENAME_PAGES, 'pages_id=1'); ?>">About Us</a></li>
                            <li><a href="contact_us.php">Contact Us</a></li>
                            <li>
                                <a href="<?php echo tep_href_link(FILENAME_PAGES, 'pages_id=3'); ?>">
                                    Why Us
                                </a>
                            </li>
                            <li><a href="<?php echo tep_href_link(FILENAME_PAGES, 'pages_id=4'); ?>">Our trips</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h4>Follow Us On Facebook</h4>
                    <div class="footer-widget-list">
                        <div class="fb-page"
                             data-href="https://www.facebook.com/camidexplorer/"
                             data-small-header="false"
                             data-width="550"
                             data-adapt-container-width="true"
                             data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/camidexplorer/"
                                        class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/camidexplorer/">
                                    CAMID
                                </a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="footer-link">
                    <a href="https://www.facebook.com/camidexplorer/" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-rss"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Footer Widget Area-->
<!--Footer Area Start-->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright © 2016. All rights reserved.</span>
                Power By <a href="https://www.facebook.com/skwebsolution/" target="_blank" style="color: #ffffff;">SKWeb Solution.</a>
            </div>
        </div>
    </div>
</div>
<!--End of Footer Area-->

<!-- Facebook Plugin-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1423595867869606";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- /.page-wrapper -->
<!-- jquery ============================================ -->
<script src="themes/js/vendor/jquery-1.11.3.min.js"></script>

<!-- bootstrap JS
============================================ -->
<script src="themes/js/bootstrap.min.js"></script>

<!-- nivo slider js
============================================ -->
<script src="themes/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="themes/lib/nivo-slider/home.js" type="text/javascript"></script>

<!-- wow JS
============================================ -->
<script src="themes/js/wow.min.js"></script>

<!-- meanmenu JS
============================================ -->
<script src="themes/js/jquery.meanmenu.js"></script>

<!-- owl.carousel JS
============================================ -->
<script src="themes/js/owl.carousel.min.js"></script>

<!-- price-slider JS
============================================ -->
<script src="themes/js/jquery-price-slider.js"></script>

<!-- scrollUp JS
============================================ -->
<script src="themes/js/jquery.scrollUp.min.js"></script>

<!-- Waypoints JS
============================================ -->
<script src="themes/js/waypoints.min.js"></script>

<!-- Counter Up JS
============================================ -->
<script src="themes/js/jquery.counterup.min.js"></script>

<!-- plugins JS
============================================ -->
<script src="themes/js/plugins.js"></script>

<!-- plugins JQuery Validation
============================================ -->
<script src="themes/js/jquery.validate.min.js"></script>
<script src="themes/js/additional-methods.js"></script>
<!-- main JS
============================================ -->
<script src="themes/js/main.js"></script>

<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKqUQ4QmbTWM_KNhkYg7erVxakz_0-noE&v=3.exp"></script>-->

</body>
</html>