<?php
/**
 * Search form shown when the function get_search_form() is called
 */
?>

<form method="get" class="searchform" action="<?php bloginfo( 'url' ); ?>">
	<input class="search" name="s" type="text" />
    <button class="search-btn" type="submit"><?php _e('Search', 'unisphere'); ?></button>
</form>
