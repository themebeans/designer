<?php
/**
 * Theme Customizer functionality
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


/**
 * Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function designer_customize_register( $wp_customize ) {

	/**
	 * Remove unnecessary controls.
	 */
	$wp_customize->remove_control( 'site_logo_header_text' );
	$wp_customize->remove_control( 'display_header_text' );

	/**
	 * Set transports for Customizer defaults.
	 */
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/**
	 * Add custom controls.
	 */
	require get_parent_theme_file_path( THEMEBEANS_CUSTOM_CONTROLS_DIR . 'class-themebeans-title-control.php' );
	require get_parent_theme_file_path( THEMEBEANS_CUSTOM_CONTROLS_DIR . 'class-themebeans-range-control.php' );

	/**
	 * Site Editor.
	 */
	$wp_customize->add_panel(
		'designer__style-editor', array(
			'title'       => esc_html__( 'Theme Options', 'designer' ),
			'description' => esc_html__( 'Customize various options throughout the theme with the settings within this panel.', 'designer' ),
			'priority'    => 30,
		)
	);

	/**
	 * Add Customizer sections.
	 */
	require get_theme_file_path( '/inc/customizer/sections/customizer-identity.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-header.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-portfolio.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-blog.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-contact.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-footer.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-colors.php' );
	require get_theme_file_path( '/inc/customizer/sections/customizer-fonts.php' );

}
add_action( 'customize_register', 'designer_customize_register', 11 );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 */
function designer_customize_preview_js() {
	wp_enqueue_script( 'designer-customize-preview', get_theme_file_uri( '/assets/js/admin/customize-preview' . DESIGNER_ASSET_SUFFIX . '.js' ), array( 'customize-preview' ), '@@pkg.version', true );
}
add_action( 'customize_preview_init', 'designer_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function designer_customize_controls_js() {
	wp_enqueue_script( 'designer-customize-controls', get_theme_file_uri( '/assets/js/admin/customize-controls' . DESIGNER_ASSET_SUFFIX . '.js' ), array(), '@@pkg.version', true );
}
add_action( 'customize_controls_enqueue_scripts', 'designer_customize_controls_js' );
