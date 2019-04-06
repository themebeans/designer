<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>

<div class="comments-wrap clearfix
<?php
if ( comments_open() && '0' == get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
	echo 'zero-comments'; }
?>
">

		<div class="comments-title-wrap">
			<p class="comments-title"><?php comments_number( __( '0 Comments', 'designer' ), __( '1 Comment', 'designer' ), __( '% Comments', 'designer' ) ); ?></p>

			<?php if ( ! comments_open() && is_page() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>

				<span class="nocomments"><?php esc_html_e( 'Comments are now officially closed.', 'designer' ); ?></span>

			<?php } ?>
		</div>

		<?php if ( ! comments_open() && have_comments() && ! is_page() ) : ?>
			<span class="nocomments"><?php esc_html_e( 'Comments are now officially closed.', 'designer' ); ?></span>
		<?php
		endif;

if ( have_comments() ) {
?>

	<div id="comments" class="clearfix">

		<div id="comments-list" class="comments">

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
						<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
							<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'designer' ); ?></h2>
							<div class="nav-links">

								<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'designer' ) ); ?></div>
								<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'designer' ) ); ?></div>

							</div><!-- .nav-links -->
						</nav><!-- #comment-nav-above -->
					<?php endif; // Check for comment navigation. ?>

			<ol class="commentlist block comment-list">
				<?php
					wp_list_comments(
						array(
							'style'      => 'ol',
							'short_ping' => true,
							'callback'   => 'designer_comments',
						)
					);
				?>
			</ol><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
						<nav id="comment-nav-below" class="navigation comment-navigation">
							<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'designer' ); ?></h2>
							<div class="nav-links">

								<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'designer' ) ); ?></div>
								<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'designer' ) ); ?></div>

							</div><!-- .nav-links -->
						</nav><!-- #comment-nav-below -->
						<?php endif; ?>

					</div><!-- END #comments-list.comments -->

			</div><!-- END #comments -->

		<?php
}  //END if ( have_comments() )
if ( comments_open() ) {
	comment_form();
}

?>

</div><!-- END #comments -->
