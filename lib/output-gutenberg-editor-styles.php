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
	get_course_maker_theme_colors( 'accent' ),
	get_course_maker_theme_colors( 'accent' ),
	get_course_maker_theme_colors( 'accent' ),
	course_maker_color_contrast( get_course_maker_theme_colors( 'accent' ) ),
	get_course_maker_theme_colors( 'accent' ),
	get_course_maker_theme_colors( 'accent' ),
	course_maker_color_contrast( get_course_maker_theme_colors( 'accent' ) ),
	get_course_maker_theme_colors( 'accent' ),
	get_course_maker_theme_colors( 'accent' ),
	get_course_maker_theme_colors( 'accent' )
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
	get_course_maker_theme_colors( 'linksbuttons' ),
	get_course_maker_theme_colors( 'linksbuttons' ),
	get_course_maker_theme_colors( 'linksbuttons' ),
	get_course_maker_theme_colors( 'linksbuttons' ),
	get_course_maker_theme_colors( 'linksbuttons' ),
	get_course_maker_theme_colors( 'linksbuttons' )
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
	get_course_maker_theme_colors( 'hover' ),
	get_course_maker_theme_colors( 'hover' ),
	get_course_maker_theme_colors( 'hover' ),
	get_course_maker_theme_colors( 'hover' ),
	get_course_maker_theme_colors( 'hover' ),
	get_course_maker_theme_colors( 'hover' )
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
	get_course_maker_theme_colors( 'navtext' ),
	get_course_maker_theme_colors( 'navtext' )
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
	get_course_maker_theme_colors( 'headerbg' ),
	get_course_maker_theme_colors( 'headerbg' )
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
	get_course_maker_theme_colors( 'footerbg' ),
	get_course_maker_theme_colors( 'footerbg' )
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
	get_course_maker_theme_colors( 'white' ),
	get_course_maker_theme_colors( 'white' )
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
	get_course_maker_theme_colors( 'gray' ),
	get_course_maker_theme_colors( 'gray' )
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
	get_course_maker_theme_colors( 'darkgray' ),
	get_course_maker_theme_colors( 'darkgray' )
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
	get_course_maker_theme_colors( 'black' ),
	get_course_maker_theme_colors( 'black' )
	);

	/* OUTPUT EVERYTHING
	-------------------------------------------- */
	if ( $css ) {
		return wp_strip_all_tags( $css );
	}

}
