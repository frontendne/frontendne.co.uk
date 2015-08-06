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
                'filter'     => 'date',
                'match'      => 'lte',
                'value'      => date('Y-m-d'),
  ]);

  // Footer
  perch_layout('global/footer');