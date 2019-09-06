<?php
/**
 * Adds custom meta boxes to the Course Maker Pro theme.
 *
 * @package Course Maker Pro
 * @author  thebrandiD
 * @license GPL-2.0+
 * @link    https://thebrandidthemes.com/
 */

// * Register the 'Featured Article' Meta box for Blog Posts
function course_maker_add_featuredarticle_meta_box( $post ) {

	add_meta_box(
		'featured_article', // ID
		__( 'Featured Article', 'coursemaker' ), // Title
		'course_maker_display_featured_article_meta_box', // Callback
		'post', // Screen
		'side', // Context
		'high' // Priority
	);

}
add_action( 'add_meta_boxes_post', 'course_maker_add_featuredarticle_meta_box' );

// * Function to display the 'Featured Article' meta box
function course_maker_display_featured_article_meta_box( $post ) {

	// Create nonce
	wp_nonce_field( basename( __FILE__ ), 'featured_article_meta_box_nonce' );

	// Get the _featured_article current value
	$current_featured_article_value = get_post_meta( $post->ID, '_featured_article', true );

	// Show the fields
	?>
	<div class='inside'>

		<p>
			<input type="checkbox" name="featured_article" value="1" <?php checked( $current_featured_article_value, '1' ); ?> /><?php echo __( 'Featured Article', 'coursemaker' ); ?>
		</p>

	</div>
	<?php

}

// * Save 'Featured Article' meta data
function course_maker_save_featuredarticle_meta_data( $post_id ) {

	// Verify the nonce
	if ( ! isset( $_POST['featured_article_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['featured_article_meta_box_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	// Return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check user permissions
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Save or Remove meta field value
	if ( isset( $_POST['featured_article'] ) ) {

		$featured_article = $_POST['featured_article'];

		// Save meta data
		update_post_meta( $post_id, '_featured_article', sanitize_text_field( $featured_article ) );

	} else {

		// Remove meta data
		delete_post_meta( $post_id, '_featured_article' );

	}

}
add_action( 'save_post', 'course_maker_save_featuredarticle_meta_data', 10, 2 );
