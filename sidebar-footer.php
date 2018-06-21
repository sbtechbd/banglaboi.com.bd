<?php

/**
 * The Template for displaying sidebar primary
 *
 * @author 		tokoo
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
					
<?php if ( is_active_sidebar( 'pustaka-footer-1' ) || is_active_sidebar( 'pustaka-footer-2' ) || is_active_sidebar( 'pustaka-footer-3' ) ) { ?>

	<div class="site-footer__widget-area">
		<div class="container">
			<div class="grid-layout columns-3">

				<?php if ( is_active_sidebar( 'pustaka-footer-1' ) ) : ?>
					<div class="grid-item">
						<?php dynamic_sidebar( 'pustaka-footer-1' ); ?>
					</div><!-- pustaka-footer-1 -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'pustaka-footer-2' ) ) : ?>
					<div class="grid-item">
						<?php dynamic_sidebar( 'pustaka-footer-2' ); ?>
					</div><!-- pustaka-footer-2 -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'pustaka-footer-3' ) ) : ?>
					<div class="grid-item">
						<?php dynamic_sidebar( 'pustaka-footer-3' ); ?>
					</div><!-- pustaka-footer-3 -->
				<?php endif; ?>

			</div>
		</div>
	</div>

<?php } ?>