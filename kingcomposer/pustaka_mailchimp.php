<?php 

/*-----------------------------------------------------------------------------------*/
/*	Mailchimp Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = 'section-title-style'; ?>

<div class="<?php echo implode( ' ', $master_class ); ?>">
	<?php if ( ! empty( $section_title ) || ! empty( $section_sub_title ) ) : ?>
		<div class="section-header <?php echo '' . $position; ?>">
			<h2 class="section-title"><?php echo ''.$section_title; ?></h2>
			<small class="section-subtitle"><?php echo ''.$section_sub_title; ?></small>
		</div>
	<?php endif; ?>
	<?php echo do_shortcode( '[mc4wp_form id="' . $mailchimp_id . '"]' ); ?>
</div>
