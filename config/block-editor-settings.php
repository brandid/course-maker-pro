<?php
/**
 * Block Editor settings specific to Course Maker
 *
 * @package Course Maker Pro
 * @author  brandiD
 * @license GPL-2.0-or-later
 */

/**
 * Editor color palette config.
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
	'editor-color-palette' => array(
     	array(
     		'name'  => __( 'Accent Color', 'coursemaker' ),
     		'slug'  => 'accent',
     		'color'	=> $color_accent,
     	),
     	array(
     		'name'  => __( 'Links/Buttons Color', 'coursemaker' ),
     		'slug'  => 'linksbuttons',
     		'color'	=> $color_linksbuttons,
     	),
        array(
     		'name'  => __( 'Links/Buttons Hover Color', 'coursemaker' ),
     		'slug'  => 'hover',
     		'color'	=> $color_hover,
     	),
        array(
     		'name'  => __( 'Nav Text Color', 'coursemaker' ),
     		'slug'  => 'navtext',
     		'color'	=> $color_navtext,
     	),
        array(
     		'name'  => __( 'Header BG Color', 'coursemaker' ),
     		'slug'  => 'headerbg',
     		'color'	=> $color_headerbg,
     	),
        array(
     		'name'  => __( 'Footer BG Color', 'coursemaker' ),
     		'slug'  => 'footerbg',
     		'color'	=> $color_footerbg,
     	),
        array(
     		'name'  => __( 'White', 'coursemaker' ),
     		'slug'  => 'white',
     		'color'	=> '#fff',
     	),
        array(
     		'name'  => __( 'Gray', 'coursemaker' ),
     		'slug'  => 'gray',
     		'color'	=> '#5e6270',
     	),
        array(
     		'name'  => __( 'Dark Gray', 'coursemaker' ),
     		'slug'  => 'darkgray',
     		'color'	=> '#464f56',
     	),
     	array(
     		'name'  => __( 'Black', 'coursemaker' ),
     		'slug'  => 'black',
     		'color'	=> '#000',
        ),
    ),
);
