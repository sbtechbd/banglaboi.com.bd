<?php

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// WooCommerce Section
// -----------------------------------------------------------------------------------------------
// ===============================================================================================

if ( class_exists( 'WooCommerce' ) ) {

	add_filter( 'tokoo_new_customizer_data', 'pustaka_woocommerce_settings_data' );
	function pustaka_woocommerce_settings_data( $customizer_options ) {

			/* ==================================================== *
			 *  Shop Page Section  									*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'pustaka_shop_page_section',
				'label'		=> esc_html__( 'Shop Page', 'pustaka' ),
				'panel'		=> 'pustaka_panel_settings',
				'priority'	=> 12,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Shop Page Data  											*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_default_layout',
					'default'	=> 'grid',
					'priority'	=> 0,
					'label'		=> esc_html__( 'Default Product Layout', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'output'    => false,
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'	=> array(
						'grid'		=> esc_html__( 'Grid', 'pustaka' ),
						'list'		=> esc_html__( 'List', 'pustaka' ),
					)
				);
				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_default_type',
					'default'	=> 'regular',
					'priority'	=> 0,
					'label'		=> esc_html__( 'Default Product Type', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'output'    => false,
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'	=> array(
						'regular'		=> esc_html__( 'General - Default', 'pustaka' ),
						'book'			=> esc_html__( 'Book', 'pustaka' ),
						'movie'			=> esc_html__( 'Movie', 'pustaka' ),
						'audio'			=> esc_html__( 'Audio', 'pustaka' ),
						'game'			=> esc_html__( 'Game', 'pustaka' ),
					)
				);
				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_category_count',
					'default'	=> 0,
					'priority'	=> 1,
					'label'		=> esc_html__( 'Hide Products Category Count', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'product_result_count',
					'default'	=> 0,
					'priority'	=> 1,
					'label'		=> esc_html__( 'Hide Products Result Count', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_per_page',
					'default'	=> 9,
					'priority'	=> 2,
					'label'		=> esc_html__( 'Products Per Page', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_shop_loop_columns',
					'default'	=> '4',
					'priority'	=> 3,
					'label'		=> esc_html__( 'Product Columns', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'output'    => false,
					'transport'	=> 'refresh',
					'type' 		=> 'select',
					'choices'	=> array(
						'2'		=> 2,
						'3'		=> 3,
						'4'		=> 4,
						'5'		=> 5,
						'6'		=> 6,
					)
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_sale_flash',
					'default'	=> 0,
					'priority'	=> 3,
					'label'		=> esc_html__( 'Hide Products Sale Flash', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_category',
					'default'	=> 0,
					'priority'	=> 4,
					'label'		=> esc_html__( 'Hide Products Category', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_title',
					'default'	=> 0,
					'priority'	=> 5,
					'label'		=> esc_html__( 'Hide Products Title', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_star_rating',
					'default'	=> 0,
					'priority'	=> 6,
					'label'		=> esc_html__( 'Hide Products Star Rating', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_price',
					'default'	=> 0,
					'priority'	=> 7,
					'label'		=> esc_html__( 'Hide Products Price', 'pustaka' ),
					'section'		=> 'pustaka_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_add_to_cart',
					'default'	=> 0,
					'priority'	=> 8,
					'label'		=> esc_html__( 'Hide Products Quick Shop', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_quickview',
					'default'	=> 0,
					'priority'	=> 9,
					'label'		=> esc_html__( 'Hide Quick View Button', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_catalog_ordering',
					'default'	=> 0,
					'priority'	=> 10,
					'label'		=> esc_html__( 'Hide Products Catalog Ordering', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_browse_by_tags',
					'default'	=> 0,
					'priority'	=> 11,
					'label'		=> esc_html__( 'Hide Browse by Tag', 'pustaka' ),
					'section'	=> 'pustaka_shop_page_section',
					'type' 		=> 'checkbox'
				);

			/* ==================================================== *
			 *  Single Product Section  							*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'pustaka_single_product_section',
				'label'		=> esc_html__( 'Single Product', 'pustaka' ),
				'panel'		=> 'pustaka_panel_settings',
				'priority'	=> 13,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Single Product Data  										*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'pustaka_enable_single_product_image_zoom',
					'default'	=> 1,
					'priority'	=> 0,
					'label'		=> esc_html__( 'Enable Single Products Image Zoom', 'pustaka' ),
					'section'	=> 'pustaka_single_product_section',
					'type' 		=> 'checkbox'
				);
				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_single_sale_flash',
					'default'	=> 0,
					'priority'	=> 1,
					'label'		=> esc_html__( 'Hide Single Products Sale Flash', 'pustaka' ),
					'section'	=> 'pustaka_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_single_price',
					'default'	=> 0,
					'priority'	=> 2,
					'label'		=> esc_html__( 'Hide Single Products Price', 'pustaka' ),
					'section'	=> 'pustaka_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_single_add_to_cart',
					'default'	=> 0,
					'priority'	=> 3,
					'label'		=> esc_html__( 'Hide Single Products Add To Cart', 'pustaka' ),
					'section'	=> 'pustaka_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_single_excerpt',
					'default'	=> 0,
					'priority'	=> 4,
					'label'		=> esc_html__( 'Hide Single Products Excerpt', 'pustaka' ),
					'section'	=> 'pustaka_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_single_meta',
					'default'	=> 0,
					'priority'	=> 5,
					'label'		=> esc_html__( 'Hide Single Products Meta', 'pustaka' ),
					'section'	=> 'pustaka_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_single_rating',
					'default'	=> 0,
					'priority'	=> 6,
					'label'		=> esc_html__( 'Hide Single Products Rating', 'pustaka' ),
					'section'	=> 'pustaka_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_tabs',
					'default'	=> 0,
					'priority'	=> 7,
					'label'		=> esc_html__( 'Hide Single Products Tabs', 'pustaka' ),
					'section'	=> 'pustaka_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_single_wishlist',
					'default'	=> 0,
					'priority'	=> 8,
					'label'		=> esc_html__( 'Hide Single Wishlist Button', 'pustaka' ),
					'section'	=> 'pustaka_single_product_section',
					'type' 		=> 'checkbox'
				);

			/* ==================================================== *
			 *  Related Product Section  							*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'pustaka_related_product_section',
				'label'		=> esc_html__( 'Related Product', 'pustaka' ),
				'panel'		=> 'pustaka_panel_settings',
				'priority'	=> 16,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Related Product Data  										*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_related',
					'default'	=> 0,
					'priority'	=> 1,
					'label'		=> esc_html__( 'Hide Related Products', 'pustaka' ),
					'section'	=> 'pustaka_related_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_related_product_per_page',
					'default'	=> 4,
					'priority'	=> 2,
					'label'		=> esc_html__( 'Related Product Per Page', 'pustaka' ),
					'section'	=> 'pustaka_related_product_section',
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_related_product_title',
					'default'	=> '',
					'priority'	=> 3,
					'label'		=> esc_html__( 'Related Product Title', 'pustaka' ),
					'section'	=> 'pustaka_related_product_section',
					'type' 		=> 'text'
				);


			/* ==================================================== *
			 *  Upsells Product Section  							*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'pustaka_upsells_product_section',
				'label'		=> esc_html__( 'Upsells Product', 'pustaka' ),
				'panel'		=> 'pustaka_panel_settings',
				'priority'	=> 17,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Upsells Product Data  										*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_upsells',
					'default'	=> 0,
					'priority'	=> 1,
					'label'		=> esc_html__( 'Hide Up-Sells Products', 'pustaka' ),
					'section'	=> 'pustaka_upsells_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_upsell_product_per_page',
					'default'	=> 4,
					'priority'	=> 2,
					'label'		=> esc_html__( 'Upsell Product Per Page', 'pustaka' ),
					'section'	=> 'pustaka_upsells_product_section',
					'type' 		=> 'text'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_upsell_product_title',
					'default'	=> '',
					'priority'	=> 3,
					'label'		=> esc_html__( 'Upsell Product Title', 'pustaka' ),
					'section'	=> 'pustaka_upsells_product_section',
					'type' 		=> 'text'
				);

			/* ==================================================== *
			 *  Category on Single Product Section  							*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'pustaka_category_single_product_section',
				'label'		=> esc_html__( 'Category on Single Product', 'pustaka' ),
				'panel'		=> 'pustaka_panel_settings',
				'priority'	=> 18,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Category Single Product Data  								*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'pustaka_category_single_product',
					'default'	=> 0,
					'priority'	=> 1,
					'label'		=> esc_html__( 'Hide Category on Single Product', 'pustaka' ),
					'section'	=> 'pustaka_category_single_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_category_single_product_per_page',
					'default'	=> 3,
					'priority'	=> 2,
					'label'		=> esc_html__( 'Category on Single Product Number', 'pustaka' ),
					'section'	=> 'pustaka_category_single_product_section',
					'type' 		=> 'text'
				);

			/* ==================================================== *
			 *  Cross Sells Product Section  							*
			 * ==================================================== */
			$customizer_options[] = array(
				'slug'		=> 'pustaka_cross_sells_product_section',
				'label'		=> esc_html__( 'Cross Sells Product', 'pustaka' ),
				'panel'		=> 'pustaka_panel_settings',
				'priority'	=> 19,
				'type' 		=> 'section'
			);

				/* ============================================================ *
				 *  Cross Sells Product Data  										*
				 * ============================================================ */
				$customizer_options[] = array(
					'slug'		=> 'pustaka_product_cross_sells',
					'default'	=> 0,
					'priority'	=> 1,
					'label'		=> esc_html__( 'Hide Cross-Sells Products', 'pustaka' ),
					'section'	=> 'pustaka_cross_sells_product_section',
					'type' 		=> 'checkbox'
				);

				$customizer_options[] = array(
					'slug'		=> 'pustaka_cross_sells_product_per_page',
					'default'	=> 6,
					'priority'	=> 2,
					'label'		=> esc_html__( 'Product Per Page', 'pustaka' ),
					'section'	=> 'pustaka_cross_sells_product_section',
					'type' 		=> 'text'
				);

		return $customizer_options;
	}
}

