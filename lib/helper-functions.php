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

// /**
//  * Loads theme colors.
//  *
//  * @since  2.0.0
//  *
//  * @param string $name Name of color to retrieve.
//  *
//  * @return string Hex color code for specified color.
//  */
// function get_course_maker_theme_colors( $slug ) {
//
// 	//* Get Appearance Settings
// 	$appearance = genesis_get_config( 'appearance' );
//
// 	$editor_color_palette = $appearance['editor-color-palette'];
//
// 	$palette_colors = array_column( $editor_color_palette, 'slug' );
//
// 	$the_color = array_search( $slug, $palette_colors );
//
// 	$result = $editor_color_palette[$the_color]['color'];
//
// 	return $result;
//
// }


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
