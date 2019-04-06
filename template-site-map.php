<?php
/**
 * Template Name: Site Map
 * The template for displaying the site map template.
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

	<div id="post-<?php the_ID(); ?>" <?php post_class( esc_attr( $page_content_layout ) ); ?>>

		<article class="entry-content main-content fadein
		<?php
		if ( ! has_post_thumbnail() ) {
			echo 'no-media'; }
?>
 clearfix">

			<?php the_content(); ?>

			<div class="archives-list">

				<h3><span><?php _e( '01. ', 'designer' ); ?></span><?php _e( 'Site Map', 'designer' ); ?></h3>

				<ul><?php wp_list_pages( 'title_li=' ); ?></ul>

			</div><!-- END .archives-list -->

		</article>

	</div>

<?php
endwhile;
wp_reset_postdata();  // THE LOOP
?>

<?php
get_footer();
