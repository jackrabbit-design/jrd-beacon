<? /* Template Name: Team Tabbed 2017 */
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
        <article id="article" class="full">
            <? the_content(); ?>
        </article>
    </div>
    <div id="team-area">
    	<div class="team-tabs">
	    	<ul>
		    	<li><a href="#leadership">Partners</a></li>
		    	<li><a href="#senior-exec">Senior Executive Team</a></li>
	    	</ul>
    	</div>
    	
    	<div class="wrap">
    		<div id="leadership">
    	
            <?
            $wp_query->query('post_type=leadership-team&posts_per_page=-1&orderby=menu_order&order=ASC');
            $team = $wp_query->posts;
            
            $alt = get_field('alternate_images');
            shuffle($alt);
            $alt1[] = $alt[0];
            $alt2[] = $alt[1];
            $alt3[] = $alt[2];
            
            array_splice($team, 1, 0, $alt1);
            array_splice($team, 6, 0, $alt2);
            array_splice($team, 8, 0, $alt3);
            ?>

            <? if($team): $c = 1; ?>
                <div class="team">
                    <ul>
                        <? foreach($team as $post): ?>
                            <? if($post->post_type == 'leadership-team'){
                                setup_postdata($post);
                                $img = get_field('square_image'); ?>
                                <li <?= ($c++ % 4 == 0 ? 'class="four"' : '') ?> style="background-image:url(<?= $img['sizes']['team-thb'] ?>);">
                                    <div>
                                        <h3><?= get_the_title(); ?></h3>
                                        <h5><? $title = get_field('member_title'); echo substr($title, 0, strpos($title, ",")) ?></h5>
                                        <a href="<?= get_permalink() ?>">Read Bio</a>
                                    </div>
                                </li>
                            <? }else{
                                echo '<li class="alt" ' . ($c++ % 4 == 0 ? 'class="four"' : '') . ' style="box-shadow:inset 0px 0px 70px rgba(0,0,0,0.11); background-image:url(' . $post['sizes']['team-thb'] . ');"></li>';
                            } ?>
                        <? endforeach; ?>
                    </ul>
                </div>
            <? endif; ?>
    		</div>
    		<div id="senior-exec">
            
            
            <?
            $wp_query->query('post_type=senior-exec-team&posts_per_page=-1&orderby=menu_order&order=ASC');
            $team = $wp_query->posts;
            ?>
                <div class="team">
                    <ul>
                        <? foreach($team as $post):
                                setup_postdata($post);
                                $img = get_field('square_image'); ?>
                                <li <?= ($c++ % 4 == 0 ? 'class="four"' : '') ?> style="background-image:url(<?= $img['sizes']['team-thb'] ?>);">
                                    <div>
                                        <h3><?= get_the_title(); ?></h3>
                                        <h5><? $title = get_field('member_title'); echo substr($title, 0, strpos($title, ",")) ?></h5>
                                        <a href="<?= get_permalink() ?>">Read Bio</a>
                                    </div>
                                </li>
                        <? endforeach; ?>
                    </ul>
                </div>
    		</div>
    	</div>
    </div>

<? get_footer('new'); ?>