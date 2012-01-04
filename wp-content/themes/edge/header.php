<?php global $unisphere_options; ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />	
	<title><?php semantic_title(); ?></title>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen, projection" />
	
   	<!-- Skin -->
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo UNISPHERE_CSS . '/skins/' . $unisphere_options['skin'] . '/skin.php'; ?>" />

	<!-- PrettyPhoto -->
	<link rel="stylesheet" href="<?php echo UNISPHERE_CSS . '/prettyPhoto.css'; ?>" type="text/css" />
	
	<!-- VideoJS -->
	<link rel="stylesheet" href="<?php echo UNISPHERE_CSS . '/video-js.css'; ?>" media="screen" type="text/css" />
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) // loads the javascript required for threaded comments 
		wp_enqueue_script( 'comment-reply' ); ?>
        
	<!-- Theme Hook -->
	<?php wp_head(); ?>

    <?php // Display the custom CSS defined in the admin panel
		if( trim($unisphere_options['custom_css']) != '' ) : ?>
	    <style>
			<?php echo $unisphere_options['custom_css']; ?>
		</style>
	<?php endif; ?>
	
	<style>
	<?php // Hide blog posts meta information
	
		if( $unisphere_options['show_meta_author'] != '1' ) // Author
			echo '.post-meta .author { display: none; }';
		
		if( $unisphere_options['show_meta_date'] != '1' ) // Date
			echo '.post-meta .published { display: none; }';
		if( $unisphere_options['show_meta_author'] != '1' )
			echo '.post-meta .published .separator { display: none; }';
			
		if( $unisphere_options['show_meta_categories'] != '1' ) // Categories
			echo '.post-meta .post-categories { display: none; }';
		if( $unisphere_options['show_meta_author'] != '1' && $unisphere_options['show_meta_date'] != '1' )
			echo '.post-meta .post-categories .separator { display: none; }';
			
		if( $unisphere_options['show_meta_tags'] != '1' ) // Tags
			echo '.post-meta .post-tags { display: none; }';
		if( $unisphere_options['show_meta_author'] != '1' && $unisphere_options['show_meta_date'] != '1' && $unisphere_options['show_meta_categories'] != '1' )
			echo '.post-meta .post-tags .separator { display: none; }';
			
		if( $unisphere_options['show_meta_comment_count'] != '1' ) // Comment Count
			echo '.post-meta .post-comment-link { display: none; }';
		if( $unisphere_options['show_meta_author'] != '1' && $unisphere_options['show_meta_date'] != '1' && $unisphere_options['show_meta_categories'] != '1' && $unisphere_options['show_meta_tags'] != '1' )
			echo '.post-meta .post-comment-link .separator { display: none; }';
	?>
	</style>
    
    <!-- PHP value needed for JavaScript -->
    <meta name="search" content="<?php _e( 'search...', 'unisphere' ); ?>" />
	<meta name="unisphere_js" content="<?php echo UNISPHERE_JS; ?>" />
    <meta name="<?php echo UNISPHERE_THEMESHORTNAME; ?>_version" content="<?php $theme_data = get_theme_data(TEMPLATEPATH . '/style.css'); echo $theme_data['Version']; ?>" />

<!--END head-->
</head>

<!--BEGIN body-->
<body class="<?php echo semantic_body(); ?>">

	<!--BEGIN #container-->
	<div id="container">

		<!--BEGIN #header-->
		<div id="header">
			
			<!--BEGIN #logo-->
			<div id="logo">
				<a href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'name' ); ?>">
					<?php if( $unisphere_options['logo'] != " ") : ?>
						<img src="<?php echo $unisphere_options['logo'] ?>" alt="<?php bloginfo( 'name' ) ?>" />
					<?php else : ?>
						<?php bloginfo( 'name' ) ?>
					<?php endif; ?>
				</a>
			<!--END #logo-->
			</div>
	
			<?php if ( function_exists('wp_nav_menu') ) { // if 3.0 menus exist
				wp_nav_menu( array(
					'show_home' => '0',
	       			'sort_column' => 'menu_order',
	       			'container_class' => 'menu',
	       			'menu_class' => 'nav',
	       	        'theme_location' => 'header_menu',
	       	        'fallback_cb' => 'unisphere_header_navigation'
			    ) );
			} else {
				wp_page_menu( 'show_home=0&sort_column=menu_order&menu_class=menu' ); 
			} ?>	        	
	
		<!--END #header-->
		</div>