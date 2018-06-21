<?php 

/*-----------------------------------------------------------------------------------*/
/*	Book Flip Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = 'section-title-style'; 
	
	//product
	$_product = wc_get_product( $productid );
	//front image
	$front 				= get_the_post_thumbnail( $productid , 'shop_single' );
	//back image
	$get_back_cover_img = carbon_get_post_meta( $productid , 'wcbs_book_back_cover_image' );
	$back_cover_img_src = wp_get_attachment_image_src( $get_back_cover_img, 'shop_single' );
	//author
	$term_list = wp_get_post_terms( $productid , 'book_author' ,array( 'fields' => 'ids' ));
	$author = get_term( $term_list[0] );

	$get_author_img_id 		= carbon_get_term_meta( $author->term_id, 'wcbs_author_picture' );
	$get_author_birthday 	= carbon_get_term_meta( $author->term_id, 'wcbs_author_birthday' );
	$get_author_facebook 	= carbon_get_term_meta( $author->term_id, 'wcbs_author_facebook' );
	$get_author_twitter 	= carbon_get_term_meta( $author->term_id, 'wcbs_author_twitter' );
	$get_author_instagram 	= carbon_get_term_meta( $author->term_id, 'wcbs_author_instagram' );
	$get_author_gplus 		= carbon_get_term_meta( $author->term_id, 'wcbs_author_google_plus' );

?>

<div class="<?php echo implode( ' ', $master_class ); ?>">
	<div class="container">
		<?php switch ( $styleid ) {
			case 'style1': ?>
				<div class="pstk-custom-block detail-product-1">
					<div class="row is-table-row">
						<div class="col-md-6">
							<div class="detail-icon"><i class="ti-bookmark-alt"></i></div>
							<h2><?php echo get_the_title( $productid ); ?></h2>
							<p><?php echo get_the_excerpt( $productid ); ?></p>
							<a href="<?php the_permalink( $productid ); ?>" class="button button--primary"> 
								<?php esc_html_e( 'Browse Product', 'pustaka' ); ?>
							</a>
						</div>
						<div class="col-md-6">
							<figure class="detail-img">
								<?php echo ''.$front; ?>
							</figure>
						</div>
					</div>
				</div><!-- /.detail-product-1 -->
			<?php break;
			case 'style2': ?>
				<div class="pstk-custom-block detail-product-2">
					<div class="row">
						<div class="col-md-6">
							<div class="left-col">
								<div class="section-header section-title-style section-header--right">
									<h2 class="section-title"><?php echo '' . $section_title; ?></h2>
									<small class="section-subtitle"><?php echo '' . $section_sub_title; ?></small>
								</div>
								<h2 class="book-title"><?php echo get_the_title( $productid ); ?></h2>
								<p><?php echo get_the_excerpt( $productid ); ?></p>
								<h2 class="author-name">
									<?php esc_html_e( 'By: ', 'pustaka' ); ?> 
									<?php echo ''. $author->name; ?>
								</h2>
								<h2 class="book-price"><?php echo $_product->get_price_html(); ?></h2>
								<a href="<?php the_permalink( $productid ); ?>" class="button button--primary"> 
									<?php esc_html_e( 'Read More', 'pustaka' ); ?>
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="right-col">
								<figure class="detail-img">
									<?php echo ''.$front; ?>
								</figure>
							</div>
						</div>
					</div>
				</div><!-- /.detail-product-2 -->
			<?php break;
			case 'style3': ?>
				<div class="pstk-custom-block detail-product-3">
					<div class="row is-table-row">
						<div class="col-md-4">
							<div class="left-col">
								<div class="section-header section-title-style section-header--right">
									<h2 class="section-title"><?php echo '' . $section_title; ?></h2>
									<small class="section-subtitle"><?php echo '' . $section_sub_title; ?></small>
								</div>
								<h2 class="book-title"><?php echo get_the_title( $productid ); ?></h2>
								<h2 class="author-name"><?php esc_html_e( 'By: ', 'pustaka' ); ?> <?php echo ''. $author->name; ?></h2>
								<h2 class="book-price"><?php echo $_product->get_price_html(); ?></h2>
							</div>
						</div>
						<div class="col-md-4">
							<div class="center-col">
								<figure class="detail-img">
									<?php echo ''.$front; ?>
								</figure>
							</div>
						</div>
						<div class="col-md-4">
							<div class="right-col">
								<div class="section-header section-title-style section-header--left">
									<h2 class="section-title"><?php esc_html_e( 'ABOUT AUTHOR: ', 'pustaka' ); ?></h2>
									<small class="section-subtitle"></small>
								</div>
								<h2 class="author-name"><?php echo ''. $author->name; ?></h2>
								<p><?php echo ''. $author->description; ?></p>
								<div class="social-links medium rounded">
									<?php if ( ! empty( $get_author_facebook ) ) : ?>
										<a href="<?php echo esc_url( $get_author_facebook ); ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
									<?php endif; ?>
									<?php if ( ! empty( $get_author_twitter ) ) : ?>
										<a href="<?php echo esc_url( $get_author_twitter ); ?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
									<?php endif; ?>
									<?php if ( ! empty( $get_author_instagram ) ) : ?>
										<a href="<?php echo esc_url( $get_author_instagram ); ?>" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
									<?php endif; ?>
									<?php if ( ! empty( $get_author_gplus ) ) : ?>
										<a href="<?php echo esc_url( $get_author_gplus ); ?>" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.detail-product-3 -->
			<?php break;
			case 'style4': ?>
				<div class="pstk-custom-block detail-product-4">
					<div class="container">
						<div class="row is-table-row">
							<div class="col-md-6">
								<div class="left-col">
									<h2 class="book-title"><?php echo get_the_title( $productid ); ?></h2>
									<p><?php echo get_the_excerpt( $productid ); ?></p>
									<h2 class="author-name"><?php esc_html_e( 'By: ', 'pustaka' ); ?> <?php echo ''. $author->name; ?></h2>
									<a href="<?php the_permalink( $productid ); ?>" class="button button--primary"> 
										<?php esc_html_e( 'Read More', 'pustaka' ); ?>
									</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="right-col">
									<figure class="detail-img">
										<?php echo ''.$front; ?>
									</figure>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.detail-product-4 -->
			<?php break;
			case 'style5': ?>
				<div class="pstk-custom-block detail-product-5">
					<div class="container">
						<div class="row is-table-row">
							<div class="col-md-6">
								<div class="left-col">
									<figure class="detail-img">
										<?php echo ''.$front; ?>
									</figure>
								</div>
							</div>
							<div class="col-md-6">
								<div class="right-col">
									<h2 class="book-title"><?php echo get_the_title( $productid ); ?></h2>
									<p><?php echo get_the_excerpt( $productid ); ?></p>
									<h2 class="author-name"><?php esc_html_e( 'By: ', 'pustaka' ); ?> <?php echo ''. $author->name; ?></h2>
									<a href="<?php the_permalink( $productid ); ?>" class="button button--primary"> 
										<?php esc_html_e( 'Read More', 'pustaka' ); ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.detail-product-5 -->
			<?php break;
			case 'style6': ?>
				<div class="pstk-custom-block detail-product-6">
					<div class="row">
							<div class="col-md-8">
								<div class="left-col">
									<div class="section-header section-title-style section-header--left">
										<h2 class="section-title"><?php echo '' . $section_title; ?></h2>
										<small class="section-subtitle"><?php echo '' . $section_sub_title; ?></small>
									</div>
									<h2 class="book-title"><?php echo get_the_title( $productid ); ?></h2>
									<h2 class="author-name"><?php esc_html_e( 'By: ', 'pustaka' ); ?> <?php echo ''. $author->name; ?></h2>
									<h2 class="book-price"><?php echo $_product->get_price_html(); ?></h2>
								</div>
							</div>
							<div class="col-md-4">
								<div class="right-col">
									<div class="book-images">
										<div class="book">
											<?php echo ''.$front; ?>
											<div class="book__page book__page--front">
												<?php echo ''.$front; ?>
											</div>
											<div class="book__page book__page--back">
												<?php if ( ! empty( $get_back_cover_img ) ) : ?>
													<img src="<?php echo esc_url( $back_cover_img_src[0] ); ?>" alt="<?php esc_html_e( 'Back Cover', 'pustaka' ); ?>">
												<?php endif; ?>
											</div>
											<div class="book__page book__page--first-page"></div>
											<div class="book__page book__page--second-page"></div>
											<div class="book__page book__page--side"></div>
											<div class="book__page book__page--side-paper"></div>
										</div>
										<div class="book__action">
											<button class="see-back">
												<i class="dripicons-clockwise"></i>
												<span><?php esc_html_e( 'Flip to Back', 'pustaka' ); ?></span>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div><!-- /.detail-product-6 -->	
			<?php break;
		} ?>
	</div><!-- /.container -->
</div>
