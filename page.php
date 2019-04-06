<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


get_header();

$content             = $post->post_content;
$page_content_layout = get_post_meta( $post->ID, '_bean_page_content_layout', true );
$page_parallax       = get_post_meta( $post->ID, '_bean_page_parallax', true );

if ( 'off' == $page_parallax ) {
	$page_parallax = 'no-parallax';
} else {
	$page_parallax = null;
}

while ( have_posts() ) :
	the_post();

	if ( has_post_thumbnail() ) {
		echo '<div class="entry-media ' . esc_attr( $page_parallax ) . '">';
			the_post_thumbnail( 'port-full' );
		echo '</div>';
	}

	if ( $content ) { ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class( $page_content_layout . ' ' . $page_parallax ); ?>>

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
	<?php
	}

endwhile;

wp_reset_postdata();

get_footer();
