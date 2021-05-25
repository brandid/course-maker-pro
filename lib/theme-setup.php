<?php
/**
 * Loads theme setup for the Course Maker Pro theme.
 *
 * @since 2.0
 *
 * @package Course Maker Pro
 */

add_action( 'after_setup_theme', 'course_maker_theme_support', 9 );
/**
 * Adds theme supports.
 */
function course_maker_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_action( 'after_switch_theme', 'course_maker_set_genesis_defaults' );
/**
 * Sets Genesis defaults.
 */
function course_maker_set_genesis_defaults() {

	if ( ! function_exists( 'genesis_update_settings' ) ) {
		return;
	}

	$settings = array(
		'content_archive_thumbnail' => 1,  // Show the blog post Featured Images.
		'comments_posts'            => 1,  // Enable comments on Posts.
		'comments_pages'            => 1,  // Enable comments on Pages.
	);

	genesis_update_settings( $settings );

}

// * Use the search form from WordPress core
remove_filter( 'get_search_form', 'genesis_search_form' );

add_filter( 'genesis_attr_site-header', 'course_maker_stickynav_class' );
/**
 * Adds a CSS class to the site-header element, if the sticky header is enabled.
 *
 * @param array $attributes An array of attributes containing the CSS classes.
 * @return array A modified array of classes.
 */
function course_maker_stickynav_class( $attributes ) {
	$sticky_header       = get_theme_mod( 'sticky_header', true );
	$attributes['class'] = ( ! $sticky_header ? $attributes['class'] : $attributes['class'] . ' sticky' );
	return $attributes;
}

/**
 * Creates a new 'Social' nav menu, assigns it to the 'secondary' location, and adds Custom Link menu items
 *
 * @param string $content The page content.
 * @param string $imported_post_ids The imported Post IDs.
 */
function course_maker_create_secondary_menu( $content, $imported_post_ids ) {

	$name = 'Social Menu';

	$menu_exists = wp_get_nav_menu_object( $name );

	// Check if Footer menu exists.
	if ( ! $menu_exists ) {

		// Create the new menu.
		$menu_id = wp_create_nav_menu( $name );

		// Assign the menu to the 'secondary' location.
		set_theme_mod( 'nav_menu_locations', array( 'secondary' => $menu_id ) );

		// Add new menu items.
		wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-type'   => 'custom',
				'menu-item-title'  => 'Twitter',
				'menu-item-url'    => 'https://twitter.com',
				'menu-item-target' => '_blank',
				'menu-item-status' => 'publish',
			)
		);

		wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-type'   => 'custom',
				'menu-item-title'  => 'Facebook',
				'menu-item-url'    => 'https://facebook.com',
				'menu-item-target' => '_blank',
				'menu-item-status' => 'publish',
			)
		);

		wp_update_nav_menu_item(
			$menu_id,
			0,
			array(
				'menu-item-type'   => 'custom',
				'menu-item-title'  => 'Instagram',
				'menu-item-url'    => 'https://instagram.com',
				'menu-item-target' => '_blank',
				'menu-item-status' => 'publish',
			)
		);

	}

}

// * Add Image Sizes
add_image_size( 'featured-image', 720, 400, true );
add_image_size( 'featured-article', 800, 800, true );

add_filter( 'image_size_names_choose', 'course_maker_show_custom_image_sizes' );
/**
 * Adds new image sizes to the image size dropdown
 *
 * @param array $sizes An array of image sizes.
 * @return array A modified array of image sizes.
 */
function course_maker_show_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array( 'featured-image' => __( 'Featured Image', 'coursemaker' ) ) );
}

// * Add support for 'Genesis Connect for WooCommerce' plugin
add_theme_support( 'genesis-connect-woocommerce' );

// * Enable Shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

// * Removes secondary sidebar
unregister_sidebar( 'sidebar-alt' );

// * Remove layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

/**
 * Adds custom body classes
 *
 * @param array $classes An array of body classes.
 * @return array A modified array of body classes.
 */
function course_maker_body_classes( $classes ) {

	is_front_page() ? $classes[] = 'home' : null;
	wp_is_mobile() ? $classes[]  = 'mobile' : null;

	return $classes;
}
add_filter( 'body_class', 'course_maker_body_classes' );

add_filter( 'genesis_customizer_theme_settings_config', 'course_maker_remove_customizer_settings' );
/**
 * Removes header and front page breadcrumb settings in the Customizer.
 *
 * @param array $config An array of configuration options.
 * @return array A modified array of configuration options.
 */
function course_maker_remove_customizer_settings( $config ) {
	unset( $config['genesis']['sections']['genesis_header'] );
	unset( $config['genesis']['sections']['genesis_breadcrumbs']['controls']['breadcrumb_front_page'] );
	return $config;
}

add_filter( 'genesis_site_title', 'course_maker_custom_logo', 0 );
/**
 * Displays the custom logo if the "Show Logo Image" setting is enabled
 */
function course_maker_custom_logo() {
	$site_title_display_setting = get_theme_mod( 'site_title_display' );
	if ( 'display_logo' === $site_title_display_setting ) {
		the_custom_logo();
	}
}

add_filter( 'body_class', 'course_maker_customlogo_body_class' );
/**
 * Adds a custom body class if a custom logo is used.
 *
 * @param array $classes An array of body classes.
 * @return array A modified array of body classes.
 */
function course_maker_customlogo_body_class( $classes ) {

	$site_title_display_setting = get_theme_mod( 'site_title_display' );

	if ( 'display_logo' === $site_title_display_setting ) {

		$hascustomlogo = has_custom_logo();

		$classes[] = ( $hascustomlogo ? 'custom-logo' : null );

		return $classes;

	} else {

		$classes[] = 'text-logo';

		return $classes;

	}
}

add_filter( 'get_custom_logo', 'add_custom_logo' );
/**
 * Filters the custom logo output - add a custom class for the img element.
 *
 * @return string The modified html content.
 */
function add_custom_logo() {

	// Get the image ID.
	$custom_logo_id = get_theme_mod( 'custom_logo' );

	// Get the URL of the image.
	$image_path = wp_get_attachment_image_src( $custom_logo_id )[0];

	// Create the CSS class to assign to the image.
	$custom_class = 'custom-logo';

	// Add a CSS class if the file is an SVG.
	if ( strpos( $image_path, '.svg' ) !== false ) {
		$custom_class .= ' svg';
	}

	// Generate the HTML to output.
	$html = sprintf(
		'<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
		esc_url( home_url( '/' ) ),
		wp_get_attachment_image(
			$custom_logo_id,
			'full',
			false,
			array(
				'class'    => $custom_class,
				'itemprop' => 'logo',
			)
		)
	);

	return $html;
}

/**
 * Remove Genesis Page Templates
 *
 * @author Bill Erickson
 * @link http://www.billerickson.net/remove-genesis-page-templates
 *
 * @param array $page_templates An array of page templates.
 * @return array A modified array of page templates.
 */
function course_maker_remove_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_blog.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'course_maker_remove_genesis_page_templates', 20, 1 );

add_filter( 'wp_nav_menu_items', 'add_login_logout_link', 10, 2 );
/**
 * Adds Login/Logout link to Primary Members menu.
 *
 * @param array $items An array of menu items.
 * @param array $args An array of arguments.
 * @return array A modified array of menu items.
 */
function add_login_logout_link( $items, $args ) {
	if ( 'primary-members' === $args->theme_location ) {
		ob_start();
		// Use the built-in WP function to auto login/logout the current user.
		wp_loginout( 'index.php' );
		$loginoutlink = ob_get_contents();
		ob_end_clean();
		$items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page login">' . $loginoutlink . '</li>';
	}
	return $items;
}

add_filter( 'wp_nav_menu_args', 'course_maker_secondary_menu_args' );
/**
 * Reduces the secondary navigation menu to one level depth.
 *
 * @param array $args An array of arguments.
 * @return array A modified array of arguments.
 */
function course_maker_secondary_menu_args( $args ) {

	if ( 'secondary' !== $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

// * Remove Header Right widget area
unregister_sidebar( 'header-right' );

// * Remove the primary navigation menu from its default location
remove_action( 'genesis_after_header', 'genesis_do_nav' );

/**
 * Displays the menu assigned to primary-members theme location
 */
function course_maker_do_members_nav() {

	// * Do nothing if menu not supported
	if ( ! genesis_nav_menu_supported( 'primary-members' ) || ! has_nav_menu( 'primary-members' ) ) {
		return;
	}

	// * Assign CSS classes to navigation
	$class = 'menu genesis-nav-menu menu-primary members';

	if ( genesis_a11y( 'headings' ) ) {
		printf( '<h2 class="screen-reader-text">%s</h2>', esc_html__( 'Main navigation', 'coursemaker' ) );
	}

	genesis_nav_menu(
		array(
			'theme_location' => 'primary-members',
			'menu_class'     => $class,
		)
	);

}

// * Add typical attributes for primary-members navigation elements.
add_filter( 'genesis_attr_nav-primary-members', 'course_maker_attr_nav_primary' );
function course_maker_attr_nav_primary( $attributes ) {
	$attributes['itemscope'] = true;
	$attributes['itemtype']  = 'https://schema.org/SiteNavigationElement';

	return $attributes;
}

// * Add ID markup to the primary-members elements to jump to
add_filter( 'genesis_attr_nav-primary-members', 'genesis_skiplinks_attr_nav_primary' );

add_action( 'genesis_before_header', 'course_maker_conditional_primary_nav' );
/**
 * Displays the Members or Default nav menu
 */
function course_maker_conditional_primary_nav() {
	// If user is logged in and primary-members menu location is populated, show that menu.
	// Otherwise, show the menu assigned to primary location.
	if ( is_user_logged_in() && has_nav_menu( 'primary-members' ) ) {
		add_action( 'genesis_header', 'course_maker_do_members_nav' );
	} else {
		add_action( 'genesis_header', 'genesis_do_nav' );
	}
}

add_filter( 'genesis_author_box_gravatar_size', 'course_maker_author_box_gravatar' );
/**
 * Modifies the size of the Gravatar in the author box.
 *
 * @param int $size Size of the avatar.
 * @return int The modified size of the avatar.
 */
function course_maker_author_box_gravatar( $size ) {
	return 90;
}

add_filter( 'genesis_comment_list_args', 'course_maker_comments_gravatar' );
/**
 * Modifies the size of the Gravatar in the entry comments.
 *
 * @param array $args Array containing the size of the avatar.
 * @return array The modified array.
 */
function course_maker_comments_gravatar( $args ) {
	$args['avatar_size'] = 60;
	return $args;
}

// Use the search form from WordPress core.
remove_filter( 'get_search_form', 'genesis_search_form' );

// Move the secondary sidebar within content-sidebar-wrap for flexbox.
remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );
add_action( 'genesis_after_content', 'genesis_get_sidebar_alt' );

add_filter( 'genesis_post_info', 'course_maker_post_info_filter' );
/**
 * Modifies the entry meta text in the entry header.
 *
 * @param string $post_info The entry meta text.
 * @return string The modified text.
 */
function course_maker_post_info_filter( $post_info ) {

	if ( is_singular( 'post' ) ) {
		$post_info = '[post_date] by [post_author_posts_link_outside_loop] [post_comments] [post_edit]';
	} else {
		$post_info = '[post_date] by [post_author_posts_link] [post_comments] [post_edit]';
	}

	return $post_info;

}

// Output the Author posts link, outside the loop.
add_shortcode( 'post_author_posts_link_outside_loop', 'course_maker_post_author_posts_link_shortcode' );
function course_maker_post_author_posts_link_shortcode( $atts ) {

	if ( ! is_singular() ) {
		return;
	}

	$defaults = array();
	$atts = shortcode_atts( $defaults, $atts, 'post_author_posts_link_outside_loop' );

	global $post;
	$author_id = $post->post_author;
	$author = get_the_author_meta( 'display_name', $author_id );
	$url = get_author_posts_url( $author_id );

	if ( genesis_html5() ) {
		$output  = sprintf( '<span %s>', genesis_attr( 'entry-author' ) );
		$output .= sprintf( '<a href="%s" %s>', $url, genesis_attr( 'entry-author-link' ) );
		$output .= sprintf( '<span %s>', genesis_attr( 'entry-author-name' ) );
		$output .= esc_html( $author );
		$output .= '</span></a></span>';
	} else {
		$link   = sprintf( '<a href="%s" rel="author">%s</a>', esc_url( $url ), esc_html( $author ) );
		$output = sprintf( '<span class="author vcard"><span class="fn">%s</span></span>', $link );
	}

	return apply_filters( 'genesis_post_author_posts_link_shortcode', $output, $atts );

}

add_action( 'genesis_after_header', 'course_maker_add_post_info_conditionally' );
/**
 * Adds the post info before the content-sidebar wrap on Posts.
 */
function course_maker_add_post_info_conditionally() {

	// If this is not a post page (single or archive) or is the front page or is the Posts page or an archive page, abort.
	if ( 'post' !== get_post_type() || is_front_page() || is_home() || is_archive() ) {
		return;
	}

	// Add post info before content-sidebar wrap.
	add_action( 'genesis_before_content_sidebar_wrap', 'genesis_post_info', 12 );

}

// Remove built-in custom headline and description to the assigned Posts page.
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );

add_action( 'genesis_before_loop', 'course_maker_do_posts_page_heading' );
/**
 * Adds a custom headline and description to the assigned Posts page.
 */
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

	printf( '<div %s>', esc_attr( genesis_attr( 'posts-page-description' ) ) );

	printf( '<h1 %s>%s</h1>', esc_attr( genesis_attr( 'archive-title' ) ), esc_html( get_the_title( $posts_page ) ) );

	$content = get_post( get_option( 'page_for_posts' ) )->post_content;

	if ( $content ) {
		echo '<div class="blog-intro">' . $content . '</div>'; // phpcs:ignore
	}
	echo '</div>';

}

add_action( 'genesis_before_entry', 'course_maker_remove_conditional_post_titles' );
/**
 * Removes the entry title.
 */
function course_maker_remove_conditional_post_titles() {

	// if this is the Posts page or uses Blog Page Template, abort.
	if ( is_home() || is_page_template( 'page_blog.php' ) || is_archive() ) {
		return;
	}

	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

}

add_action( 'genesis_after_header', 'course_maker_conditional_post_titles' );
/**
 * Adds the entry title outside the content area.
 */
function course_maker_conditional_post_titles() {

	// If this is the Posts page or uses Blog Page Template or front page  or an archive page, abort.
	if ( is_home() || is_page_template( 'page_blog.php' ) || is_front_page() || is_archive() ) {
		return;
	}

	add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_post_title' );
}

add_action( 'genesis_before_entry', 'course_maker_conditional_post_info' );
/**
 * Removes the post info from its default location.
 */
function course_maker_conditional_post_info() {

	// If this is the Posts page or an archive page, abort.
	if ( is_home() || is_archive() ) {
		return;
	}

	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
}

// Remove Genesis footer.
remove_action( 'genesis_footer', 'genesis_do_footer' );

remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'custom_footer_navmenu', 10 );
/**
 * Repositions the secondary (footer) navigation menu.
 */
function custom_footer_navmenu() {

	echo '</div><div class="footer-subnav"><div class="wrap">';
	genesis_do_subnav();
	echo '</div></div>';
	echo '<div class="wrap credits">';

}

// Default Footer text - show after Footer widgets and menu.
add_action( 'genesis_footer', 'genesis_do_footer' );

// Disable the Yoast schema.
add_filter( 'wpseo_json_ld_output', '__return_false' );
