<?php

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// Color Section
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'pustaka_color_settings_data' );
function pustaka_color_settings_data( $customizer_options ) {

	/* ==================================================== *
	 *  Accent Color Settings Section | No Panel            *
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'pustaka_color_settings',
		'label'		=> esc_html__( 'Color Settings', 'pustaka' ),
		'priority'	=> 10,
		'panel'		=> 'pustaka_panel_settings',
		'type' 		=> 'section' 
	);

		/* ============================================================ *
		 *  Accent Color Settings Data                                  *
		 * ============================================================ */
		$customizer_options[] = array(
			'slug'		=> 'pustaka_accent_color_1',
			'default'   => '#DB1037',
			'priority'  => 1,
			'label'     => esc_html__( 'Accent Color 1', 'pustaka' ),
			'section'	=> 'pustaka_color_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color', 
		);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_accent_color_2',
			'default'   => '#CD40E6',
			'priority'  => 2,
			'label'     => esc_html__( 'Accent Color 2', 'pustaka' ),
			'section'	=> 'pustaka_color_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color', 
		);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_body_color',
			'default'	=> '#f6f6f6',
			'priority'	=> 3,
			'label'		=> esc_html__( 'Body Background Color', 'pustaka' ),
			'section'	=> 'pustaka_color_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color',
		);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_heading_color',
			'default'   => '#2B2B2B',
			'priority'  => 4,
			'label'     => esc_html__( 'Heading Color', 'pustaka' ),
			'section'	=> 'pustaka_color_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color'
		);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_text_color',
			'default'   => '#616161',
			'priority'  => 5,
			'label'     => esc_html__( 'Text Color', 'pustaka' ),
			'section'	=> 'pustaka_color_settings',
			'output'	=> false,
			'transport'	=> 'refresh',
			'type'      => 'color'
		);


	return $customizer_options;
}

