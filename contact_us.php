<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CONTACT_US);

  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'send') && isset($HTTP_POST_VARS['formid']) && ($HTTP_POST_VARS['formid'] == $sessiontoken)) {
    $error = false;

    $name = tep_db_prepare_input($HTTP_POST_VARS['name']);
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email']);
    $enquiry = tep_db_prepare_input($HTTP_POST_VARS['enquiry']);

    if (!tep_validate_email($email_address)) {
      $error = true;

      $messageStack->add('contact', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
    }

    $actionRecorder = new actionRecorder('ar_contact_us', (tep_session_is_registered('customer_id') ? $customer_id : null), $name);
    if (!$actionRecorder->canPerform()) {
      $error = true;

      $actionRecorder->record(false);

      $messageStack->add('contact', sprintf(ERROR_ACTION_RECORDER, (defined('MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES') ? (int)MODULE_ACTION_RECORDER_CONTACT_US_EMAIL_MINUTES : 15)));
    }

    if ($error == false) {
      tep_mail(STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, EMAIL_SUBJECT, $enquiry, $name, $email_address);

      $actionRecorder->record();

      tep_redirect(tep_href_link(FILENAME_CONTACT_US, 'action=success'));
    }
  }

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_CONTACT_US));

  require(DIR_WS_INCLUDES . 'template_top.php');
?>
<div class="banner-area"></div>
<!--Contact Information Area Start-->
<div class="contact-information-area section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title text-center">
          <div class="title-border">
            <h1>Contact <span>Information</span></h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-4">
        <div class="contact-info text-center">
          <div class="contact-image">
            <div class="contact-icon">
              <div class="icon-table-cell">
                <img class="primary-img" src="themes/img/icon/contact-1.png" alt="">
                <img class="secondary-img" src="themes/img/icon/contact-1-hover.png" alt="">
              </div>
            </div>
          </div>
          <div class="contact-text">
            <h4>Address</h4>
            <?php echo nl2br(STORE_ADDRESS); ?>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-4">
        <div class="contact-info text-center">
          <div class="contact-image">
            <div class="contact-icon">
              <div class="icon-table-cell">
                <img class="primary-img" src="themes/img/icon/contact-2.png" alt="">
                <img class="secondary-img" src="themes/img/icon/contact-2-hover.png" alt="">
              </div>
            </div>
          </div>
          <div class="contact-text">
            <h4>Phone</h4>
            <p>
              <?php echo STORE_PHONE; ?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-4">
        <div class="contact-info text-center">
          <div class="contact-image">
            <div class="contact-icon">
              <div class="icon-table-cell">
                <img class="primary-img" src="themes/img/icon/contact-3.png" alt="">
                <img class="secondary-img" src="themes/img/icon/contact-3-hover.png" alt="">
              </div>
            </div>
          </div>
          <div class="contact-text">
            <h4>Fax</h4>
            <p>(973) 377-5077<br>
              (001) 254-7359</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 hidden-sm">
        <div class="contact-info text-center">
          <div class="contact-image">
            <div class="contact-icon">
              <div class="icon-table-cell">
                <img class="primary-img" src="themes/img/icon/contact-4.png" alt="">
                <img class="secondary-img" src="themes/img/icon/contact-4-hover.png" alt="">
              </div>
            </div>
          </div>
          <div class="contact-text">
            <h4>Email</h4>
            <p>
              <a href="mailto:<?php echo STORE_OWNER_EMAIL_ADDRESS; ?>">
                <?php echo STORE_OWNER_EMAIL_ADDRESS; ?>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Contact Information Area-->
<!--Contact Form Start-->
<div class="">
  <div class="contact-us-form-wrapper">
    <div class="container">
      <div class="section-padding">
        <div class="row">
          <div class="col-md-6">
            <div class="section-title text-center">
              <div class="title-border">
                <h1>Contact <span>US</span></h1>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
            <form action="" method="post">
              <div class="row">
                <div class="col-md-6">
                  <input name="f_name" type="text" class="form-box" placeholder="First name">
                </div>
                <div class="col-md-6">
                  <input name="l_name" type="text" class="form-box" placeholder="Last name">
                </div>
                <div class="col-md-6">
                  <input name="email" type="email" class="form-box" placeholder="Email">
                </div>
                <div class="col-md-6">
                  <input name="number" type="text" class="form-box" placeholder="Phone number">
                </div>
                <div class="col-md-12">
                  <textarea name="message" class="yourmessage" placeholder="Your message"></textarea>
                  <input type="submit" value="Send Message" class="submit-button">
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-7">
            <div id="map" style="width: 100%px; height: 400px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End of Contact Form-->
<?php
  include('partnerBanner.php');
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKqUQ4QmbTWM_KNhkYg7erVxakz_0-noE&v=3.exp"></script>

<script type="text/javascript">
  var locations = [
    ['Bondi Beach', -33.890542, 151.274856, 4],
    ['Coogee Beach', -33.923036, 151.259052, 5],
    ['Cronulla Beach', -34.028249, 151.157507, 3],
    ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
    ['Maroubra Beach', -33.950198, 151.259302, 1]
  ];

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: new google.maps.LatLng(-33.92, 151.25),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var infowindow = new google.maps.InfoWindow();

  var marker, i;

  for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      map: map
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }
</script>