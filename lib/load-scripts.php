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

	$block_editor_settings = genesis_get_config( 'block-editor-settings' );

	// Google Fonts
	wp_enqueue_style( genesis_get_theme_handle() . '-fonts', $block_editor_settings['fonts-url'], array(), genesis_get_theme_version() );

	// Dashicons
	wp_enqueue_style( 'dashicons' );

	// Font Awesome
	wp_enqueue_style( 'font-awesome', $block_editor_settings['fontawesome-css-url'] );

	// Global JS
	wp_enqueue_script( genesis_get_theme_handle() . '-global-scripts', CHILD_THEME_URI . "/js/global.js", array( 'jquery' ), genesis_get_theme_version(), true );

	if ( is_front_page() ) {

		// Enqueue scripts
		wp_enqueue_script( genesis_get_theme_handle() . '-homepage-scripts', CHILD_THEME_URI . "/js/home.js", array( 'jquery' ), genesis_get_theme_version(), true );

	}

	//* Smooth scroll
	wp_enqueue_script( genesis_get_theme_handle() . '-smooth-scroll', get_stylesheet_directory_uri() . '/js/smooth-scroll.js', array( 'jquery' ), '1.0.0', true );

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
		wp_enqueue_style( genesis_get_theme_handle() . '-woocommerce-styles', get_stylesheet_directory_uri() . '/css/woocommerce-custom-styles.css' );
	}

	// Check if MemberPress is active
	if ( class_exists( 'MeprUser' ) ) {
		wp_enqueue_style( genesis_get_theme_handle() . '-memberpress-styles', get_stylesheet_directory_uri() . '/css/memberpress-custom-styles.css' );
	}

	// Check if Restrict Content Pro is active
	if ( class_exists( 'RCP_Member' ) ) {
		wp_enqueue_style( genesis_get_theme_handle() . '-rcp-styles', get_stylesheet_directory_uri() . '/css/rcp-custom-styles.css' );
	}

}
