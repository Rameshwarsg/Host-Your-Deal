<?php 
//for dynamic menu
add_action( 'after_setup_theme', 'ShowcaseMenus');
function ShowcaseMenus()
{
	register_nav_menus(array('main-menus' => _('Showcase Menu')));
}
?>
