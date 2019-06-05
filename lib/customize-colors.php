<?php
/**
 * Loads customizer colors for Course Maker theme.
 *
 * @since 1.0.0
 *
 * @package Course Maker Pro
 */
function scheme_custom_default_colors() {
	// Defaults
	$colors['accentcolor'] = '#616e63';		// Main Accent Color
	$colors['linksbuttons'] = '#8e9492';	// Text Links / Buttons
	$colors['hover'] = '#4c4d50';			// Text / Button Hover
	$colors['navtext'] = '#717875';			// Navigation Text in Header / Footer
	$colors['headerbg'] = '#e6e5e3';		// Header BG
	$colors['footerbg'] = '#f2f1ef';		// Footer BG
	return $colors;
}

/**
 * Get default colors for color schemes
 */
function get_color_defaults( $scheme, $color ) {

	$colorscheme_num = $scheme;

	$scheme_custom_default_colors = scheme_custom_default_colors();

	$color_default = '';

	if ( 'custom' === $colorscheme_num ) {

		// Custom
		switch ($color) {
			case 'accentcolor':
				$color_default = $scheme_custom_default_colors['accentcolor'];
				break;
			case 'linksbuttons':
				$color_default = $scheme_custom_default_colors['linksbuttons'];
				break;
			case 'navtext':
				$color_default = $scheme_custom_default_colors['navtext'];
				break;
			case 'hover':
				$color_default = $scheme_custom_default_colors['hover'];
				break;
			case 'headerbg':
				$color_default = $scheme_custom_default_colors['headerbg'] ;
				break;
			case 'footerbg':
				$color_default = $scheme_custom_default_colors['footerbg'];
				break;
			default:
				$color_default = '';
				break;
		}

	}

	// return default colorX for this scheme
	return $color_default;
}

add_action( 'customize_register', 'course_maker_color_settings' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function course_maker_color_settings() {

	global $wp_customize;

	// 'COLOR OPTIONS' SECTION
	$wp_customize->add_section( 'color_options_section', array(
		'title' => __( 'Color Scheme', 'course-maker' ),
		'priority' => 40,
	));

	/* COLOR SCHEME
	========================================================================= */

	/* Main Accent Color
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting( 'course_maker_theme_accentcolor_setting', array(
		'default' => get_color_defaults( 'custom','accentcolor' ), // accentcolor
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_accentcolor_setting',
			array(
				'label'       => __( 'Main Accent Color', 'course-maker' ),
				'section'     => 'color_options_section',
				'settings'    => 'course_maker_theme_accentcolor_setting',
			)
		)
	);

	/* Navigation Text
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting( 'course_maker_theme_navtext_setting', array(
		'default' => get_color_defaults( 'custom','navtext' ), // navtext
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_navtext_setting',
			array(
				'label'       => __( 'Navigation Text in Header / Footer', 'course-maker' ),
				'section'     => 'color_options_section',
				'settings'    => 'course_maker_theme_navtext_setting',
			)
		)
	);

	/* Links / Buttons
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting( 'course_maker_theme_linksbuttons_setting', array(
		'default' => get_color_defaults( 'custom','linksbuttons' ), // linksbuttons
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_linksbuttons_setting',
			array(
				'label'       => __( 'Text Links / Buttons', 'course-maker' ),
				'section'     => 'color_options_section',
				'settings'    => 'course_maker_theme_linksbuttons_setting',
			)
		)
	);

	/* Hover Color
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting( 'course_maker_theme_hover_setting', array(
		'default' => get_color_defaults( 'custom','hover' ), // hover
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_hover_setting',
			array(
				'label'       => __( 'Text Links / Buttons Hover', 'course-maker' ),
				'section'     => 'color_options_section',
				'settings'    => 'course_maker_theme_hover_setting',
			)
		)
	);

	/* Header BG
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting( 'course_maker_theme_headerbg_setting', array(
		'default' => get_color_defaults( 'custom','headerbg' ), // headerbg
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_headerbg_setting',
			array(
				'label'       => __( 'Header Background', 'course-maker' ),
				'section'     => 'color_options_section',
				'settings'    => 'course_maker_theme_headerbg_setting',
			)
		)
	);

	/* Footer BG
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting( 'course_maker_theme_footerbg_setting', array(
		'default' => get_color_defaults( 'custom','footerbg' ), // footerbg
		'sanitize_callback' => 'sanitize_hex_color',
	));

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_footerbg_setting',
			array(
				'label'       => __( 'Footer Background', 'course-maker' ),
				'section'     => 'color_options_section',
				'settings'    => 'course_maker_theme_footerbg_setting',
			)
		)
	);

}
