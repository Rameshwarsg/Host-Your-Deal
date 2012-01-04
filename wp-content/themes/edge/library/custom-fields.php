<?php
/**
 * Post/Page Custom Fields Meta Boxes
 */

global $new_meta_boxes;
$new_meta_boxes =
array(
	
	"_page_sub_title" => array(
	"name" => "_page_sub_title",
	"std" => "",
	"title" => "Page Sub-Title",
	"description" => "",
	"type" => "text",
	"location" => "Page"),
	
	"_page_portfolio_cat" => array(
	"name" => "_page_portfolio_cat",
	"std" => "",
	"title" => "Portfolio Categories",
	"description" => "If this page uses a Portfolio page template, then set the categories to be displayed",
	"type" => "portfolio_cat",
	"location" => "Page"),
	
	"_page_portfolio_num_items_page" => array(
	"name" => "_page_portfolio_num_items_page",
	"std" => "",
	"title" => "Number of Portfolio items per Page",
	"description" => "If this page uses a Portfolio page template, you can set the number of items displayed per page and the template will paginate the items<br />Leave blank if you don't want to paginate the portfolio items",
	"type" => "text",
	"location" => "Page"),
	
	
	
	"_slider_shared_title" => array(
	"name" => "_slider_shared_title",
	"title" => "Settings that apply to both Slider types",
	"type" => "title",
	"location" => "Slider"),

	"_slider_img" => array(
	"name" => "_slider_img",
	"std" => "",
	"title" => "Override the default image generated for this Slider Item",
	"description" => "Set the path of the image to display in this <strong>Home Page Slider Item</strong> if you want to <strong>override the default wordpress generated image</strong>.<br /><strong>Normal Slider size</strong>: width 960px, height 350px<br/ ><strong>Stage Slider size</strong>: width 960px, height 350px<br /><strong>Stage Slider with Description size</strong>: width 623px, height 350px",
	"type" => "image",
	"location" => "Slider"),

	"_slider_link" => array(
	"name" => "_slider_link",
	"std" => "",
	"title" => "Slider Item custom destination URL",
	"description" => "Set the destination link of the slider item when a user clicks it (doesn't work with embedded videos), leave blank if you don't want to link anywhere.<br />Example: http://www.google.com/<br />(Note: if you set a video in the field below then this property will be ignored and the video will still display in a lightbox)",
	"type" => "text",
	"location" => "Slider"),	
	
	"_slider_video" => array(
	"name" => "_slider_video",
	"std" => "",
	"title" => "Play Video in Lightbox when clicking an image",
	"description" => "Examples:<br /><strong>YouTube:</strong> http://www.youtube.com/watch?v=B0ky-VMi9fI<br /><strong>Vimeo:</strong> http://vimeo.com/8245346<br /><strong>FLV</strong><br /><strong>MP4</strong>",
	"type" => "text",
	"location" => "Slider"),
	
	"_stage_slider_title" => array(
	"name" => "_stage_slider_title",
	"title" => "Settings that apply just to the Stage Slider",
	"type" => "title",
	"location" => "Slider"),	
	
	"_stage_slider_video" => array(
	"name" => "_stage_slider_video",
	"std" => "",
	"title" => "Play Video directly in Slider",
	"description" => "Supports: <br /><strong>YouTube</strong> (example: http://www.youtube.com/watch?v=B0ky-VMi9fI)<br /><strong>Vimeo</strong> (example: http://vimeo.com/14824441)<br /><strong>FLV</strong><br /><strong>MP4</strong>",
	"type" => "text",
	"location" => "Slider"),
	
	"_stage_slider_autoplay" => array(
	"name" => "_stage_slider_autoplay",
	"std" => "",
	"title" => "Dont Autoplay Video?",
	"description" => "Check this if you don't want the Stage Slider video to autoplay.",
	"type" => "checkbox",
	"location" => "Slider"),
	
	"_stage_slider_text_position" => array(
	"name" => "_stage_slider_text_position",
	"std" => "",
	"title" => "Text description position",
	"description" => "Select the text description position to be displayed in this stage slider item.",
	"type" => "select",
	"options" => array ( array( "value" => "none", "text" => "Don't display"),
						array( "value" => "left", "text" => "Left"),
						array( "value" => "right", "text" => "Right") ),
	"location" => "Slider"),
	
	"_stage_slider_no_autoplay_thumbnail" => array(
	"name" => "_stage_slider_no_autoplay_thumbnail",
	"std" => "",
	"title" => "Set the video splash image when adding a FLV or MP4 video without autoplay.",
	"description" => "Set the path of the splash image to display in this <strong>Stage Slider FLV or MP4 video</strong> if not using the autoplay feature.",
	"type" => "image",
	"location" => "Slider"),
	
	

	"_blog_sub_title" => array(
	"name" => "_blog_sub_title",
	"std" => "",
	"title" => "Sub-Header title for this post",
	"description" => "",
	"type" => "text",
	"location" => "Post"),
	
	"_blog_thumb" => array(
	"name" => "_blog_thumb",
	"std" => "",
	"title" => "Override the default thumbnail generated for the Blog posts",
	"description" => "Set the path of the image to display when this <strong>Blog Post is listed</strong> if you want to <strong>override the default wordpress generated thumbnail</strong>.<br /><strong>Width</strong>: 710px, height 150px",
	"type" => "image",
	"location" => "Post"),
	
	"_blog_popular_recent_thumb" => array(
	"name" => "_blog_popular_recent_thumb",
	"std" => "",
	"title" => "Override the default thumbnail generated for the Popular and Recent posts widget",
	"description" => "Set the path of the thumbnail to display when this <strong>Blog Post is listed in the Popular or Recent Posts widget</strong> if you want to <strong>override the default wordpress generated thumbnail</strong>.<br /><strong>Width</strong>: 50px, height 50px",
	"type" => "image",
	"location" => "Post"),
	
	
	
	"_portfolio_sub_title" => array(
	"name" => "_portfolio_sub_title",
	"std" => "",
	"title" => "Override the sub-header title for this portfolio item",
	"description" => "If no sub-header title is specified, the portfolio item title is displayed in the sub-header.",
	"type" => "text",
	"location" => "Portfolio"),
	
	"_portfolio_detail_big_images" => array(
	"name" => "_portfolio_detail_big_images",
	"std" => "",
	"title" => "How to display images in detail page?",
	"description" => "",
	"type" => "select",
	"options" => array ( array( "value" => "none", "text" => "Don't display"),
						array( "value" => "big", "text" => "Big Images&nbsp;&nbsp;"),
						array( "value" => "slider", "text" => "Slider"),
						array( "value" => "gallery", "text" => "Gallery") ),
	"location" => "Portfolio"),
	
	"_portfolio_exclude_featured_image" => array(
	"name" => "_portfolio_exclude_featured_image",
	"std" => "",
	"title" => "Exclude the thumbnail (featured image) from the image listing in the Portfolio Item detail page?",
	"description" => "Check this if you want to exclude the thumbnail (featured image) from the listing in the portfolio item detail page",
	"type" => "checkbox",
	"location" => "Portfolio"),

	"_portfolio_no_lightbox" => array(
	"name" => "_portfolio_no_lightbox",
	"std" => "",
	"title" => "Thumbnail links to Portfolio Item Detail?",
	"description" => "Check this if you want the thumbnail to link directly to the portfolio item detail or your custom defined URL below instead of opening the full image in the lightbox",
	"type" => "checkbox",
	"location" => "Portfolio"),
	
	"_portfolio_link" => array(
	"name" => "_portfolio_link",
	"std" => "",
	"title" => "Portfolio Item custom destination URL",
	"description" => "Set the destination link of the Portfolio Item when a user clicks it, leave blank to link to the default Portfolio Item detail page.<br />Example: http://www.google.com/<br />(Note: if you set a video in the field below then this property will be ignored and the video will still display in a lightbox)",
	"type" => "text",
	"location" => "Portfolio"),

	"_portfolio_video" => array(
	"name" => "_portfolio_video",
	"std" => "",
	"title" => "Portfolio Video",
	"description" => "Examples:<br /><strong>YouTube:</strong> http://www.youtube.com/watch?v=B0ky-VMi9fI<br /><strong>Vimeo:</strong> http://vimeo.com/8245346<br /><strong>FLV</strong><br /><strong>MP4</strong>",
	"type" => "text",
	"location" => "Portfolio"),
	
	"_portfolio_thumb_1" => array(
	"name" => "_portfolio_thumb_1",
	"std" => "",
	"title" => "Override the default thumbnail generated for the Portfolio items (1 Column view)",
	"description" => "Set the path of the image to display in this <strong>Portfolio item</strong> if you want to <strong>override the default wordpress generated thumbnail</strong>.<br /><strong>Portfolio 1 Column thumb size</strong>: width 710px, height: 125px",
	"type" => "image",
	"location" => "Portfolio"),	
	
	"_portfolio_thumb_4" => array(
	"name" => "_portfolio_thumb_4",
	"std" => "",
	"title" => "Override the default thumbnail generated for the Portfolio items (4 Columns view)",
	"description" => "Set the path of the image to display in this <strong>Portfolio item</strong> if you want to <strong>override the default wordpress generated thumbnail</strong>.<br /><strong>Portfolio 4 Columns thumb size</strong>: width 210px, height: 125px",
	"type" => "image",
	"location" => "Portfolio")

);

function new_meta_boxes_page() {
	new_meta_boxes('Page');
}

function new_meta_boxes_post() {
	new_meta_boxes('Post');
}

function new_meta_boxes_slider() {
	new_meta_boxes('Slider');
}

function new_meta_boxes_portfolio() {
	new_meta_boxes('Portfolio');
}

function new_meta_boxes( $type ) {
	global $post, $new_meta_boxes;
	
	// Use nonce for verification
    echo '<input type="hidden" name="unisphere_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<div class="form-wrap">';

	foreach($new_meta_boxes as $meta_box) {
		if( $meta_box['location'] == $type) {
			
			if ( $meta_box['type'] == 'title' ) {
				echo '<p style="font-size: 18px; font-weight: bold; font-style: normal; color: #e5e5e5; text-shadow: 0 1px 0 #111; line-height: 40px; background-color: #464646; border: 1px solid #111; padding: 0 10px; -moz-border-radius: 6px;">' . $meta_box[ 'title' ] . '</p>';
			} else {			
				$meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
		
				if($meta_box_value == "")
					$meta_box_value = $meta_box['std'];
		
				echo '<div class="form-field form-required">';
				
				switch ( $meta_box['type'] ) {
					case 'text':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						echo 	'<input type="text" name="' . $meta_box[ 'name' ] . '" value="' . htmlspecialchars( $meta_box_value ) . '" style="border-color: #ccc;" />';
						break;
						
					case 'checkbox':
						if($meta_box_value == '1'){ $checked = "checked=\"checked\""; }else{ $checked = "";} 
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong>&nbsp;<input style="width: 20px;" type="checkbox" name="' . $meta_box[ 'name' ] . '" value="1" ' . $checked . ' /></label>';
						break;
						
					case 'select':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						
                        echo	'<select name="' . $meta_box[ 'name' ] . '">';

						// Loop through each option in the array
						foreach ($meta_box[ 'options' ] as $option) {
							if(is_array($option)) {
								echo '<option ' . ( $meta_box_value == $option['value'] ? 'selected="selected"' : '' ) . ' value="' . $option['value'] . '">' . $option['text'] . '</option>';
							} else {
   								echo '<option ' . ( $meta_box_value == $option ? 'selected="selected"' : '' ) . ' value="' . $option['value'] . '">' . $option['text'] . '</option>';
							}
						}
                        
						echo	'</select>';
                        break;
						
					case 'portfolio_cat':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';						
						
						echo '<ul style="margin-top: 5px;" class="sort-children">';
						
						// If building the portfolio categories list, bring the already selected and ordered cats to the top					
						$selected_cats = explode( ",", $meta_box_value );
						foreach ($selected_cats as $selected_cat) { 
							if ($selected_cat != ' ' && $selected_cat != '') {
								$tax_term = get_term( $selected_cat, 'portfolio_category' );
		                		echo '<li class="sortable" style="margin-bottom: 0;"><input style="width: 20px;" type="checkbox" name="' . $meta_box[ 'name' ] . '[]" value="' . $selected_cat . '" checked="checked" />&nbsp;' . $tax_term->name . '</li>';
		                	}
						}
						
						$unselected_args = array( 'taxonomy' => 'portfolio_category', 'hide_empty' => '0', 'exclude' => $selected_cats );
						$unselected_cats = get_categories( $unselected_args );
		                foreach($unselected_cats as $unselected_cat) { 
		                    echo '<li class="sortable" style="margin-bottom: 0;"><input style="width: 20px;" type="checkbox" name="' . $meta_box[ 'name' ] . '[]" value="' . $unselected_cat->cat_ID . '" />&nbsp;' . $unselected_cat->name . '</li>';
		                } 
													
						echo '</ul>';						
						break;
						
					case 'image':
						echo 	'<label for="' . $meta_box[ 'name' ] .'"><strong>' . $meta_box[ 'title' ] . '</strong></label>';
						echo 	'<input type="text" name="' . $meta_box[ 'name' ] . '" id="' . $meta_box[ 'name' ] . '" value="' . htmlspecialchars( $meta_box_value ) . '" style="width: 400px; border-color: #ccc;" />';
						echo	'<input type="button" id="button' . $meta_box[ 'name' ] . '" value="Browse" style="width: 60px;" class="button button-unisphere-upload" rel="' . $post->ID . '" />';
						echo	'&nbsp;<a href="#" style="color: red;" class="remove-unisphere-upload">remove</a>';
						break;
				}

				echo 	'<p>' . $meta_box[ 'description' ] . '</p>';
				echo '</div>';
			}
		}
	}
	
	echo '</div>';
}

function create_meta_box() {
	global $theme_name;
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'new_meta_boxes_post', UNISPHERE_THEMENAME . ' Post Settings', 'new_meta_boxes_post', 'post', 'normal', 'high' );
		add_meta_box( 'new_meta_boxes_page', UNISPHERE_THEMENAME . ' Page Settings', 'new_meta_boxes_page', 'page', 'normal', 'high' );
		add_meta_box( 'new_meta_boxes_slider', UNISPHERE_THEMENAME . ' Slider Settings', 'new_meta_boxes_slider', 'slider', 'normal', 'high' );
		add_meta_box( 'new_meta_boxes_portfolio', UNISPHERE_THEMENAME . ' Portfolio Settings', 'new_meta_boxes_portfolio', 'portfolio_cpt', 'normal', 'high' );
	}
}

function save_postdata( $post_id ) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['unisphere_meta_box_nonce'], basename(__FILE__)) ) {
		return $post_id;
	}
	
	if ( wp_is_post_revision( $post_id ) or wp_is_post_autosave( $post_id ) )
		return $post_id;
		
	global $post, $new_meta_boxes;

	foreach($new_meta_boxes as $meta_box) {
		
		if ( $meta_box['type'] != 'title)' ) {
		
			if ( 'page' == $_POST['post_type'] ) {
				if ( !current_user_can( 'edit_page', $post_id ))
					return $post_id;
			} else {
				if ( !current_user_can( 'edit_post', $post_id ))
					return $post_id;
			}
			
			if ( is_array($_POST[$meta_box['name']]) ) {
				
				foreach($_POST[$meta_box['name']] as $cat){
					$cats .= $cat . ",";
				}
				$data = substr($cats, 0, -1);
			}
			else { $data = $_POST[$meta_box['name']]; }			
	
			if(get_post_meta($post_id, $meta_box['name']) == "")
				add_post_meta($post_id, $meta_box['name'], $data, true);
			elseif($data != get_post_meta($post_id, $meta_box['name'], true))
				update_post_meta($post_id, $meta_box['name'], $data);
			elseif($data == "")
				delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
				
		}
	}
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');


function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('upload-js', UNISPHERE_ADMIN_JS . '/upload.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('upload-js');
	
	global $post;

	if($post->post_type == 'page') {
		wp_enqueue_script('admin_js', UNISPHERE_ADMIN_JS . '/admin.js', array('jquery'));  
	}
}

function my_admin_styles() {
	wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');

?>