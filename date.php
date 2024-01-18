<?php
/**
 * Date Archive Page template file.
 *
 * @package Cleana
 */

get_header();

global $wp_query;

$the_date           = '';
$the_date_permalink = get_home_url();

// Is Year Archive '/{year}/'
if ( is_year() ) {
	$the_date           = get_the_date( 'Y' );
	$the_date_permalink = sprintf(
		'%1$s%2$s/',
		trailingslashit( $the_date_permalink ),
		get_query_var( 'year' )
	);
}

// Is Monthly Archive '/{year}/{month}/'
if ( is_month() ) {
	$the_date           = get_the_date( 'F, Y' );
	$the_date_permalink = sprintf(
		'%1$s%2$s/%3$s/',
		trailingslashit( $the_date_permalink ),
		get_query_var( 'year' ),
		get_query_var( 'monthnum' )
	);
}

// Is Daily Archive '/{year}/{month}/{day}/'
if ( is_day() ) {
	$the_date           = get_the_date( 'F j, Y' );
	$the_date_permalink = sprintf(
		'%1$s%2$s/%3$s/%4$s/',
		trailingslashit( $the_date_permalink ),
		get_query_var( 'year' ),
		get_query_var( 'monthnum' ),
		get_query_var( 'day' )
	);
}

$current_page_no = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$first_page_url  = $the_date_permalink;
$last_page_url   = sprintf(
	'%1$spage/%2$s',
	esc_url( $the_date_permalink ),
	esc_attr( $wp_query->max_num_pages )
);
?>
<main id="main" class="site-main my-5 dark:bg-gray-800 bg-blue-50 text-black dark:text-white" role="main">
	<section class="container">
		<section class=" mx-auto p-5 rounded text-center text-gray-500 max-w-sm justify-center">
			<?php
			if ( ! empty( $the_date ) ) {
				printf(
					'<h1 class="font-bold text-2xl mb-2 dark:text-white text-black">%s</h1>',
					$the_date
				);
			}
			?>
      	</section>

		<section class="flex flex-col p-5 lg:px-48 lg:py-11">
		<?php
		if ( $wp_query->have_posts() ) :
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
				get_template_part( 'template-parts/content/content-noimage');
			endwhile;
		else :
			get_template_part( 'template-parts/content/content-none' );
		endif;
		?>
		</section>
		<section class="dark:bg-gray-800 bg-blue-50 text-black dark:text-white">
			<?php cleana_the_post_pagination( $current_page_no, CLEANA_ARCHIVE_POST_PER_PAGE, $wp_query, $first_page_url, $last_page_url, false ); ?>
		</section>
	</section>
</main>
<?php
get_footer();