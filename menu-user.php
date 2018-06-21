<?php

/**
 * The Template for displaying menu user
 *
 * @author 		pustaka
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php if ( class_exists( 'WooCommerce' ) ) : ?>
		
	<div class="hdr-widget hdr-widget--menu-user">
		
		<?php if ( is_user_logged_in() ) : 
			
			$current_user = wp_get_current_user();

			if ( ( $current_user instanceof WP_User ) ) {
				echo '<button class="menu-user-avatar">';
					echo get_avatar( $current_user->user_email, 30 );
					if ( ! empty( $current_user->user_login ) ) {
						echo '<span class="user-name">';
							echo esc_attr( $current_user->user_login );
						echo '</span>';
					}
				echo '</button>';
			}
			?>

			<div class="menu-user-wrap">
				
				<?php if ( has_nav_menu( 'pustaka-user' ) ) : 

					$menu_args = array(
						'theme_location' => 'pustaka-user',
						'container'      => false
					);
					wp_nav_menu( $menu_args );

				else : ?>

					<ul class="menu">

						<?php if ( function_exists( 'dokan_is_user_seller' ) ) :

							global $current_user;
							$user_id 		= $current_user->ID;
							$dashboard_id 	= dokan_get_option( 'dashboard', 'dokan_pages' );

								if ( dokan_is_user_seller( $user_id ) ) { ?>
									<li class="menu-item"><a href="<?php echo dokan_get_store_url( $user_id ); ?>" target="_blank"><i class="fa fa-external-link"></i><?php esc_html_e( 'Visit your store', 'pustaka' ); ?></a></li>
									<li class="menu-item"><a href="<?php echo get_permalink( $dashboard_id ); ?>"><i class="fa fa-briefcase"></i><?php esc_html_e( 'Seller Dashboard', 'pustaka' ); ?></a></li>
									
								<?php } ?>

						<?php endif; ?>

						<li class="menu-item"><a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>"><?php esc_html_e( 'My Account', 'pustaka' ); ?></a></li>
						<li class="menu-item"><a href="<?php echo esc_url( wc_get_account_endpoint_url( 'orders' ) ); ?>"><?php esc_html_e( 'My Orders', 'pustaka' ); ?></a></li>
						<?php if ( class_exists( 'YITH_WCWL' ) ) : ?>
							<?php $wishlist_page_id = get_option( 'yith_wcwl_wishlist_page_id' ); ?>
							<li class="menu-item"><a href="<?php echo get_permalink( $wishlist_page_id ); ?>"><?php esc_html_e( 'My Wishlist', 'pustaka' ); ?></a></li>
						<?php endif; ?>
						<li class="menu-item"><a href="<?php echo wp_logout_url( home_url() ); ?>"><?php esc_html_e( 'Logout', 'pustaka' ); ?></a></li>
					</ul>
					
				<?php endif; ?>
			</div>

		<?php else : ?>

			<div class="menu-nologin-user-wrap">
				<a class="open-login-popup" href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>"><?php esc_html_e( 'Log In', 'pustaka' ); ?></a>
				<?php wc_get_template_part('myaccount/header-form-login'); ?>
			</div>

		<?php endif; ?>
	</div>

<?php endif; ?>	