<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/><meta name="MSSmartTagsPreventParsing" content="true" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <? if (is_front_page()) { ?><title><? bloginfo('name'); ?> | <? bloginfo('description'); ?></title>
    <? } else { ?><title><? wp_title(''); ?> | <? bloginfo('name'); ?></title><? }; ?>
	<link type="text/css" rel="stylesheet" media="all" href="<? bloginfo('url'); ?>/ui/css/style.css?v=0" />
	<link type="text/css" rel="stylesheet" media="all" href="<? bloginfo('url'); ?>/ui/css/media.css" />
	<link type="text/css" rel="stylesheet" media="all" href="<? bloginfo('url'); ?>/ui/css/style-new.css" />
    <link type="text/plain" rel="author" href="<? bloginfo('url') ?>/authors.txt" />
    <link type="image/x-icon" rel="shortcut icon" href="<? bloginfo('url') ?>/favicon.ico" />
    <script src="<? bloginfo('url'); ?>/ui/js/modernizr.js"></script>
    <script src="<? bloginfo('url'); ?>/ui/js/jquery.js" type="text/javascript"></script>
    <? wp_head(); ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-52846620-1', 'auto');
      ga('send', 'pageview');

    </script>
</head>

<body <? body_class() ?>>
    <!--[if lte IE 7]><iframe src="unsupported.html" frameborder="0" scrolling="no" id="no_ie6"></iframe><![endif]-->

	<header id="header">
    	<div class="container">
        	<div class="container-inner clearfix">
            	<h1 id="logo" class="pull-left">
                	<a href="<? bloginfo('url') ?>" title="">
                    	<img src="<? bloginfo('url') ?>/ui/images/logo.png" alt="" title="<? bloginfo('name') ?>" />
                    </a>
                </h1>
                <div id="toggle_menu_btn"></div>
                <nav id="nav" class="pull-right">
                    <? wp_nav_menu('container='); ?>
                </nav>
            </div>
        </div>
    </header>
    <? if(get_field('hero_image')){ $hero = get_field('hero_image'); $hero = $hero['sizes']['int-banner'] ?>
        <div id="hero-spacer"></div>
        <div id="int-hero" style="background-image:url(<?= $hero ?>)"></div>
    <? } ?>
