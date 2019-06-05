<?php
/**
* Course Maker Theme
*
* This file adds helper functions to the Course Maker theme.
*
* @package Course Maker Pro
* @author  thebrandiD
* @license GPL-2.0+
* @link    https://thebrandidthemes.com/
*/

/**
 * Loads theme colors.
 *
 * @since  1.0.0
 *
 * @param  string $selected_scheme The selected scheme in the customizer.
 *
 * @return array $color Return the array $color.
 */
function get_course_maker_theme_colors( $selected_scheme ) {

	if ( empty( $selected_scheme ) || null === $selected_scheme ) {
		// Set the default theme.
		$selected_scheme = 'custom';
	}

	// Set defaults
	$color = array();
	$default = scheme_custom_default_colors();

	// accentcolor
	$color['accentcolor'] = get_theme_mod( 'course_maker_theme_accentcolor_setting' ) ? get_theme_mod( 'course_maker_theme_accentcolor_setting' ) : $default['accentcolor'];

	// linksbuttons
	$color['linksbuttons'] = get_theme_mod( 'course_maker_theme_linksbuttons_setting' ) ? get_theme_mod( 'course_maker_theme_linksbuttons_setting' ) : $default['linksbuttons'];

	// navtext
	$color['navtext'] = get_theme_mod( 'course_maker_theme_navtext_setting' ) ? get_theme_mod( 'course_maker_theme_navtext_setting' ) : $default['navtext'];

	// hover
	$color['hover'] = get_theme_mod( 'course_maker_theme_hover_setting' ) ? get_theme_mod( 'course_maker_theme_hover_setting' ) : $default['hover'];

	// headerbg
	$color['headerbg'] = get_theme_mod( 'course_maker_theme_headerbg_setting' ) ? get_theme_mod( 'course_maker_theme_headerbg_setting' ) : $default['headerbg'];

	// footerbg
	$color['footerbg'] = get_theme_mod( 'course_maker_theme_footerbg_setting' ) ? get_theme_mod( 'course_maker_theme_footerbg_setting' ) : $default['footerbg'];

	return $color;
}


function course_maker_convert_hex2rgba( $color, $opacity = false ) {
	$default = 'rgb(0,0,0)';

	if ( empty( $color ) ) {
		return $default; }

	if ( '#' === $color[0] ) {
		$color = substr( $color, 1 );
	}

	if ( strlen( $color ) === 6 ) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) === 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else { 		return $default; }

	$rgb = array_map( 'hexdec', $hex );

	if ( $opacity ) {
		if ( abs( $opacity ) > 1 ) {
			$opacity = 1.0;
		}
		$output = 'rgba(' . implode( ',', $rgb ) . ',' . $opacity . ')';
	} else {
		$output = 'rgb(' . implode( ',', $rgb ) . ')';
	}

    return $output;
}

/**
 * Calculate the color contrast.
 *
 * @return string Hex color code for contrast color
 */
function course_maker_color_contrast( $color ) {

	$hexcolor = str_replace( '#', '', $color );
	$red      = hexdec( substr( $hexcolor, 0, 2 ) );
	$green    = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue     = hexdec( substr( $hexcolor, 4, 2 ) );

	$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

	return ( $luminosity > 128 ) ? '#333333' : '#ffffff';

}
