<?php get_header(); ?>

    <div id="main">
      <div id="container" class="full-width">
        <div id="homepage-content">
          <div class="top-content">
            <div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/top-slide.png" alt="slide"  />
              <div class="readmore"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/more-logo.png" alt="readmore" /></a></div><div class="iphone"><img src="<?php bloginfo('template_url'); ?>/images/iphone.png" alt="iphone" /></div>
              <ul>
                <li class="first"><img src="<?php bloginfo('template_url'); ?>/images/folio-1.png" alt="folio-buttom" /> </li>
                <li class="second"><img src="<?php bloginfo('template_url'); ?>/images/folio-2.png" alt="folio-buttom" /> </li>
                <li class="third"><img src="<?php bloginfo('template_url'); ?>/images/folio-2.png" alt="folio-buttom" /> </li>
              </ul>
            </div>
            <div class="post">
              <h1><?php echo get_the_title(119); ?></h1>
              <p><?php
					$post_id= 119;
					$queried_post= get_post($post_id);
					echo $queried_post->post_content;
					?></p>
              <ul>
                <li><img src="<?php bloginfo('template_url'); ?>/images/post-seprator.png" alt="seprator" /></li>
                <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/visit-website.png" alt="visit" /></a></li>
                <li><img src="<?php bloginfo('template_url'); ?>/images/post-seprator.png" alt="seprator" /></li>
                <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/post-search.png" alt="seprator" /></a><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/post-s.png" alt="seprator" /></a></li>
              </ul>
            </div>
          </div>
          <!--/ top-content-->
          <div class="middle1-content">
            <div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/middle1-slide.png" alt="slide"  />
              <div class="readmore"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/more-logo.png" alt="readmore" /></a></div>
              <ul>
                <li class="first"><img src="<?php bloginfo('template_url'); ?>/images/folio-1.png" alt="folio-buttom" /> </li>
                <li class="second"><img src="<?php bloginfo('template_url'); ?>/images/folio-2.png" alt="folio-buttom" /> </li>
              </ul>
            </div>
            <div class="post">
              <h1><?php echo get_the_title(123);?></h1>
              <p><?php
					$post_id= 123;
					$queried_post= get_post($post_id);
					echo $queried_post->post_content;
					?></p>
              <ul>
                <li><img src="<?php bloginfo('template_url'); ?>/images/post-seprator.png" alt="seprator" /></li>
                <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/download-website.png" alt="visit" /></a></li>
                <li><img src="<?php bloginfo('template_url'); ?>/images/post-seprator.png" alt="seprator" /></li>
                <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/post-search.png" alt="seprator" /></a><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/post-s.png" alt="seprator" /></a></li>
              </ul>
            </div>
          </div>
          <!--/ middle1-content-->
          <div class="middle2-content">
            <div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/middle2-slide.png" alt="slide"  />
              <div class="readmore"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/more-logo.png" alt="readmore" /></a></div>
              <ul>
                <li class="first"><img src="<?php bloginfo('template_url'); ?>/images/folio-1.png" alt="folio-buttom" /> </li>
              </ul>
            </div>
            <div class="post">
              <h1><?php echo get_the_title(126);?></h1>
              <p><?php
					$post_id= 126;
					$queried_post= get_post($post_id);
					echo $queried_post->post_content;
					?></p>
              <ul>
                <li><img src="<?php bloginfo('template_url'); ?>/images/post-seprator.png" alt="seprator" /></li>
                <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/visit-website.png" alt="visit" /></a></li>
                <li><img src="<?php bloginfo('template_url'); ?>/images/post-seprator.png" alt="seprator" /></li>
                <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/post-search.png" alt="seprator" /></a><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/post-s.png" alt="seprator" /></a></li>
              </ul>
            </div>
          </div>
          <!--/ middle2-content-->
          <div class="buttom-content">
            <div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/buttom-slide.png" alt="slide"  />
              <div class="readmore"><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/more-logo.png" alt="readmore" /></a></div>
              <ul>
                <li class="first"><img src="<?php bloginfo('template_url'); ?>/images/folio-1.png" alt="folio-buttom" /> </li>
                <li class="second"><img src="<?php bloginfo('template_url'); ?>/images/folio-2.png" alt="folio-buttom" /> </li>
              </ul>
            </div>
            <div class="post">
              <h1><?php echo get_the_title(129);?></h1>
              <p><?php
					$post_id= 129;
					$queried_post= get_post($post_id);
					echo $queried_post->post_content;
					?> </p>
              <ul>
                <li><img src="<?php bloginfo('template_url'); ?>/images/post-seprator.png" alt="seprator" /></li>
                <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/visit-website.png" alt="visit" /></a></li>
                <li><img src="<?php bloginfo('template_url'); ?>/images/post-seprator.png" alt="seprator" /></li>
                <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/post-search.png" alt="seprator" /></a><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/post-s.png" alt="seprator" /></a></li>
              </ul>
            </div>
          </div>
          <!--/ buttom-content-->
        </div>
      </div>
      <!--/ end# container-->
    </div>
    <!--/ end# main-wrap -->
    <div class="clear"></div>
    <?php get_footer(); ?>