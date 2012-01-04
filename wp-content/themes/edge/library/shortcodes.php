<?php
// Long posts should require a higher limit, see http://core.trac.wordpress.org/ticket/8553
@ini_set('pcre.backtrack_limit', 500000);


/**
 * This function pushes shortcodes earlier in the queue so their content doesn't get texturized
 */
function unisphere_run_shortcode( $content ) {
    global $shortcode_tags;
 
    // Backup current registered shortcodes and clear them all out
    $orig_shortcode_tags = $shortcode_tags;
    $shortcode_tags = array();
    
	add_shortcode('one_half', 'unisphere_one_half');
	add_shortcode('one_half_last', 'unisphere_one_half_last');
	add_shortcode('one_third', 'unisphere_one_third');
	add_shortcode('one_third_last', 'unisphere_one_third_last');
	add_shortcode('two_third', 'unisphere_two_third');
	add_shortcode('two_third_last', 'unisphere_two_third_last');
	add_shortcode('one_fourth', 'unisphere_one_fourth');
	add_shortcode('one_fourth_last', 'unisphere_one_fourth_last');
	add_shortcode('three_fourth', 'unisphere_three_fourth');
	add_shortcode('three_fourth_last', 'unisphere_three_fourth_last');	
	add_shortcode('one_fifth', 'unisphere_one_fifth');
	add_shortcode('one_fifth_last', 'unisphere_one_fifth_last');
	add_shortcode('two_fifth', 'unisphere_two_fifth');
	add_shortcode('two_fifth_last', 'unisphere_two_fifth_last');
	add_shortcode('three_fifth', 'unisphere_three_fifth');
	add_shortcode('three_fifth_last', 'unisphere_three_fifth_last');
	add_shortcode('four_fifth', 'unisphere_four_fifth');
	add_shortcode('four_fifth_last', 'unisphere_four_fifth_last');	
	add_shortcode('one_sixth', 'unisphere_one_sixth');
	add_shortcode('one_sixth_last', 'unisphere_one_sixth_last');	
	add_shortcode('five_sixth', 'unisphere_five_sixth');
	add_shortcode('five_sixth_last', 'unisphere_five_sixth_last');	
	add_shortcode('hr', 'unisphere_hr_shortcode');	
	add_shortcode('hr2', 'unisphere_hr2_shortcode');	
	add_shortcode('dropcap', 'unisphere_dropcap_shortcode');
	add_shortcode('list', 'unisphere_list_shortcode');	
	add_shortcode('image', 'unisphere_image_shortcode');
	add_shortcode('slider', 'unisphere_slider_shortcode');
	add_shortcode('slider_custom', 'unisphere_slider_custom_shortcode');
	add_shortcode('testimonial', 'unisphere_testimonial_shortcode');
	add_shortcode('button', 'unisphere_button_shortcode');
	add_shortcode('blockquote', 'unisphere_blockquote_shortcode');
	add_shortcode('bar_info_box_1', 'unisphere_bar_info_box_1_shortcode');
	add_shortcode('bar_info_box_2', 'unisphere_bar_info_box_2_shortcode');
	add_shortcode('bar_info_box_3', 'unisphere_bar_info_box_3_shortcode');
	add_shortcode('info_box_1', 'unisphere_info_box_1_shortcode');
	add_shortcode('info_box_2', 'unisphere_info_box_2_shortcode');
	add_shortcode('info_box_3', 'unisphere_info_box_3_shortcode');
	add_shortcode('tabs', 'unisphere_tabs_shortcode');
	add_shortcode('tab', 'unisphere_tab_shortcode');
	add_shortcode('toggle', 'unisphere_toggle_shortcode');
	add_shortcode('price_table', 'unisphere_price_table_shortcode');
	add_shortcode('price_column', 'unisphere_price_column_shortcode');
	add_shortcode('price_tag', 'unisphere_price_tag_shortcode');
	add_shortcode('highlight', 'unisphere_highlight_shortcode');
	add_shortcode('video', 'unisphere_video_shortcode');
	add_shortcode('lightbox', 'unisphere_lightbox_shortcode');
	add_shortcode('recent_posts', 'unisphere_recent_posts_shortcode');
	add_shortcode('popular_posts', 'unisphere_popular_posts_shortcode');
	add_shortcode('twitter', 'unisphere_twitter_shortcode');
	add_shortcode('flickr', 'unisphere_flickr_shortcode');
	add_shortcode('map', 'unisphere_map_shortcode');

	// Creates a space between two consecutive shortcodes (otherwise causes unexpected bugs in shortcode parsing)
	$content = preg_replace('/\]\[/im', "] [", $content);

    // Do the shortcode (only the one above is registered)
    $content = do_shortcode( $content );
 
    // Put the original shortcodes back
    $shortcode_tags = $orig_shortcode_tags;
 
    return $content;
} 
add_filter( 'the_content', 'unisphere_run_shortcode', 7 );
add_filter( 'widget_text', 'unisphere_run_shortcode', 7 );


/**
 * Column Shortcodes
 */

// Half
function unisphere_one_half($atts, $content=null) {
   return '<div class="one-half">' . do_shortcode($content) . '</div>';
}

function unisphere_one_half_last($atts, $content=null) {
   return '<div class="one-half last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}


// Third
function unisphere_one_third($atts, $content=null) {
   return '<div class="one-third">' . do_shortcode($content) . '</div>';
}

function unisphere_one_third_last($atts, $content=null) {
   return '<div class="one-third last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function unisphere_two_third($atts, $content=null) {
   return '<div class="two-third">' . do_shortcode($content) . '</div>';
}

function unisphere_two_third_last($atts, $content=null) {
   return '<div class="two-third last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}


// Fourth
function unisphere_one_fourth($atts, $content=null) {
   return '<div class="one-fourth">' . do_shortcode($content) . '</div>';
}

function unisphere_one_fourth_last($atts, $content=null) {
   return '<div class="one-fourth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function unisphere_three_fourth($atts, $content=null) {
   return '<div class="three-fourth">' . do_shortcode($content) . '</div>';
}

function unisphere_three_fourth_last($atts, $content=null) {
   return '<div class="three-fourth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}


// Fifth
function unisphere_one_fifth($atts, $content=null) {
   return '<div class="one-fifth">' . do_shortcode($content) . '</div>';
}

function unisphere_one_fifth_last($atts, $content=null) {
   return '<div class="one-fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function unisphere_two_fifth($atts, $content=null) {
   return '<div class="two-fifth">' . do_shortcode($content) . '</div>';
}

function unisphere_two_fifth_last($atts, $content=null) {
   return '<div class="two-fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function unisphere_three_fifth($atts, $content=null) {
   return '<div class="three-fifth">' . do_shortcode($content) . '</div>';
}

function unisphere_three_fifth_last($atts, $content=null) {
   return '<div class="three-fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function unisphere_four_fifth($atts, $content=null) {
   return '<div class="four-fifth">' . do_shortcode($content) . '</div>';
}

function unisphere_four_fifth_last($atts, $content=null) {
   return '<div class="four-fifth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}


// Sixth
function unisphere_one_sixth($atts, $content=null) {
   return '<div class="one-sixth">' . do_shortcode($content) . '</div>';
}

function unisphere_one_sixth_last($atts, $content=null) {
   return '<div class="one-sixth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}

function unisphere_five_sixth($atts, $content=null) {
   return '<div class="five-sixth">' . do_shortcode($content) . '</div>';
}

function unisphere_five_sixth_last($atts, $content=null) {
   return '<div class="five-sixth last">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}


/**
 * Horizontal Separator Shortcode
 */
function unisphere_hr_shortcode($atts) {
   return '<div class="hr"><hr /></div>';
}


/**
 * Horizontal Separator Shortcode (bigger margin)
 */
function unisphere_hr2_shortcode($atts) {
   return '<div class="hr2"><hr /></div>';
}


/**
 * Dropcaps Shortcode
 */
function unisphere_dropcap_shortcode($atts, $content = null) {	
	return '<span class="dropcap">' . do_shortcode($content) . '</span>';
}


/**
 * Lists Shortcodes
 */
function unisphere_list_shortcode($atts, $content = null) {
	return '<ul class="color-bullet">' . $content . '</ul>';
}


/**
 * Image Shortcode
 */
function unisphere_image_shortcode($atts) {
	extract(shortcode_atts(array(		
		"url" => "",
		"img" => "",
		"alt" => "",
		"lightbox" => "true",
		"group" => "",
		"align" => ""
	), $atts));
	
	if ( $img == '' )
		return NULL;
	
	$img_rel = '';
	if( $lightbox == 'true' )
		$img_rel = 'rel="lightbox"';
		
	if( $group != '' && $lightbox == 'true')
		$img_rel = 'rel="lightbox[' . $group . ']"';
	
	$align != '' ? $align = 'image-' . $align  : $align = '';
	
	$imageclass = '';	
	if( $align != '') {
		$imageclass = 'class="' . $align . '" ';
	}
	
	$linkclass = '';
	if( $align != '') {
		$linkclass = 'class="' . $align . '" ';
	}
	
	$output = '';
		
	if( $url != '' ) {
		$output  .=  '<a href="' . $url . '" title="' . $alt . '" ' . $img_rel . ' ' . $linkclass . '><img src="' . $img . '" alt="' . $alt . '" title="' . $alt . '" ' . $imageclass . '/></a>';
	} else {
		$output  .=  '<img src="' . $img . '" alt="' . $alt . '" title="' . $alt . '" ' . $imageclass . '/>';
	}
	
	return $output;
}


/**
 * Slider Shortcodes
 */
function unisphere_slider_shortcode($atts) {
	global $post;
	extract(shortcode_atts(array(
		"order" => "ASC",
		"orderby" => "menu_order ID",
        "size" => "medium",
		"effect" => "random",
		"slices" => 15,
		"animspeed" => 500,
		"pausetime" => 4000,
		"numberimages" => '20',
		"lightbox" => 'true',
		"exclude" => '',
		"include" => ''
	), $atts));
	
	$rand         =  rand();
	$id           =  intval($post->ID);
	$orderby      =  addslashes($orderby);
	$attachments  =  get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby, 'exclude' => $exclude, 'include' => $include, 'numberposts' => $numberimages) );

	if ( empty($attachments) )
		return NULL;
		
	$output = "<div class=\"slider slider-" . $size . "\" id=\"slider-" . $rand . "\">";

	foreach ( $attachments as $id => $attachment ) {
		$img_lnk = wp_get_attachment_image_src($id, 'full');
		$img_lnk = $img_lnk[0];

		$img_src = '';
		
		if( $size == 'big' ) {
			$img_src = unisphere_resize( $attachment->ID, null, UNISPHERE_SLIDER_BIG_W, UNISPHERE_SLIDER_BIG_H, true );
		} elseif ( $size == 'medium' ) {
			$img_src = unisphere_resize( $attachment->ID, null, UNISPHERE_SLIDER_MEDIUM_W, UNISPHERE_SLIDER_MEDIUM_H, true );
		} else {
			$img_src = unisphere_resize( $attachment->ID, null, UNISPHERE_SLIDER_SMALL_W, UNISPHERE_SLIDER_SMALL_H, true );
		}		
		
		$img_src = $img_src['url'];
		
		$img_alt = $attachment->post_excerpt;
		
		if ( $img_alt == null )
			$img_alt = $attachment->post_title;
			
		if( $lightbox == 'true' ) {
			$img_rel = 'rel="lightbox[' . $rand . ']"';
			$output  .=  '<a href="' . $img_lnk . '" title="' . $img_alt . '" ' . $img_rel . '><img src="' . $img_src . '" alt="' . $img_alt . '" title="' . $img_alt . '" /></a>';
		} else {
			$output  .=  '<img src="' . $img_src . '" alt="' . $img_alt . '" title="' . $img_alt . '" />';
		}
	}
	$output .= "</div>";
	
	$output .= "<script>";
	$output .= "jQuery(window).load(function() {";
	$output .= "jQuery('#slider-" . $rand . "').nivoSlider({";
	$output .= "effect:'" . $effect . "',";
	$output .= "slices:" . $slices . ",";
	$output .= "animSpeed:" . $animspeed . ",";
	$output .= "pauseTime:" . $pausetime . ",";
	$output .= "startSlide:0,";
	$output .= "directionNav:false,";
	$output .= "directionNavHide:true,";
	$output .= "controlNav:true,";
	$output .= "controlNavThumbs:false,";
	$output .= "controlNavThumbsFromRel:false,";
	$output .= "controlNavThumbsSearch: '.jpg',";
	$output .= "controlNavThumbsReplace: '_thumb.jpg',";
	$output .= "keyboardNav:true,";
	$output .= "pauseOnHover:true,";
	$output .= "manualAdvance:false,";
	$output .= "captionOpacity:1,";
	$output .= "beforeChange: function(){},";
	$output .= "afterChange: function(){},";
	$output .= "slideshowEnd: function(){}";
	$output .= "});";
	$output .= "});";
	$output .= "</script>";

	return $output;
}


function unisphere_slider_custom_shortcode($atts, $content = null) {
	global $post;
	extract(shortcode_atts(array(		
        "size" => "medium",
		"effect" => "random",
		"slices" => 15,
		"animspeed" => 500,
		"pausetime" => 4000
	), $atts));
	
	$rand = rand();
	
	if ( empty($content) )
		return NULL;
		
	$output = "<div class=\"slider slider-" . $size . "\" id=\"slider-" . $rand . "\">";
	$output .= do_shortcode($content);
	$output .= "</div>";
	
	$output .= "<script>";
	$output .= "jQuery(window).load(function() {";
	$output .= "jQuery('#slider-" . $rand . " br').remove();";
	$output .= "jQuery('#slider-" . $rand . "').nivoSlider({";
	$output .= "effect:'" . $effect . "',";
	$output .= "slices:" . $slices . ",";
	$output .= "animSpeed:" . $animspeed . ",";
	$output .= "pauseTime:" . $pausetime . ",";
	$output .= "startSlide:0,";
	$output .= "directionNav:false,";
	$output .= "directionNavHide:true,";
	$output .= "controlNav:true,";
	$output .= "controlNavThumbs:false,";
	$output .= "controlNavThumbsFromRel:false,";
	$output .= "controlNavThumbsSearch: '.jpg',";
	$output .= "controlNavThumbsReplace: '_thumb.jpg',";
	$output .= "keyboardNav:true,";
	$output .= "pauseOnHover:true,";
	$output .= "manualAdvance:false,";
	$output .= "captionOpacity:1,";
	$output .= "beforeChange: function(){},";
	$output .= "afterChange: function(){},";
	$output .= "slideshowEnd: function(){}";
	$output .= "});";
	$output .= "});";
	$output .= "</script>";

	return $output;
}


/**
 * Testimonials Shortcode
 */
function unisphere_testimonial_shortcode($atts, $content = null) {
	global $post;
	extract(shortcode_atts(array(		
		"img" => "",
		"company" => "",
		"url" => "",
		"person" => ""
	), $atts));
	
	if ( !empty($img) )
		$img = "<div class=\"testimonial-image\">" . "<img src=\"" . $img . "\" alt=\"" . $person . "\" />" . "</div>";
		
	if ( !empty($company) )
		$company = "<span class=\"testimonial-company\">" . ( !empty( $url ) ? "<a href=\"" . $url . "\" title=\"" . $company . "\">" . $company . "</a>" : $company ) . "</span>";
		
	$output  = "<div class=\"testimonial-container\">";
	$output .= "<div class=\"testimonial\">";
	$output .= "<div class=\"testimonial-content\">";
	$output .= "<p>" . do_shortcode($content) . "</p>";
	$output .= "</div>";
	$output .= "<div class=\"testimonial-meta\">";
	$output .= $img;
	$output .= $company;
	$output .= "<span class=\"testimonial-person\">" . $person . "</span>";
	$output .= "</div>";
	$output .= "</div>";
	$output .= "</div>";	

	return $output;
}


/**
 * Button Shortcodes
 */
function unisphere_button_shortcode($atts) {
	extract(shortcode_atts(array(		
        "size" => "",
		"style" => "",
		"text" => "",
		"url" => "",
		"newwindow" => "",
		"txtcolor" => "",
		"bgcolor" => "",
		"txtcolorhover" => "",
		"bgcolorhover" => ""		
	), $atts));
	
	if ( $size == 'big' ) { $size = '-big'; } else { $size = ''; }	
	if ( $style == 'unselected' ) {	$style = '-unselected'; } else { $style = ''; }
	if ( $newwindow == 'true' ) { $newwindow = ' data-newwindow="true"'; } else { $newwindow = ''; }
	if ( $txtcolor != '' ) { $txtcolor = ' data-txtcolor="' . $txtcolor . '"'; } else { $txtcolor = ''; }
	if ( $bgcolor != '' ) { $bgcolor = ' data-bgcolor="' . $bgcolor . '"'; } else { $bgcolor = ''; }	
	if ( $txtcolorhover != '' ) { $txtcolorhover = ' data-txtcolorhover="' . $txtcolorhover . '"'; } else { $txtcolorhover = ''; }
	if ( $bgcolorhover != '' ) { $bgcolorhover = ' data-bgcolorhover="' . $bgcolorhover . '"'; } else { $bgcolorhover = ''; }	

	if( $url != '' ) {
		return '<a href="' . $url . '" class="button' . $size . $style . '"' . $newwindow . $txtcolor . $bgcolor . $txtcolorhover . $bgcolorhover . '>' . $text . '</a>';
	} else {
		return '<button class="button' . $size . $style . '"' . $newwindow . $txtcolor . $bgcolor . $txtcolorhover . $bgcolorhover . '>' . $text . '</button>';
	}
}


/**
 * Blockquote Shortcodes
 */
function unisphere_blockquote_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "align" => ""
	), $atts));
	
	if ( $align != '' ) {
		return '<blockquote class="align' . $align . '">' . $content . '</blockquote>';
	} else {
		return '<blockquote>' . $content . '</blockquote>';
	}	
}


/**
 * Bar Information Box Shortcodes
 */
function unisphere_bar_info_box_1_shortcode($atts) {
	extract(shortcode_atts(array(		
        "buttonurl" => "",
		"buttontext" => "",
		"text" => ""
	), $atts));
	
	$output  = '<div class="bar-info-box bar-info-box-1">';
	$output .= '<span>' . $text . '</span>';
	
	if ( $buttonurl != '' && $buttontext != '' )
		$output .= '<a href="' . $buttonurl . '" class="button">' . $buttontext . '</a>';
		
	$output .= '</div>';
	
	return $output;
}

function unisphere_bar_info_box_2_shortcode($atts) {
	extract(shortcode_atts(array(		
        "buttonurl" => "",
		"buttontext" => "",
		"text" => ""
	), $atts));
	
	$output  = '<div class="bar-info-box bar-info-box-2">';
	$output .= '<span>' . $text . '</span>';
	
	if ( $buttonurl != '' && $buttontext != '' )
		$output .= '<a href="' . $buttonurl . '" class="button">' . $buttontext . '</a>';
		
	$output .= '</div>';
	
	return $output;
}

function unisphere_bar_info_box_3_shortcode($atts) {
	extract(shortcode_atts(array(		
        "buttonurl" => "",
		"buttontext" => "",
		"text" => ""
	), $atts));
	
	$output  = '<div class="bar-info-box bar-info-box-3">';
	$output .= '<span>' . $text . '</span>';
	
	if ( $buttonurl != '' && $buttontext != '' )
		$output .= '<a href="' . $buttonurl . '" class="button">' . $buttontext . '</a>';
		
	$output .= '</div>';
	
	return $output;
}


/**
 * Information Box Shortcodes
 */
function unisphere_info_box_1_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "title" => ""
	), $atts));
	
	$output  = '<div class="info-box info-box-1">';
	$output .= '<h4 class="info-box-title">' . $title . '</h4>';
	$output .= '<div class="info-box-content"><p>' . do_shortcode($content) . '</p></div>';
	$output .= '</div>';
	
	return $output;
}

function unisphere_info_box_2_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "title" => ""
	), $atts));
	
	$output  = '<div class="info-box info-box-2">';
	$output .= '<h4 class="info-box-title">' . $title . '</h4>';
	$output .= '<div class="info-box-content"><p>' . do_shortcode($content) . '</p></div>';
	$output .= '</div>';
	
	return $output;
}

function unisphere_info_box_3_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "title" => ""
	), $atts));
	
	$output  = '<div class="info-box info-box-3">';
	$output .= '<h4 class="info-box-title">' . $title . '</h4>';
	$output .= '<div class="info-box-content"><p>' . do_shortcode($content) . '</p></div>';
	$output .= '</div>';
	
	return $output;
}


/**
 * Tab Shortcode
 */
function unisphere_tabs_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "titles" => ""
	), $atts));
	
	$tabs = explode( ",", $titles );
	$tab_number = 1;
	
	$output  = '<ul class="tabs">';
	foreach ($tabs as $tab) {
		$output .= '<li><a href="#tab' . $tab_number . '">' . trim( $tab ) . '</a></li>';
		$tab_number++;
	}
	$output .= '</ul>';

	$output .= '<div class="tab-container">';
	$output .= do_shortcode( $content );
	$output .= '</div>';
	$output .= '<div class="clearfix"></div>';
	
	return $output;
}

function unisphere_tab_shortcode($atts, $content = null) {
   return '<div class="tab-content">' . do_shortcode($content) . '</div>';
}


/**
 * Toggle Shortcode
 */
function unisphere_toggle_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "title" => "",
        "open" => ""
	), $atts));
	
	$output  = '<div class="toggle-container' . ($open == 'true' ? ' toggle-container-open' : '') . '">';
	$output .= '<a href="#" class="toggle"><span class="toggle-sign"></span><span class="toggle-title">' . $title . '</span></a>';
	$output .= '<div class="toggle-content">';
	$output .= do_shortcode( $content );
	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}


/**
 * Price Table Shortcode
 */
function unisphere_price_table_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "columns" => ""
	), $atts));
	
	if( $columns == '' ) {
		
		return '<strong>Please set a number of columns for the pricing table.</strong>';
		
	} else {
	
		$semantic_columns = array(2 => "two", 3 => "three", 4 => "four", 5 => "five", 6 => "six");
		
		$output  = '<div class="price-table price-table-' . $semantic_columns[$columns] . '">';
		$output .= do_shortcode( $content );
		$output .= '</div>';
		$output .= '<div class="clearfix"></div>';
		
		return $output;
	}
}

function unisphere_price_column_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
		"featured" => "",
		"title" => ""
	), $atts));
	
	if( $featured == "true") {
		$featured = 'price-column-featured';
	}
	
	$output  = '<div class="price-column ' . $featured . '">';
	$output .= '<h4>' . $title . '</h4>';
	$output .= '<ul>';
	$output .= do_shortcode($content);
	$output .= '</ul>';
	$output .= '</div>';
	
	return $output;
}

function unisphere_price_tag_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "value" => "",
		"period" => ""
	), $atts));
	
	$output  = '<div class="price-tag">';
	$output .= '<span class="price-value' . ($period == "" ? ' big' : '') . '">' . $value . '</span>';
	
	if( $period != "" ) {
		$output .= '<span class="price-period">' . $period . '</span>';
	}
	
	$output .= '</div>';
	
	return $output;
}


/**
 * Highlight Shortcodes
 */
function unisphere_highlight_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
        "dark" => "false"
	), $atts));
	
	if( $dark == 'true' )
		$dark = ' dark';
	else
		$dark = '';
	
	return '<span class="highlight' . $dark . '">' . do_shortcode($content) . '</span>';
}


/**
 * Video Shortcodes
 */
function unisphere_video_shortcode($atts) {
	extract(shortcode_atts(array(		
        "type" => "",
        "url" => "",
        "autoplay" => "false",
        "thumbnail" => "",
        "mp4" => "",
        "webm" => "",
        "ogg" => "",
        "width" => "",
        "height" => ""
	), $atts));
	
	$output = '';	
	$iframe_width = '';
	$iframe_height = '';
	
	if( $width != '' ) { $iframe_width = 'width="'. $width .'"'; $width = "width: " . $width . "px;"; }
	if( $height != '' ) { $iframe_height = 'width="'. $height .'"'; $height = "height: " . $height . "px;"; }
	
	if( $width != '' || height != '' ) { $style = 'style="' . $width . $height . '"'; } else { $style = ''; }
	
	$rand = Rand();

	switch ( $type ) {
		case 'youtube':
			$yt_video_id = preg_match('"^http://(?<domain>([^./]+\\.)*youtube\\.com)(/v/|/watch\\?v=)(?<videoId>[A-Za-z0-9_-]{11})"', $url, $matches);
			$output  = '<iframe id="objectvideo' . $rand . '" class="embedded-video embedded-video-' . $type . '" type="text/html" ' . $style . ' ' . $iframe_width . ' ' . $iframe_height . ' src="http://www.youtube.com/embed/' . $matches['videoId'] . ($autoplay == "true" ? '?autoplay=1' : '') . '" frameborder="0" scrolling="no"></iframe>';
			break;
		case 'vimeo':
			$vimeo_video_id = preg_match('"^http://vimeo\\.com/(?<videoId>[A-Za-z0-9_-]{7,8})"', $url, $matches);
			$output  = '<iframe id="objectvideo' . $rand . '" class="embedded-video embedded-video-' . $type . '" type="text/html" ' . $style . ' ' . $iframe_width . ' ' . $iframe_height . ' src="http://player.vimeo.com/video/' . $matches['videoId'] . ($autoplay == "true" ? '?autoplay=1' : '') . '" frameborder="0"></iframe>';
			break;
		case 'flv':
			$output  = '<div class="embedded-video embedded-video-' . $type . '" data-videourl="' . $url . '" data-autoplay="' . $autoplay . '" ' . $style . ' data-video-thumbnail="' . $thumbnail . '" id="videowrapper' . $rand . '"><div id="objectvideo' . $rand . '"></div></div>';
			break;
			
		case 'html5':
			$output  = '<div class="video-js-box embedded-video embedded-video-' . $type . '" ' . $style . '>';
			$output .= '<video class="video-js" width="100%" height="100%" controls preload ' . ($autoplay == "true" ? 'autoplay' : '') . ' poster="' . $thumbnail . '">';
			$output .= '<source src="' . $mp4 . '" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' />';
			$output .= '<source src="' . $webm . '" type=\'video/webm; codecs="vp8, vorbis"\' />';
			$output .= '<source src="' . $ogg . '" type=\'video/ogg; codecs="theora, vorbis"\' />';
			$output .= '<object id="vjs-flash-fallback' . $rand . '" class="vjs-flash-fallback" width="100%" height="100%" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">';
			$output .= '<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />';
			$output .= '<param name="allowfullscreen" value="true" />';
			$output .= '<param name="wmode" value="transparent" />';
			$output .= '<param name="flashvars" value=\'config={"playlist":["' . $thumbnail . '", {"url": "' . $mp4 . '","autoPlay":' . $autoplay . ',"autoBuffering":true}]}\' />';
			$output .= '<img src="' . $thumbnail . '" width="100%" height="100%" alt="" title="" />';
			$output .= '</object>';
			$output .= '</video>';
			$output .= '</div>';
			break;
			
		default:
			return NULL;		
	}
	
	return $output;
}


/**
 * Lightbox Shortcodes
 */
function unisphere_lightbox_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
		"url" => "",
		"title" => "",
		"group" => "",
		"iframe" => "",
		"width" => "",
		"height" => ""
	), $atts));
	
	if ( $url == '' )
		return NULL;
	
	if( $group != '') { $rel = 'rel="lightbox[' . $group . ']"'; } else { $rel = 'rel="lightbox"'; }		

	if( $iframe == 'true') { 
		$url .= '?iframe=true'; 
		if( $width != '' && $height != '' )
			$url .= '&width=' . $width . '&height=' . $height;
	} else if( $width != '' && $height != '' ) {
		$url .= '?width=' . $width . '&height=' . $height; 
	}
		
	$output =  '<a class="lightbox" href="' . $url . '" title="' . $title . '" ' . $rel . '>' . do_shortcode($content) . '</a>';
	
	return $output;
}


/**
 * Recent Posts Shortcode
 */
function unisphere_recent_posts_shortcode($atts) {
	extract(shortcode_atts(array(		
		"title" => "",
		"numberposts" => "3"
	), $atts));
	
	$recent = new WP_Query('posts_per_page=' . $numberposts);		

	$output  = '<h4>' . $title . '</h4>';
	$output .= '<div class="widget-posts widget-posts-off-sidebar">';
	$output .= '<ul>';

	while ($recent->have_posts()) : $recent->the_post();

		$output .= '<li class="clearfix' . ( unisphere_get_post_image( 'sidebar-post' ) == '' ? ' no-image' : '' ) .  '">';
		$output .= '<a href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '">' . unisphere_get_post_image( 'sidebar-post' ) . '</a>';
		$output .= '<a href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '" class="post-title">' . get_the_title() . '</a>' . sprintf( '<abbr class="published-time" title="%1$s">%2$s</abbr>', esc_attr( get_the_time() ), get_the_date() );
		$output .= '</li>';

	endwhile;
	
	$output .= '</ul>';
	$output .= '</div>';
	
	wp_reset_query();
				
	return $output;
}


/**
 * Popular Posts Shortcode
 */
function unisphere_popular_posts_shortcode($atts) {
	extract(shortcode_atts(array(		
		"title" => "",
		"numberposts" => "3"
	), $atts));
	
	$popular = new WP_Query('orderby=comment_count&posts_per_page=' . $numberposts);
		

	$output  = '<h4>' . $title . '</h4>';
	$output .= '<div class="widget-posts widget-posts-off-sidebar">';
	$output .= '<ul>';

	while ($popular->have_posts()) : $popular->the_post();

		$output .= '<li class="clearfix' . ( unisphere_get_post_image( 'sidebar-post' ) == '' ? ' no-image' : '' ) .  '">';
		$output .= '<a href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '">' . unisphere_get_post_image( 'sidebar-post' ) . '</a>';
		$output .= '<a href="' . get_permalink(get_the_ID()) . '" title="' . get_the_title() . '" class="post-title">' . get_the_title() . '</a>' . sprintf( '<abbr class="published-time" title="%1$s">%2$s</abbr>', esc_attr( get_the_time() ), get_the_date() );
		$output .= '</li>';

	endwhile;
	
	$output .= '</ul>';
	$output .= '</div>';
	
	wp_reset_query();
				
	return $output;
}


/**
 * Twitter Shortcode
 */
function unisphere_twitter_shortcode($atts) {
	extract(shortcode_atts(array(		
		"title" => "",
		"numbertweets" => "3",
		"username" => "",
		"interval" => "1800"
	), $atts));
	
	$feed = "http://twitter.com/statuses/user_timeline/" . $username . ".atom?include_rts=true&count=" . $numbertweets;	
	$db_cache_field = UNISPHERE_THEMEOPTIONS . '-' . $username . '-' . $numbertweets . '-twitter-cache';
	$db_cache_field_last_updated = UNISPHERE_THEMEOPTIONS . '-' . $username . '-' . $numbertweets . '-last-updated';
	$last = get_option( $db_cache_field_last_updated );
	$now = time();
	// check the cache
	if ( !$last || (( $now - $last ) > $interval) ) {
		// cache doesn't exist, or is old, so refresh it
		if( function_exists('curl_init') ) { // if cURL is available, use it...
			$ch = curl_init($feed);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$cache_rss = curl_exec($ch);
			curl_close($ch);
		} else {
			$cache_rss = file_get_contents($feed); // ...if not, use the common file_get_contents()
		}
		if (!$cache_rss) {
			// we didn't get anything back from twitter
		} else {
			// Check if we got a reponse telling our limit api requests exceded the 150 per hour
			if (strpos($cache_rss, 'Rate limit exceeded') !== false) {
				// we exceded the 150 api request limit
			} else {
				// we got good results from twitter
				update_option( $db_cache_field, $cache_rss );
				update_option( $db_cache_field_last_updated, time() );
			}			
		}
		// read from the cache file
		$rss = get_option( $db_cache_field );
	}
	else {
		// cache file is fresh enough, so read from it
		$rss = get_option( $db_cache_field );
	}
	// clean up and output the twitter feed
	$feed = str_replace("&amp;", "&", $rss);
	$feed = str_replace("&lt;", "<", $feed);
	$feed = str_replace("&gt;", ">", $feed);
	$clean = explode("<entry>", $feed);
	$clean = str_replace("&quot;", "'", $clean);
	$clean = str_replace("&apos;", "'", $clean);
	$amount = count($clean) - 1;
	if ($amount) { // are there any tweets?
		$output = '<h4>' . $title . '</h4>';
		$output .= '<div class="widget-twitter widget-twitter-off-sidebar">';
		$output .= '<ul>';
		for ($i = 1; $i <= $amount; $i++) {
			$entry_close = explode("</entry>", $clean[$i]);
			$clean_content_1 = explode("<content type=\"html\">", $entry_close[0]);
			$clean_content = explode("</content>", $clean_content_1[1]);
			$clean_content = str_replace($username . ": ", "", $clean_content);
			$clean_content = twitterize($clean_content);
			
			$clean_time_1 = explode("<published>", $entry_close[0]);
			$clean_time = explode("</published>", $clean_time_1[1]);

			$clean_link_1 = explode("<link href=\"", $entry_close[0]);
			$clean_link = explode("\" rel=\"alternate\" type=\"text/html\"/>", $clean_link_1[1]);

			$unix_time = strtotime($clean_time[0]);
			$pretty_time = relativeTime($unix_time);
			
			$output .= '<li>';
			$output .= '<p class="tweet">' . $clean_content[0] . '</p>';
			$output .= '<small><a href="' . $clean_link[0]. '">' . $pretty_time . '</a></small>';
			$output .= '</li>';
		}

	} else { // if there aren't any tweets
		$output = '<h4>' . $title . '</h4>';
		$output .= '<div class="widget-twitter widget-twitter-off-sidebar">';
		$output .= '<ul>';
		$output .= '<li>';
		$output .= '<p class="tweet">' . __( 'No tweets were found.', 'unisphere' ) . '</p>';
		$output .= '</li>';
	}

	$output .= '</ul>';
	$output .= '</div>';			
	return $output;
}


/**
 * Flickr Shortcode
 */
function unisphere_flickr_shortcode($atts) {
	extract(shortcode_atts(array(		
		"title" => "",
		"numberimages" => "3",
		"flickrid" => "",
		"lightbox" => "false",
		"interval" => "1800"
		
	), $atts));
	
	if( trim( $flickrid ) == '' ) {
		$output = '<p>Invalid Flickr ID</p>';
	} else {		
		$feed = 'http://api.flickr.com/services/feeds/photos_public.gne?id=' . $flickrid . '&format=php_serial';
		$db_cache_field = UNISPHERE_THEMEOPTIONS . '-' . $flickrid . '-' . $numberimages . '-flickr-cache';
		$db_cache_field_last_updated = UNISPHERE_THEMEOPTIONS . '-' . $flickrid . '-' . $numberimages . '-last-updated';
		$last = get_option( $db_cache_field_last_updated );
		$now = time();
		// check the cache
		if ( !$last || (( $now - $last ) > $interval) ) {
			// cache doesn't exist, or is old, so refresh it
			if( function_exists('curl_init') ) { // if cURL is available, use it...
				$ch = curl_init($feed);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				$cache_rss = curl_exec($ch);
				curl_close($ch);
			} else {
				$cache_rss = file_get_contents($feed); // ...if not, use the common file_get_contents()
			}
			if (!$cache_rss) {
				// we didn't get anything back from Flickr
			} else {
				// we got good results from Flickr
				update_option( $db_cache_field, $cache_rss );
				update_option( $db_cache_field_last_updated, time() );						
			}
			// read from the cache file
			$rss = get_option( $db_cache_field );
		}
		else {
			// cache file is fresh enough, so read from it
			$rss = get_option( $db_cache_field );
		}
		
		$rsp_obj = unserialize($rss);
		
		$lightboxGalleryID = rand();
		
		$output = '<h4>' . $title . '</h4>';
		$output .= '<div class="widget-flickr widget-flickr-off-sidebar">';
		$output .= '<ul>';
		
		for ($i = 0; $i < $numberimages; $i++) {
			$thumb_url = $rsp_obj['items'][$i]['thumb_url'];
			$photo_title = $rsp_obj['items'][$i]['title'];
			$photo_url = $rsp_obj['items'][$i]['photo_url'];
			$url = $rsp_obj['items'][$i]['url'];			
			
			if( $lightbox ) {
				$output .= '<li><a href="' . $photo_url . '" title="' . $photo_title . '" rel="lightbox[' . $lightboxGalleryID .  ']"><img src="' . $thumb_url . '" alt="' . $photo_title . '" /></a></li>';
			} else {
				$output .= '<li><a href="' . $url . '" title="' . $photo_title . '"><img src="' . $thumb_url . '" alt="' . $photo_title . '" /></a></li>';
			}
		}
		
		$output .= '</ul>';
		$output .= '</div>';
	}
				
	return $output;
}


/**
 * Google Map Shortcode
 */
function unisphere_map_shortcode($atts) {
	global $post;
	extract(shortcode_atts(array(		
		"type" => "ROADMAP",
		"width" => "210",
		"height" => "210",
		"address" => "",
		"latitude" => "",
		"longitude" => "",
		"popuptext" => "",
		"zoom" => "8",
		"showmaptypecontrol" => "true",
		"showzoomcontrol" => "true",
		"showpancontrol" => "true",
		"showscalecontrol" => "true",
		"showstreetviewcontrol" => "true"
	), $atts));

	$size = 'style="width: ' . $width . 'px; height: ' . $height . 'px;"';
	
	if( $popuptext != '' )
		$popuptext = ', html: "' . $popuptext . '", popup: false';

	$rand = Rand();

	$output  = '<div id="gmap' . $rand . '" ' . $size . '></div>';
	
	$output .= '<script>';
	$output .= 'jQuery(document).ready(function(){';
	$output .= 'jQuery("#gmap' . $rand . '").gMap( {';
	$output .= 'maptype: google.maps.MapTypeId.' . $type . ',';
	$output .= 'zoom: ' . $zoom . ',';

	if( $latitude != '' && $longitude != '' )
		$output .= 'markers: [ { latitude: ' . $latitude . ', longitude: ' . $longitude . $popuptext . ' } ],';
	
	if( $latitude == '' && $longitude == '' && $address != '' )
		$output .= 'markers: [ { address: "' . $address . '"' . $popuptext . ' } ],';
		
	$output .= 'mapTypeControl: ' . $showmaptypecontrol . ',';
	$output .= 'zoomControl: ' . $showzoomcontrol . ',';
	$output .= 'panControl: ' . $showpancontrol . ',';
	$output .= 'scaleControl: ' . $showscalecontrol . ',';
	$output .= 'streetViewControl: ' . $showstreetviewcontrol;		
	$output .= '});';

	$output .= '});';
	$output .= '</script>';
	
	return $output;
}


/**
 * Add Shortcode Button to the Rich Editor
 */
function unisphere_shortcode_button() {
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		return;

	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "unisphere_add_shortcode_tinymce_plugin");
		add_filter('mce_buttons', 'unisphere_register_shortcode_button');
	}
}
 
/**
 * Register the TinyMCE Shortcode Button
 */
function unisphere_register_shortcode_button($buttons) {
	array_push($buttons, "|", "unisphereshortcode");
	return $buttons;
}

/**
 * Load the TinyMCE plugin: shortcode_plugin.js
 */
function unisphere_add_shortcode_tinymce_plugin($plugin_array) {
   $plugin_array['unisphereshortcode'] = get_bloginfo('template_url') . '/js/shortcode_plugin.js';
   return $plugin_array;
}
 
function unisphere_refresh_mce($ver) {
  $ver += 3;
  return $ver;
}

/**
 * Init process for button control
 */
add_filter( 'tiny_mce_version', 'unisphere_refresh_mce');
add_action( 'init', 'unisphere_shortcode_button' );

?>
