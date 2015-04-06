<?php

  // Header
  perch_layout('global/head', [
    'body-class' => 'events',
  ]);

  // Page content
  perch_collection('Events', [
      'template'   => 'event_listing.html',
      'sort'       => 'date',
      'sort-order' => 'DESC',
  ]);

  // Footer
  perch_layout('global/footer');