<?php
/**
 * Enqueue theme Menus
 *
 * @package Cleana
 */

namespace CLEANA_THEME\Inc;

use CLEANA_THEME\Inc\Traits\Singleton;

class Menus {
	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'register_menus' ] );
	}



	/*
	**Function to Register Menus
	**Added By Abdullah Shokr.
	**
	*/
	public function register_menus() {
		register_nav_menus([
			'cleana-header-menu' => esc_html__( 'Header Menu', 'cleana' ),
			'cleana-footer-menu' => esc_html__( 'Footer Menu', 'cleana' ),
		]);
	}

	/**
	 * Get the menu id by menu location.
	 *
	 * @param string $location
	 *
	 * @return integer
	 */
	public function get_menu_id( $location ) {

		// Get all locations
		$locations = get_nav_menu_locations();

		// Get object id by location.
		$menu_id = ! empty($locations[$location]) ? $locations[$location] : '';

		return ! empty( $menu_id ) ? $menu_id : '';

	}

	/**
     * Get all child menus that has given parent menu id.
     *
     * @param array   $menu_array Menu array.
     * @param integer $parent_id Parent menu id.
     *
     * @return array Child menu array.
     */
    public function get_menu_items_by_parent( $menu_items, $parent_id = 0 ) {
        $child_menus = array();
    
        foreach ( $menu_items as $menu_item ) {
            if ( intval( $menu_item->menu_item_parent ) === $parent_id ) {
                $menu_item->children = $this->get_menu_items_by_parent( $menu_items, $menu_item->ID );
                $child_menus[] = $menu_item;
            }
        }
    
        return $child_menus;
    }

}