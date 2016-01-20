<?php

/* ========================================================================= */
/* !WORDPRESS EXTERNAL FILES     */
/* ========================================================================= */

include_once 'functions/functions-post-types.php';
include_once 'functions/functions-widgets.php';
//include_once 'functions/functions-comments.php';


/* ========================================================================= */
/* !WORDPRESS SECURITY */
/* ========================================================================= */

remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

/* Prevent Login Errors for Security */
add_filter('login_errors',create_function('$a', "return null;"));



/* ========================================================================= */
/* !WORDPRESS CUSTOMIZATION & SETUP */
/* ========================================================================= */

/* Post Thumbnail Sizes */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 64, 64, true );
add_image_size( 'pf11',        238,  238,  true  );
add_image_size( 'pf12',        238,  478,  true  );
add_image_size( 'pf21',        478,  238,  true  );
add_image_size( 'pf22',        478,  478,  true  );
add_image_size( 'pf-full',     600,  1000, false );
add_image_size( 'home-banner', 1200, 676,  true  );
add_image_size( 'int-banner',  1400, 230,  true  );
add_image_size( 'team-full',   552,  310,  true  );
add_image_size( 'team-thb',    225,  225,  true  );
add_image_size( 'team-side',   106,  106,  true  );
add_image_size( 'box',         300,  218,  true  );
add_image_size( 'home-bucket', 300,  161,  true  );
add_image_size( 'news-thb',    160,  115,  true  );
add_image_size( 'news-side',   340,  185,  true  );
add_image_size( 'home-bucket-n',   318,  244,  true  );
add_image_size( 'home-rw4',   318,  234,  true  );

/* Declare Nav Menu Areas */
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
               'main-menu' => 'Main Menu',
               'footer-menu' => 'Footer Menu'
		)
	);
}


/* Add a Stylesheet for Admin Content Area */
function admin_font_setup(){
    add_editor_style( array( 'style-editor.css', '/' ) );
}
add_action( 'after_setup_theme', 'admin_font_setup' );


/* Globally Hide Admin Meta Boxes */
function hide_meta_boxes() {
     remove_meta_box('postcustom','post','normal'); // custom fields post
     remove_meta_box('postcustom','page','normal'); // custom fields page

     //remove_meta_box('commentstatusdiv','post','normal'); // discussion post
     remove_meta_box('commentstatusdiv','page','normal'); // discussion page

     //remove_meta_box('commentsdiv','post','normal'); // comments post
     //remove_meta_box('commentsdiv','page','normal'); // comments page

     //remove_meta_box('authordiv','post','normal'); // author post
     remove_meta_box('authordiv','page','normal'); // author page

     //remove_meta_box('revisionsdiv','post','normal'); // revisions post
     //remove_meta_box('revisionsdiv','page','normal'); // revisions page

     //remove_meta_box('postimagediv','post','normal'); // featured image post
     remove_meta_box('postimagediv','page','normal'); // featured image page

     //remove_meta_box('pageparentdiv','page','normal'); // page attributes

     //remove_meta_box('tagsdiv-post-tag','post','normal'); // post tags
     //remove_meta_box('categorydiv','post','normal'); // post categories
     //remove_meta_box('postexcerpt','post','normal'); // post excerpt
     remove_meta_box('trackbacksdiv','post','normal'); // track backs
}
add_action('admin_init', 'hide_meta_boxes');


/* Hide Wordpress Default Dashboard Widgets */
function remove_dashboard_widgets() {

	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);

	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

/* ========================================================================= */
/* !CUSTOM LOGIN STYLES */
/* ========================================================================= */

function my_login_stylesheet() {
   wp_enqueue_style( 'custom-login', home_url() . '/ui/css/login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

function jrd_login() {
    echo '<a href="http://www.jumpingjackrabbit.com/" target="_blank">';
    echo '<div id="jrd-login"></div>';
    echo '</a>';
}
add_action( 'login_footer', 'jrd_login' );


/* ========================================================================= */
/* !LIMIT EXCERPT LENGTH */
/* ========================================================================= */

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/* ========================================================================= */
/* !GRAVITY FORM CUSTOMIZATIONS */
/* ========================================================================= */

add_filter("gform_submit_button", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
  $button_array = $form["button"];
  $button_text = $button_array["text"];
    return "<button type='submit' class='submit' id='gform_submit_button_{" . $form["id"] . "}'><span>$button_text</span></button>";
}



/* ========================================================================= */
/* !WORDPRESS SUBPAGE SIDEBAR MENU */
/* ========================================================================= */

function jrd_tertiary_menu( $args )
{
	include_once 'functions/class-walker-tertiary-menu.php';
	$uri_parts = explode('/', $_SERVER['REQUEST_URI']);
	$args['ancestor'] = get_page_by_path($uri_parts[1]);
	$args['echo'] = false;
	$args['walker'] = new Walker_Tertiary_Menu();
	return wp_nav_menu($args);
}


function check_is_subpage() {
    global $post;                                 // load details about this page
    if ( is_page() && $post->post_parent ) {      // test to see if the page has a parent
           return $post->post_parent;             // return the ID of the parent post
    } else {                                      // there is no parent so...
           return false;                          // ...the answer to the question is false
    }
}


/* HOW TO USE
   Plug this code below into your submenu sidebar and set the theme location to use the menu you want to reference. This code checks whether the page is a subpage.
   If page is a subpage it echos the children menu items of it. If page is not it then echos the top level pages of the menu.

<?php if(check_is_subpage() == false){ ?>
    <h3><?php bloginfo('name'); ?></h3>
    <div class="submenu-widget">
        <?php wp_nav_menu(array('theme_location' => 'main-menu', 'container' => '', 'menu_class' => 'menu', 'menu_id' => '', 'depth' => 2)); ?>
    </div>
<?php } else { ?>
    <h3><?php $anc = get_ancestors(get_the_ID(),'page'); $count = count($anc); if($count > 0){ $anc_pg = get_post($anc[($count - 1)]); echo $anc_pg->post_title; } else the_title(); ?></h3>
    <div class="submenu-widget">
        <?php echo jrd_tertiary_menu(array('theme_location' => 'main-menu', 'container' => '', 'menu_class' => 'menu', 'menu_id' => '', 'depth' => 3)); ?>
    </div>
<?php } ?>
*/




/* ========================================================================= */
/* !WORDPRESS PAGINATION SCRIPT */
/* ========================================================================= */
/*
function jrd_paginate() {
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

	$pagination = array(
		'base' => @add_query_arg('page','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => false,
		'mid_size' => 1,
		'end_size' => 3,
		'type' => 'list',
		'next_text' => 'Older &raquo;',
		'prev_text' => '&laquo; Newer'
		);

	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => urlencode(get_query_var( 's' )) );

	echo '<div class="pagination">';
	echo paginate_links( $pagination );
	echo '</div>';
}
*/


/* ========================================================================= */
/* !SHORTCUT CODES */
/* ========================================================================= */
/*
function morelink($atts, $content = null) {
    extract(shortcode_atts(array(
        "link" => '',
        "target" => ''
    ), $atts));
    return '<a href="'.$link.'" class="button btn-read-more" target="'.$target.'">'.$content.'</a>';
}
add_shortcode('button', 'morelink');
*/




/* ========================================================================= */
/* !TINYMCE SELECT DROPDOWN CLASS SETUP CODES */
/* ========================================================================= */

/*
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(
    	array(
    		'title' => 'Gray Box Button',
    		'selector' => 'a',
    		'classes' => 'box-link'
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}
*/


/* ========================================================================= */
/* !WORDPERSS CUSTOM THEME FUNCTIONS */
/* ========================================================================= */

/* ----- SHOW FUTURE POSTS FOR EVENT CUSTOM POST TYPES ----- */
/*
function show_future_posts($posts) {
   global $wp_query, $wpdb;
   if(is_single() && $wp_query->post_count == 0)
   {
      $posts = $wpdb->get_results($wp_query->request);
   }
   return $posts;
}
add_filter('the_posts', 'show_future_posts');
*/

/* ----- Get File Extension (ex: PDF, DOC) ----- */
/*
function jrd_get_file_ext($file_url){
	return pathinfo($file_url, PATHINFO_EXTENSION);
}
*/

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
	    'page_title' => 'Options',
	    'menu_slug' => 'options'
	));
}


function my_acf_admin_head()
{
	?>
	<style type="text/css">

        #acf-grid_orientation ul{ padding-top:60px; background:url('/ui/images/grids.gif') no-repeat left top !important; }
        #acf-grid_orientation ul li { width:100px; text-align: center; margin:0; }

	</style>

	<?php
}

//add_action('acf/input/admin_head', 'my_acf_admin_head');

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}
