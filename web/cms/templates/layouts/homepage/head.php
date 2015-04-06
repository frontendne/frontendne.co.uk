<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title><?php perch_pages_title(); ?></title>
    <meta name="description" content="<?php perch_page_attribute('description'); ?>" />
    <link rel="canonical" href="<?php
      perch_page_url(array(
        'hide-extensions'    => true,
        'hide-default-doc'   => true,
        'add-trailing-slash' => false,
        'include-domain'     => true,
      ));
    ?>" />
    <?php perch_layout('global/_open_graph'); ?>
    <?php perch_layout('global/_twitter_card'); ?>
    <?php perch_layout('global/_apple_touch_icon'); ?>
    <?php perch_layout('global/_favicon'); ?>
    <?php perch_content('Google Analytics'); ?>
    <?php perch_get_css(); ?>
</head>

<?php
  if (perch_layout_has('body-class')) {
    echo '<body class="'.perch_layout_var('body-class', true).'">';
  }else{
    echo '<body>';
  }
?>

<main role="main">

    <?php perch_layout('homepage/header'); ?>

    <div class="wrapper">