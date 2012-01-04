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
body { color: #777; background-color: #000; }

/* Headings */
h1, h2, h3, h4, h5 { color: #bbb; }
h6 { color: #777; }

/* Links */
a { color: <?php echo $link_color; ?>; }

/* Text Selection */
::-moz-selection { color: #fff; color: rgba(255,255,255,.85); background: <?php echo $main_color; ?>; }
::selection { color: #fff; color: rgba(255,255,255,.85); background: <?php echo $main_color; ?>; }

/* Menu */
.menu a { color: #777; }
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

.nav ul { background-color: #171717; border: 1px solid #333; }
.nav ul li { border-top: 1px solid #333; }
.nav ul li:first-child { border-top: 0; }
.nav ul li a { color: #999!important; }

.nav ul a:hover { color: <?php echo $link_color; ?>!important; }
.nav li.current_page_item ul a,
.nav li.current_page_ancestor ul a,
.nav li.current_page_parent ul a,
.nav li.current-menu-item ul a,
.nav li.current-menu-ancestor ul a { color: #999 !important; }
.nav li.current_page_item ul a:hover,
.nav li.current_page_ancestor ul a:hover,
.nav li.current_page_parent ul a:hover,
.nav li.current-menu-item ul a:hover,
.nav li.current-menu-ancestor ul a:hover { color: <?php echo $link_color; ?> !important; }

/* Home page slider */
#nivo-slider-container { background: transparent url("separator_dark.gif") repeat scroll left top; }
#nivo-slider, .slider { background: #000 url('ajax-loader.gif') no-repeat 50% 50%; }
.nivo-caption { color: #fff; }
.nivo-controlNav a { background: transparent url('slider_nav.png') no-repeat scroll left top; }
.nivo-controlNav a:hover,
.nivo-controlNav a.active { background: transparent url('slider_nav_selected.png') no-repeat scroll left top; }
#nivo-slider-container .slider-footer { background-color: <?php echo $main_color; ?>; }

/* Stage Slider (Home Page) */
#stage-slider-container { background: transparent url("separator_dark.gif") repeat scroll left top; }
#stage-slider { background: #000 url('ajax-loader.gif') no-repeat 50% 50%; }
#stage-slider li { background-color: #000; }
#stage-slider .description-wrapper { background-color: #111; }
#stage-slider-container #slider-nav a { background: transparent url('slider_nav.png') no-repeat scroll left top; }
#stage-slider-container #slider-nav a:hover,
#stage-slider-container #slider-nav a.activeSlide { background: transparent url('slider_nav_selected.png') no-repeat scroll left top; }
#stage-slider-container .slider-footer { background-color: <?php echo $main_color; ?>; }

/* The Home Page Styles */
#home-portfolio-title h2 { background-color: #000; }
#home-blog-title h2 { background-color: #000; }

/* Sub-header */
#sub-header-container { background: transparent url("separator_dark.gif") repeat scroll left top; }
#sub-header { background-color: <?php echo $main_color; ?>; }
#sub-header h1 { color: #000; }

/* Blog */
.post-title, .post-title a { color: #bbb; }
.post-title a:hover { color: <?php echo $link_color; ?>; }
.post-meta { color: #777; }
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
.comment-list > li.comment { border-top: 1px solid #333; }
.comment-list .children > li { border-top: 1px solid #333; }
.commenter { color: #bbb; }
.comment-meta { color: #777; }
.bypostauthor > .single-comment .avatar { -moz-box-shadow: 0 0 5px 2px <?php echo $main_color; ?>; -webkit-box-shadow: 0 0 5px 2px <?php echo $main_color; ?>; box-shadow: 0 0 5px 2px <?php echo $main_color; ?>; }
.ie7 .bypostauthor > .single-comment .avatar,
.ie8 .bypostauthor > .single-comment .avatar { border: 2px solid <?php echo $main_color; ?>; }

/* Comment Reply */
#respond { border-top: 1px solid #333; }
#comments > #respond:first-child { border-top: 0; }

/* Contact Page */
.input-error { background-color: #1C1313; }
.sending-message { color: #bbb; background: transparent url('ajax-loader.gif') no-repeat left top; }
.success-sending-message,
.error-sending-message { color: #bbb; }

/* Portfolio */
.portfolio-browse { color: #bbb; background-color: #000; }
.portfolio-filters { background-color: #000; }
.portfolio-filters li a { color: #888; }
.portfolio-filters li a.active,
.portfolio-filters li a:hover { color: <?php echo $link_color; ?>; }
.portfolio-1-column-list img,
.portfolio-4-columns-list img { background: url('ajax-loader.gif') no-repeat 50% 50%; }
.portfolio-title { color: #bbb; }
.portfolio-4-columns-list .portfolio-title { background-color: <?php echo $main_color; ?>; }
.portfolio-4-columns-list .portfolio-title a { color: #fff; }
.portfolio-4-columns-list .portfolio-title a:hover { color: #333; }
.portfolio-detail-big-image .caption { color: #777; }

/* Custom Menu Widget */
.widget h3 { color: <?php echo $link_color; ?>; }
.widget .menu a { color: <?php echo $link_color; ?>; }

/* Recent and Popular Posts Widget */
.widget-posts li { border-top: 1px solid #333; }
.widget-posts li a.post-title:hover { color: <?php echo $link_color; ?>; }
.widget-posts li .published-time { color: #777; }

/* Twitter Widget */
.widget-twitter li { border-top: 1px solid #333; }
.widget-twitter small { background: transparent url('twitter_bird.png') no-repeat left 4px; }
.widget-twitter small a { color: #777; }
.widget-twitter small a:hover { color: <?php echo $link_color; ?>; }

/* Footer Widgets Separator */
#footer-widgets-separator-container { background: transparent url("separator_dark.gif") repeat scroll left top; }
#footer-widgets-separator { background-color: <?php echo $main_color; ?>; }

/* Footer */
#footer-container { background: transparent url("separator_dark.gif") repeat scroll left top; }
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
.dropcap { color: #bbb; }

/* Inner Page Slider */
.slider + .slider-footer { background-color: <?php echo $main_color; ?>; }

/* Lists */
ul.color-bullet li { color: <?php echo $link_color; ?>; }
ul.color-bullet li span { color: #777; }

/* Testimonials */
.testimonial-container { background: transparent url('separator.gif') repeat scroll left top; }
.testimonial { background-color: #000; }
.testimonial-meta .testimonial-person { color: #bbb; }

/* Tabs */
ul.tabs { border-bottom: 1px solid <?php echo $main_color; ?>; }
ul.tabs li { border: 1px solid <?php echo $main_color; ?>; background: <?php echo $main_color; ?>; }
ul.tabs li a { color: #fff; }
ul.tabs li:hover { background: #000; }
ul.tabs li a:hover { color: <?php echo $main_color; ?>; }
ul.tabs li.active { background: #000; border-bottom: 1px solid #000; }
ul.tabs li.active a, 
ul.tabs li.active a:hover { color: <?php echo $main_color; ?>; }

/* Pricing Table */
.price-column h4 { color: #fff; background-color: #333; }
.price-column .price-tag { color: #bbb; }
.price-column .button { background-color: #0b0b0b; color: #777; }
.price-column .button:hover { background-color: #777; color: #000; }
.price-column { background-color: #1a1a1a; }
.price-column-even { background-color: #181818; }
.price-column li.even { color: #bbb; }
.price-column-featured { background-color: #0b0b0b; box-shadow: 1px 1px 20px rgba(0, 0, 0, .3); -moz-box-shadow: 1px 1px 20px rgba(0, 0, 0, .3); -webkit-box-shadow: 1px 1px 20px rgba(0, 0, 0, .3); -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000')"; filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000'); }
.price-column-featured h4 { color: #fff; background-color: <?php echo $main_color; ?>; }
.price-column-featured .price-tag { color: <?php echo $link_color; ?>; }
.price-column-featured .button { background-color: <?php echo $link_color; ?>; color: #fff; }

/* Highlight */
.highlight { background-color: <?php echo $main_color; ?>; color: #fff; }
.highlight.dark { background-color: #555; color: #fff; }

/* Video Shortcode */
.embedded-video { background-color: #111; }

/* Pagenavi */
.wp-pagenavi .pages { color: #777; }
.wp-pagenavi a, .wp-pagenavi a:link, .wp-pagenavi a:visited { background-color: #222; color: #777; }
.wp-pagenavi a:hover { background-color: <?php echo $link_color; ?>; color: #fff; }
.wp-pagenavi span.current { background-color: <?php echo $link_color; ?>; color: #fff; }

/* [gallery] */
.gallery-caption { color: #777; }

/* Tables */
table { border: 1px solid #1f1f1f; }
caption { border-top: 1px solid <?php echo $main_color; ?>; }
table .alt { background: #1f1f1f; }
tr { border-bottom: 1px solid #1f1f1f; }
th { background-color: <?php echo $main_color; ?>; border: 1px solid <?php echo $main_color; ?>; color: #fff; }
table tfoot tr th, table tfoot tr td { background-color: #111; border: 1px solid #111; color: #bbb; }

/* Text Elements */
var, kbd, samp, code, pre { background: #111; color: #888; }
pre { border: 1px solid #191919; }
blockquote { color: #bbb; background: transparent url('blockquote.png') no-repeat scroll left 18px; }
blockquote.alignright, blockquote.alignleft { background: transparent url('blockquote.png') no-repeat scroll left 4px; }

/* Forms */
input, textarea { background-color:#111; color: #777; }
input:focus, textarea:focus { background: <?php echo $main_color; ?>; color: #fff; }