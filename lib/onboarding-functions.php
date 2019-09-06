<?php
/**
 * Custom functions to run during Genesis Onboarding (One-Click Theme Setup)
 *
 * @since 2.0
 *
 * @package Course Maker Pro
 */

// * Disable the LifterLMS First-Time Setup Wizard
add_filter( 'llms_prevent_automatic_wizard_redirect', '__return_true' );

// * Create the 'Social' menu
add_action( 'genesis_onboarding_after_import_content', 'course_maker_create_secondary_menu', 10, 2 );

// * Function to update a WP option
function course_maker_update_theme_option( $optionName, $newValue ) {

	if ( get_option( $optionName ) !== false ) {

		// The option already exists -- update it
		update_option( $optionName, $newValue );

	} else {

		// The option hasn't been added yet -- add it
		add_option( $optionName, $newValue );

	}

}

// * Assign the Blog page
add_action( 'genesis_onboarding_after_import_content', 'course_maker_assign_blog_page', 20, 2 );
function course_maker_assign_blog_page( $content, $imported_post_ids ) {

	$blogpage   = get_page_by_title( 'Blog' );
	$blogpageID = $blogpage->ID;

	course_maker_update_theme_option( 'page_for_posts', $blogpageID );

}

// * Remove the default "Hello World" post if it exists
add_action( 'genesis_onboarding_after_import_content', 'course_maker_remove_default_blog_meta', 25, 2 );
function course_maker_remove_default_blog_meta( $content, $imported_post_ids ) {

	// Get default post by title
	$defaultPost = get_posts( array( 'title' => 'Hello World!' ) );

	// Remove the default post if it exists
	if ( ! empty( $defaultPost ) ) {
		wp_delete_post( $defaultPost[0]->ID, $bypass_trash = true );
	}

	// If "Uncategorized" category exists
	if ( category_exists( 'Uncategorized' ) ) {

		// Rename "Uncategorized" to "General"
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

// * Update display settings for SP Testimonials Slider
add_action( 'genesis_onboarding_after_import_content', 'course_maker_update_spslider_settings', 30, 2 );
function course_maker_update_spslider_settings( $content, $imported_post_ids ) {

	// Enable Auto-play
	if ( get_option( 'social_proof_slider_autoplay' ) !== 1 ) {
		update_option( 'social_proof_slider_autoplay', 1 );
	}

	// Set Display Time
	if ( get_option( 'social_proof_slider_displaytime' ) == '' || empty( get_option( 'social_proof_slider_displaytime' ) ) ) {
		update_option( 'social_proof_slider_displaytime', 3000 );
	}

	// Set Animation Style
	if ( get_option( 'social_proof_slider_animationstyle' ) !== 'fade' ) {
		update_option( 'social_proof_slider_animationstyle', 'fade' );
	}

	// Set vertical align middle
	if ( get_option( 'social_proof_slider_verticalalign' ) !== 'align_middle' ) {
		update_option( 'social_proof_slider_verticalalign', 'align_middle' );
	}

	// Set show dots
	if ( get_option( 'social_proof_slider_showdots' ) !== 1 ) {
		update_option( 'social_proof_slider_showdots', 1 );
	}

	// Set dots color
	if ( get_option( 'social_proof_slider_dotscolor' ) == '' || empty( get_option( 'social_proof_slider_dotscolor' ) ) ) {
		update_option( 'social_proof_slider_dotscolor', '#666666' );
	}

}

// * Set Genesis Defaults
add_action( 'genesis_onboarding_after_import_content', 'course_maker_onboarding_set_genesis_defaults', 35, 2 );
function course_maker_onboarding_set_genesis_defaults( $content, $imported_post_ids ) {

	if ( ! function_exists( 'genesis_update_settings' ) ) {
		return;
	}

	$settings = array(
		'content_archive_thumbnail' => 1,   // Show blog post Featured Images
	);

	genesis_update_settings( $settings );

}
