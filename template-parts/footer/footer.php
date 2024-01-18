<?php
/**
 * Footer Theme
 * 
 * @package Cleana
 */
?>
<footer class="bg-blue-50 dark:bg-gray-800  border-gray-200 dark:text-white">
    <section class="container p-6 mx-auto">
        <section class="lg:flex">
            <section class="w-full -mx-6 lg:w-2/5">
                <section class="px-6">
                    <a href="<?php echo  esc_url(home_url()); ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <?php 
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                            if ( has_custom_logo() ) {
                                echo '<img  width="32" height="33" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . ' " class="custom-logo" decoding="async">';
                            }
                        ?>
                        <section id="logo-txt">
                            <section class="self-center text-4xl font-semibold whitespace-nowrap dark:text-white font-kuuffi"><?php echo get_bloginfo('name') ?></section>
                        </section>
                    </a>
                    <p class="max-w-sm mt-2 text-gray-500 dark:text-gray-400"><?php echo get_bloginfo('description') ?></p>
                </section>
            </section>

            <section class="mt-6 lg:mt-0 lg:flex-1">
                <section class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
                    <?php dynamic_sidebar('sidebar-2')?>
                    <?php dynamic_sidebar('sidebar-3')?>
                    <?php dynamic_sidebar('sidebar-4')?>
                </section>
            </section>
        </section>

        <hr class="h-px my-6 bg-black border-none dark:bg-gray-700">

        <section>
            <p class="text-center text-gray-500 dark:text-gray-400">© Abdullah Shokr 2024 - كل الحقوق محفوظة</p>
        </section>
    </section>
</footer>