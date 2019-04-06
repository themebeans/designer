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
	'designer__style-header', array(
		'title' => esc_html__( 'Header', 'designer' ),
		'panel' => 'designer__style-editor',
	)
);

/**
 * Checkout.
 */
if ( designer_is_woocommerce_activated() ) :

	$wp_customize->add_setting( 'wc_cart_icon', array( 'default' => 0 ) );
	$wp_customize->add_control(
		'wc_cart_icon', array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Enable Cart Icon', 'designer' ),
			'description' => esc_html__( 'Set the WooCommerce cart icon in the theme header.', 'designer' ),
			'section'     => 'designer__style-header',
		)
	);

endif;

/**
 * Settings and Controls.
 */
$wp_customize->add_setting(
	'social_sharing', array(
		'default'           => false,
		'sanitize_callback' => '',
	)
);

$wp_customize->add_control(
	'social_sharing', array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Enable Social', 'designer' ),
		'description' => esc_html__( 'Activate the site-wide social sharing module located in the theme header.', 'designer' ),
		'section'     => 'designer__style-header',
	)
);

$wp_customize->add_setting(
	'twitter_profile', array(
		'default'           => '',
		'sanitize_callback' => '',
	)
);

$wp_customize->add_control(
	'twitter_profile', array(
		'label'       => esc_html__( 'Twitter Username', 'designer' ),
		'description' => esc_html__( 'Enter your Twitter username for the social module.', 'designer' ),
		'type'        => 'text',
		'section'     => 'designer__style-header',
	)
);
