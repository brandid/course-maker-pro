<?php
/**
 * Course Maker Pro
 *
 * This file adds functions to the Course Maker Pro theme.
 *
 * @package Course Maker Pro
 * @author  thebrandiD
 * @license GPL-2.0+
 * @link    https://thebrandidthemes.com/
 */

// Start the engine.
require_once get_template_directory() . '/lib/init.php';

// Include functions file which checks for plugins.
if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

// Load constants - use constants in code instead of functions to improve performance. Hat Tip to Tonya at Knowthecode.io.
$child_theme = wp_get_theme();

define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );

define( 'ROOT_DOMAIN_URL', home_url() );
define( 'CHILD_SITE_NAME', get_bloginfo( 'name' ) );

// Set Localization - do not remove!
add_action( 'after_setup_theme', 'course_maker_localization_setup' );
/**
 * Loads text Domain
 *
 * @since  1.0.0
 */
function course_maker_localization_setup() {
	load_child_theme_textdomain( genesis_get_theme_handle(), apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', 'coursemaker' ) );
}

// Load Theme Setup and Configuration.
require_once CHILD_THEME_DIR . '/lib/theme-setup.php';

// Load custom Onboarding functions.
require_once CHILD_THEME_DIR . '/lib/onboarding-functions.php';

// Add the social icons functions.
require_once CHILD_THEME_DIR . '/lib/icon-functions.php';

// Add the custom meta boxes.
require_once CHILD_THEME_DIR . '/lib/metaboxes.php';

// Add Image upload and Color select to WordPress Theme Customizer.
require_once CHILD_THEME_DIR . '/lib/customize.php';

// Add Color Scheme settings to WordPress Theme Customizer.
require_once CHILD_THEME_DIR . '/lib/customize-colors.php';

// Add the helper functions.
require_once CHILD_THEME_DIR . '/lib/helper-functions.php';

// Add the blog functions.
require_once CHILD_THEME_DIR . '/lib/blog-functions.php';

// Add Gutenberg functions.
add_action( 'after_setup_theme', 'course_maker_gutenberg_functions' );
/**
 * Adds Gutenberg functions to the theme
 */
function course_maker_gutenberg_functions() {
	require_once get_stylesheet_directory() . '/lib/gutenberg-functions.php';
}

// Load Scripts and Styles.
require_once CHILD_THEME_DIR . '/lib/load-scripts.php';

// Output Customizer Colors CSS.
require_once CHILD_THEME_DIR . '/lib/output-colors.php';

// Display Posts Shortcode.
if ( is_plugin_active( 'display-posts-shortcode/display-posts-shortcode.php' ) ) {
	include_once CHILD_THEME_DIR . '/lib/dps-functions.php';
}

// Output for Course Maker Modules plugin.
if ( is_plugin_active( 'course-maker-modules/course-maker-modules.php' ) ) {
	include_once CHILD_THEME_DIR . '/lib/output-coursemakermodules.php';
}

// Output for LifterLMS plugin.
if ( is_plugin_active( 'lifterlms/lifterlms.php' ) ) {
	include_once CHILD_THEME_DIR . '/lib/lifterlms-functions.php';
	include_once CHILD_THEME_DIR . '/lib/output-lifterlms.php';
}

// Output for WooCommerce plugin.
if ( class_exists( 'WooCommerce' ) ) {
	include_once CHILD_THEME_DIR . '/lib/output-woocommerce.php';
}

// Output for MemberPress plugin.
if ( class_exists( 'MeprUser' ) ) {
	include_once CHILD_THEME_DIR . '/lib/output-memberpress.php';
}

// Output for Restrict Content Pro plugin.
if ( class_exists( 'RCP_Member' ) ) {
	include_once CHILD_THEME_DIR . '/lib/output-rcp.php';
}
