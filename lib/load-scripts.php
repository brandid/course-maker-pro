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

	wp_enqueue_style( CHILD_THEME_HANDLE . '-styles' , CHILD_THEME_URI . "/style.css", false, CHILD_THEME_VERSION );

	// Google Fonts
	wp_enqueue_style( CHILD_THEME_HANDLE . '-fonts', '//fonts.googleapis.com/css?family=Questrial', array(), CHILD_THEME_VERSION );

	// Dashicons
	wp_enqueue_style( 'dashicons' );

	// Font Awesome
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );

	// Global JS
	wp_enqueue_script( CHILD_THEME_HANDLE . '-global-scripts', CHILD_THEME_URI . "/js/global.js", array( 'jquery' ), CHILD_THEME_VERSION, true );

	if ( is_front_page() ) {

		// Enqueue scripts
		wp_enqueue_script( CHILD_THEME_HANDLE . '-homepage-scripts', CHILD_THEME_URI . "/js/home.js", array( 'jquery' ), CHILD_THEME_VERSION, true );

	}

	//* Smooth scroll
	wp_enqueue_script( CHILD_THEME_HANDLE . '-smooth-scroll', get_stylesheet_directory_uri() . '/js/smooth-scroll.js', array( 'jquery' ), '1.0.0', true );

}

// Responsive Menu
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}

//* Third-Party Plugin integrations custom styles
add_action( 'wp_enqueue_scripts', 'course_maker_custom_plugin_styles' );
function course_maker_custom_plugin_styles() {

	// Check if WooCommerce is active
	if ( class_exists( 'WooCommerce' ) && is_woocommerce() ) {
		wp_enqueue_style( CHILD_THEME_HANDLE . '-woocommerce-styles', get_stylesheet_directory_uri() . '/css/woocommerce-custom-styles.css' );
	}

	// Check if MemberPress is active
	if ( class_exists( 'MeprUser' ) ) {
		wp_enqueue_style( CHILD_THEME_HANDLE . '-memberpress-styles', get_stylesheet_directory_uri() . '/css/memberpress-custom-styles.css' );
	}

	// Check if Restrict Content Pro is active
	if ( class_exists( 'RCP_Member' ) ) {
		wp_enqueue_style( CHILD_THEME_HANDLE . '-rcp-styles', get_stylesheet_directory_uri() . '/css/rcp-custom-styles.css' );
	}

}
