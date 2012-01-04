<?php
/**
 * The Template for displaying portfolio single posts.
 */

get_header(); ?>

	<?php 
	// Set the Portfolio as the selected menu on top
	$portfolio_root_page_ID = get_page_ID_by_page_template('template_portfolio1column.php');
	if( $portfolio_root_page_ID == '' ) { $portfolio_root_page_ID = get_page_ID_by_page_template('template_portfolio4columns.php'); }
	
	$portfolio_root_page_ID = get_root_page($portfolio_root_page_ID);
	?>

	<script type="text/javascript">			
		jQuery(document).ready(function() {			
			jQuery(".menu li.current_page_parent").removeClass('current_page_parent');
			jQuery(".menu li.page-item-<?php echo $portfolio_root_page_ID; ?>").addClass('current_page_item');					
		});			
	</script>

	<?php
	 // Get the sub-header from sub-header.php
	 get_template_part( 'sub-header' );
	?>

	<!--BEGIN #content-->
	<div id="content" class="portfolio-detail-page full-width-page">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php if( get_the_content() != '' ) { echo '<div class="portfolio-detail-content">'; the_content(); echo '</div><div class="hr"><hr /></div>'; } ?>

				<?php 
				$custom = get_post_custom($post->ID);

				// Video
				if( strlen( stristr( $custom['_portfolio_video'][0] , 'youtube' ) ) > 0 ) // Youtube
					echo unisphere_run_shortcode('[video type="youtube" url="' . $custom['_portfolio_video'][0] . '" autoplay="true" /]');

				if( strlen( stristr( $custom['_portfolio_video'][0] , 'vimeo' ) ) > 0 ) // Vimeo
					echo unisphere_run_shortcode('[video type="vimeo" url="' . $custom['_portfolio_video'][0] . '" autoplay="true" /]');

				if( strlen( stristr( $custom['_portfolio_video'][0] , '.flv' ) ) > 0 ) // FLV
					echo unisphere_run_shortcode('[video type="flv" url="' . $custom['_portfolio_video'][0] . '" autoplay="true" /]');
					
				if( strlen( stristr( $custom['_portfolio_video'][0] , '.mp4' ) ) > 0 ) // MP4
					echo unisphere_run_shortcode('[video type="flv" url="' . $custom['_portfolio_video'][0] . '" autoplay="true" /]');
				
				// Images
                $photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
    
                if ($photos) : 
					
					// Check how the user as selected to display images
					switch ( $custom['_portfolio_detail_big_images'][0] ) {
						case 'slider': // display images in a Slider 
						?>

                            <div class="slider slider-big slider-portfolio-detail">
                                
                                <?php
                                    foreach ($photos as $photo) : 
                                    	if( ( $photo->ID != get_post_thumbnail_id($post->ID) && $custom['_portfolio_exclude_featured_image'][0] == '1' ) || $custom['_portfolio_exclude_featured_image'][0] != '1' ) :
                                    	$image = unisphere_resize( $photo->ID, null, UNISPHERE_SLIDER_BIG_W, UNISPHERE_SLIDER_BIG_H, true ); ?>
                                        <a href="<?php $portfolio_full = wp_get_attachment_image_src($photo->ID, 'full'); echo $portfolio_full[0]; ?>" title="<?php echo $photo->post_title; ?>" rel="lightbox[<?php echo $post->ID; ?>]">
			                            <img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php echo get_post_meta($photo->ID, '_wp_attachment_image_alt', true); ?>" title="<?php echo $photo->post_title; ?>" />
                                        </a>
	                                <?php endif; ?>
                                <?php endforeach; ?>
        
                            </div>
                            
                            <script>
                                jQuery(window).load(function() {
                                
                                    /* Slider */
                                    jQuery('.slider-portfolio-detail').nivoSlider({
                                        effect:'random', //Specify sets like: 'fold,fade,sliceDown'
                                        slices:15,
                                        animSpeed:500,
                                        pauseTime:4500,
                                        startSlide:0, //Set starting Slide (0 index)
                                        directionNav:false, //Next & Prev
                                        directionNavHide:true, //Only show on hover
                                        controlNav:true, //1,2,3...
                                        controlNavThumbs:false, //Use thumbnails for Control Nav
                                        controlNavThumbsFromRel:false, //Use image rel for thumbs
                                        controlNavThumbsSearch: '.jpg', //Replace this with...
                                        controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
                                        keyboardNav:true, //Use left & right arrows
                                        pauseOnHover:true, //Stop animation while hovering
                                        manualAdvance:false, //Force manual transitions
                                        captionOpacity:1, //Universal caption opacity
                                        beforeChange: function(){},
                                        afterChange: function(){},
                                        slideshowEnd: function(){} //Triggers after all slides have been shown
                                    });
                                    
                                });
                            </script>

					<?php	
                        break; // end slider images
                            
                        case 'big': // display big images
                        
						foreach ($photos as $photo) : 
                           	if( ( $photo->ID != get_post_thumbnail_id($post->ID) && $custom['_portfolio_exclude_featured_image'][0] == '1' ) || $custom['_portfolio_exclude_featured_image'][0] != '1' ) :
								$image = unisphere_resize( $photo->ID, null, UNISPHERE_PORTFOLIO_DETAIL_W, UNISPHERE_PORTFOLIO_DETAIL_H, false ); ?>
								<p class="portfolio-detail-big-image">
	                            <a href="<?php $portfolio_full = wp_get_attachment_image_src($photo->ID, 'full'); echo $portfolio_full[0]; ?>" title="<?php echo $photo->post_title; ?>" rel="lightbox[<?php echo $post->ID; ?>]">
	                            <img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php echo get_post_meta($photo->ID, '_wp_attachment_image_alt', true); ?>" />
	                            </a>                                
								<?php echo '<span class="caption">' . $photo->post_excerpt . '</span>'; ?>
	                            </p>
                        <?php endif; 
                        endforeach; 
						
						break; // end big images
						
						case 'gallery': // display images in a gallery
						?>
                        
                        <div class="gallery-portfolio-detail"><?php echo do_shortcode('[gallery ' . ( $custom['_portfolio_exclude_featured_image'][0] == '1' ? 'exclude="' . get_post_thumbnail_id($post->ID) . '" ' : '' ) . '/]'); ?></div>
                        <div class="clearfix">&nbsp;</div>
                        
					<?php 
						break; // end gallery
					} // end switch ?>

                <?php endif; ?>
                
	            <div class="share-buttons">
	            	<?php if ( $unisphere_options['show_portfolio_tweet_button'] == '1' ) : ?>
						<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink(); ?>" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					<?php endif; ?>
	            	<?php if ( $unisphere_options['show_portfolio_fb_like_button'] == '1' ) : ?>
						<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo rawurlencode(get_permalink()); ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=<?php if( $unisphere_options['skin'] == 'light' ) echo 'light'; else echo 'dark'; ?>&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowTransparency="true" class="facebook-like-button"></iframe>
					<?php endif; ?>
	            </div>
				
				<div class="hr"><hr /></div>

				<?php comments_template( '', true ); ?>

			<?php endwhile; ?>

	<!--END #content-->
	</div>

<?php get_footer(); ?>
