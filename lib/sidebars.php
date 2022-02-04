<?php
/**
 * Loads the sidebars used in the theme.
 *
 * @since 2.0
 *
 * @package Course Maker Pro
 */

/**
 * Register sidebars for the theme.
 */
function course_maker_register_sidebars() {
	genesis_register_sidebar(
		array(
			'id'            => 'about-sidebar',
			'name'          => __( 'About Sidebar', 'coursemaker' ),
			'description'   => __( 'Sidebar for the About page.', 'coursemaker' ),
			'before_widget' => '<div id="%1$s" class="widget widget-general widget-about %2$s"><div class="widget-wrap">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widgettitle about-widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'init', 'course_maker_register_sidebars' );
