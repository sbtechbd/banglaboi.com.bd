<?php 
	$sticky_header 	= get_theme_mod( 'pustaka_sticky_header', false );
 ?>

<div class="site-header-wrap <?php echo ( true == $sticky_header ) ? 'is-sticky' : ''; ?>"> 
	<div class="site-header">
		<div class="container">
			
			<?php get_template_part( 'menu', 'primary' ); ?>
			
			<div class="hdr-widget hdr-widget--site-logo">
				<?php pustaka_site_title(); ?>
			</div>
			
			<div class="hdr-widget hdr-widget--product-search">
				<?php get_template_part( 'custom-search-form' ); ?>
			</div>
			
			<?php get_template_part( 'menu-user' ); ?>
			
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<div class="hdr-widget hdr-widget--menu-cart">
					<div class="menu-cart">
						<?php 
							$a_class 	= ! is_rtl() ? 'text-gradient' : 'no-gradient'; 
							$cart_type	= get_theme_mod( 'pustaka_header_cart_button_type', 'text' );
						?>
						<button class="menu-cart-trigger">
							<?php if ( 'icon' == $cart_type ) : ?>
								<span class="fa fa-shopping-cart"></span>
							<?php else : ?>
								<span class="<?php echo esc_attr( $a_class ); ?>">
									<?php esc_html_e( 'Cart', 'pustaka' ); ?> 
								</span>
							<?php endif ?>
							<span class="cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>
						</button>
						<?php the_widget( 'WC_Widget_Cart' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="mobile-menu-wrap">
			<div class="hdr-widget--product-search">
				<?php get_template_part( 'custom-search-form-mobile' ); ?>
			</div>
			<nav class="mobile-menu"></nav>
			<?php get_template_part( 'menu-user' ); ?>
		</div>
	</div>
</div>
<div class="menu-main-overlay"></div>

