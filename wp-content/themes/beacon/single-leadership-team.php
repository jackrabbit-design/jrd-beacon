<? get_header('new'); the_post(); ?>

    <div id="title">
        <div class="wrap">
            <h2><? the_title(); ?></h2>
            <p><? the_field('member_title') ?></p>
        </div>
    </div>
    <div class="wrap clearfix bio">
        <aside id="sidebar">
            <? $me = $post->ID; query_posts('post_type=leadership-team&posts_per_page=-1&orderby=menu_order&order=ASC'); ?>
            <? if(have_posts()): $c = 1; ?>
                <h3>The Beacon Team</h3>
                <div id="team-side">
                    <ul>
                        <? while(have_posts()): the_post(); if($post->ID == $me) continue; ?>
                            <li <?= ($c++ % 3 == 0 ? 'class="third"' : '') ?>><a href="<? the_permalink() ?>">
                                <span><? the_title(); ?></span>
                                <img src="<? $hs = get_field('square_image'); echo $hs['sizes']['team-side']; ?>" />
                            </a></li>
                        <? endwhile; ?>
                    </ul>
                </div>
            <? endif; wp_reset_query(); ?>
        </aside>

        <img class="headshot" src="<? $img = get_field('main_image'); echo $img['sizes']['team-full']; ?>" />
        <article id="article">
            <? the_content(); ?>
            <a class="btn" href="<?= get_permalink(13); ?>">Back to Team</a>
        </article>
                
    </div>

<? get_footer('new'); ?>