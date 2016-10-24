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
    <meta name="description" http-equiv="Description" content="HrKing, Job online cambodia, hrking the best job in cambodia, <?php echo tep_output_string_protected($oscTemplate->getTitle()); ?>">
    <meta name="keywords" content="HrKing, Job online cambodia, hrking the best job in cambodia, <?php echo tep_output_string_protected($oscTemplate->getTitle()); ?>">
    <meta name="author" content="KRKING">
    <link rel="canonical" href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
    <meta http-equiv="ROBOTS" content="INDEX, FOLLOW">
    <link rel="shortcut icon" href="assets/favicon.png">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
    <link href="assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/profession-blue-navy.css" rel="stylesheet" type="text/css" id="style-primary">
    <link href="assets/fonts/profession/style.css" rel="stylesheet" type="text/css">
    <?php echo $oscTemplate->getBlocks('header_tags'); ?>
</head>
<body class="hero-content-dark footer-dark">
<div class="page-wrapper">
    <?php require(DIR_WS_INCLUDES . 'header.php');?>
