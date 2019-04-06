<?php
/**
 * The file is for creating the portfolio post type meta.
 * Meta output is defined on the portfolio single editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


add_action( 'add_meta_boxes', 'bean_metabox_portfolio' );
function bean_metabox_portfolio() {

	$prefix = '_bean_';

	/*
	===================================================================*/
	/*
	  PORTFOLIO FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'          => 'portfolio-type',
		'title'       => __( 'Portfolio Format', 'designer' ),
		'description' => __( '', 'designer' ),
		'page'        => 'portfolio',
		'context'     => 'side',
		'priority'    => 'core',
		'fields'      => array(
			array(
				'name' => __( 'Gallery', 'designer' ),
				'desc' => __( '', 'designer' ),
				'id'   => $prefix . 'portfolio_type_gallery',
				'type' => 'checkbox',
				'std'  => true,
			),
			array(
				'name' => __( 'Video', 'designer' ),
				'desc' => __( '', 'designer' ),
				'id'   => $prefix . 'portfolio_type_video',
				'type' => 'checkbox',
				'std'  => false,
			),
		),
	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  PORTFOLIO META SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'          => 'portfolio-meta',
		'title'       => __( 'Portfolio Settings', 'designer' ),
		'description' => __( '', 'designer' ),
		'page'        => 'portfolio',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => __( 'Gallery Images:', 'designer' ),
				'desc' => __( 'Upload, reorder and caption the post gallery.', 'designer' ),
				'id'   => $prefix . 'portfolio_upload_images',
				'type' => 'images',
				'std'  => __( 'Browse & Upload', 'designer' ),
			),
			array(
				'name' => __( 'Featured:', 'designer' ),
				'id'   => $prefix . 'portfolio_feature',
				'type' => 'checkbox',
				'desc' => __( 'Feature on the Portfolio Template.', 'designer' ),
				'std'  => true,
			),
			array(
				'name' => __( 'Meta:', 'designer' ),
				'id'   => $prefix . 'portfolio_meta',
				'type' => 'checkbox',
				'desc' => __( 'Display the post meta below.', 'designer' ),
				'std'  => true,
			),
			array(
				'name' => __( 'Title:', 'designer' ),
				'desc' => __( 'Display the title.', 'designer' ),
				'id'   => $prefix . 'portfolio_title',
				'type' => 'checkbox',
				'std'  => false,
			),
			array(
				'name' => __( 'Date:', 'designer' ),
				'id'   => $prefix . 'portfolio_date',
				'type' => 'checkbox',
				'desc' => __( 'Display the date.', 'designer' ),
				'std'  => false,
			),
			array(
				'name' => __( 'Views:', 'designer' ),
				'id'   => $prefix . 'portfolio_views',
				'type' => 'checkbox',
				'desc' => __( 'Display the view count.', 'designer' ),
				'std'  => false,
			),
			array(
				'name' => __( 'Categories:', 'designer' ),
				'id'   => $prefix . 'portfolio_cats',
				'type' => 'checkbox',
				'desc' => __( 'Display the portfolio categories.', 'designer' ),
				'std'  => false,
			),
			array(
				'name' => __( 'Tags:', 'designer' ),
				'id'   => $prefix . 'portfolio_tags',
				'type' => 'checkbox',
				'desc' => __( 'Display the portfolio tags.', 'designer' ),
				'std'  => false,
			),
			array(
				'name' => __( 'Role:', 'designer' ),
				'desc' => __( 'Display the role.', 'designer' ),
				'id'   => $prefix . 'portfolio_role',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => __( 'Client:', 'designer' ),
				'desc' => __( 'Display the client meta.', 'designer' ),
				'id'   => $prefix . 'portfolio_client',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => __( 'URL:', 'designer' ),
				'desc' => __( 'Display a URL to link to.', 'designer' ),
				'id'   => $prefix . 'portfolio_url',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => __( 'External URL:', 'designer' ),
				'desc' => __( 'Link this portfolio post to an external URL. For example, link this post to your Behance portfolio post.', 'designer' ),
				'id'   => $prefix . 'portfolio_external_url',
				'type' => 'text',
				'std'  => '',
			),
		),
	);
	bean_add_meta_box( $meta_box );

	/*
	===================================================================*/
	/*
	  AUDIO POST FORMAT SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'       => 'bean-meta-box-portfolio-audio',
		'title'    => __( 'Audio Settings', 'designer' ),
		'page'     => 'portfolio',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'MP3 File URL:', 'designer' ),
				'desc' => __( '', 'designer' ),
				'id'   => $prefix . 'audio_mp3',
				'type' => 'file',
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
		'id'       => 'bean-meta-box-portfolio-video',
		'title'    => __( 'Video Settings', 'designer' ),
		'page'     => 'portfolio',
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'name' => __( 'Embed 1:', 'designer' ),
				'desc' => __( 'Insert your embeded code here.', 'designer' ),
				'id'   => $prefix . 'portfolio_embed_code',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => __( 'Embed 2:', 'designer' ),
				'desc' => __( 'Insert your embeded code here.', 'designer' ),
				'id'   => $prefix . 'portfolio_embed_code_2',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => __( 'Embed 3:', 'designer' ),
				'desc' => __( 'Insert your embeded code here.', 'designer' ),
				'id'   => $prefix . 'portfolio_embed_code_3',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => __( 'Embed 4:', 'designer' ),
				'desc' => __( 'Insert your embeded code here.', 'designer' ),
				'id'   => $prefix . 'portfolio_embed_code_4',
				'type' => 'textarea',
				'std'  => '',
			),
			array(
				'name' => __( 'Video Shortcodes:', 'designer' ),
				'desc' => __( 'Insert any <a target="blank" href="https://codex.wordpress.org/Video_Shortcode">video shortcodes</a> here.', 'designer' ),
				'id'   => $prefix . 'portfolio_video_shortcodes',
				'type' => 'textarea',
				'std'  => '',
			),
		),

	);
	bean_add_meta_box( $meta_box );
} // END function bean_metabox_portfolio()
