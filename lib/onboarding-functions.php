<?php
/**
 * Custom functions to run during Genesis Onboarding (One-Click Theme Setup)
 *
 * @since 2.0
 *
 * @package Course Maker Pro
 */

// Disable the LifterLMS First-Time Setup Wizard.
add_filter( 'llms_prevent_automatic_wizard_redirect', '__return_true' );

// Create the 'Social' menu.
add_action( 'genesis_onboarding_after_import_content', 'course_maker_create_secondary_menu', 10, 2 );

/**
 * Reusable function to update a WP option.
 *
 * @param string $option_name The name of the option to change.
 * @param string $new_value The new value to assign.
 */
function course_maker_update_theme_option( $option_name, $new_value ) {

	if ( get_option( $option_name ) !== false ) {

		// The option already exists -- update it.
		update_option( $option_name, $new_value );

	} else {

		// The option hasn't been added yet -- add it.
		add_option( $option_name, $new_value );

	}

}

add_action( 'genesis_onboarding_after_import_content', 'course_maker_assign_blog_page', 20, 2 );
/**
 * Assigns the Blog page.
 *
 * @param string $content The page content.
 * @param string $imported_post_ids The imported Post IDs.
 */
function course_maker_assign_blog_page( $content, $imported_post_ids ) {

	$blogpage    = get_page_by_title( 'Blog' );
	$blogpage_id = $blogpage->ID;

	course_maker_update_theme_option( 'page_for_posts', $blogpage_id );

}

add_action( 'genesis_onboarding_after_import_content', 'course_maker_remove_default_blog_meta', 25, 2 );
/**
 * Removes the default "Hello World" post if it exists.
 *
 * @param string $content The page content.
 * @param string $imported_post_ids The imported Post IDs.
 */
function course_maker_remove_default_blog_meta( $content, $imported_post_ids ) {

	// Get default post by title.
	$default_post = get_posts( array( 'title' => 'Hello World!' ) );

	// Remove the default post if it exists.
	if ( ! empty( $default_post ) ) {
		wp_delete_post( $default_post[0]->ID, $bypass_trash = true );
	}

	// If "Uncategorized" category exists.
	if ( category_exists( 'Uncategorized' ) ) {

		// Rename "Uncategorized" to "General".
		wp_update_term(
			1,
			'category',
			array(
				'name' => 'General',
				'slug' => 'general',
			)
		);

	}

}

add_action( 'genesis_onboarding_after_import_content', 'course_maker_update_spslider_settings', 30, 2 );
/**
 * Updates the display settings for the SP Testimonials Slider
 *
 * @param string $content The page content.
 * @param string $imported_post_ids The imported Post IDs.
 */
function course_maker_update_spslider_settings( $content, $imported_post_ids ) {

	// Enable Auto-play.
	if ( get_option( 'social_proof_slider_autoplay' ) !== 1 ) {
		update_option( 'social_proof_slider_autoplay', 1 );
	}

	// Set Display Time.
	if ( get_option( 'social_proof_slider_displaytime' ) === '' || empty( get_option( 'social_proof_slider_displaytime' ) ) ) {
		update_option( 'social_proof_slider_displaytime', 3000 );
	}

	// Set Animation Style.
	if ( get_option( 'social_proof_slider_animationstyle' ) !== 'fade' ) {
		update_option( 'social_proof_slider_animationstyle', 'fade' );
	}

	// Set Vertical Align.
	if ( get_option( 'social_proof_slider_verticalalign' ) !== 'align_middle' ) {
		update_option( 'social_proof_slider_verticalalign', 'align_middle' );
	}

	// Show the Dots.
	if ( get_option( 'social_proof_slider_showdots' ) !== 1 ) {
		update_option( 'social_proof_slider_showdots', 1 );
	}

	// Set the dots color.
	if ( get_option( 'social_proof_slider_dotscolor' ) === '' || empty( get_option( 'social_proof_slider_dotscolor' ) ) ) {
		update_option( 'social_proof_slider_dotscolor', '#666666' );
	}

}

add_action( 'genesis_onboarding_after_import_content', 'course_maker_onboarding_set_genesis_defaults', 35, 2 );
/**
 * Sets the Genesis Defaults
 *
 * @param string $content The page content.
 * @param string $imported_post_ids The imported Post IDs.
 */
function course_maker_onboarding_set_genesis_defaults( $content, $imported_post_ids ) {

	if ( ! function_exists( 'genesis_update_settings' ) ) {
		return;
	}

	$settings = array(
		'content_archive_thumbnail' => 1,   // Show the blog post Featured Images.
	);

	genesis_update_settings( $settings );

}
