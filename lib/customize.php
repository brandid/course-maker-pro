<?php
/**
 * Adds the Customizer additions to the Course Maker Pro theme.
 *
 * @package Course Maker Pro
 * @author  brandiD
 * @license GPL-2.0+
 * @link    http://www.coursemaker.wordpress.thebrandid.com
 */

/**
 * Get default link color for Customizer.
 */
function course_maker_customizer_get_default_link_color() {
	return '#878c8a';
}

/**
 * Get default accent color for Customizer.
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

	// * Remove Default "Colors" Customizer Section
	$wp_customize->remove_section( 'colors' );

	// * Remove Default "Background Image" Customizer Section
	$wp_customize->remove_section( 'background_image' );

	global $wp_customize;

	// Add Site Title Display Setting.
	$wp_customize->add_setting(
		'site_title_display',
		array(
			'default'           => 'display_text',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'course_maker_sanitize_select',
		)
	);

	// Add Site Title Display Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'site_title_display',
			array(
				'label'   => esc_html__( 'Site Title Display', 'coursemaker' ),
				'section' => 'title_tagline',
				'type'    => 'select',
				'choices' => array(
					'display_text' => esc_html__( 'Show Title & Tagline', 'coursemaker' ),
					'display_logo' => esc_html__( 'Show Logo Image', 'coursemaker' ),
				),
			)
		)
	);

	// COURSE MAKER PRO SETTINGS.

	// Add Settings Panel.
	$wp_customize->add_section(
		'coursemakerpro_settings',
		array(
			'title'    => __( 'Course Maker Pro Settings', 'coursemaker' ),
			'priority' => 30,
		)
	);

	// Add Sticky Header Setting.
	$wp_customize->add_setting(
		'sticky_header',
		array(
			'default'           => true,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'course_maker_sanitize_checkbox',
		)
	);

	// Add Sticky Header Control.
	$wp_customize->add_control(
		new Course_Maker_Toggle_Control(
			$wp_customize,
			'sticky_header',
			array(
				'label'       => __( 'Sticky Header', 'coursemaker' ),
				'section'     => 'coursemakerpro_settings',
				'settings'    => 'sticky_header',
				'description' => __( 'Enable or Disable the Sticky Header. Turning this ON will keep the header in place while you scroll the page. Turning this OFF will make the header scroll with the rest of the page content. This effect is disabled for mobile devices.', 'coursemaker' ),
			)
		)
	);

	// Add Blog Carousel Setting.
	$wp_customize->add_setting(
		'enable_blog_carousel',
		array(
			'default'           => true,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'course_maker_sanitize_checkbox',
		)
	);

	// Add Blog Carousel Control.
	$wp_customize->add_control(
		new Course_Maker_Toggle_Control(
			$wp_customize,
			'enable_blog_carousel',
			array(
				'label'       => __( 'Blog "Featured Articles" Slider', 'coursemaker' ),
				'section'     => 'coursemakerpro_settings',
				'settings'    => 'enable_blog_carousel',
				'description' => __( 'Enable or Disable the Featured Articles Carousel Slider on the Blog Archive pages.', 'coursemaker' ),
			)
		)
	);

	// Add Blog Categories List Setting.
	$wp_customize->add_setting(
		'enable_blog_categories',
		array(
			'default'           => true,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'course_maker_sanitize_checkbox',
		)
	);

	// Add Blog Categories List Control.
	$wp_customize->add_control(
		new Course_Maker_Toggle_Control(
			$wp_customize,
			'enable_blog_categories',
			array(
				'label'       => __( 'Blog Categories List', 'coursemaker' ),
				'section'     => 'coursemakerpro_settings',
				'settings'    => 'enable_blog_categories',
				'description' => __( 'Enable or Disable the list of Blog Categories on Archive pages.', 'coursemaker' ),
			)
		)
	);

	if ( is_plugin_active( 'lifterlms/lifterlms.php' ) ) {

		// Add Default Lifter Styles Setting.
		$wp_customize->add_setting(
			'force_llms_default_styles',
			array(
				'default'           => false,
				'type'              => 'theme_mod',
				'sanitize_callback' => 'course_maker_sanitize_checkbox',
			)
		);

		// Add Default Lifter Styles Control.
		$wp_customize->add_control(
			new Course_Maker_Toggle_Control(
				$wp_customize,
				'force_llms_default_styles',
				array(
					'label'       => __( 'LifterLMS: Use Default Styles', 'coursemaker' ),
					'section'     => 'coursemakerpro_settings',
					'settings'    => 'force_llms_default_styles',
					'description' => __( 'Disable custom LifterLMS CSS and use the default styles.', 'coursemaker' ),
				)
			)
		);

	}

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
function course_maker_sanitize_select( $input, $setting ) {

	// The input var must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
	$input = sanitize_key( $input );

	// Get the list of possible select options.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// Return the input if it is valid, else return the default option.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}
