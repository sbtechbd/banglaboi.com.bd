<?php

/**
 * The Template for displaying content of post format gallery
 *
 * @author 		tokoo
 * @version     2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?> 

<?php if ( is_singular( get_post_type() ) ) { ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
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
			<div class="featured-image gallery-slider">
				<ul class="slides">
					<?php foreach ( $attachments as $key => $attachment ) { ?>
						<?php $large_image = wp_get_attachment_image_src( $attachment->ID, 'full' ); ?>
						<li>
							<a href="<?php echo esc_url( $large_image[0] ); ?>"><img src="<?php echo pustaka_resize( $large_image[0], 600, 400 ); ?>" alt="">
							</a>
						</li>
					<?php } ?>
				</ul><!-- .tile-layout -->
			</div>

		<?php 	} ?>

		<header class="post__header">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="post__image">
					<?php 
						$image_src = pustaka_get_featured_image_url(); 
						$image_url = pustaka_resize( $image_src, 990, 640 );
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
				'separator' => ','
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
		</div><!-- .inner-post -->
	</article><!-- .hentry -->

<?php } ?>