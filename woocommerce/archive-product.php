<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

// ENABLE/DISABLE PORTFOLIO PARALLAX EFFECT
if ( get_theme_mod( 'portfolio_parallax' ) == true ) {
	$portfolio_parallax = '';
} else {
	$portfolio_parallax = 'no-parallax';
} ?>

<div id="projects" class="projects offset-projects <?php echo esc_html( $portfolio_parallax ); ?>">

	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
?>

			<?php wc_get_template_part( 'content', 'product' ); ?>

		<?php endwhile; // end of the loop. ?>

		<?php if ( get_theme_mod( 'portfolio_flyout' ) == true ) { ?>

			<article class="project square-link" id="flyout-toggle">
				<div class="thumb">
					<h3><?php echo _e( 'View more', 'designer' ); ?><span class="arrow"></span></h3>
					<img src="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/placeholder.png' ) ); ?>" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
					<div class="overlay"></div>
				</div>
			</article>

		<?php } ?>

	<?php
	elseif ( ! woocommerce_product_subcategories(
		array(
			'before' => woocommerce_product_loop_start( false ),
			'after'  => woocommerce_product_loop_end( false ),
		)
	) ) :
?>

		<?php wc_get_template( 'loop/no-products-found.php' ); ?>

	<?php endif; ?>

</div>

<?php


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' ); ?>
