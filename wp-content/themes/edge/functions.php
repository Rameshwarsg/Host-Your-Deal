<?php
/**
 * UniSphere framework functions
 */

/**
 * Define framework contants
 */
define( 'UNISPHERE_THEMENAME', 'Edge' ); // The theme name
define( 'UNISPHERE_THEMESHORTNAME', 'edge' ); // The theme short name
define( 'UNISPHERE_THEMEOPTIONS', 'edge' ); // The theme database option variable
define( 'UNISPHERE_NOTIFIER_FILE', 'http://notifier.unispheredesign.com/edge/notifier.xml' ); // The notifier file containing the latest version of the theme

// Folder shortcuts
define( 'UNISPHERE_LIBRARY', TEMPLATEPATH . '/library' ); // Shortcut to point to the /library/ dir
define( 'UNISPHERE_ADMIN', UNISPHERE_LIBRARY . '/admin' ); // Shortcut to point to the /admin/ dir

// URI shortcuts
define( 'UNISPHERE_CSS', get_bloginfo( 'template_url' ) . '/css', true ); // Shortcut to point to the /css/ URI
define( 'UNISPHERE_IMAGES', get_bloginfo( 'template_url' ) . '/images', true ); // Shortcut to point to the /images/ URI
define( 'UNISPHERE_JS', get_bloginfo( 'template_url' ) . '/js', true ); // Shortcut to point to the /js/ URI
define( 'UNISPHERE_ADMIN_CSS', get_bloginfo( 'template_url' ) . '/library/admin/css', true ); // Shortcut to point to the /library/admin/css/ URI
define( 'UNISPHERE_ADMIN_IMAGES', get_bloginfo( 'template_url' ) . '/library/admin/images', true ); // Shortcut to point to the /library/admin/images/ URI
define( 'UNISPHERE_ADMIN_JS', get_bloginfo( 'template_url' ) . '/library/admin/js', true ); // Shortcut to point to the /library/admin/js/ URI


/**
 * Include required framework files
 */
require_once(UNISPHERE_LIBRARY . '/options.php');
require_once(UNISPHERE_LIBRARY . '/misc.php');
require_once(UNISPHERE_LIBRARY . '/post-types.php');
require_once(UNISPHERE_LIBRARY . '/post-formats.php');
require_once(UNISPHERE_LIBRARY . '/semantic-classes.php');
require_once(UNISPHERE_LIBRARY . '/scripts.php');
require_once(UNISPHERE_LIBRARY . '/menus.php');
require_once(UNISPHERE_LIBRARY . '/media.php');
require_once(UNISPHERE_LIBRARY . '/helpers.php');
require_once(UNISPHERE_LIBRARY . '/widgets.php');
require_once(UNISPHERE_LIBRARY . '/gallery.php');
require_once(UNISPHERE_LIBRARY . '/custom-fields.php');
require_once(UNISPHERE_LIBRARY . '/shortcodes.php');
require_once(UNISPHERE_LIBRARY . '/comments.php');
require_once(UNISPHERE_LIBRARY . '/update-notifier.php');
require_once(UNISPHERE_LIBRARY . '/widgets/popular-posts.php');
require_once(UNISPHERE_LIBRARY . '/widgets/recent-posts.php');
require_once(UNISPHERE_LIBRARY . '/widgets/twitter.php');
require_once(UNISPHERE_LIBRARY . '/widgets/contact-form.php');
require_once(UNISPHERE_LIBRARY . '/widgets/flickr.php');
require_once(UNISPHERE_ADMIN . '/start.php');

require_once(UNISPHERE_LIBRARY . '/wpml-integration.php'); // Load WPML functions 
require_once(UNISPHERE_LIBRARY . '/wpml-strings.php'); // Prepare the theme's dynamic strings for WPML translation

/**
 * Add default theme options to database on theme activation
 */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	unisphere_add_default_option( "skin", "light" );
	unisphere_add_default_option( "main_color", "#37ba98" );
	unisphere_add_default_option( "link_color", "#37ba98" );
	unisphere_add_default_option( "font", "Droid_Sans.font.js" );
	unisphere_add_default_option( "slider", "normal_slider" );
	unisphere_add_default_option( "slider_posts_number", "9" );
	unisphere_add_default_option( "slider_seconds", "4000" );
	unisphere_add_default_option( "slider_transition_seconds", "500" );
	unisphere_add_default_option( "slider_slices", "15" );
	unisphere_add_default_option( "slider_effect", "random" );
	unisphere_add_default_option( "show_4_home_sections", "1" );
	unisphere_add_default_option( "home_section_1", "<h3>Box Title 1</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, rutrum. <a href=\"#\">read more &raquo;</a></p>\n<p>[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x80.jpg\" alt=\"placeholder image\" /]</p>" );
	unisphere_add_default_option( "home_section_2", "<h3>Box Title 2</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, rutrum. <a href=\"#\">read more &raquo;</a></p>\n<p>[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x80.jpg\" alt=\"placeholder image\" /]</p>" );
	unisphere_add_default_option( "home_section_3", "<h3>Box Title 3</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, rutrum. <a href=\"#\">read more &raquo;</a></p>\n<p>[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x80.jpg\" alt=\"placeholder image\" /]</p>" );
	unisphere_add_default_option( "home_section_4", "<h3>Box Title 4</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, rutrum. <a href=\"#\">read more &raquo;</a></p>\n<p>[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x80.jpg\" alt=\"placeholder image\" /]</p>" );
	unisphere_add_default_option( "show_home_portfolio", "1" );
	unisphere_add_default_option( "home_portfolio_title", "Latest from our <strong>Portfolio</strong>" );
	unisphere_add_default_option( "show_home_blog", "1" );
	unisphere_add_default_option( "home_blog_title", "Latest from our <strong>Blog</strong>" );
	unisphere_add_default_option( "show_blog_tweet_button", "1" );
	unisphere_add_default_option( "show_blog_fb_like_button", "1" );
	unisphere_add_default_option( "show_meta_author", "1" );
	unisphere_add_default_option( "show_meta_date", "1" );
	unisphere_add_default_option( "show_meta_categories", "1" );
	unisphere_add_default_option( "show_meta_tags", "1" );
	unisphere_add_default_option( "show_meta_comment_count", "1" );
	unisphere_add_default_option( "portfolio_permalink", "portfolio/detail" );
	unisphere_add_default_option( "portfolio_default_text", "[one_fourth]\n\t<h3>Services provided</h3>\n\t[list]\n\t\t<li><span>lorem ipsum</span></li>\n\t\t<li><span>lorem ipsum</span></li>\n\t\t<li><span>lorem ipsum</span></li>\n\t\t<li><span>lorem ipsum</span></li>\n\t\t<li><span>lorem ipsum</span></li>\n\t[/list]\n[/one_fourth]\n\n[three_fourth_last]\n\t<h3>About the project</h3>\n\t<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, ultrices consequat eu, vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, ultrices consequat eu, vehicula.</p>\n\t<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\n[/three_fourth_last]" );
	unisphere_add_default_option( "show_portfolio_tweet_button", "1" );
	unisphere_add_default_option( "show_portfolio_fb_like_button", "1" );
	unisphere_add_default_option( "email_success", "<strong>Thanks!</strong> Your email was successfully sent. I check my email all the time, so I should be in touch soon." );
	unisphere_add_default_option( "email_error", "<strong>There was an error sending your message.</strong> Please try again later." );
	unisphere_add_default_option( "footer_copyright", "Copyright &copy; 2010 All rights reserved" );
	unisphere_add_default_option( "show_footer_rss_link", "1" );
	unisphere_add_default_option( 'flush_rewrite_rules', '1' );
}

function unisphere_add_default_option( $name, $value ) {
	$options = get_option( UNISPHERE_THEMEOPTIONS );
	$options['dummy'] = 'dummy value'; // this initializes the array else the following if will never run on activation
	if ( $options and !isset($options[$name]) ) { // Adds new value...
		$options[$name] = $value;
		update_option( UNISPHERE_THEMEOPTIONS, $options );
	}
}
?>