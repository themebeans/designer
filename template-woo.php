<?php
/**
 * Template Name: WooCommerce Page
 * The template for displaying the under construction page template.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


get_header( 'min' );
?>

<div class="single-product">

	<div class="page product content-left">

		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
endwhile;
?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-link"><span>' . __( 'Pages:', 'designer' ) . '</span>',
				'after'  => '</div>',
			)
		);
?>

	</div><!-- END .entry-content -->

	<div class="sidebar content-left">
		<?php dynamic_sidebar( 'Shop Sidebar' ); ?>
	</div>

</div>

<?php
get_footer( 'min' );
