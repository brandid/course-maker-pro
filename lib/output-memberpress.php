<?php
/**
* Custom MemberPress functions for Course Maker theme.
*
* @package Course Maker Pro
*/

// Color MemberPress elements with "Link Color" from Customizer
add_action( 'wp_enqueue_scripts', 'course_maker_custom_memberpress_css' );
function course_maker_custom_memberpress_css() {

	$css = '';

	$css .= sprintf( '

		.mp_wrapper input[type="submit"] {
			background-color: %s;
		}

		',
		get_course_maker_theme_colors( 'linksbuttons' )
	);

	if ( $css ) {
		wp_add_inline_style( genesis_get_theme_handle() . '-memberpress-styles', $css );
	}

}
