<?php
/**
 * Init the meta attachments that will be attached to a post.
 *
 * @package Course Maker Pro
 * @author  thebrandiD
 * @license GPL-2.0+
 * @link    https://thebrandidthemes.com/
 */

/**
 * Initialize the meta box attachment class.
 */
function course_maker_add_attachment_image_init() {
	if ( class_exists( 'Meta_Attachments' ) ) {
		// Set args.
		$args = array(
			'id'            => 'course-maker-featured-article-image',
			'meta_key'      => 'course-maker-featured-article-image', // phpcs:ignore
			'post_types'    => array(
				'post',
			),
			'meta_label'    => __( 'Featured Article Image', 'coursemaker' ),
			'meta_priority' => 'high',
			'meta_location' => 'side',
			'attachment_button_label' => __( 'Add Featured Article Image', 'coursemaker' ),
			'nonce_action' => 'course-maker-featured-article-image',
			'hooks' => array( 'post.php' ),
			'img_atts'                => array(
				'suggested_width'            => 1200,
				'suggested_height'           => 630,
				'media_modal_title'       => esc_html__( 'Select Featured Article Image and Crop', 'course-maker' ),
				'media_modal_crop_text' => esc_html__( 'Select and crop', 'course-maker' ),
				'can_skip_crop'              => false,
				'aspect_ratio'               => '40:21',
			),
		);
		$meta_attachments = new Meta_Attachments( $args );
		$meta_attachments->run_hooks();
	}
}
add_action( 'admin_init', 'course_maker_add_attachment_image_init' );
