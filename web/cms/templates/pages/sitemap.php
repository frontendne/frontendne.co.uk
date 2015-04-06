<?php

  header('Content-type: application/xml');

  echo '<?xml version="1.0" encoding="UTF-8"?>
  <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

  perch_pages_navigation(array(
    'template'         => 'sitemap.html',
    'hide-default-doc' => true,
    'hide-extensions'  => true,
    'levels'           => 2,
    // 'include-hidden'   => true,
    'use-attributes'   => false,
    'flat'             => true,
  ));

  perch_collection('Events', [
    'template' => 'sitemap/events.html',
  ]);

  echo '</urlset>';