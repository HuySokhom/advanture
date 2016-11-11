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
<div class="contact-form">
  <!-- google-map-area start -->
  <div class="google-map-area">
    <!--  Map Section -->
    <div id="contacts" class="map-area">
      <div id="googleMap" style="width:100%;height:737px;filter: grayscale(100%)"></div>
    </div>
  </div>
  <!-- google-map-area end -->
  <div class="contact-us-form-wrapper">
    <div class="container">
      <div class="contact-us-form section-padding">
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
          <div class="col-md-6">
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
