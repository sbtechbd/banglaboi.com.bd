<?php 

/*-----------------------------------------------------------------------------------*/
/*	Products sales countodwn list Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
?>

<div class=" <?php echo implode( ' ', $master_class ); ?>">

	<?php if ( ! empty( $product_ids ) ) : ?>
		<?php 
			$get_end_date 		= wcbs_get_wc_value( get_the_ID(), 'wcbs_product_sales_countdown_end' );
			$end_date 			= ! empty( $get_start_date ) ? $get_start_date : '';
			$args = array(
				'post_type'		=> 'product', 
				'order'			=> 'DESC',
				'page_id'		=> $product_ids,
				'orderby'		=> 'meta_value_num',
			);
			$the_products 	= new WP_Query( $args );
			$counter 		= 1;
		 ?>
		<?php if ( $the_products->have_posts() ) : ?>

			<?php while ( $the_products->have_posts() ) : $the_products->the_post(); ?>
				
				<?php wc_get_template_part( 'content', 'single-product-for-king' ); ?>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

		<div class="deal-tab-grid">
			<ul class="deal-tab-nav">
				<li class="active"><a href="#popular-deal"><?php esc_html_e( 'Popular', 'pustaka' ); ?></a></li>
				<li><a href="#newest-deal"><?php esc_html_e( 'Newest', 'pustaka' ); ?></a></li>
				<li><a href="#under10-deal"><?php esc_html_e( '$10 and Under', 'pustaka' ); ?></a></li>
			</ul>
			<div class="deal-tab-content">
				<div class="deal-tab-pane active" id="popular-deal">
					<?php 
						$get_end_date 		= wcbs_get_wc_value( get_the_ID(), 'wcbs_product_sales_countdown_end' );
						$end_date 			= ! empty( $get_end_date ) ? $get_end_date : '';
						$args = array(
							'post_type'			=> 'product', 
							'order'				=> 'DESC',
							'posts_per_page'	=> $limit,
							'meta_query' => array(
								array(
									'key'		=> '_wc_rating_count',
									'value'		=> '',
									'compare' 	=> '!=',
								)),
							'post__in' 			=> array_merge( array( 0 ), wc_get_product_ids_on_sale() ),
						);
						$the_products 	= new WP_Query( $args );
					 ?>
					<?php if ( $the_products->have_posts() ) : ?>

						<div class="product-grid grid-layout columns-4">

							<?php while ( $the_products->have_posts() ) : $the_products->the_post(); 
								
								wc_get_template_part( 'content', 'product-for-king' );

							endwhile; ?>
							<?php wp_reset_postdata(); ?>

						</div>
						
					<?php endif; ?>
				</div>
				<div class="deal-tab-pane" id="newest-deal">
					<?php 
						$get_end_date 		= wcbs_get_wc_value( get_the_ID(), 'wcbs_product_sales_countdown_end' );
						$end_date 			= ! empty( $get_end_date ) ? $get_end_date : '';
						$args = array(
							'post_type'			=> 'product', 
							'order'				=> 'DESC',
							'posts_per_page'	=> $limit,
							'meta_query' 		=> WC()->query->get_meta_query(),
							'post__in' 			=> array_merge( array( 0 ), wc_get_product_ids_on_sale() ),
							'date_query'		=> array( array( 'after' => '1 week ago' ) )
						);
						$the_products 	= new WP_Query( $args );
					 ?>
					<?php if ( $the_products->have_posts() ) : ?>

						<div class="product-grid grid-layout columns-4">

							<?php while ( $the_products->have_posts() ) : $the_products->the_post(); 
								
								wc_get_template_part( 'content', 'product-for-king' );

							endwhile; ?>
							<?php wp_reset_postdata(); ?>

						</div>
						
					<?php endif; ?>
				</div>
				<div class="deal-tab-pane" id="under10-deal">
					<?php 
						$get_end_date 		= wcbs_get_wc_value( get_the_ID(), 'wcbs_product_sales_countdown_end' );
						$end_date 			= ! empty( $get_end_date ) ? $get_end_date : '';
						$args = array(
							'post_type'			=> 'product', 
							'order'				=> 'DESC',
							'posts_per_page'	=> $limit,
							'meta_query' => array(
								array(
									'key'		=> '_price',
									'value'		=> 10,
									'compare' 	=> '<=',
									'type' 		=> 'NUMERIC'
								)),
							'post__in' 			=> array_merge( array( 0 ), wc_get_product_ids_on_sale() ),
						);
						$the_products 	= new WP_Query( $args );
					 ?>
					<?php if ( $the_products->have_posts() ) : ?>

						<div class="product-grid grid-layout columns-4">

							<?php while ( $the_products->have_posts() ) : $the_products->the_post(); 
								
								wc_get_template_part( 'content', 'product-for-king' );

							endwhile; ?>
							<?php wp_reset_postdata(); ?>

						</div>
						
					<?php endif; ?>
				</div>
			</div>
			<div class="all-deals">
				<a class="button button--primary" href="<?php echo esc_url( get_permalink( $page_deal ) ); ?>"><?php esc_html_e( 'See All Deals', 'pustaka' ); ?></a>
			</div>
		</div>

	<?php endif; ?>
</div>
