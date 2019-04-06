<?php
/**
 * Portfolio Customizer Section
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


$wp_customize->add_setting(
	'theme_accent_color', array(
		'default'           => '#1856DD',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'theme_accent_color', array(
			'label'    => esc_html__( 'Accent', 'designer' ),
			'section'  => 'colors',
			'settings' => 'theme_accent_color',
		)
	)
);

$wp_customize->add_setting(
	'portfolio_overlay_color', array(
		'default'           => '#181818',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'portfolio_overlay_color', array(
			'label'    => esc_html__( 'Overlay', 'designer' ),
			'section'  => 'colors',
			'settings' => 'portfolio_overlay_color',
		)
	)
);

$wp_customize->add_setting(
	'portfolio_overlay_text_color', array(
		'default'           => '#ffffff',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'portfolio_overlay_text_color', array(
			'label'    => esc_html__( 'Overlay Title', 'designer' ),
			'section'  => 'colors',
			'settings' => 'portfolio_overlay_text_color',
		)
	)
);

$wp_customize->add_setting(
	'portfolio_overlay_opacity', array(
		'default'   => designer_defaults( 'portfolio_overlay_opacity' ),
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'portfolio_overlay_opacity', array(
			'default'     => designer_defaults( 'portfolio_overlay_opacity' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Overlay Opacity', 'designer' ),
			'description' => '%',
			'section'     => 'colors',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'portfolio_overlay_text_opacity', array(
		'default'   => designer_defaults( 'portfolio_overlay_text_opacity' ),
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'portfolio_overlay_text_opacity', array(
			'default'     => designer_defaults( 'portfolio_overlay_text_opacity' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Overlay Title Opacity', 'designer' ),
			'description' => '%',
			'section'     => 'colors',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	)
);
