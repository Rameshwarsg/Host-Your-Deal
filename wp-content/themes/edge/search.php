<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>

	<?php
	 // Get the sub-header from sub-header.php
	 get_template_part( 'sub-header' );
	?>

	<!--BEGIN #content-->
	<div id="content" class="blog date-archives clearfix">

		<!--BEGIN #primary-->
		<div id="primary">

<?php if ( have_posts() ) : ?>				
			<?php
            /* Run the loop to output the posts. */
        	 get_template_part( 'loop' );
            ?>
<?php else : ?>
            <div id="post-0" class="post clearfix no-results not-found post-no-image">
                <div class="post-content-wrapper">
                    <h2 class="post-title"><?php _e( 'Nothing Found', 'unisphere' ); ?></h2>
                    <div class="post-text">
                        <p><?php _e( 'Apologies, but nothing matched your search criteria. Please try again with some different keywords.', 'unisphere' ); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
<?php endif; ?>
	
        <!--END #primary-->
		</div>
        
        <?php get_sidebar(); ?>

	<!--END #content-->
	</div>	

<?php get_footer(); ?>