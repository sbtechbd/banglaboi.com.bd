<?php 

/*-----------------------------------------------------------------------------------*/
/*	Book Author Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );
?>

<div class="featured-author-grid grid-layout columns-<?php echo esc_attr( $columns );?>">
	
	<?php if ( ! empty( $authors ) ) : ?>
		<?php $get_authors = explode( ',', $authors ); ?>
		<?php 
			$args = array(
				'taxonomy'	=> array( 'book_author' ),
				'number' 	=> $limit,
				'include'	=> $get_authors,			
			);
			$author_query = new WP_Term_Query( $args );
			if ( ! empty( $author_query ) && ! is_wp_error( $author_query ) ) : 
				foreach ( $author_query->get_terms() as $author ) { ?>
					
					<?php 
						$get_author_img_id  = carbon_get_term_meta( $author->term_id, 'wcbs_author_picture' ); 
						$author_picture 	= wp_get_attachment_image_src( $get_author_img_id, 'thumbnail' ); 
					
						if ( ! empty( $get_author_img_id ) ) : ?>
							
							<div class="featured-author grid-item">
								<figure class="featured-author__image">
									<a href="<?php echo get_term_link( $author->slug, 'book_author' ); ?>">
									<img src="<?php echo esc_url( $author_picture[0] ); ?>" alt="<?php esc_html_e( 'Author Picture', 'pustaka' ); ?>">
								</a>
								</figure>
								<div class="featured-author__detail">
									<h3 class="featured-author__name">
										<a href="<?php echo get_term_link( $author->slug, 'book_author' ); ?>">
											<?php echo esc_attr( $author->name ); ?>
										</a>
									</h3>
									<?php if ( true == $count ) : ?>
										<div class="featured-author__books">
											<?php echo sprintf( _n( '%s Published Book', '%s Published Books', $author->count, 'pustaka' ), number_format_i18n( $author->count ) ); ?>
										</div>
									<?php endif; ?>
								</div>
							</div>

					<?php endif; ?>
					
				<?php }
			endif;
		 ?>

	<?php endif; ?>
</div>
