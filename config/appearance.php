<?php
/**
 * Course Maker Pro appearance settings
 *
 * @package Course Maker Pro
 * @author  brandiD
 * @license GPL-2.0-or-later
 */

$course_maker_default_colors = array(
	'accent' => '#616e63',
	'linksbuttons' => '#8e9492',
	'hover' => '#4c4d50',
	'navtext' => '#717875',
	'headerbg' => '#e6e5e3',
	'footerbg' => '#f2f1ef',
	'white' => '#ffffff',
	'black' => '#000000',
	'gray' => '#5e6270',
	'darkgray' => '#464f56',
);

$course_maker_accent_color = get_theme_mod( 'course_maker_theme_accentcolor_setting', $course_maker_default_colors['accent'] );
$course_maker_linksbuttons_color = get_theme_mod( 'course_maker_theme_linksbuttons_setting', $course_maker_default_colors['linksbuttons'] );
$course_maker_hover_color = get_theme_mod( 'course_maker_theme_hover_setting', $course_maker_default_colors['hover'] );
$course_maker_navtext_color = get_theme_mod( 'course_maker_theme_navtext_setting', $course_maker_default_colors['navtext'] );
$course_maker_headerbg_color = get_theme_mod( 'course_maker_theme_headerbg_setting', $course_maker_default_colors['headerbg'] );
$course_maker_footerbg_color = get_theme_mod( 'course_maker_theme_footerbg_setting', $course_maker_default_colors['footerbg'] );

$appearance = array(
	'fonts-url' => 'https://fonts.googleapis.com/css?family=Questrial&display=swap',
	'fontawesome-css-url' => '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
	'default-colors' => $course_maker_default_colors,
	'editor-color-palette' => array(
     	array(
     		'name'  => __( 'Accent Color', 'coursemaker' ),
     		'slug'  => 'accent',
     		'color'	=> $course_maker_accent_color,
     	),
     	array(
     		'name'  => __( 'Links/Buttons Color', 'coursemaker' ),
     		'slug'  => 'linksbuttons',
     		'color'	=> $course_maker_linksbuttons_color,
     	),
        array(
     		'name'  => __( 'Links/Buttons Hover Color', 'coursemaker' ),
     		'slug'  => 'hover',
     		'color'	=> $course_maker_hover_color,
     	),
        array(
     		'name'  => __( 'Nav Text Color', 'coursemaker' ),
     		'slug'  => 'navtext',
     		'color'	=> $course_maker_navtext_color,
     	),
        array(
     		'name'  => __( 'Header BG Color', 'coursemaker' ),
     		'slug'  => 'headerbg',
     		'color'	=> $course_maker_headerbg_color,
     	),
        array(
     		'name'  => __( 'Footer BG Color', 'coursemaker' ),
     		'slug'  => 'footerbg',
     		'color'	=> $course_maker_footerbg_color,
     	),
        array(
     		'name'  => __( 'White', 'coursemaker' ),
     		'slug'  => 'white',
     		'color'	=> $course_maker_default_colors['white'],
     	),
     	array(
     		'name'  => __( 'Black', 'coursemaker' ),
     		'slug'  => 'black',
     		'color'	=> $course_maker_default_colors['black'],
        ),
        array(
     		'name'  => __( 'Gray', 'coursemaker' ),
     		'slug'  => 'gray',
     		'color'	=> $course_maker_default_colors['gray'],
     	),
        array(
     		'name'  => __( 'Dark Gray', 'coursemaker' ),
     		'slug'  => 'darkgray',
     		'color'	=> $course_maker_default_colors['darkgray'],
     	),
    ),
);

return $appearance;
