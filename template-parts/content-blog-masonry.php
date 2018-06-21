<?php

/**
 * The Template for displaying content of post format standard
 *
 * @author 		tokoo
 * @version     2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
 
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
		
		<?php if ( 'gallery' == get_post_format() ) : ?>
			
			<div class="post__image gallery-slider">
				<?php
					$args = array(
						'orderby'        => 'rand',
						'post_type'      => 'attachment',
						'post_parent'    => get_the_ID(),
						'post_mime_type' => 'image',
						'post_status'    => null,
						'numberposts'    => 7,
						);
					$attachments = get_children( $args );

					if ( $attachments ) { ?>

						<ul class="slides">
							<?php foreach ( $attachments as $key => $attachment ) { ?>
								<?php $large_image = wp_get_attachment_image_src( $attachment->ID, 'full' ); ?>
								<li>
									<a class="tokoo-lightbox" data-gall="post-gallery-<?php the_ID(); ?>" href="<?php echo esc_url( $large_image[0] ); ?>">
										<img src="<?php echo pustaka_resize( $large_image[0], 600, 400 ); ?>" alt="<?php esc_html_e( 'Post Images', 'pustaka' ); ?>">
									</a>
								</li>
							<?php } ?>
						</ul><!-- .tile-layout -->

					<?php }
				?>
			</div>

		<?php else : ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="post__image">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'pustaka_blog_masonry' ); ?>
					</a>
				</div>
			<?php endif; ?>	
							
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

