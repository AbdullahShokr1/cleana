<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package cleana
 */

?>

<section class="no-result not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'لا توجد اي مقالات حتي الان.', 'cleana' ); ?></h1>
	</header>

	<section class="page-content">
		<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) {
			?>
				<p>
					<?php
						printf(
								wp_kses(
										__( 'جاهز لنشر أول منشوراتك؟ <a href="%s">اضغط هنا</a>', 'cleana' ),
									[
											'a' => [
													'href' => []
											]
									]
								),
								esc_url( admin_url( 'post-new.php' ) )
						)
					?>
				</p>
			<?php
			} elseif ( is_search() ) {
				?>
				<p><?php esc_html_e( 'آسف ولكن لا شيء يطابق عنصر البحث الخاص بك. أرجو المحاولة مرة أخرى بإستخدام كلمات أخرى', 'cleana'  ); ?></p>
				<?php
				get_search_form();
			} else {
				?>
				<p><?php esc_html_e( 'يبدو أننا لا نستطيع العثور على ما تبحث عنه. ربما البحث يمكن أن يساعد', 'cleana'  ); ?></p>
				<?php
				get_search_form();
			}
		?>
	</section>
</section>