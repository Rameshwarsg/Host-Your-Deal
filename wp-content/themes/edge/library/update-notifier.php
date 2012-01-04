<?php
/**
 * Provides a notification everytime the theme is updated
 */
 
function unisphere_update_notifier_menu() {  
	if (function_exists('simplexml_load_string')) {
	    $xml = get_latest_theme_version(21600);
		$theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
		
		if( (float)$xml->latest > (float)$theme_data['Version']) {
			add_dashboard_page( UNISPHERE_THEMENAME . ' Theme Updates', UNISPHERE_THEMENAME . ' <span class="update-plugins count-1"><span class="update-count">New Updates</span></span>', 'administrator', UNISPHERE_THEMESHORTNAME . '-updates', 'unisphere_update_notifier');
		}
	}	
}

add_action('admin_menu', 'unisphere_update_notifier_menu');  


function unisphere_update_notifier_bar_menu() {
	if (function_exists('simplexml_load_string')) {
		global $wp_admin_bar, $wpdb;
	
		if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
		
		$xml = get_latest_theme_version(21600);
		$theme_data = get_theme_data(TEMPLATEPATH . '/style.css');
	
		if( (float)$xml->latest > (float)$theme_data['Version']) {
			$wp_admin_bar->add_menu( array( 'id' => 'unisphere_update_notifier', 'title' => '<span>' . UNISPHERE_THEMENAME . ' <span id="ab-updates">New Updates</span></span>', 'href' => get_admin_url() . 'index.php?page=' . UNISPHERE_THEMESHORTNAME . '-updates' ) );
		}
	}
}

add_action( 'admin_bar_menu', 'unisphere_update_notifier_bar_menu', 1000 );


function unisphere_update_notifier() { 
	$xml = get_latest_theme_version(21600);
	$theme_data = get_theme_data(TEMPLATEPATH . '/style.css'); ?>
	
	<style>
		.update-nag { display: none; }
		#instructions {max-width: 670px;}
		h3.title {margin: 30px 0 0 0; padding: 30px 0 0 0; border-top: 1px solid #ddd;}
	</style>

	<div class="wrap">
	
		<div id="icon-tools" class="icon32"></div>
		<h2><?php echo UNISPHERE_THEMENAME ?> Theme Updates</h2>
	    <div id="message" class="updated below-h2"><p><strong>There is a new version of the <?php echo UNISPHERE_THEMENAME; ?> theme available.</strong> You have version <?php echo $theme_data['Version']; ?> installed. Update to version <?php echo $xml->latest; ?>.</p></div>

		<img style="float: left; margin: 0 20px 20px 0; border: 1px solid #ddd;" src="<?php echo get_bloginfo( 'template_url' ) . '/screenshot.png'; ?>" />
		
		<div id="instructions">
		    <h3>Update Download and Instructions</h3>
		    <p><strong>Please note:</strong> make a <strong>backup</strong> of the Theme inside your WordPress installation folder <strong>/wp-content/themes/<?php echo UNISPHERE_THEMESHORTNAME; ?>/</strong></p>
		    <p>To update the Theme, login to <a href="http://www.themeforest.net/">ThemeForest</a>, head over to your <strong>downloads</strong> section and re-download the theme like you did when you bought it.</p>
		    <p>Extract the zip's contents, look for the extracted theme folder, and after you have all the new files upload them using FTP to the <strong>/wp-content/themes/<?php echo UNISPHERE_THEMESHORTNAME; ?>/</strong> folder overwriting the old ones (this is why it's important to backup any changes you've made to the theme files).</p>
		    <p>If you didn't make any changes to the theme files, you are free to overwrite them with the new ones without the risk of losing theme settings, pages, posts, etc, and backwards compatibility is guaranteed.</p>
		</div>
	    
	    <h3 class="title">Changelog</h3>
	    <?php echo $xml->changelog; ?>

	</div>
    
<?php } 

function get_latest_theme_version($interval) {
	$notifier_file_url = UNISPHERE_NOTIFIER_FILE;	
	$db_cache_field = UNISPHERE_THEMEOPTIONS . '-notifier-cache';
	$db_cache_field_last_updated = UNISPHERE_THEMEOPTIONS . '-notifier-last-updated';
	$last = get_option( $db_cache_field_last_updated );
	$now = time();
	// check the cache
	if ( !$last || (( $now - $last ) > $interval) ) {
		// cache doesn't exist, or is old, so refresh it
		if( function_exists('curl_init') ) { // if cURL is available, use it...
			$ch = curl_init($notifier_file_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			$cache = curl_exec($ch);
			curl_close($ch);
		} else {
			$cache = file_get_contents($notifier_file_url); // ...if not, use the common file_get_contents()
		}
		
		if ($cache) {			
			// we got good results
			update_option( $db_cache_field, $cache );
			update_option( $db_cache_field_last_updated, time() );			
		}
		// read from the cache file
		$notifier_data = get_option( $db_cache_field );
	}
	else {
		// cache file is fresh enough, so read from it
		$notifier_data = get_option( $db_cache_field );
	}
	
	// Let's see if the $xml data was returned as we expected it to
	if( strpos((string)$notifier_data, '<notifier>') === false ) {
		$notifier_data = '<?xml version="1.0" encoding="UTF-8"?><notifier><latest>1.0</latest><changelog></changelog></notifier>';
	}
	
	$xml = simplexml_load_string($notifier_data); 
	
	return $xml;
}

?>