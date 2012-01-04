<?php 
/*
Template Name: Full Width Page
*/

get_header(); ?>

	<?php
	 // Get the sub-header from sub-header.php
	 get_template_part( 'sub-header' );
	?>

	<!--BEGIN #content-->
	<div id="content" class="full-width-page clearfix">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>
			<?php comments_template( '', true ); ?>

		<?php endwhile; ?>

	<!--END #content-->
	</div>

<?php get_footer(); ?>