<?php
/**
 * The template for displaying attachments.
 */

get_header(); ?>

	<?php
	 // Get the sub-header from sub-header.php
	 get_template_part( 'sub-header' );
	?>

	<!--BEGIN #content-->
	<div id="content" class="blog attachment clearfix">
    
    	<!--BEGIN #primary-->
		<div id="primary">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" class="post-detail clearfix <?php semantic_entries(); ?>">
            
				<h1 class="post-title"><?php the_title(); ?></h1>
				
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
		
		            <?php
                        if ( wp_attachment_is_image() ) {
							$metadata = wp_get_attachment_metadata();
							printf( __( '<span class="post-categories"><span class="separator">|</span>Full size is %s pixels</span>', 'unisphere'),
								sprintf( '<a href="%1$s" title="%2$s" rel="lightbox">%3$s &times; %4$s</a>',
									wp_get_attachment_url(),
									esc_attr( __('Link to full-size image', 'unisphere') ),
									$metadata['width'],
									$metadata['height']
								)
							);
						} ?>
		            
		        </div>
                
                <div class="post-image">
<?php if ( wp_attachment_is_image() ) : ?>
					<?php $attachment_size = 710; ?>
                    <a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="lightbox">
						<?php echo wp_get_attachment_image( $post->ID, array( $attachment_size, 9999 ) ); // 710px with, essentially, no limit for image height. ?>
                    </a>
<?php else : ?>
					<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
<?php endif; ?>
				</div>

                <div class="post-text">
					<?php if ( !empty( $post->post_excerpt ) ) the_excerpt(); ?>
                </div>

			<!--END .post-detail-->
			</div>

			<div class="hr"><hr /></div>

<?php comments_template(); ?>

<?php endwhile; ?>

        <!--END #primary-->
		</div>
        
        <?php get_sidebar(); ?>
	
	<!--END #content-->
	</div>	

<?php get_footer(); ?>