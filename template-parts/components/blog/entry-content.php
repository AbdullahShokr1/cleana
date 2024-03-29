<?php
/**
 * Template for entry content.
 *
 * To be used inside WordPress The Loop.
 *
 * @package Cleana
 */

?>

<div class="entry-content">
	<?php
	if ( is_single() ) {
		the_content(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. */
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'cleana' ),
					[
						'span' => [
							'class' => [],
						],
					]
				),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			)
		);

		wp_link_pages(
			[
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cleana' ),
				'after'  => '</div>',
			]
		);

	} else {
		?>
		<div class="truncate-4">
			<?php cleana_the_excerpt( 200 ); ?>
		</div>
		<?php
		echo cleana_excerpt_more();
	}

	?>
</div>