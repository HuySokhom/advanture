<header>
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-7 hidden-xs">
          <div class="currency-language">
            <div class="currency-menu">
              <i class="fa fa-envelope"></i>
              Email:
              <a href="mailto:<?php echo STORE_OWNER_EMAIL_ADDRESS; ?>">
                <?php echo STORE_OWNER_EMAIL_ADDRESS; ?>
              </a>
            </div>
            <div class="language-menu">
              <i class="fa fa-phone"></i>
              Phone:
              <a href="tel:<?php echo STORE_PHONE; ?>">
                <?php echo STORE_PHONE; ?>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-5 col-xs-12">
          <div class="header-top-right" style="float: right;">
            <div class="fb-like"
                 data-href="https://facebook.com/camidexplorer/"
                 data-layout="button_count"
                 data-action="like"
                 data-size="small"
                 data-show-faces="true"
                 data-share="true"></div>
<!--            <div class="login">-->
<!--              <a href="create_account.php"><i class="fa fa-pencil-square-o"></i>Register</a>-->
<!--            </div>-->
<!--            <div class="account">-->
<!--              <a href="login.php"><i class="fa fa-lock"></i>sign In</a>-->
<!--            </div>-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Logo Mainmenu Start-->
  <div class="header-logo-menu">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="logo-menu-bg">
            <div class="row">
              <div class="col-md-2 col-sm-12 hidden-sm hidden-xs">
                <div class="logo">
                  <a href="#">
                    <img src="images/logo.png" alt="<?php echo STORE_NAME; ?>" style="margin-top: -51px;width: 115px;position: absolute;">
                  </a>
                </div>
              </div>
              <div class="col-md-10 hidden-sm hidden-xs">
                <div class="mainmenu">
                  <nav>
                    <ul id="nav">
                      <li class="drop-down">
                        <a href="#">HOME</a>
                      </li>
                      <?php
                        echo tep_get_categories_list();
                      ?>
                      <li><a href="contact_us.php">Contact Us</a></li>
                      <li><a href="<?php echo tep_href_link(FILENAME_PAGES, 'pages_id=1'); ?>">About Us</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End of Logo Mainmenu-->
  <!-- Mobile Menu Area start -->
  <div class="mobile-menu-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="mobile-menu">
            <nav id="dropdown">
              <ul>
                <li class="drop-down">
                  <a href="#">HOME</a>
                </li>
                <?php
                echo tep_get_categories_list();
                ?>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="<?php echo tep_href_link(FILENAME_PAGES, 'pages_id=1'); ?>">About Us</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Mobile Menu Area end -->
</header>
<!--End of Header Area-->

