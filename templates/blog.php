<?php

/**
 * Template Name: Blog
 *
 * The Template for page template blog
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
		 * @hooked themename_wrapper_start - 10 (outputs opening divs for the content)
		 */
		do_action( 'pustaka_before_main_content' );
	 ?>

	<div class="content-area <?php pustaka_columns_class_handles(); ?>">
		<div class="post-grid grid-layout columns-2">
					
				<?php
					if ( 0 != get_query_var( 'paged' ) ) {
						$paged = absint( get_query_var( 'paged' ) );
					} elseif ( 0 != get_query_var( 'page' ) ) {
						$paged = absint( get_query_var( 'page' ) );
					} else {
						$paged = 1;
					}

					$page_metas 		= pustaka_get_meta( '_page_details' );
					$blog_args   		= array(
						'post_type'         => 'post',
						'posts_per_page'    => ( ! empty( $page_metas['per_page'] ) ) ? $page_metas['per_page'] : 12,
						'post_status'       => 'publish',
						'order'             => 'DESC',
						'orderby'           => 'date',
						'paged'             => $paged
					);

					$temp 		= $wp_query;
					$wp_query 	= null;
					$wp_query 	= new WP_Query();
					$wp_query->query( $blog_args );

				if ( $wp_query->have_posts() ) : ?>
					
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

					<?php endwhile; ?>
			
					<?php else : ?>
							
						<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php
					endif;
					$wp_query = null;
					$wp_query = $temp;  // Reset
				?>
				<?php wp_reset_postdata(); ?>
				
			<?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
				<div class="posts-navigation ajax-navigation">
					<?php get_template_part( 'loop', 'nav' ); ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
	
	<?php if ( pustaka_is_has_sidebar() ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>
	
	<?php
		/**
		 * pustaka_after_main_content hook
		 *
		 * @hooked themename_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'pustaka_after_main_content' );
	 ?>


<?php get_footer(); ?>
