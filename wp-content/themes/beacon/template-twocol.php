<? /* Template Name: Two-Column */
get_header('new'); the_post(); ?>

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
        <article id="article" class="full clearfix twocol">
            <? the_content(); ?>
            <? if(get_field('content_left') != '' && get_field('content_right') != ''){ ?>
                <div id="col-left">
                    <? the_field('content_left') ?>
                </div>
                <div id="col-right">
                    <? the_field('content_right') ?>
                </div>
            <? } ?>

            <? if(get_field('closing_text')){ ?>
                <h5 class="pre-boxes"><? the_field('closing_text') ?></h5>
            <? } ?>

            <? $boxes = get_field('boxes'); if(have_rows('boxes') && !empty($boxes[0]['box_image'])): $c=1 ?>
                <div class="boxes <?php if(count($boxes) == 4 || count($boxes) == 2) echo 'two' ?>">
                    <ul>
                        <? while(have_rows('boxes')): the_row();
                            if($cs = get_sub_field('case_study_link')){
                                $cs = $cs->ID;
                                $data = 'data-cs="#cs'.$cs.'"';
                            }else{
                                $data = '';
                            } ?>
                            <li <?php echo $data ?> style="background-image:url(<? $img = get_sub_field('box_image'); echo $img['sizes']['box'] ?>)" <?= ($c % 3 == 0 ? 'class="third"' : ''); ?>>
                                <?php
                                if($cs){ $post = get_post($cs); setup_postdata($post); ?>
                                    <div style="display:none;">
                                        <div class="pf-lb" id="cs<?php echo $cs ?>">
                                            <h2><?php the_title(); ?></h2>
                                            <h3><?php the_field('headline'); ?></h3>
                                            <?php
                                            if($loc = get_field('location')){
                                                echo '<div class="half"><span>Location</span><p>'.$loc.'</p></div>';
                                            }
                                            if($pro = get_field('profile')){
                                                echo '<div class="half"><span>Profile</span><p>'.$pro.'</p></div>';
                                            }
                                            if($unit = get_field('unit_count')){
                                                echo '<div class="half"><span>Unit Count</span><p>'.$unit.'</p></div>';
                                            }
                                            if($fin = get_field('financing')){
                                                echo '<div class="half"><span>Financing</span><p>'.$fin.'</p></div>';
                                            }
                                            if($com = get_field('completion')){
                                                echo '<div class="half"><span>Completion</span><p>'.$com.'</p></div>';
                                            }
                                            ?>
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                <?php } wp_reset_postdata();
                                if(get_sub_field('box_description')){?>
                                    <div>
                                        <span><?= $c++ ?></span>
                                        <p><? the_sub_field('box_description') ?></p>
                                        <?php if($data != ''){ ?><a class="btn" >Read More</a><?} ?>
                                    </div>
                                <?php } ?>
                            </li>
                        <? endwhile; ?>
                    </ul>
                </div>
            <? endif; ?>

        </article>
    </div>

<? get_footer('new'); ?>
