<?php

/**
 * Template Name: Contact
 *
 * The Template for page template contact
 *
 * @author 		tokoo
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

	<?php
		/**
		 * pustaka_before_main_content hook
		 *
		 * @hooked tokoo_wrapper_start - 10 (outputs opening divs for the content)
		 */
		do_action( 'pustaka_before_main_content' );
	 ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	 	<div class="container">
			<div class="content page-contact">
				<div class="entry-content">
					
					<?php 
						$maps_data 		= pustaka_get_meta( '_contact_maps' ); 
						$latitude 		= ! empty( $maps_data['latitude'] ) ? $maps_data['latitude'] : -6.903932;
						$longitude 		= ! empty( $maps_data['longitude'] ) ? $maps_data['longitude'] : 107.611717;
						$zoom 			= ! empty( $maps_data['zoom'] ) ? $maps_data['zoom'] : 15;
						$marker_title 	= ! empty( $maps_data['marker_title'] ) ? $maps_data['marker_title'] : esc_html__( 'Your Marker Title', 'pustaka' );
						$marker_content = ! empty( $maps_data['marker_content'] ) ? $maps_data['marker_content'] : esc_html__( 'Your Marker Content Here', 'pustaka' );
						$map_style 		= ! empty( $maps_data['map_style'] ) ? $maps_data['map_style'] : '';
					?>

					<div class="contact-map tokoo-map default-map-height" id="tokoo-map"
						data-lat="<?php pustaka_echo( $latitude ); ?>" 
						data-lon="<?php pustaka_echo( $longitude ); ?>" 
						data-zoom="<?php pustaka_echo( $zoom ); ?>"
						data-title="<?php pustaka_echo( $marker_title ); ?>"
						data-content="<?php pustaka_echo( $marker_content ); ?>"
						>
					</div>

					<?php if( $map_style ): ?>
						<script class="map-style" type="application/json"><?php echo ''.$map_style; ?></script>
					<?php endif; ?>

					<div class="row">

						<div class="col-md-6">
							<?php if ( class_exists( 'Tokoo_Vitamins' ) ) : ?>
							
								<div class="contact-detail">

									<?php if ( isset( $maps_data['address'] ) && ! empty( $maps_data['address'] ) ) : ?>
										<address class="address">
											<i class="fa fa-map-marker icon"></i>
											<?php echo wpautop( $maps_data['address'] ); ?>
										</address><!-- .contact-address -->
									<?php endif; ?>

									<?php if ( isset( $maps_data['phone_number'] ) && ! empty( $maps_data['phone_number'] ) ) : ?>
										<div class="phone">
											<i class="fa fa-phone"></i>
											<a href="tel:<?php echo esc_attr( $maps_data['phone_number'] ); ?>" class="has-icon">
												<?php printf( $maps_data['phone_number'] ); ?>
											</a>
										</div><!-- .contact-phone -->
									<?php endif; ?>

								</div>

								<hr class="separator m40">

								<?php if ( isset( $maps_data['tagline'] ) && ! empty( $maps_data['tagline'] ) ) : ?>
									<div class="entry-content">
										<?php printf( $maps_data['tagline'] ); ?>
									</div><!-- .entry-content -->
								<?php endif; ?>

								<?php the_content(); ?>

							<?php else: ?>

								<p><?php esc_html_e( 'Please activate Tokoo Vitamins extension in order to use this page template.', 'pustaka' ); ?></p>

							<?php endif; ?>
						</div>
						<div class="col-md-6">

							<?php if ( class_exists( 'WPCF7_ContactForm' ) ) { ?>
								<?php if ( ! empty( $maps_data['contact_form'] ) ) : ?>
									<?php 
										echo do_shortcode( '[contact-form-7 id="'.$maps_data['contact_form'].'"]' );
									 ?>
								<?php endif; ?>
							<?php } else {
								comments_template();
								} ?>
						</div>

					</div>

				</div><!-- .entry-content -->
			</div><!-- .content -->
		</div><!-- .post-content -->

	</div>

	<?php
		/**
		 * pustaka_after_main_content hook
		 *
		 * @hooked tokoo_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'pustaka_after_main_content' );
	 ?>

<?php get_footer(); ?>