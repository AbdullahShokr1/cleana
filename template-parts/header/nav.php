<?php
/**
* Navigation Bar Theme
* 
* @package Cleana
*/
$menu_class     = \Cleana_Theme\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'cleana-header-menu' );
$header_menus   = wp_get_nav_menu_items( $header_menu_id );
?>
<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <section class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if ( has_custom_logo() ) {
                echo '<img  width="32" height="33" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . ' " class="custom-logo" decoding="async">';
            }
        ?>
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
            <?php echo get_bloginfo('name') ?>
        </span>
    </a>
      




    <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
        <span class="sr-only"></span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <section class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
    <?php
    if ( ! empty( $header_menus ) && is_array( $header_menus ) ) {
    ?>
    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <?php
        foreach ( $header_menus as $menu_item ) {
            if ( ! $menu_item->menu_item_parent ) {
                $sub_menus   = $menu_class->get_menu_items_by_parent( $header_menus, $menu_item->ID );
                $has_children       = ! empty( $sub_menus ) && is_array( $sub_menus );
                $has_sub_menu_class = ! empty( $has_children ) ? 'has-submenu' : '';
                $link_target        = ! empty( $menu_item->target ) && '_blank' === $menu_item->target ? '_blank' : '_self';
                // Note_: Similar to $menu_item->target, there are other keys available in the $menu_item, such as classes. You can more key values if you need.
                if ( ! $has_children ) {
                    ?>
                    <li>
                        <a class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page" href="<?php echo esc_url( $menu_item->url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"
                        title="<?php echo esc_attr( $menu_item->title ); ?>">
                            <?php echo esc_html( $menu_item->title ); ?>
                        </a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            <?php echo esc_html( $menu_item->title ); ?> 
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>

                        <section id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
                                
                                <?php
                                foreach ( $sub_menus as $child_menu_item ) {
                                    $has_children_children     = ! empty( $child_menu_item->children ) && is_array( $child_menu_item->children );
                                    $link_target = ! empty( $child_menu_item->target ) && '_blank' === $child_menu_item->target ? '_blank' : '_self';                                    
                                    if ( ! $has_children_children ) {
                                        ?>
                                        <li>
                                            <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                            href="<?php echo esc_url( $child_menu_item->url ); ?>"
                                            target="<?php echo esc_attr( $link_target ); ?>"
                                            title="<?php echo esc_attr( $child_menu_item->title ); ?>">
                                                <?php echo esc_html( $child_menu_item->title ); ?>
                                            </a>
                                        </li>
                                        <?php
                                    }else{
                                        ?>
                                        <li aria-labelledby="dropdownNavbarLink">
                                            <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                <?php echo esc_html( $child_menu_item->title ); ?>
                                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                                </svg>
                                            </button>
                                            <div id="doubleDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                                                    <?php
                                                    foreach ( $child_menu_item->children as $child_menu_item_child ) {  
                                                    ?>
                                                        <li>
                                                            <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                                            href="<?php echo esc_url( $child_menu_item_child->url ); ?>"
                                                            title="<?php echo esc_attr( $child_menu_item_child->title ); ?>">
                                                                <?php echo esc_html( $child_menu_item_child->title ); ?>
                                                            </a>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </section>
                    </li>
                    <?php
                }
                ?>
                <?php
            }
        }
        ?>
        <li>
            <button id="theme-toggle" type="button" class=" block px-4 py-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg ">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
        </li>
    </ul>
    <?php
    }
    ?>
    </section>
    </section>
</nav>












