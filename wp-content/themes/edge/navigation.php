<?php
/**
 * The posts navigation using the wp-pagenavi plugin
 */

include( UNISPHERE_LIBRARY . '/wp-pagenavi.php' );
if(function_exists('wp_pagenavi')) { wp_pagenavi(); }

?>