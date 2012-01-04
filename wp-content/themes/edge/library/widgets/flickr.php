<?php
/**
 * Flickr Widget
 */


/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'unisphere_load_flickr_widget' );


/**
 * Register our widget.
 * 'UniSphere_Flickr_Widget' is the widget class used below.
 */
function unisphere_load_flickr_widget() {
	register_widget( 'UniSphere_Flickr_Widget' );
}


/**
 * UniSphere_Flickr_Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 */
class UniSphere_Flickr_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function UniSphere_Flickr_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget-flickr', 'description' => 'Flickr images from a Flickr ID' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'unisphere-flickr-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'unisphere-flickr-widget', 'UniSphere Flickr', $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$flickrID = $instance['flickrID'];
		$numberimages = $instance['numberimages'];
		$lightbox = isset( $instance['lightbox'] ) ? ($instance['lightbox'] == 'on' ? true : false ) : false;
		$interval = $instance['interval'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by theme). */
		if ( $title )
			echo $before_title . $title . $after_title;
			
		/* Display images */
		parse_flickr_cache_feed( $flickrID, $numberimages, $lightbox, $interval );

		/* After widget (defined by theme). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['flickrID'] = strip_tags( $new_instance['flickrID'] );
		$instance['lightbox'] = $new_instance['lightbox'];
		$instance['numberimages'] = strip_tags( $new_instance['numberimages'] );
		$instance['interval'] = strip_tags( $new_instance['interval'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'numberimages' => 9,
							'flickrID' => '',
							'lightbox' => '',
							'interval' => 1800 );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        
        <!-- Widget Flickr ID: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'flickrID' ); ?>">Flickr ID:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'flickrID' ); ?>" name="<?php echo $this->get_field_name( 'flickrID' ); ?>" value="<?php echo $instance['flickrID']; ?>" class="widefat" />
		</p>
        
		<!-- Widget Number of Images: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'numberimages' ); ?>">Number of images to show:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'numberimages' ); ?>" name="<?php echo $this->get_field_name( 'numberimages' ); ?>" value="<?php echo $instance['numberimages']; ?>" size="3" />
		</p>
		
		<!-- Widget Lightbox: Checkbox -->
		<p>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'lightbox' ); ?>" name="<?php echo $this->get_field_name( 'lightbox' ); ?>" class="checkbox" <?php checked( $instance['lightbox'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id( 'lightbox' ); ?>"> Display in Lightbox?</label>
		</p>
        
        <!-- Widget Cache Interval: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'interval' ); ?>">Cache interval in seconds:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'interval' ); ?>" name="<?php echo $this->get_field_name( 'interval' ); ?>" value="<?php echo $instance['interval']; ?>" size="3" />
		</p>

	<?php
	}
}

/*
	Parse Flickr Feeds
	cache code from http://snipplr.com/view/8156/twitter-cache/
	and other cache code from http://wiki.kientran.com/doku.php?id=projects:twitterbadge
*/
function parse_flickr_cache_feed($flickrID, $limit, $lightbox, $interval) {
	if( trim( $flickrID ) == '' ) {
		echo '<p>Invalid Flickr ID</p>';
	} else {		
		$feed = 'http://api.flickr.com/services/feeds/photos_public.gne?id=' . $flickrID . '&format=php_serial';
		$db_cache_field = UNISPHERE_THEMEOPTIONS . '-' . $flickrID . '-' . $limit . '-flickr-cache';
		$db_cache_field_last_updated = UNISPHERE_THEMEOPTIONS . '-' . $flickrID . '-' . $limit . '-last-updated';
		$last = get_option( $db_cache_field_last_updated );
		$now = time();
		// check the cache
		if ( !$last || (( $now - $last ) > $interval) ) {
			// cache doesn't exist, or is old, so refresh it
			if( function_exists('curl_init') ) { // if cURL is available, use it...
				echo "<!-- DEBUG: Flickr feed for " . $flickrID . " retrieved using cURL -->";
				$ch = curl_init($feed);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				$cache_rss = curl_exec($ch);
				curl_close($ch);
			} else {
				$cache_rss = file_get_contents($feed); // ...if not, use the common file_get_contents()
			}
			if (!$cache_rss) {
				// we didn't get anything back from Flickr
				echo "<!-- ERROR: Flickr feed for " . $flickrID . " was blank! Using cache entry -->";
			} else {
				// we got good results from Flickr
				echo "<!-- SUCCESS: Flickr feed for " . $flickrID . " used to update cache entry -->";
				update_option( $db_cache_field, $cache_rss );
				update_option( $db_cache_field_last_updated, time() );						
			}
			// read from the cache file
			$rss = get_option( $db_cache_field );
		}
		else {
			// cache file is fresh enough, so read from it
			echo "<!-- SUCCESS: Cache entry was recent enough to read from -->";
			$rss = get_option( $db_cache_field );
		}
		
		$rsp_obj = unserialize($rss);
		
		$lightboxGalleryID = rand();
		
		echo '<ul>';
		
		for ($i = 0; $i < $limit; $i++) {
			$thumb_url = $rsp_obj['items'][$i]['thumb_url'];
			$title = $rsp_obj['items'][$i]['title'];
			$photo_url = $rsp_obj['items'][$i]['photo_url'];
			$url = $rsp_obj['items'][$i]['url'];			
			
			if( $lightbox ) {
				echo '<li><a href="' . $photo_url . '" title="' . $title . '" rel="lightbox[' . $lightboxGalleryID .  ']"><img src="' . $thumb_url . '" alt="' . $title . '" /></a></li>';
			} else {
				echo '<li><a href="' . $url . '" title="' . $title . '"><img src="' . $thumb_url . '" alt="' . $title . '" /></a></li>';
			}
		}
		
		echo '</ul>';
	}
}
?>