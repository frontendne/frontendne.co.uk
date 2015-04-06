<meta property="og:title" content="Frontend NE" />
<meta property="og:site_name" content="Frontend NE"/>
<meta property="og:url" content="https://frontendne.co.uk/events/<?php
      perch_collection('Events', [
        'filter'   => 'slug',
        'match'    => 'eq',
        'value'    => perch_get('s'),
        'count'    => 1,
        'template' =>'/meta/event_slug.html',
      ]);
    ?>" />
<meta property="og:image" content="https://frontendne.co.uk<?php perch_path('feathers/frontendne/img/icons/apple-touch-icon-precomposed-180x180.png') ?>" />
<meta property="og:description" content="<?php
      perch_collection('Events', [
        'filter'   => 'slug',
        'match'    => 'eq',
        'value'    => perch_get('s'),
        'count'    => 1,
        'template' =>'/meta/event_description.html',
      ]);
    ?>" />
