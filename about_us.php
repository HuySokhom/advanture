<?php
    require('includes/application_top.php');
    require(DIR_WS_INCLUDES . 'template_top.php');
    $query = tep_db_query("select * from content_description where content_id = 1 and language_id = ". (int)$languages_id ." ");
    $content = tep_db_fetch_array($query);
?>
<div class="banner-area"></div>
<div class="skills-area section-bottom-padding hidden-xs section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-border">
                        <h1>
                            <?php echo $content['title']; ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <p style="text-align: justify;">
                    <?php echo $content['content']?>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
