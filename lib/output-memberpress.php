<?php
/**
 * Custom MemberPress functions for the Course Maker Pro theme.
 *
 * @package Course Maker Pro
 */

add_action( 'wp_enqueue_scripts', 'course_maker_custom_memberpress_css' );
/**
 * Forces the MemberPress elements to use the "Link Color" Customizer setting.
 */
function course_maker_custom_memberpress_css() {

	$appearance = genesis_get_config( 'appearance' );

	$color_accent       = get_theme_mod( 'course_maker_theme_accentcolor_setting', $appearance['default-colors']['accent'] );
	$color_linksbuttons = get_theme_mod( 'course_maker_theme_linksbuttons_setting', $appearance['default-colors']['linksbuttons'] );
	$color_hover        = get_theme_mod( 'course_maker_theme_hover_setting', $appearance['default-colors']['hover'] );

	$css = '';

	$css .= sprintf(
		'

		.mp_wrapper input[type="submit"] {
			background-color: %s;
		}

		',
		$color_linksbuttons
	);

	if ( $css ) {
		wp_add_inline_style( genesis_get_theme_handle() . '-memberpress-styles', $css );
	}

}
