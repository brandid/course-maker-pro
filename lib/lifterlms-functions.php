<?php
/**
 * Custom LifterLMS functions for the Course Maker Pro theme.
 *
 * @package Course Maker Pro
 */

// Enable Lesson short descriptions in the lesson previews.
add_filter( 'llms_show_preview_excerpt', '__return_true' );

/**
 * Declare explicit theme support for LifterLMS Course and Lesson sidebars
 *
 * @return   void
 */
function declare_llms_theme_sidebars() {
	add_theme_support( 'lifterlms-sidebars' );
}
add_action( 'after_setup_theme', 'declare_llms_theme_sidebars' );

// If 'Course Sidebar' has widgets, change body class on LifterLMS Course Catalog page.
add_filter( 'body_class', 'course_maker_lifterlms_sidebar_body_class', 90 );
/**
 * Adds a custom class to the body element when using the LifterLMS Sidebar.
 *
 * @param array $classes An array of classes to apply to the body element.
 * @return array A modified array of classes to apply to the body element.
 */
function course_maker_lifterlms_sidebar_body_class( $classes ) {

	// If this is the LifterLMS Course Syllabus page...
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

			// Add the default layout as a class in the array of body classes.
			$classes[] = genesis_get_default_layout();

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

	$force_llms_default_styles = get_theme_mod( 'force_llms_default_styles', false );
	if ( ! $force_llms_default_styles ) {
		wp_enqueue_style( genesis_get_theme_handle() . '-lifterlms-styles', get_stylesheet_directory_uri() . '/css/lifterlms-custom-styles.css', array(), genesis_get_theme_version() );
	}
}

/**
 * Hook into mygrades for responsive tables.
 */
add_action( 'llms_student_dashboard_after_my_grades', 'course_maker_lifterlms_my_grades' );
/**
 * Hook into mygrades and insert some JavaScript.
 *
 * Script from: https://wpdatatables.com/how-to-make-a-table-responsive/.
 */
function course_maker_lifterlms_my_grades() {
	?>
		<script>
			var headertext = [];
			var headers = document.querySelectorAll( '.llms-sd-grades thead' );
			var tablebody = document.querySelectorAll( '.llms-sd-grades tbody' );

			console.log( tablebody );

			for ( var i = 0; i < headers.length; i++ ) {
				headertext[ i ] = [];
				for ( var j = 0, headrow; headrow = headers[ i ].rows[ 0 ].cells[ j ]; j++ ) {
					var current = headrow;
					headertext[ i ].push( current.textContent );
				}
			}

			for ( var h = 0, tbody; tbody = tablebody[ h ]; h++ ) {
				for ( var i = 0, row; row = tbody.rows[ i ]; i++ ) {
					for ( var j = 0, col; col = row.cells[ j ]; j++ ) {
						col.setAttribute( 'data-th', headertext[ h ][ j ] );
					}
				}
			}
		</script>
	<?php
}

/**
 * Hook in after theme and functions is executed.
 */
add_action( 'wp', 'course_maker_lifterlms_remove_comments' );

/**
 * Remove comments from LifterLMS templates.
 */
function course_maker_lifterlms_remove_comments() {
	if ( function_exists( 'is_lifterlms' ) && is_lifterlms() ) {
		remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );
	}
}

