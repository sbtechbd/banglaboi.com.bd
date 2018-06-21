<?php

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// Typography Section
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'pustaka_typography_settings_data' );
function pustaka_typography_settings_data( $customizer_options ) {

	/* ==================================================== *
	 *  Typography Settings Section                         *
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'pustaka_font_settings',
		'label'		=> esc_html__( 'Font Settings', 'pustaka' ),
		'priority'	=> 11,
		'panel'		=> 'pustaka_panel_settings',
		'type' 		=> 'section'
	);

		/* ============================================================ *
		 *  Typography Color Settings Data                              *
		 * ============================================================ */
		$customizer_options[] = array(
			'slug'		=> 'pustaka_global_font_size',
			'default'	=> '16px',
			'priority'	=> 1,
			'label'		=> esc_html__( 'Global Font Size', 'pustaka' ),
			'section'	=> 'pustaka_font_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'text',
		);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_body_font',
			'default'	=> 'Open Sans',
			'priority'	=> 1,
			'label'		=> esc_html__( 'Body Font', 'pustaka' ),
			'section'	=> 'pustaka_font_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'google_font',
			'font_amount'	=> 5000,
		);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_heading_font',
			'default'	=> 'Playfair Display',
			'priority'	=> 2,
			'label'		=> esc_html__( 'Heading Font', 'pustaka' ),
			'section'	=> 'pustaka_font_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'google_font',
			'font_amount'	=> 5000, 
		);

		$customizer_options[] = array(
			'slug'      => 'pustaka_body_font_weight',
			'default'   => '400',
			'priority'  => 3,
			'label'     => esc_html__( 'Body Font Weight', 'pustaka' ),
			'section'   => 'pustaka_font_settings',
			'output'    => 'false',
			'transport' => 'refresh',
			'type'      => 'select',
			'choices'	=> array(
				'300' => '300',
				'400' => '400',
				'600' => '600',
				'700' => '700'
			)
		);

		$customizer_options[] = array(
			'slug'      => 'pustaka_body_letter_spacing',
			'default'   => '0',
			'priority'  => 4,
			'label'     => esc_html__( 'Body Letter Spacing', 'pustaka' ),
			'section'   => 'pustaka_font_settings',
			'output'    => 'false',
			'transport' => 'refresh',
			'type'      => 'text'
		);

		$customizer_options[] = array(
			'slug'      => 'pustaka_body_line_height',
			'default'   => '24px',
			'priority'  => 5,
			'label'     => esc_html__( 'Body Line Height', 'pustaka' ),
			'section'   => 'pustaka_font_settings',
			'output'    => 'false',
			'transport' => 'refresh',
			'type'      => 'text'
		);

		$customizer_options[] = array(
			'slug'      => 'pustaka_heading_font_weight',
			'default'   => '400',
			'priority'  => 6,
			'label'     => esc_html__( 'Heading Font Weight', 'pustaka' ),
			'section'   => 'pustaka_font_settings',
			'output'    => 'false',
			'transport' => 'refresh',
			'type'      => 'select',
			'choices'	=> array(
				'300' => '300',
				'400' => '400',
				'600' => '600',
				'700' => '700'
			)
		);

		$customizer_options[] = array(
			'slug'      => 'pustaka_heading_letter_spacing',
			'default'   => '0',
			'priority'  => 7,
			'label'     => esc_html__( 'Heading Letter Spacing', 'pustaka' ),
			'section'   => 'pustaka_font_settings',
			'output'    => 'false',
			'transport' => 'refresh',
			'type'      => 'text'
		);


	return $customizer_options;
}