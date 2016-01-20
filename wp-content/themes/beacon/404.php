<? get_header('new'); the_post(); ?>

    <div id="title">
        <div class="wrap">
            <h2>404: Not Found</h2>
            <p>The page you requested could not be found.</p>
        </div>
    </div>

    <div class="wrap">
        <article id="article" class="full">
            <a href="<?php bloginfo('url') ?>">Head back home.</a>
        </article>
    </div>

<? get_footer('new'); ?>
