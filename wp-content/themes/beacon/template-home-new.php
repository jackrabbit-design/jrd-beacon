<?
/* Template Name: Home New */
get_header('new');
?>

    <div id="slider-wrap">
    	<ul id="slider" class="cycle-slideshow" data-cycle-fx="scrollHorz" 
    		data-cycle-pager=".banner-pager"
            data-cycle-swipe=true
            data-cycle-swipe-fx=scrollHorz
    		data-cycle-slides=">li"
            data-cycle-timeout="7000">
            <? while(have_rows('banners')){ the_row(); ?>
            	<li>
                	<div class="slider-bg" style="background-image:url(<? $banner = get_sub_field('banner_image'); echo $banner['url'] ?>)">
                    	<div class="banner-gradent"> </div>
                        <div class="banner-txt1">
                        	<div class="container">
                            	<div class="container-inner">
                                	<div class="slider-logo">
                                    	<img src="/ui/images/banner-logo.png" alt="" />
                                    </div>
                                    <div class="s-txt">
                                    	<span><? the_sub_field('community_name') ?></span>
                                        <span><? the_sub_field('community_location') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="main-txt">
                    	<div class="container">
                        	<div class="container-inner">
                            	<h2><? the_sub_field('banner_tagline') ?></h2>
                                <div class="txt-two">
                                	<p><? the_sub_field('banner_description') ?></p>
                                    <a href="<? $link = get_sub_field('banner_link'); echo get_permalink($link->ID); ?>" class="btn orange-btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <? } ?>
            
        </ul>
        
        <div class="pager">
        	<div class="container">
            	<div class="container-inner">
                	<div class="banner-pager"></div>
                </div>
            </div>
        </div>
    </div>
    
    <section id="hm-rw2">
    	<div class="container">
        	<div class="container-inner">
            	<ul>
                	<? while(have_rows('home_buckets')){ the_row(); ?>
                    	<li>
                        	<div class="inner-wrap bgimg" style="background-image:url(<? $img = get_sub_field('bucket_image'); echo $img['sizes']['home-bucket-n'] ?>)"> 
                            	<div class="img-gradient"></div>                         
                                <div class="hover-box">
                                	<div class="inner-wrap">
                                        <h2><? the_sub_field('bucket_title') ?></h2>
                                        <div class="desc">
                                            <? the_sub_field('bucket_description') ?>
                                            <a href="<? the_sub_field('bucket_link') ?>" class="btn orange-btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <? } ?>
                </ul>
            </div>
        </div>
    </section>
    
    <section id="hm-news">
    	<div class="container">
        	<div class="container-inner">
            	<h2 class="sub-headline">Recent News</h2>
                <ul>
                    <? query_posts('post_type=news-post&posts_per_page=3&post_status=publish'); while(have_posts()): the_post(); ?>
                    	<li>
                        	<span><?= get_the_date('F j, Y') ?></span>
                            <h3><? the_title() ?></h3>
                            <? the_excerpt() ?>
                            <a href="<? the_permalink() ?>" class="btn orange-btn">Read Article</a>
                        </li>
                    <? endwhile; wp_reset_query(); ?>
                </ul>
            </div>
        </div>
    </section>
    
    <section id="hm-rw4">
    	<div class="container">
        	<div class="container-inner clearfix">
            	<div class="pull-left col-one">
                	<h2 class="sub-headline"><? the_field('featured_title') ?></h2>
                    <? the_field('featured_text') ?>
                </div>
                
                <div class="pull-right col-two" style="background-image:url(<? $thb = get_field('featured_image'); echo $thb['sizes']['home-rw4'] ?>)"></div>
            </div>
        </div>
    </section>
    
    <? $quotes = get_field('testimonials'); shuffle($quotes); $quote = $quotes[0]; ?>
    <section id="hm-quote" style="background-image:url(<?= $quote['quote_image']['url'] ?>)">
    	<div class="container">
        	<div class="container-inner">
            	<div class="inner-wrap">
                	<h3><?= $quote['quote_community'] ?></h3>
                </div>
                <blockquote><?= $quote['quote_body'] ?></blockquote>
                <span><?= $quote['quote_name'] ?></span>
            </div>
        </div>
    </section>
   	
<? get_footer('new'); ?>