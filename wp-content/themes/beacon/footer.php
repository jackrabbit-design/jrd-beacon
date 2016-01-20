    <? if(get_field('show_form')){ ?>
        <div id="form">
            <div class="wrap">
                <?= do_shortcode('[gravityform id="1" name="Get in Touch with Beacon" description="false"]') ?>
            </div>
        </div>
    <? } ?>

    <footer id="footer">
        <div class="wrap">
            <div class="foot-social">
                <? if($fb = get_field('facebook_url','options')){ ?><a target="_blank" class="social-facebook" href="<?= $fb ?>"></a><? } ?>
                <? if($yt = get_field('youtube_url','options')) { ?><a target="_blank" class="social-youtube2" href="<?= $yt ?>"></a><? } ?>
                <? if($li = get_field('linkedin_url','options')){ ?><a target="_blank" class="social-linkedin" href="<?= $li ?>"></a><? } ?>
                <? if($tw = get_field('twitter_url','options')) { ?><a target="_blank" class="social-twitter"  href="<?= $tw ?>"></a><? } ?>
            </div>
            <h2><a href="<? bloginfo('url') ?>"><? bloginfo('name') ?></a></h2>
            <h3><strong><? bloginfo('description') ?></strong> |
                <span><?
                    $addr = trim(preg_replace('/\s\s+/', '</span><span>', get_field('address','options')));
                    echo $addr;
                ?></span>
                <? if($phone = get_field('phone_number','options')){ ?><span><?= $phone ?></span><? } ?>
            </h3>
        </div>
    </footer>
    <script src="<? bloginfo('url'); ?>/ui/js/jquery.plugins.js" type="text/javascript"></script>
    <script src="<? bloginfo('url'); ?>/ui/js/jquery.init.js" type="text/javascript"></script>    
    <? wp_footer() ?>
</body>
</html>