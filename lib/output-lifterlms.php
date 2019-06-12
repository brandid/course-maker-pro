<?php
/**
* Custom LifterLMS functions for Course Maker theme.
*
* @package Course Maker Pro
*/

//* If 'Course Sidebar' has widgets, change body class on LifterLMS Course Catalog page
add_filter( 'body_class', 'course_maker_lifterlms_sidebar_body_class', 90 );
function course_maker_lifterlms_sidebar_body_class( $classes ) {

    // If this is the LifterLMS Course Catalog page
    if ( is_courses() ) {

        $classes[] = 'lifterlms-course-catalog';

        // If the 'Course Sidebar' is active
        if ( is_active_sidebar( 'llms_course_widgets_side' ) ) {

            // Class to remove
            $class_delete = array('full-width-content');

            // Loop through all body classes
            foreach ( $classes as $class_css_key => $class_css ) {

                // If $class_delete is in the array of body classes
                if ( in_array( $class_css, $class_delete ) ) {

                    // Remove it from the array of body classes
                    unset( $classes[$class_css_key] );

                }

            }

            // Add sidebar class to the array of body classes
            $classes[] = 'content-sidebar';

        }

    }

    // Add the extra classes back untouched
    return $classes;

}

//* Enqueue LifterLMS custom styles
add_action( 'wp_enqueue_scripts', 'course_maker_custom_lifterlms_css' );
function course_maker_custom_lifterlms_css() {

    wp_enqueue_style( 'coursemaker-lifterlms-styles', get_stylesheet_directory_uri() . '/css/lifterlms-custom-styles.css' );

}

//* Force LifterLMS elements to use Colors from Customizer
add_action( 'wp_enqueue_scripts', 'course_maker_lifterlms_color_css' );
function course_maker_lifterlms_color_css(){

    $handle = 'course-maker-pro';

	// Load the selected theme colors - from helper-functions.php
	$color = get_course_maker_theme_colors( 'custom' );

	// Get default colors - from customize-colors.php
	$default_color = scheme_custom_default_colors();

    // Function to convert Hex colors to RGBA
    function hex2rgba($color, $opacity = false) {

    	$default = 'rgb(0,0,0)';

    	//Return default if no color provided
    	if ( empty( $color ) ) {
            return $default;
        }

        //Sanitize $color if "#" is provided
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;

    }

	$css = '';

	/* MAIN ACCENT
	------------------------------------------------------------------------- */
	$css .= sprintf('
		/* ---------- MAIN ACCENT ---------- */
        .course .llms-meta-info .llms-meta.llms-course-length p::before,
        .course .llms-meta-info .llms-meta.llms-tracks p::before,
        .course .llms-meta-info .llms-meta.llms-categories p::before,
        .course .llms-meta-info .llms-meta.llms-tags p::before,
        .llms-lesson-preview.is-free .llms-lesson-complete,
        .llms-lesson-preview.is-complete .llms-lesson-complete,
        .llms-notification .llms-notification-aside::before,
        .llms-loop-item-content .llms-loop-title:hover,
        .llms-lesson-preview.is-free .llms-lesson-complete,
        .llms-lesson-preview.is-complete .llms-lesson-complete {
			color: %s !important;
		}

        .llms-instructor-info .llms-instructors .llms-author .avatar,
        .llms-progress .progress-bar-complete,
        .llms-lesson-preview .llms-icon-free,
        .llms-access-plan .stamp,
        .llms-access-plan-title,
        .llms-checkout-wrapper .llms-form-heading,
        .llms-sd-widgets .llms-sd-widget .llms-sd-widget-title {
            background-color: %s !important;
        }

        .llms-access-plan-title {
            background-color: %s !important;
            color: %s !important;
        }

        .llms-instructor-info .llms-instructors .llms-author,
        .llms-instructor-info .llms-instructors .llms-author .avatar,
        .llms-lesson-preview:hover,
        .llms-lesson-preview.is-complete .llms-lesson-link,
        .llms-notice,
        .llms-notification,
        .llms-notification .llms-notification-aside::before,
        .llms-access-plan.featured .llms-access-plan-content,
        .llms-access-plan.featured .llms-access-plan-footer,
        .llms-checkout-wrapper form.llms-login,
        .llms-checkout-section {
            border-color: %s !important;
        }

        .llms-notice {
            background-color: %s !important;
        }
        ',
        $color['accentcolor'],
        $color['accentcolor'],
        $color['accentcolor'],
        course_maker_color_contrast( $color['hover'] ),
        $color['accentcolor'],
        hex2rgba($color['accentcolor'], 0.1)
	);

	/* LINKS / BUTTONS
	------------------------------------------------------------------------- */
	$css .= sprintf('
		/* ---------- LINKS / BUTTONS ---------- */
        .llms-button-primary {
            background-color: %s !important;
        }
        ',
		$color['linksbuttons']
	);

	/* HOVER
	------------------------------------------------------------------------- */
	$css .= sprintf( '
		/* ---------- HOVER ---------- */
        .llms-loop-item-content .llms-loop-title:hover {
            color: %s !important;
        }

        .site-inner .wp-block-llms-course-continue-button a.llms-button-primary:hover,
        .site-inner .wp-block-llms-course-continue-button a.llms-button-primary:focus,
        .llms-course-nav .llms-lesson-preview:hover .llms-lesson-link {
            background-color: %s !important;
            color: %s !important;
            border-bottom: none !important;
        }

        .llms-course-nav .llms-lesson-preview .llms-lesson-link,
        .llms-course-nav .llms-lesson-preview.is-complete .llms-lesson-link  {
            border-color: %s !important;
        }

        .llms-course-nav .llms-lesson-preview:hover .llms-lesson-link {
            background-color: %s !important;
        }

        .llms-course-nav .llms-lesson-preview:hover .llms-pre-text,
        .llms-course-nav .llms-lesson-preview:hover .llms-lesson-title {
            color: %s !important;
        }
        ',
		$color['hover'],
        $color['hover'],
        course_maker_color_contrast( $color['hover'] ),
        $color['hover'],
        $color['hover'],
        course_maker_color_contrast( $color['hover'] )
	);

	/* OUTPUT INLINE STYLES */
	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}

}
