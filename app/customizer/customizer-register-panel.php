<?php 

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// Register Panel
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'pustaka_customizer_register_panel' );
function pustaka_customizer_register_panel( $customizer_options ) {

	/* ===========================================================================================*
	 *  Pustaka Panel 					 				  										*
	 * ===========================================================================================*/
	$customizer_options[] = array(
		'slug'		=> 'pustaka_panel_settings',
		'label'		=> esc_html__( 'Pustaka Settings', 'pustaka' ),
		'priority'	=> 3,
		'type' 		=> 'panel'
	);

	return $customizer_options;
}