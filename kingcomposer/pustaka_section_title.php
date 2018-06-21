<?php 

/*-----------------------------------------------------------------------------------*/
/*	Section Title Shortcode
/*-----------------------------------------------------------------------------------*/
extract( $atts );

$master_class 	= apply_filters( 'kc-el-class', $atts );
$master_class[] = 'section-title-style';

if ( ! empty( $section_title ) || ! empty( $section_sub_title ) ) : ?>
	<div class="section-header <?php echo implode( ' ', $master_class ); ?> <?php echo '' . $position; ?>">
		<h2 class="section-title"><?php echo ''.$section_title; ?></h2>
		<small class="section-subtitle"><?php echo ''.$section_sub_title; ?></small>
	</div>
<?php endif; ?>