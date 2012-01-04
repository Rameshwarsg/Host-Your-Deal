<?php
/**
 * The inner page sub-header
 */ 
?>

	<!--BEGIN #sub-header-container-->
	<div id="sub-header-container">

		<!--BEGIN #sub-header-->
		<div id="sub-header">
	
			<?php // Sub-header Title
				$sub_title = '';
				
				// Check current post's post type
				$post_type = get_post_type( $post->ID );
			
				if( (is_home() || is_single()) && !is_attachment() && $post_type != 'portfolio_cpt' ) { // Keep the sub-title defined in your blog page through the blog and single posts
					$sub_title = get_post_meta( get_option( 'page_for_posts' ), "_page_sub_title", $single = true );
					
					$page_for_posts = get_option( 'page_for_posts' );
					if( $page_for_posts == '0' || $page_for_posts == '' )
						$sub_title = get_post_meta( get_option( 'page_on_front' ), "_page_sub_title", $single = true ); 
					else {
						if( get_post_meta( $page_for_posts, "_page_sub_title", $single = true ) != '' )
							$sub_title = get_post_meta( $page_for_posts, "_page_sub_title", $single = true );
						else {
							$page_for_posts = get_post($page_for_posts);
							$sub_title = $page_for_posts->post_title;
						}
					}
					
					// Override with single post sub-header title if defined in a custom-field
					if( is_single() && get_post_meta( $post->ID, "_blog_sub_title", $single = true ) != '' )
						$sub_title = get_post_meta( $post->ID, "_blog_sub_title", $single = true );
	
				} elseif( is_single() && $post_type == 'portfolio_cpt' ) { // Single portfolio posts display their title in the sub-header
									
					$sub_title = $post->post_title;
					
					// Override with single portfolio post sub-header title if defined in a custom-field
					if( get_post_meta( $post->ID, "_portfolio_sub_title", $single = true ) != '' )
						$sub_title = get_post_meta( $post->ID, "_portfolio_sub_title", $single = true );
							
				} elseif( is_tag() ) {
					$sub_title = sprintf( __( 'Tag Archives: %s', 'unisphere' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				} elseif( is_category() ) {
					$sub_title = sprintf( __( 'Category Archives: %s', 'unisphere' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				} elseif( is_author() ) {
					if ( have_posts() )	the_post();
				    $sub_title = sprintf( __( 'Author Archives: %s', 'unisphere' ), '<span>' . get_the_author() . '</span>' );
					rewind_posts();
				} elseif( is_day() ) {
					if ( have_posts() )	the_post();
				    $sub_title = sprintf( __( 'Daily Archives: %s', 'unisphere' ), '<span>' . get_the_date() . '</span>' );
					rewind_posts();
				} elseif( is_month() ) {
					if ( have_posts() )	the_post();
				    $sub_title = sprintf( __( 'Monthly Archives: %s', 'unisphere' ), '<span>' . get_the_date('F Y') . '</span>' );
					rewind_posts();
				} elseif( is_year() ) {
					if ( have_posts() )	the_post();
				    $sub_title = sprintf( __( 'Yearly Archives: %s', 'unisphere' ), '<span>' . get_the_date('Y') . '</span>' );
					rewind_posts();
				} elseif( is_404() ) {					
					$sub_title = __( 'The Page could not be found', 'unisphere' );
				} elseif( is_attachment() ) {
					if ( have_posts() )	the_post();
					$sub_title = sprintf( __( 'Attachment: %s', 'unisphere' ), '<span>' . get_the_title() . '</span>' );
					rewind_posts();
				} elseif( is_search() ) {
					$sub_title = sprintf( __( 'Search Results for: %s', 'unisphere' ), '<span>' . get_search_query() . '</span>' );
				} else {
					if( get_post_meta( $post->ID, "_page_sub_title", $single = true ) != '' )
						$sub_title = get_post_meta( $post->ID, "_page_sub_title", $single = true );
					else
						$sub_title = $post->post_title;
	            } 
	            
	            $length = strlen( strip_tags( $sub_title ) );
	            $h1_class = '';
	
	            if( $length < 33 )
	            	$h1_class = 'small';
	            elseif( $length >= 33 && $length < 42)
	            	$h1_class = 'medium';
	            elseif( $length >= 42)
	            	$h1_class = 'large';
	            
	            if( $sub_title != '' ) {
					echo '<h1 class="' . $h1_class . '">' . $sub_title . '</h1>';
				} ?>
	
		<!--END #sub-header-->
		</div>
		
	<!--END #sub-header-container-->
	</div>