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
 */
function course_maker_color_settings() {

	global $wp_customize;

	$appearance = genesis_get_config( 'appearance' );

	// Add 'Color Palette' Section.
	$wp_customize->add_section(
		'color_options_section',
		array(
			'title'    => __( 'Color Palette', 'coursemaker' ),
			'priority' => 40,
		)
	);

	// Add 'Main Accent Color' Setting.
	$wp_customize->add_setting(
		'course_maker_theme_accentcolor_setting',
		array(
			'default'           => $appearance['default-colors']['accent'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add 'Main Accent Color' Control.
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

	// Add 'Navigation Text' Setting.
	$wp_customize->add_setting(
		'course_maker_theme_navtext_setting',
		array(
			'default'           => $appearance['default-colors']['navtext'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add 'Navigation Text' Control.
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

	// Add 'Links/Buttons' Setting.
	$wp_customize->add_setting(
		'course_maker_theme_linksbuttons_setting',
		array(
			'default'           => $appearance['default-colors']['linksbuttons'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add 'Links/Buttons' Control.
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

	// Add 'Hover Color' Setting.
	$wp_customize->add_setting(
		'course_maker_theme_hover_setting',
		array(
			'default'           => $appearance['default-colors']['hover'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add 'Hover Color' Control.
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

	// Add 'Header BG' Setting.
	$wp_customize->add_setting(
		'course_maker_theme_headerbg_setting',
		array(
			'default'           => $appearance['default-colors']['headerbg'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add 'Header BG' Control.
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

	// Add 'Footer BG' Setting.
	$wp_customize->add_setting(
		'course_maker_theme_footerbg_setting',
		array(
			'default'           => $appearance['default-colors']['footerbg'],
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	// Add 'Footer BG' Control.
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
