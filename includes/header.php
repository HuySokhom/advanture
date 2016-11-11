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
          <div class="header-top-right">
            <div class="login">
              <a href="create_account.php"><i class="fa fa-pencil-square-o"></i>Register</a>
            </div>
            <div class="account">
              <a href="login.php"><i class="fa fa-lock"></i>sign In</a>
            </div>
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
              <div class="col-md-3 col-sm-12">
                <div class="logo">
                  <a href="#">
                    <img src="themes/img/logo/logo.png" alt="ADVENTURES">
                  </a>
                </div>
              </div>
              <div class="col-md-9 hidden-sm hidden-xs">
                <div class="mainmenu">
                  <nav>
                    <ul id="nav">
                      <li class="drop-down">
                        <a href="#">HOME</a>
                      </li>
                      <?php
                        echo tep_get_categories_list();
                      ?>
<!--                      <li>-->
<!--                        <a href="shop-grid-no-sidebar.html">Destination</a>-->
<!--                        <div class="megamenu">-->
<!--                          <div class="megamenu-list clearfix">-->
<!--                            <span class="border-hover">-->
<!--                                <a href="index.html#" class="mega-image">-->
<!--                                  <img src="themes/img/mega-b-4.jpg" alt="">-->
<!--                                </a>-->
<!--                            </span>-->
<!--                            <span>-->
<!--                                <a href="index.html#" class="mega-title">Edgeworks Climbing</a>-->
<!--                                <a href="index.html#">Indoor climbing</a>-->
<!--                                <a href="index.html#">Rock climbing</a>-->
<!--                                <a href="index.html#">Climbing competition</a>-->
<!--                                <a href="index.html#">Top rope climbing</a>-->
<!--                                <a href="index.html#">Traditional climbing</a>-->
<!--                                <a href="index.html#">Free solo climbing</a>-->
<!--                            </span>-->
<!--                            <span>-->
<!--                                <a href="index.html#" class="mega-title">Academic Mountain</a>-->
<!--                                <a href="index.html#">Fold and thrust belt</a>-->
<!--                                <a href="index.html#">Fault-block mountain</a>-->
<!--                                <a href="index.html#">Mountain ranges</a>-->
<!--                                <a href="index.html#">Sedimentary</a>-->
<!--                                <a href="index.html#">Subaqueous volcano</a>-->
<!--                                <a href="index.html#">Complex volcano</a>-->
<!--                            </span>-->
<!--                            <span>-->
<!--                                <a href="index.html#" class="mega-title">Adventure Camping</a>-->
<!--                                <a href="index.html#">Bicycle Camping</a>-->
<!--                                <a href="index.html#">Canoe Camping</a>-->
<!--                                <a href="index.html#">Reenact camping</a>-->
<!--                                <a href="index.html#">Winter camping</a>-->
<!--                                <a href="index.html#">Dry camping</a>-->
<!--                                <a href="index.html#">Backpacking</a>-->
<!--                            </span>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </li>-->
<!--                      <li><a href="shop-grid-no-sidebar.html">Travel</a></li>-->
<!--                      <li class="drop-down">-->
<!---->
<!--                        <a href="shop-grid-no-sidebar.html">Pages </a>-->
<!--                        <ul class="sub-menu">-->
<!--                          --><?php
//                            echo tep_get_categories_list();
//                          ?>
<!--                        </ul>-->
<!---->
<!--                      </li>-->
<!--                      <li class="drop-down"><a href="blog-1.html">BLOG</a>-->
<!--                        <ul class="sub-menu">-->
<!--                          <li><a href="index.html#" class="mega-title">Blog Pages</a></li>-->
<!--                          <li><a href="blog-2.html">Blog Page 2</a></li>-->
<!--                          <li><a href="blog-details.html">Blog Details Page</a></li>-->
<!--                        </ul>-->
<!--                      </li>-->
                      <li><a href="contact_us.php">Contact Us</a></li>
                      <li><a href="about_us.php">About Us</a></li>
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
                <li>
                  <a href="#">HOME</a>
                </li>
                <li><a href="index.html#">Shop</a>
                  <ul>
                    <li><a href="shop-grid-no-sidebar.html">Shop No Sidebar</a></li>
                    <li><a href="shop-grid-with-sidebar.html">Shop with Sidebar</a></li>
                    <li><a href="shop-list.html">Shop List</a></li>
                    <li><a href="product-details.html">Product Details 1</a></li>
                    <li><a href="product-details-2.html">Product Details 2</a></li>
                  </ul>
                </li>
                <li><a href="blog-1.html">Blog</a>
                  <ul>
                    <li><a href="blog-2.html">Blog Page 2</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                  </ul>
                </li>
                <li><a href="about.html">ABOUT</a>
                <li><a href="index.html#">PAGES</a>
                  <ul>
                    <li><a href="signin.html">Sign in</a></li>
                    <li><a href="404.html">404 error</a></li>
                  </ul>
                </li>
                <li>
                  <a href="contact_us.php">CONTACT</a>
                </li>
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

