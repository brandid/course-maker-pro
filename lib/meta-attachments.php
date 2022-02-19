<?php
/**
 * Class for adding an attachment meta box with custom cropping.
 *
 * @package Course Maker Pro
 * @author  thebrandiD
 * @license GPL-2.0+
 * @link    https://thebrandidthemes.com/
 */

 /**
  * Class for handling meta attachments.
  */
class Meta_Attachments {

	/**
	 * Unique ID for this meta box.
	 *
	 * @var string $id
	 */
	private string $id = '';

	/**
	 * Unique slug for the meta box (see sanitize_title).
	 *
	 * Can be the same as $id.
	 *
	 * @var string $slug
	 */
	private string $slug = '';

	/**
	 * Meta Key to store the data in post meta (use an underline to make the custom field private).
	 *
	 * @var string $meta_key
	 */
	private string $meta_key = '';

	/**
	 * Array of supported post types.
	 *
	 * @var array
	 */
	private array $post_types = array();

	/**
	 * The label that will display inside the meta box.
	 *
	 * @var string $meta_label
	 */
	private string $meta_label = '';

	/**
	 * The priority of where to show the meta box (see add_meta_box).
	 *
	 * @var string $meta_priority
	 */
	private string $meta_priority = 'high';

	/**
	 * Meta location within the editor (see add_meta_box).
	 *
	 * @var string $meta_location
	 */
	private string $meta_location = 'side';

	/**
	 * The meta add attachment button label.
	 *
	 * @var string $attachment_button_label
	 */
	private string $attachment_button_label = '';

	/**
	 * The meta add attachment nonce action.
	 *
	 * @var string $nonce_action To create a nonce from.
	 */
	private string $nonce_action = '';

	/**
	 * Array of supported script hooks.
	 *
	 * @var array $hooks Array of hooks for enqueing (e.g., post.php)
	 */
	private array $hooks = array();

	/**
	 * Array of image attributes to be localized.
	 *
	 * @var array $img_atts Array of image attributes for script localization.
	 */
	private array $img_atts = array();

	/**
	 * The attachment image ID meta key.
	 *
	 * @var string $attachment_id_meta_key Meta key to save and retrieve data.
	 */
	private string $attachment_id_meta_key = '';

	/**
	 * The attachment image URL.
	 *
	 * @var string $attachment_image_url_meta_key Meta key to save and retrieve data.
	 */
	private string $attachment_image_url_meta_key = '';

	/**
	 * Class constructor.
	 *
	 * @param array $args {
	 *     An array of arguments.
	 *
	 *     @type string $id            Unique ID for the meta box (e.g., course_maker_featured_article_image).
	 *                                 This is used for post meta, slugs, etc.
	 *
	 *     @type string $meta_key      Meta key to register (stored in post meta)
	 *     @type array  $post_types    Array of post types to list this meta box on.
	 *     @type string $meta_label    Label for insert attachment button (see add_meta_box).
	 *     @type string $meta_priority Priority of meta box (see add_meta_box).
	 *     @type string $meta_location Location of meta box (see add_meta_box).
	 *     @type string $nonce_action  Nonce action for retrieval, saving, etc.
	 *     @type array  $img_atts {
	 *          @type int    $suggested_width            The desired width of the image (px).
	 *          @type int    $suggested_height           The desired height of the image (px).
	 *          @type string $media_modal_title          The title of the media modal.
	 *          @type string $media_modal_crop_text      The button text of the media uploader insert button.
	 *          @type bool   $can_skip_crop              true|false (Whether the user can skip cropping or not).
	 *          @type string $aspect_ratio               Aspect ratio the cropping tool must have.
	 *     }
	 * }
	 */
	public function __construct( $args ) {
		// Set defaults.
		$defaults = array(
			'id'                      => 'course_maker_featured_article_image',
			'meta_key'                => 'course_maker_featured_article_image',
			'post_types'              => array(
				'post',
			),
			'meta_label'              => __( 'Add Image', 'coursemaker' ),
			'meta_priority'           => 'high',
			'meta_location'           => 'side',
			'attachment_button_label' => __( 'Add Image', 'coursemaker' ),
			'nonce_action'            => wp_generate_password( 12, false, false ), // random nonce.
			'hooks'                   => array( 'post.php' ),
			'img_atts'                => array(
				'suggested_width'       => 1200,
				'suggested_height'      => 630,
				'media_modal_title'     => esc_html__( 'Select Featured Article Image and Crop', 'course-maker' ),
				'media_modal_crop_text' => esc_html__( 'Select and crop', 'course-maker' ),
				'can_skip_crop'         => false,
				'aspect_ratio'          => '',

			),
		);

		// Merge arguments.
		$args = wp_parse_args( $args, $defaults );

		// Set class variables.
		foreach ( $args as $key => $value ) {
			$this->{ $key } = $value;
		}

		// Set meta key names.
		$this->attachment_id_meta_key        = sprintf(
			'_%s_attachment_id',
			$this->id
		);
		$this->attachment_image_url_meta_key = sprintf(
			'_%s_attachment_url',
			$this->id
		);

		// Saved aspect ratio.
		$this->img_atts['aspect_ratio'] = $this->get_aspect_ratio( $this->img_atts['suggested_width'], $this->img_atts['suggested_height'] );
	}

	/**
	 * Run the hooks associated with this class.
	 */
	public function run_hooks() {
		foreach ( $this->post_types as $post_type ) {
			add_action( 'add_meta_boxes_' . $post_type, array( $this, 'add_meta_box_callback' ) );
		}

		// Load the attachment script.
		add_action( 'admin_enqueue_scripts', array( $this, 'add_admin_scripts' ) );

		// Ajax action for when a cropped image is selected and the media box has closed.
		add_action( 'wp_ajax_course_maker_add_cropped_attachment_image', array( $this, 'ajax_save_cropped_image' ) );
	}

	/**
	 * Registers the Attachment Meta box.
	 *
	 * @param object $post The current post object.
	 */
	public function add_meta_box_callback( $post ) {
		add_meta_box(
			sanitize_title( $this->meta_slug ),
			$this->meta_label,
			array( $this, 'display_meta_box' ),
			get_post_type( $post ),
			$this->meta_location,
			$this->meta_priority
		);
	}

	/**
	 * Displays the meta box.
	 *
	 * @param object $post The current post object.
	 */
	public function display_meta_box( $post ) {
		$post_id = $post->ID;

		// Create a new nonce.
		wp_nonce_field( basename( __FILE__ ), sanitize_title( $slug ) . '_nonce' );

		$attachment_image = get_post_meta( $post->ID, $this->id, true );

		// Get the _featured_article current value.
		// $current_featured_article_value = get_post_meta( $post->ID, '_featured_article', true );

		// Show the fields.
		?>
		<div class='inside'>
				<?php
				$img_attachment_url = get_post_meta( $post_id, $this->attachment_image_url_meta_key, true );
				if ( $img_attachment_url ) {
					// Get width/height.
					$width  = $this->img_atts['suggested_width'];
					$height = $this->img_atts['suggested_height'];

					/**
					 * Filter: course_maker_max_width
					 *
					 * @param int Maximum width of the image.
					 */
					$max_width_in_px = apply_filters(
						'course_maker_max_width',
						300
					);

					// Calculate new image size.
					$image_ratio = $width / $height;
					if ( $image_ratio > 1 ) {
						$width  = $max_width_in_px;
						$height = $max_width_in_px / $image_ratio;
					} else {
						$height = $max_width_in_px;
						$width  = $max_width_in_px * $image_ratio;
					}

					?>
					<div class="course-maker-img-container">
						<a href="#" title="<?php esc_attr_e( 'Click to Edit Image' ); ?>">
							<img src="<?php echo esc_url( $img_attachment_url ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" alt="<?php esc_attr_e( 'Click to Edit Image', 'course-maker' ); ?>" style="max-width: 100%; height: auto;" />
						</a>
					</div>
					<?php
				}
				?>
				<div>
				<button id="<?php echo esc_html( $this->id ); ?>" type='button' class='button-secondary'>
					<?php echo esc_html( $this->attachment_button_label ); ?>
				</button>
			</div>

		</div>
		<?php
	}

	/**
	 * Get the aspect ratio based on width/height.
	 *
	 * @param int $width Image width.
	 * @param int $height Image height.
	 *
	 * @return string Image ratio (e.g., 5:4).
	 *
	 * @credit https://gist.github.com/wazum/5710d9ef064caac7b909a9e69867f53b
	 */
	private function get_aspect_ratio( int $width, int $height ) {
		// search for greatest common divisor.
		$greatest_common_divisor = static function( $width, $height ) use ( &$greatest_common_divisor ) {
			return ( $width % $height ) ? $greatest_common_divisor( $height, $width % $height ) : $height;
		};

		$divisor = $greatest_common_divisor( $width, $height );

		return $width / $divisor . ':' . $height / $divisor;
	}

	/**
	 * Save a cropped image via ajax.
	 *
	 * @ajax array $_POST {
	 *     $type string $nonce         The nonce to prevent CCRF.
	 *     @type int    $attachment_id Attachment ID of the image.
	 *     @type string $url           URL to cropped image.
	 *     @type int    $post_id       Post ID to save attachments.
	 * }
	 */
	public function ajax_save_cropped_image() {
		$error_message = __( 'Cropped image could not be saved.', 'course-maker' );
		$post_id       = absint( filter_input( INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT ) );

		// Verify nonce. Error out if invalid.
		if ( ! wp_verify_nonce( filter_input( INPUT_POST, 'nonce', FILTER_DEFAULT ), $this->nonce_action . '_' . $post_id ) || ! current_user_can( 'edit_posts' ) ) {
			wp_send_json_error(
				array(
					'message' => $error_message,
				)
			);
		}

		// Retrieve the cropped image.
		$attachment_id     = absint( filter_input( INPUT_POST, 'attachment_id', FILTER_SANITIZE_NUMBER_INT ) );
		$cropped_image_url = esc_url( filter_input( INPUT_POST, 'url', FILTER_SANITIZE_URL ) );

		// Save meta.
		update_post_meta( $post_id, $this->attachment_id_meta_key, $attachment_id );
		update_post_meta( $post_id, $this->attachment_image_url_meta_key, $cropped_image_url );

		// Indicate success.
		wp_send_json_success(
			array(
				'message' => esc_html__( 'The image has been saved', 'course-maker' ),
				'img_url' => esc_url( $cropped_image_url ),
			)
		);
	}

	/**
	 * Enqueue admin scripts including media.
	 *
	 * @param string $hook The hook for the admin area you are viewing (e.g., post.php).
	 */
	public function add_admin_scripts( $hook ) {
		global $post;

		if ( ! in_array( $hook, $this->hooks, true ) ) {
			return;
		}
		wp_enqueue_media();
		$script_deps = array( 'media-editor', 'jquery', 'wp-i18n' );
		wp_enqueue_script(
			genesis_get_theme_handle() . 'featured-article-image',
			get_stylesheet_directory_uri() . '/js/featured-article-image.js',
			$script_deps,
			'1.0.0',
			true
		);

		/**
		 * Filter: course_maker_attachment_meta_localized
		 *
		 * @param array Array of variabled to be localized.
		 */
		$localized_vars = apply_filters(
			'course_maker_attachment_meta_localized',
			array(
				'nonce'   => wp_create_nonce( $this->nonce_action . '_' . $post->ID ),
				'post_id' => intval( $post->ID ),
			)
		);
		$localized_vars = array_merge( $localized_vars, $this->img_atts );

		wp_localize_script(
			genesis_get_theme_handle() . 'featured-article-image',
			'course_maker_meta_attachments',
			$localized_vars
		);
	}
}





