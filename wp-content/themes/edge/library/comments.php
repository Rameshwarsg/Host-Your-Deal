<?php
/**
 * Changes the default HTML structure of the author, email and url comment form fields to better suite the design
 */
function unisphere_comment_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$fields = array(
		'author' => '<div id="form-section-author" class="form-section"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" /><label for="author">' . __( 'Name', 'unisphere' ) . '</label></div>',
		'email'  => '<div id="form-section-email" class="form-section"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" /><label for="email">' . __( 'Email', 'unisphere' ) . '</label></div>',
		'url'    => '<div id="form-section-url" class="form-section"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /><label for="url">' . __( 'Website', 'unisphere' ) . '</label></div>',
	);
	return $fields;
}
add_filter('comment_form_default_fields','unisphere_comment_fields');


/**
 * Changes the default HTML structure of the comment form field to better suite the design
 */
function unisphere_comment_form_field_comment( $args ) {	
	return '<div id="form-section-comment" class="form-section"><textarea id="comment" name="comment" cols="65" rows="10"></textarea></div>';
}
add_filter('comment_form_field_comment','unisphere_comment_form_field_comment');


/**
 * Use an HTML button element for the cancel comment reply link.
 */
function cancel_comment_reply_button($html, $link, $text) {
    $style = isset($_GET['replytocom']) ? '' : ' style="display:none;"';
    $button = '<button id="cancel-comment-reply-link"' . $style . '>';
    return $button . $text . '</button>';
}
 
//add_action('cancel_comment_reply_link', 'cancel_comment_reply_button', 10, 3);


/**
 * Template for comments and pingbacks.
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function unisphere_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>   	
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    	<div id="comment-<?php comment_ID(); ?>" class="single-comment">
            <div class="comment-author vcard">
                <?php echo get_avatar( $comment, 50 ); ?>
                <cite class="commenter"><?php echo get_comment_author_link(); ?></cite>
            </div><!-- .comment-author .vcard -->
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-not-approved"><?php _e( 'Your comment is awaiting moderation.', 'unisphere' ); ?></em>
            <?php endif; ?>
    
            <div class="comment-meta commentmetadata">
                <?php
                    /* translators: 1: date, 2: time */
                    printf( __( '%1$s at %2$s', 'unisphere' ), get_comment_date(),  get_comment_time() );
                ?>
            </div><!-- .comment-meta .commentmetadata -->
    
            <div class="comment-content"><?php comment_text(); ?></div>

		</div><!-- #comment-##  -->    

		<div class="comment-reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .comment-reply -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    	<div id="comment-<?php comment_ID(); ?>" class="single-comment">
			<?php _e( 'Pingback:', 'unisphere' ); ?> <?php comment_author_link(); ?>
			<div class="comment-arrow"></div>
		</div>
	<?php
			break;
	endswitch;
}
?>