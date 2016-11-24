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

    /**
     * query for product just post with random
     */
    $other_product_query = tep_db_query("
        select
            pd.products_name,
            p.products_id,
            p.products_image_thumbnail,
            DATE_FORMAT(p.create_date, '%d/%m/%Y') as create_date
        from
            " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd
        where
            p.products_status = '1'
                and
            pd.products_id = p.products_id
                and
            pd.language_id = '" . (int)$languages_id . "'
        order by rand()
            limit 1
    ");
    $product_hot_info = tep_db_fetch_array($other_product_query);
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
                        <h4>Search <span>Trip</span></h4>
                        <?php
                        echo tep_draw_form(
                                'advanced_search',
                                tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false),
                                'get',
                                'id="text-search"') . tep_hide_session_id();
                        ?>
                        <input type="text" placeholder="Search Here ....." name="keywords">
                        <button class="submit" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="single-sidebar-widget">
                        <h4>Recent <span>Posts</span></h4>
                        <div class="single-widget-posts">
                              <div class="post-img">
                                  <a href="<?php echo tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product_hot_info['products_id']); ?>">
                                    <img src="images/<?php echo $product_hot_info['products_image_thumbnail']; ?>" style=" width: 80px;height: 80px;">
                                  </a>
                              </div>
                              <div class="posts-text">
                                  <h4>
                                      <a href="<?php echo tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product_hot_info['products_id']);?>">
                                          <?php
                                            echo $product_hot_info['products_name'];
                                          ?>
                                      </a>
                                  </h4>
                                  <p>
                                      <i class="fa fa-clock-o"></i>
                                      <?php
                                        echo $product_hot_info['create_date'];
                                      ?>
                                  </p>
                              </div>
                          </div>
                    </div>
                    <div class="leave-comment hidden-sm hidden-xs">
                        <h4 class="blog-title">Get In <span>Touch</span></h4>
                        <form id="contact-form" name="sendEmail">
                            <div class="comment-form">
                                <div class="">
                                        <div class="required">name</div>
                                        <input type="text" name="name" id="name" placeholder="name...">
                                        <div class="required">Email</div>
                                        <input type="email" id="email" name="email" placeholder="email...">
                                        <div class="required">Subject</div>
                                        <input type="text" name="subject" id="subject" placeholder="subject...">
                                        <div class="required">Description</div>
                                        <textarea name="message" id="message" placeholder="description..."></textarea>
                                </div>
                                <input type="submit" class="comment-btn" value="Submit Message">
                            </div>
                        </form>
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
                    <div class="pagination-content">
                        <div class="pagination-button">
                            <ul class="pagination">
                                <?php
                                echo $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS,
                                    tep_get_all_get_params(array('page', 'info', 'x', 'y'))
                                );
                                ?>
                            </ul>
                        </div>
                    </div>
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