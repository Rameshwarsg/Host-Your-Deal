<?php 
//for dynamic menu
add_action( 'after_setup_theme', 'MatchbookMenus');
function MatchbookMenus()
{
	register_nav_menus(array('main-menus' => _('Matchbook Menu')));
}
?>
