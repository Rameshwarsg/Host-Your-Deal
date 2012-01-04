<?php
/**
 * The Sidebar containing the widget areas.
 */
?>

			<!--BEGIN #secondary-->
            <div id="secondary">

                <?php 	/* Contact Page Widgetized Area */
                    if ( is_page() && get_page_ID_by_page_template('template_contact.php') == $post->ID ) : ?>
                    
                        <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Contact Page Sidebar') ) : ?>
                                        
                        <?php endif; ?>
                        
                <?php else : ?>
                
                    <?php 	/* Show current page sub-menu if it's a page and has cildren */				
                            if ( is_page()) : ?>
                            
                        <?php	/* This Unique Page Widgetized Area */
                            if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('page_' . $post->ID) ) : ?>
                        
                        <?php endif; ?>
                        
                        <?php	/* Page's Widgetized Area */
                            if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Page Sidebar') ) : ?>
                        
                        <?php endif; ?>
                        
                    <?php else : ?>
                        
                        <?php	/* Blog Widgetized Area */
                            if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Blog Sidebar') ) : ?>
                        
                        <?php endif; ?>      
                        
                    <?php endif; ?>
                    
                    
                    <?php	/* Shared (Blog/Page) Widgetized Area */
                    	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Shared Sidebar') ) : ?>
                        
                    <?php endif; ?>
                    
                <?php endif; ?>	        	
                
            <!--END #secondary-->
            </div>