<?php
/**
* Loads theme setup for Course Maker theme.
*
* @since 2.0
*
* @package Course Maker Pro
*/

//* Add theme supports
add_action( 'after_setup_theme', 'course_maker_theme_support', 9 );
function course_maker_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

//* Set Genesis Defaults
add_action( 'after_switch_theme', 'course_maker_set_genesis_defaults' );
function course_maker_set_genesis_defaults() {

	if ( ! function_exists( 'genesis_update_settings' ) ) {
		return;
	}

	$settings = array(
		'content_archive_thumbnail' => 1,	// Show blog post Featured Images
	);

	genesis_update_settings( $settings );

}

//* Use the search form from WordPress core
remove_filter( 'get_search_form', 'genesis_search_form' );

//* If Sticky Nav is not disabled, add a CSS class to the site-header element
add_filter( 'genesis_attr_site-header', 'course_maker_stickynav_class' );
function course_maker_stickynav_class( $attributes ) {
	$sticky_header = get_theme_mod( 'sticky_header', true );
	$attributes['class'] = ( !$sticky_header ? $attributes['class'] : $attributes['class'] . ' sticky' );
	return $attributes;
}

//* Make a new 'Social' nav menu, assign to the 'secondary' location, and add Custom Link menu items
function course_maker_create_secondary_menu( $content, $imported_post_ids ) {

	$name = 'Social Menu';

	$menu_exists = wp_get_nav_menu_object( $name );

	// Check if Footer menu exists
    if ( !$menu_exists ) {

		// Create the new menu
    	$menu_id = wp_create_nav_menu( $name );

		// Assign the menu to the 'secondary' location
		set_theme_mod( 'nav_menu_locations', array( 'secondary' => $menu_id ) );

		// Add new menu items
		wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-type' => 'custom',
				'menu-item-title' => 'Twitter',
				'menu-item-url' => 'https://twitter.com',
				'menu-item-target' => '_blank',
				'menu-item-status' => 'publish'
			)
		);

		wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-type' => 'custom',
				'menu-item-title' => 'Facebook',
				'menu-item-url' => 'https://facebook.com',
				'menu-item-target' => '_blank',
				'menu-item-status' => 'publish'
			)
		);

		wp_update_nav_menu_item( $menu_id, 0, array(
				'menu-item-type' => 'custom',
				'menu-item-title' => 'Instagram',
				'menu-item-url' => 'https://instagram.com',
				'menu-item-target' => '_blank',
				'menu-item-status' => 'publish'
			)
		);

	}

}

//* Add Image Sizes
add_image_size( 'featured-image', 720, 400, true );
add_image_size( 'featured-article', 800, 800, true );

//* Add new image sizes to the image size dropdown
add_filter( 'image_size_names_choose', 'course_maker_show_custom_image_sizes' );
function course_maker_show_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array( 'featured-image' => __( 'Featured Image', 'coursemaker' ) ) );
}

//* Add support for 'Genesis Connect for WooCommerce' plugin
add_theme_support( 'genesis-connect-woocommerce' );

//* Enable Shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

//* Removes header right widget area
unregister_sidebar( 'header-right' );

//* Removes secondary sidebar
unregister_sidebar( 'sidebar-alt' );

//* Remove layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

//* Add custom body classes
function course_maker_body_classes( $classes ) {

	is_front_page() ? $classes[] = 'home' : null;
	wp_is_mobile() ? $classes[] = 'mobile' : null;

	return $classes;
}
add_filter( 'body_class', 'course_maker_body_classes' );

/**
 * Remove the blog page settings metabox from the Genesis Theme Settings
 * Desired if following the suggestion by Bill Erickson to not use the Blog page template
 * that comes standard in the Genesis Theme
 *
 * @link    http://www.billerickson.net/dont-use-genesis-blog-template/
 */
function course_maker_remove_unwanted_genesis_metaboxes() {

}
add_action( 'toplevel_page_genesis_settings_page_boxes', 'course_maker_remove_unwanted_genesis_metaboxes' );

//* Remove header and front page breadcrumb settings in the Customizer.
add_filter( 'genesis_customizer_theme_settings_config', 'course_maker_remove_customizer_settings' );
function course_maker_remove_customizer_settings( $config ) {
	unset( $config['genesis']['sections']['genesis_header'] );
	unset( $config['genesis']['sections']['genesis_breadcrumbs']['controls']['breadcrumb_front_page'] );
	return $config;
}

//* If the Customizer setting is set to: "Show Logo Image", then display the custom logo.
add_filter( 'genesis_site_title', 'course_maker_custom_logo', 0 );
function course_maker_custom_logo() {
	$siteTitleDisplaySetting = get_theme_mod("site_title_display");
	if ( "display_logo" === $siteTitleDisplaySetting ) {
		the_custom_logo();
	}
}

//* Adds a custom body class if a custom logo is used.
add_filter( 'body_class', 'course_maker_customlogo_body_class' );
function course_maker_customlogo_body_class( $classes ) {

	$siteTitleDisplaySetting = get_theme_mod( "site_title_display" );

	if ( "display_logo" === $siteTitleDisplaySetting ) {

	    $hascustomlogo = has_custom_logo();

	    $classes[] = ( $hascustomlogo ? 'custom-logo' : null );

	    return $classes;

	} else {

		$classes[] = 'text-logo';

	    return $classes;

	}
}

//* Filter the custom logo output - add a custom class for the img element.
add_filter( 'get_custom_logo', 'add_custom_logo' );
function add_custom_logo() {

	// Get image ID
	$custom_logo_id = get_theme_mod( 'custom_logo' );

	// Get URL of image
	$imagePath = wp_get_attachment_image_src( $custom_logo_id )[0];

	// Create CSS class to assign to image
	$customClass = 'custom-logo';

	// Add SVG class if file is SVG
	if ( strpos( $imagePath, '.svg' ) !== false ) {
	    $customClass .= ' svg';
	}

	// Generate HTML to output
	$html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
		esc_url( home_url( '/' ) ),
		wp_get_attachment_image( $custom_logo_id, 'full', false, array(
			'class'    => $customClass,
			'itemprop' => 'logo',
		) )
	);

	// Output
	return $html;
}

/**
* Remove Genesis Page Templates
*
* @author Bill Erickson
* @link http://www.billerickson.net/remove-genesis-page-templates
*
* @param array $page_templates
* @return array
*/
function course_maker_remove_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_blog.php'] );
	//unset( $page_templates['page_archive.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'course_maker_remove_genesis_page_templates', 20, 1 );

//* Add Login/Logout link to Primary Members menu
add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
function add_login_logout_link($items, $args) {
	if ( $args->theme_location == 'primary-members') {
		ob_start();
		wp_loginout('index.php');	// built-in WP function to auto login/logout user
		$loginoutlink = ob_get_contents();
		ob_end_clean();
		$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page login">'. $loginoutlink .'</li>';
	}
	return $items;
}

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'course_maker_secondary_menu_args' );
function course_maker_secondary_menu_args( $args ) {

	if ( 'secondary' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

//* Remove Header Right widget area
unregister_sidebar( 'header-right' );

//* Remove the primary navigation menu from its default location
remove_action( 'genesis_after_header', 'genesis_do_nav' );

//* Function to echo menu assigned to primary-members theme location
function course_maker_do_members_nav() {

	//* Do nothing if menu not supported
	if ( ! genesis_nav_menu_supported( 'primary-members' ) || ! has_nav_menu( 'primary-members' ) )
		return;

	//* Assign CSS classes to navigation
	$class = 'menu genesis-nav-menu menu-primary members';

	if ( genesis_a11y( 'headings' ) ) {
		printf( '<h2 class="screen-reader-text">%s</h2>', __( 'Main navigation', 'genesis' ) );
	}

	genesis_nav_menu( array(
		'theme_location' => 'primary-members',
		'menu_class'     => $class,
	) );

}

//* Add typical attributes for primary-members navigation elements.
add_filter( 'genesis_attr_nav-primary-members', 'genesis_attributes_nav' );

//* Add ID markup to the primary-members elements to jump to
add_filter( 'genesis_attr_nav-primary-members', 'genesis_skiplinks_attr_nav_primary' );

//* Conditional nav menu display
add_action( 'genesis_before_header', 'course_maker_conditional_primary_nav' );
function course_maker_conditional_primary_nav() {
	// If user is logged in and primary-members menu location is populated, show that menu.
	// Otherwise, show the menu assigned to primary location
	if ( is_user_logged_in() && has_nav_menu( 'primary-members' ) ) {
		add_action( 'genesis_header', 'course_maker_do_members_nav' );
	} else {
		add_action( 'genesis_header', 'genesis_do_nav' );
	}
}

//* Modify size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'course_maker_author_box_gravatar' );
function course_maker_author_box_gravatar( $size ) {
	return 90;
}

//* Modify size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'course_maker_comments_gravatar' );
function course_maker_comments_gravatar( $args ) {
	$args['avatar_size'] = 60;
	return $args;
}

//* Use the search form from WordPress core
remove_filter( 'get_search_form', 'genesis_search_form' );

//* Move the secondary sidebar within content-sidebar-wrap for flexbox
remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );
add_action( 'genesis_after_content','genesis_get_sidebar_alt' );

//* Customize entry meta in the entry header
add_filter( 'genesis_post_info', 'course_maker_post_info_filter' );
function course_maker_post_info_filter( $post_info ) {

	if ( is_singular( 'post' ) ) {
		$post_info = '[post_date] by [post_author_posts_link_outside_loop] [post_comments] [post_edit]';
	} else {
		$post_info = '[post_date] by [post_author_posts_link] [post_comments] [post_edit]';
	}

	return $post_info;

}

//* Add post info before content-sidebar wrap for posts
add_action( 'genesis_after_header', 'course_maker_add_post_info_conditionally' );
function course_maker_add_post_info_conditionally() {

	// if this is not a post page (single or archive) or is the front page or is the Posts page or an archive page, abort.
	if ( 'post' != get_post_type() || is_front_page() || is_home() || is_archive() ) {
		return;
	}

	// add post info before content-sidebar wrap
	add_action( 'genesis_before_content_sidebar_wrap', 'genesis_post_info', 12 );

}

//* Remove built-in custom headline and description to assigned posts page
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );

//* Add custom headline and description to assigned posts page
add_action( 'genesis_before_loop', 'course_maker_do_posts_page_heading' );
function course_maker_do_posts_page_heading() {

	if ( ! genesis_a11y( 'headings' ) ) {
		return;
	}

	$posts_page = get_option( 'page_for_posts' );

	if ( is_null( $posts_page ) ) {
		return;
	}

	if ( ! is_home() || genesis_is_root_page() ) {
		return;
	}

	printf( '<div %s>', genesis_attr( 'posts-page-description' ) );
		printf( '<h1 %s>%s</h1>', genesis_attr( 'archive-title' ), get_the_title( $posts_page ) );

		$content = get_post( get_option( 'page_for_posts' ) )->post_content;

		if ( $content ) {
			echo '<div class="blog-intro">' . wpautop( $content ) . '</div>';
		}
	echo '</div>';

}

//* Remove entry title
add_action( 'genesis_before_entry', 'course_maker_remove_conditional_post_titles' );
function course_maker_remove_conditional_post_titles() {

	// if this is the Posts page or uses Blog Page Template, abort.
	if ( is_home() || is_page_template( 'page_blog.php' ) || is_archive() ) {
		return;
	}

	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

}

//* Add entry title outside content area
add_action( 'genesis_after_header', 'course_maker_conditional_post_titles' );
function course_maker_conditional_post_titles() {

	// if this is the Posts page or uses Blog Page Template or front page  or an archive page, abort.
	if ( is_home() || is_page_template( 'page_blog.php' ) || is_front_page() || is_archive() ) {
		return;
	}

	add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_post_title' );
}

//* Remove post info from its default location
add_action( 'genesis_before_entry', 'course_maker_conditional_post_info' );
function course_maker_conditional_post_info() {

	// if this is the Posts page or an archive page, abort.
	if ( is_home() || is_archive() ) {
		return;
	}

	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
}

//* Remove Genesis footer
remove_action( 'genesis_footer', 'genesis_do_footer' );

//* Reposition the secondary (footer) navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'custom_footer_navmenu', 10 );
function custom_footer_navmenu(){

	echo '</div><div class="footer-subnav"><div class="wrap">';
	genesis_do_subnav();
	echo '</div></div>';
	echo '<div class="wrap credits">';

}

//* Default Footer text - show after Footer widgets and menu
add_action( 'genesis_footer', 'genesis_do_footer' );
