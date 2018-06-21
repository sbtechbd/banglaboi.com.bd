<?php

/**
 * Define metabox field for pages
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'tokoo_metabox_options', 'pustaka_pages_metabox' );
function pustaka_pages_metabox( $metaboxes ) {

	$metaboxes[]    = array(
		'id'        => 'pustaka_contact_maps',
		'title'     => esc_html__( 'Contact Maps', 'pustaka' ),
		'post_type' => 'page',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			array(
				'name'  => 'contact_form_section',
				'title' => esc_html__( 'Contact Form', 'pustaka' ),
				'icon'  => 'fa fa-envelope',
				'fields' => array(
					array(
						'id'    	=> 'contact_form',
						'type'  	=> 'select',
						'title' 	=> esc_html__( 'Select Contact Form', 'pustaka' ),
						'desc'  	=> esc_html__( 'Type the contact form from ninja form plugin', 'pustaka' ),
						'options'	=> pustaka_get_cf7_list_form(),
					),

				), // end: fields
			), // end: a section

			array(
				'name'  => 'contact_map_section',
				'title' => esc_html__( 'Contact Maps', 'pustaka' ),
				'icon'  => 'fa fa-map-marker',
				'fields' => array(
					array(
						'id'    => 'latitude',
						'type'  => 'text',
						'title' => esc_html__( 'Latitude', 'pustaka' ),
						'desc'  => esc_html__( 'Type the location Latitude', 'pustaka' ),
					),
					array(
						'id'    => 'longitude',
						'type'  => 'text',
						'title' => esc_html__( 'Longitude', 'pustaka' ),
						'desc'  => esc_html__( 'Type the location Longitude', 'pustaka' ),
					),
					array(
						'id'    	=> 'zoom',
						'type'  	=> 'number',
						'title' 	=> esc_html__( 'Zoom', 'pustaka' ),
						'desc'  	=> esc_html__( 'Type the map zoom value', 'pustaka' ),
						'default'	=> 15
					),
					array(
						'id'    	=> 'marker_title',
						'type'  	=> 'text',
						'title' 	=> esc_html__( 'Marker Title', 'pustaka' ),
						'desc'  	=> esc_html__( 'Type the marker title', 'pustaka' ),
					),
					array(
						'id'    	=> 'marker_content',
						'type'  	=> 'textarea',
						'title' 	=> esc_html__( 'Marker Content', 'pustaka' ),
						'desc'  	=> esc_html__( 'Type the marker content', 'pustaka' ),
					),
					array(
						'id'    	=> 'tagline',
						'type'  	=> 'textarea',
						'title' 	=> esc_html__( 'Company Tagline', 'pustaka' ),
						'desc'  	=> esc_html__( 'Type the company tagline', 'pustaka' ),
					),
					array(
						'id'    	=> 'phone_number',
						'type'  	=> 'text',
						'title' 	=> esc_html__( 'Phone Number', 'pustaka' ),
						'desc'  	=> esc_html__( 'Type the phone number', 'pustaka' ),
					),
					array(
						'id'    	=> 'address',
						'type'  	=> 'wysiwyg',
						'title' 	=> esc_html__( 'Company Address', 'pustaka' ),
						'desc'  	=> esc_html__( 'Type the company address', 'pustaka' ),
						'settings' => array(
							'textarea_rows'	=> 5,
							'tinymce'		=> false,
							'media_buttons'	=> false,
						)
					),
					array(
						'id'    	=> 'map_style',
						'type'  	=> 'textarea',
						'title' 	=> esc_html__( 'Map Style', 'pustaka' ),
						'desc'  	=> esc_html__( 'Paste the map style get from here https://snazzymaps.com/', 'pustaka' ),
					),

				), // end: fields
			), // end: a section
		),
	);

	$metaboxes[]    = array(
		'id'        => 'pustaka_page_details',
		'title'     => esc_html__( 'Page Details', 'pustaka' ),
		'post_type' => 'page',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			array(
				'name'  => 'page_section',
				'title' => esc_html__( 'Page Section', 'pustaka' ),
				'icon'  => 'fa fa-cog',
				'fields' => array(
					array(
						'id'    	=> 'per_page',
						'type'  	=> 'number',
						'title' 	=> esc_html__( 'Post Per Page', 'pustaka' ),
						'desc'  	=> esc_html__( 'Enter how many item will be displayed', 'pustaka' ),
						'default' 	=> 12,
					),
					array(
						'id'		=> 'perpage_page_subtitle',
						'type'		=> 'text',
						'title'		=> esc_html__( 'Page Section SubTitle', 'pustaka' ),
					),
					array(
						'id'		=> 'perpage_page_title_background',
						'type'		=> 'image',
						'title'		=> esc_html__( 'Page Title Background Image', 'pustaka' ),
						'desc'		=> esc_html__( 'preferred size (1600x6000)', 'pustaka' )
					),
					array(
						'id'		=> 'disable_header',
						'type'		=> 'switcher',
						'title'		=> esc_html__( 'Disable Header', 'pustaka' ),
						'desc'		=> esc_html__( 'Only recommended for page template composer', 'pustaka' )
					),
					array(
						'id'    	=> 'header_type',
						'type'  	=> 'select',
						'title' 	=> esc_html__( 'Header Type', 'pustaka' ),
						'desc'  	=> esc_html__( 'Choose header type', 'pustaka' ),
						'options'	=> array(
							'type_1' 	=> esc_html__( 'Type 1 - Default', 'pustaka' ),
							'type_2' 	=> esc_html__( 'Type 2', 'pustaka' ),
						),
					),
					array(
						'id'		=> 'disable_footer',
						'type'		=> 'switcher',
						'title'		=> esc_html__( 'Disable Footer', 'pustaka' ),
						'desc'		=> esc_html__( 'Only recommended for page template composer', 'pustaka' )
					),
					array(
						'id'    	=> 'footer_page',
						'type'  	=> 'select',
						'title' 	=> esc_html__( 'Footer page', 'pustaka' ),
						'desc'  	=> esc_html__( 'Choose footer page', 'pustaka' ),
						'options'	=> pustaka_get_posts( 'page', esc_html__( 'Default Footer', 'pustaka' ) ),
					),
				), // end: fields
			), // end: a section
		),
	);

	$metaboxes[]    = array(
		'id'        => 'pustaka_layouts_details',
		'title'     => esc_html__( 'The Layouts Details', 'pustaka' ),
		'post_type' => 'page',
		'context'   => 'side',
		'priority'  => 'low',
		'sections'  => array(
			array(
				'name'  => 'the_layouts_section',
				'title' => esc_html__( 'Layouts Section', 'pustaka' ),
				'icon'  => 'fa fa-cog',
				'fields' => array(
					array(
						'id'		=> 'theme_layouts',
						'type'		=> 'image_select',
						'title' 	=> 'Choose Layout',
						'options' 	=> array(
							'one-column' 		=> get_template_directory_uri() .'/assets/img/layouts/one-column.png',
							'left-sidebar'		=> get_template_directory_uri() .'/assets/img/layouts/sidebar-left.png',
							'right-sidebar' 	=> get_template_directory_uri() .'/assets/img/layouts/sidebar-right.png',
						),
						'default'   => 'one-column',
					),
					array(
						'id'    	=> 'custom_sidebar',
						'type'  	=> 'select',
						'title' 	=> esc_html__( 'Custom Sidebar', 'pustaka' ),
						'desc'  	=> esc_html__( 'Choose custom sidebar for this page', 'pustaka' ),
						'options'	=> pustaka_get_all_sidebars(),
					),
				), // end: fields
			), // end: a section
		),
	);

	return $metaboxes;
}