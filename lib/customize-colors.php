<?php
/**
 * Loads customizer colors for the Course Maker Pro theme.
 *
 * @since 1.0.0
 *
 * @package Course Maker Pro
 */

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

	$appearance = genesis_get_config( 'appearance' );

	// 'COLOR PALETTE' SECTION
	$wp_customize->add_section(
		'color_options_section',
		array(
			'title'    => __( 'Color Palette', 'coursemaker' ),
			'priority' => 40,
		)
	);

	/*
	 COLORS
	========================================================================= */

	/*
	 Main Accent Color
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting(
		'course_maker_theme_accentcolor_setting',
		array(
			'default'           => $appearance['default-colors']['accent'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_accentcolor_setting',
			array(
				'label'    => __( 'Main Accent Color', 'coursemaker' ),
				'section'  => 'color_options_section',
				'settings' => 'course_maker_theme_accentcolor_setting',
			)
		)
	);

	/*
	 Navigation Text
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting(
		'course_maker_theme_navtext_setting',
		array(
			'default'           => $appearance['default-colors']['navtext'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_navtext_setting',
			array(
				'label'    => __( 'Navigation Text in Header / Footer', 'coursemaker' ),
				'section'  => 'color_options_section',
				'settings' => 'course_maker_theme_navtext_setting',
			)
		)
	);

	/*
	 Links / Buttons
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting(
		'course_maker_theme_linksbuttons_setting',
		array(
			'default'           => $appearance['default-colors']['linksbuttons'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_linksbuttons_setting',
			array(
				'label'    => __( 'Text Links / Buttons', 'coursemaker' ),
				'section'  => 'color_options_section',
				'settings' => 'course_maker_theme_linksbuttons_setting',
			)
		)
	);

	/*
	 Hover Color
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting(
		'course_maker_theme_hover_setting',
		array(
			'default'           => $appearance['default-colors']['hover'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_hover_setting',
			array(
				'label'    => __( 'Text Links / Buttons Hover', 'coursemaker' ),
				'section'  => 'color_options_section',
				'settings' => 'course_maker_theme_hover_setting',
			)
		)
	);

	/*
	 Header BG
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting(
		'course_maker_theme_headerbg_setting',
		array(
			'default'           => $appearance['default-colors']['headerbg'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_headerbg_setting',
			array(
				'label'    => __( 'Header Background', 'coursemaker' ),
				'section'  => 'color_options_section',
				'settings' => 'course_maker_theme_headerbg_setting',
			)
		)
	);

	/*
	 Footer BG
	------------------------------------------------------ */
	// setting
	$wp_customize->add_setting(
		'course_maker_theme_footerbg_setting',
		array(
			'default'           => $appearance['default-colors']['footerbg'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'course_maker_theme_footerbg_setting',
			array(
				'label'    => __( 'Footer Background', 'coursemaker' ),
				'section'  => 'color_options_section',
				'settings' => 'course_maker_theme_footerbg_setting',
			)
		)
	);

}
