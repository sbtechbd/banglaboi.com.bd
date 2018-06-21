<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
	
	<div class="content-area <?php pustaka_columns_class_handles(); ?>">
		<div class="post-grid grid-layout columns-2">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

				<?php endwhile; ?>


			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
			
		</div>
		
		<?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
			<nav class="posts-navigation">
				<?php get_template_part( 'loop', 'nav' ); ?>
			</nav>
		<?php endif; ?>
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
