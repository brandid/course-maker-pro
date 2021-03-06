<?php
/**
 * This file adds helper functions to the Course Maker Pro theme.
 *
 * @package Course Maker Pro
 * @author  thebrandiD
 * @license GPL-2.0+
 * @link    https://thebrandidthemes.com/
 */

/**
 * Converts Hex colors to RGBA format.
 *
 * @param string $color The color to be converted.
 * @param string $opacity An opacity value to assign.
 * @return string The converted color.
 */
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
	} else {
		return $default;
	}

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
 * Takes a color value and returns a contrasting Hex color value.
 *
 * @param string $color The initial color to be calculated.
 * @return string The new contrasting Hex color.
 */
function course_maker_color_contrast( $color ) {

	$hexcolor = str_replace( '#', '', $color );
	$red      = hexdec( substr( $hexcolor, 0, 2 ) );
	$green    = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue     = hexdec( substr( $hexcolor, 4, 2 ) );

	$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

	return ( $luminosity > 128 ) ? '#333333' : '#ffffff';

}
