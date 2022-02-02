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
		);
		$meta_attachments = new Meta_Attachments( $args );
		$meta_attachments->run_hooks();
	}
}
add_action( 'admin_init', 'course_maker_add_attachment_image_init' );
