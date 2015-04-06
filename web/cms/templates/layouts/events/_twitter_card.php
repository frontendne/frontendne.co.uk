<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@frontendne"/>
<meta name="twitter:domain" content="<?php
      perch_collection('Events', [
        'filter'   => 'slug',
        'match'    => 'eq',
        'value'    => perch_get('s'),
        'count'    => 1,
        'template' =>'/meta/event_description.html',
      ]);
    ?>"/>
<meta name="twitter:creator" content="@frontendne"/>
<meta name="twitter:url" content="https://frontendne.co.uk/events/<?php
      perch_collection('Events', [
        'filter'   => 'slug',
        'match'    => 'eq',
        'value'    => perch_get('s'),
        'count'    => 1,
        'template' =>'/meta/event_slug.html',
      ]);
    ?>" />
