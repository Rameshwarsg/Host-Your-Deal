<?php
/**
 * The theme's image sizes definitions and helper functions
 */
 

/**
 * Add the new thumbnail support introduced in WP 2.9
 */
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'slider', 'portfolio_cpt' ) );
}


/**
 * Set the different image sizes for the images used in several places across the theme
 */

// home page normal slider image size
define( 'UNISPHERE_NORMAL_SLIDER_W', 960 );
define( 'UNISPHERE_NORMAL_SLIDER_H', 350 ); 

// home page stage slider image size 
define( 'UNISPHERE_STAGE_SLIDER_W', 960 );
define( 'UNISPHERE_STAGE_SLIDER_H', 350 ); 

// home page stage slider with description image size
define( 'UNISPHERE_STAGE_SLIDER_WITH_DESC_W', 623 );
define( 'UNISPHERE_STAGE_SLIDER_WITH_DESC_H', 350 ); 

// 1 column portfolio thumb size
define( 'UNISPHERE_PORTFOLIO1_W', 710 );
define( 'UNISPHERE_PORTFOLIO1_H', 125 ); 

// 4 column portfolio thumb size
define( 'UNISPHERE_PORTFOLIO4_W', 210 );
define( 'UNISPHERE_PORTFOLIO4_H', 125 ); 

// portfolio detail image size
define( 'UNISPHERE_PORTFOLIO_DETAIL_W', 960 );
define( 'UNISPHERE_PORTFOLIO_DETAIL_H', 9999 ); 

// blog thumb size
define( 'UNISPHERE_BLOG_W', 710 );
define( 'UNISPHERE_BLOG_H', 150 ); 

// blog image size for a post with the image format
define( 'UNISPHERE_BLOG_FORMAT_IMAGE_W', 710 );
define( 'UNISPHERE_BLOG_FORMAT_IMAGE_H', 9999 ); 

// sidebar posts thumb size
define( 'UNISPHERE_SIDEBAR_POSTS_W', 50 );
define( 'UNISPHERE_SIDEBAR_POSTS_H', 50 );

// gallery thumb size
define( 'UNISPHERE_GALLERY_W', 85 );
define( 'UNISPHERE_GALLERY_H', 85 );

// big slider image size
define( 'UNISPHERE_SLIDER_BIG_W', 960 );
define( 'UNISPHERE_SLIDER_BIG_H', 350 );

// medium slider image size
define( 'UNISPHERE_SLIDER_MEDIUM_W', 710 );
define( 'UNISPHERE_SLIDER_MEDIUM_H', 260 );

// small slider image size
define( 'UNISPHERE_SLIDER_SMALL_W', 210 );
define( 'UNISPHERE_SLIDER_SMALL_H', 125 );

/**
 * Get thumbnail based on the context passed as a parameter
 * If there are images defined in custom fields, return these instead of the default thumbnail
 */
function unisphere_get_post_image( $context, $post_id = -1 )
{
	global $post;
	
	if( $post_id != -1 ) {
		$current_post = get_post( $post_id );
	} else {
		$current_post = $post;
	}
	
	$attachment_id = get_post_thumbnail_id( $current_post->ID ); // Attachment ID
	$attachment = get_post( $attachment_id ); // The attachment object
	$attachment_title = $attachment->post_title; // The attachment (image) title
	$attachment_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true); // The attachment (image) alt text
	$attachment_caption = $attachment->post_excerpt;
	$post_title = $current_post->post_title; // The current post title
	
	switch ( $context ) {
		
		case "normal-slider":
			if( get_post_meta($current_post->ID, "_slider_img", $single = true) != '') { 
				return '<img title="' . $current_post->post_title . '" alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_slider_img", $single = true) . '" />'; 
			} else {
				$image = unisphere_resize( $attachment_id, null, UNISPHERE_NORMAL_SLIDER_W, UNISPHERE_NORMAL_SLIDER_H, true );
				return '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt="' . $attachment_alt . '" title="' . $post_title . '" />';
			}
			break;
		case "stage-slider":
			if( get_post_meta($current_post->ID, "_slider_img", $single = true) != '') { 
				return '<img alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_slider_img", $single = true) . '" />'; 
			} else {
				$image = unisphere_resize( $attachment_id, null, UNISPHERE_STAGE_SLIDER_W, UNISPHERE_STAGE_SLIDER_H, true );
				return '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt="' . $attachment_alt . '" />';
			}
			break;
		case "stage-slider-with-desc":
			if( get_post_meta($current_post->ID, "_slider_img", $single = true) != '') { 
				return '<img alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_slider_img", $single = true) . '" />'; 
			} else {
				$image = unisphere_resize( $attachment_id, null, UNISPHERE_STAGE_SLIDER_WITH_DESC_W, UNISPHERE_STAGE_SLIDER_WITH_DESC_H, true );
				return '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt="' . $attachment_alt . '" />';
			}
			break;

		case "portfolio1":
			if( get_post_meta($current_post->ID, "_portfolio_thumb_1", $single = true) != '') { 
				return '<img alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_portfolio_thumb_1", $single = true) . '" />'; 
			} else {
				$image = unisphere_resize( $attachment_id, null, UNISPHERE_PORTFOLIO1_W, UNISPHERE_PORTFOLIO1_H, true );
				return '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt="' . $attachment_alt . '" />';
			}
			break;
			
		case "portfolio4":
			if( get_post_meta($current_post->ID, "_portfolio_thumb_4", $single = true) != '') { 
				return '<img alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_portfolio_thumb_4", $single = true) . '" />'; 
			} else {
				$image = unisphere_resize( $attachment_id, null, UNISPHERE_PORTFOLIO4_W, UNISPHERE_PORTFOLIO4_H, true );
				return '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt="' . $attachment_alt . '" />';
			}
			break;
			
		case "blog":
			if( get_post_meta($current_post->ID, "_blog_thumb", $single = true) != '') { 
				return '<img alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_blog_thumb", $single = true) . '" />'; 
			} else {
				$image = unisphere_resize( $attachment_id, null, UNISPHERE_BLOG_W, UNISPHERE_BLOG_H, true );
				if( $image['url'] != '' )
					return '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt="' . $attachment_alt . '" />';
				else
					return '';
			}
			break;
			
		case "blog-format-image":
			$image = unisphere_resize( $attachment_id, null, UNISPHERE_BLOG_FORMAT_IMAGE_W, UNISPHERE_BLOG_FORMAT_IMAGE_H, false );
			return '<img src="' . $image['url'] . '" width="' . $image['width'] . '" alt="' . $attachment_alt . '" />' . ( ( $attachment_caption != '') ? '<br /><span class="wp-caption-text">' . $attachment_caption . '</span>' : '' );
			break;	
			
		case "sidebar-post":
			if( get_post_meta($current_post->ID, "_blog_popular_recent_thumb", $single = true) != '') { 
				return '<img alt="' . $current_post->post_title . '" src="' . get_post_meta($current_post->ID, "_blog_popular_recent_thumb", $single = true) . '" />'; 
			} else {
				$image = unisphere_resize( $attachment_id, null, UNISPHERE_SIDEBAR_POSTS_W, UNISPHERE_SIDEBAR_POSTS_H, true );
				if( $image['url'] != '' )
					return '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt="' . $attachment_alt . '" />';
				else
					return '';
			}
			break;			
	}
}



/*
 * Resize images dynamically using wp built in functions
 * Victor Teixeira
 * http://core.trac.wordpress.org/ticket/15311#comment:13
 *
 * php 5.2+
 *
 * Example usage:
 * 
 * <?php 
 * $thumb = get_post_thumbnail_id(); 
 * $image = vt_resize( $thumb, '', 140, 110, true );
 * ?>
 * <img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" />
 *
 * @param int $attach_id
 * @param string $img_url
 * @param int $width
 * @param int $height
 * @param bool $crop
 * @return array
 */
function unisphere_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
	
	// this is an attachment, so we have the ID
	if ( $attach_id ) {
	
		$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
		$file_path = get_attached_file( $attach_id );
	
	// this is not an attachment, let's use the image url
	} else if ( $img_url ) {
		
		$file_path = parse_url( $img_url );
		$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
		
		//$file_path = ltrim( $file_path['path'], '/' );
		//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
		
		$orig_size = getimagesize( $file_path );
		
		$image_src[0] = $img_url;
		$image_src[1] = $orig_size[0];
		$image_src[2] = $orig_size[1];
	}
	
	$file_info = pathinfo( $file_path );
	$extension = '.'. $file_info['extension'];

	// the image path without the extension
	$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];

	$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;

	// checking if the file size is larger than the target size
	// if it is smaller or the same size, stop right here and return
	if ( $image_src[1] > $width || $image_src[2] > $height ) {

		// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
		if ( file_exists( $cropped_img_path ) ) {

			$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
			
			$vt_image = array (
				'url' => $cropped_img_url,
				'width' => $width,
				'height' => $height
			);
			
			return $vt_image;
		}

		// $crop = false
		if ( $crop == false ) {
		
			// calculate the size proportionaly
			$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
			$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;			

			// checking if the file already exists
			if ( file_exists( $resized_img_path ) ) {
			
				$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );

				$vt_image = array (
					'url' => $resized_img_url,
					'width' => $proportional_size[0],
					'height' => $proportional_size[1]
				);
				
				return $vt_image;
			}
		}

		// no cache files - let's finally resize it
		$new_img_path = image_resize( $file_path, $width, $height, $crop );
		$new_img_size = getimagesize( $new_img_path );
		$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );

		// resized output
		$vt_image = array (
			'url' => $new_img,
			'width' => $new_img_size[0],
			'height' => $new_img_size[1]
		);
		
		return $vt_image;
	}

	// default output - without resizing
	$vt_image = array (
		'url' => $image_src[0],
		'width' => $image_src[1],
		'height' => $image_src[2]
	);
	
	return $vt_image;
}

?>