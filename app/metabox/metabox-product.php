<?php

/**
 * Define metabox field for pages
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'tokoo_metabox_options', 'pustaka_product_metabox' );
function pustaka_product_metabox( $metaboxes ) {

	$metaboxes[]    = array(
		'id'        => 'pustaka_product_image_dimension',
		'title'     => esc_html__( 'Custom Book Image Dimension', 'pustaka' ),
		'post_type' => 'product',
		'context'   => 'side',
		'priority'  => 'low',
		'sections'  => array(
			array(
				'name'  => 'product_section',
				'title' => esc_html__( 'Product Image Section', 'pustaka' ),
				'icon'  => 'fa fa-cog',
				'fields' => array(
					array(
						'id'    	=> 'width',
						'type'  	=> 'number',
						'title' 	=> esc_html__( 'Image Width', 'pustaka' ),
					),
					array(
						'id'    	=> 'height',
						'type'  	=> 'number',
						'title' 	=> esc_html__( 'Image Height', 'pustaka' ),
					),
				), // end: fields
			), // end: a section
		),
	);

	return $metaboxes;
}