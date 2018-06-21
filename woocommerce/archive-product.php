<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
 
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
		<div class="row">
			<div class="content-area <?php pustaka_columns_class_handles(); ?>">
				<article class="page type-page">

					<?php if ( apply_filters( 'woocommerce_show_page_title', false ) ) : ?>

						<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

					<?php endif; ?>

					<?php
						/**
						 * woocommerce_archive_description hook.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
					?>
					
					<?php if ( have_posts() ) : ?>
						
						<?php wc_print_notices(); ?>
						
						<?php
							$get_default_layout 	= get_theme_mod( 'pustaka_product_default_layout', 'grid' );
							$get_default_type 		= get_theme_mod( 'pustaka_product_default_type', 'regular' );
							$product_layout 		= isset( $_GET['layout'] ) ? $_GET['layout'] : $get_default_layout;
							$product_type 			= isset( $_GET['product_type'] ) ? $_GET['product_type'] : $get_default_type;

							if ( 'list' == $product_layout ) {
								$grid_class = '';
								$list_class = 'active';
							} else {
								$grid_class = 'active';
								$list_class = '';
							}

							if ( isset( $_GET['product_type'] ) ) {
								$ptqs = "&product_type=".$_GET['product_type'];
							} else {
								$ptqs = '';
							}
						 ?>

						<div class="product-sorting">
							<div class="product-layout-view">
								<a class="<?php echo esc_attr( $grid_class ); ?>" href="?layout=grid<?php echo ''.$ptqs; ?>" title="<?php esc_html_e( 'Grid Layout', 'pustaka' ); ?>">
									<i class="ti-layout-grid3-alt"></i>
								</a>
								<a class="<?php echo esc_attr( $list_class ); ?>" href="?layout=list<?php echo ''.$ptqs; ?>" title="<?php esc_html_e( 'List Layout', 'pustaka' ); ?>">
									<i class="ti-layout-list-thumb-alt"></i>
								</a>
							</div>

							<?php
								pustaka_product_result_count();
								/**
								 * woocommerce_before_shop_loop hook.
								 *
								 * @hooked woocommerce_result_count - 20 :removed
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_before_shop_loop' );
							?>
						</div>

						<?php if ( class_exists( 'Wcbs' ) && 'no' == pustaka_is_product_view_by_type() && ! isset( $_GET['post_type'] ) && ! is_tax( 'product_cat' ) && ! is_tax( 'product_tag' ) ) : ?>
							<?php wc_get_template_part( 'content-archive-product-alt' ); ?>
						<?php else : ?>

							<?php woocommerce_product_loop_start(); ?>

								<?php woocommerce_product_subcategories(); ?>

								<?php while ( have_posts() ) : the_post(); ?>
					
									<?php 								
										if ( 'list' == $product_layout ) {
											wc_get_template_part( 'content', 'product-list' );
										} else {
											wc_get_template_part( 'content', 'product' );
										}
									 ?>

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

						<?php endif; ?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>

				</article>
			</div>

			<?php
				/**
				 * woocommerce_sidebar hook.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				if ( pustaka_is_has_sidebar() ) : 
					do_action( 'woocommerce_sidebar' );
				endif;
			?>

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
