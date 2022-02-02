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
			'meta_key'      => 'coursemaker_featured_article_image', // phpcs:ignore
			'post_types'    => array(
				'post',
			),
			'meta_label'    => __( 'Add Featured Article Image', 'coursemaker' ),
			'meta_priority' => 'high',
			'meta_location' => 'side',
		);
		new Meta_Attachments( $args );
	}
}
add_action( 'admin_init', 'course_maker_add_attachment_image_init' );
