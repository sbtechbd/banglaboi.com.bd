<?php 

/*-----------------------------------------------------------------------------------*/
/*	Slider Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$args = array(
	'post_type'      	=> 'tokoo-slider',
	'p'					=>	$slider_item,
	'posts_per_page' 	=> 1,
	'no_found_rows'  	=> 1,
	'post_status'    	=> 'publish',
	'orderby'    	 	=> 'DATE',
	'order'    	 	 	=> 'DESC',
);

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = $slider_style;

$slides = new WP_Query( $args );

if ( $slides->have_posts() ) : ?>
	<div class="hero-carousel-wrap <?php echo implode( ' ', $master_class ); ?>" data-style=<?php echo esc_attr( $slider_style ); ?> data-duration=<?php echo esc_attr( $slider_duration ); ?> data-fade=<?php echo "fade" == $slider_animation ? "true" : "false"; ?>>
		<div class="hero-carousel">

			<?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
				
				<?php $slider_data = pustaka_get_meta( '_sliders_details' ); ?>

				<?php if ( ! empty( $slider_data['slides'] ) ) : ?>
					<?php foreach ( $slider_data['slides'] as $slide ) : ?>
						
						<?php
							$get_bg_image 	= ! empty( $slide['slider_image'] ) ? wp_get_attachment_image_src( $slide['slider_image'], 'full' ) : '';
							$slider_link 	= ! empty( $slide['slider_link'] ) ? $slide['slider_link'] : ''; 
							$text_align 	=  ! empty( $slide['text_align'] ) ? 'hero-item__detail--'.$slide['text_align'] : ' hero-item__detail--left'; 
						 ?>
						
						<?php  if( 'style-1' == $slider_style ):  ?>

							<div class="hero-item">
								<div class="hero-item__inner">
									<a class="block-link" href="<?php echo esc_url( $slider_link ); ?>"></a>
									<figure class="hero-item__image">
										<a href="<?php echo esc_url( $slider_link ); ?>">
											<img src="<?php echo pustaka_resize( $get_bg_image[0], 192, 75 ); ?>" data-lazy="<?php echo pustaka_resize( $get_bg_image[0], 915, 360 ); ?>" alt="<?php esc_html_e( 'Slide Image', 'pustaka' ); ?>">
										</a>
									</figure>
									<div class="hero-item__detail  <?php echo ''.$text_align; ?>">
										<?php if ( ! empty( $slide['slider_title'] ) ) : ?>
											<h2 class="hero-item__title"><?php echo esc_attr( $slide['slider_title'] ); ?></h2>
										<?php endif; ?>
										<?php if ( ! empty( $slide['slider_content'] ) ) : ?>
											<p class="hero-item__desc"><?php echo ''.$slide['slider_content']; ?></p>
										<?php endif; ?>
									</div>
								</div>
							</div>

						<?php else: ?>

							<div class="hero-item <?php echo esc_attr( $text_align ); ?>">
								<div class="hero-background">
									<div class="bg" style="background-image: url( <?php echo esc_url( $get_bg_image[0] ); ?> )"></div>
								</div>
								<div class="hero-content">
									<div class="container" style="height:<?php echo ''.$slider_height; ?>px">
										<div class="hero-item__inner">
											<a class="block-link" href="<?php echo esc_url( $slider_link ); ?>"></a>
											<div class="hero-item__detail  <?php echo ''.$text_align; ?>">
												<?php if ( ! empty( $slide['slider_title'] ) ) : ?>
													<h2 class="hero-item__title"><?php echo esc_attr( $slide['slider_title'] ); ?></h2>
												<?php endif; ?>
												<?php if ( ! empty( $slide['slider_content'] ) ) : ?>
													<p class="hero-item__desc"><?php echo ''.$slide['slider_content']; ?></p>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php endif; ?>

					<?php endforeach; ?>
				<?php endif; ?>

		<?php endwhile; // end of the loop. ?>
		<?php wp_reset_postdata(); ?>

		</div> <!-- .slider-holder -->
	</div> <!-- .slider-holder -->
	
<?php
	
endif;

kc_js_callback('initHeroCarousel');