<?php
/**
 * Posts Carousel
 *
 * @package Cleana
 */

$args = [
	'posts_per_page'         => 5,
	'post_type'              => 'post',
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
];

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
				<section class="hidden duration-700 ease-in-out" data-carousel-item>
					<?php
					if ( has_post_thumbnail() ) {
						the_post_custom_thumbnail(
							get_the_ID(),
							'large',
							[
								'class' => 'absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2',
							]
						);
						
					} else {
						?>
						<img src="https://via.placeholder.com/510x340" alt="Card image cap">
						<?php
					}
					?>
					<div class="card-body">
						<?php the_title( '<h3 class="card-title">', '</h3>' ); ?>
						<?php cleana_the_excerpt(); ?>
						<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="btn btn-primary">
							<?php esc_html_e( 'View More', 'cleana' ); ?>
						</a>
					</div>
				</section>
			<?php
			endwhile;
		endif;

		wp_reset_postdata();
		?>
		<!-- Slider indicators -->
		<div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
			<button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
			<button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
		</div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
	</section>
</section>