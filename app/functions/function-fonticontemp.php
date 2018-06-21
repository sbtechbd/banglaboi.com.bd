<?php 

add_action( 'media_buttons', 'pustaka_add_my_media_button', 15 );
function pustaka_add_my_media_button() {
    echo '<span class="tokoo-iconpicker-wrap"><a href="#" class="button tokoo-iconpicker-shortcode">Pustaka Icon</a></span>';
}

/**
 * Load widgets js
 *
 * @return void
 * @author tokoo
 **/
add_action( 'admin_enqueue_scripts', 'pustaka_fi_shortcodes_scripts' );
function pustaka_fi_shortcodes_scripts() {
	wp_enqueue_script( 'pustaka_fi_shortcodes', PUSTAKA_THEME_URI . '/assets/js/fi-shortcodes.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'pustaka_fi_shortcodes', PUSTAKA_THEME_URI . '/assets/fonts/pustaka-icons/style.css' );
	wp_enqueue_style( 'pustaka_fi_shortcodes_admin', PUSTAKA_THEME_URI . '/bootstrap/assets/css/admin.css' );
}

/**
 * Load widgets js
 *
 * @return void
 * @author tokoo
 **/
add_action( 'wp_enqueue_scripts', 'pustaka_fi_shortcodes_scripts_front' );
function pustaka_fi_shortcodes_scripts_front() {
	wp_enqueue_style( 'pustaka_fi_shortcodes', PUSTAKA_THEME_URI . '/assets/fonts/pustaka-icons/style.css' );
}