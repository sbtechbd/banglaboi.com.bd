<?php 

/*-----------------------------------------------------------------------------------*/
/*	Book Series Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );
?>

<div class="popular-series grid-layout columns-<?php echo esc_attr( $columns );?>">
	
	<?php if ( ! empty( $series ) ) : ?>
		<?php $get_series = explode( ',', $series ); ?>
		<?php 
			$args = array(
				'taxonomy'	=> array( 'book_series' ),
				'number' 	=> $limit,
				'include'	=> $get_series,			
			);
			$term_query = new WP_Term_Query( $args );
			if ( ! empty( $term_query ) && ! is_wp_error( $term_query ) ) : 
				foreach ( $term_query->get_terms() as $term ) { ?>
					
					<?php 
						$get_series_img_id  = carbon_get_term_meta( $term->term_id, 'wcbs_book_series_picture' ); 
						$series_picture 	= wp_get_attachment_image_src( $get_series_img_id, 'thumbnail' ); 
					
						if ( ! empty( $get_series_img_id ) ) : ?>
							<div class="series grid-item">
								<a href="<?php echo get_term_link( $term->slug, 'book_series' ); ?>">
									<img src="<?php echo esc_url( $series_picture[0] ); ?>" alt="<?php esc_html_e( 'Series Picture', 'pustaka' ); ?>">
								</a>
							</div>
					<?php endif; ?>
					
				<?php }
			endif;
		 ?>

	<?php endif; ?>
</div>