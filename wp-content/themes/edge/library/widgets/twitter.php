<?php
/**
 * Twitter Widget
 */


/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'unisphere_load_twitter_widget' );


/**
 * Register our widget.
 * 'UniSphere_Twitter_Widget' is the widget class used below.
 */
function unisphere_load_twitter_widget() {
	register_widget( 'UniSphere_Twitter_Widget' );
}


/**
 * UniSphere_Twitter_Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 */
class UniSphere_Twitter_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function UniSphere_Twitter_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget-twitter', 'description' => 'The most recent tweets from your Twitter account' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'unisphere-twitter-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'unisphere-twitter-widget', 'UniSphere Twitter', $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$username = $instance['username'];
		$numbertweets = $instance['numbertweets'];
		$interval = $instance['interval'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by theme). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display tweets. */

		parse_twitter_cache_feed( $username, $numbertweets, $interval );

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
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['numbertweets'] = strip_tags( $new_instance['numbertweets'] );
		$instance['interval'] = strip_tags( $new_instance['interval'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'numbertweets' => 3,
							'username' => '',
							'interval' => 1800 );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        
        <!-- Widget Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>">Username:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" class="widefat" />
		</p>
        
		<!-- Widget Number of Tweets: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'numbertweets' ); ?>">Number of tweets to show:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'numbertweets' ); ?>" name="<?php echo $this->get_field_name( 'numbertweets' ); ?>" value="<?php echo $instance['numbertweets']; ?>" size="3" />
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
	Parse Twitter Feeds
	based on code from http://spookyismy.name/old-entries/2009/1/25/latest-twitter-update-with-phprss-part-three.html
	and cache code from http://snipplr.com/view/8156/twitter-cache/
	and other cache code from http://wiki.kientran.com/doku.php?id=projects:twitterbadge
*/
function parse_twitter_cache_feed($usernames, $limit, $interval) {
	$username_for_feed = str_replace(" ", "", $usernames);
	$feed = "http://twitter.com/statuses/user_timeline/" . $username_for_feed . ".atom?include_rts=true&count=" . $limit;	
	$db_cache_field = UNISPHERE_THEMEOPTIONS . '-' . $username_for_feed . '-' . $limit . '-twitter-cache';
	$db_cache_field_last_updated = UNISPHERE_THEMEOPTIONS . '-' . $username_for_feed . '-' . $limit . '-last-updated';
	$last = get_option( $db_cache_field_last_updated );
	$now = time();
	// check the cache
	if ( !$last || (( $now - $last ) > $interval) ) {
		// cache doesn't exist, or is old, so refresh it
		if( function_exists('curl_init') ) { // if cURL is available, use it...
			echo "<!-- DEBUG: Twitter feed for " . $username_for_feed . " retrieved using cURL -->";
			$ch = curl_init($feed);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$cache_rss = curl_exec($ch);
			curl_close($ch);
		} else {
			$cache_rss = file_get_contents($feed); // ...if not, use the common file_get_contents()
		}
		if (!$cache_rss) {
			// we didn't get anything back from twitter
			echo "<!-- ERROR: Twitter feed for " . $username_for_feed . " was blank! Using cache entry -->";
		} else {
			// Check if we got a reponse telling our limit api requests exceded the 150 per hour
			if (strpos($cache_rss, 'Rate limit exceeded') !== false) {
				// we exceded the 150 api request limit
				echo "<!-- ERROR: Rate limit exceeded for " . $username_for_feed . "! Using cache entry -->";
			} else {
				// we got good results from twitter
				echo "<!-- SUCCESS: Twitter feed for " . $username_for_feed . " used to update cache entry -->";
				update_option( $db_cache_field, $cache_rss );
				update_option( $db_cache_field_last_updated, time() );
			}			
		}
		// read from the cache file
		$rss = get_option( $db_cache_field );
	}
	else {
		// cache file is fresh enough, so read from it
		echo "<!-- SUCCESS: Cache entry was recent enough to read from -->";
		$rss = get_option( $db_cache_field );
	}
	// clean up and output the twitter feed
	$feed = str_replace("&amp;", "&", $rss);
	$feed = str_replace("&lt;", "<", $feed);
	$feed = str_replace("&gt;", ">", $feed);
	$clean = explode("<entry>", $feed);
	$clean = str_replace("&quot;", "'", $clean);
	$clean = str_replace("&apos;", "'", $clean);
	$amount = count($clean) - 1;
	if ($amount) { // are there any tweets?
		echo '<ul>';
		for ($i = 1; $i <= $amount; $i++) {
			$entry_close = explode("</entry>", $clean[$i]);
			$clean_content_1 = explode("<content type=\"html\">", $entry_close[0]);
			$clean_content = explode("</content>", $clean_content_1[1]);
			$clean_content = str_replace($username_for_feed . ": ", "", $clean_content);
			$clean_content = twitterize($clean_content);
			
			$clean_time_1 = explode("<published>", $entry_close[0]);
			$clean_time = explode("</published>", $clean_time_1[1]);

			$clean_link_1 = explode("<link href=\"", $entry_close[0]);
			$clean_link = explode("\" rel=\"alternate\" type=\"text/html\"/>", $clean_link_1[1]);
			
			$unix_time = strtotime($clean_time[0]);
			$pretty_time = relativeTime($unix_time);
			?>
            	<li>
                	<p class="tweet"><?php echo $clean_content[0]; ?></p>
                    <small><a href="<?php echo $clean_link[0]; ?>"><?php echo $pretty_time; ?></a></small>
				</li>
			<?php
		}
		echo '</ul>';
	} else { // if there aren't any tweets
		?>
        <ul>
        	<li>
                <p class="tweet"><?php _e( 'No tweets were found.', 'unisphere' ); ?></p>
             </li>			
        </ul>
		<?php
	}
}

/*
	Relative Time Function
	based on code from http://stackoverflow.com/questions/11/how-do-i-calculate-relative-time/501415#501415
	For use in the "Parse Twitter Feeds" code above
*/
define("SECOND", 1);
define("MINUTE", 60 * SECOND);
define("HOUR", 60 * MINUTE);
define("DAY", 24 * HOUR);
define("MONTH", 30 * DAY);
function relativeTime($time)
{   
    $delta = time() - $time;

    if ($delta < 1 * MINUTE)
    {
        return $delta == 1 ? "one second ago" : $delta . " seconds ago";
    }
    if ($delta < 2 * MINUTE)
    {
      return "a minute ago";
    }
    if ($delta < 45 * MINUTE)
    {
        return floor($delta / MINUTE) . " minutes ago";
    }
    if ($delta < 90 * MINUTE)
    {
      return "an hour ago";
    }
    if ($delta < 24 * HOUR)
    {
      return floor($delta / HOUR) . " hours ago";
    }
    if ($delta < 48 * HOUR)
    {
      return "yesterday";
    }
    if ($delta < 30 * DAY)
    {
        return floor($delta / DAY) . " days ago";
    }
    if ($delta < 12 * MONTH)
    {
      $months = floor($delta / DAY / 30);
      return $months <= 1 ? "one month ago" : $months . " months ago";
    }
    else
    {
        $years = floor($delta / DAY / 365);
        return $years <= 1 ? "one year ago" : $years . " years ago";
    }
}


/**
 * Add links to Hashtags, Accounts and URLs in a string
 */
function twitterize($raw_text) {
	$output = $raw_text;
	
	// parse urls
	$pattern = '/([A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+)/i';
	$replacement = '<a href="$1">$1</a>';
	$output = preg_replace($pattern, $replacement, $output);
	
	// parse usernames
	$pattern = '/[@]+([A-Za-z0-9-_]+)/';
	$replacement = '<a href="http://twitter.com/$1">@$1</a>';
	$output = preg_replace($pattern, $replacement, $output);
	
	// parse hashtags
	$pattern = '/(?<!&)[#]+([A-Za-z0-9-_]+)/';
	$replacement = '<a href="http://search.twitter.com/search?q=%23$1">#$1</a>';
	$output = preg_replace($pattern, $replacement, $output);
	
	return $output;
}
?>
