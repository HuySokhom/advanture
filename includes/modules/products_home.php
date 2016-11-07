<!--Slider Area Start-->
<div class="slider-area">
    <div class="preview-2">
        <div id="nivoslider" class="slides">
            <a href="index.html#"><img src="themes/img/slider/slider-1.jpg" alt="" title="#slider-1-caption1"/></a>
            <a href="index.html#"><img src="themes/img/slider/slider-2.jpg" alt="" title="#slider-1-caption1"/></a>
        </div>
        <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
            <div class="banner-content slider-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content">
                                <h1 class="title1">TRAVEL STYLES</h1>
                                <h2 class="sub-title">The right tour for the</h2>
                                <h2 class="sub-title">right <span>traveller</span></h2>
                                <form action="index.html#" id="banner-searchbox" class="hidden-xs">
                                    <div class="adventure-cat">
                                        <select name="category" class="search-adventure">
                                            <option>Select Adventure</option>
                                            <option>Bungee jumping</option>
                                            <option>Bicycle touring</option>
                                            <option>Jungle tourism</option>
                                            <option>Shark tourism</option>
                                            <option>Mountain biking</option>
                                            <option>Mountaineering</option>
                                            <option>Rock Adventure</option>
                                        </select>
                                    </div>
                                    <div class="adventure-cat destination">
                                        <select name="destination" class="search-adventure">
                                            <option>Select Your Destination</option>
                                            <option>Madagascar</option>
                                            <option>Botswana</option>
                                            <option>Canada, Alaska</option>
                                            <option>Antarctica</option>
                                            <option>Swaziland</option>
                                            <option>Ethiopia</option>
                                            <option>Tanzania</option>
                                        </select>
                                    </div>
                                    <div class="adventure-cat floatright">
                                        <select name="date" class="search-adventure">
                                            <option>Select Date</option>
                                            <option>1-4-2016</option>
                                            <option>5-9-2016</option>
                                            <option>3-10-2016</option>
                                            <option>15-2-2017</option>
                                            <option>22-7-2017</option>
                                            <option>10-8-2017</option>
                                            <option>7-11-2017</option>
                                            <option>9-12-2017</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button type="submit" id="btn-search-category">SEARCH</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /*
    $candidate_query = tep_db_query("
        select
            customers_id,
            user_name,
            photo_thumbnail,
            skill_title
        from
            customers
        where
            status = 1
        and
            user_type = 'normal'
        order by rand()
            limit 12"
    );
    $num_candidate = tep_db_num_rows($candidate_query);
    $array_candidate = array();
    if($num_candidate > 0) {
        while ($candidates = tep_db_fetch_array($candidate_query)) {
            $array_candidate[] = $candidates;
        }
    }

    // query featured company
    $feature_query = tep_db_query("
        select
            customers_id,
            photo_thumbnail
        from
            customers
        where
            status = 1
                and
            user_type = 'agency'
                and
            is_agency = 1
                and
            status_approve = 1
        order by rand()
    ");
    $num_featured = tep_db_num_rows($feature_query);
    $array_featured_company = [];
    if($num_featured > 0) {
        while ($featured = tep_db_fetch_array($feature_query)) {
            $array_featured_company[] = $featured;
        }
    }

    // query job
    $new_products_query = tep_db_query("
      select
        p.products_id,
        p.create_date,
        pd.products_name,
        DATE_FORMAT(p.products_close_date, '%d/%m/%Y') as products_close_date,
        cu.photo_thumbnail,
        cu.company_name,
        l.name as location
      from
        " . TABLE_PRODUCTS . " p,
        customers cu,
        location l,
        " . TABLE_PRODUCTS_DESCRIPTION . " pd
      where
        p.products_status = 1
            and
        l.id = p.province_id
            and
        p.products_id = pd.products_id
            and
        cu.customers_id = p.customers_id
            and
        pd.language_id = '" . (int)$languages_id . "'
            order by
        p.products_promote desc, rand(), p.products_close_date desc
        limit " . MAX_DISPLAY_NEW_PRODUCTS
    );
    $num_new_products = tep_db_num_rows($new_products_query);
    $product_array = array();
    if ($num_new_products > 0) {
        while ($new_products = tep_db_fetch_array($new_products_query)) {
            $product_array[] = $new_products;
        }
    }
?>
<div class="filter">
    <h2>Search for a Job</h2>
        <div class="row">
            <?php include(DIR_FS_CATALOG . 'advanced_search_box.php');?>
        </div><!-- /.row -->
        <ul class="filter-list">
            <?php echo tep_get_categories_list();?>
        </ul>
        <hr>
        <div class="filter-actions">
            <a href="job_seekers.php">All Candidates</a> <span class="filter-separator">/</span>
            <a href="positions.php">All Jobs</a> <span class="filter-separator">/</span>
            <a href="employers.php">All Companies</a>
        </div><!-- /.filter -->
    </div>
<!-- /.filter -->
<div class="col-md-9">
    <div class="row">
        <div class="col-md-12">
            <div class="features-company">
                <div class="">
                    <h4>
                        FEATURED RECRUITERS
                    </h4>
                </div>
                <div class="features-img">
                    <div class="row space m0">
                    <?php
                        foreach($array_featured_company as $feature) {
                            echo '<div class="col-xs-2 pr3 pl3 mb3">
                            <div class="img-table">
                                <div class="img-wrapper">
                                    <a href="'. tep_href_link(FILENAME_INFORMATION, 'info_id=' . $feature['customers_id'] ) .'">
                                        <img src="'. $feature['photo_thumbnail'] .'">
                                    </a>
                                </div>
                            </div>
                        </div>';
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h2 class="page-header">Recent Job Offers</h2>

            <div class="positions-list">
                <!-- position-list-item -->
                <?php
                    foreach ($product_array as $product) {
                        echo '
                            <div class="positions-list-item">
                                <h2>
                                    <a href="'. tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product['products_id']) .'">
                                        '. $product['products_name'] .'
                                    </a>
                                    <span>Featured</span>
                                </h2>
                                <h3>
                                    <span>
                                        <img src="'. $product['photo_thumbnail'] .'" alt="">
                                    </span>
                                    '. $product['company_name'] .', '. $product['location'] .'
                                    <br>
                                </h3>
                                <div class="position-list-item-date">
                                    '. $product['products_close_date'] .'
                                </div>
                                <!-- /.position-list-item-date -->
                                <div
                                    class="position-list-item-action heart-icon"
                                    data-product="'. $product['products_id']. '"
                                    data-type="insert"
                                >
                                    <a href="javascript:void(0)">Save Position</a>
                                </div>
                                <!-- /.position-list-item-action -->
                            </div>
                        ';
                    }
                ?>
                <!-- /.position-list-item -->
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="">
        <img src="assets/img/advertising.jpg" class="img-responsive">
    </div>
    <h4>Find Your Best Candidate</h4>
    <div class="row mt-60">
        <div class="candidate-boxes">
            <?php
                foreach($array_candidate as $candidate) {
                    echo '
                        <div class="col-sm-3 col-md-6 col-xs-3">
                            <div class="candidate-box">
                                <div class="candidate-box-image">
                                    <a href="' . tep_href_link(FILENAME_INFORMATION, 'info_id=' . $candidate['customers_id']) . '">
                                        <img
                                            src="' . $candidate['photo_thumbnail'] . '"
                                            alt="' . $candidate['user_name'] . '"
                                            class="img-responsive"
                                            style="height: 70px;"
                                        />
                                    </a>
                                </div>
                                <!-- /.candidate-box-image -->

                                <div class="candidate-box-content">
                                    <h2>' . $candidate['user_name'] . '</h2>
                                    <h3>' . $candidate['skill_title'] . '</h3>
                                </div><!-- /.candidate-box-content -->
                            </div><!-- /.candidate-box -->
                        </div><!-- /.col-* -->
                    ';
                }
            ?>
        </div>
        <!-- /.candidate-boxes -->
    </div>
<!-- /.row -->
</div>
 <?php */ ?>

<!--Best Sell Area Start-->
<div class="best-sell-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>Best <span>Selling Trips</span></h1>
                    </div>
                    <p>Not sure what you’re looking for and need a little inspiration? We can help. Check out our handpicked <br>lists of topical trips you can take right now.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="sell-text-container">
                    <div class="title-container">
                        <h3>WILDLIFE</h3>
                        <div class="best-sell-link">
                            <a href="index.html#"><i class="fa fa-facebook"></i></a>
                            <a href="index.html#"><i class="fa fa-twitter"></i></a>
                            <a href="index.html#"><i class="fa fa-google-plus"></i></a>
                            <a href="index.html#"><i class="fa fa-linkedin"></i></a>
                            <a href="index.html#"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                    <P>Get closer to nature. From the jungles of India to the African bush, our small group tours take you to the heart of nature. From elephants silhouetted against an Africa sunset to orangutans swinging in the treetops.....</P>
                    <a href="index.html#" class="button-one">VIew trip</a>
                </div>
                <div class="row">
                    <div class="best-sell-slider carousel-style-one">
                        <div class="col-md-3">
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#">
                                        <img src="img/sell/1.jpg" alt="">
                                        <span>Rail Trip</span>
                                    </a>
                                </div>
                            </div>
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#" class="no-margin">
                                        <img src="img/sell/3.jpg" alt="">
                                        <span>Egypt Trip</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#">
                                        <img src="img/sell/2.jpg" alt="">
                                        <span>Brazil Trip</span>
                                    </a>
                                </div>
                            </div>
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#" class="no-margin">
                                        <img src="img/sell/4.jpg" alt="">
                                        <span>Sailing Trip</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#">
                                        <img src="img/sell/3.jpg" alt="">
                                        <span>Egypt Trip</span>
                                    </a>
                                </div>
                            </div>
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#" class="no-margin">
                                        <img src="img/sell/1.jpg" alt="">
                                        <span>Rail Trip</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#">
                                        <img src="img/sell/4.jpg" alt="">
                                        <span>sailing Trip</span>
                                    </a>
                                </div>
                            </div>
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#" class="no-margin">
                                        <img src="img/sell/2.jpg" alt="">
                                        <span>Brazil Trip</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 hidden-sm">
                <img src="img/sell/5.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<!--End of Best Sell Area-->

<!--Team Area Start-->
<div class="team-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>Our <span>Team</span></h1>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dolor turpis, pulvinar varius dui<br> id, convallis iaculis eros. Praesent porta lacinia elementum.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="single-member">
                    <div class="team-image">
                        <a href="index.html#"><img src="img/team/1.jpg" alt=""></a>
                        <div class="member-text effect-bottom">
                            <h4><a href="index.html#">Maria B. | <span>Hiking Guide</span></a></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard text ever</p>
                            <div class="member-link">
                                <a href="index.html#"><i class="fa fa-facebook"></i></a>
                                <a href="index.html#"><i class="fa fa-twitter"></i></a>
                                <a href="index.html#"><i class="fa fa-google-plus"></i></a>
                                <a href="index.html#"><i class="fa fa-linkedin"></i></a>
                                <a href="index.html#"><i class="fa fa-rss"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-member">
                    <div class="team-image">
                        <a href="index.html#"><img src="img/team/2.jpg" alt=""></a>
                        <div class="member-text effect-bottom">
                            <h4><a href="index.html#">Janifer Craving | <span>Photographer</span></a></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard text ever</p>
                            <div class="member-link">
                                <a href="index.html#"><i class="fa fa-facebook"></i></a>
                                <a href="index.html#"><i class="fa fa-twitter"></i></a>
                                <a href="index.html#"><i class="fa fa-google-plus"></i></a>
                                <a href="index.html#"><i class="fa fa-linkedin"></i></a>
                                <a href="index.html#"><i class="fa fa-rss"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 hidden-sm">
                <div class="single-member">
                    <div class="team-image">
                        <a href="index.html#"><img src="img/team/3.jpg" alt=""></a>
                        <div class="member-text effect-bottom">
                            <h4><a href="index.html#">Matt Jason | <span>Guide</span></a></h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's dummy text ever</p>
                            <div class="member-link">
                                <a href="index.html#"><i class="fa fa-facebook"></i></a>
                                <a href="index.html#"><i class="fa fa-twitter"></i></a>
                                <a href="index.html#"><i class="fa fa-google-plus"></i></a>
                                <a href="index.html#"><i class="fa fa-linkedin"></i></a>
                                <a href="index.html#"><i class="fa fa-rss"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Team Area-->
<!--Partner Area Start-->
<div class="partner-area section-bottom-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>Our <span>Partners</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="partner-carousel carousel-style-two">
                <div class="col-md-3">
                    <a href="index.html#"><img src="img/brand/1.jpg" alt=""></a>
                </div>
                <div class="col-md-3">
                    <a href="index.html#"><img src="img/brand/2.jpg" alt=""></a>
                </div>
                <div class="col-md-3">
                    <a href="index.html#"><img src="img/brand/3.jpg" alt=""></a>
                </div>
                <div class="col-md-3">
                    <a href="index.html#"><img src="img/brand/4.jpg" alt=""></a>
                </div>
                <div class="col-md-3">
                    <a href="index.html#"><img src="img/brand/1.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Partner Area-->