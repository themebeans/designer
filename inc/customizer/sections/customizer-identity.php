<?php
/**
 * Identity Customizer Section
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


$wp_customize->add_setting(
	'custom_logo_max_width', array(
		'default'           => designer_defaults( 'custom_logo_max_width' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'custom_logo_max_width', array(
			'default'     => designer_defaults( 'custom_logo_max_width' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Max Width', 'designer' ),
			'description' => 'px',
			'section'     => 'title_tagline',
			'priority'    => 9,
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 300,
				'step' => 2,
			),
		)
	)
);

$wp_customize->add_setting(
	'custom_logo_mobile_max_width', array(
		'default'           => designer_defaults( 'custom_logo_mobile_max_width' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'custom_logo_mobile_max_width', array(
			'default'     => designer_defaults( 'custom_logo_mobile_max_width' ),
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Mobile Max Width', 'designer' ),
			'description' => 'px',
			'section'     => 'title_tagline',
			'priority'    => 9,
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 200,
				'step' => 2,
			),
		)
	)
);
