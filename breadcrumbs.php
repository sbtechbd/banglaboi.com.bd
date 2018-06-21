<?php
/**
 * Tokoo breadcrumb
 *
 * @author 		tokoo
 * @version     2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


global $post, $wp_query;

// change any parameters needed here
$delimiter		= ' &#47; ';
$wrap_before	= '<div class="breadcrumbs">';
$wrap_after		= '</div>';
$before 		= '';
$after 			= '';
$curr_before	= '<span class="current">';
$curr_after		= '</span>';
$home 			= _x( 'Home', 'breadcrumb', 'pustaka' );


/* add conditional for WooCommerce */
if ( class_exists( 'woocommerce') ) {

	$prepend      = '';
	$permalinks   = get_option( 'woocommerce_permalinks' );
	$shop_page_id = wc_get_page_id( 'shop' );
	$shop_page    = get_post( $shop_page_id );

	// If permalinks contain the shop page in the URI prepend the breadcrumb with shop
	if ( $shop_page_id && $shop_page && strstr( $permalinks['product_base'], '/' . $shop_page->post_name ) && get_option( 'page_on_front' ) !== $shop_page_id ) {
		$prepend = $before . '<a href="' . esc_url( get_permalink( $shop_page ) ) . '">' . $shop_page->post_title . '</a> ' . $after . $delimiter;
	}

} // end of WooCommerce conditional


if ( ( ! is_home() && ! is_front_page() && ! ( is_post_type_archive() && ( function_exists( 'wc_get_page_id' ) && get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) ) ) || is_paged() ) {

	printf( '%s', $wrap_before );

	if ( ! empty( $home ) ) {
		echo ''.$before . '<a class="home" href="' . esc_url( home_url( '/' ) ) . '">' . $home . '</a>' . $after . $delimiter;
	}

	if ( is_category() ) {

		$cat_obj = $wp_query->get_queried_object();
		$this_category = get_category( $cat_obj->term_id );

		if ( $this_category->parent != 0 ) {
			$parent_category = get_category( $this_category->parent );
			echo get_category_parents($parent_category, TRUE, $delimiter );
		}

		echo ''.$before . $curr_before . single_cat_title( '', false ) . $curr_after . $after;

	} elseif ( is_tax( 'product_cat' ) ) {

		echo ''.$prepend;

		$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

		$ancestors = array_reverse( get_ancestors( $current_term->term_id, get_query_var( 'taxonomy' ) ) );

		foreach ( $ancestors as $ancestor ) {
			$ancestor = get_term( $ancestor, get_query_var( 'taxonomy' ) );

			echo ''.$before .  '<a href="' . esc_url( get_term_link( $ancestor->slug, get_query_var( 'taxonomy' ) ) ). '">' . esc_html( $ancestor->name ) . '</a>' . $after . $delimiter;
		}

		echo ''.$before . $curr_before . esc_html( $current_term->name ) . $curr_after . $after;

	} elseif ( is_tax( 'product_tag' ) ) {

		$queried_object = $wp_query->get_queried_object();
		echo ''.$prepend . $before . $curr_before . esc_html__( 'Products tagged &ldquo;', 'pustaka' ) . $queried_object->name . '&rdquo;' . $curr_after . $after;

	} elseif ( is_day() ) {

		echo ''.$before . '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $after . $delimiter;
		echo ''.$before . '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a>' . $after . $delimiter;
		echo ''.$before . $curr_before . get_the_time( 'd' ) . $curr_after . $after;

	} elseif ( is_month() ) {

		echo ''.$before . '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $after . $delimiter;
		echo ''.$before . $curr_before . get_the_time( 'F' ) . $curr_after . $after;

	} elseif ( is_year() ) {

		echo ''. $before . $curr_before . get_the_time( 'Y' ) . $curr_after . $after;

	} elseif ( is_post_type_archive( 'product' ) && get_option( 'page_on_front' ) !== $shop_page_id ) {

		$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';

		if ( ! $_name ) {
			$product_post_type = get_post_type_object( 'product' );
			$_name = $product_post_type->labels->singular_name;
		}

		if ( is_search() ) {

			echo ''.$before . '<a href="' . esc_url( get_post_type_archive_link( 'product' ) ) . '">' . $_name . '</a>' . $delimiter . $curr_before . esc_html__( 'Search results for &ldquo;', 'pustaka' ) . get_search_query() . '&rdquo;' . $curr_after . $after;

		} elseif ( is_paged() ) {

			echo ''.$before . '<a href="' . esc_url( get_post_type_archive_link( 'product' ) ) . '">' . $_name . '</a>' . $after;

		} else {

			echo ''.$before . $curr_before . $_name . $curr_after . $after;

		}

	} elseif ( is_single() && ! is_attachment() ) {

		if ( get_post_type() == 'product' ) {

			echo 'Product '.$prepend;

			echo ''.$before . $curr_before .  $curr_after . $after;

		} elseif ( get_post_type() != 'post' ) {
			$post_type 		= get_post_type_object( get_post_type() );
			$slug 			= $post_type->rewrite;

			$the_archive_link = get_post_type_archive_link( get_post_type() );
			echo ''.$before . '<a href="' . $the_archive_link . '">' . $post_type->labels->singular_name . '</a>' . $after . $delimiter;

			echo ''.$before . $curr_before . get_the_title() . $curr_after . $after;

		} else {

			// injecting from woo_breadcrumbs()
			$posts_page = get_option( 'page_for_posts' );
			if ( ! empty( $posts_page ) && is_numeric( $posts_page ) ) {
				echo ''.$before . '<a href="' . esc_url( get_permalink( $posts_page ) ) . '">' . get_the_title( $posts_page ) . '</a>' . $after . $delimiter;
			} else {
				$categories 	= get_the_category();
				$category_id 	= ! empty( $categories[0]->cat_ID ) ? $categories[0]->cat_ID : 1;
				$cat_parent 	= get_category_parents( $category_id, true, $delimiter );
				if ( is_wp_error( $cat_parent ) ) {
					echo '';
				} else {
					echo ''. $cat_parent;
				}
			}
			echo ''.$before . $curr_before . get_the_title() . $curr_after . $after;

		}

	} elseif ( is_404() ) {

		echo ''.$before . $curr_before . esc_html__( 'Error 404', 'pustaka' ) . $curr_after . $after;

	} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' ) {

		$post_type = get_post_type_object( get_post_type() );

		if ( $post_type )
			echo ''.$before . $curr_before . $post_type->labels->singular_name . $curr_after . $after;

	} elseif ( is_attachment() ) {

		$parent = get_post( $post->post_parent );
		$cat 	= get_the_category( $parent->ID );
		$cat 	= $cat[0];
		echo get_category_parents( $cat, true, '' . $delimiter );
		echo ''.$before . '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a>' . $after . $delimiter;
		echo ''.$before . $curr_before . get_the_title() . $curr_after . $after;

	} elseif ( is_page() && !$post->post_parent ) {

		echo ''.$before . $curr_before . get_the_title() . $curr_after . $after;

	} elseif ( is_page() && $post->post_parent ) {

		$parent_id  	= $post->post_parent;
		$breadcrumbs 	= array();

		while ( $parent_id ) {
			$page 			= get_page( $parent_id );
			$breadcrumbs[] 	= '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . get_the_title( $page->ID ) . '</a>';
			$parent_id  	= $page->post_parent;
		}

		$breadcrumbs = array_reverse( $breadcrumbs );

		foreach ( $breadcrumbs as $crumb )
			echo ''.$crumb . '' . $delimiter;

		echo ''.$before . $curr_before . get_the_title() . $curr_after . $after;

	} elseif ( is_search() ) {

		echo ''.$before . $curr_before . esc_html__( 'Search results for &ldquo;', 'pustaka' ) . get_search_query() . '&rdquo;' . $curr_after . $after;

	} elseif ( is_tag() ) {

			echo ''.$before . $curr_before . esc_html__( 'Posts tagged &ldquo;', 'pustaka' ) . single_tag_title('', false) . '&rdquo;' . $curr_after . $after;

	} elseif ( is_author() ) {

		$userdata = get_userdata($author);
		echo ''.$before . $curr_before . esc_html__( 'Author:', 'pustaka' ) . ' ' . $userdata->display_name . $curr_after . $after;

	}

	if ( get_query_var( 'paged' ) )
		echo ''. $curr_before . ' (' . esc_html__( 'Page', 'pustaka' ) . ' ' . get_query_var( 'paged' ) . ')' . $curr_after;

	printf( '%s', $wrap_after );

}