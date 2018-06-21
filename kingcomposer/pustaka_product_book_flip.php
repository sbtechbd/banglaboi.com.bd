<?php 

/*-----------------------------------------------------------------------------------*/
/*	Book Flip Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = 'section-title-style'; 

if ( $book_from == 'static' ) {
	//front image	
	$front_id 	= wp_get_attachment_image_src( $front_image_book, 'shop_single' );
	$front 		= '<img src=" ' . esc_url( $front_id[0] ) . '" >';
	//back image
	$get_back_cover_img = $back_image_book;
	$back_cover_img_src = wp_get_attachment_image_src( $back_image_book , 'shop_single' );

} else {
	//front image
	$front 				= get_the_post_thumbnail( $post_type_product , 'shop_single' );
	//back image
	$get_back_cover_img = carbon_get_post_meta( $post_type_product , 'wcbs_book_back_cover_image' );
	$back_cover_img_src = wp_get_attachment_image_src( $get_back_cover_img, 'shop_single' );
}
?>

<div class="<?php echo implode( ' ', $master_class ); ?>">
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
