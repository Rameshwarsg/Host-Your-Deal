<?php
/**
 * Adds the custom admin panel to the admin area
 */

function unisphere_admin() {  
	include( UNISPHERE_ADMIN . '/panel.php');  
}  

function unisphere_admin_init() {
	wp_enqueue_style( "admin_css", UNISPHERE_ADMIN_CSS . "/admin.css", false, "1.0", "all"); // CSS
	wp_enqueue_style( "colorpicker_css", UNISPHERE_ADMIN_CSS . "/colorpicker.css", false, "1.0", "all"); // CSS Colopicker
	
    /* Register our scripts. This is loaded only in the Theme admin panel */
   	wp_enqueue_script( array("jquery", "jquery-ui-core", "interface", "jquery-ui-sortable", "wp-lists", "jquery-ui-sortable") ); // jQuery UI Sortable
    wp_register_script('colorpicker_js', UNISPHERE_ADMIN_JS . '/colorpicker.js', false, "1.0");
    wp_register_script('admin_js', UNISPHERE_ADMIN_JS . '/admin.js', false, "1.0");
}

// Adds the Unisphere Menu to the Wordpress admin area
function unisphere_admin_menu() {  
    $page = add_menu_page(UNISPHERE_THEMENAME, UNISPHERE_THEMENAME, 'administrator', UNISPHERE_THEMESHORTNAME, "unisphere_admin");
    add_action('admin_print_scripts-' . $page, 'unisphere_admin_scripts');
}  

function unisphere_admin_scripts() {
    wp_enqueue_script('colorpicker_js');
    wp_enqueue_script('admin_js');
}

add_action('admin_init', 'unisphere_admin_init');
add_action('admin_menu', 'unisphere_admin_menu');
?>