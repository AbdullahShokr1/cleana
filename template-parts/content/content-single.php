<?php
/**
 * Content template
 *
 * @package cleana
 */

 $the_post_id   = get_the_ID();
 $hide_title    = get_post_meta( $the_post_id, '_hide_page_title', true );
 $call_icons_phone    = get_post_meta( $the_post_id, 'phone', true );
 $call_icons_whatsapp    = get_post_meta( $the_post_id, 'whatsapp', true );
 $heading_class = ( ! empty( $hide_title ) && 'yes' === $hide_title ) ? 'hide d-none' : '';
 $has_post_thumbnail = get_the_post_thumbnail( $the_post_id );
 $the_post_id   = get_the_ID();
 $article_terms = wp_get_post_terms( $the_post_id, [ 'category', 'post_tag' ] );
?>
<!-- CARD -->
<?php
foreach ( $article_terms as $key => $article_term ) {
?>
<a href="<?php echo esc_url( get_term_link( $article_term ) ); ?>">
	<section class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
		<?php echo esc_html( $article_term->name ); ?>
	</section>
</a>
<?php
}
?>
<section class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
	<span class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
	<svg height="13px" width="13px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
		<g>
			<g>
				<path d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
				</path>
			</g>
		</g>
	</svg>
	<span class="ml-1"><?php cleana_posted_on();?></span>
	</span>
	<span class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
	<svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
		</path>
	</svg>
	<span class="ml-1"><?php cleana_posted_by();?></span>
	</span>
</section>
<?php
the_post_custom_thumbnail(
	$the_post_id,
	'featured-thumbnail',
	[
		'sizes' => '(max-width: 100%) 1200px,(max-height: 600px) 600px ',
		'class' => 'w-full h-64 object-cover rounded',
		"itemprop"=>"image",
		'alt'=> wp_kses_post( get_the_title() )
	]
);
// Title
if ( is_single() || is_page() ) {
	printf(
		'<h1 class="page-title text-4xl font-bold mt-4 mb-2 %1$s" itemprop="headline">%2$s</h1>',
		esc_attr( $heading_class ),
		wp_kses_post( get_the_title() )
	);
} else {
	printf(
		'<h3 class="entry-title post-card-title mb-3"><a class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2" href="%1$s">%2$s</a></h3>',
		esc_url( get_the_permalink() ),
		wp_kses_post( get_the_title() )
	);
}
?>
<section class="content">
	<?php the_content();?>
</section>
<?php
if($call_icons_phone || $call_icons_whatsapp){
	if(!empty($call_icons_phone )&& !empty($call_icons_whatsapp)){
		?>
		<section class="contact-icons fixed	bottom-0 left-0">
			<a href="tel:<?php echo $call_icons_phone; ?>" class="phone-icon" title="ايقونة الاتصال">
				<img src="<?php echo esc_url( CLEANA_BUILD_IMG_URI . '/phone.png' )?>" width="48px" hight="48px" alt="رقم الهاتف للاتصال : <?php echo $call_icons_phone;?>">
			</a>
			<a href="https://wa.me/<?php echo  $call_icons_whatsapp; ?>" class="whatsapp-icon" title="ايقونة الواتس">
				<img src="<?php echo esc_url( CLEANA_BUILD_IMG_URI . '/whatsapp.svg' )?>" width="48px" hight="48px" alt="رقم الواتس للتواصل :<?php echo  $call_icons_whatsapp;?>">
			</a>
		</section>
		<?php
	}elseif(!empty($call_icons_phone)){
		?>
		<section class="contact-icons fixed	bottom-0 left-0">
			<a href="tel:<?php echo $call_icons_phone; ?>" class="phone-icon" title="ايقونة الاتصال">
				<img src="<?php echo esc_url( CLEANA_BUILD_IMG_URI . '/phone.png' )?>" width="48px" hight="48px" alt="رقم الهاتف للاتصال : <?php echo $call_icons_phone;?>">
			</a>
		</section>
		<?php
	}elseif(!empty($call_icons_whatsapp)  ){
		?>
		<section class="contact-icons fixed	bottom-0 left-0">
			<a href="https://wa.me/'<?php echo  $call_icons_whatsapp; ?>" class="whatsapp-icon" title="ايقونة الواتس">
				<img src="<?php echo esc_url( CLEANA_BUILD_IMG_URI . '/whatsapp.svg' )?>" width="48px" hight="48px" alt="رقم الواتس للتواصل :<?php echo  $call_icons_whatsapp;?>">
			</a>
		</section>
		<?php
	}
}

?>

