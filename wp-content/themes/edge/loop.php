<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 */
 
global $unisphere_options;
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
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
<?php while ( have_posts() ) : the_post(); ?>

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
            <?php if(is_search()) the_excerpt(); else the_content(); ?>
            <?php wp_link_pages('before=<div class="wp-pagenavi post_linkpages">&after=</div><br />&link_before=<span>&link_after=</span>'); ?>            
        </div>

    <!--END .post-->
    </div>    

    <?php comments_template( '', true ); ?>

<?php endwhile; // End the loop. Whew. ?>

<?php
 // Show the pagination from navigation.php
 get_template_part( 'navigation' );
?>