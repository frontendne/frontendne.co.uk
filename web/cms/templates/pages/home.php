<?php

  // Main head
  perch_layout('global/head', [
    'body-class' => 'home',
  ]);

  // Page content
  perch_content('About');
  perch_content('Call for speakers');
  perch_content('Location');

  // Main footer
  perch_layout('global/footer');