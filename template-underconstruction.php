<?php
/**
 * Template Name: Under Construction
 * The template for displaying the under construction page template.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


get_header(); ?>

<div class="entry-content">

		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
endwhile; // THE LOOP
?>

</div><!-- END .entry-content -->

<?php
get_footer();
