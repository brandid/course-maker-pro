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

return array(
	'fonts-url' => 'https://fonts.googleapis.com/css?family=Questrial&display=swap',
	'fontawesome-css-url' => '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
	'editor-color-palette' => array(
     	array(
     		'name'  => __( 'Accent Color', 'coursemaker' ),
     		'slug'  => 'accent',
     		'color'	=> get_course_maker_theme_colors( 'accent' ),
     	),
     	array(
     		'name'  => __( 'Links/Buttons Color', 'coursemaker' ),
     		'slug'  => 'linksbuttons',
     		'color'	=> get_course_maker_theme_colors( 'linksbuttons' ),
     	),
        array(
     		'name'  => __( 'Links/Buttons Hover Color', 'coursemaker' ),
     		'slug'  => 'hover',
     		'color'	=> get_course_maker_theme_colors( 'hover' ),
     	),
        array(
     		'name'  => __( 'Nav Text Color', 'coursemaker' ),
     		'slug'  => 'navtext',
     		'color'	=> get_course_maker_theme_colors( 'navtext' ),
     	),
        array(
     		'name'  => __( 'Header BG Color', 'coursemaker' ),
     		'slug'  => 'headerbg',
     		'color'	=> get_course_maker_theme_colors( 'headerbg' ),
     	),
        array(
     		'name'  => __( 'Footer BG Color', 'coursemaker' ),
     		'slug'  => 'footerbg',
     		'color'	=> get_course_maker_theme_colors( 'footerbg' ),
     	),
        array(
     		'name'  => __( 'White', 'coursemaker' ),
     		'slug'  => 'white',
     		'color'	=> get_course_maker_theme_colors( 'white' ),
     	),
        array(
     		'name'  => __( 'Gray', 'coursemaker' ),
     		'slug'  => 'gray',
     		'color'	=> get_course_maker_theme_colors( 'gray' ),
     	),
        array(
     		'name'  => __( 'Dark Gray', 'coursemaker' ),
     		'slug'  => 'darkgray',
     		'color'	=> get_course_maker_theme_colors( 'darkgray' ),
     	),
     	array(
     		'name'  => __( 'Black', 'coursemaker' ),
     		'slug'  => 'black',
     		'color'	=> get_course_maker_theme_colors( 'black' ),
        ),
    ),
);
