<?php 
/*
Template Name: Home Page with Blog
*/

get_header();

global $unisphere_options;

// Check what Slider Option the user has selected.
switch ( $unisphere_options['slider'] ) {
	case '': 
	case 'no_slider': // don't use a Slider
		echo '<div class="hr"><hr /></div>';
		break; // End Disable Slider
	
	case 'no_slider_sub_header': // don't use a Slider but show the inner page sub-header ?>
    
	    <?php
		 // Get the sub-header from sub-header.php
		 get_template_part( 'sub-header' );
		?>
        
<?php	
		break; // End Disable Slider
		
	case 'stage_slider': // use the Stage Slider Wide
?>
    <!--BEGIN #stage-slider-wide-container-->
	<div id="stage-slider-container">
		<ul id="stage-slider">
            <?php
				$my_query = new WP_Query( array( 'post_type' => 'slider', 'showposts' => $unisphere_options['slider_posts_number'] ) ); 
				while ($my_query->have_posts()) : $my_query->the_post();
				
				$custom = get_post_custom($post->ID);
			?>
            	<li>
					<?php // Display Stage Video (takes precedence before everything)
                        if ( !empty ( $custom['_stage_slider_video'][0] ) ) :
                        $rand = Rand(); ?>
                        <div class="stage-slider-video<?php echo ( !empty( $custom['_stage_slider_text_position'][0] ) ? ' description-position-' . $custom['_stage_slider_text_position'][0] : ' description-position-none' ) ?>" id="video<?php echo $rand; ?>" data-videourl="<?php echo $custom['_stage_slider_video'][0]; ?>" data-autoplay="<?php echo $custom['_stage_slider_autoplay'][0] == '1' ? 'false' : 'true'; ?>" data-video-thumbnail="<?php echo $custom['_stage_slider_autoplay'][0] == '1' ? $custom['_stage_slider_no_autoplay_thumbnail'][0] : ''; ?>"><div id="objectvideo<?php echo $rand; ?>"></div></div>
					<?php else : // No video... ?>
                        <?php // Lightbox Video takes precedence before the slider link
                            if ( !empty ( $custom['_slider_video'][0] ) ) : ?>
                            <div class="image-position<?php echo ( $custom['_stage_slider_text_position'][0] == 'left' ? '-right' : '' ) ?>"><a href="<?php echo $custom['_slider_video'][0]; ?>" title="<?php the_title(); ?>" rel="lightbox"><?php echo unisphere_get_post_image( $custom['_stage_slider_text_position'][0] == 'none' ? 'stage-slider' : 'stage-slider-with-desc' ); ?></a></div>
                        <?php else : // No video... ?>
                            <?php if ( !empty ( $custom['_slider_link'][0] ) ) : // ...check if there's a link for the slider item ?>
                                <div class="image-position<?php echo ( $custom['_stage_slider_text_position'][0] == 'left' ? '-right' : '' ) ?>"><a href="<?php echo $custom['_slider_link'][0]; ?>" title="<?php the_title(); ?>"><?php echo unisphere_get_post_image( $custom['_stage_slider_text_position'][0] == 'none' ? 'stage-slider' : 'stage-slider-with-desc' ); ?></a></div>
                            <?php else : ?>
                                <div class="image-position<?php echo ( $custom['_stage_slider_text_position'][0] == 'left' ? '-right' : '' ) ?>"><?php echo unisphere_get_post_image( $custom['_stage_slider_text_position'][0] == 'none' ? 'stage-slider' : 'stage-slider-with-desc' ); // No video or link ?></div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                        <div class="description-wrapper<?php echo ( !empty( $custom['_stage_slider_text_position'][0] ) ? ' description-wrapper-' . $custom['_stage_slider_text_position'][0] : ' description-wrapper-none' ) ?>">
                        <h2><?php the_title(); ?></h2>
        	            <?php if( get_the_content() != '') : ?>
            	            <div class="description"><?php the_content() ?></div>
                	    <?php endif; ?>
	                </div>
                </li>
			<?php endwhile; ?>
		</ul>
	<!--END #stage-slider-container-->
	</div>
    
    <!--BEGIN Stage Slider jQuery initializer-->
    <script>
		jQuery(document).ready(function(){
			
			jQuery('#stage-slider')
			.after('<div id="slider-nav"/>') 
			.after('<div class="slider-footer"/>') 
			.cycle({ 
				fx: 'fade', 
				easing: 'easeInOutExpo', 
				cleartype: 1, // enable cleartype corrections 
				speed: <?php if ( trim( $unisphere_options['slider_transition_seconds'] ) != '' ) { echo $unisphere_options['slider_transition_seconds']; } else { echo "500"; } ?>,
				timeout: <?php if ( trim( $unisphere_options['slider_seconds'] ) != '' ) { echo $unisphere_options['slider_seconds']; } else { echo "4000"; } ?>,
				pager: '#slider-nav',
				before: onCycleBefore
			});			
		});
		
		
	</script>
    <!--END Stage Slider jQuery initializer-->	

<?php	
		break; // End Stage Slider
	
	case 'normal_slider': // use the Normal Slider
?>
    <!--BEGIN #slider-container-->
	<div id="nivo-slider-container">
		<div id="nivo-slider">
            <?php
				$my_query = new WP_Query( array( 'post_type' => 'slider', 'showposts' => $unisphere_options['slider_posts_number'] ) ); 
				while ($my_query->have_posts()) : $my_query->the_post();
				
				$custom = get_post_custom($post->ID);
			?>
            	<?php // If an embedded video is present, don't render it because this slider doesn't support it
					if ( empty ( $custom['_stage_slider_video'][0] ) ) : ?>
					<?php // Lightbox Video takes precedence before the slider link
                        if ( !empty ( $custom['_slider_video'][0] ) ) : ?>
                        <a href="<?php echo $custom['_slider_video'][0]; ?>" title="<?php the_title(); ?>" rel="lightbox"><?php echo unisphere_get_post_image( 'normal-slider' ); ?></a>
                    <?php else : // No video... ?>
                        <?php if ( !empty ( $custom['_slider_link'][0] ) ) : // ...check if there's a link for the slider item ?>
                            <a href="<?php echo $custom['_slider_link'][0]; ?>" title="<?php the_title(); ?>"><?php echo unisphere_get_post_image( 'normal-slider' ); ?></a>
                        <?php else : ?>	                        
                            <?php echo unisphere_get_post_image( 'normal-slider' ); // No video or link ?>
                        <?php endif; ?>
                    <?php endif; ?>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
		<div class="slider-footer"></div>
	<!--END #nivo-slider-container-->
	</div>
    
    <!--BEGIN Nivo Slider jQuery initializer-->
    <script>
		jQuery(window).load(function() {
	
			/* Home page slider */
			jQuery('#nivo-slider').nivoSlider({
				effect:'<?php if ( trim( $unisphere_options['slider_effect'] ) != '' ) { echo $unisphere_options['slider_effect']; } else { echo "random"; } ?>',
				slices:<?php if ( trim( $unisphere_options['slider_slices'] ) != '' ) { echo $unisphere_options['slider_slices']; } else { echo "15"; } ?>,
				animSpeed:<?php if ( trim( $unisphere_options['slider_transition_seconds'] ) != '' ) { echo $unisphere_options['slider_transition_seconds']; } else { echo "500"; } ?>,
				pauseTime:<?php if ( trim( $unisphere_options['slider_seconds'] ) != '' ) { echo $unisphere_options['slider_seconds']; } else { echo "4000"; } ?>,
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
    <!--END Nivo Slider jQuery initializer-->

<?php	
		break; // End Nivo Slider
} // end switch ?>

	<!--BEGIN #content-->
	<div id="content" class="blog clearfix">

		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				the_content();
			endwhile; 
		endif; ?>

		<!--BEGIN #primary-->
		<div id="primary">
        
			<?php 
			if ( get_option( 'permalink_structure' ) == '' ) { // Default permalink structure
				$unisphere_page = $_GET['paged'] != '' ? $_GET['paged'] : '1';
			} else { // Custom permalink structure which ends with /page/xx/
				$pageURL = 'http';
				//check what if its secure or not
				if ($_SERVER["HTTPS"] == "on") {
					$pageURL .= "s";
				}
				//add the protocol
				$pageURL .= "://";
				//check what port we are on
				if ($_SERVER["SERVER_PORT"] != "80") {
					$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
				} else {
					$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
				}
				//cut off everything on the URL except the last 3 characters
				$urlEnd = substr($pageURL, -4);
			
				$urlEnd = substr( $urlEnd, strpos($urlEnd, "/") );
				
				//strip off the two forward shashes
				$unisphere_page = str_replace("/", "", $urlEnd);
			}

			// The custom query for displaying blog posts in a page template
			$wp_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $unisphere_page ) );
			
			global $more;
			// set $more to 0 in order to only get the first part of the post
			$more = 0; ?>                
<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! $wp_query->have_posts() ) : ?>
	<div id="post-0" class="post clearfix error404 not-found post-no-image">
    	<div class="post-content-wrapper">
			<h2 class="post-title"><?php _e( 'Not Found', 'unisphere' ); ?></h2>
			<div class="post-text">
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'unisphere' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php
	/* 
	 * Start the Loop.
	 */ ?>
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

    <div class="hr"><hr /></div>

	<!--BEGIN .post-->
    <div id="post-<?php the_ID(); ?>" class="post clearfix <?php semantic_entries(); ?><?php if( unisphere_get_post_image("blog") == '' ) echo ' post-no-image'; ?>">
    
    	<div class="post-format-icon"></div><a class="post-format-permalink" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?></a>

        <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

        <div class="post-meta">

            <?php printf( __( '<span class="author">by %1$s</span><span class="published"><span class="separator">|</span>on %2$s</span>', 'unisphere' ),
                    sprintf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>',
                        get_author_posts_url( get_the_author_meta( 'ID' ) ),
                        sprintf( esc_attr__( 'View all posts by %s', 'unisphere' ), get_the_author() ),
                        get_the_author()
                    ),
                    sprintf( '<abbr class="published-time" title="%1$s">%2$s</abbr>',
                        esc_attr( get_the_time() ),
                        get_the_date()
                    )
                ); ?>

            <?php if ( count( get_the_category() ) ) : ?>
                <span class="post-categories"><span class="separator">|</span><?php printf( __( 'in %s', 'unisphere' ), get_the_category_list( ', ' ) ); ?></span>
            <?php endif; ?>
            
            <?php
                $tags_list = get_the_tag_list( '', ', ' );
                if ( $tags_list ) : ?>
                <span class="post-tags"><span class="separator">|</span><?php printf( __( 'tagged %s', 'unisphere' ), $tags_list ); ?></span>
            <?php endif; ?>
            
            <?php if( 'open' == $post->comment_status ) : ?>
				<span class="post-comment-link"><span class="separator">|</span><?php comments_popup_link( __( 'Leave a comment', 'unisphere' ), __( '1 Comment', 'unisphere' ), __( '% Comments', 'unisphere' ), 'comment-count' ); ?></span>
            <?php endif; ?>
            
        </div>
        
        <div class="post-image">
            <?php if ( has_post_format( 'image' )) :
	            echo unisphere_get_post_image("blog-format-image");
			else : ?>
	            <a href="<?php the_permalink(); ?>"><?php echo unisphere_get_post_image("blog"); ?></a>
			<?php endif; ?>
        </div>

        <div class="post-text">
            <?php the_content(); ?>
            <?php wp_link_pages('before=<div class="wp-pagenavi post_linkpages">&after=</div><br />&link_before=<span>&link_after=</span>'); ?>            
        </div>

    <!--END .post-->
    </div>

<?php endwhile; // End the loop. Whew. ?>

<?php
 // Show the pagination from navigation.php
 get_template_part( 'navigation' );
?>
		
        <!--END #primary-->
		</div>
        
        <?php get_sidebar(); ?>
        
	<!--END #content-->
	</div>

<?php get_footer(); ?>