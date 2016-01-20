<?
/* Template Name: Home */
get_header();
?>

<? $banners = get_field('banner_options'); shuffle($banners); $banner = $banners[0]; ?>
<div id="home-banner" style="background-image:url(<?= $banner['sizes']['home-banner']; ?>)">
    <div class="shade">
        <div class="wrap clearfix">
            <? $headlines = get_field('headline_options'); shuffle($headlines); $headline = $headlines[0]; ?>
            <h2><?= $headline['tagline'] ?></h2>
            <?= $headline['description'] ?>
        </div>
    </div>
    
    <div class="close"><span></span></div>
</div>

<div id="home-content">
    <div class="wrap">
        <h3><span>Updates from Beacon</span></h3>
        
        <? $v = get_field('featured_video'); $v = $v[0]; $vid = $v['youtube_id']; ?>
        <div class="column video">
            <div class="featured">
                <a class="vt lb-youtube" href="http://www.youtube.com/embed/<?= $vid ?>?rel=0&wmode=transparent"><img src="//img.youtube.com/vi/<?= $vid ?>/mqdefault.jpg" /><span></span></a>
            </div>
            <h4><a class="lb-youtube" href="http://www.youtube.com/embed/<?= $vid ?>?rel=0&wmode=transparent"><?= $v['video_title'] ?></a></h4>
        </div>
        <? query_posts('post_type=news-post&posts_per_page=1&post_status=publish'); while(have_posts()): the_post(); ?>
            <div class="column news">
                <div class="featured">
                    <a href="<? the_permalink(); ?>"><img src="<?
                        if(has_post_thumbnail()){
                            $thb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'home-bucket'); echo $thb[0];
                        }else{
                            bloginfo('url');
                            echo '/ui/images/placeholder.jpg';
                        } ?>" /></a>
                </div>
                <h4><a href="<? the_permalink() ?>"><? the_title(); ?></a></h4>
            </div>
        <? endwhile; wp_reset_query(); ?>
        <div class="column third quote">
            <? $ts = get_field('testimonial_options'); shuffle($ts); $t = $ts[0]; ?>
            <div class="featured">
                <img src="<?= $t['t_image']['sizes']['home-bucket']; ?>" />
            </div>
            <span class="sq">&#8220;</span>
            <h5><?= $t['t_quote'] ?>”</h5>
            <p>
                <?= $t['t_citation'] ?>
            </p>
        </div>
    </div>
</div>

<? get_footer(); ?>