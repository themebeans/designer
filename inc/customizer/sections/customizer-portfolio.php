<?php
/**
 * Portfolio Customizer Section
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


/**
 * Add Portfolio Section.
 */
$wp_customize->add_section(
	'designer__style-portfolio', array(
		'title' => esc_html__( 'Portfolio', 'designer' ),
		'panel' => 'designer__style-editor',
	)
);

/**
 * Settings and Controls.
 */
$wp_customize->add_setting( 'portfolio_posts_count', array( 'default' => '' ) );

$wp_customize->add_control(
	'portfolio_posts_count', array(
		'label'       => esc_html__( 'Portfolio Count', 'designer' ),
		'section'     => 'designer__style-portfolio',
		'description' => esc_html__( 'Set the number of posts to display on the portfolio template. Recommended: 8 - 16', 'designer' ),
		'type'        => 'text',
	)
);

$wp_customize->add_setting( 'portfolio_css_filter', array( 'default' => 'none' ) );

$wp_customize->add_control(
	'portfolio_css_filter', array(
		'type'    => 'select',
		'label'   => esc_html__( 'Portfolio Style Filter', 'designer' ),
		'section' => 'designer__style-portfolio',
		'choices' => array(
			'none'       => 'None',
			'grayscale'  => 'Black & White',
			'sepia'      => 'Sepia Tone',
			'saturation' => 'High Saturation',
		),
	)
);

$wp_customize->add_setting( 'portfolio_flyout', array( 'default' => 0 ) );

$wp_customize->add_control(
	'portfolio_flyout', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Portfolio Flyout', 'designer' ),
		'section' => 'designer__style-portfolio',
	)
);

$wp_customize->add_setting( 'portfolio_sorting', array( 'default' => 0 ) );

$wp_customize->add_control(
	'portfolio_sorting', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Portfolio Flyout Sorting', 'designer' ),
		'section' => 'designer__style-portfolio',
	)
);

$wp_customize->add_setting( 'portfolio_parallax', array( 'default' => 0 ) );

$wp_customize->add_control(
	'portfolio_parallax', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Parallax', 'designer' ),
		'section' => 'designer__style-portfolio',
	)
);

$wp_customize->add_setting( 'loop_overlay', array( 'default' => 0 ) );

$wp_customize->add_control(
	'loop_overlay', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Overlay', 'designer' ),
		'section' => 'designer__style-portfolio',
	)
);

$wp_customize->add_setting( 'loop_categories', array( 'default' => 0 ) );

$wp_customize->add_control(
	'loop_categories', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Overlay Categories', 'designer' ),
		'section' => 'designer__style-portfolio',
	)
);

$wp_customize->add_setting( 'portfolio_lazyload', array( 'default' => 0 ) );

$wp_customize->add_control(
	'portfolio_lazyload', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Single Lazy Loading', 'designer' ),
		'section' => 'designer__style-portfolio',
	)
);

$wp_customize->add_setting( 'portfolio_lightbox', array( 'default' => 0 ) );

$wp_customize->add_control(
	'portfolio_lightbox', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Single Lightbox', 'designer' ),
		'section' => 'designer__style-portfolio',
	)
);

$wp_customize->add_setting( 'display_pagination', array( 'default' => 0 ) );

$wp_customize->add_control(
	'display_pagination', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Single Pagination', 'designer' ),
		'section' => 'designer__style-portfolio',
	)
);

$wp_customize->add_setting( 'portfolio_pagination_images', array( 'default' => 0 ) );

$wp_customize->add_control(
	'portfolio_pagination_images', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Single Pagination Images', 'designer' ),
		'section' => 'designer__style-portfolio',
	)
);

$wp_customize->add_setting( 'portfolio_cta', array( 'default' => 0 ) );

$wp_customize->add_control(
	'portfolio_cta', array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Enable Portfolio CTA', 'designer' ),
		'description' => esc_html__( 'Activate the single portfolio call to action button, which links to the project query contact form.', 'designer' ),
		'section'     => 'designer__style-portfolio',
	)
);

$wp_customize->add_setting(
	'portfolio_cta_btn_text', array(
		'default'           => designer_defaults( 'portfolio_cta_btn_text' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'designer_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'portfolio_cta_btn_text', array(
		'label'   => esc_html__( 'CTA Button Text', 'designer' ),
		'section' => 'designer__style-portfolio',
		'type'    => 'text',
	)
);

$wp_customize->add_setting(
	'portfolio_form_header', array(
		'default'           => designer_defaults( 'portfolio_form_header' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'designer_sanitize_html',
	)
);

$wp_customize->add_control(
	'portfolio_form_header',
	array(
		'label'   => esc_html__( 'CTA Form Header', 'designer' ),
		'section' => 'designer__style-portfolio',
		'type'    => 'text',
	)
);

$wp_customize->add_setting(
	'portfolio_cta_subject1', array(
		'default'           => designer_defaults( 'portfolio_cta_subject1' ),
		'sanitize_callback' => 'designer_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'portfolio_cta_subject1',
	array(
		'label'   => esc_html__( 'CTA Form Subjects', 'designer' ),
		'section' => 'designer__style-portfolio',
		'type'    => 'text',
	)
);

$wp_customize->add_setting(
	'portfolio_cta_subject2', array(
		'default'           => designer_defaults( 'portfolio_cta_subject2' ),
		'sanitize_callback' => 'designer_sanitize_nohtml',
	)
);

$wp_customize->add_control(
	'portfolio_cta_subject2',
	array(
		'label'   => esc_html__( '', 'designer' ),
		'section' => 'designer__style-portfolio',
		'type'    => 'text',
	)
);

$wp_customize->add_setting( 'portfolio_cta_subject3', array( 'default' => '' ) );

$wp_customize->add_control(
	'portfolio_cta_subject3',
	array(
		'label'   => esc_html__( '', 'designer' ),
		'section' => 'designer__style-portfolio',
		'type'    => 'text',
	)
);

$wp_customize->add_setting( 'portfolio_cta_subject4', array( 'default' => '' ) );

$wp_customize->add_control(
	'portfolio_cta_subject4',
	array(
		'label'   => esc_html__( '', 'designer' ),
		'section' => 'designer__style-portfolio',
		'type'    => 'text',
	)
);

$wp_customize->add_setting( 'portfolio_cta_subject5', array( 'default' => '' ) );

$wp_customize->add_control(
	'portfolio_cta_subject5',
	array(
		'label'   => esc_html__( '', 'designer' ),
		'section' => 'designer__style-portfolio',
		'type'    => 'text',
	)
);

$wp_customize->add_setting( 'portfolio_cta_subject6', array( 'default' => '' ) );

$wp_customize->add_control(
	'portfolio_cta_subject6', array(
		'label'   => esc_html__( '', 'designer' ),
		'section' => 'designer__style-portfolio',
		'type'    => 'text',
	)
);
