<?php
/**
 * Post Author template
 *
 * @package cleana
 */

 $the_post_id   = get_the_ID();
 $hide_title    = get_post_meta( $the_post_id, '_hide_page_title', true );
 $heading_class = ( ! empty( $hide_title ) && 'yes' === $hide_title ) ? 'hide d-none' : '';
 $has_post_thumbnail = get_the_post_thumbnail( $the_post_id );
 $the_post_id   = get_the_ID();
 $article_terms = wp_get_post_terms( $the_post_id, [ 'category', 'post_tag' ] );
?>
<!-- CARD -->
<section class="mb-6">
	<section class="flex justify-between flex-wrap gap-2 w-full">
		<h2 class="text-gray-700 font-bold dark:text-gray-400"><a  href="<?php echo esc_url( get_permalink() ); ?>"><?php echo wp_kses_post( get_the_title() ); ?></a></h2>
		<p>
			<?php
			foreach ( $article_terms as $key => $article_term ) {
			?>
			<span class="text-gray-700 mr-2 dark:text-gray-400">
				<a href="<?php echo esc_url( get_term_link( $article_term ) ); ?>">
					<?php echo esc_html( $article_term->name ); ?>
				</a>
			</span>
			<?php
			}
			?>
			<span class="text-gray-700 dark:text-gray-400"><?php cleana_posted_on();?></span>
		</p>
	</section>
	<p class="mt-2">
		<?php cleana_the_excerpt( 200 ); ?>
	</p>
</section>

