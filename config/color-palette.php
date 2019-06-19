<?php
/**
 * Course Maker Pro default color settings.
 *
 * @package Course Maker Pro
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

/* Get Main Accent Color */
$color_accent = get_theme_mod( 'course_maker_theme_accentcolor_setting', '#616e63' );

/* Get Links/Buttons Color */
$color_linksbuttons = get_theme_mod( 'course_maker_theme_linksbuttons_setting', '#8e9492' );

/* Get Hover Color */
$color_hover = get_theme_mod( 'course_maker_theme_hover_setting', '#4c4d50' );

/* Get Nav Text Color */
$color_navtext = get_theme_mod( 'course_maker_theme_navtext_setting', '#717875' );

/* Get Header BG Color */
$color_headerbg = get_theme_mod( 'course_maker_theme_headerbg_setting', '#e6e5e3' );

/* Get Footer BG Color */
$color_footerbg = get_theme_mod( 'course_maker_theme_footerbg_setting', '#f2f1ef' );

return array(
    'accent' => $color_accent,
    'linksbuttons' => $color_linksbuttons,
    'hover' => $color_hover,
    'navtext' => $color_navtext,
    'headerbg' => $color_headerbg,
    'footerbg' => $color_footerbg,
    'white' => '#fff',
    'gray' => '#5e6270',
    'darkgray' => '#464f56',
    'black' => '#000'
);
