<?php
/**
* Custom MemberPress functions for Course Maker theme.
*
* @package Course Maker Pro
*/

// Color MemberPress elements with "Link Color" from Customizer
add_action( 'wp_enqueue_scripts', 'course_maker_custom_memberpress_css' );
function course_maker_custom_memberpress_css() {

	$handle  = "coursemaker-memberpress-styles";

	$course_maker_link_color = get_theme_mod( 'course_maker_link_color', course_maker_customizer_get_default_link_color() );

	$css = '';

	$css .= sprintf( '

			.mp_wrapper input[type="submit"] {
				background-color: %s;
			}

			', $course_maker_link_color );

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}

}
