<?php 

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// MAPS Section
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'pustaka_maps_settings_data' );
function pustaka_maps_settings_data( $customizer_options ) {

	/* ==================================================== *
	 *  Theme Updater Section  										*
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'pustaka_maps_settings',
		'label'		=> esc_html__( 'Map Setting', 'pustaka' ),
		'priority'	=> 20,
		'panel' 	=> 'pustaka_panel_settings',
		'type' 		=> 'section'
	);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_map_api_key',
			'default'	=> '',
			'priority'	=> 1,
			'label'		=> esc_html__( 'Google Map API Key', 'pustaka' ),
			'section'	=> 'pustaka_maps_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'text',
		);

	return $customizer_options;
}