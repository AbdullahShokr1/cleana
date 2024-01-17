<?php
/**
 * 404 Page template file.
 *
 * @package Cleana
 */

get_header();

?>

<section class=" flex flex-col items-center justify-center  md:px-8 lg:px-24 py-8 shadow-2xl bg-blue-50 dark:bg-gray-800">
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl font-bold tracking-wider text-gray-300 dark:text-white">404</h1>
    <p class="text-2xl md:text-3xl lg:text-5xl font-bold tracking-wider text-gray-500 mt-4"><?php _e("صفحة غير موجودة","cleana") ?></p>
    <p class="text-gray-500 mt-4 pb-4 border-b-2 text-center"><?php _e("هذه الصفحة التي تحاول الوصل لها غير موجودة","cleana") ?></p>
    <a href="<?php echo  esc_url(home_url()); ?>" class="flex items-center space-x-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white px-4 py-2 mt-6 rounded transition duration-150" title="<?php _e("العودة للصفحة الرئيسية","cleana") ?>">
        <svg xmlns="https://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
        </svg>
        <span><?php _e("العودة للصفحة الرئيسية","cleana") ?></span>
    </a>
    <?php get_search_form( ); ?>
</section>

<?php
get_footer();
