<?php
/**
 * Course Maker - Gutenberg Editor Styles
 *
 * This file adds custom CSS to the Gutenberg Editor
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

	$css = '';

	/* Get Main Accent Color */
	$color_accent = get_theme_mod( 'course_maker_theme_accentcolor_setting', '#616e63' );

	/* Get Links/Buttons Color */
	$color_linksbuttons = get_theme_mod( 'course_maker_theme_linksbuttons_setting', '#8e9492' );

	/* Get Hover Color */
	$color_hover = get_theme_mod( 'course_maker_theme_hover_setting', '#4c4d50' );

	/* Get Nav Text Color */
	$color_navtext = get_theme_mod( 'course_maker_theme_navtext_setting', '#717875' );

	/* Get Header BG Color */
	$color_headerbg = get_theme_mod( 'course_maker_theme_headerbg_setting', '#e6e5e3' );

	/* Get Footer BG Color */
	$color_footerbg = get_theme_mod( 'course_maker_theme_footerbg_setting', '#f2f1ef' );

	/* Other colors not in Customizer */
	$color_white = '#ffffff';
	$color_gray = '#5e6270';
	$color_darkgray = '#464f56';
	$color_black = '#000000';

	/* Begin Custom CSS
	------------------------------------------------------------------------- */
	$css .= '
	/* ----------------- // CUSTOMIZER STYLES // ----------------- */
	';

	/* BUTTONS
	------------------------------------------ */
	$css .= '
		/* ---------- BUTTONS ---------- */
		.editor-styles-wrapper .wp-block-button .wp-block-button__link {
			text-transform: uppercase;
			transition: all .3s ease;
		}
	';

	/* ACCENT COLOR
	------------------------------------------ */
	$css .= sprintf( '
		/* ---------- ACCENT ---------- */

		/* text-color */
		.editor-styles-wrapper .has-accent-color {
			color: %s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-accent-background-color {
			background-color: %s !important;
		}

		.editor-styles-wrapper .wp-block-button .wp-block-button__link.has-accent-background-color,
		.editor-styles-wrapper .ab-block-button .ab-button  {
			background-color: %s !important;
			color: %s !important;
		}

		.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background) {
		    background-color: %s !important;
		}

		.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link.has-accent-background-color {
			background-color: transparent !important;
		    border-color: %s !important;
			color: %s !important;
		}
	',
	$color_accent,
	$color_accent,
	$color_accent,
	course_maker_color_contrast( $color_accent ),
	$color_accent,
	$color_accent,
	course_maker_color_contrast( $color_accent ),
	$color_accent,
	$color_accent,
	$color_accent
	);

	/* LINKS/BUTTONS COLOR
	------------------------------------------ */
	$css .= sprintf( '
		/* ---------- LINKS/BUTTONS ---------- */

		/* text-color */
		.editor-styles-wrapper a:not(.wp-block-button),
		.editor-styles-wrapper .has-linksbuttons-color {
			color: %s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-linksbuttons-background-color {
			 background-color: %s !important;
		}

		/* Default buttons with no background color */
		.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background) {
		    background-color: %s !important;
		}

		/* Default buttons with no background or text color */
		.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background):not(.has-text-color) {
			background-color: %s !important;
			color: #fff !important;
		}

		/* Outline buttons */
		.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:not(.has-background):not(.has-text-color),
		.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link.has-linksbuttons-background-color {
			background-color: transparent !important;
		    border-color: %s !important;
			color: %s !important;
		}
	',
	$color_linksbuttons,
	$color_linksbuttons,
	$color_linksbuttons,
	$color_linksbuttons,
	$color_linksbuttons,
	$color_linksbuttons
	);

	/* HOVER COLOR
	-------------------------------------------- */
	$css .= sprintf( '
		/* ---------- HOVER ---------- */

		/* text-color */
		.editor-styles-wrapper .has-hover-color {
			color: %s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-hover-background-color {
			 background-color: %s !important;
		}

		/* Links */
		.editor-styles-wrapper a:not(.wp-block-button):hover {
			color: %s !important;
		}

		/* Default buttons with no background or text color */
		.editor-styles-wrapper .wp-block-button .wp-block-button__link:not(.has-background):not(.has-text-color):hover {
		    background-color: %s !important;
			color: #fff !important;
		}

		/* Outline buttons */
		.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:not(.has-background):not(.has-text-color):hover,
		.editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link.has-linksbuttons-background-color:hover {
			background-color: %s !important;
		    border-color: %s !important;
			color: #fff !important;
		}
	',
	$color_hover,
	$color_hover,
	$color_hover,
	$color_hover,
	$color_hover,
	$color_hover
	);

	/* NAV TEXT COLOR
	-------------------------------------------- */
	$css .= sprintf( '
		/* ---------- NAV TEXT ---------- */

		/* text-color */
		.editor-styles-wrapper .has-navtext-color {
			color: %s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-navtext-background-color {
			 background-color: %s !important;
		}
	',
	$color_navtext,
	$color_navtext
	);

	/* HEADER BG COLOR
	-------------------------------------------- */
	$css .= sprintf( '
		/* ---------- HEADER BG ---------- */

		/* text-color */
		.editor-styles-wrapper .has-headerbg-color {
			color: %s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-headerbg-background-color,
		.entry-content.blog-posts > .alignfull {
			 background-color: %s !important;
		}
	',
	$color_headerbg,
	$color_headerbg
	);

	/* FOOTER BG COLOR
	-------------------------------------------- */
	$css .= sprintf( '
		/* ---------- FOOTER BG ---------- */

		/* text-color */
		.editor-styles-wrapper .has-footerbg-color {
			color: %s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-footerbg-background-color {
			 background-color: %s !important;
		}
	',
	$color_footerbg,
	$color_footerbg
	);

	/* WHITE COLOR
	-------------------------------------------- */
	$css .= sprintf( '
		/* ---------- WHITE ---------- */

		/* text-color */
		.editor-styles-wrapper .has-white-color {
			color: %s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-white-background-color {
			 background-color: %s !important;
		}
	',
	$color_white,
	$color_white
	);

	/* GRAY COLOR
	-------------------------------------------- */
	$css .= sprintf( '
		/* ---------- GRAY ---------- */

		/* text-color */
		.editor-styles-wrapper .has-gray-color {
			color: %s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-gray-background-color {
			 background-color: %s !important;
		}
	',
	$color_gray,
	$color_gray
	);

	/* DARK GRAY COLOR
	-------------------------------------------- */
	$css .= sprintf( '
		/* ---------- DARK GRAY ---------- */

		/* text-color */
		.editor-styles-wrapper .has-darkgray-color {
			color: %s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-darkgray-background-color {
			 background-color: %s !important;
		}
	',
	$color_darkgray,
	$color_darkgray
	);

	/* BLACK COLOR
	-------------------------------------------- */
	$css .= sprintf( '
		/* ---------- BLACK ---------- */

		/* text-color */
		.editor-styles-wrapper .has-black-color {
			color: %s !important;
		}

		/* background-color */
		.editor-styles-wrapper .has-black-background-color {
			 background-color: %s !important;
		}
	',
	$color_black,
	$color_black
	);

	/* OUTPUT EVERYTHING
	-------------------------------------------- */
	if ( $css ) {
		return wp_strip_all_tags( $css );
	}

}
