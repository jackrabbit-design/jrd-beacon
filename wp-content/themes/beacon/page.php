<? get_header('new'); the_post(); ?>

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
    
<? get_footer('new'); ?>