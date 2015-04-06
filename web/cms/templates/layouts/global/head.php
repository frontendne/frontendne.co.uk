<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title><?php perch_pages_title(); ?></title>
    <?php perch_page_attributes(); ?>
    <?php perch_layout('global/_apple_touch_icon'); ?>
    <?php perch_layout('global/_favicon'); ?>
    <?php perch_content('Google Analytics'); ?>
    <?php perch_get_css(); ?>
    <?php perch_layout('global/_open_graph'); ?>
    <?php perch_layout('global/_twitter_card'); ?>
</head>

<?php
  if (perch_layout_has('body-class')) {
    echo '<body class="'.perch_layout_var('body-class', true).'">';
  }else{
    echo '<body>';
  }
?>

<main role="main">

    <?php perch_layout('global/header'); ?>

    <div class="wrapper">