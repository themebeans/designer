<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */




if ( ! function_exists( 'designer_jetpack_setup' ) ) :
	function designer_jetpack_setup() {
		/*
		 * Let JetPack manage the site logo.
		 * By adding theme support, we declare that this theme does use the default
		 * JetPack Site Logo functionality, if the module is activated.
		 *
		 * See: http://jetpack.me/support/site-logo/
		 */
		add_image_size( 'designer-logo', 9999, 9999 );

		add_theme_support( 'site-logo', array( 'size' => 'designer-logo' ) );

	}
endif;
add_action( 'after_setup_theme', 'designer_jetpack_setup' );



/**
 * Halves the size of the JetPack site logo to make it retina ready.
 *
 * @param   $html string The rendered site-logo html
 * @param   $logo array The logo-Jetpack object
 * @param   $size string The size of the logo
 * @see     jetpack_the_site_logo filter in Jetpack
 */
function designer_retina_jetpack_site_logo( $html, $logo, $size ) {

	// Checker, comes from jetpack_the_site_logo
	if ( ! jetpack_has_site_logo() ) {
		return $html;
	}

	/*
     * Proceed if the retina_logo Customizer option is selected.
     */
	if ( get_theme_mod( 'retina_logo' ) == true ) :

		// Get the image size
		$imageAttachment = wp_get_attachment_image_src( $logo['id'], $size );

		// Half the image size since we want a retina ready image
		$html = preg_replace( '/width="(\d+)"/i', 'width="' . ( round( $imageAttachment[1] / 2 ) ) . '"', $html );
		$html = preg_replace( '/height="(\d+)"/i', 'height="' . ( round( $imageAttachment[2] / 2 ) ) . '"', $html );

	endif;

	return $html;
}
add_filter( 'jetpack_the_site_logo', 'designer_retina_jetpack_site_logo', 10, 3 );
