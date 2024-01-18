<?php
/**
 * Page template
 *
 * @package Cleana
 */
$the_post_id   = get_the_ID();
$hide_title    = get_post_meta( $the_post_id, '_hide_page_title', true );
$heading_class = ( ! empty( $hide_title ) && 'yes' === $hide_title ) ? 'hide d-none' : '';



get_header();
?> 
<section id="page" class="bg-blue-50 dark:bg-slate-800 dark:text-white">
	<section class="container mx-auto px-4 py-2">
		<?php
		// Title
		if ( is_single() || is_page() ) {
			printf(
				'<h1 class="page-title text-4xl font-bold mt-4 mb-2 %1$s">%2$s</h1>',
				esc_attr( $heading_class ),
				wp_kses_post( get_the_title() )
			);
		} else {
			printf(
				'<h3 class="entry-title post-card-title mb-3"><a class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2" href="%1$s">%2$s</a></h3>',
				esc_url( get_the_permalink() ),
				wp_kses_post( get_the_title() )
			);
		}
		?>
		<?php the_content();?>
	</section>
</section>
<?php
get_footer();
