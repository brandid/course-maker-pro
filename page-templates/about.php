<?php
/**
 * Course Maker - About Page template
 *
 * This file adds the about page template to the Course Maker Pro Theme.
 *
 * Template Name: About
 *
 * @package Course Maker Pro
 * @author  brandiD
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

add_filter( 'body_class', 'course_maker_about_body_class' );
/**
 * Adds about page body class.
 *
 * @param  array $classes Original body classes.
 * @return array Modified body classes.
 */
function course_maker_about_body_class( $classes ) {
	$classes[] = 'about-page';

	// Check for sidebar use.
	if ( is_active_sidebar( 'about-sidebar' ) ) {
		$classes[] = 'has-content-sidebar';
	}
	return $classes;
}

// Remove default sidebar.
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

/**
 * Change the layout if a sidebar is present.
 *
 * @param string $layout Layout type.
 */
function course_maker_change_about_layout( $layout ) {
	if ( is_active_sidebar( 'about-sidebar' ) ) {
		$layout = 'content-sidebar';
	}
	return $layout;
}
add_filter( 'genesis_pre_get_option_site_layout', 'course_maker_change_about_layout' );

/**
 * Init about sidebar.
 */
function course_maker_about_sidebar() {
	if ( is_active_sidebar( 'about-sidebar' ) ) {
		?>
		<div id="about-sidebar">
			<?php
			dynamic_sidebar( 'about-sidebar' );
			?>
		</div>
		<?php
	}
}
add_action( 'genesis_sidebar', 'course_maker_about_sidebar' );
// Runs the Genesis loop.
genesis();
