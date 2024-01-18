<?php
/**
 * Theme Sidebar
 *
 * @package Cleana
 */

namespace CLEANA_THEME\Inc;

use CLEANA_THEME\Inc\Traits\Singleton;

/**
 * Class Assets
 */
class Sidebars {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * To register action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {

		/**
		 * Actions
		 */
		add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
		add_action( 'widgets_init', [ $this, 'register_clock_widget' ] );
		add_action( 'widgets_init', [ $this, 'register_category_widget' ] );

	}

	/**
	 * Register widgets.
	 *
	 * @action widgets_init
	 */
	public function register_sidebars() {

		register_sidebar(
			[
				'name'          => esc_html__( 'Sidebar', 'cleana' ),
				'id'            => 'sidebar-1',
				'description'   => '',
				'before_widget' => '<section id="sidebar-%1$s" class="widget widget-sidebar cell column %2$s"><section class="mb-4 dark:bg-slate-900 bg-blue-200 px-4 py-6 rounded-xl border border-pink-500/10 shadow-xl transition hover:border-pink-500/10 hover:shadow-pink-500/10">',
				'after_widget'  => '</section></section>',
				'before_title'  => '<h3 class=" widget-title text-lg font-bold mb-2">',
				'after_title'   => '</h3>',
			]
		);

		register_sidebar(
			[
				'name'          => esc_html__( 'Footer1', 'cleana' ),
				'id'            => 'sidebar-2',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget widget-footer cell column %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			]
		);
		register_sidebar(
			[
				'name'          => esc_html__( 'Footer2', 'cleana' ),
				'id'            => 'sidebar-3',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget widget-footer cell column %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			]
		);
		register_sidebar(
			[
				'name'          => esc_html__( 'Footer3', 'cleana' ),
				'id'            => 'sidebar-4',
				'description'   => '',
				'before_widget' => '<section id="%1$s" class="widget widget-footer cell column %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			]
		);

	}

	public function register_clock_widget() {
		register_widget( 'CLEANA_THEME\Inc\Clock_Widget' );
	}
	public function register_category_widget() {
		register_widget( 'CLEANA_THEME\Inc\Category_Widget' );
	}

}
