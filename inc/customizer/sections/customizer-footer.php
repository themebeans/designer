<?php
/**
 * Identity Customizer Section
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


/**
 * Add Section.
 */
$wp_customize->add_section(
	'footer_settings', array(
		'title' => esc_html__( 'Footer', 'designer' ),
		'panel' => 'designer__style-editor',
	)
);

/**
 * Settings and Controls.
 */
$wp_customize->add_setting(
	'footer_colophon', array(
		'default'           => designer_defaults( 'footer_colophon' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'designer_sanitize_html',
	)
);

$wp_customize->add_control(
	'footer_colophon', array(
		'type'        => 'textarea',
		'priority'    => 7,
		'section'     => 'footer_settings',
		'label'       => esc_html__( 'Colophon', 'designer' ),
		'description' => esc_html__( 'Add text to be displayed globally in your website footer.', 'designer' ),
	)
);

$wp_customize->selective_refresh->add_partial(
	'footer_colophon', array(
		'settings'        => 'footer_colophon',
		'selector'        => 'p.colophon',
		'render_callback' => 'designer_footer_copyright_partial',
	)
);

$wp_customize->add_setting(
	'footer_copyright', array(
		'default'           => designer_defaults( 'footer_colophon' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'designer_sanitize_html',
	)
);

$wp_customize->add_control(
	'footer_copyright', array(
		'type'        => 'textarea',
		'section'     => 'footer_settings',
		'label'       => esc_html__( 'Copyright', 'designer' ),
		'description' => esc_html__( 'Customize the footer copyright.', 'designer' ),
	)
);

/**
 * Render the custom more tag for the selective refresh partial.
 *
 * @see tabor_customize_register()
 */
function designer_footer_copyright_partial() {

	$colophon = get_theme_mod( 'footer_colophon' );

	if ( ! $colophon ) {
		return;
	}

	$allowed_html = array(
		'br'     => array(),
		'strong' => array(),
		'em'     => array(),
		'a'      => array(
			'alt'    => array(),
			'href'   => array(),
			'target' => array(),
		),
	);

	$markup = '<p class="colophon">' . wp_kses( $colophon, $allowed_html ) . '</p>';

	return $markup;
}
