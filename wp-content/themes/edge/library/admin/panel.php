<?php
if ( get_magic_quotes_gpc() ) {
    $_POST      = array_map( 'stripslashes_deep', $_POST );
    $_GET       = array_map( 'stripslashes_deep', $_GET );
    $_COOKIE    = array_map( 'stripslashes_deep', $_COOKIE );
    $_REQUEST   = array_map( 'stripslashes_deep', $_REQUEST );
}

$options = array (
 
	array( "name" => "General Settings",
		"type" => "title"),
	 
	array( "type" => "open"),
	
	array( "name" => "Header Logo",
		"desc" => "Upload your logo and enter the absolute path of your logo image here.",
		"id" => "logo",
		"type" => "text",
		"std" => ""),
		
	array( "name" => "Skin",
		"desc" => "Select the skin you want for the site.",
		"id" => "skin",
		"type" => "select",
		"options" => array (array( "value" => "light", "text" => "Light" ),
							array( "value" => "dark", "text" => "Dark" ) ),
		"std" => ""),
		
	array( "name" => "Main Color",
		"desc" => "Set the main theme color here.",
		"id" => "main_color",
		"type" => "colorpicker",
		"std" => "#37ba98"),
		
	array( "name" => "Link Color",
		"desc" => "Set the theme links color here.",
		"id" => "link_color",
		"type" => "colorpicker",
		"std" => "#37ba98"),
		
	array( "name" => "Cufon Font",
		"desc" => "Select the Cufon Font you want for the site, or disable it.",
		"id" => "font",
		"type" => "select",
		"options" => array (array( "value" => "none", "text" => "Disable Cufon"),
							array( "value" => "Comfortaa.font.js", "text" => "Comfortaa"),
							array( "value" => "Diavlo.font.js", "text" => "Diavlo"),
							array( "value" => "Droid_Sans.font.js", "text" => "Droid Sans"),
							array( "value" => "Sansation.font.js", "text" => "Sansation") ),
		"std" => ""),
	
	array( "name" => "Custom CSS",
		"desc" => "Add your custom css entries here.",
		"id" => "custom_css",
		"type" => "textarea",
		"std" => ""),

	array( "name" => "Custom Scripts",
		"desc" => "Add your custom scripts here like for example your Google Analytics code to track your visitors.",
		"id" => "custom_js",
		"type" => "textarea",
		"std" => ""),
	
	array( "type" => "close"),
	
	array( "name" => "Home Page Settings",
		"type" => "title"),
	 
	array( "type" => "open"),
	
	array( "name" => "Slider",
		"desc" => "Choose the slider you want to use in the Home Page.",
		"id" => "slider",
		"type" => "select",
		"options" => array (array( "value" => "no_slider", "text" => "No Slider"),
							array( "value" => "no_slider_sub_header", "text" => "No Slider with Sub-Header"),
							array( "value" => "stage_slider", "text" => "Stage Slider"),
							array( "value" => "normal_slider", "text" => "Normal Slider") ),
		"std" => ""),
		
	array( "name" => "Number of Posts in the Slider",
		"desc" => "The number of posts you want to show in the Home page slider.",
		"id" => "slider_posts_number",
		"type" => "text",
		"std" => "9"),
	
	array( "name" => "Slider speed between transitions",
		"desc" => "The number of milliseconds between transitions in the Home page slider. (1 second equals 1000 milliseconds)",
		"id" => "slider_seconds",
		"type" => "text",
		"std" => "4000"),
		
	array( "name" => "Slider transition animation speed",
		"desc" => "The number of milliseconds of each transition animation in the Home page slider. (1 second equals 1000 milliseconds)",
		"id" => "slider_transition_seconds",
		"type" => "text",
		"std" => "500"),
		
	array( "name" => "Number of slices in the animation<br /><i>(Normal Slider only)</i>",
		"desc" => "The number of slices used in the animation",
		"id" => "slider_slices",
		"type" => "text",
		"std" => "15"),
		
	array( "name" => "Animation effect of each slider transition<br /><i>(Normal Slider only)</i>",
		"desc" => "The animation effect used in each slider transition",
		"id" => "slider_effect",		
		"type" => "select",
		"options" => array (array( "value" => "random", "text" => "Random" ),
							array( "value" => "fold", "text" => "Fold" ),
							array( "value" => "fade", "text" => "Fade" ),
							array( "value" => "sliceDown", "text" => "Slice Down" ),
							array( "value" => "sliceUp", "text" => "Slice Up" ),
							array( "value" => "sliceDownRight", "text" => "Slice Down Right" ),
							array( "value" => "sliceDownLeft", "text" => "Slice Down Left" ),
							array( "value" => "sliceUpRight", "text" => "Slice Up Right" ),
							array( "value" => "sliceUpLeft", "text" => "Slice Up Left" ),
							array( "value" => "sliceUpDown", "text" => "Slice Up Down" ),
							array( "value" => "sliceUpDownLeft", "text" => "Slice Up Down Left" ) ),
		"std" => ""),
	
	array( "name" => "Show the 4 Home Sections below the Slider?",
		"desc" => "Check this if you want to show the 4 Home Sections below the Slider.",
		"id" => "show_4_home_sections",
		"type" => "checkbox",
		"std" => ""),
	
	array( "name" => "Home Section 1",
		"desc" => "The content of the Home Page Section 1.",
		"id" => "home_section_1",
		"type" => "textarea",
		"std" => "<h3>Box Title 1</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, rutrum. <a href=\"#\">read more &raquo;</a></p>\n<p>[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x80.jpg\" alt=\"placeholder image\" /]</p>"),
		
	array( "name" => "Home Section 2",
		"desc" => "The content of the Home Page Section 2.",
		"id" => "home_section_2",
		"type" => "textarea",
		"std" => "<h3>Box Title 2</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, rutrum. <a href=\"#\">read more &raquo;</a></p>\n<p>[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x80.jpg\" alt=\"placeholder image\" /]</p>"),
		
	array( "name" => "Home Section 3",
		"desc" => "The content of the Home Page Section 3.",
		"id" => "home_section_3",
		"type" => "textarea",
		"std" => "<h3>Box Title 3</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, rutrum. <a href=\"#\">read more &raquo;</a></p>\n<p>[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x80.jpg\" alt=\"placeholder image\" /]</p>"),

	array( "name" => "Home Section 4",
		"desc" => "The content of the Home Page Section 4.",
		"id" => "home_section_4",
		"type" => "textarea",
		"std" => "<h3>Box Title 4</h3>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, condimentum ultrices consequat eu, vehicula ac mauris. Ut adipiscing, rutrum. <a href=\"#\">read more &raquo;</a></p>\n<p>[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x80.jpg\" alt=\"placeholder image\" /]</p>"),
		
	array( "name" => "Show the 4 most recent Portfolio items in the Home Page?",
		"desc" => "Check this if you want to show the 4 most recent Portfolio items in the Home Page.",
		"id" => "show_home_portfolio",
		"type" => "checkbox",
		"std" => ""),
		
	array( "name" => "Home Page Portfolio Section Title",
		"desc" => "The Title of the Portfolio Section in the Home Page.",
		"id" => "home_portfolio_title",
		"type" => "text",
		"std" => "Latest from our <strong>Portfolio</strong>"),
		
	array( "name" => "Show the 4 most recent Blog posts in the Home Page?",
		"desc" => "Check this if you want to show the 4 most recent Blog posts in the Home Page.",
		"id" => "show_home_blog",
		"type" => "checkbox",
		"std" => ""),
		
	array( "name" => "Home Page Blog Section Title",
		"desc" => "The Title of the Blog Section in the Home Page.",
		"id" => "home_blog_title",
		"type" => "text",
		"std" => "Latest from our <strong>Blog</strong>"),
		
  	array( "type" => "close"),
  	
  	array( "name" => "Blog Settings",
		"type" => "title"),
	
	array( "type" => "open"),
	
	array( "name" => "Show the \"Tweet\" button?",
		"desc" => "Check this if you want to show the \"Tweet\" button on the post detail page.",
		"id" => "show_blog_tweet_button",
		"type" => "checkbox",
		"std" => ""),

	array( "name" => "Show the Facebook \"Like\" button?",
		"desc" => "Check this if you want to show the Facebook \"Like\" button on the post detail page.",
		"id" => "show_blog_fb_like_button",
		"type" => "checkbox",
		"std" => ""),

	array( "name" => "Show the Author?",
		"desc" => "Check this if you want to show the Author meta information on blog posts.",
		"id" => "show_meta_author",
		"type" => "checkbox",
		"std" => ""),

	array( "name" => "Show the Date?",
		"desc" => "Check this if you want to show the Date meta information on blog posts.",
		"id" => "show_meta_date",
		"type" => "checkbox",
		"std" => ""),

	array( "name" => "Show the Categories?",
		"desc" => "Check this if you want to show the Categories meta information on blog posts.",
		"id" => "show_meta_categories",
		"type" => "checkbox",
		"std" => ""),
		
	array( "name" => "Show the Tags?",
		"desc" => "Check this if you want to show the Tags meta information on blog posts.",
		"id" => "show_meta_tags",
		"type" => "checkbox",
		"std" => ""),
		
	array( "name" => "Show the Comment Count?",
		"desc" => "Check this if you want to show the Comment Count meta information on blog posts.",
		"id" => "show_meta_comment_count",
		"type" => "checkbox",
		"std" => ""),
				
  	array( "type" => "close"),
  	
  	array( "name" => "Portfolio Settings",
		"type" => "title"),
	
	array( "type" => "open"),
	
	array( "name" => "Portfolio Detail Page<br />Permalink",
		"desc" => "This is portfolio detail page permalink if using custom permalink settings in WordPress.",
		"id" => "portfolio_permalink",
		"type" => "text",
		"std" => "portfolio/detail"),
		
	array( "name" => "Portfolio Detail Page<br />Default Content</i>",
		"desc" => "The default text content when creating a portfolio item.",
		"id" => "portfolio_default_text",
		"type" => "textarea",
		"std" => "[one_fourth]\n\t<h3>Services provided</h3>\n\t[list]\n\t\t<li><span>lorem ipsum</span></li>\n\t\t<li><span>lorem ipsum</span></li>\n\t\t<li><span>lorem ipsum</span></li>\n\t\t<li><span>lorem ipsum</span></li>\n\t\t<li><span>lorem ipsum</span></li>\n\t[/list]\n[/one_fourth]\n\n[three_fourth_last]\n\t<h3>About the project</h3>\n\t<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, ultrices consequat eu, vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisl orci, ultrices consequat eu, vehicula.</p>\n\t<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\n[/three_fourth_last]"),
		
	array( "name" => "Show the \"Tweet\" button?",
		"desc" => "Check this if you want to show the \"Tweet\" button on the portfolio item detail page.",
		"id" => "show_portfolio_tweet_button",
		"type" => "checkbox",
		"std" => ""),

	array( "name" => "Show the Facebook \"Like\" button?",
		"desc" => "Check this if you want to show the Facebook \"Like\" button on the portfolio item detail page.",
		"id" => "show_portfolio_fb_like_button",
		"type" => "checkbox",
		"std" => ""),

  	array( "type" => "close"),
	
	array( "name" => "Contact Page Settings",
		"type" => "title"),
	
	array( "type" => "open"),
	
	array( "name" => "Destination E-mail",
		"desc" => "This is the e-mail account you want your messages to be sent to.",
		"id" => "destination_email",
		"type" => "text",
		"std" => ""),
		
	array( "name" => "Success Message",
		"desc" => "This is the message displayed when someone uses the contact form and the email is sent successfully.",
		"id" => "email_success",
		"type" => "text",
		"std" => "<strong>Thanks!</strong> Your email was successfully sent. I check my email all the time, so I should be in touch soon."),
		
	array( "name" => "Error Message",
		"desc" => "This is the message displayed when someone uses the contact form and an error occurs when sending the email.",
		"id" => "email_error",
		"type" => "text",
		"std" => "<strong>There was an error sending your message.</strong> Please try again later."),
		
  	array( "type" => "close"),
	
	array( "name" => "Footer Settings",
		"type" => "title"),
	
	array( "type" => "open"),
	
	array( "name" => "Copyright Information",
		"desc" => "The copyright information that's displayed in the footer.",
		"id" => "footer_copyright",
		"type" => "text",
		"std" => "Copyright &copy; 2010 All rights reserved"),
		
	array( "name" => "Show the RSS link?",
		"desc" => "Check this if you want to show the RSS link in the Footer.",
		"id" => "show_footer_rss_link",
		"type" => "checkbox",
		"std" => ""),

	
	array( "name" => "Twitter Link",
		"desc" => "Example: http://www.twitter.com/your_user_name (the icon will not appear if left blank)",
		"id" => "footer_twitter",
		"type" => "text",
		"std" => ""),
	
	array( "name" => "Facebook Link",
		"desc" => "Example: http://www.facebook.com/your_user_name (the icon will not appear if left blank)",
		"id" => "footer_facebook",
		"type" => "text",
		"std" => ""),
	
	array( "name" => "Flickr Link",
		"desc" => "Example: http://www.flickr.com/photos/your_user_name (the icon will not appear if left blank)",
		"id" => "footer_flickr",
		"type" => "text",
		"std" => ""),
	
  	array( "type" => "close")		
);

if ( 'save' == $_REQUEST['action'] ) {

	unisphere_update_option( 'flush_rewrite_rules', '1' );
	
	foreach ($options as $value) {
		if( $_REQUEST[ $value['id'] ] == '' ) {
			unisphere_update_option( $value['id'], ' ' );
		} else {
			if ( is_array($_REQUEST[ $value['id'] ]) ) {
				$cats = "-1";
				foreach($_REQUEST[ $value['id'] ] as $cat){
					$cats .= "," . $cat;
				}
				unisphere_update_option( $value['id'], str_replace("-1,", "", $cats) );
			}
			else { unisphere_update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ]) ); }
		}
	}
	
} else if( 'reset' == $_REQUEST['action'] ) {

	foreach ($options as $value) {
		delete_option( $value['id'] ); 
	}
}

$i = 0;
 
if ( $_REQUEST['action'] == 'save' ) echo '<div id="message" class="updated fade"><p><strong>' . UNISPHERE_THEMENAME . ' settings saved.</strong></p></div>';
 
?>
<div class="wrap rm_wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h2><?php echo UNISPHERE_THEMENAME ?> Settings</h2>
    <br />
    
    <div class="rm_opts"> 
	 
		<form method="post">
	 
			<?php foreach ($options as $value) {
            
            switch ( $value['type'] ) {
             
            case "open":
            ?>
             
            <?php break;
             
            case "close":
            ?>
             
			</div></div><br />
             
            <?php break;
             
            case "title":
			
			$i++;
			
            ?>
            
            <div class="rm_section">  
				<div class="rm_title">
                	<h3><img src="<?php echo UNISPHERE_ADMIN_IMAGES . '/trans.png' ?>" class="inactive" alt=""><?php echo $value['name']; ?></h3>
                    <span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" /></span><div class="clearfix"></div>
            	</div>
                <div class="rm_options">
			
            <?php break;
             
            case 'text':
            ?>
			
            <div class="rm_input rm_text">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    	        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value='<?php if ( unisphere_get_option( $value['id'] ) != "") { echo stripslashes(unisphere_get_option( $value['id'])  ); } else { echo $value['std']; } ?>' />
        	    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
            </div>
                         
            <?php
            break;
             
            case 'textarea':
            ?>

            <div class="rm_input rm_textarea">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    	        <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( unisphere_get_option( $value['id'] ) != "") { echo stripslashes(unisphere_get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
        	    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
            </div>
             
            <?php
            break;
             
            case 'select':
            ?>
            
            <div class="rm_input rm_select">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>  
    	        <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
        		    <?php foreach ($value['options'] as $option) { 
	                    if(is_array($option)) { ?>
                        	<option <?php if (unisphere_get_option( $value['id'] ) == $option['value']) { echo 'selected="selected"'; } ?> value='<?php echo $option['value']; ?>'><?php echo $option['text']; ?></option>
                        <?php } else { ?>
		            		<option <?php if (unisphere_get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option>
                        <?php }
					}?>
	            </select>
    	        <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
            </div>

            <?php
            break;			
            
            case 'colorpicker':
            ?>

            <div class="rm_input rm_opts">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	            <div class="color-selector color-selector-<?php echo $value['id']; ?>"><div style="background-color: <?php if ( unisphere_get_option( $value['id'] ) != "") { echo unisphere_get_option( $value['id'] ); } else { echo $value['std']; } ?>"></div></div>
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php if ( unisphere_get_option( $value['id'] ) != "") { echo unisphere_get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
        	    <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>  
            </div>
            
            <script type="text/javascript">
            	jQuery(document).ready(function(){
					jQuery('.color-selector-<?php echo $value['id']; ?>').ColorPicker({
						color: '<?php if ( unisphere_get_option( $value['id'] ) != "") { echo unisphere_get_option( $value['id'] ); } else { echo $value['std']; } ?>',
						onShow: function (colpkr) {
							jQuery(colpkr).fadeIn(500);
							return false;
						},
						onHide: function (colpkr) {
							jQuery(colpkr).fadeOut(500);
							return false;
						},
						onChange: function (hsb, hex, rgb) {
							jQuery('.color-selector-<?php echo $value['id']; ?> div').css('backgroundColor', '#' + hex);
							jQuery('#<?php echo $value['id']; ?>').val('#' + hex);
						}
					});
			
			});
            </script>
             
            <?php
            break;
             
            case "checkbox":
            ?>
            
            <div class="rm_input rm_checkbox">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    	        <?php if(unisphere_get_option($value['id']) == '1'){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
        	    <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="1" <?php echo $checked; ?> />
            	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
            </div>

            <?php break;
             
            case "cat":
            
			$selected_cats = explode(",", unisphere_get_option($value['id']));
            
            ?>
            
			<div class="rm_input rm_multi_checkbox">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                <ul id="<?php echo $value['id']; ?>" class="sort-children">
                
                <?php // If building the portfolio categories list, bring the already selected and ordered cats to the top					
					if ( $value['id'] == 'portfolio_cats' ) {
						foreach ($selected_cats as $selected_cat) { 
							if ($selected_cat != ' ' && $selected_cat != '') {?>

    	                    	<li class="sortable"><input type="checkbox" name="<?php echo $value['id']; ?>[]" value="<?php echo $selected_cat; ?>" checked="checked" />&nbsp;<?php echo get_cat_name($selected_cat); ?></li>

                <?php		}
						}
						$portfolio_unselected_cats = get_categories('orderby=name&use_desc_for_title=1&hierarchical=1&style=0&hide_empty=0&exclude=' . unisphere_get_option($value['id']));
                		foreach($portfolio_unselected_cats as $portfolio_unselected_cat) { ?>

    	                    <li class="sortable"><input type="checkbox" name="<?php echo $value['id']; ?>[]" value="<?php echo $portfolio_unselected_cat->cat_ID; ?>" />&nbsp;<?php echo $portfolio_unselected_cat->cat_name; ?></li>

                <?php	} 
					} else { // build the normal categories list 
						$cats = get_categories('orderby=name&use_desc_for_title=1&hierarchical=1&style=0&hide_empty=0');
						
						foreach($cats as $cat) { 
                    
    	                    foreach ($selected_cats as $selected_cat) {
        	                    if($selected_cat == $cat->cat_ID){ $checked = "checked=\"checked\""; break; }else{ $checked = "";}				
            	            }?>
                
                	        <li><input type="checkbox" name="<?php echo $value['id']; ?>[]" value="<?php echo $cat->cat_ID; ?>" <?php echo $checked; ?> />&nbsp;<?php echo $cat->cat_name; ?></li>
                <?php 	} 
					} ?>
                </ul>
            	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
            </div>
             
            <?php break;
             
            case "pag":
            
            $pags = get_pages('orderby=name&use_desc_for_title=1&hierarchical=1&style=0&hide_empty=0');
            
            $selected_pags = explode(",", unisphere_get_option($value['id']));
            ?>
			<div class="rm_input rm_multi_checkbox">
	            <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
                <ul>
	            <?php foreach($pags as $pag) { 
                
    	            foreach ($selected_pags as $selected_pag) {
        	            if($selected_pag == $pag->ID){ $checked = "checked=\"checked\""; break; }else{ $checked = "";}				
            	    }?>
            
	                <li><input type="checkbox" name="<?php echo $value['id']; ?>[]" value="<?php echo $pag->ID; ?>" <?php echo $checked; ?> />&nbsp;<?php echo $pag->post_title; ?></li>
	            <?php } ?>		
                </ul>
            	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
            </div>
                         
            <?php break;
            }
            }
            ?>
             
            <input type="hidden" name="action" value="save" />
        </form>
	</div>
</div>

<?php 
/**
 * Returns the value of an option from the db if it exists.
 */
function unisphere_get_option( $name ) {
	$options = get_option( UNISPHERE_THEMEOPTIONS );
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return false;
	}
}

/**
 * Updates/Adds an option to the options db.
 */
function unisphere_update_option( $name, $value ) {
	$options = get_option( UNISPHERE_THEMEOPTIONS );
	if ( $options and !isset($options[$name]) ) { // Adds new value...
		$options[$name] = $value;
		return update_option( UNISPHERE_THEMEOPTIONS, $options );
	} else {
		if ( $value != $options[$name] ) { // ...or updates it
			$options[$name] = $value;
			return update_option( UNISPHERE_THEMEOPTIONS, $options );
		} else {
			return false;
		}
	}
}
?>