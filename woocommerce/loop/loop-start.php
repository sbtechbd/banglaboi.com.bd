<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */
$get_shop_loop_columns 	= get_theme_mod( 'pustaka_product_shop_loop_columns', 4 );
$get_default_layout 	= get_theme_mod( 'pustaka_product_default_layout', 'grid' );
$product_layout 		= isset( $_GET['layout'] ) ? $_GET['layout'] : $get_default_layout;

if ( 'list' == $product_layout ) {
	echo '<div class="product-list">';
} else {
	echo '<div class="product-grid grid-layout columns-'.$get_shop_loop_columns.'">';
}
?>

