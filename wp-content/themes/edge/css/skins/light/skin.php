<?php 

// Include WordPress core files for WP function access
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

// Include the theme options
require_once('../../../library/options.php');

// Content type
header("Content-type: text/css"); 

// Theme Options
global $unisphere_options;

// Main theme color set in the theme admin panel
$main_color = $unisphere_options['main_color'];

// Theme links color set in the theme admin panel
$link_color = $unisphere_options['link_color'];

?>

/* The page Body */
body { color: #777; background-color: #fff; }

/* Headings */
h1, h2, h3, h4, h5 { color: #555; }
h6 { color: #777; }

/* Links */
a { color: <?php echo $link_color; ?>; }

/* Text Selection */
::-moz-selection { color: #fff; color: rgba(255,255,255,.85); background: <?php echo $main_color; ?>; }
::selection { color: #fff; color: rgba(255,255,255,.85); background: <?php echo $main_color; ?>; }

/* Menu */
.menu a { color: #888; }
.menu ul li a:hover,
.menu ul li.current_page_item a,
.menu ul li.current_page_parent a,
.menu ul li.current_page_ancestor a,
.menu ul li.current-menu-item a,
.menu ul li.current-menu-ancestor a { color: <?php echo $link_color; ?>; }

.nav > li > a { border-top: 5px solid transparent; }
.nav > li:hover > a,
.nav > li.current_page_item > a,
.nav > li.current_page_parent > a,
.nav > li.current_page_ancestor > a,
.nav > li.current-menu-item > a,
.nav > li.current-menu-ancestor > a { border-top: 5px solid <?php echo $main_color; ?>; }

.nav ul { background-color: #fff; border: 1px solid #eee; }
.nav ul li { border-top: 1px solid #eee; }
.nav ul li:first-child { border-top: 0; }
.nav ul li a { color: #777!important; }

.nav ul a:hover { color: <?php echo $link_color; ?>!important; }
.nav li.current_page_item ul a,
.nav li.current_page_ancestor ul a,
.nav li.current_page_parent ul a,
.nav li.current-menu-item ul a,
.nav li.current-menu-ancestor ul a { color: #777 !important; }
.nav li.current_page_item ul a:hover,
.nav li.current_page_ancestor ul a:hover,
.nav li.current_page_parent ul a:hover,
.nav li.current-menu-item ul a:hover,
.nav li.current-menu-ancestor ul a:hover { color: <?php echo $link_color; ?> !important; }

/* Home page slider */
#nivo-slider-container { background: transparent url("separator_light.gif") repeat scroll left top; }
#nivo-slider, .slider { background: #fff url('ajax-loader.gif') no-repeat 50% 50%; }
.nivo-caption { color: #fff; }
.nivo-controlNav a { background: transparent url('slider_nav.png') no-repeat scroll left top; }
.nivo-controlNav a:hover,
.nivo-controlNav a.active { background: transparent url('slider_nav_selected.png') no-repeat scroll left top; }
#nivo-slider-container .slider-footer { background-color: <?php echo $main_color; ?>; }

/* Stage Slider (Home Page) */
#stage-slider-container { background: transparent url("separator_light.gif") repeat scroll left top; }
#stage-slider { background: #fff url('ajax-loader.gif') no-repeat 50% 50%; }
#stage-slider li { background-color: #fff; }
#stage-slider .description-wrapper { background-color: #eee; }
#stage-slider-container #slider-nav a { background: transparent url('slider_nav.png') no-repeat scroll left top; }
#stage-slider-container #slider-nav a:hover,
#stage-slider-container #slider-nav a.activeSlide { background: transparent url('slider_nav_selected.png') no-repeat scroll left top; }
#stage-slider-container .slider-footer { background-color: <?php echo $main_color; ?>; }

/* The Home Page Styles */
#home-portfolio-title h2 { background-color: #fff; }
#home-blog-title h2 { background-color: #fff; }

/* Sub-header */
#sub-header-container { background: transparent url("separator_light.gif") repeat scroll left top; }
#sub-header { background-color: <?php echo $main_color; ?>; }
#sub-header h1 { color: #fff; }

/* Blog */
.post-title, .post-title a { color: #555; }
.post-title a:hover { color: <?php echo $link_color; ?>; }
.post-meta { color: #999; }
.post-meta .published-time { color: #777; }
.wp-caption-text { color: #777; }

/* Blog Post Formats */
.post-format-permalink { background: transparent url("permalink.png") no-repeat scroll left top; }
.format-gallery .post-format-icon { background: transparent url("format-gallery.png") no-repeat scroll left top; }
.format-quote .post-format-icon { background: transparent url("format-quote.png") no-repeat scroll left top; }
.format-image .post-format-icon { background: transparent url("format-image.png") no-repeat scroll left top; }
.format-chat .post-format-icon { background: transparent url("format-chat.png") no-repeat scroll left top; }
.format-link .post-format-icon { background: transparent url("format-link.png") no-repeat scroll left top; }
.format-status .post-format-icon { background: transparent url("format-status.png") no-repeat scroll left top; }
.format-video .post-format-icon { background: transparent url("format-video.png") no-repeat scroll left top; }

/* Comments */
.comment-list > li.comment { border-top: 1px solid #ddd; }
.comment-list .children > li { border-top: 1px solid #ddd; }
.commenter { color: #555; }
.comment-meta { color: #999; }
.bypostauthor > .single-comment .avatar { -moz-box-shadow: 0 0 5px 2px <?php echo $main_color; ?>; -webkit-box-shadow: 0 0 5px 2px <?php echo $main_color; ?>; box-shadow: 0 0 5px 2px <?php echo $main_color; ?>; }
.ie7 .bypostauthor > .single-comment .avatar,
.ie8 .bypostauthor > .single-comment .avatar { border: 2px solid <?php echo $main_color; ?>; }

/* Comment Reply */
#respond { border-top: 1px solid #ddd; }
#comments > #respond:first-child { border-top: 0; }

/* Contact Page */
.input-error { background-color: #faeded; }
.sending-message { color: #555; background: transparent url('ajax-loader.gif') no-repeat left top; }
.success-sending-message,
.error-sending-message { color: #555; }

/* Portfolio */
.portfolio-browse { color: #555; background-color: #fff; }
.portfolio-filters { background-color: #fff; }
.portfolio-filters li a { color: #888; }
.portfolio-filters li a.active,
.portfolio-filters li a:hover { color: <?php echo $link_color; ?>; }
.portfolio-1-column-list img,
.portfolio-4-columns-list img { background: url('ajax-loader.gif') no-repeat 50% 50%; }
.portfolio-title { color: #555; }
.portfolio-4-columns-list .portfolio-title { background-color: <?php echo $main_color; ?>; }
.portfolio-4-columns-list .portfolio-title a { color: #fff; }
.portfolio-4-columns-list .portfolio-title a:hover { color: #333; }
.portfolio-detail-big-image .caption { color: #777; }

/* Custom Menu Widget */
.widget h3 { color: <?php echo $link_color; ?>; }
.widget .menu a { color: <?php echo $link_color; ?>; }

/* Recent and Popular Posts Widget */
.widget-posts li { border-top: 1px solid #ddd; }
.widget-posts li a.post-title:hover { color: <?php echo $link_color; ?>; }
.widget-posts li .published-time { color: #999; }

/* Twitter Widget */
.widget-twitter li { border-top: 1px solid #ddd; }
.widget-twitter small { background: transparent url('twitter_bird.png') no-repeat left 4px; }
.widget-twitter small a { color: #999; }
.widget-twitter small a:hover { color: <?php echo $link_color; ?>; }

/* Footer Widgets Separator */
#footer-widgets-separator-container { background: transparent url("separator_light.gif") repeat scroll left top; }
#footer-widgets-separator { background-color: <?php echo $main_color; ?>; }

/* Footer */
#footer-container { background: transparent url("separator_light.gif") repeat scroll left top; }
#footer { background-color: <?php echo $main_color; ?>; }
#footer #copyright { color: #fff; }
#footer #copyright a { color: #fff; }

/* Buttons */
.button, button, #submit { background-color: <?php echo $link_color; ?>; color: #fff; }
.button:hover, button:hover, #submit:hover { background-color: #555; color: #fff; }

/* Information Box */
.bar-info-box-1 { background-color: #555; color: #ccc; }
.bar-info-box-1 strong { color: #fff; }
.bar-info-box-1 .button:hover { background-color: #eee; color: #555; }

.bar-info-box-2 { background-color: #eee; color: #777; }
.bar-info-box-2 strong { color: #555; }

.bar-info-box-3 { background-color: <?php echo $main_color; ?>; color: #ddd; }
.bar-info-box-3 strong { color: #fff; }
.bar-info-box-3 .button { background-color: #555; color: #fff; }
.bar-info-box-3 .button:hover { background-color: #eee; color: #555; }

/* Information Box */
.info-box-1 .info-box-title { background-color: <?php echo $main_color; ?>; color: #fff; }
.info-box-1 .info-box-content { background-color: #eee; }

.info-box-2 .info-box-title { background-color: <?php echo $main_color; ?>; color: #fff; }
.info-box-2 .info-box-content { background-color: #555; color: #fff; }

.info-box-3 .info-box-title { background-color: #555; color: #fff; }
.info-box-3 .info-box-content { background-color: <?php echo $main_color; ?>; color: #fff; }
.info-box-3 .info-box-content a { color: #555; }

/* Toggle */
.toggle-container { background-color: <?php echo $main_color; ?>; }
.toggle-container .toggle .toggle-sign { background-color: #f0f0f0; color: <?php echo $main_color; ?>; }
.toggle-container .toggle .toggle-title { color: #fff; }
.toggle-container .toggle-content { background-color: #f0f0f0; }

/* Separator */
div.hr, div.hr2 { background: transparent url("separator.gif") repeat scroll left top; }

/* Dropcaps */
.dropcap { color: #555; }

/* Inner Page Slider */
.slider + .slider-footer { background-color: <?php echo $main_color; ?>; }

/* Lists */
ul.color-bullet li { color: <?php echo $link_color; ?>; }
ul.color-bullet li span { color: #777; }

/* Testimonials */
.testimonial-container { background: transparent url('separator.gif') repeat scroll left top; }
.testimonial { background-color: #fff; }
.testimonial-meta .testimonial-person { color: #555; }

/* Tabs */
ul.tabs { border-bottom: 1px solid <?php echo $main_color; ?>; }
ul.tabs li { border: 1px solid <?php echo $main_color; ?>; background: <?php echo $main_color; ?>; }
ul.tabs li a { color: #fff; }
ul.tabs li:hover { background: #fff; }
ul.tabs li a:hover { color: <?php echo $main_color; ?>; }
ul.tabs li.active { background: #fff; border-bottom: 1px solid #fff; }
ul.tabs li.active a, 
ul.tabs li.active a:hover { color: <?php echo $main_color; ?>; }

/* Pricing Table */
.price-column h4 { color: #555; background-color: #ddd; }
.price-column .price-tag { color: #555; }
.price-column .button { background-color: #fff; color: #777; }
.price-column .button:hover { background-color: #555; color: #fff; }
.price-column { background-color: #f0f0f0; }
.price-column-even { background-color: #f7f7f7; }
.price-column li.even { color: #555; }
.price-column-featured { background-color: #fff; box-shadow: 1px 1px 20px rgba(50, 50, 50, .3); -moz-box-shadow: 1px 1px 20px rgba(50, 50, 50, .3); -webkit-box-shadow: 1px 1px 20px rgba(50, 50, 50, .3); -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#bab9b9')"; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#bab9b9'); }
.price-column-featured h4 { color: #fff; background-color: <?php echo $main_color; ?>; }
.price-column-featured .price-tag { color: <?php echo $link_color; ?>; }
.price-column-featured .button { background-color: <?php echo $link_color; ?>; color: #fff; }

/* Highlight */
.highlight { background-color: <?php echo $main_color; ?>; color: #fff; }
.highlight.dark { background-color: #555; color: #fff; }

/* Video Shortcode */
.embedded-video { background-color: #ddd; }

/* Pagenavi */
.wp-pagenavi .pages { color: #999; }
.wp-pagenavi a, .wp-pagenavi a:link, .wp-pagenavi a:visited { background-color: #eee; color: #999; }
.wp-pagenavi a:hover { background-color: <?php echo $link_color; ?>; color: #fff; }
.wp-pagenavi span.current { background-color: <?php echo $link_color; ?>; color: #fff; }

/* [gallery] */
.gallery-caption { color: #777; }

/* Tables */
table { border: 1px solid #f0f0f0; }
caption { border-top: 1px solid <?php echo $main_color; ?>; }
table .alt { background: #f0f0f0; }
tr { border-bottom: 1px solid #f0f0f0; }
th { background-color: <?php echo $main_color; ?>; border: 1px solid <?php echo $main_color; ?>; color: #fff; }
table tfoot tr th, table tfoot tr td { background-color: #eee; border: 1px solid #eee; color: #555; }

/* Text Elements */
var, kbd, samp, code, pre { background: #fafafa; color: #666; }
pre { border: 1px solid #ddd; }
blockquote { color: #555; background: transparent url('blockquote.png') no-repeat scroll left 18px; }
blockquote.alignright, blockquote.alignleft { background: transparent url('blockquote.png') no-repeat scroll left 4px; }

/* Forms */
input, textarea { background-color:#eee; color: #999; }
input:focus, textarea:focus { background: <?php echo $main_color; ?>; color: #fff; }