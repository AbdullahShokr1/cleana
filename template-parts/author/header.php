
<?php
/**
 * Author Header Template Part.
 *
 * @package Cleana
 */

$author_email = get_the_author_meta( 'user_email' );
$has_avatar   = cleana_has_gravatar( $author_email );
$avatar       = get_avatar( $author_email, 240, '', '', [ 'class'   => 'rounded-circle w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0', 'default' => '404' ] );

?>
<section class="col-span-4 sm:col-span-3">
	<section class=" shadow rounded-lg p-6 dark:bg-slate-900 bg-blue-200">
		<section class="flex flex-col items-center">
			<?php
				if ( ! empty( $has_avatar ) ) {
					echo wp_kses_post( $avatar );
				} else {
					echo "<img src='". esc_url( CLEANA_BUILD_IMG_URI . '/user.png' )."' class='w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0'></img>";
				}
			?>
			<h1 class="text-xl font-bold"><?php echo esc_html( get_the_author_meta( 'display_name' )); ?></h1>
			<?php
			// If a user has filled out their description, show a bio on their entries.
			if ( get_the_author_meta( 'description' ) ) : ?>
				<p class="text-gray-700 dark:text-gray-400"><?php  echo esc_html( get_the_author_meta( 'description' ));?></p>
			<?php endif; 
			if ( get_the_author_meta( 'user_url' ) ) : ?>
				<section class="mt-6 flex flex-wrap gap-4 justify-center">
					<a href="<?php  echo esc_html( get_the_author_meta( 'user_url' ));?>" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded" target="_blank"><?php _e("الموقع الالكتروني","cleana")?></a>
				</section>
			<?php endif;
			?>		
		</section>
		<hr class="my-6 border-t border-gray-300">
	</section>
</section>




