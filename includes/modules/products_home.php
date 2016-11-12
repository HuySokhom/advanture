<?php
    $image_query = tep_db_query("
        select
            text,
            text2,
            text3,
            image
        from
            image_slider
        order by sort_order asc"
    );
    $num_image = tep_db_num_rows($image_query);
    $array_image = [];
    if($num_image > 0) {
        while ($images = tep_db_fetch_array($image_query)) {
            $array_image[] = $images;
        }
    }

    /**
     * Query our team
     * from table our_team
     */
    $our_team_query = tep_db_query("
        select
          name, photo, id
        from
          our_team
        where
          status = 1
        order by rand() limit 4"
    );
    $num_team = tep_db_num_rows($our_team_query);
    $array_our_team = [];
    if($num_team > 0) {
        while ($team = tep_db_fetch_array($our_team_query)) {
            $array_our_team[] = $team;
        }
    }


//query content page
    $query = tep_db_query("select * from page_description where pages_id = 2 and language_id = ". (int)$languages_id ." ");
    $content = tep_db_fetch_array($query);

 ?>
<!--Slider Area Start-->
<div class="slider-area">
    <div class="preview-2">
        <div id="nivoslider" class="slides">
            <?php
                foreach($array_image as $key => $value){
                    echo '<img src="images/'.$value['image'].'" title="#slider-'.$key.'"/>';
                }
            ?>
<!--            <a href="index.html#"><img src="themes/img/slider/slider-2.jpg" alt="" title="#slider-1-caption11"/></a>-->
        </div>
        <?php
        foreach($array_image as $key => $value){
            echo '
                <div id="slider-'.$key.'" class="nivo-html-caption nivo-caption">
                    <div class="banner-content slider-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-content">
                                        <h1 class="title1">'. $value['text'].'</h1>
                                        <h2 class="sub-title">'. $value['text2'].'</h2>
                                        <h2 class="sub-title">'. $value['text3'].'</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
        ?>
        <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
            <div class="banner-content slider-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content">
                                <h1 class="title1">TRAVEL STYLES</h1>
                                <h2 class="sub-title">The right tour for the</h2>
                                <h2 class="sub-title">right <span>traveller</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="slider-1-caption11" class="nivo-html-caption nivo-caption">
            <div class="banner-content slider-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content">
                                <h1 class="title1"></h1>
                                <h2 class="sub-title">The right tour for the</h2>
                                <h2 class="sub-title">right <span>traveller</span></h2>
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
                        <h1>
                            <?php echo $content['pages_title'];?>
                        </h1>
                    </div>
                    <p>
                        <?php echo $content['pages_content'];?>
                    </p>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>Best Trip <span>Today</span></h1>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="best-sell-slider carousel-style-one">
                        <div class="col-md-3">
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#">
                                        <img src="themes/img/sell/1.jpg" alt="">
                                        <span>Rail Trip</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#">
                                        <img src="themes/img/sell/2.jpg" alt="">
                                        <span>Brazil Trip</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#">
                                        <img src="themes/img/sell/3.jpg" alt="">
                                        <span>Egypt Trip</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="hover-effect">
                                <div class="box-hover">
                                    <a href="index.html#">
                                        <img src="themes/img/sell/4.jpg" alt="">
                                        <span>sailing Trip</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="index.html#" class="button-one pull-left">VIew All Trip</a>
            </div>
        </div>
    </div>
</div>
<!--End of Best Sell Area-->
<div style="margin-bottom: -70px;"></div>
<!--Team Area Start-->
<div class="team-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>Our <span>Team</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                foreach($array_our_team as $row){
                    echo '
                        <div class="col-md-3 col-sm-6">
                            <div class="single-member">
                                <div class="team-image">
                                    <a href="' . tep_href_link(FILENAME_INFORMATION, 'info_id=' . $row['id']) . '">
                                        <img src="images/'.$row['photo'].'" alt="' . $row['name'] .'">
                                    </a>
                                    <div class="member-text effect-bottom">
                                        <h4>
                                            <a href="'. tep_href_link(FILENAME_INFORMATION, 'info_id=' . $row['id']) .'">
                                                '.$row['name'].'
                                            </a>
                                        </h4>
                                        <div class="member-link">
                                            <a href=""><i class="fa fa-facebook"></i></a>
                                            <a href="index.html#"><i class="fa fa-twitter"></i></a>
                                            <a href="index.html#"><i class="fa fa-google-plus"></i></a>
                                            <a href="index.html#"><i class="fa fa-linkedin"></i></a>
                                            <a href="index.html#"><i class="fa fa-rss"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>
        <a href="our_team.php" class="button-one">VIew All Our Team</a>
    </div>
</div>
<!--End of Team Area-->
<div style="margin-bottom: -70px;"></div>
<?php
    include('partnerBanner.php');
?>