<?php

/**
 * Define metabox field for sliders
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'tokoo_metabox_options', 'pustaka_sliders_metabox' );
function pustaka_sliders_metabox( $metaboxes ) {

	$metaboxes[]    = array(
		'id'        => 'pustaka_sliders_details',
		'title'     => esc_html__( 'Sliders Details', 'pustaka' ),
		'post_type' => 'tokoo-slider',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			array(
				'name'  => 'slider_section',
				'title' => 'Slider Section',
				'icon'  => 'fa fa-cog',
				'fields' => array(
					array(
						'id'				=> 'slides',
						'type'				=> 'group',
						'title'				=> 'Slides Item',
						'button_title'		=> 'Add New',
						'accordion_title' 	=> 'Add New item',
						'fields'			=> array(
							array(
								'id'    	=> 'text_align',
								'type'  	=> 'select',
								'title' 	=> esc_html__( 'Text Align', 'pustaka' ),
								'desc'  	=> esc_html__( 'Select the text align', 'pustaka' ),
								'options'	=> array(
									'right'			=> esc_html__( 'Right', 'pustaka' ),
									'center'		=> esc_html__( 'Center', 'pustaka' ),
									'left'			=> esc_html__( 'Left', 'pustaka' ),
								)
							),
							array(
								'id'    		=> 'slider_image',
								'type'  		=> 'image',
								'title' 		=> esc_html__( 'Slider Image', 'pustaka' ),
								'desc'  		=> esc_html__( 'Select the slider image', 'pustaka' ),
							),
							array(
								'id'    	=> 'slider_title',
								'type'  	=> 'text',
								'title' 	=> esc_html__( 'Slider Title', 'pustaka' ),
								'desc'  	=> esc_html__( 'Enter the title', 'pustaka' ),
							),
							array(
								'id'       => 'slider_content',
								'type'     => 'wysiwyg',
								'title'    => 'Enter the slider content',
								'settings' => array(
									'textarea_rows' => 5,
									'tinymce'       => true,
									'media_buttons' => false,
								)
							),
							array(
								'id'    	=> 'slider_link',
								'type'  	=> 'text',
								'title' 	=> esc_html__( 'Slider Link', 'pustaka' ),
								'desc'  	=> esc_html__( 'Enter the link', 'pustaka' ),
							),
						),
					),
					
				), // end: fields
			), // end: a section
		),
	);

	return $metaboxes;
}