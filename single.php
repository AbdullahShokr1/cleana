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
		<section id="post" class="w-full md:w-8/12 px-4 mb-8">
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
			<section class="prev-link"><?php previous_post_link(); ?></section>
			<section class="next-link"><?php next_post_link(); ?></section>

		</section>
	</section>
	<?php get_sidebar()?>
</main>
<?php

get_footer();