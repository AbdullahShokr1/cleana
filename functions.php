<?php
/*
* Theme Functions.
*
* @package Cleana
*/
if ( ! defined( 'CLEANA_DIR_PATH' ) ) {
	define( 'CLEANA_DIR_PATH', untrailingslashit( get_template_directory() ) );
}
if ( ! defined( 'CLEANA_DIR_URL' ) ) {
	define( 'CLEANA_DIR_URL', untrailingslashit( get_template_directory_uri() ) );
}


require_once CLEANA_DIR_PATH . '/inc/helpers/autoloader.php';
require_once CLEANA_DIR_PATH . '/inc/helpers/template-tags.php';

function cleana_get_theme_instance() {
	\CLEANA_THEME\Inc\CLEANA_THEME::get_instance();
}

cleana_get_theme_instance();
