<?php
/**
 * unisphere_scripts() loads cripts
 */
function unisphere_scripts() {
	
	global $unisphere_options;
	
	if( is_admin() ) return;
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, ''); // add the newest version of jQuery from Google CDN
	wp_enqueue_script( 'jquery' );
	
	wp_register_script( 'gmaps', ("http://maps.google.com/maps/api/js?sensor=false"), false, ''); // google maps api	
	wp_enqueue_script( 'gmaps' );
	
	wp_enqueue_script( 'swfobject' );
	wp_enqueue_script( 'scripts', UNISPHERE_JS . '/scripts.js', array( 'jquery' ) ); // Theme script dependencies

	if ( $unisphere_options['font'] != 'none' ) { wp_enqueue_script( 'cufon_font', UNISPHERE_JS . '/fonts/' . $unisphere_options['font'], array( 'jquery' ) ); } // Cufon Font

	wp_enqueue_script( 'screen', UNISPHERE_JS . '/screen.js', array( 'jquery' ) ); // Theme custom scripts
}

add_action( 'init', 'unisphere_scripts' ); // unisphere_scripts() loads scripts
?>