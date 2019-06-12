<?php
/**
*
* This file adds the default theme settings to the Course Maker Pro Theme.
*
* @package Course Maker Pro
* @author  brandiD
* @license GPL-2.0+
* @link    http://www.studiopress.com/
*/

add_filter( 'genesis_theme_settings_defaults', 'course_maker_theme_defaults' );
/**
* Updates theme settings on reset.
*
* @since 2.2.3
*/
function course_maker_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 6;
	$defaults['content_archive']           = 'excerpts';
	$defaults['content_archive_limit']     = 140;
	$defaults['content_archive_thumbnail'] = 1;
	$defaults['image_alignment']           = 'aligncenter';
	$defaults['posts_nav']                 = 'numeric';
	$defaults['site_layout']               = 'full-width-content';

	return $defaults;

}

add_action( 'after_switch_theme', 'course_maker_theme_setting_defaults' );
/**
* Updates theme settings on activation.
*
* @since 2.2.3
*/
function course_maker_theme_setting_defaults() {

	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( array(
			'blog_cat_num'              => 6,
			'content_archive'           => 'excerpts',
			'content_archive_limit'     => 140,
			'content_archive_thumbnail' => 1,
			'image_alignment'			=> 'aligncenter',
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'full-width-content',
		) );

	}

	update_option( 'posts_per_page', 6 );

}
