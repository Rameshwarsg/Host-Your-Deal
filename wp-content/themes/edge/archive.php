<?php
/**
 * The template for displaying Archive pages.
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

			<?php
            /* Run the loop to output the posts. */
        	 get_template_part( 'loop' );
            ?>
	
        <!--END #primary-->
		</div>
        
        <?php get_sidebar(); ?>

	<!--END #content-->
	</div>	

<?php get_footer(); ?>