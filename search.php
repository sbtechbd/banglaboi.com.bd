<?php
/**
 * The template for displaying search results pages.
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
		<div class="post-list">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'blog-list' ); ?>

				<?php endwhile; ?>


			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
				
			<?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
				<nav class="posts-navigation">
					<?php get_template_part( 'loop', 'nav' ); ?>
				</nav>
			<?php endif; ?>

		</div>
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
