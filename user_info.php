<?php
require('includes/application_top.php');
require(DIR_WS_INCLUDES . 'template_top.php');
/**
 * query user information with filter by ID (int)$_GET['info_id']
 **/
$query = tep_db_query("
        SELECT
          *
        FROM
            our_team
        WHERE
            id = ". (int)$_GET['info_id'] . "
                and
            status = 1
        LIMIT 1
    ");
$num_record = tep_db_num_rows($query);
$doctor_info = [];
if($num_record > 0) {
    while ($info = tep_db_fetch_array($query)) {
        $doctor_info = $info;
    }
}

?>
<div class="banner-area"></div>
<!-- START DOCTOR DETAILS AREA -->
<section class="doctor_info section-padding">
    <div class="container">
        <div class="row">
            <?php
            if(count($doctor_info) > 0){

                ?>
                <div class="col-xs-12 col-sm-9 col-md-9 pull-right pl_60">
                    <div class="dtinfo">
                        <h3>
                            <?php
                            echo $doctor_info['name'];
                            ?>
                        </h3>
                        <ul class="dt_list">
                            <li>
                                <span class="dt_infoHeading"><?php echo Address;?></span>
                                <div class="dt_child">
                                    <?php
                                        echo $doctor_info['address'];
                                    ?>
                                </div>
                            </li>
                            <li>
                                <span class="dt_infoHeading"><?php echo Phone;?></span>
                                <div class="dt_child">
                                    <?php
                                        echo $doctor_info['telephone'];
                                    ?>
                                </div>
                            </li>
                            <li>
                                <span class="dt_infoHeading"><?php echo Email;?></span>
                                <div class="dt_child">
                                    <?php
                                        echo $doctor_info['email'];
                                    ?>
                                </div>
                            </li>
                            <li>
                                <span class="dt_infoHeading">Summary</span>
                                <div class="dt_child">
                                    <?php
                                    echo $doctor_info['summary'];
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="section-padding col-sm-8 row">
                        <h3>
                            <i class="fa fa-envelope-o"></i>
                            Get In Touch
                        </h3>
                        <br/>
                        <form class="contact-form-transparent mb-80 mb-sm-60" id="contact-form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text"
                                               class="form-box"
                                               required=""
                                               name="contact_name"
                                               id="contact_name"
                                               placeholder="<?php echo ENTRY_NAME;?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email"
                                               required=""
                                               class="form-box"
                                               name="contact_email"
                                               id="contact_email"
                                               placeholder="<?php echo Email;?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text"
                                               required=""
                                               class="form-box"
                                               name="contact_subject"
                                               id="contact_subject"
                                               placeholder="<?php echo EnterSubject;?>"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <textarea class="yourmessage"
                                      required=""
                                      name="contact_message"
                                      id="contact_message"
                                      placeholder="<?php echo Message;?>"
                                      rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                        class="submit-button"
                                        data-loading-text="Please wait...">
                                    <i class="fa fa-send-o"></i>
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 sidebar pull-left">
                    <div class="doc_leftsidebar">
                        <figure class="doctor_photo">
                            <img alt="" src="images/<?php
                            echo $doctor_info['photo'];
                            ?>">
                        </figure>
                    </div>
                </div>
                <?php
            }else {
                ?>
                <div class="alert alert-warning">
                    <h4>Not Found</h4>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- END DOCTOR DETAILS AREA -->

<?php
require(DIR_WS_INCLUDES . 'template_bottom.php');
require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
