<? /* Template Name: News */
get_header('new'); ?>

    <div id="title">
        <div class="wrap">
            <h2><? the_title(); ?></h2>
            <?= (get_field('subtitle') ? '<p>'.get_field('subtitle').'</p>'  : ''); ?>
        </div>
    </div>
    <? if(get_field('headline')): ?>
        <div id="subtitle">
            <div class="wrap">
                <h4><? the_field('headline') ?></h4>
            </div>
        </div>
    <? endif; ?>
    <div class="wrap">
        <article id="article" class="full news">
            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
            <? query_posts(array(
                'post_type' => 'news-post',
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'paged' => $paged
            )) ?>
            <? if(have_posts()): $c = 1; ?>
                <div id="news">
                    <ul class="query-results">
                        <? while(have_posts()): the_post(); ?>
                            <? $link = 
                                (get_field('external_url') ? get_field('external_url') . '" target="_blank' :
                                (get_field('youtube_id') ? '//youtube.com/embed/' . get_field('youtube_id')  . '?rel=0&wmode=transparent" class="lb-youtube' :
                                get_permalink()));
                                $imgLink = $link . ' img';    
                            ?>
                            <li class="<?= ($c++ % 2 == 0 ? 'right' : 'left') . (has_post_thumbnail() ? '' : ' noimg' ) ?>">
                                <? if(has_post_thumbnail()){ ?>
                                    <a href="<?= $imgLink ?>"><img src="<? $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'news-thb'); echo $img[0]; ?>" /></a>
                                <? } ?>
                                <small><?= get_the_date('F j, Y'); ?></small>
                                <h4><a href="<?= $link ?>"><? the_title(); ?></a></h4>
                                <? the_excerpt(); ?>
                                <p><a href="<?= $link ?>">Continue Reading &raquo;</a></p>
                            </li>
                        <? endwhile; ?>
                    </ul>
                </div>
            
                <div class="load-more">
                    <?php next_posts_link('Load More'); ?>
                </div>
            <? endif; wp_reset_query(); ?>
            
        </article>
    </div>

<? get_footer('new'); ?>