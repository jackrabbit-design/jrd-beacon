<? get_header('new'); the_post() ?>

    <div id="title">
        <div class="wrap">
            <h2>News & Press</h2>
        </div>
    </div>
    <div class="wrap clearfix news">
    
        <h2><? the_title() ?></h2>
        <p class="date"><?= get_the_date('F j, Y'); ?></p>
    
        <article id="article">
        
            <div class="video hide">
                <img src="<? $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'news-thb'); echo $img[0]; ?>" />
            </div>
            <? the_content(); ?>
            
            <a href="<?= get_permalink(10); ?>" class="btn">Back to All News</a>

        </article>
        
        <aside id="sidebar">

            <? if(has_post_thumbnail()){ ?>
                <div class="video">
                    <img src="<? $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'news-thb'); echo $img[0]; ?>" />
                </div>
            <? } ?>
            <div class="share">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<? the_permalink() ?>"><span class="social-facebook"></span>Share on Facebook </a>
                <a target="_blank" href="https://twitter.com/intent/tweet?text=<? the_title() ?>&url=<? the_permalink() ?>"><span class="social-twitter"></span>Share on Twitter   </a>
                <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<? the_permalink() ?>&title=<? the_title(); ?>&summary=<?= strip_tags(get_the_excerpt()); ?>&source=<? bloginfo('url') ?>"><span class="social-linkedin"></span>Share on LinkedIn </a>
                <a href="mailto:?subject=<? bloginfo('name') ?> - <? the_title() ?>&body=<? the_permalink() ?>"><span class="social-email"></span>Email Post           </a>
            </div>

        </aside>
        
    </div>

<? get_footer('new'); ?>