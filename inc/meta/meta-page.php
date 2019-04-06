<?php
/**
 * The file is for creating the page post type meta.
 * Meta output is defined on the page editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


add_action( 'add_meta_boxes', 'bean_metabox_page' );
function bean_metabox_page() {

	$prefix = '_bean_';

	/*
	===================================================================*/
	/*
	  HERO SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'page-settings',
		'title'    => __( 'Template Settings', 'designer' ),
		'page'     => 'page',
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
				'name' => __( 'Parallax:', 'designer' ),
				'desc' => __( 'Enable the parallax animation.', 'designer' ),
				'id'   => $prefix . 'page_parallax',
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
			array(
				'name'    => __( 'Page Layout:', 'designer' ),
				'desc'    => __( 'Select the text alignment style for this page.', 'designer' ),
				'id'      => $prefix . 'page_content_layout',
				'type'    => 'select',
				'std'     => 'content-left',
				'options' => array(
					'content-right'     => __( 'Content Right', 'designer' ),
					'content-left'      => __( 'Content Left', 'designer' ),
					'content-fullwidth' => __( 'Fullwidth', 'designer' ),
				),
			),
		),
	);
	bean_add_meta_box( $meta_box );

} // END function bean_metabox_page()
