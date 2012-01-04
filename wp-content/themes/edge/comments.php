<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to unisphere_comment which is
 * located in the /library/comments.php file.
 */
?>

			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'unisphere' ); ?></p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comment-title"><?php
			printf( _n( '1 Comment to %2$s', '%1$s Comments to %2$s', get_comments_number(), 'unisphere' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation navigation-top clearfix">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&laquo;</span> Older Comments', 'unisphere' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&raquo;</span>', 'unisphere' ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<ol class="comment-list">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use unisphere_comment() to format the comments. */
					wp_list_comments( array( 'callback' => 'unisphere_comment' ) );
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation navigation-bottom clearfix">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&laquo;</span> Older Comments', 'unisphere' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&raquo;</span>', 'unisphere' ) ); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div><!-- #comments -->
