<?php
/**
 * WooCommerce Compatibility File
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


/**
 * Remove standard WooCommerce CSS.
 */
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Contextual Hook for WooCommerce support.
 */
if ( ! function_exists( 'designer_do_contextual_hook' ) ) {
	function designer_do_contextual_hook( $args = '' ) {
		do_action( $args );
	}
}

function designer_nav_toggles() {
	designer_do_contextual_hook( 'designer_nav_toggles' );
}

/**
 * Disable the WooCommerce default lightbox styling.
 */
function designer_woocomerce_dequeue_pswp_lightbox_style() {
	wp_dequeue_style( 'photoswipe-default-skin' );
}
add_action( 'wp_enqueue_scripts', 'designer_woocomerce_dequeue_pswp_lightbox_style', 20 );

/**
 * Exclude the featured image from appearing in the product gallery, if there's a product gallery.
 *
 * @param array $html Array of html to output for the product gallery.
 * @param array $attachment_id ID of each image variables.
 */
function designer_remove_featured_image( $html, $attachment_id ) {

	global $post, $product;

	// Get the IDs.
	$attachment_ids = $product->get_gallery_image_ids();

	// If there are none, go ahead and return early - with the featured image included in the gallery.
	if ( ! $attachment_ids ) {
		return $html;
	}

	// Look for the featured image.
	$featured_image = get_post_thumbnail_id( $post->ID );

	// If there is one, exclude it from the gallery.
	if ( $attachment_id == $featured_image ) {
		$html = '';
	}

	return $html;
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'designer_remove_featured_image', 10, 2 );

/**
 * Filter Flexslider to use navigation, instead of images.
 *
 * @param array $array Slider variables.
 */
function designer_woocommerce_single_product_carousel_options( $array ) {
	$array['controlNav'] = true;
	return $array;
}
add_filter( 'woocommerce_single_product_carousel_options', 'designer_woocommerce_single_product_carousel_options' );

/**
 * Only show one related product.
 */
function designer_change_number_related_products( $args ) {
	$args['posts_per_page'] = 1; // # of related products
	$args['columns']        = 1; // # of columns per row
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'designer_change_number_related_products' );

/**
 * Change text strings
 *
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function designer_woocommerce_related_text( $translated_text, $text, $domain ) {

	switch ( $translated_text ) {
		case 'Related products':
			$translated_text = apply_filters( 'designer_related_product_text', esc_html__( 'Related...', 'designer' ) );
			break;
	}

	return $translated_text;
}
add_filter( 'gettext', 'designer_woocommerce_related_text', 20, 3 );


/*
===================================================================*/
/*
 ADD CHECKOUT LINK TO HEADER TOGGLES
/*===================================================================*/
function bean_woocommerce_checkout_btn() {

	if ( ! designer_is_woocommerce_activated() ) {
		return;
	}

	if ( true === get_theme_mod( 'wc_cart_icon' ) ) {
		global $woocommerce;
		echo '<a id="nav-cart-toggle" class="nav-cart-toggle" href="' . esc_url( wc_get_checkout_url() ) . '" title="' . esc_attr__( 'Checkout' ) . '">' . esc_html__( 'Checkout' ) . '</a>';
	}
}
add_action( 'designer_nav_toggles', 'bean_woocommerce_checkout_btn' );



/*
===================================================================*/
/*
 CREATE SHOP SIDEBAR WIDGET AREA
/*===================================================================*/
if ( ! function_exists( 'bean_woocommerce_areas_init' ) ) {
	function bean_woocommerce_areas_init() {

		register_sidebar(
			array(
				'name'          => __( 'Shop Sidebar', 'designer' ),
				'description'   => __( 'Widget area for the shop single posts.', 'designer' ),
				'id'            => 'shop-sidebar',
				'before_widget' => '<div class="widget %2$s clearfix">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			)
		);

	}
	add_action( 'widgets_init', 'bean_woocommerce_areas_init' );
}
