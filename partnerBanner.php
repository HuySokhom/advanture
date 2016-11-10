<?php
$banner_query = tep_db_query("
    select
      *
    from
        banner_partner
    where
        status = 1
");
$banners = [];
while($banner_info = tep_db_fetch_array($banner_query)){
    $banners[] = $banner_info;
}
?>

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
                <?php
                    foreach($banners as $b){
                        echo '
                            <div class="col-md-3">
                                <a href="http://'.$b['link'].'"><img src="images/'. $b['image'] .'" alt=""></a>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!--End of Partner Area-->