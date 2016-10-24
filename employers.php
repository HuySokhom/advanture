<?php
    require('includes/application_top.php');
    require(DIR_WS_INCLUDES . 'template_top.php');
?>
<br>
<div class="container" data-ng-controller="employers_ctrl" >
    <div class="col-md-3 col-sm-5 ">
        <div class="filter-stacked">
            <?php include('advanced_search_box_right.php');?>
        </div>
    </div>
    <div class="col-md-9 col-sm-7" ng-cloak>
        <div class="companies-list" data-ng-if="data.count > 0">
            <div class="companies-list-item" data-ng-repeat="data in data.elements">
                <div class="col-sm-4 col-xs-4">
                    <a href="{{renderLink(data.id, data.company_name)}}">
                        <img ng-src="images/{{data.photo_thumbnail}}"
                             class="img-responsive img-thumbnail"
                             style="width: 120px;"/>
                    </a>
                </div>
                <!-- /.companies-list-item-image -->

                <!-- /.companies-list-item-heading -->

                <div class="col-sm-4 col-xs-4">
                    <h2>
                        <a href="{{renderLink(data.id, data.company_name)}}">
                            {{data.company_name}}
                        </a>
                    </h2>
                    <h3>
                        <i class="fa fa-map-marker"></i>
                        {{data.location[0].name}}
                    </h3>
                    <a href="{{renderLink(data.id, data.company_name)}}">{{data.total}} open positions</a>
                </div>
                <!-- /.positions-list-item-count -->

                <div class="col-sm-4 col-xs-4">
                    <div class="pull-right">
                        Website:
                        <a href="http://{{data.customers_website}}" target="_blank">
                            {{data.customers_website ? data.customers_website : 'N/A'}}
                        </a>
                    </div>
                </div>
                <!-- /.companies-list-item-rating -->
            </div>
            <!-- /.companies-list-item -->
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
    src="ext/ng/app/employers/main.js"
></script>
<script
    type="text/javascript"
    src="ext/ng/app/core/restful/restful.js"
></script>
<script
    type="text/javascript"
    src="ext/ng/app/employers/controller/employers_ctrl.js"
></script>
