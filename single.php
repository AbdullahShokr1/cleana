<?php
/**
 * Single post template file.
 *
 * @package Cleana
 */

get_header();

?>
<main class="container mx-auto pt-4 dark:bg-gray-800 bg-blue-50 text-black dark:text-white">
	<section class="flex flex-wrap justify-between">
		<article id="post" class="w-full md:w-8/12 px-4 mb-8" itemscope itemtype="https://schema.org/NewsArticle">
			<?php
				if ( have_posts() ) :
					?>
					<section class="post-wrap">
					<?php
					if ( is_home() && ! is_front_page() ) {
						?>
						<header class="mb-5">
							<h1 class="page-title screen-reader-text">
								<?php single_post_title(); ?>
							</h1>
						</header>
						<?php
					}
					while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content/content-single' );
					endwhile;
				?>
				<?php
				else :
					get_template_part( 'template-parts/content/content-none' );
					?>
					</section>
				<?php
				endif;
			?>
		</article>
		<?php get_sidebar()?>
	</section>
	
	<section class=" mx-auto px-4 py-2 pb-4 flex justify-center flex-wrap dark:bg-slate-900 bg-blue-200">
		<!-- Pagination -->
		<section class="flex bg-gray-50 text-gray-700 border border-gray-200 py-3 px-5 rounded-lg dark:bg-gray-800 dark:border-gray-700">
			<!-- Previous Button -->
			<?php if(!empty(get_next_post())) { ?>
			<section  class="flex items-center justify-center px-4 h-10 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
				<?php next_post_link('%link', "<< التالي"); ?>
			</section>
			<?php } ?>
			<!-- Next Button -->
			<?php if(!empty(get_previous_post())) { ?>
			<section class="flex items-center justify-center px-4 h-10 ms-3 text-base font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
				<?php previous_post_link('%link',"السابق >>");?>
			</section>
			<?php } ?>
		</section>
	</section>
</main>
<?php

get_footer();