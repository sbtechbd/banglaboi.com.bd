<?php 

/*-----------------------------------------------------------------------------------*/
/*	Contact Form Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = 'section-title-style'; ?>

<div class="<?php echo implode( ' ', $master_class ); ?>">
	<?php echo do_shortcode( '[contact-form-7 id="' . $post_type_contact . '"]' ); ?>
</div>
