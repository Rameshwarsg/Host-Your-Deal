<?php get_header(); ?>
<div id="wrapper-news">
<div id="main-news">
  <div id="container-news" class="full-width">
    <div id="homepage-content-news">
      <div class="top-content-news">
        <div class="heading">
          <h1><img src="<?php bloginfo('template_url');?>/images/news-line-img.png" alt="newsl" /></h1>
        </div>
        <div class="top">
          <ul>
            <li class="left"><img src="<?php bloginfo('template_url');?>/images/news-img.png" alt="news" /></li>
            <li class="right">
              <h1><?php echo get_the_title(72); ?></h1>
              <p><?php
					$post_id= 72;
					$queried_post= get_post($post_id);
					echo $queried_post->post_content;
					?></p>
            </li>
          </ul>
        </div>
        <div class="clear"></div>
        <div class="middle1">
          <ul>
            <li class="left"><img src="<?php bloginfo('template_url');?>/images/news-img.png" alt="news" /></li>
            <li class="right">
              <h1><?php echo get_the_title(77); ?></h1>
              <p><?php $post_id=77;
			  $required_post=get_post($post_id);
			  echo $required_post->post_content?></p>
            </li>
          </ul>
        </div>
        <div class="clear"></div>
        <div class="middle2">
          <ul>
            <li class="left"><img src="<?php bloginfo('template_url');?>/images/news-img.png" alt="news" /></li>
            <li class="right">
              <h1><?php echo get_the_title(80); ?></h1>
              <p><?php $post_id=80;
			  $required_post=get_post($post_id);
			  echo $required_post->post_content?></p>
            </li>
          </ul>
        </div>
        <div class="clear"></div>
        <div class="buttom">
          <ul>
            <li class="left"><img src="<?php bloginfo('template_url');?>/images/news-img.png" alt="news" /></li>
            <li class="right">
              <h1><?php echo get_the_title(83); ?></h1>
              <p><?php $post_id=83;
			  $required_post=get_post($post_id);
			  echo $required_post->post_content?></p>
            </li>
          </ul>
        </div>
      </div>
      <!--/ top-content-news-->
      <div class="clear"></div>
      <div class="buttom-content-news">
        <div class="post-no">4-6 of 15 posts</div>
        <div class="prev-next">
          <ul>
            <li><a href="#"><img src="<?php bloginfo('template_url');?>/images/prev-img.png" alt="previmg" /></a></li>
            <li><img src="<?php bloginfo('template_url');?>/images/prev-next-seprator.png" alt="prv" /></li>
            <li><a href="#"><img src="<?php bloginfo('template_url');?>/images/next-img.png" alt="previmg" /></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--/ end# container-->
</div>
<!--/ end# main-wrap -->
<div class="clear"></div>
<?php get_footer(); ?>