<?php

/**
 * Loads the admin styles & scripts.
 *
 * @since 1.0
 */
add_action( 'admin_enqueue_scripts', 'pustaka_admin_scripts' );
function pustaka_admin_scripts( $hook ) {
 
	/* Get theme version in style.css. */
	$theme = wp_get_theme( get_template(), get_theme_root( get_template_directory() ) );

	if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
		wp_enqueue_script( 'pustaka-metabox-control-page', PUSTAKA_THEME_URI . '/bootstrap/assets/js/page-metabox.js', array( 'jquery' ), '', true );
	}
	
	do_action( 'pustaka_admin_scripts' );
}

/**
 * Load widgets js
 *
 * @return void
 * @author tokoo
 **/
add_action( 'admin_enqueue_scripts', 'pustaka_widget_scripts' );
function pustaka_widget_scripts( $hook ) {
	if ( 'widgets.php' === $hook ) {
		wp_enqueue_media();
		wp_enqueue_script( 'pustaka_widgets', PUSTAKA_THEME_URI . '/bootstrap/assets/js/tokoo-widgets.js', array( 'jquery' ), '', true );
	}
}

/**
 * Load Shortcode scripts and styles
 *
 * @return void
 * @author
 **/
add_action( 'wp_enqueue_scripts', 'pustaka_koo_shortcodes_scripts' );
function pustaka_koo_shortcodes_scripts() {
	if ( class_exists( 'Koo_Shortcodes' ) ) {
		wp_enqueue_script( 'pustaka_shortcodes_scripts', PUSTAKA_THEME_URI . '/bootstrap/assets/js/koo-shortcodes.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'pustaka_shortcodes_style', PUSTAKA_THEME_URI . '/bootstrap/assets/css/koo-shortcodes.css' );
	}

}


/**
 * Get Font URL
 *
 * @return void
 * @author tokoo
 **/
function pustaka_fonts_url() {

	$fonts_url 		= '';
	$hind_guntur 	= _x( 'on', 'Open Sans font: on or off', 'pustaka' );
	$playfair 		= _x( 'on', 'Playfair Display font: on or off', 'pustaka' );
	 
	if ( 'off' !== $hind_guntur || 'off' !== $playfair ) {
		$font_families = array();
	 
		if ( 'off' !== $hind_guntur ) {
			$font_families[] = 'Open+Sans:300,400,500,600';
		}
		 
		if ( 'off' !== $playfair ) {
			$font_families[] = 'Playfair+Display:100,100italic,400,400italic,700';
		}
		 
		$query_args = array(
			'family' => implode( '|', $font_families ),
		);
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}
	 
	return esc_url_raw( $fonts_url );
}

/**
 * Loads the theme styles & scripts.
 *
 * @since 1.0
 */
add_action( 'wp_enqueue_scripts', 'pustaka_frontend_scripts', 99 );
function pustaka_frontend_scripts() {

	/* Get theme version in style.css. */
	$theme = wp_get_theme( get_template(), get_theme_root( get_template_directory() ) );

	/* Load parent style.css in child theme. */
	if ( is_child_theme() )
		wp_enqueue_style( 'pustaka-parent-style', PUSTAKA_THEME_ASSETS_URI . '/css/main.css', array(), $theme->Version );

	/* Load google fonts. */
	wp_enqueue_style( 'pustaka-fonts', pustaka_fonts_url(), array(), $theme->Version );

	/* Load main style.css */
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), $theme->Version );
	wp_enqueue_style( 'pustaka-style-main', PUSTAKA_THEME_ASSETS_URI . '/css/main.css', array(), $theme->Version );
	wp_enqueue_style( 'pustaka-style-font-icons', PUSTAKA_THEME_ASSETS_URI . '/css/font-icons.css', array(), $theme->Version );

	/* Load comment reply. */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' ); 
	}

	/* Load bundled jQuery. */
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-datepicker' );

	/* Load custom js plugins. */
	if ( is_page_template( 'templates/contact.php' ) || ( function_exists( 'kc_is_using' ) && kc_is_using() ) ) {
		$get_map_api_key 	= get_theme_mod( 'pustaka_map_api_key' );
		$map_api_key 		= ! empty( $get_map_api_key ) ? "?key={$get_map_api_key}" : '';
		wp_enqueue_script( "pustaka-google-maps-api", "//maps.googleapis.com/maps/api/js{$map_api_key}", array( 'jquery' ), $theme->Version, false );
	}

	if ( true == PUSTAKA_OPTIMIZE_MODE ) {
		$plugins_script = 'plugins.min'; 
		$main_script 	= 'main.min'; 
	} else {
		$plugins_script = 'plugins'; 
		$main_script 	= 'main';
	}
	wp_register_script( 'pustaka-plugins', PUSTAKA_THEME_ASSETS_URI . '/js/'.$plugins_script.'.js', array( 'jquery' ), $theme->Version, true );

	/* Load custom js method. */
	wp_register_script( 'pustaka-main', PUSTAKA_THEME_ASSETS_URI . '/js/'.$main_script.'.js', array( 'jquery', 'pustaka-plugins' ), $theme->Version, true );

	wp_enqueue_script( 'pustaka-plugins' );
	wp_enqueue_script( 'pustaka-main' );

	wp_enqueue_script( 'wc-password-strength-meter' );
	
	if ( class_exists( 'Dokan_Scripts' ) ) {
		// WeDevs_Dokan::init()->load_form_validate_script();
  //       WeDevs_Dokan::init()->load_gmap_script();
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'dokan-tooltip' );
		wp_enqueue_script( 'dokan-chosen' );
		wp_enqueue_script( 'dokan-form-validate' );
		wp_enqueue_script( 'dokan-script' );
		wp_enqueue_script( 'dokan-select2-js' );
	}
	

	wp_localize_script( 'pustaka-main' , 'pustaka_translate', array(
		'days'		=> esc_html__( 'days', 'pustaka' ),
		'hr'		=> esc_html__( 'hr', 'pustaka' ),
		'min'		=> esc_html__( 'min', 'pustaka' ),
		'sec'		=> esc_html__( 'sec', 'pustaka' ),
	) );

	$accent_color_1 = get_theme_mod( 'pustaka_accent_color_1', '#DB1037' );
	$accent_color_2 = get_theme_mod( 'pustaka_accent_color_2', '#CD40E6' );
	wp_localize_script( 'pustaka-main', 'pustaka_js_var',
		array( 
			'accent_color_1' => $accent_color_1,
			'accent_color_2' => $accent_color_2,
		)
	);
}

add_action( 'wp_head', 'pustaka_customizer_print_out_css', 20 );
function pustaka_customizer_print_out_css() {
	$accent_color_1 		= get_theme_mod( 'pustaka_accent_color_1', '#DB1037' );
	$accent_color_2 		= get_theme_mod( 'pustaka_accent_color_2', '#CD40E6' );
	$background_color 		= get_theme_mod( 'pustaka_body_color', '#f6f6f6' );
	$text_color     		= get_theme_mod( 'pustaka_text_color', '#616161' );
	// $heading-color    : #222; //#2B2B2B
	
	// Fonts
	$global_font_size  		=  get_theme_mod( 'pustaka_global_font_size', '16px' );
	$body_font  			=  get_theme_mod( 'pustaka_body_font', 'Open Sans' );
	$heading_font 			=  get_theme_mod( 'pustaka_heading_font', 'Playfair Display' );

	$body_font_weight    	= get_theme_mod( 'pustaka_body_font_weight', '400' ); 
	$body_letter_spacing 	= get_theme_mod( 'pustaka_body_letter_spacing', '0' );
	$body_line_height    	= get_theme_mod( 'pustaka_body_line_height', '1.8' );

	$heading_font_weight 	= get_theme_mod( 'pustaka_heading_font_weight', 400 );
	$heading_letter_spacing = get_theme_mod( 'pustaka_heading_letter_spacing', 0 );

	$styles = '';
	$styles .="
		.hamburger-inner,
		.hamburger-inner::before, .hamburger-inner::after{
			background-image : linear-gradient(-90deg, $accent_color_1, $accent_color_2);
		}
		.page-header-bg .bg:before{
			background: linear-gradient($accent_color_1, $accent_color_2);
		}
		.post-grid .post__inner:after, .post-masonry .post__inner:after,
		.hdr-widget--product-search .product-search-input .line,
		.user-auth-box .user-auth-box-content:before{
			background-image: linear-gradient(90deg, transparent, $accent_color_1, $accent_color_2, $accent_color_1, transparent);
		}
		.menu-main-wrapper .menu > .menu-item a:before,
		.menu-user-wrap .menu> .menu-item a:after{
			background-image: linear-gradient(90deg, $accent_color_1, $accent_color_2);
		}
		.menu-main-wrapper .menu-item.mega-menu > .sub-menu .sub-menu a:after,
		.widget_search form input[type='submit'],
		.product-list .product__image .onsale,
		.wc_payment_methods.payment_methods .wc_payment_method label:after,
		.woocommerce-pagination ul.page-numbers .page-numbers.current{
			background-color: $accent_color_1;
		}
		.button:hover, .comment-respond .form-submit input:hover, input[type='submit']:hover, input[type='reset']:hover,
		input[type='submit'].dokan-btn-theme:hover, .dokan-btn-theme:hover, input[type='submit']:hover, input[type='reset']:hover{
			border-color: $accent_color_1;
			color: $accent_color_2;
		}

		.button:hover,
		.product__detail-nav li.active a, .product__detail-nav li:hover a,
		.user-auth-box .user-auth-box-content .tokoo-popup__close,
		.wc_payment_methods.payment_methods .wc_payment_method label:before,
		input[type='submit'].dokan-btn-theme, .dokan-btn-theme, input[type='submit'], input[type='reset']
		{
			border-color: $accent_color_1;
		}
		.hdr-widget--site-logo a,
		.hdr-widget-dropdown-menu .menu-item:hover > a,
		.site-footer a,
		.product-list .product__price,
		.widget.widget_price_filter .price_slider_amount .price_label span{
			color: $accent_color_1;
		}
		.hdr-widget-dropdown-menu .sub-menu .menu-item a:before,
		.hdr-widget-dropdown-menu .menu > .menu-item > a:before,
		.widget.widget_price_filter .price_slider.ui-slider .ui-slider-range{
			background-image: linear-gradient(90deg, $accent_color_1, $accent_color_2);
		}
		
		.product-grid .product__action .button, .product-grid .product__action .comment-respond .form-submit input, .comment-respond .form-submit .product-grid .product__action input, .product-grid .product__action .widget.widget_product_search input[type=\"submit\"], .widget.widget_product_search .product-grid .product__action input[type=\"submit\"],
		.added_to_cart.wc-forward,
		.product-grid .product__price,
		.product-overview .product-action .price,
		.book-images .book__action button [class*=\"ico\"], .book-images .book__action .see-inside [class*=\"ico\"],
		.product__detail-nav li.active a, .product__detail-nav li:hover a,
		.menu-main-wrapper .menu-item:not(.mega-menu) .sub-menu li:hover > a,
		.widget.widget_shopping_cart .quantity,
		.widget.widget_shopping_cart .total .amount
		{ 
			color: $accent_color_1;
		}

		
		.tagcloud a,
		.section-header:after,
		.product-grid .product .onsale{
			background-color: $accent_color_2;
		}
		
		.button, .comment-respond .form-submit input, .widget.widget_product_search input[type=\"submit\"], input[type=\"submit\"], input[type=\"reset\"]{
			border-color: $accent_color_2;
		}
		
		.hdr-widget--menu-cart .menu-cart-trigger .cart-count,
		.button:hover,
		.star-rating span:before,
		.star-rating span:before,
		.single-post .post__meta a,
		.product-layout-view a:hover, .product-layout-view a.active,
		.hdr-widget--product-search .fa,
		.hdr-widget--menu-cart .menu-cart-trigger,
		.post-grid .post__meta span a:hover, .post-masonry .post__meta span a:hover,
		.widget.widget_shopping_cart .quantity,
		.widget.widget_shopping_cart .total .amount
		{
			color: $accent_color_2;
		}

		
		body{
			font-family    : $body_font;
			font-size      : $global_font_size;
			font-weight    : $body_font_weight;
			letter-spacing : $body_letter_spacing;
			line-height    : $body_line_height;
			background-color: $background_color;
			color: $text_color;
		}

		
		h1,h2,h3,h4,h5,h6,
		.single-post .post__title,
		.widget-title,
		.page-header .page-title{
			font-family: $heading_font;
			font-weight    : $heading_font_weight;
			letter-spacing : $heading_letter_spacing;
		}
	";

	$styles = "\n".'<style type="text/css">'.trim( $styles ).'</style>'."\n";
	printf( '%s', $styles );
}

