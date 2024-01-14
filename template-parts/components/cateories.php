<?php
/**
 * Template for Loop Categories.
 *
 * To be used inside of WordPress The Loop.
 *
 * @package Cleana
 */
$categories = get_categories(array('orderby' => 'name','order' => 'ASC','hide_empty' => false,));

?>
<!--Start Category Section-->
<section class="p-5 sm:p-10 md:p-16 bg-white  dark:bg-gray-900">
    <section class="text-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">الاقسام</h2>
    </section>
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 bg-white dark:bg-gray-900">
        <?php 
            foreach( $categories as $category ) {
                $category_term_id = $category->term_id; // Replace with your actual term ID.
                $category_term_meta = get_term_meta($category_term_id);
                if($category->name != "Uncategorized"){
                ?>
                <section class="flex flex-col bg-white dark:bg-gray-900">
                    <a class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2" href="<?php echo get_category_link( $category->term_id ) ?>">
                        <section class="category-container relative flex flex-col items-center justify-center">
                            <?php
                            foreach( $category_term_meta as $category_image ){
                                if($category_image[0] ) {
                                    echo '<img  class="category-image rounded-full shadow-md transition duration-300 transform hover:scale-110" src="' . esc_url($category_image[0] ) . '" alt="' . single_cat_title('', false) . '">';
                                }else{
                                    echo '<img  class="category-image rounded-full shadow-md transition duration-300 transform hover:scale-110" src="' . esc_url(CLEANA_DIR_URL.'/assets/src/images/category.jpg') . '" alt="' . single_cat_title('', false) . '">';
                                }
                            }
                            ?>
                            <h2 class="mt-2 text-center text-gray-800 font-bold category-title dark:text-white dark:hover:text-blue-500"><?php echo $category->name ?></h2>
                        </section>
                    </a>
                </section>
                <?php 
                }
            } 
        ?> 
    </section>
</section>
<!--End Category Section-->




