<?php
  $listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_SEARCH_RESULTS, 'p.products_id');
?>

<?php
  if ($messageStack->size('product_action') > 0) {
    echo $messageStack->output('product_action');
  }
?>
<?php
  $row = $listing_split->number_of_rows;
  if ($row > 0) {
      $listing_query = tep_db_query($listing_split->sql_query);
      $prod_list_contents = array();
      while ($listing = tep_db_fetch_array($listing_query)) {
          $prod_list_contents[] = $listing;
      }
  }
?>
<?php
    if($categories_info['categories_image']){
        $img = 'images/'.$categories_info['categories_image'] ;
        echo "<div
            class='banner-area'
            style='
	  		    background: rgba(0, 0, 0, 0)
				url(". $img .")
				no-repeat scroll center top / cover;'
            ></div>";
    }else{
        echo '<div class="banner-area"></div>';
    }
?>
<!--Blog Post Area Start-->
<div class="blog-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar-widget">
                    <div class="single-sidebar-widget">
                        <h4>Search <span>Blog</span></h4>
                        <form id="text-search" action="blog-details.html#">
                            <input type="text" placeholder="Search Here .....">
                            <button class="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="single-sidebar-widget">
                        <h4>Recent <span>Posts</span></h4>

                                <div class="single-widget-posts">
                                      <div class="post-img">
                                          <a href="'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $row['products_id']).'">
                                            <img src="images/'.$row['products_image_thumbnail'].'" style=" width: 80px;height: 80px;">
                                          </a>
                                      </div>
                                      <div class="posts-text">
                                          <h4>
                                              <a href="'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $row['products_id']).'">
                                                '.$row['products_name'].'
                                              </a>
                                          </h4>
                                          <p><i class="fa fa-clock-o"></i> '.$row['create_date'].'</p>
                                      </div>
                                  </div>

                    </div>
                    <div class="single-sidebar-widget">
                        <h4>Blog <span>Archives</span></h4>
                        <div class="blog-archive">
                            <select class="archive" name="archive">
                                <option>Select Month</option>
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>
                        </div>
                    </div>
                    <div class="single-sidebar-widget icon-bottom tooltip-icons">
                        <h4>Blog <span>Tags</span></h4>
                        <div class="widget-icon">
                            <span><a href="blog-details.html#" data-toggle="tooltip" title="Tents"><img alt="" src="img/icon/25.png"></a></span>
                            <span><a href="blog-details.html#" data-toggle="tooltip" title="Hiking"><img alt="" src="img/icon/26.png"></a></span>
                            <span><a href="blog-details.html#" data-toggle="tooltip" title="Cycling"><img alt="" src="img/icon/27.png"></a></span>
                            <span><a href="blog-details.html#" data-toggle="tooltip" title="Beach"><img alt="" src="img/icon/28.png"></a></span>
                            <span class="no-margin"><a href="blog-details.html#" data-toggle="tooltip" title="Ship Tour"><img alt="" src="img/icon/29.png"></a></span>
                            <span class="no-margin"><a href="blog-details.html#" data-toggle="tooltip" title="Boat Tour"><img alt="" src="img/icon/30.png"></a></span>
                            <span class="no-margin"><a href="blog-details.html#" data-toggle="tooltip" title="Water Games"><img alt="" src="img/icon/31.png"></a></span>
                            <span class="no-margin"><a href="blog-details.html#" data-toggle="tooltip" title="Jungle"><img alt="" src="img/icon/32.png"></a></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="single-sidebar-widget widget-gallery">
                        <h4>Photo <span>Gallery</span></h4>
                        <div class="row">
                            <div class="col-md-4 col-sm-2 col-xs-4">
                                <a href="blog-details.html#"><img src="img/blog/6.jpg" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-2 col-xs-4">
                                <a href="blog-details.html#"><img src="img/blog/7.jpg" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-2 col-xs-4">
                                <a href="blog-details.html#"><img src="img/blog/8.jpg" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-2 col-xs-4">
                                <a href="blog-details.html#"><img src="img/blog/9.jpg" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-2 col-xs-4">
                                <a href="blog-details.html#"><img src="img/blog/10.jpg" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-2 col-xs-4">
                                <a href="blog-details.html#"><img src="img/blog/11.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <?php
                if($row > 0) {
                    foreach ($prod_list_contents as $product) {
                        echo '
                            <div class="single-blog-post">
                                <div class="single-blog-post-img">
                                    <a href="'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product['products_id']).'">
                                        <img src="images/'.$product['products_image'].'" alt="'.$product['products_name'] .'" width="100%">
                                    </a>
                                    <div class="date-time">
                                        <span class="date">
                                           '. $currencies->display_price($product['products_price'], 0) .'
                                        </span>
                                        <span class="month">,
                                            '. $product['person'] .' Person
                                        </span>
                                        <span class="month">
                                            '. $product['day'] .' Days
                                        </span>
                                    </div>
                                </div>
                                <div class="single-blog-post-text">
                                    <h4>
                                        <a href="'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product['products_id']).'">
                                            '.$product['products_name'].'
                                        </a>
                                    </h4>
                                    <div class="author-comments">
                                        <span><i class="fa fa-user"></i>'.$product['create_by'].'</span>
                                        <span><i class="fa fa-calendar"></i>'.$product['create_date'].'</span>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
                <ul class="pagination">
                    <?php
                    echo $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS,
                        tep_get_all_get_params(array('page', 'info', 'x', 'y'))
                    );
                    ?>
                </ul>
                <?php
                }else{
                ?>
                    <div class="alert alert-info"><?php echo TEXT_NO_PRODUCTS; ?></div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!--End of Blog Post Area -->