<?php

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// Advanced Section
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
add_filter( 'tokoo_new_customizer_data', 'pustaka_advanced_settings_data' );
function pustaka_advanced_settings_data( $customizer_options ) {

	/* ==================================================== *
	 *  Post Settings Section                               *
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'pustaka_post_settings',
		'label'		=> esc_html__( 'Post Settings', 'pustaka' ),
		'panel'	    => 'pustaka_panel_settings',
		'priority'	=> 5,
		'type' 		=> 'section'
	);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_stick_text',
			'default'	=> '',
			'priority'	=> 1,
			'label'		=> esc_html__( 'Sticky Post Label', 'pustaka' ),
			'section'	=> 'pustaka_post_settings',
			'type' 		=> 'text',
			'transport'	=> 'refresh',
		);

	/* ==================================================== *
	 *  Page Settings Section                               *
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'pustaka_page_settings',
		'label'		=> esc_html__( 'Page Settings', 'pustaka' ),
		'panel'	    => 'pustaka_panel_settings',
		'priority'	=> 6,
		'type' 		=> 'section'
	);

		/* ============================================================ *
		 *  Page Settings Data                                          *
		 * ============================================================ */
		$customizer_options[] = array(
			'slug'		=> 'pustaka_post_author',
			'default'	=> 1,
			'priority'	=> 1,
			'label'		=> esc_html__( 'Post Author Box', 'pustaka' ),
			'section'	=> 'pustaka_page_settings',
			'selector'	=> '.post-author',
			'transport'	=> 'postMessage',
			'type' 		=> 'checkbox'
		);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_comment_form',
			'default'	=> 1,
			'priority'	=> 2,
			'label'		=> esc_html__( 'Post/Page Comments', 'pustaka' ),
			'section'	=> 'pustaka_page_settings',
			'selector'	=> '.comments-area',
			'transport'	=> 'postMessage',
			'type' 		=> 'checkbox'
		);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_social_share',
			'default'	=> 1,
			'priority'	=> 3,
			'label'		=> esc_html__( 'Social Share Buttons', 'pustaka' ),
			'section'	=> 'pustaka_page_settings',
			'selector'	=> '.social-share-holder',
			'transport'	=> 'postMessage',
			'type' 		=> 'checkbox'
		);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_ajax_pagination',
			'default'	=> 1,
			'priority'	=> 4,
			'label'		=> esc_html__( 'Pagination with ajax load', 'pustaka' ),
			'section'	=> 'pustaka_page_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'checkbox'
		);

		$pages = get_pages();

			if ( $pages ) {
				$pages_choices[] = esc_html__( '--none--', 'pustaka' );
				foreach ( $pages as $pages ) {
					$pages_choices[$pages->ID] = $pages->post_title;
			}
		}

		/* ============================================================ *
		 *  Package Product Data  										*
		 * ============================================================ */
		// $customizer_options[] = array(
		// 	'slug'		=> 'pustaka_page_for_package',
		// 	'default'	=> 0,
		// 	'priority'	=> 5,
		// 	'label'		=> esc_html__( 'Package Page', 'pustaka' ),
		// 	'section'	=> 'pustaka_page_settings',
		// 	'type' 		=> 'select',
		// 	'choices'   => $pages_choices
		// );

	/* ==================================================== *
	 *  Related Post Section                               *
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'pustaka_related_settings',
		'label'		=> esc_html__( 'Related Post Settings', 'pustaka' ),
		'panel'	    => 'pustaka_panel_settings',
		'priority'	=> 7,
		'type' 		=> 'section'
	);

		/* ============================================================ *
		 *  Related Data                                          *
		 * ============================================================ */
		$customizer_options[] = array(
			'slug'		=> 'pustaka_disallow_by_category',
			'default'	=> '',
			'priority'	=> 1,
			'label'		=> esc_html__( 'Disallow by Category', 'pustaka' ),
			'section'	=> 'pustaka_related_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'category_dropdown'
		);

		$tags = get_tags();

		if ( $tags ) {
			$tags_choices[] = esc_html__( '--none--', 'pustaka' );
			foreach ( $tags as $tag ) {
				$tags_choices[$tag->term_id] = $tag->name;
			}
			$customizer_options[] = array(
				'slug'		=> 'pustaka_disallow_by_tags',
				'default'	=> '',
				'priority'	=> 2,
				'label'		=> esc_html__( 'Disallow by Tag', 'pustaka' ),
				'section'	=> 'pustaka_related_settings',
				'transport'	=> 'refresh',
				'type' 		=> 'select',
				'choices'   => $tags_choices
			);
		}

		$customizer_options[] = array(
			'slug'		=> 'pustaka_related_title',
			'default'	=> esc_html__( 'Related', 'pustaka' ),
			'priority'	=> 3,
			'label'		=> esc_html__( 'Related Title', 'pustaka' ),
			'section'	=> 'pustaka_related_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'text'
		);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_related_number',
			'default'	=> 3,
			'priority'	=> 4,
			'label'		=> esc_html__( 'Display Per Page', 'pustaka' ),
			'section'	=> 'pustaka_related_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'text'
		);


	/* ==================================================== *
	 *  404 Section                               *
	 * ==================================================== */
	$customizer_options[] = array(
		'slug'		=> 'pustaka_404_settings',
		'label'		=> esc_html__( '404 Page Settings', 'pustaka' ),
		'panel'	    => 'pustaka_panel_settings',
		'priority'	=> 8,
		'type' 		=> 'section'
	);

		$customizer_options[] = array(
			'slug'		=> 'pustaka_404_bg_image',
			'default'	=> '',
			'priority'	=> 1,
			'label'		=> esc_html__( '404 Background Image', 'pustaka' ),
			'section'	=> 'pustaka_404_settings',
			'transport'	=> 'refresh',
			'type' 		=> 'images'
		);

	// /* ==================================================== *
	//  *  Page Loader Section                               *
	//  * ==================================================== */
	// $customizer_options[] = array(
	// 	'slug'		=> 'pustaka_page_loader_settings',
	// 	'label'		=> esc_html__( 'Page Loader Settings', 'pustaka' ),
	// 	'panel'	    => 'pustaka_panel_settings',
	// 	'priority'	=> 9,
	// 	'type' 		=> 'section'
	// );

	// 	$customizer_options[] = array(
	// 		'slug'		=> 'pustaka_enable_page_loader',
	// 		'default'	=> 0,
	// 		'priority'	=> 1,
	// 		'label'		=> esc_html__( 'Enable Page Loader', 'pustaka' ),
	// 		'section'	=> 'pustaka_page_loader_settings',
	// 		'transport'	=> 'refresh',
	// 		'type' 		=> 'checkbox'
	// 	);
	// 	$customizer_options[] = array(
	// 		'slug'		=> 'pustaka_page_loader_image',
	// 		'default'	=> '',
	// 		'priority'	=> 2,
	// 		'label'		=> esc_html__( 'Page Loader Image', 'pustaka' ),
	// 		'section'	=> 'pustaka_page_loader_settings',
	// 		'transport'	=> 'refresh',
	// 		'type' 		=> 'images'
	// 	);
	// 	$customizer_options[] = array(
	// 		'slug'		=> 'pustaka_page_loader_image_animation',
	// 		'default'	=> 'none',
	// 		'priority'	=> 3,
	// 		'label'		=> esc_html__( 'Page Loader Image Animation', 'pustaka' ),
	// 		'section'	=> 'pustaka_page_loader_settings',
	// 		'transport'	=> 'refresh',
	// 		'type' 		=> 'select',
	// 		'choices'	=> array(
	// 			'none' 			=> 'None', 
	// 			'fade-inout' 	=> 'FadeInOut', 
	// 			'flip3d' 		=> 'Flip3d',
	// 			'fly-updown' 	=> 'Fly UpDown'
	// 		)
	// 	);
	// 	$customizer_options[] = array(
	// 		'slug'		=> 'pustaka_page_loader_bg_color',
	// 		'default'	=> '',
	// 		'priority'	=> 4,
	// 		'label'		=> esc_html__( 'Page Loader Background Color', 'pustaka' ),
	// 		'section'	=> 'pustaka_page_loader_settings',
	// 		'transport'	=> 'refresh',
	// 		'type' 		=> 'color'
	// 	);

	return $customizer_options;
}

