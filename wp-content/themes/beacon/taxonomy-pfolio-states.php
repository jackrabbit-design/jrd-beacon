<? get_header('new'); ?>

    <div id="title">
        <div class="wrap">
            <h2>Portfolio</h2>
            <p><?= $wp_query->queried_object->name ?> Properties</p>
        </div>
    </div>

    <div class="wrap">    
        <div id="pf-sort">
            <form id="pf-search">
                <input type="text" placeholder="Search Portfolio" method="get" name="search" />
                <span onclick="jQuery(this).parent('#pf-search').submit()"></span>
            </form>
            <span class="filter-or hide"></span>
            <? $states = get_terms('pfolio-states'); ?>
            <label class="filter">Filter</label>
            <select id="state-dd" name="state-dd" class="state-dd">
                <option value="<?= home_url() . '/pfolio-states/' . $wp_query->query['pfolio-states'] ?>"><?= $wp_query->queried_object->name ?></option>
                <option value="<?= get_permalink(7); ?>">All States</option>
                <? foreach($states as $state){ ?>
                    <? if($wp_query->query['pfolio-states'] == $state->slug) continue; ?>
                    <option value="<?= home_url() . '/pfolio-states/' . $state->slug; ?>"><?= $state->name ?></option>
                <? } ?>
            </select>
            <div class="types">
                <span class="mar on">Market</span>
                <span class="sub on">Affordable</span>
                <span class="sen on">Senior</span>
            </div>
            <div class="pf-toggle hide"></div>
        </div>
    
        <article id="article" class="full pfolio">
            <? if(isset($_GET['search'])) $s = $_GET['search'];
            $args = array(
                'post_type' => 'pfolio',
                'posts_per_page' => '-1',
                'orderby' => 'name',
                'order' => 'ASC',
                'pfolio-states' => $wp_query->query['pfolio-states']
            );
            if(isset($_GET['search'])){
                $args['s'] = $_GET['search'];
            }
            query_posts($args);
            echo ($s ? '<p>You searched "'. $s .'"</p>' : '');
            if(have_posts()): $c = 0; ?>
                <div id="portfolio">
                    <? while(have_posts()): the_post();
                        $img = get_field('property_image');
                        $grid = get_field('grid_orientation');
                        $types = get_field('property_type'); ?>
                        <div class="box size<?
                            echo $grid;
                            foreach($types as $type){
                                echo ' ' . $type;
                            }
                        ?>" style="background-image:url(<?= $img['sizes']['pf'.$grid]; ?>);">
                            <div class="org">
                                <div>
                                    <p><? the_title(); ?>
                                        <small><? the_field('location') ?></small>
                                    </p>
                                    <a class="lb-trigger" rel="lb" href="#prop<?= $c; ?>">View More</a>
                                </div>
                            </div>
                            <div style="display:none;">
                                <div class="pf-lb" id="prop<?= $c++; ?>">
                                    <h2><? the_title(); ?></h2>
                                    <p class="details">
                                        <? the_field('address') ?>
                                        <br/>P: <? the_field('phone_number') ?>  <span>|</span>
                                        <? if(get_field('fax_number')){ ?>
                                            F: <? the_field('fax_number') ?>  <span>|</span>
                                        <? } ?>
                                        <a href="http://<? the_field('website') ?>" target="_blank"><? the_field('website') ?></a>
                                    </p>
                                    <img src="<?= $img['sizes']['pf-full'] ?>" />
                                    <? the_field('description') ?>
                                </div>
                            </div>
                        </div>
                    <? endwhile; ?>
                </div>
            <? else: ?>
                <p>Sorry, no properties match your criteria. Try <a href="<?= get_permalink(7) ?>">removing your filters</a>.</p>
            <? endif; ?>
        </article>
    </div>


<? get_footer('new'); ?>