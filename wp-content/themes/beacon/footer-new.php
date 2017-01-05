    <? if(get_field('show_form')){ ?>
        <div id="form">
            <div class="wrap">
                <?= do_shortcode('[gravityform id="1" name="Get in Touch with Beacon" description="false"]') ?>
            </div>
        </div>
    <? } ?>
    <footer id="footer">
    	<div class="container">
        	<div class="container-inner clearfix">
            	<div class="rw-one pull-left">
                	<h3>
                    	<span><? bloginfo('name') ?></span> <? bloginfo('description') ?>
                    </h3>
                    <span class="tel"><?= get_field('phone_number','options') ?></span>
                    <span class="address"><?= get_field('address','options') ?></span>
                </div>

                <div class="rw-two pull-right">
                	<div class="clearfix">
                    	<div class="social-links pull-right">
                <? if($fb = get_field('facebook_url','options')){ ?><a target="_blank" href="<?= $fb ?>"><span class="social-facebook"></span></a><? } ?>
                <? if($yt = get_field('youtube_url','options')) { ?><a target="_blank" href="<?= $yt ?>"><span class="social-youtube" ></span></a><? } ?>
                <? if($li = get_field('linkedin_url','options')){ ?><a target="_blank" href="<?= $li ?>"><span class="social-linkedin"></span></a><? } ?>
                <? if($tw = get_field('twitter_url','options')) { ?><a target="_blank" href="<?= $tw ?>"><span class="social-twitter" ></span></a><? } ?> 
                        </div>
                        <div class="search pull-right">
                            <div class="clearfix">
                                <span class="search-icon theme-search-icon pull-left"></span>
                                <div class="s-from-wrap pull-left">
                                    <form role="search" method="get">
                                        <ul>
                                            <li>
                                                <input type="text" placeholder="search" name="s" />
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pull-left dev-wrap">
                <span class="otherlogos"><img src="<?php bloginfo('url'); ?>/ui/images/Handicap.png" alt="" /><img src="<?php bloginfo('url'); ?>/ui/images/housing.png" alt="" /></span>
                	<a href="http://www.jumpingjackrabbit.com" title="Website Design by Jackrabbit" target="_blank">Website Design</a> by <a href="http://www.jumpingjackrabbit.com" title="Website Design by Jackrabbit" target="_blank">Jackrabbit</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="<? bloginfo('url'); ?>/ui/js/jquery.plugins.js" type="text/javascript"></script>
    <script src="<? bloginfo('url'); ?>/ui/js/jquery.init.js" type="text/javascript"></script>
    <? wp_footer() ?>
</body>
</html>
