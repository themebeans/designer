<?php
/**
 * Admin functions for Theme Customizer custom fonts
 * This file hooks with the bean-admin-fonts-library.php file, in order to achieve
 * custom fonts using Google Fonts.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


// GENERATE FRIENDLY NAME
function bean_font_family( $font ) {
	$family = str_replace( ' ', '+', $font );
	return $family;
} //END bean_font_family($font)



/*
===================================================================*/
/*
  ENQUEUE STANDARD FONTS AND CREATE ARRAY
/*===================================================================*/
function bean_enqueue_fonts() {
	 // DEFAULTS
	$default = array(
		'default',
		'Default',
		'arial',
		'Arial',
		'courier',
		'Courier',
		'verdana',
		'Verdana',
		'trebuchet',
		'Trebuchet',
		'georgia',
		'Georgia',
		'times',
		'Times',
		'tahoma',
		'Tahoma',
		'helvetica',
		'Helvetica',
	);

	// ARRAY
	$fonts = array();

	// ADD IN MORE FONTS HERE, IF THE FONT FAMILY CHANGES IN THE CUSTOMIZER
	$type_select_headings = get_theme_mod( 'type_select_headings' );
	$type_select_body     = get_theme_mod( 'type_select_body' );
	$type_select_nav      = get_theme_mod( 'type_select_nav' );

	if ( $type_select_headings != '' ) {
		$fonts[] = $type_select_headings; }
	if ( $type_select_body != '' ) {
		$fonts[] = $type_select_body; }
	if ( $type_select_nav != '' ) {
		$fonts[] = $type_select_nav; }

	// REMOVE DUPLICATES
	$fonts = array_unique( $fonts );

	// CHECK GOOGLE FONTS AGAINST SYSTEM, CALL ENQUE
	foreach ( $fonts as $font ) {
		// GOOGLE FONTS CHECK
		if ( ! in_array( $font, $default ) ) {
			bean_enqueue_google_fonts( $font );
		} //END if(!in_array($font, $default))
	} //END foreach($fonts as $font)
} //END function bean_enqueue_fonts()
add_action( 'wp_enqueue_scripts', 'bean_enqueue_fonts' );




/*
===================================================================*/
/*
  ENQUEUE GOOGLE FONT
/*===================================================================*/
function bean_enqueue_google_fonts( $font ) {
	$font = explode( ',', $font );
	$font = $font[0];

	// CUSTOM CHECKS FOR CERTAIN FONTS
	if ( $font == 'Open Sans' ) {
		$font = 'Open Sans:300,400,600';
	} else {
		$font = $font . ':400,500,700';
	}

	// FRIENDLY MOD
	$font = str_replace( ' ', '+', $font );

	// CSS ENQUEUE
	wp_enqueue_style( "bean-google-$font", "https://fonts.googleapis.com/css?family=$font", false, null, 'all' );
} //END bean_enqueue_google_fonts($font)
