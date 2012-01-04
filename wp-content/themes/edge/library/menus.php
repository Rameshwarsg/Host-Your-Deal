<?php
/**
 * Wordpress 3 menu system
 */
 
/**
 * unisphere_menu_ulclass() adds css class to the <ul> tag in wp_page_menu.
 */
function unisphere_menu_ulclass( $ulclass ) {
	return preg_replace( '/<ul>/', '<ul class="nav">', $ulclass, 1 );
}

add_filter( 'wp_page_menu', 'unisphere_menu_ulclass' ); // adds a .nav class to the ul wp_page_menu generates


/**
 * Add the new menu system support in WP 3.0
 */
if ( function_exists( 'register_nav_menus' ) ) {	
	register_nav_menus( array(
		'header_menu' => 'Header Navigation',
	) );
}


/**
 * Function that renders Header Navigation as a fallback of the WP 3.0 menu system
 */
function unisphere_header_navigation() {
	wp_page_menu( 'show_home=0&sort_column=menu_order&menu_class=menu' );
}
?>