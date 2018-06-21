<?php

if ( class_exists( 'Tokoo_Widget' ) ) {

// Create custom widget class extending WPH_Widget
class pustaka_Testimonials extends Tokoo_Widget {

	function __construct() {

		$args = array(
			'label' 		=> esc_html__( 'Tokoo - Testimonials', 'pustaka' ),
			'description' 	=> esc_html__( 'A custom widget that display three testimonials.', 'pustaka' ),
		 );

		// fields array
		$args['fields'] = array(

			// Title field
			array(
				'name' 		=> esc_html__( 'Title', 'pustaka' ),
				'desc' 		=> esc_html__( 'Enter the widget title.', 'pustaka' ),
				'id' 		=> 'title',
				'type' 		=> 'text',
				'class' 	=> 'widefat',
				'std' 		=> esc_html__( 'Testimonials', 'pustaka' ),
				'validate' 	=> 'alpha_dash',
				'filter' 	=> 'strip_tags|esc_attr'
			 ),

			// Number
			array(
				'name' 		=> esc_html__( 'Number', 'pustaka' ),
				'id' 		=> 'number',
				'type'		=> 'text',
				'class' 	=> 'widefat',
				'std' 		=> 5,
				'filter'	=> 'esc_attr',
			 ),

			// Display Type
			array(
				'name' 		=> esc_html__( 'Display Type', 'pustaka' ),
				'id' 		=> 'display_type',
				'type'		=> 'select',
				'class' 	=> 'widefat',
				'std' 		=> '',
				'filter'	=> 'esc_attr',
				'fields' 	=> array(
						array(
							'name'  => esc_html__( 'List', 'pustaka' ),
							'value' => 'list'
						 ),
						array(
							'name'  => esc_html__( 'Slide', 'pustaka' ),
							'value' => 'slide'
						 ),
				 ),
			 ),

		 ); // fields array

		$args['options'] 	= array(
				'width'		=> 350,
				'height'	=> 350
			);

		// create widget
		$this->create_widget( $args );
	}


	// Output function
	function widget( $args, $instance ) {

		extract( $args );

		$title 						= apply_filters( 'widget_title', $instance['title'] );
		$number 					= $instance['number'];
		$display_type 				= isset( $instance['display_type'] ) ? $instance['display_type'] : 'list';
		$ul_class 					= ( 'slide' == $display_type ) ? 'slides' : 'testimonials-list';
		$testimonials_wrapper_start = ( 'slide' == $display_type ) ? '<div class="testimonial-slider slider">' : '';
		$testimonials_wrapper_end 	= ( 'slide' == $display_type ) ? '</div>' : '';
		// Begin Widget
		printf( $before_widget );

		if ( $title ) {
			printf( '%s %s %s', $args['before_title'], $title, $args['after_title'] );
		}

			$args = array(
				'post_type'   			=> 'tokoo-testimonials',
				'ignore_sticky_posts' 	=> true,
				'order'               	=> 'DESC',
				'orderby'             	=> 'date',
			);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :

			printf( '%s', $testimonials_wrapper_start );

				echo '<ul class="'.$ul_class.'">';

			while ( $query->have_posts() ) : $query->the_post();

				$testimony = get_post_meta( get_the_ID(), 'pustaka_testimonials_details', true ); ?>

				<li>
					<?php if ( ! empty( $testimony['testimony_content'] ) ) : ?>
						<blockquote>
							<?php echo wpautop( $testimony['testimony_content'] ); ?>
						</blockquote>
					<?php endif; ?>

					<div class="testimonial-detail">
						
						<?php if ( has_post_thumbnail() ) : ?>
							<figure>
								<?php the_post_thumbnail( 'small' ); ?>
							</figure>
						<?php endif; ?>
						
						<?php $link = ! empty( $testimony['link'] ) ? $testimony['link'] : ''; ?>
				    	<cite><a href="<?php echo esc_url( $link ); ?>"><?php the_title(); ?></a></cite>
	
				    	<?php if ( isset( $testimony['position'] ) && ! empty( $testimony['position'] ) ) : ?>
				    		<span class="position"><?php echo esc_attr( $testimony['position'] ); ?></span>
				    	<?php endif; ?>
				    </div>
				</li>

			<?php endwhile;

			echo '</ul>';

		printf( '%s', $testimonials_wrapper_end );

		endif;
		wp_reset_postdata();

		printf( $after_widget );
		// End Widget
	}

} // class

}

