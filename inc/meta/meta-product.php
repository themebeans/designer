<?php
/**
 * The file is for creating the page post type meta.
 * Meta output is defined on the page editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


add_action( 'add_meta_boxes', 'bean_metabox_product' );
function bean_metabox_product() {

	$prefix = '_bean_';

	/*
	===================================================================*/
	/*
	  HERO SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'page-settings',
		'title'    => __( 'Template Settings', 'designer' ),
		'page'     => 'product',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'Title:', 'designer' ),
				'desc' => __( 'Display the title.', 'designer' ),
				'id'   => $prefix . 'page_title',
				'type' => 'checkbox',
				'std'  => false,
			),
			array(
				'name' => __( 'Header Tagline:', 'designer' ),
				'desc' => __( 'Insert an optional tagline to output in the page header.', 'designer' ),
				'id'   => $prefix . 'header_tagline',
				'type' => 'textarea',
				'std'  => '',
			),
		),
	);
	bean_add_meta_box( $meta_box );

} // END function bean_metabox_product()
