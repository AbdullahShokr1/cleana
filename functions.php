<?php
/*
* Theme Functions.
*
* @package Cleana
*/
if ( ! defined( 'CLEANA_DIR_PATH' ) ) {
	define( 'CLEANA_DIR_PATH', untrailingslashit( get_template_directory() ) );
}


require_once CLEANA_DIR_PATH . '/inc/helpers/autoloader.php';
require_once CLEANA_DIR_PATH . '/inc/helpers/template-tags.php';

function cleana_get_theme_instance() {
	\CLEANA_THEME\Inc\CLEANA_THEME::get_instance();
}

cleana_get_theme_instance();




//////////////////

function cleana_styles(){
    wp_enqueue_style("cleana-style",get_template_directory_uri().'/assets/src/css/main.css');
}
add_action( "wp_enqueue_scripts", "cleana_styles");
/*
**Function to Added My Custom Scripts
**Added By Abdullah Shokr.
**wp_enqueue_script()
*/
function cleana_scripts(){
    // wp_script_add_data( "jquery", "conditional", "lt IE 9" )
    wp_deregister_script( "jquery" );//Remove jquery
    //wp_register_script( "jquery", includes_url( "/js/jquery/jquery.min.js"),false,'',true );//Register js
    //wp_enqueue_script("jquery");
    wp_enqueue_script("main-js",get_template_directory_uri().'/assets/src/js/main.js',array(),false,true);
    wp_enqueue_script("flowbite-js",get_template_directory_uri().'/assets/src/js/flowbite.min.js',array(),false,true);

}
add_action( "wp_enqueue_scripts", "cleana_scripts");