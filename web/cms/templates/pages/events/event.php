<?php

  // Header
  perch_layout('events/head', [
    'body-class' => 'event',
  ]);

  // Page content
  perch_collection('Events', [
    'template' => 'event.html',
    'filter'   => 'slug',
    'match'    => 'eq',
    'value'    => perch_get('s'),
    'count'    => 1,
  ]);

  // Footer
  perch_layout('global/footer');