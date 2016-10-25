<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  $oscTemplate->buildBlocks();

  if (!$oscTemplate->hasBlocks('boxes_column_left')) {
    $oscTemplate->setGridContentWidth($oscTemplate->getGridContentWidth() + $oscTemplate->getGridColumnWidth());
  }

  if (!$oscTemplate->hasBlocks('boxes_column_right')) {
    $oscTemplate->setGridContentWidth($oscTemplate->getGridContentWidth() + $oscTemplate->getGridColumnWidth());
  }
?>
<!DOCTYPE html>
<html <?php echo HTML_PARAMS; ?>  xmlns:ng="http://angularjs.org/" data-ng-app="main">
<head>
    <meta charset="<?php echo CHARSET; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo tep_output_string_protected($oscTemplate->getTitle()); ?></title>
    <base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
    <meta name="description" http-equiv="Description" content="Adventure to cambodia, cambodia kingdom of wonder
    <?php echo tep_output_string_protected($oscTemplate->getTitle()); ?>, Adventure Tourism">
    <meta name="keywords" content="Adventure to cambodia, cambodia kingdom of wonder, Adventure Tourism, <?php echo tep_output_string_protected($oscTemplate->getTitle()); ?>">
    <meta name="author" content="Adventure">
    <link rel="canonical" href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
    <meta http-equiv="ROBOTS" content="INDEX, FOLLOW">
    <link rel="shortcut icon" href="themes/img/favicon.ico">




    <!-- Google Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="themes/css/bootstrap.min.css">

    <!-- Fontawsome CSS
    ============================================ -->
    <link rel="stylesheet" href="themes/font-awesome/css/font-awesome.min.css">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="themes/css/owl.carousel.css">

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet" href="themes/css/jquery-ui.css">

    <!-- meanmenu CSS
    ============================================ -->
    <link rel="stylesheet" href="themes/css/meanmenu.min.css">

    <!-- animate CSS
    ============================================ -->
    <link rel="stylesheet" href="themes/css/animate.css">

    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="themes/lib/nivo-slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="themes/lib/nivo-slider/css/preview.css" type="text/css" media="screen" />

    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="themes/style.css">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="themes/css/responsive.css">

    <!-- modernizr JS
    ============================================ -->
    <script src="themes/js/vendor/modernizr-2.8.3.min.js"></script>

    <?php echo $oscTemplate->getBlocks('header_tags'); ?>
</head>
<body>
    <?php require(DIR_WS_INCLUDES . 'header.php');?>
