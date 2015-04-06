<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <?php perch_page_attributes(); ?>
    <?php perch_layout('global/_apple_touch_icon'); ?>

    <link rel="icon" href="/img/icons/favicon.png">
    <!--[if IE]><link rel="shortcut icon" href="/img/icons/favicon.ico"><![endif]-->
    <title><?php perch_pages_title(); ?></title>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-59418357-1', 'auto');
        ga('require', 'linkid', 'linkid.js');
        ga('send', 'pageview');
    </script>
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

    <?php perch_layout('global/header'); ?>

    <div class="wrapper">