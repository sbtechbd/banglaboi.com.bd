<?php
/*
Template Name: New header
*/
?>
<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Pustaka
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="site-content">
		
	<?php 
		$page_id 		= get_queried_object_id();
		$page_details 	= get_post_meta(  $page_id, 'pustaka_page_details', true );
		$disable_header = ! empty( $page_details['disable_header'] ) ? $page_details['disable_header'] : 0;  	
		$sticky_header 	= get_theme_mod( 'pustaka_sticky_header', false );

		if ( 0 == $disable_header ) : ?>
			
		<div class="site-header-wrap <?php echo ( true == $sticky_header ) ? 'is-sticky' : ''; ?>"> 
			<div class="site-header site-header--type-2">
				<div class="container">
					<div class="hdr-widget hdr-widget--menu-main">
						<button class="menu-main-toggle hamburger hamburger--elastic" type="button"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
					</div>
					<div class="hdr-widget hdr-widget--site-logo">
						<?php pustaka_site_title(); ?>
					</div>

					<?php get_template_part( 'menu', 'header-type-2' ); ?>
					
					<div class="hdr-widget hdr-widget--product-search search-dropdown">
						<button class="search-dropdown-toggle"><i class="fa fa-search"></i></button>
						<?php get_template_part( 'custom-search-form' ); ?>
					</div>
					
					<?php get_template_part( 'menu-user' ); ?>
					
					<?php if ( class_exists( 'WooCommerce' ) ) : ?>
						<div class="hdr-widget hdr-widget--menu-cart">
							<div class="menu-cart">
								<?php $a_class 	= ! is_rtl() ? 'text-gradient' : 'no-gradient'; ?>
								<button class="menu-cart-trigger"><span class="<?php echo esc_attr( $a_class ); ?>"><?php esc_html_e( 'Cart', 'pustaka' ); ?> </span><span class="cart-count"><?php echo WC()->cart->cart_contents_count; ?></span></button>
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

		<?php get_template_part( 'loop-meta' ); ?>

		<?php endif; ?>

<main class="main-content">

</main>

<?php

get_footer();
?>