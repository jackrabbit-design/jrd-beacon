<? /* Template Name: Team */
get_header(); the_post(); ?>

    <div id="title">
        <div class="wrap">
            <h2><? the_title(); ?></h2>
            <?= (get_field('subtitle') ? '<p>'.get_field('subtitle').'</p>'  : ''); ?>
        </div>
    </div>
    
    <div class="wrap">
        <article id="article" class="full">
            <? the_content(); ?>
            
            <? query_posts('post_type=leadership-team&posts_per_page=-1&orderby=menu_order&order=ASC'); ?>
            <? if(have_posts()): $c = 1; ?>
                <div id="team">
                    <ul>
                        <? while(have_posts()): the_post(); $img = get_field('square_image') ?>
                            <li <?= ($c++ % 4 == 0 ? 'class="four"' : '') ?> style="background-image:url(<?= $img['sizes']['team-thb'] ?>);">
                                <div>
                                    <h3><? the_title(); ?></h3>
                                    <h5><? $title = get_field('member_title'); echo substr($title, 0, strpos($title, ",")) ?></h5>
                                    <a href="<? the_permalink() ?>">Read Bio</a>
                                </div>
                            </li>
                        <? endwhile; ?>
                    </ul>
                </div>
            <? endif; ?>
        </article>
    </div>

<? get_footer(); ?>