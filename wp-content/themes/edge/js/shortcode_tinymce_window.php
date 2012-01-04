<!-- Adapted from http://wiki.moxiecode.com/index.php/TinyMCE:Custom_filebrowser -->

<?php // Include WordPress core files for WP function access
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' ); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title></title>
	<style>
		fieldset { padding: 15px!important; }
		#insert { float: left; }
		#insert.disabled { color: #ccc; }
		#cancel { float: right; }
		select { padding: 5px!important; width: 100%!important; margin-bottom: 15px!important; font-family: "Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif!important; font-size: 11px!important; }
		select option { padding: 2px; }
		#insert.disabled
    </style>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo get_bloginfo('wpurl'); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
    <script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#insert').attr("disabled", true);
			jQuery('#insert').addClass("disabled");
			jQuery('#select_shortcode').change(function() {
				if( jQuery(this).val() == '' ) {
					jQuery('#insert').attr("disabled", true);
					jQuery('#insert').addClass("disabled");
				} else {
					jQuery('#insert').removeAttr("disabled");
					jQuery('#insert').removeClass("disabled");
				}
			});
		});
		
		function returnShortcodeValue() {
			var ret;
			
			switch(jQuery('#select_shortcode').val())
			{
				case "2_columns": 
					ret = "[one_half]<p>Your content here...</p>[/one_half]<br />[one_half_last]<p>Your content here...</p>[/one_half_last]<br />";
					break;
				case "3_columns": 
					ret = "[one_third]<p>Your content here...</p>[/one_third]<br />[one_third]<p>Your content here...</p>[/one_third]<br />[one_third_last]<p>Your content here...</p>[/one_third_last]<br />";
					break;
				case "4_columns": 
					ret = "[one_fourth]<p>Your content here...</p>[/one_fourth]<br />[one_fourth]<p>Your content here...</p>[/one_fourth]<br />[one_fourth]<p>Your content here...</p>[/one_fourth]<br />[one_fourth_last]<p>Your content here...</p>[/one_fourth_last]<br />";
					break;
				case "5_columns": 
					ret = "[one_fifth]<p>Your content here...</p>[/one_fifth]<br />[one_fifth]<p>Your content here...</p>[/one_fifth]<br />[one_fifth]<p>Your content here...</p>[/one_fifth]<br />[one_fifth]<p>Your content here...</p>[/one_fifth]<br />[one_fifth_last]<p>Your content here...</p>[/one_fifth_last]<br />";
					break;
				case "6_columns": 
					ret = "[one_sixth]<p>Your content here...</p>[/one_sixth]<br />[one_sixth]<p>Your content here...</p>[/one_sixth]<br />[one_sixth]<p>Your content here...</p>[/one_sixth]<br />[one_sixth]<p>Your content here...</p>[/one_sixth]<br />[one_sixth]<p>Your content here...</p>[/one_sixth]<br />[one_sixth_last]<p>Your content here...</p>[/one_sixth_last]<br />";
					break;					
				case "13_23_column": 
					ret = "[one_third]<p>Your content here...</p>[/one_third]<br />[two_third_last]<p>Your content here...</p>[/two_third_last]<br />";
					break;
				case "23_13_column": 
					ret = "[two_third]<p>Your content here...</p>[/two_third]<br />[one_third_last]<p>Your content here...</p>[/one_third_last]<br />";
					break;					
				case "14_14_12_column": 
					ret = "[one_fourth]<p>Your content here...</p>[/one_fourth]<br />[one_fourth]<p>Your content here...</p>[/one_fourth]<br />[one_half_last]<p>Your content here...</p>[/one_half_last]<br />";
					break;
				case "12_14_14_column": 
					ret = "[one_half]<p>Your content here...</p>[/one_half]<br />[one_fourth]<p>Your content here...</p>[/one_fourth]<br />[one_fourth_last]<p>Your content here...</p>[/one_fourth_last]<br />";
					break;					
				case "14_34_column": 
					ret = "[one_fourth]<p>Your content here...</p>[/one_fourth]<br />[three_fourth_last]<p>Your content here...</p>[/three_fourth_last]<br />";
					break;					
				case "34_14_column": 
					ret = "[three_fourth]<p>Your content here...</p>[/three_fourth]<br />[one_fourth_last]<p>Content here...</p>[/one_fourth_last]<br />";
					break;					
				case "25_15_25": 
					ret = "[two_fifth]<p>Content here...</p>[/two_fifth]<br />[one_fifth]<p>Your content here...</p>[/one_fifth]<br />[two_fifth_last]<p>Content here...</p>[/two_fifth_last]<br />";
					break;					
				case "35_15_15": 
					ret = "[three_fifth]<p>Your content here...</p>[/three_fifth]<br />[one_fifth]<p>Your content here...</p>[/one_fifth]<br />[one_fifth_last]<p>Your content here...</p>[/one_fifth_last]<br />";
					break;
				case "25_35": 
					ret = "[two_fifth]<p>Content here...</p>[/two_fifth]<br />[three_fifth_last]<p>Your content here...</p>[/three_fifth_last]<br />";
					break;
				case "15_45": 
					ret = "[one_fifth]<p>Content here...</p>[/one_fifth]<br />[four_fifth_last]<p>Your content here...</p>[/four_fifth_last]<br />";
					break;
				case "45_15": 
					ret = "[four_fifth]<p>Your content here...</p>[/four_fifth]<br />[one_fifth_last]<p>Content here...</p>[/one_fifth_last]<br />";
					break;
				case "16_56": 
					ret = "[one_sixth]<p>Content here...</p>[/one_sixth]<br />[five_sixth_last]<p>Content here...</p>[/five_sixth_last]<br />";
					break;
				case "56_16": 
					ret = "[five_sixth]<p>Content here...</p>[/five_sixth]<br />[one_sixth_last]<p>Content here...</p>[/one_sixth_last]<br />";
					break;
				case "slider_custom_small":
					ret = "[slider_custom size=\"small\" effect=\"random\" slices=\"8\" /]<br />[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x125.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Image 1\"/]<br />[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x125.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Image 2\"/]<br />[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x125.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Image 3\"/]<br />[/slider_custom]<br />";
					break;
				case "slider_custom_medium":
					ret = "[slider_custom size=\"medium\" effect=\"random\" slices=\"15\" /]<br />[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/710x260.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Image 1\"/]<br />[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/710x260.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Image 2\"/]<br />[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/710x260.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Image 3\"/]<br />[/slider_custom]<br />";
					break;
				case "slider_custom_big":
					ret = "[slider_custom size=\"big\" effect=\"random\" slices=\"15\" /]<br />[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Image 1\"/]<br />[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Image 2\"/]<br />[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Image 3\"/]<br />[/slider_custom]<br />";
					break;
				case "slider_small":
					ret = "[slider size=\"small\" effect=\"random\" slices=\"8\" numberimages=\"4\" lightbox=\"true\" /]<br />";
					break;
				case "slider_medium":
					ret = "[slider size=\"medium\" effect=\"random\" slices=\"15\" numberimages=\"12\" lightbox=\"true\" /]<br />";
					break;
				case "slider_big":
					ret = "[slider size=\"big\" effect=\"random\" slices=\"15\" numberimages=\"20\" lightbox=\"true\" /]<br />";
					break;
				case "button":
					ret = "[button text=\"Button\" url=\"http://www.google.com\" /]<br />";
					break;
				case "button_big":
					ret = "[button text=\"Button\" size=\"big\" url=\"http://www.google.com\" /]<br />";
					break;
				case "button_unselected":
					ret = "[button text=\"Button\" style=\"unselected\" url=\"http://www.google.com\" /]<br />";
					break;
				case "button_unselected_big":
					ret = "[button text=\"Button\" size=\"big\" style=\"unselected\" url=\"http://www.google.com\" /]<br />";
					break;
				case "button_custom_colors":
					ret = "[button text=\"Button\" url=\"http://www.google.com\" txtColor=\"#fff\" bgColor=\"#0697d6\" txtColorHover=\"#b0d5e5\" bgColorHover=\"#026894\" /]<br />";
					break;
				case "button_newwindow":
					ret = "[button text=\"Button\" url=\"http://www.google.com\" newWindow=\"true\" /]<br />";
					break;					
				case "bar_info_box_1":
					ret = "[bar_info_box_1 buttontext=\"Learn More!\" buttonurl=\"http://www.google.com\" text=\"<strong>Ready to start building your site?</strong> Click to learn more.\" /]<br />";
					break;
				case "bar_info_box_2":
					ret = "[bar_info_box_2 buttontext=\"Learn More!\" buttonurl=\"http://www.google.com\" text=\"<strong>Ready to start building your site?</strong> Click to learn more.\" /]<br />";
					break;
				case "bar_info_box_3":
					ret = "[bar_info_box_3 buttontext=\"Learn More!\" buttonurl=\"http://www.google.com\" text=\"<strong>Ready to start building your site?</strong> Click to learn more.\" /]<br />";
					break;
				case "info_box_1":
					ret = "[info_box_1 title=\"Title...\"]<br />Content...<br />[/info_box_1]<br />";
					break;
				case "info_box_2":
					ret = "[info_box_2 title=\"Title...\"]<br />Content...<br />[/info_box_2]<br />";
					break;
				case "info_box_3":
					ret = "[info_box_3 title=\"Title...\"]<br />Content...<br />[/info_box_3]<br />";
					break;
				case "testimonial":
					ret = "[testimonial img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/50x50.jpg\" company=\"Google\" url=\"http://www.google.com/\" person=\"John Doe\"]<br />Sagittis fringilla, massa et nunc. Fusce sollicitudin eros non mauris convallis gravida. Aenean fringilla magna eu nulla euismod id tincidunt tortor. Sagittis fringilla, massa et nunc. Fusce sollicitudin eros non mauris convallis gravida. Aenean fringilla magna eu nulla euismod id tincidunt tortor mauris convallis gravida. Aenean fringilla magna eu nulla euismod id tincidunt tortor.<br />[/testimonial]<br />";
					break;
				case "tabs":
					ret = "[tabs titles=\"Tab 1, Tab 2, Tab 3\"]<br />[tab]Tab 1 content...[/tab]<br />[tab]Tab 2 content...[/tab]<br />[tab]Tab 3 content...[/tab]<br />[/tabs]<br />";
					break;
				case "toggle":
					ret = "[toggle title=\"Toggle title...\"]Toggle content...[/toggle]<br />";
					break;
				case "hr":
					ret = "[hr/]<br />";
					break;
				case "hr2":
					ret = "[hr2/]<br />";
					break;
				case "dropcap":
					ret = "[dropcap]A[/dropcap]<br />";
					break;
				case "list":
					ret = "[list]<br /><li>list item...</li><br /><li>list item...</li><br /><li>list item...</li><br /><li>list item...</li><br />[/list]<br />";
					break;
				case "blockquote_left":
					ret = "[blockquote align=\"left\"]Lorem ipsum dolor sit amet....[/blockquote]<br />";
					break;
				case "blockquote_right":
					ret = "[blockquote align=\"right\"]Lorem ipsum dolor sit amet....[/blockquote]<br />";
					break;
				case "blockquote_full":
					ret = "[blockquote]Lorem ipsum dolor sit amet....[/blockquote]<br />";
					break;
				case "image":
					ret = "[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x125.jpg\" alt=\"title\"/]<br />";
					break;
				case "image_lightbox":
					ret = "[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x125.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"title\"/]<br />";
					break;
				case "image_video":
					ret = "[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x125.jpg\" url=\"http://vimeo.com/8245346\" alt=\"title\"/]<br />";
					break;
				case "image_custom_url":
					ret = "[image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x125.jpg\" url=\"http://www.google.com\" lightbox=\"false\" alt=\"title\"/]<br />";
					break;
				case "image_align_left":
					ret = "[image align=\"left\" img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x125.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Left aligned image\" /]<br />";
					break;
				case "image_align_center":
					ret = "[image align=\"center\" img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x125.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Center aligned image\" /]<br />";
					break;
				case "image_align_right":
					ret = "[image align=\"right\" img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x125.jpg\" url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" alt=\"Right aligned image\" /]<br />";
					break;
				case "price_table_3":
					ret = "[price_table columns=\"3\"]<br />[price_column title=\"First\"]<br /><li>[price_tag value=\"Free!\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column featured=\"true\" title=\"Second\"]<br /><li>[price_tag value=\"$10\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Third\"]<br /><li>[price_tag value=\"$20\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[/price_table]<br />";
					break;
				case "price_table_4":
					ret = "[price_table columns=\"4\"]<br />[price_column title=\"First\"]<br /><li>[price_tag value=\"Free!\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column featured=\"true\" title=\"Second\"]<br /><li>[price_tag value=\"$10\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Third\"]<br /><li>[price_tag value=\"$20\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Fourth\"]<br /><li>[price_tag value=\"$30\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[/price_table]<br />";
					break;
				case "price_table_5":
					ret = "[price_table columns=\"5\"]<br />[price_column title=\"First\"]<br /><li>[price_tag value=\"Free!\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column featured=\"true\" title=\"Second\"]<br /><li>[price_tag value=\"$10\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Third\"]<br /><li>[price_tag value=\"$20\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Fourth\"]<br /><li>[price_tag value=\"$30\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Fifth\"]<br /><li>[price_tag value=\"$40\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[/price_table]<br />";
					break;
				case "price_table_6":
					ret = "[price_table columns=\"6\"]<br />[price_column title=\"First\"]<br /><li>[price_tag value=\"Free!\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column featured=\"true\" title=\"Second\"]<br /><li>[price_tag value=\"$10\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Third\"]<br /><li>[price_tag value=\"$20\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Fourth\"]<br /><li>[price_tag value=\"$30\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Fifth\"]<br /><li>[price_tag value=\"$40\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[price_column title=\"Sixth\"]<br /><li>[price_tag value=\"$50\" period=\"per month\" /]</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li><strong>dolor</strong> sit</li><br /><li>[button text=\"Sign Up\" url=\"http://www.google.com/\"]</li><br />[/price_column]<br />[/price_table]<br />";
					break;
				case "highlight_light":
					ret = "[highlight]Lorem ipsum dolor sit amet...[/highlight]<br />";
					break;
				case "highlight_dark":
					ret = "[highlight dark=\"true\"]Lorem ipsum dolor sit amet...[/highlight]<br />";
					break;
				case "video_youtube":
					ret = "[video type=\"youtube\" url=\"http://www.youtube.com/watch?v=B0ky-VMi9fI\" /]<br />";
					break;
				case "video_vimeo":
					ret = "[video type=\"vimeo\" url=\"http://vimeo.com/8245346\" /]<br />";
					break;
				case "video_html5":
					ret = "[video type=\"html5\" thumbnail=\"http://video-js.zencoder.com/oceans-clip.png\" mp4=\"http://video- js.zencoder.com/oceans-clip.mp4\" webm=\"http://video-js.zencoder.com/oceans-clip.webm\" ogg=\"http://video-js.zencoder.com/oceans-clip.ogv\" /]<br />";
					break;
				case "video_flv":
					ret = "[video type=\"flv\" url=\"http://download.gametrailers.com/gt_vault/12821/t_portal2_pax10_coop_hd.flv\" /]<br />";
					break;
				case "lightbox_single_image":
					ret = "[lightbox url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" title=\"Image title\"]single image[/lightbox]<br />";
					break;
				case "lightbox_grouped_images":
					ret = "[lightbox url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" group=\"1\" title=\"Image 1\"]Grouped Image 1[/lightbox]<br />[lightbox url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" group=\"1\" title=\"Image 2\"]Grouped Image 2[/lightbox]<br />[lightbox url=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/960x350.jpg\" group=\"1\" title=\"Image 3\"]Grouped Image 3[/lightbox]<br />";
					break;
				case "lightbox_iframe_from_image":
					ret = "[lightbox url=\"http://www.google.com\" width=\"100%\" height=\"100%\" iframe=\"true\"][image img=\"http://edge.unispheredesign.com/wp-content/uploads/placeholders/210x125.jpg\" /][/lightbox]<br />";
					break;
				case "lightbox_video_from_button":
					ret = "[lightbox url=\"http://download.gametrailers.com/gt_vault/12821/t_portal2_pax10_coop_hd.flv\" width=\"1280\" height=\"720\"][button text=\"Open Video\" /][/lightbox]<br />";
					break;
				case "lightbox_inline":
					ret = "[lightbox url=\"#inline-content\"]Inline Content[/lightbox]<br /><div id=\"inline-content\" style=\"display: none;\"><br /><p><strong>What is Lorem Ipsum?</strong></p><br /><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><br /></div><br />";
					break;
				case "recent_posts":
					ret = "[recent_posts title=\"Recent Posts\" numberPosts=\"3\" /]<br />";
					break;
				case "popular_posts":
					ret = "[popular_posts title=\"Popular Posts\" numberPosts=\"3\" /]<br />";
					break;
				case "twitter":
					ret = "[twitter title=\"Latest Tweets\" numberTweets=\"3\" username=\"SET_USERNAME_HERE\" /]<br />";
					break;
				case "flickr":
					ret = "[flickr title=\"From Flickr\" numberImages=\"9\" flickrID=\"SET_FLICKRID_HERE\" lightbox=\"false\" /]<br />";
					break;
				case "map_terrain":
					ret = "[map width=\"710\" height=\"400\" zoom=\"3\" type=\"TERRAIN\" latitude=\"39.045923\" longitude=\"-8.085937\" /]<br />";
					break;
				case "map_roadmap":
					ret = "[map width=\"710\" height=\"400\" zoom=\"16\" type=\"ROADMAP\" popuptext=\"This is a popup\" address=\"Avenida da Boavista, Porto, Portugal\" /]<br />";
					break;
				case "map_hybrid":
					ret = "[map width=\"710\" height=\"400\" zoom=\"14\" type=\"HYBRID\" address=\"Avenida da Boavista, Porto, Portugal\" showMapTypeControl=\"false\" showZoomControl=\"false\" showPanControl=\"false\" showScaleControl=\"false\" showStreetViewControl=\"false\" /]<br />";
					break;
				case "map_satellite":
					ret = "[map width=\"960\" height=\"500\" zoom=\"17\" type=\"SATELLITE\" address=\"Avenida da Boavista, Porto, Portugal\" /]<br />";
					break;
				default:
					ret = '';
			}
			
			window.tinyMCE.execInstanceCommand(window.tinyMCE.activeEditor.editorId, 'mceInsertContent', false, ret);
			window.tinyMCE.activeEditor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
    </script>
</head>
<body>
	<fieldset>
    <legend>Select a Shortcode</legend>
	<div>
        <select size="8" id="select_shortcode">
        	<option value="">Bar Information Boxes</option>
			<option value="bar_info_box_1">&nbsp;&nbsp;&nbsp;Style 1</option>
            <option value="bar_info_box_2">&nbsp;&nbsp;&nbsp;Style 2</option>
            <option value="bar_info_box_3">&nbsp;&nbsp;&nbsp;Style 3</option>
        	<option value="">Blockquotes</option>
            <option value="blockquote_left">&nbsp;&nbsp;&nbsp;Floated Left</option>
            <option value="blockquote_right">&nbsp;&nbsp;&nbsp;Floated Right</option>
            <option value="blockquote_full">&nbsp;&nbsp;&nbsp;Full-width</option>
        	<option value="">Buttons</option>
			<option value="button">&nbsp;&nbsp;&nbsp;Normal</option>
            <option value="button_big">&nbsp;&nbsp;&nbsp;Big</option>
            <option value="button_unselected">&nbsp;&nbsp;&nbsp;Normal (alternate style)</option>
            <option value="button_unselected_big">&nbsp;&nbsp;&nbsp;Big (alternate style)</option>
            <option value="button_custom_colors">&nbsp;&nbsp;&nbsp;Custom Colors</option>
            <option value="button_newwindow">&nbsp;&nbsp;&nbsp;Link in new window</option>
            <option value="">Columns</option>
            <option value="2_columns">&nbsp;&nbsp;&nbsp;2 Columns</option>
            <option value="3_columns">&nbsp;&nbsp;&nbsp;3 Columns</option>
            <option value="4_columns">&nbsp;&nbsp;&nbsp;4 Columns</option>
            <option value="5_columns">&nbsp;&nbsp;&nbsp;5 Columns</option>
            <option value="6_columns">&nbsp;&nbsp;&nbsp;6 Columns</option>
            <option value="13_23_column">&nbsp;&nbsp;&nbsp;1/3 + 2/3 Columns</option>
            <option value="23_13_column">&nbsp;&nbsp;&nbsp;2/3 + 1/3 Columns</option>
            <option value="14_14_12_column">&nbsp;&nbsp;&nbsp;1/4 + 1/4 + 1/2 Columns</option>
            <option value="12_14_14_column">&nbsp;&nbsp;&nbsp;1/2 + 1/4 + 1/4 Columns</option>
            <option value="14_34_column">&nbsp;&nbsp;&nbsp;1/4 + 3/4 Columns</option>
            <option value="34_14_column">&nbsp;&nbsp;&nbsp;3/4 + 1/4 Columns</option>
            <option value="25_15_25">&nbsp;&nbsp;&nbsp;2/5 + 1/5 + 2/5 Columns</option>
            <option value="35_15_15">&nbsp;&nbsp;&nbsp;3/5 + 1/5 + 1/5 Columns</option>
            <option value="25_35">&nbsp;&nbsp;&nbsp;2/5 + 3/5 Columns</option>
            <option value="15_45">&nbsp;&nbsp;&nbsp;1/5 + 4/5 Columns</option>
            <option value="45_15">&nbsp;&nbsp;&nbsp;4/5 + 1/5 Columns</option>
            <option value="16_56">&nbsp;&nbsp;&nbsp;1/6 + 5/6 Columns</option>
            <option value="56_16">&nbsp;&nbsp;&nbsp;5/6 + 1/6 Columns</option>
            <option value="dropcap">Dropcap</option>
			<option value="flickr">Flickr</option>
            <option value="">Highlight</option>
            <option value="highlight_light">&nbsp;&nbsp;&nbsp;Light</option>
            <option value="highlight_dark">&nbsp;&nbsp;&nbsp;Dark</option>
            <option value="hr">Horizontal Separator</option>
            <option value="hr2">Horizontal Separator (more spacing)</option>
        	<option value="">Images</option>
            <option value="image">&nbsp;&nbsp;&nbsp;Single Image</option>
            <option value="image_lightbox">&nbsp;&nbsp;&nbsp;Full Image in Lightbox</option>
            <option value="image_video">&nbsp;&nbsp;&nbsp;Video in Lightbox</option>
            <option value="image_custom_url">&nbsp;&nbsp;&nbsp;Custom destination URL</option>
            <option value="image_align_left">&nbsp;&nbsp;&nbsp;Aligned Left</option>
            <option value="image_align_center">&nbsp;&nbsp;&nbsp;Aligned Center</option>
            <option value="image_align_right">&nbsp;&nbsp;&nbsp;Aligned Right</option>
            <option value="">Information Boxes</option>
			<option value="info_box_1">&nbsp;&nbsp;&nbsp;Style 1</option>
            <option value="info_box_2">&nbsp;&nbsp;&nbsp;Style 2</option>
            <option value="info_box_3">&nbsp;&nbsp;&nbsp;Style 3</option>
			<option value="">Lightbox</option>
            <option value="lightbox_single_image">&nbsp;&nbsp;&nbsp;Single Lightbox Image from Text Link</option>
            <option value="lightbox_grouped_images">&nbsp;&nbsp;&nbsp;Grouped Lightbox Images from Text Links</option>
            <option value="lightbox_iframe_from_image">&nbsp;&nbsp;&nbsp;Google.com in Lightbox from Image Link</option>
            <option value="lightbox_video_from_button">&nbsp;&nbsp;&nbsp;Lightbox Video from Button</option>
            <option value="lightbox_inline">&nbsp;&nbsp;&nbsp;Inline Content from Text Link</option>
			<option value="list">List</option>
			<option value="">Maps</option>
            <option value="map_terrain">&nbsp;&nbsp;&nbsp;Terrain map from Lat/Long</option>
            <option value="map_roadmap">&nbsp;&nbsp;&nbsp;Roadmap map from Address with popup</option>
            <option value="map_hybrid">&nbsp;&nbsp;&nbsp;Hybrid map without controls</option>
            <option value="map_satellite">&nbsp;&nbsp;&nbsp;Satellite map in full-width page</option>
            <option value="popular_posts">Popular Posts</option>
			<option value="">Price Tables</option>
            <option value="price_table_3">&nbsp;&nbsp;&nbsp;3 Columns</option>
            <option value="price_table_4">&nbsp;&nbsp;&nbsp;4 Columns</option>
            <option value="price_table_5">&nbsp;&nbsp;&nbsp;5 Columns</option>
            <option value="price_table_6">&nbsp;&nbsp;&nbsp;6 Columns</option>
            <option value="recent_posts">Recent Posts</option>
        	<option value="">Sliders</option>
            <option value="slider_custom_small">&nbsp;&nbsp;&nbsp;Small from custom images url</option>
            <option value="slider_custom_medium">&nbsp;&nbsp;&nbsp;Medium from custom images url</option>
            <option value="slider_custom_big">&nbsp;&nbsp;&nbsp;Big from custom images url</option>
            <option value="slider_small">&nbsp;&nbsp;&nbsp;Small from attached images</option>
            <option value="slider_medium">&nbsp;&nbsp;&nbsp;Medium from attached images</option>
            <option value="slider_big">&nbsp;&nbsp;&nbsp;Big from attached images</option>
            <option value="tabs">Tabs</option>
            <option value="testimonial">Testimonials</option>
			<option value="toggle">Toggle</option>
			<option value="twitter">Twitter</option>
            <option value="">Videos</option>
			<option value="video_youtube">&nbsp;&nbsp;&nbsp;Youtube</option>
			<option value="video_vimeo">&nbsp;&nbsp;&nbsp;Vimeo</option>
			<option value="video_html5">&nbsp;&nbsp;&nbsp;HTML5</option>
			<option value="video_flv">&nbsp;&nbsp;&nbsp;FLV</option>
        </select>
	</div>
    <div>
        <input type="submit" value="Add" onclick="returnShortcodeValue()" id="insert" /> <input type="button" value="Close" onclick="tinyMCEPopup.close()" id="cancel" />
	</div>
    </fieldset>
</body>
</html>