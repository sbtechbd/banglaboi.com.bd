<?php

/**
 * Init King Composer
 *
 * @return void
 * @author tokoo
 **/
add_action( 'init', 'pustaka_king_composer_init', 99 );
function pustaka_king_composer_init() {

	if ( function_exists( 'kc_add_map' ) ) { 
		
		if ( is_admin() ) {
			kc_add_icon( get_template_directory_uri() . '/assets/css/font-icons.css' );
		}
		
		// SECTION TITLE
		kc_add_map(
			array(
				'pustaka_section_title' => array(
					'name' 			=> esc_html__( 'P-Section Title', 'pustaka' ),
					'description' 	=> esc_html__( 'Display Pustaka Section Title', 'pustaka' ),
					'icon' 			=> 'kc-icon-icarousel',
					'category' 		=> 'Pustaka',
					'tab_icons' => array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
						'animate' => 'et-lightbulb'
					),

					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'section_title',
								'label' 		=> esc_html__( 'Section Title', 'pustaka' ),
								'type' 			=> 'text',
								'value'			=> 'Section Title'
							),
							array(
								'name' 			=> 'section_sub_title',
								'label' 		=> esc_html__( 'Section Sub Title', 'pustaka' ),
								'type' 			=> 'text',
								'value'			=> 'Section Sub Title'
							),
							array(
								'name' 			=> 'position',
								'label' 		=> esc_html__( 'Position', 'pustaka' ),
								'type' 			=> 'select',
								'options'		=> array(
										'section-header--left'		=> 'Left',
										'section-header--center'	=> 'Center',
										'section-header--right'		=> 'Right',
									),
									'value'		=> 'left'
							),
						),
						'styling' => array(
							array(
								'name'			=> 'section-title-style',
								'label'			=> 'Field Label',
								'type'			=> 'css',
								'options'	=> array(
									array(
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.section-title'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.section-title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.section-title'),
										),
										'Subtitle' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.section-subtitle'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.section-subtitle'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.section-subtitle'),
										),
									)
								)
							),
						),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// PUSTAKA SLIDER
		kc_add_map(
			array(
				'pustaka_slider' 	=> array(
					'name' 			=> esc_html__( 'P-Sliders', 'pustaka' ),
					'description' 	=> esc_html__( 'Display Pustaka Sliders', 'pustaka' ),
					'icon' 			=> 'kc-icon-icarousel',
					'category' 		=> 'Pustaka',
					'tab_icons' => array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'slider_item',
								'label' 		=> esc_html__( 'Select Slider Item', 'pustaka' ),
								'type' 			=> 'select',
								'options'		=> pustaka_get_posts( 'tokoo-slider' ),
							),
							array(
								'name' 			=> 'slider_style',
								'label' 		=> esc_html__( 'Slider Style', 'pustaka' ),
								'type' 			=> 'select',
								'options'       => array(
									'style-1'	=> "Style 1 : Carousel",
									'style-2'	=> "Style 2 : Slider",
								),
								'value'			=> 'style-1'
								
							),
							array(
								'name' 			=> 'slider_duration',
								'label' 		=> esc_html__( 'Slider Duration', 'pustaka' ),
								'type' 			=> 'text',
								'description'   => 'Duration in miliseconds. 1000ms = 1s',
								'value'			=> 5000
							),
							array(
								'name' 			=> 'slider_animation',
								'label' 		=> esc_html__( 'Slider Animation', 'pustaka' ),
								'type' 			=> 'radio',
								'options'		=> array(
									'slide'		=> 'Slide',
									'fade'		=> 'Fade'
								),
								'value'			=> 'slide',
								'relation'		=> array(
									'parent'    => 'slider_style',
									'show_when' => 'style-2'
								)
							),
							array(
								'name' 			=> 'slider_height',
								'label' 		=> esc_html__( 'Custom Height', 'pustaka' ),
								'type' 			=> 'text',
								'description'	=> 'Slider height in pixel unit',
								'value'			=> '640',
								'relation'		=> array(
									'parent'    => 'slider_style',
									'show_when' => 'style-2'
								)
							),
						),
						'styling' => array(
							array(
								'name'			=> 'section-title-style',
								'label'			=> 'Field Label',
								'type'			=> 'css',
								'options'	=> array(
									array(
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => 'h2.hero-item__title'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => 'h2.hero-item__title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => 'h2.hero-item__title'),
										),
										'Subtitle' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => 'p.hero-item__desc'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => 'p.hero-item__desc'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => 'p.hero-item__desc'),
										),
									)
								)
							),
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// PUSTAKA PRODUCT CATEGORIES
		kc_add_map(
			array(
				'pustaka_category_icons_grid' 	=> array(
					'name' 			=> esc_html__( 'P-Product Category Icons Grid', 'pustaka' ),
					'description' 	=> esc_html__( 'Display Product Categories With Icons', 'pustaka' ),
					'icon' 			=> 'sl-folder',
					'category' 		=> 'Pustaka',
					'params' 		=> array(
						array(
							'name' 			=> 'columns',
							'label' 		=> esc_html__( 'Columns', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'1'		=> '1',
								'2'		=> '2',
								'3'		=> '3',
								'4'		=> '4',
								'5'		=> '5',
								'6'		=> '6',
							),
							'value'		=> '6'
						),
						array(
							'name' 			=> 'count',
							'label' 		=> esc_html__( 'Category Count', 'pustaka' ),
							'description' 	=> esc_html__( 'Display Category Count', 'pustaka' ),
							'type' 			=> 'toggle',
							'value'			=> 'yes'
						),
						array(
							'type' 			=> 'group',
							'label' 		=> esc_html__( 'Categories', 'pustaka' ),
							'name' 			=> 'categories',
							'description'   => '',
							'options'       => array( 'add_text' => esc_html__( 'Add new Category', 'pustaka' ) ),
							'params' 		=> array(
								array(
									'name' 			=> 'custom_name',
									'label' 		=> esc_html__( 'Custom Name', 'pustaka' ),
									'description' 	=> esc_html__( 'Use Custom name instead of category name', 'pustaka' ),
									'type' 			=> 'text',
								),
								array(
									'name' 			=> 'item_type',
									'label' 		=> esc_html__( 'Item Type', 'pustaka' ),
									'type' 			=> 'select',
									'options'		=> array(
										'icon_font'		=> esc_html__( 'Icon Font', 'pustaka' ),
										'icon_image'	=> esc_html__( 'Icon Image', 'pustaka' ),
									),
								),
								array(
									'name' 			=> 'icon',
									'label' 		=> esc_html__( 'Select Icon', 'pustaka' ),
									'type' 			=> 'icon_picker',
									'admin_label' 	=> true,
									'relation' 		=> array(
										'parent'    => 'categories-item_type',
										'show_when' => 'icon_font'
									)
								),
								array(
									'name' 			=> 'image',
									'label' 		=> esc_html__( 'Attach Image', 'pustaka' ),
									'type' 			=> 'attach_image',
									'admin_label' 	=> true,
									'relation' 		=> array(
										'parent'    => 'categories-item_type',
										'show_when' => 'icon_image'
									)
								),
								array(
									'name' 			=> 'category',
									'label' 		=> esc_html__( 'Category', 'pustaka' ),
									'type' 			=> 'select',
									'options'		=> pustaka_get_terms( 'product_cat' ),
								),

							)
						),
						array(
							'name'			=> 'pcig-class',
							'label'			=> 'Field Label',
							'type'			=> 'css',
							'options' => array(
								array(
									'screens' => "any",
									'Typography' => array(
										array('property' => 'color', 'label' => 'Color'),
										array('property' => 'font-size', 'label' => 'Font Size'),
										array('property' => 'font-weight', 'label' => 'Font Weight'),
										array('property' => 'font-style', 'label' => 'Font Style'),
										array('property' => 'font-family', 'label' => 'Font Family'),
										array('property' => 'text-align', 'label' => 'Text Align'),
										array('property' => 'text-shadow', 'label' => 'Text Shadow'),
										array('property' => 'text-transform', 'label' => 'Text Transform'),
										array('property' => 'text-decoration', 'label' => 'Text Decoration'),
										array('property' => 'line-height', 'label' => 'Line Height'),
										array('property' => 'letter-spacing', 'label' => 'Letter Spacing'),
										array('property' => 'overflow', 'label' => 'Overflow'),
										array('property' => 'word-break', 'label' => 'Word Break'),                    
									),
									'Background' => array(
										array( 'property' => 'background' ),
									),
								),
								array(
									"screens" => "999,768,667,479",
									'Typography' => array(
										array('property' => 'font-size', 'label' => 'Font Size'),
										array('property' => 'text-align', 'label' => 'Text Align'),
										array('property' => 'line-height', 'label' => 'Line Height'),
										array('property' => 'word-break', 'label' => 'Word Break'),    
									),
									'Background' => array(
										array('property' => 'background'),
									),
									'Box' => array(
										array('property' => 'width', 'label' => 'Width'),
										array('property' => 'margin', 'label' => 'Margin'),
										array('property' => 'padding', 'label' => 'Padding'),
										array('property' => 'border', 'label' => 'Border'),
										array('property' => 'height', 'label' => 'Height'),
										array('property' => 'border-radius', 'label' => 'Border Radius'),
										array('property' => 'float', 'label' => 'Float'),
										array('property' => 'display', 'label' => 'Display'),
									),
								),
							),
							'description' 	=> 'Field Description',
						),
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// PUSTAKA PRODUCTS
		kc_add_map(
			array(
				'pustaka_products' 	=> array(
					'name' 			=> esc_html__( 'P-Products', 'pustaka' ),
					'description' 	=> esc_html__( 'Display Products', 'pustaka' ),
					'icon' 			=> 'sl-basket',
					'category' 		=> 'Pustaka',
					'params' 		=> array(
						array(
							'name' 			=> 'columns',
							'label' 		=> esc_html__( 'Columns', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'1'		=> '1',
								'2'		=> '2',
								'3'		=> '3',
								'4'		=> '4',
								'5'		=> '5',
								'6'		=> '6',
							),
							'value'		=> '6'
						),
						array(
							'name' 			=> 'limit',
							'label' 		=> esc_html__( 'Limit', 'pustaka' ),
							'type' 			=> 'text',
							'value'			=> '6'
						),
						array(
							'name' 			=> 'show_product',
							'label' 		=> esc_html__( 'Show Product', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'all'			=> esc_html__( 'All Products', 'pustaka' ),
								'onsale'		=> esc_html__( 'On-Sale Products', 'pustaka' ),
								'featured'		=> esc_html__( 'Featured Products', 'pustaka' ),
								'best_selling'	=> esc_html__( 'Best Selling Products', 'pustaka' ),	
							),
							'value'		=> 'all'
						),
						array(
							'name' 			=> 'product_type',
							'label' 		=> esc_html__( 'Product Type', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'all'			=> esc_html__( 'All Products', 'pustaka' ),
								'regular'		=> esc_html__( 'Regular', 'pustaka' ),
								'book'			=> esc_html__( 'Book', 'pustaka' ),
								'audio'			=> esc_html__( 'Audio', 'pustaka' ),
								'movie'			=> esc_html__( 'Movie', 'pustaka' ),	
								'game'			=> esc_html__( 'Game', 'pustaka' ),	
							),
							'value'		=> 'all'
						),
						array(
							'name' 			=> 'product_category',
							'label' 		=> esc_html__( 'Product Category', 'pustaka' ),
							'type' 			=> 'select',
							'options'       => pustaka_get_product_category(),
							'value'		=> 'all'
						),
						array(
							'name' 			=> 'orderby',
							'label' 		=> esc_html__( 'Orderby', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'date'			=> esc_html__( 'Date', 'pustaka' ),
								'random'		=> esc_html__( 'Random', 'pustaka' ),
							),
							'value'		=> 'date'
						),
						array(
							'name' 			=> 'order',
							'label' 		=> esc_html__( 'Order', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'ASC'			=> esc_html__( 'ASC', 'pustaka' ),
								'DESC'			=> esc_html__( 'DESC', 'pustaka' ),
							),
							'value'		=> 'DESC'
						),
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// PUSTAKA PRODUCT SERIES
		kc_add_map(
			array(
				'pustaka_book_series' 	=> array(
					'name' 			=> esc_html__( 'P-Book Series', 'pustaka' ),
					'description' 	=> esc_html__( 'Display Book Series With Image', 'pustaka' ),
					'icon' 			=> 'sl-book-open',
					'category' 		=> 'Pustaka',
					'params' 		=> array(
						array(
							'name' 			=> 'columns',
							'label' 		=> esc_html__( 'Columns', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'1'		=> '1',
								'2'		=> '2',
								'3'		=> '3',
								'4'		=> '4',
								'5'		=> '5',
								'6'		=> '6',
							),
							'value'		=> '5'
						),
						array(
							'name' 			=> 'limit',
							'label' 		=> esc_html__( 'Limit', 'pustaka' ),
							'type' 			=> 'text',
							'value'			=> '6'
						),
						array(
							'name' 			=> 'series',
							'label' 		=> esc_html__( 'Book Series', 'pustaka' ),
							'type' 			=> 'multiple',
							'options'		=> pustaka_get_terms( 'book_series', true ),
						),
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// PUSTAKA PRODUCT AUTHORS
		kc_add_map(
			array(
				'pustaka_book_authors' 	=> array(
					'name' 			=> esc_html__( 'P-Book Authors', 'pustaka' ),
					'description' 	=> esc_html__( 'Display Book Authors With Image', 'pustaka' ),
					'icon' 			=> 'sl-book-open',
					'category' 		=> 'Pustaka',
					'params' 		=> array(
						array(
							'name' 			=> 'columns',
							'label' 		=> esc_html__( 'Columns', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'1'		=> '1',
								'2'		=> '2',
								'3'		=> '3',
								'4'		=> '4',
								'5'		=> '5',
								'6'		=> '6',
							),
							'value'		=> '5'
						),
						array(
							'name' 			=> 'limit',
							'label' 		=> esc_html__( 'Limit', 'pustaka' ),
							'type' 			=> 'text',
							'value'			=> '6'
						),
						array(
							'name' 			=> 'count',
							'label' 		=> esc_html__( 'Product Count', 'pustaka' ),
							'description' 	=> esc_html__( 'Display Product Count', 'pustaka' ),
							'type' 			=> 'toggle',
							'value'			=> 'yes'
						),
						array(
							'name' 			=> 'authors',
							'label' 		=> esc_html__( 'Book Author', 'pustaka' ),
							'type' 			=> 'multiple',
							'options'		=> pustaka_get_terms( 'book_author', true ),
						),
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// PUSTAKA FEATURES LIST
		kc_add_map(
			array(
				'pustaka_features_list' 	=> array(
					'name' 			=> esc_html__( 'P-Features List', 'pustaka' ),
					'description' 	=> esc_html__( 'Display Features List', 'pustaka' ),
					'icon' 			=> 'sl-star',
					'category' 		=> 'Pustaka',
					'params' 		=> array(
						array(
							'name' 			=> 'columns',
							'label' 		=> esc_html__( 'Columns', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'1'		=> '1',
								'2'		=> '2',
								'3'		=> '3',
								'4'		=> '4',
								'5'		=> '5',
								'6'		=> '6',
							),
							'value'		=> '5'
						),
						array(
							'type' 			=> 'group',
							'label' 		=> esc_html__( 'Items', 'pustaka' ),
							'name' 			=> 'items',
							'description'   => '',
							'options'       => array( 'add_text' => esc_html__( 'Add new item', 'pustaka' ) ),
							'params' 		=> array(
								array(
									'name' 			=> 'item_type',
									'label' 		=> esc_html__( 'Item Type', 'pustaka' ),
									'type' 			=> 'select',
									'options'		=> array(
										'icon_font'		=> esc_html__( 'Icon Font', 'pustaka' ),
										'icon_image'	=> esc_html__( 'Icon Image', 'pustaka' ),
									),
								),
								array(
									'name' 			=> 'icon',
									'label' 		=> esc_html__( 'Select Icon', 'pustaka' ),
									'type' 			=> 'icon_picker',
									'admin_label' 	=> true,
									'relation' 		=> array(
										'parent'    => 'items-item_type',
										'show_when' => 'icon_font'
									)
								),
								array(
									'name' 			=> 'image',
									'label' 		=> esc_html__( 'Attach Image', 'pustaka' ),
									'type' 			=> 'attach_image',
									'admin_label' 	=> true,
									'relation' 		=> array(
										'parent'    => 'items-item_type',
										'show_when' => 'icon_image'
									)
								),
								array(
									'name' 			=> 'title',
									'label' 		=> esc_html__( 'Title', 'pustaka' ),
									'type' 			=> 'text',
								),
								array(
									'name' 			=> 'link',
									'label' 		=> esc_html__( 'Link', 'pustaka' ),
									'type' 			=> 'text',
								),

							)
						)
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// PUSTAKA CONCTACT FORM
		kc_add_map(
			array(
				'pustaka_contact_form' 	=> array(
					'name' 			=> esc_html__( 'P-Contact Form', 'pustaka' ),
					'description' 	=> esc_html__( 'Display Contact Form', 'pustaka' ),
					'icon' 			=> 'sl-star',
					'category' 		=> 'Pustaka',
					'tab_icons'		=> array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
					),
					'params' 		=> array(
						'general' => array(
							array(
							'name' 			=> 'post_type_contact',
							'label' 		=> esc_html__( 'Select Contact', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> pustaka_get_posts( 'wpcf7_contact_form' )
							),
						),
						'styling' => array(
							array(
								'name'			=> 'section-title-style',
								'label'			=> 'Field Label',
								'type'			=> 'css',
							),
						)
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// PUSTAKA MAILCHIMP FOR WP
		kc_add_map(
			array(
				'pustaka_mailchimp' 	=> array(
					'name' 			=> esc_html__( 'P-MailChimp For WP', 'pustaka' ),
					'description' 	=> esc_html__( 'Display MailChimp Form', 'pustaka' ),
					'icon' 			=> 'sl-star',
					'category' 		=> 'Pustaka',
					'tab_icons'		=> array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'section_title',
								'label' 		=> esc_html__( 'Section Title', 'pustaka' ),
								'type' 			=> 'text',
								'value'			=> 'Section Title'
							),
							array(
								'name' 			=> 'section_sub_title',
								'label' 		=> esc_html__( 'Section Sub Title', 'pustaka' ),
								'type' 			=> 'text',
								'value'			=> 'Section Sub Title'
							),
							array(
								'name' 			=> 'position',
								'label' 		=> esc_html__( 'Section Title Position', 'pustaka' ),
								'type' 			=> 'select',
								'options'		=> array(
										'section-header--left'		=> 'Left',
										'section-header--center'	=> 'Center',
										'section-header--right'		=> 'Right',
									),
									'value'		=> 'left'
							),
							array(
								'name' 			=> 'mailchimp_id',
								'label' 		=> esc_html__( 'MailChimp ID', 'pustaka' ),
								'type' 			=> 'text',
							),
						),
						'styling' => array(
							array(
								'name'			=> 'section-title-style',
								'label'			=> 'Field Label',
								'type'			=> 'css',
								'options'	=> array(
									array(
										'Title' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.section-title'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.section-title'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.section-title'),
										),
										'Subtitle' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.section-subtitle'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.section-subtitle'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.section-subtitle'),
										),
										'Form' => array(
											array('property' => 'color', 'label' => 'Color', 'selector' => '.mc4wp-form input'),
											array('property' => 'font-family', 'label' => 'Font Family', 'selector' => '.mc4wp-form input'),
											array('property' => 'font-size', 'label' => 'Font Size', 'selector' => '.mc4wp-form input'),
											array('property' => 'border-color', 'label' => 'Border Color', 'selector' => '.mc4wp-form input'),
										),
									)
								)
							),
						)
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// PUSTAKA PRODUCT BOOK FLIP
		kc_add_map(
			array(
				'pustaka_product_book_flip'	=> array(
					'name' 					=> esc_html__( 'P-Product Book Flip', 'pustaka' ),
					'description' 			=> esc_html__( 'Product Flip Book', 'pustaka' ),
					'icon' 					=> 'sl-book-open',
					'category' 				=> 'Pustaka',
					'tab_icons'				=> array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
						'animate' => 'et-lightbulb'
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'book_from',
								'label' 		=> esc_html__( 'Select the Book From', 'pustaka' ),
								'type' 			=> 'select',
								'options'		=> array(
									'product'	=> 'Product',
									'static'	=> 'Static',
								),
								'value'			=> 'Product'
							),
							array(
								'name' 			=> 'post_type_product',
								'label' 		=> esc_html__( 'Select Product', 'pustaka' ),
								'type' 			=> 'select',
								'options'		=> pustaka_get_posts( 'product' )
							),
							array(
								'name' 			=> 'front_image_book',
								'label' 		=> esc_html__( 'Image Front', 'pustaka' ),
								'description' 	=> esc_html__( 'Select if use the static type', 'pustaka' ),
								'type' 			=> 'attach_image',
							),
							array(
								'name' 			=> 'back_image_book',
								'label' 		=> esc_html__( 'Image Back', 'pustaka' ),
								'description' 	=> esc_html__( 'Select if use the static type', 'pustaka' ),
								'type' 			=> 'attach_image',
							),
						),
						'styling' => array(
							array(
								'name'			=> 'section-title-style',
								'label'			=> 'Field Label',
								'type'			=> 'css',
							),
						),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		if ( class_exists( 'WooCommerce' ) ) {
			// PUSTAKA PRODUCT SALES COUNTDOWN LIST
			kc_add_map(
				array(
					'pustaka_product_sales_coundown_lists'	=> array(
						'name' 					=> esc_html__( 'P-Products Sales Countdown', 'pustaka' ),
						'description' 			=> esc_html__( 'Product sales countdown', 'pustaka' ),
						'icon' 					=> 'sl-basket',
						'category' 				=> 'Pustaka',
						'tab_icons'				=> array(
							'general' => 'et-tools',
							'styling' => 'et-adjustments',
							'animate' => 'et-lightbulb'
						),
						'params' 		=> array(
							'general' => array(
								array(
									'name' 			=> 'product_ids',
									'label' 		=> esc_html__( 'Select On-Sale Products', 'pustaka' ),
									'type' 			=> 'select',
									'options'		=> pustaka_get_onsale_products()
								),
								array(
									'name' 			=> 'limit',
									'label' 		=> esc_html__( 'Limit Product', 'pustaka' ),
									'type' 			=> 'text',
								),	
								array(
									'name' 			=> 'page_deal',
									'label' 		=> esc_html__( 'Select Page All Deals', 'pustaka' ),
									'type' 			=> 'select',
									'options'		=> pustaka_get_posts( 'page' )
								),
								
							),
							'animate' => array(
								array(
									'name'    => 'animate',
									'type'    => 'animate'
								)
							),
						)
					),  // End of elemnt kc_icon 
				)
			); // End add map
		}

		// PUSTAKA PRODUCTS DEALS
		kc_add_map(
			array(
				'pustaka_products_deals' 	=> array(
					'name' 			=> esc_html__( 'P-Products Deals', 'pustaka' ),
					'description' 	=> esc_html__( 'Display Products Deals', 'pustaka' ),
					'icon' 			=> 'sl-basket',
					'category' 		=> 'Pustaka',
					'params' 		=> array(
						array(
							'name' 			=> 'columns',
							'label' 		=> esc_html__( 'Columns', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'1'		=> '1',
								'2'		=> '2',
								'3'		=> '3',
								'4'		=> '4',
								'5'		=> '5',
								'6'		=> '6',
							),
							'value'		=> '6'
						),
						array(
							'name' 			=> 'limit',
							'label' 		=> esc_html__( 'Limit', 'pustaka' ),
							'type' 			=> 'text',
							'value'			=> '6'
						),
						array(
							'name' 			=> 'orderby',
							'label' 		=> esc_html__( 'Orderby', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'date'			=> esc_html__( 'Date', 'pustaka' ),
								'random'		=> esc_html__( 'Random', 'pustaka' ),
							),
							'value'		=> 'date'
						),
						array(
							'name' 			=> 'order',
							'label' 		=> esc_html__( 'Order', 'pustaka' ),
							'type' 			=> 'select',
							'options'		=> array(
								'ASC'			=> esc_html__( 'ASC', 'pustaka' ),
								'DESC'			=> esc_html__( 'DESC', 'pustaka' ),
							),
							'value'		=> 'date'
						),
						 
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map

		// PUSTAKA PRODUCT BOOK FLIP
		kc_add_map(
			array(
				'pustaka_product_details'	=> array(
					'name' 					=> esc_html__( 'P-Product Details', 'pustaka' ),
					'description' 			=> esc_html__( 'Show Product with details information', 'pustaka' ),
					'icon' 					=> 'sl-book-open',
					'category' 				=> 'Pustaka',
					'tab_icons'				=> array(
						'general' => 'et-tools',
						'styling' => 'et-adjustments',
						'animate' => 'et-lightbulb'
					),
					'params' 		=> array(
						'general' => array(
							array(
								'name' 			=> 'section_title',
								'label' 		=> esc_html__( 'Section Title', 'pustaka' ),
								'type' 			=> 'text',
								'value'			=> 'Best of 2016'
							),

							array(
								'name' 			=> 'section_sub_title',
								'label' 		=> esc_html__( 'Section Sub Title', 'pustaka' ),
								'type' 			=> 'text',
								'value'			=> 'discount 25%'
							),

							array(
								'name' 			=> 'productid',
								'label' 		=> esc_html__( 'Select Product', 'pustaka' ),
								'type' 			=> 'select',
								'options'		=> pustaka_get_posts( 'product' )
							),
							array(
								'name' 			=> 'styleid',
								'label' 		=> esc_html__( 'Select Style', 'pustaka' ),
								'type' 			=> 'select',
								'options'		=> array(
									'style1'	=> 'Style 1',
									'style2'	=> 'Style 2',
									'style3'	=> 'Style 3',
									'style4'	=> 'Style 4',
									'style5'	=> 'Style 5',
									'style6'	=> 'Style 6',
								),
								'value'			=> 'style1'
							),
						),
						'styling' => array(
							array(
								'name'			=> 'section-title-style',
								'label'			=> 'Field Label',
								'type'			=> 'css',
							),
						),
						'animate' => array(
							array(
								'name'    => 'animate',
								'type'    => 'animate'
							)
						),
					)
				),  // End of elemnt kc_icon 
			)
		); // End add map
	
	} // End if

}


