<?php
/**
 * Custom LifterLMS functions for the Course Maker Pro theme.
 *
 * @package Course Maker Pro
 */

// Enable Lesson short descriptions in the lesson previews.
add_filter( 'llms_show_preview_excerpt', '__return_true' );

// If 'Course Sidebar' has widgets, change body class on LifterLMS Course Catalog page.
add_filter( 'body_class', 'course_maker_lifterlms_sidebar_body_class', 90 );
/**
 * Adds a custom class to the body element when using the LifterLMS Sidebar.
 *
 * @param array $classes An array of classes to apply to the body element.
 * @return array A modified array of classes to apply to the body element.
 */
function course_maker_lifterlms_sidebar_body_class( $classes ) {

	// If this is the LifterLMS Course Catalog page...
	if ( is_courses() ) {

		$classes[] = 'lifterlms-course-catalog';

		// If the 'Course Sidebar' is active...
		if ( is_active_sidebar( 'llms_course_widgets_side' ) ) {

			// Define the class to remove.
			$class_delete = array( 'full-width-content' );

			// Loop through all body classes.
			foreach ( $classes as $class_css_key => $class_css ) {

				// If $class_delete is in the array of body classes...
				if ( in_array( $class_css, $class_delete, true ) ) {

					// Remove it from the array of body classes.
					unset( $classes[ $class_css_key ] );

				}
			}

			// Add 'content-sidebar' class to the array of body classes.
			$classes[] = 'content-sidebar';

		}
	}

	// Add the extra classes back untouched.
	return $classes;

}

// * Enqueue LifterLMS custom styles
add_action( 'wp_enqueue_scripts', 'course_maker_custom_lifterlms_css' );
/**
 * Enqueues custom LifterLMS styles.
 */
function course_maker_custom_lifterlms_css() {

	wp_enqueue_style( genesis_get_theme_handle() . '-lifterlms-styles', get_stylesheet_directory_uri() . '/css/lifterlms-custom-styles.css', array(), genesis_get_theme_version() );

}
