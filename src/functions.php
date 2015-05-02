<?php

//---------------------------------------------------------------------------------
//	Aktivera den inbyggda menyfunktionalliteten
//---------------------------------------------------------------------------------

add_theme_support( 'menus' );


//---------------------------------------------------------------------------------
//	Aktivera widgets
//---------------------------------------------------------------------------------

if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'before_widget' => '<section>',
	'after_widget' => '</section>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
));


//---------------------------------------------------------------------------------
//	Inkludera jQuery från Google
//---------------------------------------------------------------------------------

if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"), false);
	wp_enqueue_script('jquery');
}


//---------------------------------------------------------------------------------
//	Ta bort blandat skräp från head
//---------------------------------------------------------------------------------

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


//---------------------------------------------------------------------------------
//	Lägg till Google Analytics i footern, ändra UA-XXXXX-X till din egen tracking-kod
//---------------------------------------------------------------------------------
/*
function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');
*/

?>