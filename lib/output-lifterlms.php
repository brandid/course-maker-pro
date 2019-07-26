<?php
/**
* Custom LifterLMS colors for Course Maker theme.
*
* @package Course Maker Pro
*/

//* Force LifterLMS elements to use Colors from Customizer
add_action( 'wp_enqueue_scripts', 'course_maker_lifterlms_color_css' );
function course_maker_lifterlms_color_css(){

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

    $appearance = genesis_get_config( 'appearance' );

    $color_accent = get_theme_mod( 'course_maker_theme_accentcolor_setting', $appearance['default-colors']['accent'] );
	$color_linksbuttons = get_theme_mod( 'course_maker_theme_linksbuttons_setting', $appearance['default-colors']['linksbuttons'] );
	$color_hover = get_theme_mod( 'course_maker_theme_hover_setting', $appearance['default-colors']['hover'] );
    $color_headerbg = get_theme_mod( 'course_maker_theme_headerbg_setting', $appearance['default-colors']['headerbg'] );

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
        .llms-sd-widgets .llms-sd-widget .llms-sd-widget-title,
        .llms-syllabus-wrapper .lessons.grid-style > .llms-lesson-preview > .stripe {
            background-color: %s !important;
        }

        .llms-access-plan-title {
            background-color: %s !important;
            color: %s !important;
        }

        .llms-instructor-info .llms-instructors .llms-author,
        .llms-instructor-info .llms-instructors .llms-author .avatar,
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
        $color_accent,
        $color_accent,
        $color_accent,
        course_maker_color_contrast( $color_accent ),
        $color_accent,
        hex2rgba( $color_accent, 0.1)
	);

	/* LINKS / BUTTONS
	------------------------------------------------------------------------- */
	$css .= sprintf('
		/* ---------- LINKS / BUTTONS ---------- */
        .llms-button-primary {
            background-color: %s !important;
        }
        ',
		$color_linksbuttons
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
        .llms-course-nav .llms-lesson-preview:hover .llms-lesson-title,
        .llms-course-nav .llms-lesson-preview:hover .llms-lesson-excerpt p,
        .llms-course-nav .llms-lesson-preview:hover .llms-extra {
            color: %s !important;
        }
        ',
		$color_hover,
        $color_hover,
        course_maker_color_contrast( $color_hover ),
        $color_hover,
        $color_hover,
        course_maker_color_contrast( $color_hover )
	);

    /* HEADER BG COLOR
    ------------------------------------------------------------------------- */
    $css .= sprintf( '
		/* ---------- HEADER BG COLOR ---------- */
        .llms-syllabus-wrapper > .alignfull {
            background-color: %s !important;
        }
        ',
        $color_headerbg
    );

	/* OUTPUT INLINE STYLES */
	if ( $css ) {
		wp_add_inline_style( genesis_get_theme_handle() . '-lifterlms-styles', $css );
	}

}
