<?php
/**
 * Fonts Customizer Section
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


/**
 * Fonts variables.
 */
$fonts = bean_font_library();

$font_size_range          = array(
	'min'  => '10',
	'max'  => '80',
	'step' => '1',
);
$font_lineheight_range    = array(
	'min'  => '10',
	'max'  => '80',
	'step' => '1',
);
$font_letterspacing_range = array(
	'min'  => '-5',
	'max'  => '20',
	'step' => '1',
);

/**
 * Add Section.
 */
$wp_customize->add_section(
	'designer__style-fonts', array(
		'title' => esc_html__( 'Fonts', 'designer' ),
		'panel' => 'designer__style-editor',
	)
);

/**
 * Settings and Controls.
 */
$wp_customize->add_setting( 'type_select_headings', array( 'default' => '' ) );
$wp_customize->add_control(
	'type_select_headings',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Heading Font', 'designer' ),
		'description' => esc_html__( 'Customize the header font.', 'designer' ),
		'section'     => 'designer__style-fonts',
		'choices'     => $fonts,
	)
);

$wp_customize->add_setting(
	'type_slider_headings_size', array(
		'default'           => '24',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'type_slider_headings_size', array(
			'default'     => '24',
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Font Size', 'designer' ),
			'description' => 'px',
			'section'     => 'designer__style-fonts',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 80,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'type_slider_headings_lineheight', array(
		'default'           => '38',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'type_slider_headings_lineheight', array(
			'default'     => '38',
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Line Height', 'designer' ),
			'description' => 'px',
			'section'     => 'designer__style-fonts',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 80,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'type_slider_headings_letterspacing', array(
		'default'           => '0',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'type_slider_headings_letterspacing', array(
			'default'     => '0',
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'designer' ),
			'description' => 'px',
			'section'     => 'designer__style-fonts',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting( 'type_select_body', array( 'default' => '' ) );
$wp_customize->add_control(
	'type_select_body',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Body Font', 'designer' ),
		'section'     => 'designer__style-fonts',
		'description' => esc_html__( 'Customize the primary body text.', 'designer' ),
		'choices'     => $fonts,
	)
);

$wp_customize->add_setting(
	'type_slider_body_size', array(
		'default'           => '17',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'type_slider_body_size', array(
			'default'     => '17',
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Font Size', 'designer' ),
			'description' => 'px',
			'section'     => 'designer__style-fonts',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 80,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'type_slider_body_lineheight', array(
		'default'           => '30',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'type_slider_body_lineheight', array(
			'default'     => '30',
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Line Height', 'designer' ),
			'description' => 'px',
			'section'     => 'designer__style-fonts',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 80,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'type_slider_body_letterspacing', array(
		'default'           => '0',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'type_slider_body_letterspacing', array(
			'default'     => '0',
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'designer' ),
			'description' => 'px',
			'section'     => 'designer__style-fonts',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting( 'type_select_nav', array( 'default' => '' ) );
$wp_customize->add_control(
	'type_select_nav', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Menu Font', 'designer' ),
		'description' => esc_html__( 'Customize the header menu font.', 'designer' ),
		'section'     => 'designer__style-fonts',
		'choices'     => $fonts,
	)
);


$wp_customize->add_setting(
	'type_slider_nav_size', array(
		'default'           => '17',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'type_slider_nav_size', array(
			'default'     => '17',
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Font Size', 'designer' ),
			'description' => 'px',
			'section'     => 'designer__style-fonts',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 80,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'type_slider_nav_lineheight', array(
		'default'           => '30',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'type_slider_nav_lineheight', array(
			'default'     => '30',
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Line Height', 'designer' ),
			'description' => 'px',
			'section'     => 'designer__style-fonts',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 80,
				'step' => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'type_slider_nav_letterspacing', array(
		'default'           => '0',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new ThemeBeans_Range_Control(
		$wp_customize, 'type_slider_nav_letterspacing', array(
			'default'     => '0',
			'type'        => 'themebeans-range',
			'label'       => esc_html__( 'Letter Spacing', 'designer' ),
			'description' => 'px',
			'section'     => 'designer__style-fonts',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 20,
				'step' => 1,
			),
		)
	)
);


