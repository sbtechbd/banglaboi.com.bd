<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$current_object = get_queried_object();

get_header(); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
	
	<div class="container">
		<div class="row single-book-author" data-sticky_parent>
			<div class="author-area col-md-6" data-sticky_column>
				
				<?php if ( ! empty( $current_object ) ) : ?>
						
					<?php 
						
						$get_author_img_id 		= carbon_get_term_meta( $current_object->term_id, 'wcbs_author_picture' );
						$get_author_birthday 	= carbon_get_term_meta( $current_object->term_id, 'wcbs_author_birthday' );
						$get_author_facebook 	= carbon_get_term_meta( $current_object->term_id, 'wcbs_author_facebook' );
						$get_author_twitter 	= carbon_get_term_meta( $current_object->term_id, 'wcbs_author_twitter' );
						$get_author_instagram 	= carbon_get_term_meta( $current_object->term_id, 'wcbs_author_instagram' );
						$get_author_gplus 		= carbon_get_term_meta( $current_object->term_id, 'wcbs_author_google_plus' );
					 ?>

					 <header class="section-header section-header--center">
						<h2 class="section-title">
							<?php echo apply_filters( 'woocommerce_book_author_info_title', esc_html__( 'Biography', 'pustaka' ) ); ?>
						</h2>
					</header>

					<div class="author-bio">
						<?php 
							if ( ! empty( $get_author_img_id ) ) {
								$author_picture 	= wp_get_attachment_image_src( $get_author_img_id, 'thumbnail' ); 
								echo '<figure class="author-bio__image">';
									echo '<img src="'.esc_url( $author_picture[0] ).'" alt="'.esc_html__( 'Author Picture', 'pustaka' ).'">';
								echo '</figure>';
							}
						 ?>
						<div class="author-bio__details">
							<h3 class="author-name"><a href="<?php echo get_term_link( $current_object->slug, 'book_author' ); ?>"><?php echo esc_attr( $current_object->name ); ?></a></h3>
							<span class="author-birthday">
								<?php if ( ! empty( $get_author_birthday ) ) : ?>
									<?php echo esc_attr( $get_author_birthday ); ?>
								<?php endif; ?>
							</span>
							<div class="author-bio">
								<?php echo wpautop( $current_object->description ); ?>
							</div>
							<div class="author-socials social-links small rounded text-center">
								<?php if ( ! empty( $get_author_facebook ) ) : ?>
									<a href="<?php echo esc_url( $get_author_facebook ); ?>" class="facebook"><i class="fa fa-facebook"></i></a>
								<?php endif; ?>
								<?php if ( ! empty( $get_author_twitter ) ) : ?>
									<a href="<?php echo esc_url( $get_author_twitter ); ?>" class="twitter"><i class="fa fa-twitter"></i></a>
								<?php endif; ?>
								<?php if ( ! empty( $get_author_instagram ) ) : ?>
									<a href="<?php echo esc_url( $get_author_instagram ); ?>" class="instagram"><i class="fa fa-instagram"></i></a>
								<?php endif; ?>
								<?php if ( ! empty( $get_author_gplus ) ) : ?>
									<a href="<?php echo esc_url( $get_author_gplus ); ?>" class="google-plus"><i class="fa fa-google-plus"></i></a>
								<?php endif; ?>
							</div>	
						</div>
					</div>
				
				<?php endif; ?>

			</div>
			<div class="content-area col-md-6" data-sticky_column>
				<article class="page type-page">
					
					<?php if ( have_posts() ) : ?>
						
						<header class="section-header section-header--center">
							<h2 class="section-title">
								<?php echo apply_filters( 'woocommerce_book_author_section_title', esc_html__( 'Books Of', 'pustaka' ) ); ?> <?php single_term_title(); ?>
							</h2>
						</header>

						<div class="product-grid grid-layout columns-3">

							<?php woocommerce_product_subcategories(); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', 'product' ); ?>

							<?php endwhile; // end of the loop. ?>

						<?php woocommerce_product_loop_end(); ?>

						<?php
							/**
							 * woocommerce_after_shop_loop hook.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php else : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>

				</article>
			</div>
		</div>
	</div>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer( 'shop' ); ?>
