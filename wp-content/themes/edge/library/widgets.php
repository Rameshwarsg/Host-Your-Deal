<?php
/**
 * Register the theme's widget areas
 */
if ( function_exists('register_sidebar') )	{
	
	register_sidebar(array(
		'name'=>'Home Section 1',
		'description' => 'A widget area shown in the home page below the slider',
		'before_widget' => '<div id="%1$s" class="widget widget-home-section-1 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name'=>'Home Section 2',
		'description' => 'A widget area shown in the home page below the slider',
		'before_widget' => '<div id="%1$s" class="widget widget-home-section-2 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name'=>'Home Section 3',
		'description' => 'A widget area shown in the home page below the slider',
		'before_widget' => '<div id="%1$s" class="widget widget-home-section-3 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name'=>'Home Section 4',
		'description' => 'A widget area shown in the home page below the slider',
		'before_widget' => '<div id="%1$s" class="widget widget-home-section-4 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name'=>'Blog Sidebar',
		'description' => 'A widget sidebar area shown in the blog and posts',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name'=>'Page Sidebar',
		'description' => 'A widget sidebar area shown in pages',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name'=>'Shared Sidebar',
		'description' => 'A widget sidebar area shared across the blog, posts and pages',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name'=>'Contact Page Sidebar',
		'description' => 'A widget area shown only on the Contact Page',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name'=>'Footer Column 1',
		'description' => 'A widget area shown in the Footer of all pages',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name'=>'Footer Column 2',
		'description' => 'A widget area shown in the Footer of all pages',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name'=>'Footer Column 3',
		'description' => 'A widget area shown in the Footer of all pages',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	register_sidebar(array(
		'name'=>'Footer Column 4',
		'description' => 'A widget area shown in the Footer of all pages',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
	// Register a sidebar widget area for every page other than the home, portfolio and contact pages
	$excludes = '-1';
	$excludes .= ',' . get_page_ID_by_page_template('template_home.php');
	$excludes .= ',' . get_page_ID_by_page_template('template_home_blog.php');
	$excludes .= ',' . get_page_ID_by_page_template('template_portfolio3columns.php');
	$excludes .= ',' . get_page_ID_by_page_template('template_contact.php');	
	if ( get_option('page_for_posts') != '' ) { $excludes .= ',' . get_option('page_for_posts'); }
					
	$pages = get_pages('orderby=name&use_desc_for_title=1&hierarchical=0&style=0&hide_empty=0&exclude=' . $excludes);
	if(is_array($pages)) {
		foreach($pages as $pag) { 
			register_sidebar(array(
				'name' => $pag->post_title . ' Sidebar',
				'id' => 'page_' . $pag->ID,
				'description' => 'Unique sidebar widget area shown in the "' . $pag->post_title . '" page',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
			));
		}
	}
}
?>