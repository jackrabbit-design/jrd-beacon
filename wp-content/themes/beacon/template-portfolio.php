<?php /* Template Name: Portfolio */
get_header('new'); the_post(); ?>

    <div id="title">
        <div class="wrap">
            <h2><?php the_title(); ?></h2>
            <?= (get_field('subtitle') ? '<p>'.get_field('subtitle').'</p>'  : ''); ?>
        </div>
    </div>

    <div class="wrap">
        <div id="pf-sort">
            <form id="pf-search">
                <input type="text" placeholder="Search Portfolio" method="get" name="search" />
                <span onclick="jQuery(this).parent('#pf-search').submit()"></span>
            </form>
            <span class="filter-or hide"></span>
            <?php $states = get_terms('pfolio-states'); ?>
            <label class="filter">Filter</label>
            <select id="state-dd" name="state-dd" class="state-dd">
                <option value="<?= get_permalink(7); ?>">All States</option>
                <?php foreach($states as $state){ ?>
                    <option value="<?= home_url() . '/pfolio-states/' . $state->slug; ?>"><?= $state->name ?></option>
                <?php } ?>
            </select>
            <div class="types">
                <span class="mar on">Market</span>
                <span class="sub on">Affordable</span>
                <span class="sen on">Senior</span>
            </div>
            <div class="pf-toggle hide"></div>
        </div>

        <article id="article" class="full pfolio">
            <?
            $args = array(
                'post_type' => 'pfolio',
                'posts_per_page' => '-1',
                'orderby' => 'name',
                'order' => 'ASC'
            );
            if(isset($_GET['search'])){
                $args['s'] = $_GET['search'];
            }
            query_posts($args);
            echo ($s ? '<p>You searched "'. $s .'"</p>' : '');
            if(have_posts()): $c = 0; ?>
                <div id="portfolio">
                    <?php $z = 200; while(have_posts()): the_post();
                        $img = get_field('property_image');
                        $grid = get_field('grid_orientation');
                        $types = get_field('property_type'); ?>
                        <div class="box size<?
                            echo $grid;
                            foreach($types as $type){
                                echo ' ' . $type;
                            }
                        ?>" style="z-index:<?= $z--; ?>; background-image:url(<?= $img['sizes']['pf'.$grid]; ?>);" data-id="<?php echo $post->post_name ?>">
                            <div class="org">
                                <div>
                                    <p><?php the_title(); ?>
                                        <small><?php the_field('location') ?></small>
                                    </p>
                                    <a class="lb-trigger" rel="lb" href="#prop<?= $c; ?>">View More</a>
                                </div>
                            </div>
                            <div style="display:none;">

                                <?php // if(is_user_logged_in()){ // NEW ?>

                                    <div class="pf-lb new" id="prop<?= $c++; ?>">
                                        <h2><?php the_title(); ?></h2>
                                        <p class="details left">
                                            <?php the_field('address') ?>
                                        </p>
                                        <p class="details right">
                                            P: <?php the_field('phone_number') ?>  <span>|</span>
                                            <?php if(get_field('fax_number')){ ?>
                                                F: <?php the_field('fax_number') ?>
                                            <?php } ?><br/>
                                            <a href="http://<?php the_field('website') ?>" target="_blank"><?php the_field('website') ?></a>
                                        </p>
                                        <div class="amenities">
                                            <?php the_field('amenities'); ?>
                                        </div>
                                        <img src="<?= $img['sizes']['pf-full'] ?>" />
                                    </div>

                                <?php /* }else{ // OLD ?>

                                    <div class="pf-lb" id="prop<?= $c++; ?>">
                                        <h2><?php the_title(); ?></h2>
                                        <p class="details">
                                            <span class="nobr"><?php echo str_replace(array("\r\n","\r","\n"),', ', get_field('address')) ?></span>
                                            <br/>P: <?php the_field('phone_number') ?>  <span>|</span>
                                            <?php if(get_field('fax_number')){ ?>
                                                F: <?php the_field('fax_number') ?>  <span>|</span>
                                            <?php } ?>
                                            <a href="http://<?php the_field('website') ?>" target="_blank"><?php the_field('website') ?></a>
                                        </p>
                                        <img src="<?= $img['sizes']['pf-full'] ?>" />
                                        <?php the_field('description') ?>
                                    </div>

                                <?php } */ ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>Sorry, no properties match your criteria. Try <a href="<?= get_permalink(7) ?>">removing your filters</a>.</p>
            <?php endif; ?>
        </article>
    </div>


<?php get_footer('new'); ?>
