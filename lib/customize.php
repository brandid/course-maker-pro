<?php
/**
 *
 * This file adds the Customizer additions to the Course Maker Theme.
 *
 * @package Course Maker Pro
 * @author  brandiD
 * @license GPL-2.0+
 * @link    http://www.coursemaker.wordpress.thebrandid.com
 */

/**
 * Get default link color for Customizer.
 *
 */
function course_maker_customizer_get_default_link_color() {
	return '#878c8a';
}

/**
 * Get default accent color for Customizer.
 *
 */
function course_maker_customizer_get_default_accent_color() {
	return '#4a6054';
}

add_action( 'customize_register', 'course_maker_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 2.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function course_maker_customizer_register( $wp_customize ) {

	//* Remove Default "Colors" Customizer Section
	$wp_customize->remove_section("colors");

	//* Remove Default "Background Image" Customizer Section
	$wp_customize->remove_section("background_image");

	global $wp_customize;

	/* SITE TITLE DISPLAY
	--------------------------------------------------------------------- */
	$wp_customize->add_setting('site_title_display', array(
			'default'			=> 'display_text',
			'type'				=> 'theme_mod',
			'transport'			=> 'refresh',
			'sanitize_callback' => 'course_maker_sanitize_select',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'site_title_display',
			array(
                'label' => esc_html__( 'Site Title Display', 'coursemaker' ),
                'section' => 'title_tagline',
                'type' => 'select',
                'choices' => array(
                    'display_text' => esc_html__('Show Title & Tagline','coursemaker'),
                    'display_logo' => esc_html__('Show Logo Image','coursemaker')
                )
            )
		)
	);

	/* COURSE MAKER PRO SETTINGS
	------------------------------------------------------------------------- */

	// SETTINGS PANEL
	$wp_customize->add_section('coursemakerpro_settings' , array(
			'title'     => __( 'Course Maker Pro Settings', 'coursemaker' ),
			'priority'  => 30,
	));

	// STICKY HEADER OFF SETTING
	$wp_customize->add_setting('fixed_header_off', array(
			'default'    => false,
			'type'     => 'theme_mod',
			'sanitize_callback' => 'course_maker_sanitize_checkbox',
	));

	// STICKY HEADER OFF CONTROL
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'fixed_header_off',
			array(
				'label'     => __( 'Turn off Sticky Header on Desktop (allow header to scroll)', 'coursemaker' ),
				'section'   => 'coursemakerpro_settings',
				'settings'  => 'fixed_header_off',
				'type'      => 'checkbox',
			)
		)
	);

	// DISABLE BLOG CAROUSEL SETTING
	$wp_customize->add_setting('disable_blog_carousel', array(
			'default'    => false,
			'type'     => 'theme_mod',
			'sanitize_callback' => 'course_maker_sanitize_checkbox',
	));

	// DISABLE BLOG CAROUSEL CONTROL
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'disable_blog_carousel',
			array(
				'label'     => __( 'Disable Featured Articles Carousel', 'coursemaker' ),
				'section'   => 'coursemakerpro_settings',
				'settings'  => 'disable_blog_carousel',
				'type'      => 'checkbox',
			)
		)
	);

}

/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function course_maker_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Select sanitization callback.
 *
 * Sanitization callback for 'select' type controls.
 * This callback sanitizes `$setting` as a string value.
 *
 * @param string $input The selected item.
 * @param string $setting The select element.
 * @return string The sanitized input, or the default value if not clean.
 */
function course_maker_sanitize_select( $input, $setting ){

	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key( $input );

	//get the list of possible select options
	$choices = $setting->manager->get_control( $setting->id )->choices;

	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}
