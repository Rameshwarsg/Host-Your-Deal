<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

	<?php
	 // Get the sub-header from sub-header.php
	 get_template_part( 'sub-header' );
	?>

	<!--BEGIN #content-->
	<div id="content" class="blog-post clearfix">

		<!--BEGIN #primary-->
		<div id="primary">
        
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<!--BEGIN .post-detail-->
				<div id="post-<?php the_ID(); ?>" class="post-detail clearfix <?php semantic_entries(); ?><?php if( unisphere_get_post_image("blog") == '' ) echo ' post-no-image'; ?>">
                
                	<div class="post-format-icon"></div><a class="post-format-permalink" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php printf( esc_attr__( 'Permalink to %s', 'unisphere' ), the_title_attribute( 'echo=0' ) ); ?></a>

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
				            <a href="<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false); echo $full_image[0]; ?>" title="<?php the_title(); ?>" rel="lightbox"><?php echo unisphere_get_post_image("blog"); ?></a>
						<?php endif; ?>
			        </div>
			
			        <div class="post-text">
			            <?php the_content(); ?>
			            
			            <?php if ( $unisphere_options['show_blog_tweet_button'] == '1' || $unisphere_options['show_blog_fb_like_button'] == '1') : ?>
			            <div class="share-buttons">
			            	<?php if ( $unisphere_options['show_blog_tweet_button'] == '1' ) : ?>
								<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink(); ?>" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
							<?php endif; ?>
			            	<?php if ( $unisphere_options['show_blog_fb_like_button'] == '1' ) : ?>
								<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo rawurlencode(get_permalink()); ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=<?php if( $unisphere_options['skin'] == 'light' ) echo 'light'; else echo 'dark'; ?>&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:35px;" allowTransparency="true" class="facebook-like-button"></iframe>
							<?php endif; ?>
			            </div>
			            <?php endif; ?>

			            <?php wp_link_pages('before=<div class="wp-pagenavi post_linkpages">&after=</div><br />&link_before=<span>&link_after=</span>'); ?>            
			        </div>

                <!--END .post-detail-->
                </div>
                
				<div class="hr"><hr /></div>
                
				<?php comments_template( '', true ); ?>

			<?php endwhile; ?>

		<!--END #primary-->
		</div>

		<?php get_sidebar(); ?>
        
	<!--END #content-->
	</div>

<?php get_footer(); ?>