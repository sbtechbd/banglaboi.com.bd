<?php


if ( class_exists( 'Tokoo_Widget' ) && class_exists( 'WooCommerce' ) ) {

// Create custom widget class extending WPH_Widget
class Pustaka_WC_Best_Selling_Products extends Tokoo_Widget {

	function __construct() {

		$args = array(
			'label' 		=> esc_html__( 'WooCommerce Best Selling Product', 'pustaka' ),
			'description' 	=> esc_html__( 'A custom widget to display best selling product', 'pustaka' ),
		 );

		// fields array
		$args['fields'] = array(

			// Title field
			array(
				'name' 		=> esc_html__( 'Title', 'pustaka' ),
				'desc' 		=> esc_html__( 'Enter the widget title.', 'pustaka' ),
				'id' 		=> 'title',
				'type' 		=> 'text',
				'class' 	=> 'widefat',
				'std' 		=> esc_html__( 'Best Selling Products', 'pustaka' ),
				'validate' 	=> 'alpha_dash',
				'filter' 	=> 'strip_tags|esc_attr'
			 ),

			 // Show Post Count
			array(
				'name' 		=> esc_html__( 'Limit', 'pustaka' ),
				'desc' 		=> esc_html__( 'Limit product display', 'pustaka' ),
				'id' 		=> 'limit',
				'type'		=> 'text',
				'class' 	=> 'widefat',
				'std' 		=> '5',
			 ),

		 ); // fields array

		$args['options'] 	= array(
				'width'		=> 350,
				'height'	=> 350
			);

		// create widget
		$this->create_widget( $args );
	}


	// Output function
	function widget( $args, $instance ) {

		extract( $args );

		$title 		= apply_filters( 'widget_title', $instance['title'] );
		$limit 		= ! empty( $instance['limit'] ) ? $instance['limit'] : 5;

		printf( $args['before_widget'] );

		if ( $title ) {
			printf( '%s %s %s', $args['before_title'], $title, $args['after_title'] );
		}

		echo '<ul class="product_list_widget">';

		$product_args = array(
			'post_type' 		=> 'product',
			'posts_per_page'	=> $limit,
			'order'				=> 'DESC',
			'meta_key' 			=> 'total_sales',
			'orderby' 			=> 'meta_value_num',
			'meta_query' 		=> WC()->query->get_meta_query(),
		);
		$products = new WP_Query( $product_args );
		$loop = 1;
		if ( $products->have_posts() ) : while ( $products->have_posts() ) : $products->the_post();
			wc_get_template( 'content-widget-best-selling-products.php', array( 'loop' => $loop ) );
		$loop++; endwhile;
		endif;

		echo '</ul>';

		printf( $args['after_widget'] );
	}

} // class

}
