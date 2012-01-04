<?php 
/*
Template Name: Contact Page
*/

global $unisphere_options;

//If the form is submitted
if(isset($_POST['submitted'])) {

	$name = trim($_POST['contact_name']);
	$email = trim($_POST['contact_email']);
	$subject = trim($_POST['contact_subject']);

	if(function_exists('stripslashes')) {
		$message = stripslashes(trim($_POST['contact_message']));
	} else {
		$message = trim($_POST['contact_message']);
	}

	$emailTo = $unisphere_options['destination_email'];

	$subject_email = sprintf( __( 'Contact Form Submission from %s', 'unisphere' ), $name );
	
	$body = __( 'Name' , 'unisphere' ) . ": " . $name . "\n\n" . __( 'Email' , 'unisphere' ) . ": " . $email . "\n\n" . __( 'Subject' , 'unisphere' ) . ": " . $subject . "\n\n" . __( 'Message' , 'unisphere' ) . ": " . $message;
	$headers = 'From: '.$email . "\r\n" . 'Reply-To: ' . $email;
	
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
		if ( substr($key,0,2) == 'd_' )
		{
			//we have our decoy value
			$decoy = $value;
		}
		
		if ( substr($key,0,2) == 't_' )
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

get_header(); ?>

	<?php
	 // Get the sub-header from sub-header.php
	 get_template_part( 'sub-header' );
	?>

	<!--BEGIN #content-->
	<div id="content" class="page clearfix">

        <!--BEGIN #primary-->
		<div id="primary">
        
        	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>
			
                <p class="success-sending-message"><?php echo wpml_t( 'unisphere', 'Contact Form Success Message', $unisphere_options['email_success'] ); ?></p>
                <p class="error-sending-message"><?php echo wpml_t( 'unisphere', 'Contact Form Error Message', $unisphere_options['email_error'] ); ?></p>

                <div id="contact-form">

                    <form action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" id="contactForm" method="post">

                        <div class="form-section">
                            <p><input type="text" tabindex="3" id="contact_name" name="contact_name" value="<?php if(isset($_POST['contact_name'])) echo $_POST['contact_name'];?>" class="requiredField" /></p>
                            <label for="contact_name"><?php _e( 'Name' , 'unisphere' ) ?></label>
                        </div>

                        <div class="form-section">
                            <p><input type="text" tabindex="4" id="contact_email" name="contact_email" value="<?php if(isset($_POST['contact_email']))  echo $_POST['contact_email'];?>" class="requiredField email" /></p>
                            <label for="contact_email"><?php _e( 'Email' , 'unisphere' ) ?></label>                                
                        </div>

                        <div class="form-section">
                            <p><input type="text" tabindex="5" id="contact_subject" name="contact_subject" value="<?php if(isset($_POST['contact_subject'])) echo $_POST['contact_subject'];?>" class="requiredField" /></p>
                            <label for="contact_subject"><?php _e( 'Subject' , 'unisphere' ) ?></label>
                        </div>

                        <div class="form-section">
                            <p><textarea cols="65" rows="9" tabindex="6" id="contact_message" name="contact_message" class="requiredField"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea></p>
                            <label for="contact_subject" style="display: none;"><?php _e( 'Message' , 'unisphere' ) ?></label>
                        </div>
                        
                        <?php // Ignore the 2 following fields, they are here to prevent SPAM bots
						$decoy = array('d_name','d_password','d_pw','d_user','d_username','d_comment');
						$timer = array('t_name_','t_pw_','t_username_','t_age_');

						$default_1 = $decoy[array_rand($decoy)];
						$default_2 = $timer[array_rand($timer)] .time();                            
                        ?>
                        
						<input type="text" name="<?php echo $default_1 ?>" style="display:none; position:absolute; left:9000px; top:9000px;" />
						<input type="text" name="<?php echo $default_2 ?>" style="display:none; position:absoute; left:9999px; top:9999px;" />

                        <div class="form-section">
                            <button tabindex="7" type="submit" id="unisphere-submit" name="unisphere-submit"><?php _e( 'Send Message' , 'unisphere' ) ?></button>
                            <input type="hidden" name="submitted" id="submitted" value="true" />
                            <span class="sending-message"><?php _e( 'Sending your message...' , 'unisphere' ) ?></span>
                        </div>

                    </form>

                </div>
            
			<?php endwhile; ?>

		<!--END #primary-->
		</div>
        
        <?php get_sidebar(); ?>

	<!--END #content-->
	</div>

<?php get_footer(); 
} ?>