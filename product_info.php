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
	 *
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
							  <h4>Search <span>Blog</span></h4>
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
							  <?php echo $product_info['products_description'];?>
						  </div>
						  <div class="blog-button-links">
							  <div class="blog-links">
								  <a href="blog-details.html#"><i class="fa fa-facebook"></i></a>
								  <a href="blog-details.html#"><i class="fa fa-twitter"></i></a>
								  <a href="blog-details.html#"><i class="fa fa-google-plus"></i></a>
								  <a href="blog-details.html#"><i class="fa fa-linkedin"></i></a>
								  <a href="blog-details.html#"><i class="fa fa-rss"></i></a>
							  </div>
						  </div>
					  </div>
					  <div class="leave-comment">
						  <h4 class="blog-title">Get In <span>Touch</span></h4>
						  <form action="" method="post" id="comment" name="sendEmail">
							  <div class="comment-form">
								  <div class="row">
									  <div class="col-md-5">
										  <label class="required">name</label>
										  <input type="text" name="name" value="">
										  <label class="required">Email</label>
										  <input type="email" name="email" value="">
										  <label>Subject</label>
										  <input type="text" name="subject" value="">
									  </div>
									  <div class="col-md-7">
										  <label>Description</label>
										  <textarea rows="12" name="enquiry"></textarea>
									  </div>
								  </div>
								  <input type="submit" class="comment-btn" value="Submit comment">
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
<script>

	$(function() {
		$('form[name="sendEmail"]').submit(function (e) {
			var form = {
				name: $('#name').val(),
				email: $('#email').val(),
				enquiry: $('#text').val()
			};
			e.preventDefault();
			console.log(form);
			$.ajax({
				type: 'POST',
				url: 'api/SendMail',
				data: form,
				success: function (response) {
					console.log(response);
					if (response == 0) {
						// ============================ Not here, this would be too late
						span.text('email does not exist');
					}
				}
			});
		});
	});

</script>