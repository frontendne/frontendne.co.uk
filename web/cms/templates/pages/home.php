<?php

  // Head and header
  perch_layout('homepage/head', [
    'body-class' => 'home',
  ]);

  // Page content
  perch_content('About');
  perch_content('Call for speakers');
  perch_content('Location');

  // Main footer
  perch_layout('global/footer');