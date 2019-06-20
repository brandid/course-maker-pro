<?php
/**
* Loads Gutenberg Editor functions for Course Maker theme.
*
* @since 2.0
*
* @package Course Maker Pro
*/

//* Gutenberg Front-end styles
add_action( 'wp_enqueue_scripts', 'course_maker_gutenberg_page_styles' );
function course_maker_gutenberg_page_styles() {

	wp_enqueue_style( genesis_get_theme_handle() . '-gutenberg-frontend-styles', get_stylesheet_directory_uri() . "/css/gutenberg-frontend-styles.css", array( genesis_get_theme_handle() ), genesis_get_theme_version() );

}

//* Gutenberg Editor assets
add_action( 'enqueue_block_editor_assets', 'course_maker_gutenberg_editor_styles' );
function course_maker_gutenberg_editor_styles() {

	// Fonts
	wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Questrial', array(), genesis_get_theme_version() );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );

	// Custom Editor Styles
	wp_enqueue_style( genesis_get_theme_handle() . '-gutenberg-editor-styles', get_stylesheet_directory_uri() . "/css/gutenberg-editor-styles.css", array(), genesis_get_theme_version(), true );

	// Add custom CSS to Gutenberg
	require_once('output-gutenberg-editor-styles.php');
	wp_add_inline_style( genesis_get_theme_handle() . '-gutenberg-editor-inline-styles', course_maker_gutenberg_editor_customizer_css_output(), 'after' );

}

//* Add custom CSS class to Body
add_filter( 'body_class', 'coursemaker_blocks_body_classes' );
/**
 * Adds body classes to help with block styling.
 *
 * - `has-no-blocks` if content contains no blocks.
 * - `first-block-[block-name]` to allow changes based on the first block (such as removing padding above a Cover block).
 * - `first-block-align-[alignment]` to allow styling adjustment if the first block is wide or full-width.
 *
 * @since 3.0.1
 *
 * @param array $classes The original classes.
 * @return array The modified classes.
 */
function coursemaker_blocks_body_classes( $classes ) {

	if ( ! is_singular() || ! function_exists( 'has_blocks' ) || ! function_exists( 'parse_blocks' ) ) {
		return $classes;
	}

	if ( ! has_blocks() ) {
		$classes[] = 'has-no-blocks';
		return $classes;
	}

	$post_object = get_post( get_the_ID() );

	$blocks = (array) parse_blocks( $post_object->post_content );

	if ( isset( $blocks[0]['blockName'] ) ) {
		$classes[] = 'first-block-' . str_replace( '/', '-', $blocks[0]['blockName'] );
	}

	if ( isset( $blocks[0]['attrs']['align'] ) ) {
		$classes[] = 'first-block-align-' . $blocks[0]['attrs']['align'];
	}

	return $classes;
}

//* Add support for Editor Styles
add_theme_support( 'editor-styles' );

//* Enqueue Editor styles
add_editor_style( '/css/gutenberg-editor-styles.css' );

//* Enable Wide Blocks
add_theme_support( 'align-wide' );

//* Make media embeds responsive
add_theme_support( 'responsive-embeds' );

// Editor Color Palette
$hello_pro_block_editor_settings = genesis_get_config( 'block-editor-settings' );
add_theme_support( 'editor-color-palette', $hello_pro_block_editor_settings['editor-color-palette'] );

//* Force full-width-content layout for Gutenberg pages
add_filter( 'genesis_site_layout', 'setGutenbergPageLayout' );
function setGutenbergPageLayout(){
    if ( function_exists( 'the_gutenberg_project' ) && has_blocks( get_the_ID() ) ) {
        return 'full-width-content';
    }
}

//* Remove custom position of the Entry Title
remove_action( 'genesis_before_entry', 'course_maker_remove_conditional_post_titles' );
remove_action( 'genesis_after_header', 'course_maker_conditional_post_titles' );
