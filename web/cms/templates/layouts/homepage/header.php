<header class="main__header">
    <div class="wrapper">
        <a href="/" class="logo">
            <h1 class="hide">Frontend NE</h1>
            <?php include($_SERVER['DOCUMENT_ROOT'].'/cms/templates/includes/svg/logo.svg'); ?>
        </a>

        <?php
            perch_collection('Events', [
                'template'   => 'event_next.html',
                'sort'       => 'date',
                'sort-order' => 'ASC',
                'count'      => 1,
                'filter'     => 'date',
                'match'      => 'gte',
                'value'      => date('Y-m-d H:i:s'),
            ]);
        ?>

    </div>
</header>