<?php
/**
 * Fonts Customizer Section
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


/**
 * Page variables.
 */
$options_pages     = array();
$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
$options_pages[''] = '';
foreach ( $options_pages_obj as $page ) {
	$options_pages[ $page->ID ] = $page->post_title;
}


/**
 * Add Section.
 */
$wp_customize->add_section(
	'designer__style-contact', array(
		'title' => esc_html__( 'Contact', 'designer' ),
		'panel' => 'designer__style-editor',
	)
);


$wp_customize->add_setting(
	'admin_custom_email', array(
		'default'           => '',
		'sanitize_callback' => 'is_email',
	)
);

$wp_customize->add_control(
	'admin_custom_email',
	array(
		'label'   => esc_html__( 'Email Address', 'designer' ),
		'section' => 'designer__style-contact',
		'type'    => 'email',
	)
);

$wp_customize->add_setting( 'link1_page_selector' );

$wp_customize->add_control(
	'link1_page_selector', array(
		'settings' => 'link1_page_selector',
		'label'    => esc_html__( 'Custom Link 1', 'designer' ),
		'section'  => 'designer__style-contact',
		'type'     => 'select',
		'choices'  => $options_pages,
	)
);

$wp_customize->add_setting( 'link2_page_selector' );

$wp_customize->add_control(
	'link2_page_selector', array(
		'settings' => 'link2_page_selector',
		'label'    => esc_html__( 'Custom Link 2', 'designer' ),
		'section'  => 'designer__style-contact',
		'type'     => 'select',
		'choices'  => $options_pages,
	)
);

$wp_customize->add_setting( 'page_selector_feats', array( 'default' => 0 ) );

$wp_customize->add_control(
	'page_selector_feats', array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Link Featured Images', 'designer' ),
		'description' => esc_html__( 'Display page featured images on your custom link blocks.', 'designer' ),
		'section'     => 'designer__style-contact',
	)
);

$wp_customize->add_section(
	'contact_settings_gmap', array(
		'title' => esc_html__( 'Google Map', 'designer' ),
		'panel' => 'designer__style-contact',
	)
);

$wp_customize->add_setting(
	'google_maps_code', array(
		'default'           => '[google_maps id="XXX"]',
		'sanitize_callback' => '',
	)
);

$wp_customize->add_control(
	'google_maps_code', array(
		'label'       => esc_html__( 'Map Shortcode', 'designer' ),
		'section'     => 'designer__style-contact',
		'description' => esc_html__( 'Enter a google map shortcode from the Google Maps Builder plugin.', 'designer' ),
		'type'        => 'text',
	)
);

$wp_customize->add_setting( 'gmap_address', array( 'default' => '350 5th Avenue<br/>New York, NY<br/>10118' ) );

$wp_customize->add_control(
	'gmap_address', array(
		'type'        => 'textarea',
		'section'     => 'designer__style-contact',
		'label'       => esc_html__( 'Map Address', 'designer' ),
		'description' => esc_html__( 'Add an address to be overlaid on the template&#39;s Google map.', 'designer' ),
	)
);
