<?php

    $Templates = new PerchContent_PageTemplates;

    $Templates->find_and_add_new_templates();


    $templates = $Templates->all();
    
