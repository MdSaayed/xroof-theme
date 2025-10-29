<?php
/**
 * The template for displaying comments
 * (custom structure + AJAX reply support)
 */

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
			printf(
				_n( 'One Comment', '%1$s Comments', get_comments_number(), 'xroof' ),
				number_format_i18n( get_comments_number() )
			);
			?>
		</h3>

		<ul class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ul',
				'short_ping' => true,
				'avatar_size'=> 60,
				'callback'   => 'xroof_comment_template',
			) );
			?>
		</ul>

		<?php
		the_comments_navigation();

		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'xroof' ); ?></p>
			<?php
		endif;

	endif; // have_comments()

	comment_form();
	?>
</div><!-- #comments -->

<?php
/**
 * Custom comment structure
 */
function xroof_comment_template( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="comment-avatar">
				<?php echo get_avatar( $comment, 60 ); ?>
			</div>
			<div class="comment-content">
				<div class="comment-meta">
					<b class="comment-author"><?php comment_author_link(); ?></b>
					<span class="comment-date"><?php echo get_comment_date(); ?></span>
				</div>

				<div class="comment-text">
					<?php comment_text(); ?>
				</div>

				<div class="reply">
					<?php
					comment_reply_link( array_merge( $args, array(
						'reply_text' => 'Reply',
						'depth'      => $depth,
						'max_depth'  => $args['max_depth'],
					) ) );
					?>
				</div>
			</div>
		</article>
	</li>
<?php } ?>

<!-- Enable threaded comments (reply without page reload) -->
<?php
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}
?>
