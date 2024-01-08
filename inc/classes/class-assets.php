<?php
/**
 * Enqueue theme assets
 *
 * @package Cleana
 */

namespace CLEANA_THEME\Inc;

use CLEANA_THEME\Inc\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( "wp_enqueue_scripts", [$this,"register_styles"]);
		add_action( "wp_enqueue_scripts", [$this,"register_scripts"]);

	}

	/*
	**Function to Added My Custom Style
	**Added By Abdullah Shokr.
	**wp_enqueue_style()
	*/
	public function register_styles(){
		wp_enqueue_style("cleana-style",CLEANA_DIR_URL.'/assets/src/css/main.css');
	}


	/*
	**Function to Added My Custom Scripts
	**Added By Abdullah Shokr.
	**wp_enqueue_script()
	*/
	public function register_scripts(){
		// wp_script_add_data( "jquery", "conditional", "lt IE 9" )
		wp_deregister_script( "jquery" );//Remove jquery
		//wp_register_script( "jquery", includes_url( "/js/jquery/jquery.min.js"),false,'',true );//Register js
		//wp_enqueue_script("jquery");
		wp_enqueue_script("main-js",CLEANA_DIR_URL.'/assets/src/js/main.js',array(),false,true);
		wp_enqueue_script("flowbite-js",CLEANA_DIR_URL.'/assets/src/js/flowbite.min.js',array(),false,true);
	}

}