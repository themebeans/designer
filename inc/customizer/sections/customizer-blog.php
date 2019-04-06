<?php
/**
 * Blog Customizer Section
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


/**
 * Add Section.
 */
$wp_customize->add_section(
	'blog_settings', array(
		'title' => esc_html__( 'Blog', 'designer' ),
		'panel' => 'designer__style-editor',
	)
);

/**
 * Settings and Controls.
 */
$wp_customize->add_setting(
	'post_views', array(
		'default'           => designer_defaults( 'post_views' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'designer_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'post_views', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Views', 'designer' ),
		'section' => 'blog_settings',
	)
);

$wp_customize->add_setting(
	'post_categories', array(
		'default'           => designer_defaults( 'post_categories' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'designer_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'post_categories', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Categories', 'designer' ),
		'section' => 'blog_settings',
	)
);

$wp_customize->add_setting(
	'post_tags', array(
		'default'           => designer_defaults( 'post_tags' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'designer_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'post_tags', array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Enable Tags', 'designer' ),
		'section' => 'blog_settings',
	)
);

$wp_customize->add_setting(
	'custom_more_tag', array(
		'default'           => designer_defaults( 'custom_more_tag' ),
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_html',
	)
);

$wp_customize->add_control(
	'custom_more_tag', array(
		'label'       => esc_html__( 'More Link', 'designer' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Customize the standard WordPress more-tag text on the blog index pages.', 'designer' ),
		'type'        => 'text',
	)
);
