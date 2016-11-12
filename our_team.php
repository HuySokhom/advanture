<?php
    require('includes/application_top.php');
    require(DIR_WS_INCLUDES . 'template_top.php');

    /**************
    * query doctors
    ***************/
    $sql_query = tep_db_query("
        select
          *
        from
            our_team
        where
            status = 1
        order by rand()
    ");

    $num_row = tep_db_num_rows($sql_query);
    $array_obj = [];
    if($num_row > 0) {
        while ($query = tep_db_fetch_array($sql_query)) {
            $array_obj[] = $query;
        }
    }
?>
<div class="banner-area"></div>
<section class="section-padding">
    <div class="row">
        <div class="col-md-12">
            <div class="section-title text-center">
                <div class="title-border">
                    <h1>Our <span>Team</span></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="">
            <div class="all_doctor_item">
                <?php
                    foreach( $array_obj as $row){
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
        </div>
    </div>
</section>

<?php
    require(DIR_WS_INCLUDES . 'template_bottom.php');
    require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
