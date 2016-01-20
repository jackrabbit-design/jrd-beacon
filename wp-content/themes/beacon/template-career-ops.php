<? /* Template Name: Career Opportunities */
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
            <? // the_content(); ?>

            <ul id="careers">
                <? while(have_rows('careers')){ the_row(); ?>            
                    <li>
                        <a href="<? $file = get_sub_field('career_pdf'); echo $file['url']  ?>">
                            <strong><? the_sub_field('career_name')?></strong>
                            <? the_sub_field('career_location') ?>
                        </a>
                    </li>
                <? } ?>
            </ul>
            
        </article>
    </div>
    
    <div class="iform wrap">
        <?= do_shortcode('[gravityform id="2" name="Apply Now" description="false"]') ?>
    </div>
    
<? get_footer('new'); ?>