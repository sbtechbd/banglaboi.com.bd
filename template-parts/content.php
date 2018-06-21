<?php

/**
 * The Template for displaying content of post format standard
 *
 * @author 		tokoo
 * @version     2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
 
<?php if ( is_singular( 'post' ) ) { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
		
		<header class="post__header">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="post__image">
					<?php 
						$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
						$image_url = pustaka_resize( $image_src[0], 990, 640 );
					?>
					<div class="bg" style="background-image:url(<?php echo esc_url( $image_url ); ?>)"></div>
				</div>
			<?php endif; ?>
			<div class="post__date"><?php pustaka_published_date(); ?></div>
			<h1 class="post__title"><?php single_post_title(); ?></h1>
			<div class="post__meta">
				<?php pustaka_post_by_author(); ?>
				<?php echo pustaka_post_category( array(
						'before' => '<span class="categories">'.esc_html__( 'Under ', 'pustaka' ),
						'after'  => '</span>'
					) ); ?>
		</header>
		
		<div class="post__content entry-content">
			<?php the_content(); ?>
			<?php pustaka_pagination_page_break(); ?>
		</div>
		
		<footer class="post__footer">
			<?php echo pustaka_post_tags( array(
				'before' 	=> '<div class="post__tags"><strong>'. esc_html__( 'Tags ', 'pustaka' ).'</strong>',
				'after'  	=> '</div>',
				'separator' => ', '
			) ); ?>
			<?php pustaka_custom_social_share(); ?>
		</footer>

	</article>

<?php } else { ?>

	<?php
		$sticky 	= is_sticky() ? 'sticky' : '';
		$datasticky = '';

		if ( is_sticky() ) {
			$sticky_text = pustaka_get_option( 'stick_text' );

			if ( ! empty( $sticky_text ) ) {
				$datasticky = 'data-sticky="' . $sticky_text . '"';
			} else {
				$datasticky = 'data-sticky="' . esc_html__( 'Featured', 'pustaka' ) . '"';
			}
		}
	?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item ' ); ?> <?php printf( '%s', $datasticky ); ?>>
		<div class="post__inner">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="post__image">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php endif; ?>					
			<div class="post__detail">
				<h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="post__meta">
					<?php echo pustaka_post_category( array(
						'before' => '<span class="categories">',
						'after'  => '</span>'
					) ); ?>
					<?php pustaka_post_by_author(); ?>
					<?php echo pustaka_published_date(); ?>
					<?php pustaka_pagination_page_break(); ?>
				</div>
			</div>
		</div>
	</article>

<?php }