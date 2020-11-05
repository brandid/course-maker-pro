<?php
/**
 * Adds custom CSS to the Gutenberg Editor
 *
 * @package Course Maker Pro
 * @author  brandiD
 * @license GPL-2.0+
 * @link    https://thebrandid.com
 */

add_action( 'enqueue_block_editor_assets', 'course_maker_gutenberg_editor_customizer_css_output' );
/**
 * Checks the Customizer settings for colors.
 * If any of these value are set the appropriate CSS is output.
 */
function course_maker_gutenberg_editor_customizer_css_output() {

	$appearance = genesis_get_config( 'appearance' );

	$editor_color_palette = $appearance['editor-color-palette'];

	$color_accent       = get_theme_mod( 'course_maker_theme_accentcolor_setting', $appearance['default-colors']['accent'] );
	$color_linksbuttons = get_theme_mod( 'course_maker_theme_linksbuttons_setting', $appearance['default-colors']['linksbuttons'] );
	$color_hover        = get_theme_mod( 'course_maker_theme_hover_setting', $appearance['default-colors']['hover'] );
	$color_navtext      = get_theme_mod( 'course_maker_theme_navtext_setting', $appearance['default-colors']['navtext'] );
	$color_headerbg     = get_theme_mod( 'course_maker_theme_headerbg_setting', $appearance['default-colors']['headerbg'] );
	$color_footerbg     = get_theme_mod( 'course_maker_theme_footerbg_setting', $appearance['default-colors']['footerbg'] );
	$color_white        = $appearance['default-colors']['white'];
	$color_black        = $appearance['default-colors']['black'];
	$color_gray         = $appearance['default-colors']['gray'];
	$color_darkgray     = $appearance['default-colors']['darkgray'];

	$css = '';

	// Begin Custom CSS.
	$css .= '
	/* ----------------- // CUSTOMIZER STYLES // ----------------- */
	';

	// BUTTONS COLOR.
	$css .= '
		/* ---------- BUTTONS ---------- */
		.editor-styles-wrapper .wp-block-button .wp-block-button__link {
			text-transform: uppercase;
			transition: all .3s ease;
		}
	';

	// ACCENT COLOR.
	$css .= sprintf(
		'
		/* ---------- ACCENT ---------- */

		/* text-color */
		.editor-styles-wrapper .has-accent-color {
			color: %1$s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-accent-background-color {
			background-color: %1$s !important;
		}

		.editor-styles-wrapper .wp-block-button .wp-block-button__link.has-accent-background-color,
		.editor-styles-wrapper .ab-block-button .ab-button,
		.editor-styles-wrapper .gb-block-button .gb-button  {
			background-color: %1$s !important;
			color: %2$s !important;
		}

		.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background) {
		    background-color: %1$s !important;
		}

		.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link.has-accent-background-color {
			background-color: transparent !important;
		    border-color: %1$s !important;
			color: %2$s !important;
		}
	',
		$color_accent,
		course_maker_color_contrast( $color_accent )
	);

	// LINKS/BUTTONS COLOR.
	$css .= sprintf(
		'
		/* ---------- LINKS/BUTTONS ---------- */

		/* text-color */
		.editor-styles-wrapper a:not(.wp-block-button),
		.editor-styles-wrapper .has-linksbuttons-color {
			color: %1$s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-linksbuttons-background-color {
			 background-color: %1$s !important;
		}

		/* Default buttons with no background color */
		.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background) {
		    background-color: %1$s !important;
		}

		/* Default buttons with no background or text color */
		.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background):not(.has-text-color) {
			background-color: %1$s !important;
			color: #fff !important;
		}

		/* Outline buttons */
		.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:not(.has-background):not(.has-text-color),
		.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link.has-linksbuttons-background-color {
			background-color: transparent !important;
		    border-color: %1$s !important;
			color: %1$s !important;
		}
	',
		$color_linksbuttons
	);

	// HOVER COLOR.
	$css .= sprintf(
		'
		/* ---------- HOVER ---------- */

		/* text-color */
		.editor-styles-wrapper .has-hover-color {
			color: %1$s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-hover-background-color {
			 background-color: %1$s !important;
		}

		/* Links */
		.editor-styles-wrapper a:not(.wp-block-button):hover {
			color: %1$s !important;
		}

		/* Default buttons with no background or text color */
		.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background):not(.has-text-color):hover {
		    background-color: %1$s !important;
			color: #fff !important;
		}

		/* Outline buttons */
		.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:not(.has-background):not(.has-text-color):hover,
		.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link.has-linksbuttons-background-color:hover {
			background-color: %1$s !important;
		    border-color: %1$s !important;
			color: #fff !important;
		}
	',
		$color_hover
	);

	// NAV TEXT COLOR.
	$css .= sprintf(
		'
		/* ---------- NAV TEXT ---------- */

		/* text-color */
		.editor-styles-wrapper .has-navtext-color {
			color: %1$s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-navtext-background-color {
			 background-color: %1$s !important;
		}
	',
		$color_navtext
	);

	// HEADER BG COLOR.
	$css .= sprintf(
		'
		/* ---------- HEADER BG ---------- */

		/* text-color */
		.editor-styles-wrapper .has-headerbg-color {
			color: %1$s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-headerbg-background-color,
		.entry-content.blog-posts > .alignfull {
			 background-color: %1$s !important;
		}
	',
		$color_headerbg
	);

	// FOOTER BG COLOR.
	$css .= sprintf(
		'
		/* ---------- FOOTER BG ---------- */

		/* text-color */
		.editor-styles-wrapper .has-footerbg-color {
			color: %1$s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-footerbg-background-color {
			 background-color: %1$s !important;
		}
	',
		$color_footerbg
	);

	// WHITE COLOR.
	$css .= sprintf(
		'
		/* ---------- WHITE ---------- */

		/* text-color */
		.editor-styles-wrapper .has-white-color {
			color: %1$s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-white-background-color {
			 background-color: %1$s !important;
		}
	',
		$color_white
	);

	// GRAY COLOR.
	$css .= sprintf(
		'
		/* ---------- GRAY ---------- */

		/* text-color */
		.editor-styles-wrapper .has-gray-color {
			color: %1$s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-gray-background-color {
			 background-color: %1$s !important;
		}
	',
		$color_gray
	);

	// DARK GRAY COLOR.
	$css .= sprintf(
		'
		/* ---------- DARK GRAY ---------- */

		/* text-color */
		.editor-styles-wrapper .has-darkgray-color {
			color: %1$s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-darkgray-background-color {
			 background-color: %1$s !important;
		}
	',
		$color_darkgray
	);

	// BLACK COLOR.
	$css .= sprintf(
		'
		/* ---------- BLACK ---------- */

		/* text-color */
		.editor-styles-wrapper .has-black-color {
			color: %1$s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-black-background-color {
			 background-color: %1$s !important;
		}
	',
		$color_black
	);

	// OUTPUT EVERYTHING.
	if ( $css ) {
		return wp_strip_all_tags( $css );
	}

}
