<?php
/**
 * Contact Form Widget
 */
 

/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'unisphere_load_contact_form_widget' );


/**
 * Register our widget.
 * 'UniSphere_Contact_Form_Widget' is the widget class used below.
 */
function unisphere_load_contact_form_widget() {
	register_widget( 'UniSphere_Contact_Form_Widget' );
}


/**
 * UniSphere_Contact_Form_Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 */
class UniSphere_Contact_Form_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function UniSphere_Contact_Form_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget-contact-form', 'description' => 'A contact form for users to get in touch' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'unisphere-contact-form-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'unisphere-contact-form-widget', 'UniSphere Contact Form', $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$destination_email = $instance['destination_email'];
		$success_msg = $instance['success_msg'];
		$error_msg = $instance['error_msg'];
		$button_text = $instance['button_text'];
		
		//If the form is submitted
		if(isset($_POST['submitted-widget'])) {
		
			$name = trim($_POST['contact_name']);
			$email = trim($_POST['contact_email']);
			$subject = trim($_POST['contact_subject']);

			if(function_exists('stripslashes')) {
				$message = stripslashes(trim($_POST['contact_message']));
			} else {
				$message = trim($_POST['contact_message']);
			}

			$emailTo = $destination_email;

			$subject_email = sprintf( __( 'Contact Form Submission from %s', 'unisphere' ), $name );
	
			$body = __( 'Name' , 'unisphere' ) . ": " . $name . "\n\n" . __( 'Email' , 'unisphere' ) . ": " . $email . "\n\n" . __( 'Subject' , 'unisphere' ) . ": " . $subject . "\n\n" . __( 'Message' , 'unisphere' ) . ": " . $message;
			$headers = 'From: '.$email. "\r\n" . 'Reply-To: ' . $email;
	
			/********** SPAM PROTECTION *************/
			$is_spam = false;
			
			//the nr. of seconds that below a form submission is considered too fast, therefore is submitted by a spambot
			$interval_limit = 5;
			
			//we will need this value when we check for form submission time
			$time_now = time();
			
			//check for the timer and the decoy post variables
			$decoy = false; $time = false;
			foreach ($_POST as $key => $value)
			{
				if ( substr($key,0,3) == 'wd_' )
				{
					//we have our decoy value
					$decoy = $value;
				}
				
				if ( substr($key,0,3) == 'wt_' )
				{
					//we have the timer value
					$tmp = explode("_",$key);
					$time = $tmp[2];
					$interval =  ($time_now - (int)$time);
				}	
			}
			
			//check for decoy value
			if ( ($decoy === false) || (!empty($decoy)) ) { $is_spam = true; }
			
			//check for timer
			if ( ($time === false) || ($interval < $interval_limit) ) { $is_spam = true; }
			
			// Check with Akismet, but only if Akismet is installed, activated, and has a KEY. (Recommended for spam control).
		    if(function_exists('akismet_http_post') && trim(get_option('wordpress_api_key')) != '' ) {
				global $akismet_api_host, $akismet_api_port;
				$c['user_ip']				= preg_replace( '/[^0-9., ]/', '', $_SERVER['REMOTE_ADDR'] );
				$c['blog']					= home_url();
				$c['comment_author']		= $name;
				$c['comment_author_email'] 	= $email;
				$c['comment_content'] 		= $message;
		
				$query_string = '';
				foreach ( $c as $key => $data ) {
					if( is_string($data) )
						$query_string .= $key . '=' . urlencode( stripslashes($data) ) . '&';
				}
				
				$response = akismet_http_post($query_string, $akismet_api_host, '/1.1/comment-check', $akismet_api_port);
				
				if ( 'true' == $response[1] ) { // Akismet says it's SPAM
					$is_spam = true;
				}
			}
			
			if( !$is_spam )
				wp_mail( $emailTo, $subject_email, $body, $headers );
				
		} else {

			/* Before widget (defined by themes). */
			echo $before_widget;
	
			/* Display the widget title if one was input (before and after defined by theme). */
			if ( $title )
				echo $before_title . $title . $after_title;
				
			/* Display contact form. */ 
			?>
            
            <p class="success-sending-message"><?php echo $success_msg; ?></p>
            <p class="error-sending-message"><?php echo $error_msg; ?></p>
    
            <div id="contact-form">
	
			<form action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" id="contactForm" method="post">
		
				<div class="form-section">
					<label for="contact_name"><?php _e( 'Name' , 'unisphere' ) ?></label>
					<p><input type="text" tabindex="13" id="contact_name" name="contact_name" value="<?php if(isset($_POST['contact_name'])) echo $_POST['contact_name'];?>" class="requiredField" /></p>
				</div>
	
				<div class="form-section">
					<label for="contact_email"><?php _e( 'Email' , 'unisphere' ) ?></label>
					<p><input type="text" tabindex="14" id="contact_email" name="contact_email" value="<?php if(isset($_POST['contact_email']))  echo $_POST['contact_email'];?>" class="requiredField email" /></p>
				</div>
	
				<div class="form-section">
					<label for="contact_subject"><?php _e( 'Subject' , 'unisphere' ) ?></label>
					<p><input type="text" tabindex="15" id="contact_subject" name="contact_subject" value="<?php if(isset($_POST['contact_subject'])) echo $_POST['contact_subject'];?>" class="requiredField" /></p>
				</div>
	
				<div class="form-section">
					<label for="contact_message"><?php _e( 'Message' , 'unisphere' ) ?></label>
					<p><textarea cols="65" rows="9" tabindex="16" id="contact_message" name="contact_message" class="requiredField"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea></p>
				</div>
				
				<?php // Ignore the 2 following fields, they are here to prevent SPAM bots
				$decoy = array('wd_name','wd_password','wd_pw','wd_user','wd_username','wd_comment');
				$timer = array('wt_name_','wt_pw_','wt_username_','wt_age_');

				$default_1 = $decoy[array_rand($decoy)];
				$default_2 = $timer[array_rand($timer)] .time();                            
                ?>
                
				<input type="text" name="<?php echo $default_1 ?>" style="display:none; position:absolute; left:9000px; top:9000px;" />
				<input type="text" name="<?php echo $default_2 ?>" style="display:none; position:absoute; left:9999px; top:9999px;" />
	
				<div class="form-section">
					<button tabindex="17" type="submit" id="unisphere-submit" name="unisphere-submit"><?php echo $button_text; ?></button>
					<input type="hidden" name="submitted-widget" id="submitted-widget" value="true" />					
				</div>
                
                <div class="sending-message"><?php _e( 'Sending your message...' , 'unisphere' ) ?></div>
	
			</form>
            
				</div>

<?php		/* After widget (defined by theme). */
			echo $after_widget;		
		}
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['destination_email'] = strip_tags( $new_instance['destination_email'] );
		$instance['success_msg'] = $new_instance['success_msg'];
		$instance['error_msg'] = $new_instance['error_msg'];
		$instance['button_text'] = strip_tags( $new_instance['button_text'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'destination_email' => '',
							'success_msg' => '<strong>Thanks!</strong> Your email was successfully sent. I check my email all the time, so I should be in touch soon.',
							'error_msg' => '<strong>There was an error sending your message.</strong> Please try again later.',
							'button_text' => 'Send Message' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        
		<!-- Widget Destination Email: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'destination_email' ); ?>">Destination Email:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'destination_email' ); ?>" name="<?php echo $this->get_field_name( 'destination_email' ); ?>" value="<?php echo $instance['destination_email']; ?>" class="widefat" />
		</p>
        
        <!-- Widget Button Text: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'button_text' ); ?>">Button Text:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" value="<?php echo $instance['button_text']; ?>" class="widefat" />
		</p>

		<!-- Widget Success Message: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'success_msg' ); ?>">Success Message:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'success_msg' ); ?>" name="<?php echo $this->get_field_name( 'success_msg' ); ?>" value="<?php echo $instance['success_msg']; ?>" class="widefat" />
		</p>
        
        <!-- Widget Error Message: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'error_msg' ); ?>">Error Message:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'error_msg' ); ?>" name="<?php echo $this->get_field_name( 'error_msg' ); ?>" value="<?php echo $instance['error_msg']; ?>" class="widefat" />
		</p>

	<?php
	}
}
?>