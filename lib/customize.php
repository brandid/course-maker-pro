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

	/*
	 SITE TITLE DISPLAY
	--------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'site_title_display',
		array(
			'default'           => 'display_text',
			'type'              => 'theme_mod',
			'transport'         => 'refresh',
			'sanitize_callback' => 'course_maker_sanitize_select',
		)
	);

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

	/*
	 COURSE MAKER PRO SETTINGS
	------------------------------------------------------------------------- */

	// SETTINGS PANEL
	$wp_customize->add_section(
		'coursemakerpro_settings',
		array(
			'title'    => __( 'Course Maker Pro Settings', 'coursemaker' ),
			'priority' => 30,
		)
	);

	// STICKY HEADER SETTING
	$wp_customize->add_setting(
		'sticky_header',
		array(
			'default'           => true,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'course_maker_sanitize_checkbox',
		)
	);

	// STICKY HEADER CONTROL
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

	// BLOG CAROUSEL SETTING
	$wp_customize->add_setting(
		'enable_blog_carousel',
		array(
			'default'           => true,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'course_maker_sanitize_checkbox',
		)
	);

	// BLOG CAROUSEL CONTROL
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

	// BLOG CATEGORIES SETTING
	$wp_customize->add_setting(
		'enable_blog_categories',
		array(
			'default'           => true,
			'type'              => 'theme_mod',
			'sanitize_callback' => 'course_maker_sanitize_checkbox',
		)
	);

	// BLOG CATEGORIES CONTROL
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

	// input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key( $input );

	// get the list of possible select options
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

// * On/Off Toggle Switch Controls
if ( class_exists( 'WP_Customize_Control' ) ) {

	class Course_Maker_Toggle_Control extends WP_Customize_Control {

		public $type = 'light';

		public function enqueue() {
			wp_enqueue_style( genesis_get_theme_handle() . '-toggle-control-css', CHILD_THEME_URI . '/includes/course-maker-toggle-control.css', array(), genesis_get_theme_version() );
			$css = '
    			.disabled-control-title {
    				color: #a0a5aa;
    			}
    			input[type=checkbox].tgl-light:checked + .tgl-btn {
    				background: #0085ba;
    			}
    			input[type=checkbox].tgl-light + .tgl-btn {
    			  background: #a0a5aa;
    			}
    			input[type=checkbox].tgl-light + .tgl-btn:after {
    			  background: #f7f7f7;
    			}
    		';
			wp_add_inline_style( genesis_get_theme_handle() . '-toggle-control-inline-css', $css );
		}

		public function render_content() {
			?>
			<label class="customize-control-title">
				<div style="height: 4px; margin: 0;"></div>
				<div style="display:flex;flex-direction: row;justify-content: flex-start;">
					<span class="customize-control-title" style="flex: 2 0 0; vertical-align: middle;"><?php echo esc_html( $this->label ); ?></span>
					<input id="cb<?php echo $this->instance_number; ?>" type="checkbox" class="tgl tgl-<?php echo $this->type; ?>" value="<?php echo esc_attr( $this->value() ); ?>"
											<?php
											$this->link();
											checked( $this->value() );
											?>
					 />
					<label for="cb<?php echo $this->instance_number; ?>" class="tgl-btn"></label>
				</div>
				<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description" style="margin-top: 6px;"><?php echo $this->description; ?></span>
				<?php endif; ?>
				<div style="height: 4px; margin: 0;"></div>
				<hr>
			</label>
			<?php
		}

	}

}
