<?php
/**
 * Set the theme's max width for WordPress embedded videos
 */
if ( ! isset( $content_width ) ) $content_width = 960;


/**
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );


/**
 * Remove junk from head
 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


/**
 * Sets the post excerpt length to 45 words.
 */
function unisphere_excerpt_length( $length ) {
	return 45;
}
add_filter( 'excerpt_length', 'unisphere_excerpt_length' );


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis
 */
function unisphere_auto_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'unisphere_auto_excerpt_more' );


/**
 * Styles read more link
 */
function unisphere_more_link($link) {
  $link = preg_replace('/<a(.*?)>(.*?)<\/a>/im', '<p><a$1>' . __( 'read more &raquo;', 'unisphere' ) . '</a></p>', $link);
  
  return $link;
}

add_filter( 'the_content_more_link', 'unisphere_more_link' );



/**
 * Gets a specific number of words from a string and appends an ellipsis.
 */
function unisphere_custom_excerpt( $excerpt, $num_words ) {
	$excerpt = explode (' ', $excerpt);
	$excerpt = array_slice ($excerpt, 0, $num_words);
	return implode (' ', $excerpt) . '&hellip;';
}


/**
 * Exclude slider images from showing in the search results
 */
function unisphere_search_filter($query) {
	if ( !is_admin() ) {
	    if ($query->is_search) {
			$query->set('post_type', array('post', 'page', 'portfolio_cpt'));
	    }
	}
    return $query;
}
add_filter('pre_get_posts', 'unisphere_search_filter');


function unisphere_portfolio_preset_content() {
	global $post, $unisphere_options;

	if ( $post->post_content == '' && $post->post_type == 'portfolio_cpt' ) {
		$default_content = $unisphere_options['portfolio_default_text'];
	} else {
		$default_content = $post->post_content;
	} 

	return $default_content;
}

add_filter('the_editor_content', 'unisphere_portfolio_preset_content');


/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */
load_theme_textdomain( 'unisphere', TEMPLATEPATH . '/languages' );
?>