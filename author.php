<?php
/**
 * Author Archive Page template file.
 *
 * @package Cleana
 */

get_header();
$author = get_queried_object();
?>
<!--Start Main Element-->
<main class="container mx-auto pt-4 dark:bg-gray-800 bg-blue-50 text-black dark:text-white">
	<section class="dark:bg-gray-800 bg-blue-50 text-black dark:text-white">
		<section class="container mx-auto py-8">
			<section class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
				<!--Section header Author-->
				<?php get_template_part( 'template-parts/author/header' ); ?>
				<section class="col-span-4 sm:col-span-9">
					<section class=" shadow rounded-lg p-6 dark:bg-slate-900 bg-blue-200">
						<h1 class="text-xl font-bold mt-6 mb-4"><?php echo _e( 'المقالات', 'cleana' ); ?></h1>
						<?php
						if ( ! empty( get_the_author() ) ) {
							printf(
								'<h3 class="font-size-xl h3 pb-4">%1$s %2$s</h3>',
								__( 'مقالات كتبت بواسطة ', 'cleana' ),
								get_the_author()
							);
						}
						?>
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/author/posts');
							endwhile;
						else :
							get_template_part( 'template-parts/content-none' );
						endif;
						?>
					</section>
				</section>
			</section>
		</section>
	</section>
</main>
<!--End Main Element-->
<?php
get_footer();
?>