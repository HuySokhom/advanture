<?php
	require('includes/application_top.php');
	if (!isset($HTTP_GET_VARS['products_id'])) {
		tep_redirect(tep_href_link(FILENAME_DEFAULT));
	}
	require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRODUCT_INFO);
	$product_info_query = tep_db_query("
		select
              pd.products_name,
              pd.products_description,
              pd.products_viewed,
              p.products_id,
              p.products_price,
              p.day,
              p.person,
              p.products_image,
              DATE_FORMAT(p.create_date, '%d/%m/%Y') as create_date,
              p.create_by
          from
              products_description pd, products p
          where
              p.products_status = 1
				and
			  p.products_id = '".(int)$_GET['products_id'] ."'
			  	and
              pd.products_id = p.products_id
			  	and
              pd.language_id = " . (int)$languages_id . "
          LIMIT 1
	");
	$product_info = tep_db_fetch_array($product_info_query);

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
			p.products_id != '".(int)$_GET['products_id'] ."'
				and
			pd.products_id = p.products_id
				and
			pd.language_id = '" . (int)$languages_id . "'
		order by rand()
			limit 4
	");
	$array_other = [];
	while( $product_hot_info = tep_db_fetch_array($other_product_query) ){
		$array_other[] = $product_hot_info;
	}

	require(DIR_WS_INCLUDES . 'template_top.php');
?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-584634cfb1404f0a"></script>
<?php
  if (tep_db_num_rows($product_info_query) < 1) {
?>
	<div class="banner-area"></div>
	<div class="container">
		<br/>
		<div class="alert alert-warning"><?php echo TEXT_PRODUCT_NOT_FOUND; ?></div>
		<a class="button-one" href="index.php">
			<i class="fa fa-forward"></i>
			Continue
		</a>
	</div>
<?php
  } else {
    tep_db_query("
        UPDATE
            " . TABLE_PRODUCTS_DESCRIPTION . "
        SET
            products_viewed = products_viewed+1
        WHERE
            products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'
    ");

?>
	  <div class="banner-area"
	  	style="
	  		background: rgba(0, 0, 0, 0)
				url('images/<?php echo $product_info['products_image'];?>')
				no-repeat scroll center top / cover;
		">
	  </div>
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
								  <input type="text" placeholder="Search Here ....." required name="keywords">
								  <button class="submit" type="submit"><i class="fa fa-search"></i></button>
							  </form>
						  </div>
						  <div class="single-sidebar-widget">
							  <h4>Recent <span>Posts</span></h4>
							  <?php
							  	foreach($array_other as $row){
									echo '
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
									';
								}
							  ?>
						  </div>
					  </div>
				  </div>
				  <div class="col-md-9">
					  <div class="single-blog-post blog-post-details">
						  <div class="single-blog-post-img">
							  <img src="images/<?php echo $product_info['products_image'];?>" alt="<?php echo $product_info['products_name'];?>" width="100%">
							  <div class="date-time">
								  <span class="date">
									  <?php echo $currencies->display_price($product_info['products_price'], 0);?>
								  </span>
								  <span class="month">,
									  <?php echo $product_info['person']?> Person
								  </span>
								  <span class="month">
									  <?php echo $product_info['day']?> Days
								  </span>
							  </div>
						  </div>
						  <div class="single-blog-post-text">
							  <h4>
								  <?php echo $product_info['products_name'];?>
							  </h4>
							  <div class="author-comments">
								  <span><i class="fa fa-user"></i><?php echo $product_info['create_by'];?></span>
								  <span><i class="fa fa-calendar"></i><?php echo $product_info['create_date'];?></span>
							  </div>
                              <!-- Go to www.addthis.com/dashboard to customize your tools -->
                              <div class="addthis_inline_share_toolbox"></div>
							  <?php echo $product_info['products_description'];?>
						  </div>
					  </div>
					  <div class="leave-comment">
						  <h4 class="blog-title">Get In <span>Touch</span></h4>
						  <form action="" method="post" id="contact-form" name="sendEmail">
							  <div class="comment-form">
								  <div class="row">
									  <div class="col-md-5">
										  <div class="required">
											  Name
										  </div>
										  <input type="text" name="name" id="name" placeholder="name">
										  <div class="required">Email</div>
										  <input type="email" name="email" id="email" placeholder="email">
										  <div>Subject</div>
										  <input type="text" name="subject" id="subject" placeholder="subject">
									  </div>
									  <div class="col-md-7">
										  <label>Message</label>
										  <textarea rows="12" name="message" id="message" placeholder="message"></textarea>
									  </div>
								  </div>
								  <input type="submit" class="comment-btn" value="Submit Message">
							  </div>
						  </form>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>
	  <!--End of Blog Post Area -->
<?php
  	}
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>