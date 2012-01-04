<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Think One" />
<meta name="description" content="Think One" />
<meta name="publishedDate" content="2010-08-01" />
<meta name="language" content="english" />
<meta name="Powered by" content="Open Think Group" />
<meta name="robots" content="index, follow" />
<title>CaviarFolioLand</title>
<link href="<?php bloginfo('template_url');?>/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--Start here page-wrap -->
<div id="body-wrapper">
  <div id="header"> </div>
  <div id="wrapper">
    <div id="main">
      <div id="container" class="full-width">
        <!-- Logo -->
        <div id="logo"> <a href="#"></a></div>
        <div id="social-buttons">
          <div class="bg"><img src="<?php bloginfo('template_url');?>/images/social-bg.png" alt="social" /> </div>
          <div class="social-link">
             <ul>
              <li><a href="#"><img src="<?php bloginfo('template_url');?>/images/fb.png" alt="fb" /></a><a href="#"><img src="<?php bloginfo('template_url');?>/images/tw.png" alt="tw" /></a><a href="#"><img src="<?php bloginfo('template_url');?>/images/2eye.png" alt="eye" /></a><a href="#"><img src="<?php bloginfo('template_url');?>/images/ss.png" alt="ss" /></a><a href="#"><img src="<?php bloginfo('template_url');?>/images/in.png" alt="in" /></a><a href="#"><img src="<?php bloginfo('template_url');?>/images/skype.png" alt="sk" /></a></li>
            </ul>
          </div>
          <!--/ end# masthead -->
        </div>
        <!-- / end# header -->
        <div class="clear"></div>
        <div class="seprator"><img src="<?php bloginfo('template_url');?>/images/main-seprator.png" alt="mainsep" /></div>
        <div id="homepage-content">
          <div class="left-content">
            <ul>
              <li class="img"><img src="<?php bloginfo('template_url');?>/images/about-me.png" alt="img" /></li>
              <li class="text">
                <h1><?php echo get_the_title(114); ?></h1>
                <p><?php
					$post_id= 114;
					$queried_post= get_post($post_id);
					echo $queried_post->post_content;
					?></p>
              </li>
            </ul>
            <div class="clear"></div>
            <div class="apps">
              <ul>
                <li class="top"><a href="#"><img src="<?php bloginfo('template_url');?>/images/apps.png" /></a><a href="#"><img src="<?php bloginfo('template_url');?>/images/apps.png" /></a><a href="#"><img src="<?php bloginfo('template_url');?>/images/apps.png" /></a><a href="#"><img src="<?php bloginfo('template_url');?>/images/apps.png" /></a></li>
                <li class="buttom"><a href="#"><img src="<?php bloginfo('template_url');?>/images/apps.png" /></a><a href="#"><img src="<?php bloginfo('template_url');?>/images/apps.png" /></a><a href="#"><img src="<?php bloginfo('template_url');?>/images/apps.png" /></a><a href="#"><img src="<?php bloginfo('template_url');?>/images/apps.png" /></a></li>
              </ul>
            </div>
          </div>
          <!--/ left-content-->
          <div class="right-content">
            <div class="contact-form">
              <h1>Contact me</h1>
              <form name="contact-form">
                <ul>
                  <li class="first">Name</li>
                  <li class="input"></li>
                  <li class="first">Email</li>
                  <li class="input"></li>
                  <li class="first">Message</li>
                  <li class="input-textarea"></li>
                </ul>
                <div class="clear"></div>
                <a href="#"><img src="<?php bloginfo('template_url');?>/images/submit.png" alt="submit" /></a>
              </form>
              <div class="available-me"> <a href="#"><img src="<?php bloginfo('template_url');?>/images/star.png" alt="star" /></a> </div>
            </div>
          </div>
          <!--/ right-content-->
        </div>
      </div>
      <!--/ end# container-->
    </div>
    <!--/ end# main-wrap -->
    <div class="clear"></div>
    <?php get_footer(); ?>    