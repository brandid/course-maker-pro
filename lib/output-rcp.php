<?php
/**
* Custom Restrict Content Pro functions for Course Maker theme.
*
* @package Course Maker Pro
*/

// Color Restrict Content Pro elements with "Link Color" from Customizer
add_action( 'wp_enqueue_scripts', 'course_maker_custom_rcp_css' );
function course_maker_custom_rcp_css() {

	$css = '';

	$css .= sprintf( '
		.rcp_form input[type="submit"] {
			background-color: %s;
		}
		',
		get_course_maker_theme_colors( 'linksbuttons' )
	);

	if ( $css ) {
		wp_add_inline_style( genesis_get_theme_handle() . '-rcp-styles', $css );
	}

}
