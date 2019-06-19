<?php
/**
* This file adds the required CSS to the front end of Course Maker theme.
*
* @package Course Maker Pro
* @author  The BrandiD
* @license GPL-2.0+
* @link    https://thebrandidthemes.com/
*/

add_action( 'wp_enqueue_scripts', 'course_maker_color_css' );
/**
 * Checks the settings for the colors.
 *
 * @since  1.0.0
 *
 * @param  array $selected_scheme scheme in use
 */
function course_maker_color_css() {

	// // Load the selected theme colors - from helper-functions.php
	// $color = get_course_maker_theme_colors( $selected_scheme );
	//
	// // Get default colors - from customize-colors.php
	// $default_color = scheme_custom_default_colors();

	// // Other colors
	// $color_white = '#ffffff';
	// $color_gray = '#5e6270';
	// $color_darkgray = '#464f56';
	// $color_black = '#000000';

	$css = '';

	/* MAIN ACCENT
	------------------------------------------------------------------------- */
	$css .= sprintf('
		/* ---------- MAIN ACCENT ---------- */
		.has-accent-color,
		.home .site-header.sticky.scrolled .site-title a,
		body:not(.home) .site-header .site-title a,
		.entry-content .featured-articles button.slick-arrow > span,
		.entry-content .featured-articles ul.slick-dots li button::before,
		.entry-content .featured-articles ul.slick-dots li.slick-active button:before,
		body:not(.home) main.content .entry .gform_confirmation_message {
			color: %s !important;
		}

		.has-accent-background-color,
		.wp-block-button .wp-block-button__link:not(.has-background),
		.wp-block-button .wp-block-button__link.has-accent-background-color,
		.ab-block-button .ab-button,
		.menu-toggle,
		.home .welcome .wp-block-button > a:hover,
		.cm-featured-post .widget-wrap > article > .stripe,
		.entry-content .featured-articles .featured-article {
			background-color: %s !important;
		}

		.wp-block-button.is-style-outline .wp-block-button__link:not(.has-background):not(.has-text-color),
		.wp-block-button.is-style-outline .wp-block-button__link.has-accent-background-color {
			background-color: transparent !important;
			border-color: %s !important;
			color: %s !important;
		}

		.sidebar .widget,
		body:not(.home) main.content .entry .gform_confirmation_message {
			border-color: %s !important;
		}',
		get_course_maker_theme_colors( 'accent' ),
		get_course_maker_theme_colors( 'accent' ),
		get_course_maker_theme_colors( 'accent' ),
		get_course_maker_theme_colors( 'accent' ),
		get_course_maker_theme_colors( 'accent' )
	);

	/* LINKS / BUTTONS
	------------------------------------------------------------------------- */
	$css .= sprintf('
		/* ---------- LINKS / BUTTONS ---------- */
		archive-pagination .active a,
		body:not(.home) .button,
		.sidebar .enews-widget input[type="submit"],
		button:not([id*="slick-"]):not([class*="gs-faq__question"]),
		input[type="button"],
		input[type="reset"],
		input[type="submit"],
		.menu-toggle:focus,
		.menu-toggle:hover,
		.archive-pagination li a:focus,
		.archive-pagination li a:hover,
		.wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-background),
		.has-linksbuttons-background-color  {
			background-color: %s !important;
		}

		.site-inner a:not(.button):not(.wp-block-button__link),
		.has-linksbuttons-color,
		.subtitle,
		.footer-widgets .footer-widgets-2 a, {
			color: %s !important;
		}

		.footer-widgets .footer-widgets-2 a,
		.front-page-testimonials .testimonial-author-img img,
		.menu-toggle,
		.menu-toggle:focus,
		.menu-toggle:hover,
		.sub-menu-toggle {
			border-color: %s !important;
		}

		#menu-social-menu li > a svg,
		#menu-social-menu li > a svg {
			fill: %s !important;
		}

		.wp-block-button.is-style-outline .wp-block-button__link:not(.has-background):not(.has-text-color),
		.wp-block-button.is-style-outline .wp-block-button__link.has-linksbuttons-background-color {
			background-color: transparent !important;
		    border-color: %s !important;
			color: %s !important;
		}',
		get_course_maker_theme_colors( 'linksbuttons' ),
		get_course_maker_theme_colors( 'linksbuttons' ),
		get_course_maker_theme_colors( 'linksbuttons' ),
		get_course_maker_theme_colors( 'linksbuttons' ),
		get_course_maker_theme_colors( 'linksbuttons' ),
		get_course_maker_theme_colors( 'linksbuttons' )
	);

	/* HOVER
	------------------------------------------------------------------------- */
	$css .= sprintf( '
		/* ---------- HOVER ---------- */
		.has-hover-color,
		.home .site-header.sticky.scrolled .site-title a:hover,
		.home .site-header.sticky.scrolled .site-title a:focus,
		body:not(.home) .site-header .site-title a:hover,
		body:not(.home) .site-header .site-title a:focus,
		.home .site-header.sticky.scrolled .genesis-nav-menu .current-menu-item > a,
		.home .site-header.sticky.scrolled .genesis-nav-menu a:focus,
		.home .site-header.sticky.scrolled .genesis-nav-menu a:hover,
		body:not(.home) .site-header .genesis-nav-menu .current-menu-parent > a,
		body:not(.home) .site-header .genesis-nav-menu .current-menu-item > a,
		body:not(.home) .site-header .genesis-nav-menu a:focus,
		body:not(.home) .site-header .genesis-nav-menu a:hover,
		.site-footer .genesis-nav-menu .current-menu-item > a,
		.site-footer .genesis-nav-menu a:focus,
		.site-footer .genesis-nav-menu a:hover,
		.site-footer a:hover,
		.site-footer a:focus,
		.footer-widgets .footer-widgets-2 a:hover,
		.footer-widgets .footer-widgets-2 a:focus,
		.site-inner a:not(.button):not(.wp-block-button__link):hover,
		.site-inner a:not(.button):not(.wp-block-button__link):focus,
		.entry-content ul.blog-categories > li.current-cat a {
			color: %s !important;
		}

		.has-hover-background-color,
		.sidebar .enews-widget input[type="submit"]:focus,
		.sidebar .enews-widget input[type="submit"]:hover,
		.home #genesis-content > div:not(.home-welcome) .button:focus,
		.home #genesis-content > div:not(.home-welcome) .button:hover,
		body:not(.home) .button:focus,
		body:not(.home) .button:hover,
		button:not([id*="slick-"]):not([class*="gs-faq__question"]):focus,
		button:not([id*="slick-"]):not([class*="gs-faq__question"]):hover,
		input[type="button"]:focus,
		input[type="button"]:hover,
		input[type="reset"]:focus,
		input[type="reset"]:hover,
		input[type="submit"]:focus,
		input[type="submit"]:hover,
		.home .widget .button:focus,
		.home .widget .button:focus p,
		.home .widget .button:focus p a,
		.home .widget .button:hover,
		.home .widget .button:hover p,
		.home .widget .button:hover p a,
		.content .wp-block-button .wp-block-button__link:hover,
		.content .wp-block-button .wp-block-button__link:focus,
		.gform_wrapper .gform_footer input.button:hover,
		.gform_wrapper .gform_footer input.button:focus {
			background-color: %s !important;
		}

		.wp-block-button .wp-block-button__link:not(.has-background):not(.has-text-color):hover {
		    background-color: %s !important;
			color: %s;
		}

		/* Outline Buttons */
		.wp-block-button.is-style-outline .wp-block-button__link:not(.has-background):not(.has-text-color):hover,
		.wp-block-button.is-style-outline .wp-block-button__link.has-linksbuttons-background-color:hover {
			background-color: %s !important;
		    border-color: %s !important;
			color: #fff !important;
		}

		.home .site-header.sticky.scrolled .genesis-nav-menu .current-menu-item > a > span,
		body:not(.home) .site-header .genesis-nav-menu .current-menu-item > a > span,
		.home .site-header.sticky.scrolled .genesis-nav-menu .current-menu-parent > a > span,
		body:not(.home) .site-header .genesis-nav-menu .current-menu-parent > a > span,
		.home .site-header.sticky.scrolled .genesis-nav-menu a:focus > span,
		body:not(.home) .site-header .genesis-nav-menu a:focus > span,
		.home .site-header.sticky.scrolled .genesis-nav-menu a:hover > span,
		body:not(.home) .site-header .genesis-nav-menu a:hover > span,
		.site-footer a:focus,
		.site-footer a:hover {
			border-bottom-color: %s !important;
		}

		.front-page-testimonials .testimonial-author-img img {
			border-color: %s !important;
		}

		#menu-social-menu li > a:focus svg,
		#menu-social-menu li > a:hover svg {
			fill: %s !important;
		}',
		get_course_maker_theme_colors( 'hover' ),
		get_course_maker_theme_colors( 'hover' ),
		get_course_maker_theme_colors( 'hover' ),
		course_maker_color_contrast( get_course_maker_theme_colors( 'hover' ) ),
		get_course_maker_theme_colors( 'hover' ),
		get_course_maker_theme_colors( 'hover' ),
		get_course_maker_theme_colors( 'hover' ),
		get_course_maker_theme_colors( 'hover' ),
		get_course_maker_theme_colors( 'hover' )
	);

	/* NAV TEXT
	------------------------------------------------------------------------- */
	$css .= sprintf( '
		/* ---------- NAV TEXT ---------- */
		.has-navtext-color,
		#menu-social-menu li,
		#menu-social-menu li > a:focus,
		#menu-social-menu li > a:hover,
		.home .site-header.sticky.scrolled .genesis-nav-menu a,
		body:not(.home) .site-header .genesis-nav-menu a,
		.footer-widgets .footer-widgets-1 a,
		.footer-widgets .widget-area a.button,
		.site-footer,
		.site-footer a,
		.body.home .site-header.sticky.scrolled .site-description,
		.body.home .site-header:not(.sticky) .site-description,
		.body:not(.home) .site-header .site-description,
		site-footer .genesis-nav-menu a {
			color: %s !important;
		}

		.site-footer a {
			border-bottom-color: %s !important;
		}

		.has-navtext-background-color {
			background-color: %s !important;
		}
		',
		get_course_maker_theme_colors( 'navtext' ),
		get_course_maker_theme_colors( 'navtext' ),
		get_course_maker_theme_colors( 'navtext' )
	);

	/* HEADER BG
	------------------------------------------------------------------------- */
	$css .= sprintf( '
		/* ---------- HEADER BG ---------- */
		.has-headerbg-color {
			color: %s !important;
		}

		.has-headerbg-background-color,
		.home .site-header:not(.sticky),
		.home .site-header.sticky.scrolled,
		body:not(.home) .site-header {
			background-color: %s !important;
		}

		@media screen and (max-width: 1024px) {
			.home .site-header {
				background-color: %s !important;
			}
		}',
		get_course_maker_theme_colors( 'headerbg' ),
		get_course_maker_theme_colors( 'headerbg' ),
		get_course_maker_theme_colors( 'headerbg' )
	);

	/* FOOTER BG
	------------------------------------------------------------------------- */
	$css .= sprintf( '
		/* ---------- FOOTER BG ---------- */
		.has-footerbg-color {
			color: %s !important;
		}

		.has-footerbg-background-color,
		.site-footer {
			background-color: %s !important;
		}
		',
		get_course_maker_theme_colors( 'footerbg' ),
		get_course_maker_theme_colors( 'footerbg' )
	);

	/* WHITE
	------------------------------------------------------------------------- */
	$css .= sprintf( '
		/* ---------- WHITE ---------- */
		.has-white-color {
			color: %s !important;
		}

		.has-white-background-color {
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
		.has-gray-color {
			color: %s !important;
		}

		.has-gray-background-color {
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
		.has-darkgray-color {
			color: %s !important;
		}

		.has-darkgray-background-color {
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
		.has-black-color {
			color: %s !important;
		}

		.has-black-background-color {
			 background-color: %s !important;
		}
	',
	get_course_maker_theme_colors( 'black' ),
	get_course_maker_theme_colors( 'black' )
	);

	/* OUTPUT INLINE STYLES IF NEEDED */
	if ( $css ) {
		wp_add_inline_style( CHILD_THEME_HANDLE . '-colors-styles', $css );
	}

}
