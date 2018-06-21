<?php 

/*-----------------------------------------------------------------------------------*/
/*	Features List Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );
?>

<?php if ( ! empty( $items ) ) : ?>
	
	<div class="footer-feature-list">
		<div class="feature-list grid-layout columns-<?php echo esc_attr( $columns ); ?>">

			<?php foreach ( $items as $item ) : ?>
				
				<div class="feature grid-item">
					<div class="feature__image">
						<?php if ( 'icon_font' == $item->item_type ) : ?>
							<?php if ( ! empty( $item->icon ) ) : ?>
								<i class="<?php echo ''.$item->icon; ?>"></i>
							<?php else :  ?>
								<i class="ti-truck"></i>
							<?php endif; ?>
						<?php else : ?>
							<?php $get_img_src = wp_get_attachment_image_src( $item->image, 'thumbnail' ); ?>
							<?php if ( ! empty( $get_image_src ) ) : ?>
								<img src="<?php echo esc_url( $get_image_src[0] ); ?>" alt="<?php esc_html_e( 'Features Image', 'pustaka' ); ?>">
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<?php if ( ! empty( $item->title ) ) : ?>
						<h3 class="feature__title"><?php echo esc_attr( $item->title ); ?></h3>
					<?php endif; ?>
				</div>

			<?php endforeach; ?>
			
		</div>
	</div>

<?php endif; ?>