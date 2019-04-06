<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 	WooThemes
 * @package 	WooCommerce/Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//VIEW COUNTER
designer_set_post_views( get_the_ID() );

get_header( 'shop' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php wc_get_template_part( 'content', 'single-product' ); ?>

	<?php endwhile; // end of the loop. ?>
	
	<div class="sidebar content-left">
		<?php dynamic_sidebar( 'shop-sidebar' ); ?> 
	</div>

<?php get_footer( 'shop' ); ?>
