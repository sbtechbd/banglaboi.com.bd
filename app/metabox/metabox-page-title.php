<?php 

if ( ! class_exists( 'Carbon_Fields\Container' ) ) {
	return;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'term_meta', esc_html__( 'Page Title Background', 'pustaka' ) )
	->show_on_taxonomy( array( 'category', 'post_tag', 'product_tag', 'product_cat', 'book_author', 'book_publisher', 'book_series' ) )
	->add_fields( array(
		Field::make( 'image', 'pustaka_tax_page_title_background', esc_html__( 'Page Title Background Image (Preferred size : 1600x600 )', 'pustaka' ) )
));

