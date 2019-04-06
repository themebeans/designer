<?php
/**
 * The file is for creating the team post type meta.
 * Meta output is defined on the team single editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


add_action( 'add_meta_boxes', 'bean_metabox_team' );
function bean_metabox_team() {

	$prefix = '_bean_';

	/*
	===================================================================*/
	/*
	  TEAM META SETTINGS
	/*===================================================================*/
	$meta_box = array(
		'id'          => 'portfolio-meta',
		'title'       => __( 'Team Member Settings', 'designer' ),
		'description' => __( '', 'designer' ),
		'page'        => 'team',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'name' => __( 'Role:', 'designer' ),
				'desc' => __( 'Display this team member&#39;s position on the team.', 'designer' ),
				'id'   => $prefix . 'team_role',
				'type' => 'text',
				'std'  => '',
			),
			array(
				'name' => __( 'Quote:', 'designer' ),
				'desc' => __( 'Display a small quote on image hover.', 'designer' ),
				'id'   => $prefix . 'team_quote',
				'type' => 'text',
				'std'  => '',
			),
		),
	);
	bean_add_meta_box( $meta_box );

} // END function bean_metabox_team()
