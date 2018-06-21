<?php

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// General Section
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'pustaka_general_settings_data' );
function pustaka_general_settings_data( $customizer_options ) {

		/* ==================================================== *
		 *  Site Section  										*
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'pustaka_site_settings',
			'label'		=> esc_html__( 'Site Settings', 'pustaka' ),
			'panel'	    => 'pustaka_panel_settings',
			'priority'	=> 1,
			'type' 		=> 'section'
		);

			/* ============================================================ *
			 *  Site Data  													*
			 * ============================================================ */
			$customizer_options[] = array(
				'slug'		=> 'pustaka_custom_logo',
				'default'	=> '',
				'priority'	=> 1,
				'label'		=> esc_html__( 'Custom Logo', 'pustaka' ),
				'section'	=> 'pustaka_site_settings',
				'output'    => false,
				'transport'	=> 'refresh',
				'type' 		=> 'images'
			);


		/* ==================================================== *
		 *  Header Section  									*
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'pustaka_header_settings',
			'label'		=> esc_html__( 'Header Settings', 'pustaka' ),
			'panel'	    => 'pustaka_panel_settings',
			'priority'	=> 2,
			'type' 		=> 'section'
		);

			/* ============================================================ *
			 *  Header Color Scheme											*
			 * ============================================================ */
			$customizer_options[] = array(
				'slug'    	=> 'pustaka_header_type',
				'type'  	=> 'select',
				'default'	=> 'type_1',
				'priority'	=> 0,
				'label' 	=> esc_html__( 'Header Type', 'pustaka' ),
				'section'	=> 'pustaka_header_settings',
				'output'    => false,
				'transport'	=> 'refresh',
				'choices'	=> array(
					'type_1' 	=> esc_html__( 'Type 1 - Default', 'pustaka' ),
					'type_2' 	=> esc_html__( 'Type 2', 'pustaka' ),
				),
			);
			$customizer_options[] = array(
				'slug'		=> 'pustaka_menu_opening_method',
				'default'	=> 'onclick',
				'priority'	=> 1,
				'label'		=> esc_html__( 'Menu Opening Method', 'pustaka' ),
				'section'	=> 'pustaka_header_settings',
				'output'    => false,
				'transport'	=> 'refresh',
				'type' 		=> 'select',
				'choices'	=> array(
					'onclick'		=> esc_html__( 'On Click', 'pustaka' ),
					'onhover'		=> esc_html__( 'On Hover', 'pustaka' ),
				)
			);

			$customizer_options[] = array(
				'slug'		=> 'pustaka_page_title_background',
				'default'	=> '',
				'priority'	=> 2,
				'label'		=> esc_html__( 'Global Page Title Background (1600x600 px)', 'pustaka' ),
				'section'	=> 'pustaka_header_settings', 
				'output'    => false,
				'transport'	=> 'refresh',
				'type' 		=> 'images'
			);

			$customizer_options[] = array(
				'slug'		=> 'pustaka_sticky_header',
				'default'	=> '',
				'priority'	=> 3,
				'label'		=> esc_html__( 'Sticky Header', 'pustaka' ),
				'section'	=> 'pustaka_header_settings', 
				'output'    => false,
				'transport'	=> 'refresh',
				'type' 		=> 'checkbox'
			);
			$customizer_options[] = array(
				'slug'		=> 'pustaka_header_cart_button_type',
				'default'	=> 'text',
				'priority'	=> 0,
				'label'		=> esc_html__( 'Cart Header Button Type', 'pustaka' ),
				'section'	=> 'pustaka_header_settings',
				'output'    => false,
				'transport'	=> 'refresh',
				'type' 		=> 'select',
				'choices'	=> array(
					'text'		=> esc_html__( 'Text', 'pustaka' ),
					'icon'		=> esc_html__( 'Icon', 'pustaka' ),
				)
			);

		/* ==================================================== *
		 *  Footer Section  										*
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'pustaka_footer_settings',
			'label'		=> esc_html__( 'Footer Settings', 'pustaka' ),
			'panel'	    => 'pustaka_panel_settings',
			'priority'	=> 3,
			'type' 		=> 'section'
		);

			$customizer_options[] = array(
				'slug'		=> 'pustaka_payment_logo',
				'default'	=> PUSTAKA_THEME_ASSETS_URI . '/img/payment.png',
				'priority'	=> 3,
				'label'		=> esc_html__( 'Payment Logo', 'pustaka' ),
				'section'	=> 'pustaka_footer_settings',
				'output'    => false,
				'transport'	=> 'postMessage',
				'type' 		=> 'images'
			);

			$customizer_options[] = array(
				'slug'		=> 'pustaka_footer_content',
				'default'	=> '',
				'priority'	=> 5,
				'label'		=> esc_html__( 'Footer Credits', 'pustaka' ),
				'section'	=> 'pustaka_footer_settings',
				'output'    => false,
				'transport'	=> 'refresh',
				'type' 		=> 'textarea'
			);

			$customizer_options[] = array(
				'slug'		=> 'pustaka_footer_page',
				'default'	=> '',
				'label'		=> esc_html__( 'Select Footer Page', 'pustaka' ),
				'section'	=> 'pustaka_footer_settings',
				'output'    => false,
				'transport'	=> 'refresh',
				'type' 		=> 'select',
				'choices'	=> pustaka_get_posts( 'page', esc_html__( 'Default Footer', 'pustaka' ) )
			);

		/* ==================================================== *
		 *  Social Icons Section  								*
		 * ==================================================== */
		$customizer_options[] = array(
			'slug'		=> 'pustaka_social_icons_settings',
			'label'		=> esc_html__( 'Social Icons', 'pustaka' ),
			'panel'	    => 'pustaka_panel_settings',
			'priority'	=> 4,
			'type' 		=> 'section'
		);

			/* ============================================================ *
			 * Account Data  												*
			 * ============================================================ */
			$customizer_options[] = array(
				'slug'		=> 'pustaka_fb',
				'default'	=> '',
				'priority'	=> 1,
				'label'		=> esc_html__( 'Facebook Username', 'pustaka' ),
				'section'	=> 'pustaka_social_icons_settings',
				'type' 		=> 'text',
				'transport'	=> 'refresh',
			);
			$customizer_options[] = array(
				'slug'		=> 'pustaka_tw',
				'default'	=> '',
				'priority'	=> 2,
				'label'		=> esc_html__( 'Twitter Username', 'pustaka' ),
				'section'	=> 'pustaka_social_icons_settings',
				'type' 		=> 'text',
				'transport'	=> 'refresh',
			);
			$customizer_options[] = array(
				'slug'		=> 'pustaka_gplus',
				'default'	=> '',
				'priority'	=> 5,
				'label'		=> esc_html__( 'Google Plus Username', 'pustaka' ),
				'section'	=> 'pustaka_social_icons_settings',
				'type' 		=> 'text',
				'transport'	=> 'refresh',
			);
			$customizer_options[] = array(
				'slug'		=> 'pustaka_pinterest',
				'default'	=> '',
				'priority'	=> 6,
				'label'		=> esc_html__( 'Pinterest Username', 'pustaka' ),
				'section'	=> 'pustaka_social_icons_settings',
				'type' 		=> 'text',
				'transport'	=> 'refresh',
			);

	return $customizer_options;
}

