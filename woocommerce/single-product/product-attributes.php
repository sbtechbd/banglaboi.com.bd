<?php
/**
 * Product attributes
 * 
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
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
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<table class="shop_attributes">
	<?php if ( $display_dimensions && $product->has_weight() ) : ?>
		<tr>
			<th><?php _e( 'Weight', 'pustaka' ) ?></th>
			<td class="product_weight"><?php echo esc_html( wc_format_weight( $product->get_weight() ) ); ?></td>
		</tr>
	<?php endif; ?>

	<?php if ( $display_dimensions && $product->has_dimensions() ) : ?>
		<tr>
			<th><?php _e( 'Dimensions', 'pustaka' ) ?></th>
			<td class="product_dimensions"><?php echo esc_html( wc_format_dimensions( $product->get_dimensions( false ) ) ); ?></td>
		</tr>
	<?php endif; ?>

	<?php foreach ( $attributes as $attribute ) : ?>
		<tr>
			<th><?php echo wc_attribute_label( $attribute->get_name() ); ?></th>
			<td><?php
				$values = array();

				if ( $attribute->is_taxonomy() ) {
					$attribute_taxonomy = $attribute->get_taxonomy_object();
					$attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

					foreach ( $attribute_values as $attribute_value ) {
						$value_name = esc_html( $attribute_value->name );

						if ( $attribute_taxonomy->attribute_public ) {
							$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
						} else {
							$values[] = $value_name;
						}
					}
				} else {
					$values = $attribute->get_options();

					foreach ( $values as &$value ) {
						$value = make_clickable( esc_html( $value ) );
					}
				}

				echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
			?></td>
		</tr>
	<?php endforeach; ?>

	<?php 
		$authors 		= wp_get_object_terms( get_the_ID(), 'book_author' ); 
		if ( ! empty( $authors ) && ! is_wp_error( $authors ) ) { ?>
		
			<?php 
				$i 				= 0;
				$cats_length 	= count( $authors ); 
			?>

			<tr class="<?php if ( ( $alt = $alt * -1 ) == 1 ) echo 'alt'; ?>">
				<th><?php _e( 'Author', 'pustaka' ); ?></th>
				<td>
					<?php
						foreach ( $authors as $cat ) { 
							$separator = ( $i !== $cats_length - 1 ) ? ', ' : ''; ?>
							<a href="<?php echo get_term_link( $cat->slug, 'book_author' ); ?>"><p><?php echo esc_attr( $cat->name ) . $separator; ?></p></a>
						<?php $i++;
					}
					?>
				</td>
			</tr>
	<?php } ?>

	<?php 
		$publishers 	= wp_get_object_terms( get_the_ID(), 'book_publisher' ); 
		if ( ! empty( $publishers ) && ! is_wp_error( $publishers ) ) { ?>
			
			<?php 
				$i 				= 0;
				$pubs_length 	= count( $publishers ); 
			?>

			<tr class="<?php if ( ( $alt = $alt * -1 ) == 1 ) echo 'alt'; ?>">
				<th><?php _e( 'Publisher', 'pustaka' ); ?></th>
				<td>
					<?php
						foreach ( $publishers as $cat ) { 
							$separator = ( $i !== $pubs_length - 1 ) ? ', ' : ''; ?>
							<a href="<?php echo get_term_link( $cat->slug, 'book_publisher' ); ?>"><p><?php echo esc_attr( $cat->name ) . $separator; ?></p></a>
						<?php $i++;
					}
					?>
				</td>
			</tr>
	<?php } ?>

	<?php 
		$series 		= wp_get_object_terms( get_the_ID(), 'book_series' ); 
		if ( ! empty( $series ) && ! is_wp_error( $series ) ) { ?>
		
			<?php 
				$series_length 	= count( $series ); 
				$i 				= 0;
			?>
			
			<tr class="<?php if ( ( $alt = $alt * -1 ) == 1 ) echo 'alt'; ?>">
				<th><?php _e( 'Series', 'pustaka' ); ?></th>
				<td>
					<?php
						foreach ( $series as $cat ) { 
							$separator = ( $i !== $series_length - 1 ) ? ', ' : ''; ?>
							<a href="<?php echo get_term_link( $cat->slug, 'book_series' ); ?>"><p><?php echo esc_attr( $cat->name ); ?></p></a>
						<?php $i++;
					}
					?>
				</td>
			</tr>
	<?php } ?>

</table>
