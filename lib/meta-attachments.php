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
	 * Class constructor.
	 *
	 * @param array $args {
	 *     An array of arguments.
	 *
	 *     @type string $meta_key      Meta key to register (stored in post meta)
	 *     @type array  $post_types    Array of post types to list this meta box on.
	 *     @type string $meta_label    Label for insert attachment button (see add_meta_box).
	 *     @type string $meta_priority Priority of meta box (see add_meta_box).
	 *     @type string $meta_location Location of meta box (see add_meta_box).
	 *     @type string $nonce_action  Nonce action for retrieval, saving, etc.
	 *     @type array  $args {
	 *          @type int    $suggested_width            The desired width of the image (px).
	 *          @type int    $suggested_height           The desired height of the image (px).
	 *          @type string $media_uploader_title       The title of the media modal.
	 *          @type string $media_uploader_button_text The button text of the media uploader insert button.
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
				'suggested_width'            => 1200,
				'suggested_height'           => 630,
				'media_uploader_title'       => esc_html__( 'Select Featured Article Image and Crop', 'course-maker' ),
				'media_uploader_button_text' => esc_html__( 'Select and crop', 'course-maker' ),
				'can_skip_crop'              => false,
				'aspect_ratio'               => '40:21',

			),
		);

		// Merge arguments.
		$args = wp_parse_args( $args, $defaults );

		// Set class variables.
		foreach ( $args as $key => $value ) {
			$this->{ $key } = $value;
		}
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
		// Create a new nonce.
		wp_nonce_field( basename( __FILE__ ), sanitize_title( $slug ) . '_nonce' );

		$attachment_image = get_post_meta( $post->ID, $this->id, true );

		// Get the _featured_article current value.
		// $current_featured_article_value = get_post_meta( $post->ID, '_featured_article', true );

		// Show the fields.
		?>
		<div class='inside'>

			<div>
				<button id="<?php echo esc_html( $this->id ); ?>" type="button" class="button-secondary">
					<?php echo esc_html( $this->attachment_button_label ); ?>
				</button>
			</div>

		</div>
		<?php
	}

	/**
	 * Enqueue admin scripts including media.
	 *
	 * @param string $hook The hook for the admin area you are viewing (e.g., post.php).
	 */
	public function add_admin_scripts( $hook ) {
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
				'nonce' => wp_create_nonce( $this->nonce_action ),
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





