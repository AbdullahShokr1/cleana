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
if ( ! defined( 'CLEANA_BUILD_IMG_URI' ) ) {
	define( 'CLEANA_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/src/images' );
}
if ( ! defined( 'CLEANA_ARCHIVE_POST_PER_PAGE' ) ) {
	define( 'CLEANA_ARCHIVE_POST_PER_PAGE', 20 );
}

if ( ! defined( 'CLEANA_SEARCH_RESULTS_POST_PER_PAGE' ) ) {
	define( 'CLEANA_SEARCH_RESULTS_POST_PER_PAGE', 9 );
}
if ( ! defined( 'CLEANA_NO_CATEGORY' ) ) {
	define( 'CLEANA_NO_CATEGORY', untrailingslashit( "blog" ) );
}
if ( ! defined( 'CLEANA_BOLG_ID' ) ) {
	define( 'CLEANA_BOLG_ID', untrailingslashit( "blog" ) );
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
/**
 * Make Wordpress Accept Image by WebP
 * 
*/
add_filter('upload_mimes', 'my_custom_mime_types');

function my_custom_mime_types($mime_types) {
  $mime_types['image/webp'] = 'webp';
  return $mime_types;
}

/**
 * Make Wordpress Dashboard Setting
 * 
*/
function theme_options_menu() {
    add_menu_page(
        'إعدادات القالب',
        'إعدادات القالب',
        'manage_options',
        'theme-options',
        'theme_options_page'
    );
}
add_action('admin_menu', 'theme_options_menu');
function theme_options_page() {
    ?>
    <div class="wrap">
        <h2>Theme Options</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('theme_options');
            do_settings_sections('theme_options');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
function theme_options_init() {
    register_setting('theme_options', 'theme_options');

    add_settings_section('section1', 'Section 1', 'section1_callback', 'theme_options');
    // Repeat the above line for additional sections (section2, section3, etc.)

    add_settings_field('section1_title', 'Title', 'section_title_callback', 'theme_options', 'section1');
    add_settings_field('section1_paragraph', 'Paragraph', 'section_paragraph_callback', 'theme_options', 'section1');
    add_settings_field('section1_image', 'Image', 'section_image_callback', 'theme_options', 'section1');
    // Repeat the above three lines for additional fields in each section

    // Repeat the above for additional sections
}
add_action('admin_init', 'theme_options_init');
function section1_callback() {
    echo '<p>Description for Section 1</p>';
}

function section_title_callback() {
    $options = get_option('theme_options');
    echo '<input type="text" name="theme_options[section1_title]" value="' . esc_attr($options['section1_title']) . '" />';
}

function section_paragraph_callback() {
    $options = get_option('theme_options');
    echo '<textarea name="theme_options[section1_paragraph]">' . esc_textarea($options['section1_paragraph']) . '</textarea>';
}

function section_image_callback() {
    $options = get_option('theme_options');
    echo '<input type="text" name="theme_options[section1_image]" value="' . esc_attr($options['section1_image']) . '" />';
    echo '<input type="button" class="button button-secondary" value="Upload Image" id="upload_image_button" />';
    echo '<script>
        jQuery(document).ready(function($) {
            $("#upload_image_button").click(function() {
                var mediaUploader;
                mediaUploader = wp.media({
                    title: "Choose Image",
                    button: {
                        text: "Choose Image"
                    },
                    multiple: false
                });
                mediaUploader.on("select", function() {
                    var attachment = mediaUploader.state().get("selection").first().toJSON();
                    $("input[name=\'theme_options[section1_image]]").val(attachment.url);
                });
                mediaUploader.open();
            });
        });
    </script>';
}
function enqueue_admin_scripts() {
    wp_enqueue_media();
    // Enqueue your script here
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');