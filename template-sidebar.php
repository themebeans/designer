<?php
/**
 * Template Name: Sidebar
 * The template for displaying the sidebar template.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


get_header();

// META
$content             = $post->post_content;
$page_content_layout = get_post_meta( $post->ID, '_bean_page_content_layout', true );
$page_parallax       = get_post_meta( $post->ID, '_bean_page_parallax', true ); ?>

<?php
while ( have_posts() ) :
	the_post();
?>

	<?php
	if ( $page_parallax == 'off' ) {
		$page_parallax = 'no-parallax'; }
?>

	<?php
	if ( has_post_thumbnail() ) {
		echo '<div class="entry-media ' . esc_attr( $page_parallax ) . '">';
		the_post_thumbnail( 'port-full' );
		echo '</div>'; }
?>

	<?php if ( $content ) { ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class( esc_attr( $page_content_layout ) . ' ' . esc_attr( $page_parallax ) ); ?>>

			<article class="entry-content main-content fadein 
			<?php
			if ( ! has_post_thumbnail() ) {
				echo 'no-media'; }
?>
 clearfix">
				<?php the_content(); ?>
			</article>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

		</div>
	<?php } ?>

	<?php if ( $page_content_layout != 'content-fullwidth' ) { ?>
		<?php if ( is_active_sidebar( 'theme-sidebar' ) ) { ?>
			<div class="sidebar fadein <?php echo esc_html( $page_content_layout ); ?> <?php echo esc_html( $page_parallax ); ?> <?php
			if ( has_post_thumbnail() ) {
				echo 'has-media'; }
?>
">
				<?php dynamic_sidebar( 'theme-sidebar' ); ?>
			</div>
		<?php
}
}

endwhile;
wp_reset_postdata();

get_footer();
