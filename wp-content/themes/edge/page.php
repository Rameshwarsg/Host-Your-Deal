<?php
/**
 * The default template for displaying all pages with sidebar.
 */

get_header(); ?>

	<?php
	 // Get the sub-header from sub-header.php
	 get_template_part( 'sub-header' );
	?>

	<!--BEGIN #content-->
	<div id="content" class="page clearfix">

		<!--BEGIN #primary-->
		<div id="primary">
            
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>
				<?php //comments_template( '', true ); ?>

			<?php endwhile; ?>

		<!--END #primary-->
		</div>

		<?php get_sidebar(); ?>
            
	<!--END #content-->
	</div>

<?php get_footer(); ?>
