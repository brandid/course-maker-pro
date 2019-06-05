<?php
/**
* Loads scripts and stylesheets for Course Maker theme.
*
* @since 1.0
*
* @package Course Maker Pro
*/

//* Enqueue Scripts, Styles and Icons
add_action( 'wp_enqueue_scripts', 'course_maker_enqueue_scripts_styles' );
function course_maker_enqueue_scripts_styles() {

	$handle = 'course-maker-pro';

	wp_enqueue_style( $handle , CHILD_THEME_URI . "/style.css", false, CHILD_THEME_VERSION );

	// Google Fonts
	wp_enqueue_style( 'coursemaker-fonts', '//fonts.googleapis.com/css?family=Questrial', array(), CHILD_THEME_VERSION );

	// Dashicons
	wp_enqueue_style( 'dashicons' );

	// Font Awesome
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );

	// Global JS
	wp_enqueue_script( 'global-scripts', CHILD_THEME_URI . "/js/global.js", array( 'jquery' ), CHILD_THEME_VERSION, true );

	if ( is_front_page() ) {

		// Enqueue scripts
		wp_enqueue_script( 'homepage-scripts', CHILD_THEME_URI . "/js/home.js", array( 'jquery' ), CHILD_THEME_VERSION, true );

	}

	// Responsive Menu
	wp_enqueue_script( 'coursemaker-responsive-menu', CHILD_THEME_URI. "/js/responsive-menus.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script( 'coursemaker-responsive-menu', 'genesis_responsive_menu', course_maker_responsive_menu_settings() );

	//* Smooth scroll
	wp_enqueue_script( 'coursemaker-smooth-scroll', get_stylesheet_directory_uri() . '/js/smooth-scroll.js', array( 'jquery' ), '1.0.0', true );

}

//* Define Responsive Menu settings
function course_maker_responsive_menu_settings() {

	$settings = array(
	'mainMenu'          => __( 'Menu', 'coursemaker' ),
	'menuIconClass'     => 'dashicons-before dashicons-menu',
	'subMenu'           => __( 'Submenu', 'coursemaker' ),
	'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
	'menuClasses'       => array(
		'combine' => array(
			'.nav-primary',
			'.nav-primary-members',
			'.nav-header',
		),
		'others'  => array(),
	),
	);

	return $settings;

}

//* Third-Party Plugin integrations custom styles
add_action( 'wp_enqueue_scripts', 'course_maker_custom_plugin_styles' );
function course_maker_custom_plugin_styles() {

	// Check if WooCommerce is active
	if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {
		wp_enqueue_style( 'coursemaker-woocommerce-styles', get_stylesheet_directory_uri() . '/css/woocommerce-custom-styles.css' );
	}

	// Check if MemberPress is active
	if ( class_exists( 'MeprUser' ) ) {
		wp_enqueue_style( 'coursemaker-memberpress-styles', get_stylesheet_directory_uri() . '/css/memberpress-custom-styles.css' );
	}

	// Check if Restrict Content Pro is active
	if ( class_exists( 'RCP_Member' ) ) {
		wp_enqueue_style( 'coursemaker-rcp-styles', get_stylesheet_directory_uri() . '/css/rcp-custom-styles.css' );
	}

}
