<?php

/**
 * tokoo functions and definitions
 *
 * @package Pustaka
 */

/* Define static constant */
define( 'PUSTAKA_THEME_DIR', get_template_directory() );
define( 'PUSTAKA_THEME_URI', get_template_directory_uri() );
define( 'PUSTAKA_THEME_APP_DIR', PUSTAKA_THEME_DIR . '/app' );
define( 'PUSTAKA_THEME_APP_URI', PUSTAKA_THEME_URI . '/app' );
define( 'PUSTAKA_THEME_CORE_DIR', PUSTAKA_THEME_DIR . '/bootstrap/core' );
define( 'PUSTAKA_THEME_CORE_URI', PUSTAKA_THEME_URI . '/bootstrap/core' );
define( 'PUSTAKA_THEME_ASSETS_DIR', PUSTAKA_THEME_URI . '/assets' );
define( 'PUSTAKA_THEME_ASSETS_URI', PUSTAKA_THEME_URI . '/assets' );
define( 'PUSTAKA_THEME_VERSION', '2.9.2' );
define( 'PUSTAKA_OPTIMIZE_MODE', true );


/**
 * Initial setup
 *
 * @return void
 * @author tokoo
 **/
require_once( PUSTAKA_THEME_DIR . '/bootstrap/class-tgm-plugin-activation.php' );
require_once( PUSTAKA_THEME_DIR . '/bootstrap/plugins.php' );
require_once( PUSTAKA_THEME_DIR . '/bootstrap/class-autoloaders.php' );
require_once( PUSTAKA_THEME_DIR . '/bootstrap/libraries/aqua-resize.php' );
require_once( PUSTAKA_THEME_DIR . '/bootstrap/libraries/media-grabber.php' );
require_once( PUSTAKA_THEME_DIR . '/bootstrap/setup.php' );

require_once( PUSTAKA_THEME_DIR . '/importer/config.php' );
require_once( PUSTAKA_THEME_DIR . '/importer/after-import.php' );