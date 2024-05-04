<?php
/**
 * Category Page template file.
 *
 * @package Cleana
 */

get_header();
?>
<main class="container mx-auto pt-4 dark:bg-gray-800 bg-blue-50 text-black dark:text-white">
	<?php
	if (is_category()) {
		?>
		<section class=" mx-auto p-5 rounded text-center text-gray-500 max-w-sm justify-center">
			<?php
			if (!empty(get_the_archive_description())) {
				the_archive_description('<p class="mt-2 text-sm text-gray-900">', '</p>');
			}
			$category = get_queried_object();
			//$category_term_meta = get_term_meta($category->term_id);
		
			$meta_key = 'category_image_id';
			$meta_value = get_term_meta($category->term_id, $meta_key, true);
			if ($meta_value) {
				echo '<img  class="rounded-full shadow-md transition duration-300 transform hover:scale-110" src="' . esc_url($meta_value) . '" alt="' . single_cat_title('', false) . '">';
			} else {
				echo '<img  class=" rounded-full shadow-md transition duration-300 transform hover:scale-110" src="' . esc_url(CLEANA_DIR_URL . '/assets/src/images/category.jpg') . '" alt="' . single_cat_title('', false) . '">';
			}
			if (!empty(single_term_title('', false))) {
				printf(
					'<h1 class="font-bold text-2xl mb-2 dark:text-white text-black">%s</h1>',
					single_term_title('', false)
				);
			}
			?>
		</section>
		<?php
	} else {
		?>
		<section class=" mx-auto p-5 rounded text-center text-gray-500 max-w-sm justify-center">
			<?php
			if (!empty(single_term_title('', false))) {
				printf(
					'<h1 class="font-bold text-2xl mb-2 dark:text-white text-black">%s</h1>',
					single_term_title('', false)
				);
			}
			?>
		</section>
		<?php
	}
	?>
	<section class="flex flex-col p-5 lg:px-48 lg:py-11">
		<?php
		if (!is_category(CLEANA_NO_CATEGORY)) {
			if (have_posts()):
				while (have_posts()):
					the_post();
					get_template_part('template-parts/content/content-noimage');
				endwhile;
			else:
				get_template_part('template-parts/content/content-none');
			endif;
		} else {
			?>
			<section class="bg-blue-50 dark:bg-slate-800">
				<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
					<?php
					if (have_posts()):
						while (have_posts()):
							the_post();
							get_template_part('template-parts/content/content-blog');
							wp_reset_postdata();
						endwhile;
					else:
						get_template_part('template-parts/content/content-none');
					endif;
					?>
				</section>
			</section>
			<?php
		}
		?>
	</section>
	<section class=" mx-auto px-4 py-2 pb-4 flex justify-center flex-wrap dark:bg-slate-900 bg-blue-200">
		<!-- Pagination -->
		<?php the_posts_pagination();?>
	</section>
</main>
<?php
get_footer();
?>