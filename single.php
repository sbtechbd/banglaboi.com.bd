<?php
/**
 * The template for displaying all single posts.
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
	
	<div class="content-area col-md-8">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				
				<?php pustaka_prev_next_post(); ?>
				
				<?php if ( pustaka_get_option( 'comment_form', 1 ) && comments_open() ) comments_template(); // Loads the comments.php template. ?>

			<?php endwhile; ?>

		<?php endif; ?>

	</div>

	<?php get_sidebar(); ?>

	<?php
		/**
		 * pustaka_after_main_content hook
		 *
		 * @hooked themename_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'pustaka_after_main_content' );
	 ?>

<?php get_footer(); ?>
