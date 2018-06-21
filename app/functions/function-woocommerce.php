<?php

/**
 * bounce back if WooCommerce is not installed
 *
 * @since 1.0
 */
if ( ! class_exists( 'WooCommerce' ) )
	return;

add_action( 'after_setup_theme', 'lecrafts_woocommerce_support' );
function lecrafts_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Woocommerce custom functions
 *
 * @since 1.0
 */
add_action( 'init', 'pustaka_woo_functions' );
function pustaka_woo_functions() {

	/* Disable WooCommerce styles */
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	/**
	 * Add theme support for woocommerce
	 *
	 * @link http://docs.woothemes.com/document/third-party-custom-theme-compatibility/#section-2
	 */
	//add_theme_support( 'woocommerce' );

	/* Define custom image sizes for woocommerce on theme activation. */
	add_action( 'init', 'pustaka_woocommerce_image_dimensions', 1 );

	if ( class_exists( 'YITH_WCWL' ) ) :
		update_option( 'yith_wcwl_add_to_wishlist_icon', 'fa-heart-o' );
		update_option( 'yith_wcwl_button_position', 'shortcode' );
	endif;

	/* filter Cross Sells number */
	// add_filter( 'woocommerce_cross_sells_total', create_function( '', 'return 3;' ) );


	/** Template Hooks ********************************************************/

	if ( ! is_admin() || defined('DOING_AJAX') ) {

		/**
		 * Remove Breadcrumbs
		 */
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

		remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );

		/**
		 * woocommerce_single_product_summary hook
		 */
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_output_related_products', 20 );

		/**
		 * woocommerce_before_shop_loop
		 * remove result count
		 * woocommerce_catalog_ordering 
		 */
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

		/**woocommerce_result_count
		 * Remove sidebar
		 */
		// remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

		/**
		 * woocommerce_before_single_product_summary
		 */
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
		add_action( 'woocommerce_before_single_product_summary', 'pustaka_display_thumbnail_by_product_type', 20 );
		
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		
		/**
		 * woocommerce_before_shop_loop_item_title
		 */
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'woocommerce_shop_loop_item_title', 'pustaka_product_title', 10 );

		/**
		 * woocommerce_after_shop_loop_item_title
		 */
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

		/**
		 * After Product Summary
		 */ 
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

		/**
		 * remove cross-sells
		 */
		remove_action( 'woocommerce_cart_collaterals','woocommerce_cross_sell_display' );
		
		add_action( 'woocommerce_after_single_product_summary', 'pustaka_display_upsells_product', 20 );
		add_action( 'woocommerce_after_single_product_summary', 'pustaka_display_related_product', 25 );


	}

}

/**
 * Define image sizes
 */
function pustaka_woocommerce_image_dimensions() {

	global $pagenow;

	if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {

		$catalog = array(
			'width' => '330', // px
			'height' => '452', // px
			'crop' => 1 // true
		);

		$single = array(
			'width' => '300', // px
			'height' => '458', // px
			'crop' => 1 // true
		);

		$thumbnail = array(
			'width' => '150', // px
			'height' => '150', // px
			'crop' => 1 // true
		);

		/* Product category thumbs. */
		update_option( 'shop_catalog_image_size'  , $catalog );

		/* Single product image. */
		update_option( 'shop_single_image_size'   , $single );

		/* Image gallery thumbs. */
		update_option( 'shop_thumbnail_image_size', $thumbnail );

	}

}


/**
 * My account URL on header.php
 * @since 1.0
 */
function pustaka_my_account_url() {
	printf ( '<a class="top-account" href="%s">%s</a>',
		esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ),
		esc_hrml__( 'My Account', 'pustaka' )
	);
}


/**
 * Returns true if on WooCommerce pages
 * Includes: Cart, Checkout, Pay, Thanks (Order Received), View Order, Order Tracking,
 *   My Account, Edit Address, Change Password, and Term
 * @return boolean
 */
function pustaka_is_woocommerce_pages() {
	if ( is_cart() || is_checkout() || is_account_page() ) {
		return true;
	} else {
		return false;
	}
}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'pustaka_header_add_to_cart_fragment' );
function pustaka_header_add_to_cart_fragment( $fragments ) {

	ob_start(); ?>
	<?php 
		$a_class 	= ! is_rtl() ? 'text-gradient' : 'no-gradient'; 
		$cart_type	= get_theme_mod( 'pustaka_header_cart_button_type', 'text' );
	?>
	<button class="menu-cart-trigger">
		<?php if ( 'icon' == $cart_type ) : ?>
			<span class="fa fa-shopping-cart"></span>
		<?php else : ?>
			<span class="<?php echo esc_attr( $a_class ); ?>">
				<?php esc_html_e( 'Cart', 'pustaka' ); ?> 
			</span>
		<?php endif ?>
		<span class="cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>
	</button>

	<?php
	$fragments['button.menu-cart-trigger'] = ob_get_clean();

	return $fragments;
}

/**
 * Register sidebar shop
 *
 * @return void
 * @author tokoo
 **/
add_action( 'widgets_init', 'pustaka_register_sidebar_shop' );
function pustaka_register_sidebar_shop() {
	$shop_param = array(
		'name' 			=> esc_html__( 'Shop', 'pustaka' ),
		'id' 			=> 'shop',
		'description' 	=> esc_html__( 'Widgets in this area will be shown on the shop page.', 'pustaka' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	);

	register_sidebar( $shop_param );
}

/**
 * Tokoo WooCommerce control from theme option
 *
 * @since  2.0
 * @author tokoo
 */

/* Disable product category count */
if ( true == pustaka_get_option( 'product_category_count' ) ) {
	add_filter( 'woocommerce_subcategory_count_html', 'pustaka_disable_product_category_count' );
}
function pustaka_disable_product_category_count() {
	echo '';
}

/* Set product per page */
add_filter( 'loop_shop_per_page', 'pustaka_shop_per_page' );
function pustaka_shop_per_page() {
	$tokoo_product_per_page = pustaka_get_option( 'product_per_page' );
	$default_product_per_page = get_option( 'posts_per_page' );
	if ( ! empty ( $tokoo_product_per_page ) && $tokoo_product_per_page !== 0 ) {
		$per_page = $tokoo_product_per_page;
	} else {
		$per_page = $default_product_per_page;
	}

	return $per_page;
}

/**
 * Tokoo product sale flash
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_product_sale_flash() {
	if ( false == pustaka_get_option( 'product_sale_flash' ) ) {
		woocommerce_show_product_loop_sale_flash();
	}
}

/**
 * Tokoo product category
 *
 * @since  2.0
 * @author tokoo
 */
function pustaka_product_category() {
	if ( false == pustaka_get_option( 'product_category' ) ) { ?>
		<?php
		global $product;
		printf( wc_get_product_category_list( $product->get_id(), ', ', '<div class="product__category">', '</div>' ) );
		?>
	<?php }
}

/**
 * Tokoo product title
 *
 * @since  2.0
 * @author tokoo
 */
function pustaka_product_title() {
	if ( false == pustaka_get_option( 'product_title' ) ) { ?>
		<h3 class="product__title" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php }
}

/**
 * Tokoo Star Rating
 * 
 * @since  2.0
 * @author tokoo
 */
 function pustaka_product_star_rating() {
	if ( false == pustaka_get_option( 'product_star_rating' ) ) {
		woocommerce_template_loop_rating();
	} 
}

/**
 * Tokoo product price
 * not used in LeCrafts
 * @since  2.0
 * @author tokoo
 */
function pustaka_product_price() {
	if ( false == pustaka_get_option( 'product_price' ) ) {
		woocommerce_template_loop_price();
	}
}

/**
 * Tokoo product add to cart
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_product_add_to_cart() {
	if ( false == pustaka_get_option( 'product_add_to_cart' ) ) {
		woocommerce_template_loop_add_to_cart();
	}
}

/**
 * Tokoo product result count
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_product_result_count() {
	if ( false == pustaka_get_option( 'product_result_count', true ) ) { ?>
		<div class="align center"><?php woocommerce_result_count(); ?></div>
		<?php
	}
}

/**
 * Tokoo product catalog ordering
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_product_catalog_ordering() {
	if ( false == pustaka_get_option( 'product_catalog_ordering' ) ) { ?>
		<div class="pull-right">
			<?php woocommerce_catalog_ordering(); ?>
		</div>
		<?php
	}
}

/**
 * Tokoo single product sale flash
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_single_product_sale_flash() {
	if ( false == pustaka_get_option( 'product_single_sale_flash' ) ) {
		woocommerce_show_product_sale_flash();
	}
}

/**
 * Tokoo single product price
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_single_price() {
	if ( false == pustaka_get_option( 'product_single_price' ) ) {
		woocommerce_template_single_price();
	}
}

/**
 * Tokoo single product add to cart
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_single_add_to_cart() {
	if ( false == pustaka_get_option( 'product_single_add_to_cart' ) ) {
		woocommerce_template_single_add_to_cart();
	}
}

/**
 * Tokoo single product excerpt
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_single_excerpt() {
	if ( false == pustaka_get_option( 'product_single_excerpt' ) ) {
		woocommerce_template_single_excerpt();
	}
}

/**
 * Tokoo single product meta
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_single_meta() {
	if ( false == pustaka_get_option( 'product_single_meta' ) ) {
		woocommerce_template_single_meta();
	}
}

/**
 * Tokoo single product rating
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_single_rating() {
	if ( false == pustaka_get_option( 'product_single_rating' ) ) {
		woocommerce_template_single_rating();
	}
}

/**
 * Tokoo related product
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_display_related_product() {
	$related_product_per_page = pustaka_get_option( 'related_product_per_page' );
	$related_product_per_page = ( $related_product_per_page ) ? $related_product_per_page : 6;
	if ( false == pustaka_get_option( 'product_related' ) ) {
		woocommerce_related_products( $args = array( 'posts_per_page' => $related_product_per_page ), $columns = 1 );
	}
}

/**
 * Tokoo upsells product
 * not used in LeCrafts
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_display_upsells_product() {
	$upsells_product_per_page = pustaka_get_option( 'upsell_product_per_page', 6 );
	if ( false == pustaka_get_option( 'product_upsells' ) ) {
		woocommerce_upsell_display( $posts_per_page  = $upsells_product_per_page , $columns = 4 );
	}
}

/**
 * Tokoo cross sells product
 *
 * @since  2.0
 * @author tokoo
 */
 function pustaka_display_cross_sells_product() {
	$cross_sells_product_per_page = pustaka_get_option( 'cross_sells_product_per_page', 6 );
	if ( false == pustaka_get_option( 'product_cross_sells' ) ) {
		woocommerce_cross_sell_display( $cross_sells_product_per_page , 6 );
	}
}

/**
 * Display product tabs
 *
 * @return void
 * @author tokoo
 **/
function pustaka_display_single_product_tabs() {
	$single_product_tabs = pustaka_get_option( 'product_tabs' );
	if ( false == $single_product_tabs ) {
		woocommerce_output_product_data_tabs();
	}
}


/**
 *
 */
add_action( 'init', 'pustaka_ini_woo_setting_options' );
function pustaka_ini_woo_setting_options() {

	/* Disable sale flash on product page */
	if ( true == pustaka_get_option( 'product_sale_flash' ) ) {
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	}

	/* Disable star rating on product page */
	if ( true == pustaka_get_option( 'product_star_rating' ) ) {
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	}

	/* Disable product price */
	if ( true == pustaka_get_option( 'product_price' ) ) {
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	}

	/* Disable add_to_cart on shop page */
	if ( true == pustaka_get_option( 'product_add_to_cart' ) ) {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	}

	/* Disable result count on shop page */
	if ( true == pustaka_get_option( 'product_result_count' ) ) {
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	}

	/* Disable catalog ordering on shop page */
	if ( true == pustaka_get_option( 'product_catalog_ordering' ) ) {
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	}

	/* Disable sale flash on single shop */
	if ( true == pustaka_get_option( 'product_single_sale_flash' ) ) {
		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	}

	/* Disable price on single shop */
	if ( true == pustaka_get_option( 'product_single_price' ) ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	}

	/* Disable add to cart on single shop */
	if ( true == pustaka_get_option( 'product_single_add_to_cart' ) ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	}

	/* Disable excerpt on single shop */
	if ( true == pustaka_get_option( 'product_single_excerpt' ) ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	}

	/* Disable meta on single shop */
	if ( true == pustaka_get_option( 'product_single_meta' ) ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	}

	/* Disable rating on single shop */
	if ( true == pustaka_get_option( 'product_single_rating' ) ) {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	}

	/* Disable related product */
	if ( pustaka_get_option( 'product_related' ) ) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	}

	/* Related Product Title Change */
	if ( pustaka_get_option( 'related_product_title' ) ) {
		add_filter( 'woocommerce_related_products_title', 'pustaka_related_product_title', 10 );
		function pustaka_related_product_title() {
			echo pustaka_get_option( 'related_product_title' );
		}
	}

	/* Disable upsell product */
	if ( pustaka_get_option( 'product_upsells' ) ) {
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	}

	/* UpSells Product Title change */
	if ( pustaka_get_option( 'upsell_product_title' ) ) {
		add_filter( 'woocommerce_upsells_products_title', 'pustaka_upsell_product_title', 10 );
		function pustaka_upsell_product_title() {
			echo pustaka_get_option( 'upsell_product_title' );
		}
	}

	/* Cross Sells Product Display or Not */
	if ( true == pustaka_get_option( 'product_cross_sells' ) ) {
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
	}
}

/**
 * Shop Featured images
 */
function pustaka_template_loop_product_thumbnail( $size = 'full' ) {
	// default placeholder
	if ( wc_placeholder_img_src() ) {
		$featured_image = wc_placeholder_img_src( 'shop_catalog' );
	} else {
		$featured_image = PUSTAKA_THEME_ASSETS_URI . '/img/imgo2.jpg';
	}

	if ( has_post_thumbnail() ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $size, false );
		if ( $image ) {
			$featured_image = $image[0];
		}
	}
	return $featured_image;
}

/**
 * Category loop thumbnail
 * cloned from original woocommerce_subcategory_thumbnail()
 */
function pustaka_woocommerce_subcategory_thumbnail( $category ) {
	$thumbnail_id  = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );

	if ( $thumbnail_id ) {
		$image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
		$image = $image[0];
	} else {
		$image = wc_placeholder_img_src();
	}

	if ( $image ) {
		// Prevent esc_url from breaking spaces in urls for image embeds
		// Ref: http://core.trac.wordpress.org/ticket/23605
		$image = str_replace( ' ', '%20', $image );
		?>
		<div class="featured-image card-image-bg" data-bg-image="<?php echo esc_url( $image ); ?>"></div>
		<?php
	}
}

add_filter( 'woocommerce_product_tabs', 'pustaka_modify_product_tabs', 98 );
function pustaka_modify_product_tabs( $tabs ) {
	global $product, $post;

	$get_product_type 	= get_post_meta( get_the_ID(), 'wcbs_product_type', true );
	$get_default_type 	= get_theme_mod( 'pustaka_product_default_type', 'regular' );
	$product_type 		= ! empty( $get_product_type ) ? $get_product_type : $get_default_type;
	
	switch ( $product_type ) {
		case 'book':
				$tab_title = esc_html__( 'Book Details', 'pustaka' );	
			break;
		case 'movie':
				$tab_title = esc_html__( 'Movie Details', 'pustaka' );
			break;
		case 'game':
				$tab_title = esc_html__( 'Game Details', 'pustaka' );
			break;
		case 'audio':
				$tab_title = esc_html__( 'Audio Details', 'pustaka' );
			break;
		default:
				$tab_title = esc_html__( 'Product Details', 'pustaka' );
			break;
	}

	if (  $product->has_attributes() || $product->has_dimensions() || $product->has_weight() ) {
		$tabs['additional_information']['title'] 	= $tab_title;
	}

	return $tabs;
}

add_filter( 'woocommerce_subcategory_count_html', 'pustaka_remove_tanda_kurung_count_category', 10, 2 );
function pustaka_remove_tanda_kurung_count_category( $html, $category ) {
	return '<mark class="count">'.$category->count.'</mark>';
}

add_action( 'woocommerce_single_product_summary', 'pustaka_add_social_share_and_wishlist', 33 );
function pustaka_add_social_share_and_wishlist() {
	?>
	<div class="product-bookmark">
		<?php if ( false == pustaka_get_option( 'product_single_wishlist' ) ) {
			if ( class_exists( 'YITH_WCWL' ) ) : ?>
				<?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?>
			<?php endif; 
		} ?>
		<?php pustaka_custom_social_share(); ?>
	</div>
	<?php 
}

function pustaka_is_product_view_by_type() {
	if ( isset( $_GET['product_type'] ) || isset( $_GET['product_type'] ) || isset( $_GET['product_type'] ) || isset( $_GET['product_type'] ) || isset( $_GET['product_type'] ) ) {
		return 'yes';
	} else {
		return 'no';
	}
}

add_action( 'woocommerce_product_query', 'pustaka_modify_woocommerce_query_for_search' );
function pustaka_modify_woocommerce_query_for_search( $query ) {

	if ( ! is_admin() && is_post_type_archive( 'product' ) ) {

		if ( isset( $_GET['ISBN'] ) ) {
			$isbn 		= isset( $_GET['ISBN'] ) ? $_GET['ISBN'] : '';
			$pub_month 	= isset( $_GET['pub_month'] ) ? $_GET['pub_month'] : '';
			$pub_year 	= isset( $_GET['pub_year'] ) ? $_GET['pub_year'] : '';

			$meta_query[] = array(
				'key'       => '_product_attributes',
				'value'     => serialize( strval( $isbn ) ),
				'compare'   => 'LIKE',    
			);

			$query->set( 'meta_query', $meta_query );
		}

	}

}

add_action( 'woocommerce_product_query', 'pustaka_modify_woocommerce_query_for_product_type' );
function pustaka_modify_woocommerce_query_for_product_type( $query ) {

	if ( ! is_admin() && is_post_type_archive( 'product' ) ) {

		$meta_query = array();
		if ( isset( $_GET['product_type'] ) && 'book' == $_GET['product_type'] ) {
			$meta_query[] = array(
				'key'       => 'wcbs_product_type',
				'value'     => 'book',
				'compare'   => '==',    
			);
		}

		if ( isset( $_GET['product_type'] ) && 'movie' == $_GET['product_type'] ) {
			$meta_query[] = array(
				'key'       => 'wcbs_product_type',
				'value'     => 'movie',
				'compare'   => '==',    
			);
		}

		if ( isset( $_GET['product_type'] ) && 'music' == $_GET['product_type'] ) {
			$meta_query[] = array(
				'key'       => 'wcbs_product_type',
				'value'     => 'audio',
				'compare'   => '==',    
			);
		}

		if ( isset( $_GET['product_type'] ) && 'game' == $_GET['product_type'] ) {
			$meta_query[] = array(
				'key'       => 'wcbs_product_type',
				'value'     => 'game',
				'compare'   => '==',    
			);

		}
		$query->set( 'meta_query', $meta_query );
	}

}

/**
 * Display thumbnail by product type
 *
 * @return void
 * @author tokoo
 **/
function pustaka_display_thumbnail_by_product_type() {
	$get_product_type 	= get_post_meta( get_the_ID(), 'wcbs_product_type', true );
	$get_default_type 	= get_theme_mod( 'pustaka_product_default_type', 'regular' );
	$product_type 		= ! empty( $get_product_type ) ? $get_product_type : $get_default_type;
	
	switch ( $product_type ) {
		case 'book':
			if ( function_exists( 'wcbs_books_display_single_product_image' ) ) {
				wcbs_books_display_single_product_image();
			}
			break;
		case 'movie':
			if ( function_exists( 'wcbs_movie_display_single_product_image' ) ) {
				wcbs_movie_display_single_product_image();
			}
			break;
		case 'game':
			if ( function_exists( 'wcbs_game_display_single_product_image' ) ) {
				wcbs_game_display_single_product_image();
			}
			break;
		case 'audio':
			if ( function_exists( 'wcbs_audio_display_single_product_image' ) ) {
				wcbs_audio_display_single_product_image();
			}
			break;
		default:
			woocommerce_show_product_images();
			break;
	}
}

add_action( 'woocommerce_single_product_summary', 'pustaka_display_playlist_for_non_external_product', 11 );
function pustaka_display_playlist_for_non_external_product() {
	$get_audio 	= get_post_meta( get_the_ID(), 'wcbs_audio_details', true );
	$product 	= wc_get_product( get_the_ID() );
	
	if ( $product->is_type( 'external' ) && ! empty( $get_audio['audio_ids'] ) ) : 
	
		$ids = array();
		foreach ( $get_audio['audio_ids'] as $file ) :
			$ids[] = attachment_url_to_postid( $file['id'] );
		endforeach; 

		if ( ! empty( $ids ) ) {
			echo do_shortcode( '[playlist ids="'.implode( ',', $ids ).'"]' );
		}

	endif;
}

add_filter( 'single_product_archive_thumbnail_size', 'pustaka_modify_shop_catalog_image_size' );
function pustaka_modify_shop_catalog_image_size() {
	$get_product_type 	= get_post_meta( get_the_ID(), 'wcbs_product_type', true );
	$get_default_type 	= get_theme_mod( 'pustaka_product_default_type', 'regular' );
	$product_type 		= ! empty( $get_product_type ) ? $get_product_type : $get_default_type;

	switch ( $product_type ) {
		case 'book':
		case 'movie':
		case 'game':
			$image_size = 'shop_catalog';
			break;
		case 'audio':
			$image_size = 'pustaka_shop_catalog_square';
			break;
		default:
			$image_size = 'shop_catalog';
			break;
	}

	return $image_size;
}

/**
 * Product thumbnail override using lazyload
 *
 * @return void
 * @author tokoo
 **/
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'pustaka_wc_get_product_thumbnail', 10 );
function pustaka_wc_get_product_thumbnail( $size = 'shop_catalog' ) {
		global $post;
		$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

		if ( has_post_thumbnail() ) {
			$custom_size 		= get_post_meta( get_the_ID(), 'pustaka_product_image_dimension', true );
			$get_default_type	= get_theme_mod( 'pustaka_product_default_type', 'regular' );
			$get_product_type 	= get_post_meta( get_the_ID(), 'wcbs_product_type', true );
			$get_product_type 	= ! empty( $get_product_type ) ? $get_product_type : $get_default_type;
			$img_src 			= wp_get_attachment_image_src( get_post_thumbnail_id(), 'shop_catalog' );
			$size 				= wc_get_image_size( 'shop_catalog' );
			$width 				= $size['width'];
			$height 			= $size['height'];
			$alt 				= get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );

			if ( 'book' == $get_product_type ) {
				if ( ! empty( $custom_size['width'] ) && ! empty( $custom_size['height'] ) ) {
					$width 		= $custom_size['width'];
					$height 	= $custom_size['height'];
					$img_url 	= pustaka_resize( $img_src[0], $width, $height );
				} else {
					$width 		= $size['width'];
					$height 	= $size['height'];
					$img_url 	= $img_src[0];
				}
			} else {
				$width 		= $size['width'];
				$height 	= $size['height'];
				$img_url 	= $img_src[0];
			}
			
			if ( ! $height ) {
				$padding_bottom = '100';
			} else {
				$padding_bottom = ($height/$width)*100 ;
			}
			echo '<span class="intrinsic-ratio" style="padding-bottom:'. $padding_bottom . '%"><img class="pustaka-lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-original="'.$img_url.'" width="'.$width.'" height="'.$height.'" alt="'.$alt.'"></span>';
		} elseif ( wc_placeholder_img_src() ) {
			return wc_placeholder_img( $image_size );
		}
	}

/**
 * Pustaka wishlist button on shop page
 *
 * @return void
 * @author tokoo
 **/

function pustaka_display_quickview() {
	if ( false == pustaka_get_option( 'product_quickview' ) ) {
		if ( class_exists( 'YITH_WCQV' ) ) : 
			$label = esc_html( get_option( 'yith-wcqv-button-label' ) );
			echo '<button class="button yith-wcqv-button" data-product_id="' . get_the_ID() . '"><span>'.$label.'</span></button>';
		endif;
	}
}

add_action( 'dokan_process_product_meta', 'wcbs_multiple_products_save_meta_frontend' );
add_action( 'dokan_new_product_added', 'wcbs_multiple_products_save_meta_frontend' );
function wcbs_multiple_products_save_meta_frontend( $post_id ) {   
	// verify nonce
	 if ( isset( $_POST['dokan_update_product'] ) && wp_verify_nonce( $_POST['dokan_edit_product_nonce'], 'dokan_edit_product' ) ) {
		if ( isset( $_POST['wcbs_product_type'] ) && ! empty( $_POST['wcbs_product_type'] ) ) {
			update_post_meta( $post_id, 'wcbs_product_type', $_POST['wcbs_product_type'] );
		}
	 }
}

/**
 * Post Where
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'posts_where', 'pustaka_search_where' );
function pustaka_search_where( $where ) {
	global $wpdb;
	if ( is_search() )
		$where .= "OR (t.name LIKE '%".get_search_query()."%' AND {$wpdb->posts}.post_status = 'publish')";
	return $where;
}

/**
 * Search Join
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'posts_join', 'pustaka_search_join' );
function pustaka_search_join( $join ) {
	global $wpdb;
	if ( is_search() )
		$join .= "LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id=tr.term_taxonomy_id INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id";

	return $join;
}

/**
 * Group by
 *
 * @return void
 * @author toko
 **/
add_filter( 'posts_groupby', 'pustaka_search_groupby' );
function pustaka_search_groupby( $groupby ) {
	global $wpdb;
	// we need to group on post ID
	$groupby_id = "{$wpdb->posts}.ID";
	if ( ! is_search() || strpos( $groupby, $groupby_id ) !== false ) return $groupby;

	// groupby was empty, use ours
	if ( ! strlen( trim( $groupby ) ) ) return $groupby_id;

	// wasn't empty, append ours
	return $groupby.", ".$groupby_id;
}

/**
 * Post meta search join
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'posts_join', 'pustaka_post_meta_search_join' );
function pustaka_post_meta_search_join( $join ) {
	global $wpdb;

	if ( is_search() ) {    
		$join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	}

	return $join;
}


/**
 * Post meta search where
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'posts_where', 'pustaka_post_meta_search_where' );
function pustaka_post_meta_search_where( $where ) {
	global $pagenow, $wpdb;

	if ( is_search() ) {
		$where = preg_replace(
			"/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
			"(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
	}
	return $where;
}


/**
 * Post meta search where
 *
 * @return void
 * @author tokoo
 **/
add_filter( 'posts_distinct', 'pustaka_post_meta_search_distinct' );
function pustaka_post_meta_search_distinct( $where ) {
	global $wpdb;

	if ( is_search() ) {
		return "DISTINCT";
	}

	return $where;
}

 

