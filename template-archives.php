<?php
/**
 * Template Name: Archives
 * The template for displaying the post archives.
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

				<h3><span><?php _e( '01. ', 'designer' ); ?></span><?php _e( 'Last 30 Posts', 'designer' ); ?></h3>

				<ul>
					<?php
					$archive_30 = get_posts( 'numberposts=30' );
					foreach ( $archive_30 as $post ) :
					?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php endforeach; ?>
				</ul>

				<h3><span><?php _e( '02. ', 'designer' ); ?></span><?php _e( 'Monthly Archives', 'designer' ); ?></h3>

				<ul><?php wp_get_archives( 'type=monthly' ); ?></ul>

				<h3><span><?php _e( '03. ', 'designer' ); ?></span><?php _e( 'Category Archives ', 'designer' ); ?></h3>

				<ul><?php wp_list_categories( 'title_li=' ); ?></ul>

			</div><!-- END .archives-list -->

		</article>

	</div>

<?php
endwhile;
wp_reset_postdata();  // THE LOOP
?>

<?php
get_footer();
