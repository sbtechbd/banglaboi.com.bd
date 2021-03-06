<?php
/**
 * The template for displaying all single attachment.
 *
 * @package Pustaka
 */

get_header(); ?>


	<?php
		/**
		 * pustaka_before_main_content hook
		 *
		 * @hooked themename_wrapper_start - 10 (outputs opening divs for the content)
		 */
		do_action( 'pustaka_before_main_content' );
	 ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class( 'type-post' ); ?>>


					<?php pustaka_single_post_meta(); ?>


					<?php pustaka_single_post_featured_image( 'full' ); ?>
					<h2 class="entry-title"><?php single_post_title(); ?></h2>


					<?php if ( has_excerpt() ) : ?>
						<div class="leading"><?php the_excerpt(); ?></div>
					<?php endif; ?>

					<?php the_content(); ?>
					 <?php wp_link_pages( array( 'before' => '<div class="article-paging">' . '<strong>' . esc_html__( 'Pages:', 'pustaka' ) . '</strong>', 'after' => '</div>' ) ); ?>

				</div>
				
			<?php endwhile; ?>

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
