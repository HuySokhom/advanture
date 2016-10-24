<?php
    require('includes/application_top.php');
    require(DIR_WS_INCLUDES . 'template_top.php');
?>
<br>
<div class="container" data-ng-controller="job_seeker_ctrl">
    <div class="col-md-3 col-sm-5 ">
        <div class="filter-stacked">
            <?php include('advanced_search_box_right.php');?>
        </div>
    </div>
    <div class="col-md-9 col-sm-7" ng-cloak>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="inputPassword">Search Name:</label>
                <input class="form-control" data-ng-model="filterName" type="text" placeholder="search candidate name...">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword">Disabled</label>
                <select class="form-control" data-ng-model="filterCategory" ></select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword">Disabled</label>
                <select class="form-control"></select>
            </div>
        </div>
        <div class="candidates-list">
            <div class="candidates-list-item" data-ng-repeat="data in data.elements">
                <div class="col-sm-2 col-xs-2">
                        <a href="{{renderLink(data.id, data.user_name)}}">
                            <img ng-src="{{data.photo_thumbnail}}"
                                 class="img-responsive img-thumbnail"
                                 style="width: 120px;"/>
                        </a>
                </div><!-- /.candidates-list-item-heading -->
                <div class="col-sm-6 col-xs-6">
                    <div>
                        <a href="{{renderLink(data.id, data.user_name)}}">
                            {{data.user_name}}
                        </a>
                    </div>
                    <div>
                        <i class="fa fa-map-marker"></i>
                        {{data.location[0].name}}
                    </div>
                </div>
                <div class="col-sm-4 col-xs-4">
                    <div class="pull-right">
                        <spa>Position:</spa>
                        <span data-ng-bind="data.skill_title"></span>
                    </div>
                </div><!-- /.candidates-list-item-rating -->
            </div>
        </div>

        <div
            data-ng-if="data.count == 0"
        >
            <div class="alert alert-danger">
                <strong>Warning!</strong> Empty Data.
            </div>
        </div>
        <div
            data-ng-if="!data"
            class="align_center"
        >
            <i class="fa fa-refresh fa-spin" style="font-size: 100px;"></i>
        </div>
        <div
            data-ng-show="totalItems > 10"
        >
            <pagination
                total-items="totalItems"
                ng-model="currentPage"
                ng-change="pageChanged()"
                max-size="5"
                items-per-page="10"
                boundary-links="true"
            ></pagination>
        </div>
    </div>
</div>
<?php
    require(DIR_WS_INCLUDES . 'template_bottom.php');
    require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
<script
    type="text/javascript"
    src="ext/ng/lib/angular/1.5.6/angular.min.js"
></script>
<script
    type="text/javascript"
    src="ext/ng/lib/angular-ui-bootstrap/ui-bootstrap-tpls-0.12.0.min.js"
></script>
<!-- custom file -->
<script
    type="text/javascript"
    src="ext/ng/app/job-seeker/main.js"
></script>
<script
    type="text/javascript"
    src="ext/ng/app/core/restful/restful.js"
></script>
<script
    type="text/javascript"
    src="ext/ng/app/job-seeker/controller/job_seeker_ctrl.js"
></script>
