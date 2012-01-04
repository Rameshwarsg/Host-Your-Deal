<?php global $unisphere_options; ?>

		<!--BEGIN #footer-widgets-separator-container-->
	    <div id="footer-widgets-separator-container">

			<!--BEGIN #footer-widgets-separator-->
		    <div id="footer-widgets-separator">

	    	<!--END #footer-widgets-separator-->
		    </div>

	    <!--END #footer-widgets-separator-container-->
	    </div>

		<!--BEGIN #footer-widgets-container-->
	    <div id="footer-widgets-container">
	
	        <!--BEGIN #footer-->
	        <div id="footer-widgets" class="clearfix">
	        
	        	<div class="footer-column">
		        	<?php	/* Footer Widgetized Area */
		             	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Column 1') ) : ?>
		
		            <?php endif; ?>
	            </div>
	
	        	<div class="footer-column">            
		            <?php	/* Footer Widgetized Area */
		             	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Column 2') ) : ?>
		
		            <?php endif; ?>
	            </div>
	            
	        	<div class="footer-column">
		            <?php	/* Footer Widgetized Area */
		             	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Column 3') ) : ?>
		
		            <?php endif; ?>
		        </div>
	            
	           	<div class="footer-column">
		            <?php	/* Footer Widgetized Area */
	    	         	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Column 4') ) : ?>
	
	        	    <?php endif; ?>
	        	</div>
	
	        <!--END #footer-widgets-->
	        </div>
	
		<!--END #footer-widgets-container-->
		</div>
	
	    <!--BEGIN #footer-container-->
	    <div id="footer-container">
	
	        <!--BEGIN #footer-->
	        <div id="footer" class="clearfix">
	
				<p id="copyright"><?php echo $unisphere_options['footer_copyright']; ?></p>
	            
	            <ul id="social">
	            	<?php if ( $unisphere_options['show_footer_rss_link'] == '1' ) : ?>            
	                <li><a href="<?php bloginfo( 'rss2_url' ); ?>" title="RSS"><img src="<?php echo UNISPHERE_IMAGES . '/rss.png' ?>" alt="RSS" /></a></li>
	                <?php endif; ?>
	                	                
					<?php if ( trim( $unisphere_options['footer_twitter']) != '' ) : ?>
	                <li><a href="<?php echo $unisphere_options['footer_twitter']; ?>" title="Twitter"><img src="<?php echo UNISPHERE_IMAGES . '/twitter.png' ?>" alt="Twitter" /></a></li>
	                <?php endif; ?>
	                
					<?php if ( trim( $unisphere_options['footer_facebook']) != '' ) : ?>
	                <li><a href="<?php echo $unisphere_options['footer_facebook']; ?>" title="Facebook"><img src="<?php echo UNISPHERE_IMAGES . '/facebook.png' ?>" alt="Facebook" /></a></li>
	                <?php endif; ?>
	                
					<?php if ( trim( $unisphere_options['footer_flickr']) != '' ) : ?>
	                <li><a href="<?php echo $unisphere_options['footer_flickr']; ?>" title="Flickr"><img src="<?php echo UNISPHERE_IMAGES . '/flickr.png' ?>" alt="Flickr" /></a></li>
	                <?php endif; ?>
	            </ul>
	
	        <!--END #footer-->
	        </div>
	
		<!--END #footer-container-->
		</div>
		
	<!--END #container-->
	</div>
		
    <?php // Display the custom scripts defined in the admin panel
		if( trim($unisphere_options['custom_js']) != '' ) {
			echo $unisphere_options['custom_js'];
		}
	?>
    
	<!-- Theme Hook -->
	<?php wp_footer(); ?>
	
<!--END body-->
</body>
<!--END html-->
</html>