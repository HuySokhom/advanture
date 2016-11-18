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

    /**
     * start query for products
     *
     */
    $listing_product_sql = tep_db_query("
          select
              pd.products_name,
              p.products_id,
              p.products_image_thumbnail
          from
              products_description pd, products p
          where
              p.products_status = 1
                  and
              pd.products_id = p.products_id
                  and
              pd.language_id = " . (int)$languages_id . "
          ORDER BY RAND() LIMIT 4
    ");
    $num_product = tep_db_num_rows($listing_product_sql);
    $array_products = [];
    if($num_product > 0) {
        while ($p = tep_db_fetch_array($listing_product_sql)) {
            $array_products[] = $p;
        }
    }
    /**
     * end query products
     */

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
                        <?php
                            foreach($array_products as $pro){
                                echo '
                                    <div class="col-md-3">
                                        <div class="hover-effect">
                                            <div class="box-hover">
                                                <a href="'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $pro['products_id']).'">
                                                    <img src="images/'.$pro['products_image_thumbnail'].'" alt="">
                                                    <span>'.$pro['products_name'].'</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        ?>
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