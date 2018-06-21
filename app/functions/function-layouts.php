<?php

/**
 * Wrapper Class Handles
 *
 * @return void
 * @author tokoo
 **/
function pustaka_wrapper_class_handles() {
	$get_layouts 	= pustaka_get_meta( '_layouts_details' ); 

	if ( ! empty( $get_layouts['theme_layouts'] ) ) {
		switch ( $get_layouts['theme_layouts'] ) {
			case 'left-sidebar':
				echo esc_attr( 'has-sidebar layout-left-sidebar' );
				break;
			case 'right-sidebar':
				echo esc_attr( 'has-sidebar layout-right-sidebar' );
				break;
			default:
				echo '';
				break;
		}
	}
}

/**
 * Column Class Handles
 *
 * @return void
 * @author tokoo
 **/
function pustaka_columns_class_handles() {
	$get_layouts 	= pustaka_get_meta( '_layouts_details' ); 
	
	if ( ! empty( $get_layouts['theme_layouts'] ) ) {
		switch ( $get_layouts['theme_layouts'] ) {
			case 'left-sidebar':
			case 'right-sidebar':
				echo esc_attr( 'col-md-8' );
				break;
			default:
				echo esc_attr( 'col-md-12' );
				break;
		}
	}

}

/**
 * Post holder columns
 *
 * @return void
 * @author tokoo
 **/
function pustaka_post_holder_columns() {
	if ( pustaka_is_has_sidebar() ) {
		echo 'columns-2';
	} else {
		echo '';
	}

}

/**
 * undocumented function
 *
 * @return void
 * @author 
 **/
function pustaka_is_has_sidebar() {
	$get_layouts 	= pustaka_get_meta( '_layouts_details' ); 
	if ( ! empty( $get_layouts['theme_layouts'] ) && ( 'left-sidebar' == $get_layouts['theme_layouts'] || 'right-sidebar' == $get_layouts['theme_layouts'] ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * undocumented function
 *
 * @return void
 * @author 
 **/
function pustaka_print_filter_class_alphabet( $string = '' ) {
	if ( ! empty( $string ) ) {
		$string = $string[0];
		echo $string;
	}
}

/**
 * Get page title background Image
 *
 * @return void
 * @author tokoo
 **/
function pustaka_get_page_title_background_image_src() {
	if ( function_exists( 'carbon_get_term_meta' ) ) {
		$id 				= get_queried_object_id();
		$get_tax_bg_img_id 	= carbon_get_term_meta( $id, 'pustaka_tax_page_title_background' );
		$get_bg_image_src 	= wp_get_attachment_image_src( $get_tax_bg_img_id, 'full' );
		
		if ( ! empty( $get_tax_bg_img_id ) ) {
			return $get_bg_image_src[0];
		} else {
			return null;
		}
	}
}
