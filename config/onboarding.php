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
		'blog' => array(
			'post_title'     => 'Blog',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_genesis_layout' => 'full-width-content' ),
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
		/* SAMPLE BLOG POSTS */
		'Sample Blog Post 1' => array(
			'post_title'	 => 'Five Important Things You Should Know About Courses',
			'post_content'	 => require dirname( __FILE__ ) . '/import/content/sample-blog-post-1.php',
			'post_type'		 => 'post',
			'post_status'	 => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/sample-blog-post-1.jpg', // Photo by Matthew T Rader on Unsplash
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_genesis_layout' => 'full-width-content' ),
		),
		'Sample Blog Post 2' => array(
			'post_title'	 => 'This Year Will Be The Year of Your Course',
			'post_content'	 => require dirname( __FILE__ ) . '/import/content/sample-blog-post-2.php',
			'post_type'		 => 'post',
			'post_status'	 => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/sample-blog-post-2.jpg', // Photo by Jeff Isaak on Unsplash
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_genesis_layout' => 'full-width-content' ),
		),
		'Sample Blog Post 3' => array(
			'post_title'	 => 'Ten Things Your Competitors Know About Courses',
			'post_content'	 => require dirname( __FILE__ ) . '/import/content/sample-blog-post-3.php',
			'post_type'		 => 'post',
			'post_status'	 => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/sample-blog-post-3.jpg', // Photo by Henri Meilhac on Unsplash
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_genesis_layout' => 'full-width-content' ),
		),
		'Sample Blog Post 4' => array(
			'post_title'	 => 'Innovative Approaches To Improving Your Courses',
			'post_content'	 => require dirname( __FILE__ ) . '/import/content/sample-blog-post-4.php',
			'post_type'		 => 'post',
			'post_status'	 => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/sample-blog-post-4.jpg', // Photo by Nathan Dumlao on Unsplash
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_genesis_layout' => 'full-width-content' ),
		),
		'Sample Blog Post 5' => array(
			'post_title'	 => 'The Crucial Step in Courses that Many Overlook',
			'post_content'	 => require dirname( __FILE__ ) . '/import/content/sample-blog-post-5.php',
			'post_type'		 => 'post',
			'post_status'	 => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/sample-blog-post-5.jpg', // Photo by Clem Onojeghuo on Unsplash
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_genesis_layout' => 'full-width-content' ),
		),
		'Sample Blog Post 6' => array(
			'post_title'	 => 'Three Tricks to Putting Your Courses into Overdrive',
			'post_content'	 => require dirname( __FILE__ ) . '/import/content/sample-blog-post-6.php',
			'post_type'		 => 'post',
			'post_status'	 => 'publish',
			'featured_image' => CHILD_URL . '/config/import/images/sample-blog-post-6.jpg', // Photo by Jeremy Bishop on Unsplash
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
			'meta_input'     => array( '_genesis_layout' => 'full-width-content' ),
		),
	),
	'navigation_menus' => array(
		/* Header Navigation */
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
		/* Logged-In Members Navigation */
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
	/* WIDGET IMPORT - Ready for Genesis 3.1 */
	'widgets' => array (
		'footer-1' => array (
			array (
				'type' => 'text',
				'args' => array (
					'title'  => 'About Course Maker Pro',
					'text'   => '<p>This theme is packed full of features and functionality to help you market your new course. The homepage layout will drive traffic to your site and engage users with your online course materials while communicating that you’re an authority in your space, without actually saying that — unless you want it to!</p>',
					'filter' => 1,
					'visual' => 1,
				),
			),
		),
		'footer-2' => array (
			array (
				'type' => 'text',
				'args' => array (
					'title'  => 'Your Add/Drop Policy',
					'text'   => '<p>Write a really solid guarantee for your class and place it here. Something like “If you’re not totally satisfied with this course, we’ll give 100% of your money back, no questions asked. Oh, and you can keep all the downloadable audiobooks and audio course. That’s how absolutely certain we are that you’ll find tremendous, life-changing value in every lesson.”</p>',
					'filter' => 1,
					'visual' => 1,
				),
			),
		),
		'footer-3' => array (
			array (
				'type' => 'text',
				'args' => array (
					'title'  => 'Start building Your Brand For Free',
					'text'   => '<p><strong><em>To display an Opt-in form, simply install your favorite Forms plugin. Then, replace this text with your Form widget or shortcode.</em></strong></p>',
					'filter' => 1,
					'visual' => 1,
				),
			),
		),
	),
);
