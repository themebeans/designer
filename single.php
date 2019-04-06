<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


get_header();

// VIEW COUNTER
designer_set_post_views( get_the_ID() );

$format = get_post_format();
if ( false === $format ) {
	$format = 'standard'; } ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
?>

		<?php get_template_part( 'template-parts/post-loop' ); ?>

		<?php
		wp_link_pages(
			array(
				'before'         => '<p><strong>' . __( 'Pages:', 'designer' ) . '</strong> ',
				'after'          => '</p>',
				'next_or_number' => 'number',
			)
		);
?>

	<?php
	endwhile;
endif;
wp_reset_postdata();
?>

<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
	comments_template();
endif;
?>

<?php
get_footer();
