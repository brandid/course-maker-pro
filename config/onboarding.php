<?php
/**
 * Course Maker - One-Click Demo Install settings
 *
 * Onboarding config to load plugins and demo page content on theme activation.
 *
 * @package Course Maker Pro
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

return array(
	'dependencies' => array(
		'plugins' => array(
			array(
				'name' 		 => __( 'Atomic Blocks', 'coursemaker' ),
				'slug' 		 => 'atomic-blocks/atomicblocks.php',
				'public_url' => 'https://atomicblocks.com/',
			),
			array(
				'name' 		 => __( 'Display Posts Shortcode', 'coursemaker' ),
				'slug' 		 => 'display-posts-shortcode/display-posts-shortcode.php',
				'public_url' => 'https://displayposts.com',
			),
			array(
				'name' 		 => __( 'LifterLMS', 'coursemaker' ),
				'slug' 		 => 'lifterlms/lifterlms.php',
				'public_url' => 'https://wordpress.org/plugins/lifterlms/',
			),
			array(
				'name' 		 => __( 'Social Proof Slider', 'coursemaker' ),
				'slug' 		 => 'social-proof-testimonials-slider/social-proof-slider.php',
				'public_url' => 'https://wordpress.org/plugins/social-proof-testimonials-slider/',
			),
			array(
				'name'       => __( 'WP Video Lightbox', 'coursemaker' ),
				'slug'       => 'wp-video-lightbox/wp-video-lightbox.php',
				'public_url' => 'https://wordpress.org/plugins/wp-video-lightbox/',
			),
		),
	),
	'content' => array(
		'homepage' => array(
			'post_title'     => 'Home',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/homepage.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'page-templates/blocks.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
		'about' => array(
			'post_title'     => 'About',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/about.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_genesis_layout' => 'content-sidebar' ),
		),
		'contact' => array(
			'post_title'     => 'Contact',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/contact.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_genesis_layout' => 'full-width-content' ),
		),

		// TODO: ADD 6 SAMPLE BLOG POSTS
	),
	'navigation_menus' => array(
		// Header Navigation
		'primary' => array(
			'homepage' => array(
				'title' => 'Home',
			),
			'about' => array(
				'title' => 'About',
			),
			'blog' => array(
				'title' => 'Blog',
			),
			'contact' => array(
				'title' => 'Contact',
			),
		),
		// Logged-In Members Navigation
		'primary-members' => array(
			'homepage' => array(
				'title' => 'Home',
			),
			'about' => array(
				'title' => 'About',
			),
			'blog' => array(
				'title' => 'Blog',
			),
			'contact' => array(
				'title' => 'Contact',
			),
		),
	),
);
