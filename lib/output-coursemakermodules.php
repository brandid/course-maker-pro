<?php
/**
* Custom Course Maker Modules functions for Course Maker theme.
*
* @package Course Maker Pro
*/

// Color Course Maker Modules elements with "Link Color" from Customizer
add_action( 'wp_enqueue_scripts', 'course_maker_custom_modules_css' );
function course_maker_custom_modules_css() {

	$handle  = "coursemaker-modules-styles";

	$course_maker_link_color = get_theme_mod( 'course_maker_link_color', course_maker_customizer_get_default_link_color() );

	$css = '';

	$css .= sprintf( '

			.module a {
				color: %s;
			}

			', $course_maker_link_color );

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}

}
