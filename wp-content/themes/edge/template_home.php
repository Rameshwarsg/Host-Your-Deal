<?php 
/*
Template Name: Home Page
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
	<div id="content" class="clearfix">

		<?php if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				the_content();
			endwhile; 
		endif; ?>

		<?php if ( $unisphere_options['show_4_home_sections'] == '1' ) : ?>
        
		<!--BEGIN #home-4-sections-->
		<div id="home-4-sections" class="clearfix">

			<div class="home-section">
				<?php	/* Widgetized Area */
					if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Home Section 1') ) : ?>
        
					<?php echo wpml_t( 'unisphere', 'Home Section 1', unisphere_run_shortcode( $unisphere_options['home_section_1'] ) ) ?>
        	
    	    	<?php endif; ?>
			</div>

			<div class="home-section">
				<?php	/* Widgetized Area */
					if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Home Section 2') ) : ?>
        
					<?php echo wpml_t( 'unisphere', 'Home Section 2', unisphere_run_shortcode( $unisphere_options['home_section_2'] ) ); ?>
        	
    	    	<?php endif; ?>
			</div>

			<div class="home-section">
				<?php	/* Widgetized Area */
					if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Home Section 3') ) : ?>
        
					<?php echo wpml_t( 'unisphere', 'Home Section 3', unisphere_run_shortcode( $unisphere_options['home_section_3'] ) ); ?>
        	
    	    	<?php endif; ?>
			</div>
			
			<div class="home-section">
				<?php	/* Widgetized Area */
					if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Home Section 4') ) : ?>
        
					<?php echo wpml_t( 'unisphere', 'Home Section 4', unisphere_run_shortcode( $unisphere_options['home_section_4'] ) ); ?>
        	
    	    	<?php endif; ?>
			</div>

		<!--END #home-4-sections-->
		</div>

        <?php endif; ?>
        
		<?php if ( $unisphere_options['show_home_portfolio'] == '1' ) : ?>

		<!--BEGIN #home-portfolio-title-->		
		<div id="home-portfolio-title">
			<?php if ( trim( $unisphere_options['home_portfolio_title'] ) != '' ) echo '<h2>' . wpml_t( 'unisphere', 'Home Page Portfolio Section Title', $unisphere_options['home_portfolio_title'] ) . '</h2>'; ?>
			<div class="hr"><hr /></div>
		<!--END #home-portfolio-title-->
		</div>
        
        <!--BEGIN #home-portfolio-->
		<div id="home-portfolio">

			<ul class="portfolio-4-columns-list clearfix">

				<?php
                    $my_query = new WP_Query( array( 'post_type' => 'portfolio_cpt', 'showposts' => '4' ) ); 
                    while ($my_query->have_posts()) : $my_query->the_post();
                    
                    $custom = get_post_custom($post->ID);
                ?>
                <li class="portfolio-item">
                	<?php // Lightbox Video takes precedence before the portfolio link
						if( !empty ( $custom['_portfolio_video'][0] ) ) : // Check if there's a video to be displayed in the lightbox when clicking the thumb ?>
                        <a href="<?php echo $custom['_portfolio_video'][0]; ?>" title="<?php the_title(); ?>" rel="lightbox[portfolio]">
                	<?php elseif( $custom['_portfolio_link'][0] != '' ) : // User has set a custom destination link for this portfolio item ?>
                		<a href="<?php echo $custom['_portfolio_link'][0]; ?>" title="<?php the_title(); ?>">
                	<?php elseif( $custom['_portfolio_no_lightbox'][0] == '1' ) : // User has selected to link the thumb directly to the portfolio item detail page or the custom url ?>
                		<a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php else : // just open the full image in the lightbox ?>
                        <a href="<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); echo $full_image[0]; ?>" title="<?php the_title(); ?>" rel="lightbox[portfolio]">
                    <?php endif; ?>
                    <?php echo unisphere_get_post_image("portfolio4"); ?>
                    </a>
					<div class="portfolio-title"><a href="<?php echo !empty( $custom['_portfolio_link'][0] ) ? $custom['_portfolio_link'][0] : the_permalink(); ?>"><?php the_title(); ?></a></div>
                </li>
                <?php endwhile; ?>
			</ul>
            
		<!--END #home-portfolio-->
		</div>

		<?php endif; ?>

		<?php if ( $unisphere_options['show_home_blog'] == '1' ) : ?>
		
		<!--BEGIN #home-blog-title-->
		<div id="home-blog-title">
			<?php if ( trim( $unisphere_options['home_blog_title'] ) != '' ) echo '<h2>' . wpml_t( 'unisphere', 'Home Page Blog Section Title', $unisphere_options['home_blog_title'] ) . '</h2>'; ?>
			<div class="hr"><hr /></div>
		<!--END #home-blog-title-->
		</div>
        
        <!--BEGIN #primary-->
		<div id="primary" class="home-blog-section">

			<?php
				$my_query = new WP_Query( array( 'post_type' => 'post', 'showposts' => '1' ) ); 
				while ($my_query->have_posts()) : $my_query->the_post();
				global $more;
				$more = 0;
			?>
                <div id="post-<?php the_ID(); ?>" class="post-excerpt post home-post clearfix <?php semantic_entries(); ?><?php if( unisphere_get_post_image("blog") == '' ) echo ' post-no-image'; ?>">
					
					<div class="post-format-icon"></div><a class="post-format-permalink" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?></a>

                    <div class="post-image">
                    	<?php if ( has_post_format( 'image' )) :
				            echo unisphere_get_post_image("blog-format-image");
						else : ?>
				            <a href="<?php the_permalink(); ?>"><?php echo unisphere_get_post_image("blog"); ?></a>
						<?php endif; ?>                      
                    </div>
                    
                    <h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                        
					<div class="post-text">
						<?php if( has_post_format('gallery') || has_post_format('link') || has_post_format('image') || has_post_format('quote') || has_post_format('status') || has_post_format('video') || has_post_format('chat' ) ) {
							the_content();
						} else { ?>							
							<?php echo unisphere_custom_excerpt( get_the_excerpt(), 35 ); ?>
							<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('read more &raquo;', 'unisphere'); ?></a>
						<?php } ?>
					</div>

                </div>
				<?php endwhile; ?>
                
		<!--END #primary-->
		</div>

		<!--BEGIN #secondary-->
		<div id="secondary">

			<div class="widget widget-posts widget-home-posts">
				<ul>

					<?php
						$my_query = new WP_Query( array( 'post_type' => 'post', 'offset' => '1', 'showposts' => '3' ) ); 
						while ($my_query->have_posts()) : $my_query->the_post();
					?>
                    
                    <li class="clearfix<?php echo unisphere_get_post_image( 'sidebar-post' ) == '' ? ' no-image' : ''; ?>">
						<a href="<?php the_permalink(); ?>"><?php echo unisphere_get_post_image("sidebar-post"); ?></a>
						<a class="post-title" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a><?php echo sprintf( '<abbr class="published-time" title="%1$s">%2$s</abbr>', esc_attr( get_the_time() ), get_the_date() ); ?>
					</li>

					<?php endwhile; ?>
				
                </ul>
			</div>                        

		<!--END #secondary-->
		</div>
        
		<?php endif; ?>

	<!--END #content-->
	</div>
		
<?php get_footer(); ?>
