<?php 

/*-----------------------------------------------------------------------------------*/
/*	Products Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );
?>

<div class="product-grid grid-layout columns-<?php echo esc_attr( $columns ); ?>">
	<?php 
		$args = array(
			'post_type'			=> 'product',
			'posts_per_page'	=> $limit,
			'orderby'			=> $orderby,
			'order'				=> $order,
			'meta_query'		=> WC()->query->get_meta_query(),
			'post__in' 			=> array_merge( array( 0 ), wc_get_product_ids_on_sale() ),
		);

		$products = new WP_Query( $args );
	 ?>

	<?php if ( $products->have_posts() ) : ?>
		<?php while ( $products->have_posts() ) : $products->the_post(); ?>
	 		<?php wc_get_template_part( 'content', 'product-for-king' ); ?>
	 	<?php endwhile; ?>
	 	<?php wp_reset_postdata(); ?>
		<?php else: ?>
			<?php wc_get_template( 'loop/no-products-found.php' ); ?>
	 <?php endif; ?>
</div>