<?php
/*
* Main Theme Files
*
* @package Cleana
*/
// Exclude category with ID 12 (replace with your category ID)
$category_id = get_cat_ID(CLEANA_NO_CATEGORY);
$query = new WP_Query( array( 'category__not_in' => array( $category_id ) ) );
?>
<?php get_header();?>
<!--Start Main Section-->
<main>
<?php
get_template_part( 'template-parts/components/posts-carousel' );
get_template_part( 'template-parts/components/cateories' );
if ( have_posts() ) :
	?>
	<section class=" mx-auto p-5 sm:p-10 md:p-16 bg-blue-50 dark:bg-slate-800">
		<?php
		if ( is_home() && ! is_front_page() ) {
		?>
		<section class="text-center">
			<h1 class="page-title text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">
				<?php single_post_title(); ?>
			</h1>
		</section>
		<?php
		}
		?>
		<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
		<?php
		$index         = 0;
		$no_of_columns = 3;
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content/content-blog' );
			$index ++;
		endwhile;
		
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				get_template_part( 'template-parts/content/content-blog' );
			endwhile;
		  endif;
		  wp_reset_postdata();
		?>
		
		</section>
	</section>
<?php 
else :
	get_template_part( 'template-parts/content/content-none' );
endif;
?>
</main>
<!--End MAin Section-->
<?php get_footer()?>