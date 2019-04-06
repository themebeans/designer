<?php
/**
 * The file is for creating the blog post type meta.
 * Meta output is defined on the page editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


add_action( 'add_meta_boxes', 'bean_metabox_post' );
function bean_metabox_post() {

	$prefix = '_bean_';

	/*
	===================================================================*/
	/*
	  LINK POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-link',
		'title'    => __( 'Link Post Format Settings', 'designer' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'Link Title:', 'designer' ),
				'desc' => __( 'The title for your link.', 'designer' ),
				'id'   => $prefix . 'link_title',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => __( 'Link URL:', 'designer' ),
				'desc' => __( 'ex: https://themebeans.com', 'designer' ),
				'id'   => $prefix . 'link_url',
				'type' => 'text',
				'std'  => 'http://',
			),
		),

	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  QUOTE POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-quote',
		'title'    => __( 'Quote Post Format Settings', 'designer' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'Quote Text:', 'designer' ),
				'desc' => __( 'Insert your quote into this textarea.', 'designer' ),
				'id'   => $prefix . 'quote',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => __( 'Quote Source:', 'designer' ),
				'desc' => __( 'Who said the quote above?', 'designer' ),
				'id'   => $prefix . 'quote_source',
				'type' => 'text',
				'std'  => '',
			),
		),

	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  VIDEO POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-video',
		'title'    => __( 'Video Post Format Settings', 'designer' ),
		'page'     => 'post',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'Embeded Code:', 'designer' ),
				'desc' => __( 'Include your video embed code here.', 'designer' ),
				'id'   => $prefix . 'video_embed',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => __( 'Embeded Video URL:', 'designer' ),
				'desc' => __( 'The direct URL to your embedded video.', 'designer' ),
				'id'   => $prefix . 'video_embed_url',
				'type' => 'text',
				'std'  => 'http://player.vimeo.com/video/42411918',
			),
		),
	);
	bean_add_meta_box( $meta_box );
} // END function bean_metabox_post()
