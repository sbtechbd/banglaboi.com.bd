<?php

return array(

	/*
	* Edit this file to add widget sidebars to your theme.
	* Place WordPress default settings for sidebars.
	* Add as many as you want, watch-out your commas!
	*/
 	array(

		'name'			=> esc_html__( 'Primary', 'pustaka' ),
		'id'			=> 'pustaka-primary',
		'description'	=> esc_html__( 'Area of primary sidebar', 'pustaka' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	),
	array(
		'name'			=> esc_html__( 'Footer One', 'pustaka' ),
		'id'			=> 'pustaka-footer-1',
		'description'	=> esc_html__( 'Widget Area of Footer First column', 'pustaka' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	),

	array(
		'name'			=> esc_html__( 'Footer Two', 'pustaka' ),
		'id'			=> 'pustaka-footer-2',
		'description'	=> esc_html__( 'Widget Area of Footer Second column', 'pustaka' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	),

	array(
		'name'			=> esc_html__( 'Footer Three', 'pustaka' ),
		'id'			=> 'pustaka-footer-3',
		'description'	=> esc_html__( 'Widget Area of Footer Third column', 'pustaka' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	),

);