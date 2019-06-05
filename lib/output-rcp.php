<?php
/**
* Custom Restrict Content Pro functions for Course Maker theme.
*
* @package Course Maker Pro
*/

// Color Restrict Content Pro elements with "Link Color" from Customizer
add_action( 'wp_enqueue_scripts', 'course_maker_custom_rcp_css' );
function course_maker_custom_rcp_css() {

	$handle  = "coursemaker-rcp-styles";

	$course_maker_link_color = get_theme_mod( 'course_maker_link_color', course_maker_customizer_get_default_link_color() );

	$css = '';

	$css .= sprintf( '

			.rcp_form input[type="submit"] {
				background-color: %s;
			}

			', $course_maker_link_color );

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}

}
