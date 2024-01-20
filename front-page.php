<?php
/*
* Main Theme Files
*
* @package Cleana
*/
// Exclude category with ID 12 (replace with your category ID)
$category_id = get_cat_ID(CLEANA_NO_CATEGORY);
$query = new WP_Query( array( 'category__not_in' => array( $category_id ) ) );
$blog_id = get_cat_ID(CLEANA_BOLG_ID);
$blog = new WP_Query( array( 'category__in' => array( $blog_id ) ) );
$hero_section1 = get_option('theme_options');
$args=[
	[
	  "title"=> $hero_section1['section1_title'],
	  "paragraph"=> $hero_section1['section1_paragraph'],
	  "image"=> $hero_section1['section1_image'],
	],
	[
		"title"=> $hero_section1['section2_title'],
		"paragraph"=> $hero_section1['section2_paragraph'],
		"image"=> $hero_section1['section2_image'],
	],
];
$args2=[
	[
		"title"=> $hero_section1['section3_title'],
		"paragraph"=> $hero_section1['section3_paragraph'],
		"image"=> $hero_section1['section3_image'],
	],
	[
		"title"=> $hero_section1['section4_title'],
		"paragraph"=> $hero_section1['section4_paragraph'],
		"image"=> $hero_section1['section4_image'],
	],
];
$args3=[
	[
		"title"=> $hero_section1['section5_title'],
	  "paragraph"=> $hero_section1['section5_paragraph'],
	  "image"=> $hero_section1['section5_image'],
	],
	[
		"title"=> $hero_section1['section6_title'],
	  "paragraph"=> $hero_section1['section6_paragraph'],
	  "image"=> $hero_section1['section6_image'],
	],
]
?>
<?php get_header();?>
<!--Start Main Section-->
<main id="front">
<?php
get_template_part( 'template-parts/components/posts-carousel' );
get_template_part( 'template-parts/components/cateories' );
if ( have_posts() ) :
	?>
	<!--Start Section Services-->
	<?php
	if ( $query->have_posts() ){
	?>
	<section class=" mx-auto p-5 sm:p-10 md:p-16 bg-blue-50 dark:bg-slate-800">
		<?php
		if ( is_home() || is_front_page() ) {
		?>
		<section class="mx-auto max-w-lg text-center py-2">
			<h1 class="page-title text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">
				<?php echo get_bloginfo('name') ?> : خدماتنا
			</h1>
			<p class="mt-4 dark:text-gray-300 dark:text-gray-400">
				<strong>
				نقدم خدمات منزلية (شركات تنظيف منازل - شركات تنظيف كنب وسجاد وموكيت -شركات تنظيف خزانات - وشركات مكافحة الحشرات والفئران والبق والصراصير - شركات نقل العفش والاثات -شركات شراء الاثاث المستعمل ) 
				</strong>
			</p>
		</section>
		<?php
		}
		?>
		<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
		<?php
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
	}
	?>
	<!--End Section Services-->
	
	<!--Start Section Blog-->
	<?php
	if ( $blog->have_posts() ){
	?>
	<section class=" mx-auto p-5 sm:p-10 md:p-16 bg-blue-200 dark:bg-gray-900">
		<?php
		if ( is_home() || is_front_page() ) {
		?>
		<section class="mx-auto max-w-lg text-center py-2">
			<h2 class="page-title text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">
				المدونة
			</h2>
			<p class="mt-4 dark:text-gray-300 dark:text-gray-400">
			تقدم المدونة المقالات التي قد تفيدك وتساعدك في حلول سريعة ورائعة في منزلك وهذه الموضوعات حول (مكافحة الحشرات والصرارصير - وطرق تنظيف المنازل والكنب والسجاد - تنظيف وغسيل الخزانات المياة - وتسليك مجاري المطبخ - وطرق تخزين الاثاث - الخ....)
			</p>
		</section>
		<?php
		}
		?>
		<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
		<?php		
		if ( $blog->have_posts() ) :
			while ( $blog->have_posts() ) : $blog->the_post();
				get_template_part( 'template-parts/content/content-blog' );
			endwhile;
		  endif;
		  wp_reset_postdata();
		?>
		</section>
	</section>
	<?php
	}
	?>
	<!--End Section Blog-->
	<?php get_template_part( 'template-parts/components/hero-section',"",$args)?>
	<?php get_template_part( 'template-parts/components/hero-section',"",$args2)?>
	<?php get_template_part( 'template-parts/components/hero-section',"",$args3)?>
	<?php get_template_part( 'template-parts/components/trending')?>
<?php 
else :
	get_template_part( 'template-parts/content/content-none' );
endif;
?>
</main>
<!--End MAin Section-->
<?php get_footer()?>