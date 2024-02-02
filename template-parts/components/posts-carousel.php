<?php
/**
 * Posts Carousel
 *
 * @package Cleana
 */

$args = [
	'posts_per_page'         => 4,
	'post_type'              => 'post',
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
];
$home_settings = get_option('theme_options');

$post_query = new \WP_Query( $args );
?>
<section id="default-carousel" class="relative w-full" data-carousel="slide">
	<!-- Carousel wrapper -->
	<section class="relative h-56 overflow-hidden  md:h-96">
		<?php
		if ( $post_query->have_posts() ) :
			while ( $post_query->have_posts() ) :
				$post_query->the_post();
				?>
				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="btn btn-primary">
				<section class="hidden duration-700 ease-in-out" data-carousel-item>
					<?php
					if ( has_post_thumbnail() ) {
						the_post_custom_thumbnail(
							get_the_ID(),
							'null',
							[
								'class' => 'absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2',
								'alt' => wp_kses_post( get_the_title()),
							]
						);
						
					} else {
						?>
						<img src="<?php echo $home_settings['section7_image'] ?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="<?php echo wp_kses_post( get_the_title());?>" loading="lazy" decoding="async">
						<?php
					}
					?>
				</section>
				</a>
			<?php
			endwhile;
		endif;
		wp_reset_postdata();
		?>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">التالي</span>
            </span>
        </button>
	</section>
</section>