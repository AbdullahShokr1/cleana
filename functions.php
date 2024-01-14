<?php
/*
* Theme Functions.
*
* @package Cleana
*/
if ( ! defined( 'CLEANA_DIR_PATH' ) ) {
	define( 'CLEANA_DIR_PATH', untrailingslashit( get_template_directory() ) );
}
if ( ! defined( 'CLEANA_DIR_URL' ) ) {
	define( 'CLEANA_DIR_URL', untrailingslashit( get_template_directory_uri() ) );
}


require_once CLEANA_DIR_PATH . '/inc/helpers/autoloader.php';
require_once CLEANA_DIR_PATH . '/inc/helpers/template-tags.php';

function cleana_get_theme_instance() {
	\CLEANA_THEME\Inc\CLEANA_THEME::get_instance();
}

cleana_get_theme_instance();


/**
 * Category image
*/
///Add & Edit Image in Category
add_action('category_add_form_fields', 'add_category_image_field', 10, 2);
add_action('category_edit_form_fields', 'edit_category_image_field', 10, 2);
add_action('edited_category', 'save_category_image', 10, 2);
add_action('create_category', 'save_category_image', 10, 2);

/**
 * Add & Edit Caategory
 */
///Add & Edit Image in Category
function add_category_image_field($taxonomy) {
	?>
	<div class="form-field term-group">
		<label for="category_image_id"><?php _e('Image', 'text-domain'); ?></label>
		<input type="text" id="category_image_id" name="category_image_id" class="custom_media_url" value="">
	</div>
	<?php
}
// Edit category field
function edit_category_image_field($term, $taxonomy) {
$image_id = get_term_meta($term->term_id, 'category_image_id', true);
?>
<tr class="form-field term-group-wrap">
	<th scope="row">
		<label for="category_image_id"><?php _e('Image', 'text-domain'); ?></label>
	</th>
	<td>
		<input type="text" id="category_image_id" name="category_image_id" value="<?php echo $image_id; ?>">
		<div id="category-image-wrapper">
			<?php if ($image_id) : ?>
				<?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
			<?php endif; ?>
		</div>
		<p class="description"><?php _e('Upload an image for the category', 'text-domain'); ?></p>
	</td>
</tr>
<?php
}

function save_category_image($term_id, $tt_id) {
	if (isset($_POST['category_image_id']) && '' !== $_POST['category_image_id']){
		$image = $_POST['category_image_id'];
		update_term_meta($term_id, 'category_image_id', $image);
	} else {
		update_term_meta($term_id, 'category_image_id', '');
	}
}







