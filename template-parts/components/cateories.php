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
<section class="row my-4">
    <?php 
        foreach( $categories as $category ) {
            $category_term_id = $category->term_id; // Replace with your actual term ID.
            $category_term_meta = get_term_meta($category_term_id);
            if($category->name != "Uncategorized"){
            ?>
                <section class="col-md-3 text-center my-3">
                    <?php
                    foreach( $category_term_meta as $category_image ){
                        if($category_image[0] ) {
                            echo '<img class="catego-img rounded-circle" src="' . esc_url($category_image[0] ) . '" alt="' . single_cat_title('', false) . '">';
                        }
                    }
                    ?>
                    <img class="catego-img rounded-circle" src="images/background.webp" alt="<?php echo $category->name ?>">
                    <h2><a href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name ?></a></h2>
                </section><!-- /.col-lg-3 -->
            <?php 
            }
        } 
    ?> 
</section><!-- /.row -->