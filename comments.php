<?php
/**
* The template for displaying comments
*
* This is the template that displays the area of the page that contains both the current comments
* and the comment form.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package WOT
*/

/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title mb-4">
			<?php
			$wot_comment_count = get_comments_number();
			if ( '1' === $wot_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'wot' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $wot_comment_count, 'comments title', 'wot' ) ),
					number_format_i18n( $wot_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list pl-0">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wot' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	?>

	<hr class="my-4">

	<?php
	// edit submit button
	$args = array(

		'comment_field' => '<div class="comment-form-comment form-group"><label for="comment">' .
		_x( 'Il tuo commento (*)', 'noun', 'textdomain' ) . '</label> ' .
		'<textarea id="comment" name="comment" class="form-control" rows="6" maxlength="65525" aria-required="true" required="required"></textarea></div>',

		'submit_button' => '<div class="form-group">
		<input class="btn btn-primary mt-4" name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />
		</div>'

	);
	comment_form($args);
	?>

</div><!-- #comments -->
