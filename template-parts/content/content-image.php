<?php
/**
 * Content template
 *
 * @package cleana
 */
$the_post_id   = get_the_ID();
$hide_title    = get_post_meta( $the_post_id, '_hide_page_title', true );
$heading_class = ( ! empty( $hide_title ) && 'yes' === $hide_title ) ? 'hide d-none' : '';
$has_post_thumbnail = get_the_post_thumbnail( $the_post_id );
?>
<!-- CARD -->
<section class="bg-gray-200 dark:bg-gray-600 dark:text-white p-5 mb-10 rounded-lg">
	<h2 class="font-bold text-2xl mb-2"><?php echo wp_kses_post( get_the_title()); ?></h2>
	<p class="my-3"><?php cleana_the_excerpt( 200 ); ?></p>
	<a href="<?php echo esc_url( get_permalink() ); ?>" class="text-white font-semibold bg-blue-600 hover:bg-blue-800 p-2 my-1 rounded"><?php _e("فتح المقالة","cleana") ?></a>
</section>