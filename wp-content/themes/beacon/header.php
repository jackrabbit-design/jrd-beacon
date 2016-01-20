<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/><meta name="MSSmartTagsPreventParsing" content="true" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <? if (is_front_page()) { ?><title><? bloginfo('name'); ?> | <? bloginfo('description'); ?></title>
    <? } else { ?><title><? wp_title(''); ?> | <? bloginfo('name'); ?></title><? }; ?>
	<link type="text/css" rel="stylesheet" media="all" href="<? bloginfo('url'); ?>/ui/css/style.css" />
	<link type="text/css" rel="stylesheet" media="all" href="<? bloginfo('url'); ?>/ui/css/media.css" />
    <link type="text/plain" rel="author" href="<? bloginfo('url') ?>/authors.txt" />
    <link type="image/x-icon" rel="shortcut icon" href="<? bloginfo('url') ?>/favicon.ico" />
    <script src="<? bloginfo('url'); ?>/ui/js/modernizr.js"></script>
    <script src="<? bloginfo('url'); ?>/ui/js/jquery.js" type="text/javascript"></script>
    <? wp_head(); ?>
</head>
<body>
    <!--[if lte IE 7]><iframe src="unsupported.html" frameborder="0" scrolling="no" id="no_ie6"></iframe><![endif]-->
    <header id="header">
        <div class="wrap">
            <nav id="re-nav">
                <div class="re-activate">
                    <span></span>
                </div>
                <? if($phone = get_field('phone_number','options')){ ?><a href="tel:<?= $phone ?>" class="phone"></a><? } ?>
            </nav>
            <nav id="social-nav">
                <form role="search" method="get" class="search-form" action="<?php echo home_url('/');?>">
                	<label>
                		<span class="screen-reader-text">Search for:</span>
                		<input type="search" class="search-field" placeholder="Search..." value="" name="s" title="Search for:" />
                	</label>
                	<input type="submit" class="search-submit" value="Search" />
                </form>
                <? if($fb = get_field('facebook_url','options')){ ?><a target="_blank" class="social-facebook" href="<?= $fb ?>"></a><? } ?>
                <? if($yt = get_field('youtube_url','options')) { ?><a target="_blank" class="social-youtube2" href="<?= $yt ?>"></a><? } ?>
                <? if($li = get_field('linkedin_url','options')){ ?><a target="_blank" class="social-linkedin" href="<?= $li ?>"></a><? } ?>
            </nav>
            <nav id="main-nav" class="off">
                <? wp_nav_menu('container='); ?>
                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                	<label>
                		<span class="screen-reader-text">Search for:</span>
                		<input type="search" class="search-field" placeholder="Search..." value="" name="s" title="Search for:" />
                	</label>
                	<input type="submit" class="search-submit" value="Search" />
                </form>
            </nav>
            <h1 id="logo"><a href="<? bloginfo('url') ?>"><? bloginfo('name') ?></a></h1>
        </div>
    </header>