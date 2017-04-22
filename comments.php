<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>
	<div id="comments" class="comments-area">
	<h2 class="comments-title">
		<?php
			printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'cherierenaephotography' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</h2>

	<?php cherierenaephotography_comment_nav(); ?>

	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 56,
			) );
		?>
	</ol><!-- .comment-list -->

	<?php cherierenaephotography_comment_nav(); ?>
	</div><!-- .comments-area -->
<?php endif; // have_comments() ?>

<?php
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'cherierenaephotography' ); ?></p>
<?php endif; ?>

<?php comment_form(); ?>
