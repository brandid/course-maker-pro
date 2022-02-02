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
	 * Class constructor.
	 *
	 * @param array $args {
	 *     An array of arguments.
	 *
	 *     @type string $meta_key Meta key to register (stored in post meta)
	 *     @type array $post_types Array of post types to list this meta box on.
	 *     @type string $meta_label Label for insert attachment button (see add_meta_box).
	 *     @type string $meta_priority Priority of meta box (see add_meta_box).
	 *     @type string $meta_location Location of meta box (see add_meta_box).
	 * }
	 */
	public function __construct( $args ) {
		// Set defaults.
		$defaults = array(
			'meta_key' => 'coursemaker_attachment_image',
			'post_types' => array(
				'post',
			),
			'meta_label' => __( 'Add Image', 'coursemaker' ),
			'meta_priority' => 'high',
			'meta_location' => 'side',
		);

		// Merge arguments.
		$args = wp_parse_args( $args, $defaults );

		// Set class variables.
		foreach ( $args as $key => $value ) {
			$this->{ $key } = $value;
		}
	}
}

/**
 * Registers the 'Featured Article' Image Meta box.
 *
 * @param object $post The current post object.
 */
function course_maker_add_featuredarticle_image_meta_box( $post ) {
	add_meta_box(
		'featured_article_image',
		__( 'Featured Article Image', 'coursemaker' ),
		'course_maker_display_featured_article_image_meta_box',
		'post',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes_post', 'course_maker_add_featuredarticle_image_meta_box' );

/**
 * Displays the 'Featured Article Image' meta box.
 *
 * @param object $post The current post object.
 */
function course_maker_display_featured_article_image_meta_box( $post ) {
	// Create a new nonce.
	wp_nonce_field( basename( __FILE__ ), 'featured_article_image_meta_box_nonce' );

	// Get the _featured_article current value.
	// $current_featured_article_value = get_post_meta( $post->ID, '_featured_article', true );

	// Show the fields.
	?>
	<div class='inside'>

		<div>
			<button id="featured-article-image-add-edit" type="button" class="button-secondary">
				Add a Featured Article Image
			</button>
		</div>

	</div>
	<?php
	// Enqueue media for the post.
	// Callback for other scripts/styles.
	
}

/**
 * Load post admin scripts for the featured article image.
 */
function course_maker_display_featured_article_image_scripts( $hook ) {
	if ( 'post.php' !== $hook ) {
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
}
add_action( 'admin_enqueue_scripts', 'course_maker_display_featured_article_image_scripts' );
