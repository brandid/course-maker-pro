<?php
/**
* Course Maker.
*
* This file adds the required CSS to the front end to the Course Maker Theme.
*
* @package Coursemaker
* @author  StudioPress
* @license GPL-2.0+
* @link    http://www.studiopress.com/
*/

add_action( 'wp_enqueue_scripts', 'course_maker_frontpage_customizer_css' );
function course_maker_frontpage_customizer_css() {

	$handle = 'course-maker';

	$css = '';

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}

}
