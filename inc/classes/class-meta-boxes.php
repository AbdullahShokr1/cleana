<?php
/**
 * Register Meta Boxes
 *
 * @package Cleana
 */

namespace CLEANA_THEME\Inc;

use CLEANA_THEME\Inc\Traits\Singleton;

/**
 * Class Meta_Boxes
 */
class Meta_Boxes {

	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
		add_action( 'save_post', [ $this, 'save_post_meta_data' ] );


		//Add & Edit Contact Numbers
        add_action('add_meta_boxes', [$this,'add_contact_meta_boxes']);
        add_action('save_post', [ $this,'save_contact_meta_data'] );

	}

	/**
	 * Add custom meta box.
	 *
	 * @return void
	 */
	public function add_custom_meta_box() {
		$screens = [ 'post' ];
		foreach ( $screens as $screen ) {
			add_meta_box(
				'hide-page-title',           // Unique ID
				__( 'اخفاء العنوان', 'cleana' ),  // Box title
				[ $this, 'custom_meta_box_html' ],  // Content callback, must be of type callable
				$screen,                   // Post type
				'side' // context
			);
		}
	}

	/**
	 * Custom meta box HTML( for form )
	 *
	 * @param object $post Post.
	 *
	 * @return void
	 */
	public function custom_meta_box_html( $post ) {

		$value = get_post_meta( $post->ID, '_hide_page_title', true );

		/**
		 * Use nonce for verification.
		 * This will create a hidden input field with id and name as
		 * 'hide_title_meta_box_nonce_name' and unique nonce input value.
		 */
		wp_nonce_field( plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name' );

		?>
		<label for="cleana-field"><?php esc_html_e( 'اخفاء العنوان', 'cleana' ); ?></label>
		<select name="cleana_hide_title_field" id="cleana-field" class="postbox">
			<option value=""><?php esc_html_e( 'اختار هل تريد اظهار العنوان ام لا', 'cleana' ); ?></option>
			<option value="yes" <?php selected( $value, 'yes' ); ?>>
				<?php esc_html_e( 'نعم', 'cleana' ); ?>
			</option>
			<option value="no" <?php selected( $value, 'no' ); ?>>
				<?php esc_html_e( 'لا', 'cleana' ); ?>
			</option>
		</select>
		<?php
	}

	/**
	 * Save post meta into database
	 * when the post is saved.
	 *
	 * @param integer $post_id Post id.
	 *
	 * @return void
	 */
	public function save_post_meta_data( $post_id ) {

		/**
		 * When the post is saved or updated we get $_POST available
		 * Check if the current user is authorized
		 */
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		/**
		 * Check if the nonce value we received is the same we created.
		 */
		if ( ! isset( $_POST['hide_title_meta_box_nonce_name'] ) ||
		     ! wp_verify_nonce( $_POST['hide_title_meta_box_nonce_name'], plugin_basename(__FILE__) )
		) {
			return;
		}

		if ( array_key_exists( 'cleana_hide_title_field', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_hide_page_title',
				$_POST['cleana_hide_title_field']
			);
		}
	}








    // Add meta boxes to posts
    public function add_contact_meta_boxes() {
		$screens = [ 'post' ];
		foreach ( $screens as $screen ) {
			add_meta_box(
				'call-us-numbers',           // Unique ID
				__( 'ايقونات الاتصال', 'cleana' ),  // Box title
				[ $this, 'display_contact_meta_boxes' ],  // Content callback, must be of type callable
				$screen,                   // Post type
				'side' // context
			);
		}
	}

    // Display meta fields 
    function display_contact_meta_boxes( $post ) {
        $phone = get_post_meta( $post->ID, 'phone', true );
        $whatsapp = get_post_meta( $post->ID, 'whatsapp', true ); ?>
        <label>رقم الهاتف:</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>">
        </br>
        <label>رقم الواتس:</label>
        <input type="text" name="whatsapp" value="<?php echo $whatsapp; ?>">
        <?php
    }
    // Save meta data
    function save_contact_meta_data( $post_id ) {
        if( isset($_POST['phone']) ) {
        update_post_meta( $post_id, 'phone', sanitize_text_field( $_POST['phone'] ) );  
        }
        if( isset($_POST['whatsapp']) ) {  
        update_post_meta($post_id, 'whatsapp', sanitize_text_field( $_POST['whatsapp'] ));  
        }
    }  

	
}