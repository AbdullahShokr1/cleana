<?php
/**
 * Front page template
 *
 * @package Cleana
 */


get_header();

?>
<main id="main" class="site-main mt-5" role="main">
	<div class="home-page-wrap">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content/content', 'page' );
			endwhile;
			?>
		<?php
		else :
			get_template_part( 'template-parts/content/content-none' );

		endif;
		get_template_part( 'template-parts/content/components/posts-carousel' );
		?>
	</div>
</main>
<?php
get_footer();