<?php
/**
 * Loads custom Blog functions for the Course Maker Pro theme.
 *
 * @since 2.0
 *
 * @package Course Maker Pro
 */

add_filter( 'genesis_pre_get_option_site_layout', 'course_maker_force_fullwidth_layout' );
/**
 * Forces the site layout option to be full-width.
 *
 * @param object $opt The option to modify.
 * @return string
 */
function course_maker_force_fullwidth_layout( $opt ) {

	if ( is_archive() ) {
		return 'full-width-content';
	}

}

/**
 * Outputs a <ul> list of blog post categories.
 *
 * @return string
 */
function course_maker_output_category_list() {

	// Create an array of arguments.
	$category_args = array(
		'title_li' => '',
		'echo'     => '0',
		'parent'   => 0, // Only show top-level categories.
	);

	// Assign var with all categories.
	$categories = wp_list_categories( $category_args );

	// Get Blog URL.
	$blog_url = get_post_type_archive_link( 'post' );

	// Add 'ALL' item to list of categories.
	$categories .= '<li class="cat-item-all"><a href="' . $blog_url . '">All</a></li>';

	// If 'current-cat' class does not exist in the list of categories.
	if ( strpos( $categories, 'current-cat' ) === false ) {

		// Add the class to the 'All' item.
		$categories = str_replace( 'cat-item-all', 'cat-item-all current-cat', $categories );

	}

	return '<ul class="blog-categories">' . $categories . '</ul>';

}

/**
 * Outputs all posts with "Featured Article" meta data.
 *
 * @return string
 */
function course_maker_show_featured_articles() {

	$args = array(
		'meta_query' => array(
			array(
				'key'     => '_featured_article',
				'value'   => '1',
				'compare' => '=',
			),
		),
	);

	// Create a new WP_Query.
	$featured_article_query = new WP_Query( $args );

	// Exit if no posts are marked as "Featured Articles".
	if ( ! $featured_article_query->have_posts() ) {
		return;
	}

	// Begin Output Buffering.
	ob_start();

	// Open the featured articles content container.
	echo '<div class="featured-articles">';

	if ( $featured_article_query->have_posts() ) {

		while ( $featured_article_query->have_posts() ) {

			$featured_article_query->the_post();

			$post_id = get_the_ID();

			// Get attachment meta.
			$meta_key      = '_course-maker-featured-article-image_attachment_id';
			$attachment_id = get_post_meta( $post_id, $meta_key, true );

			// Create character limit for blog post titles.
			$title_char_limit = 60;

			// Create var with shortened post title.
			$post_title = substr( get_the_title(), 0, $title_char_limit ); // Limit the title to 60 characters.

			// If title is longer than limit, add ellipses.
			if ( strlen( $post_title > $title_char_limit ) ) {
				$post_title .= '...';
			}

			// Open article container.
			if ( $attachment_id ) {
				echo '<div class="featured-article">';
			} else {
				echo '<div class="featured-article no-thumbnail">';
			}

			// Open text container.
			echo '<div class="text-container">';

			// Show the 'Featured Article' header text.
			echo '<div class="featured-article-item-header">' . esc_html__( 'Featured Article', 'coursemaker' ) . '</div>';

			// Show the Post Title.
			echo '<h2 class="entry-title"><a href="' . esc_url( get_the_permalink() ) . '" class="entry-title-link">' . esc_html( $post_title ) . '</a></h2>';

			// Open the Author info container.
			echo '<div class="author-info">';

			// Get the Author info.
			$the_author    = get_the_author();
			$the_author_id = get_the_author_meta( 'ID' );

			// Get the link to the Author page.
			$the_author_link = get_author_posts_url( $the_author_id );

			// Get the categories of the current post.
			$category = get_the_category();

			// Assign a var to the first category.
			$first_category = $category[0]->cat_name;

			// Get the link to the first category.
			$first_category_link = get_category_link( $category[0] );

			// Show the Author Image.
			echo '<div class="image">';

			echo '<a href="' . esc_html( $the_author_link ) . '">' . get_avatar( $the_author_id, 64 ) . '</a>';

			echo '</div>';

			// Show the Author Text.
			echo '<div class="author-text">';

			echo '<p class="author-name"><a href="' . esc_html( $the_author_link ) . '">' . esc_html( $the_author ) . '</a></p>';

			echo '<p class="post-category"><a href="' . esc_html( $first_category_link ) . '">' . esc_html( $first_category ) . '</a></p>';

			echo '</div>';

			// Close the Author Info container.
			echo '</div>';

			// Close the text container.
			echo '</div>';

			// Show the Featured Image.
			if ( $attachment_id ) {

				echo '<div class="featured-img">';
				echo '<a href="' . esc_url( get_the_permalink() ) . '">';
				echo wp_get_attachment_image( $attachment_id, array( 1200, 630 ) );
				echo '</a>';
				echo '</div>';

			}

			// Close the article container.
			echo '</div>';

		}
	}

	// Close the featured articles content container.
	echo '</div>';

	// Output the JS.
	?>
	<script type="text/javascript">
	jQuery(document).ready(function ($) {

		/*
		* Featured Articles Slider
		* uses Slick JS by Ken Wheeler
		* configuration options: https://kenwheeler.github.io/slick/
		--------------------------------------------------------------------- */
		$(".blog-header-extras .featured-articles").not(".slick-initialized").slick({
			autoplay: true,
			autoplaySpeed: 5000,
			adaptiveHeight: true,
			pauseOnFocus: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			fade: false,
			arrows: true,
			prevArrow: '<button type="button" class="slick-prev"><span class="fa fa-angle-left"></span></button>',
			nextArrow: '<button type="button" class="slick-next"><span class="fa fa-angle-right"></span></button>',
			dots: true,
			infinite: true,
		});

	});
	</script>
	<?php

	// Save the contents to a var.
	$output = ob_get_contents();

	// End the Output Buffering.
	ob_end_clean();

	// Restore the original Post Data.
	wp_reset_postdata();

	// Return everything.
	return $output;

}

/**
 * Modify the output of the Blog Header.
 *
 * @return string
 */
function course_maker_blog_header_output() {

	if ( genesis_is_root_page() || ! is_home() && ! is_archive() ) {
		return;
	}

	// Get the Customizer settings.
	$enable_blog_carousel   = get_theme_mod( 'enable_blog_carousel', true );
	$enable_blog_categories = get_theme_mod( 'enable_blog_categories', true );

	// Exit if both "disable" Customizer settings are disabled.
	if ( ! $enable_blog_carousel && ! $enable_blog_categories ) {
		return;
	}

	// Start Output Buffering.
	ob_start();

	// Open the container elements.
	echo '<div class="entry-content blog-header-extras">';

	// Get the current page layout.
	global $post;
	$page_layout         = '';
	$default_page_layout = genesis_get_default_layout();
	$current_page_layout = genesis_get_layout( $post->ID );
	if ( empty( $current_page_layout ) ) {
		$current_page_layout = $default_page_layout;
	}
	if ( ( 'content-sidebar' === $current_page_layout ) || ( 'sidebar-content' === $current_page_layout ) ) {
		$page_layout = 'sidebar';
	} else {
		$page_layout = 'fullwidth';
	}

	// Assign a padding amount when the page is set to full-width layout.
	if ( 'sidebar' === $page_layout ) {
		$padding_str = '';
	} else {
		$padding_str = 'style="padding: 0 8%;"';
	}

	// Apply padding if the current page layout is set to full-width.
	echo '<div class="alignfull" ' . $padding_str . '>';

	if ( 'sidebar' === $page_layout ) {
		echo '<div class="container-content" style="max-width: 1200px; margin: 0 auto;">';
	} else {
		echo '<div class="container-content" style="max-width: 1200px; margin: 0 auto;">';
	}

	// Show the Featured Articles slider.
	if ( $enable_blog_carousel ) {

		$featured_articles_items = course_maker_show_featured_articles();

		echo $featured_articles_items; // phpcs:ignore

	}

	// Show the Blog Categories list.
	if ( $enable_blog_categories ) {

		$categories_list = course_maker_output_category_list();

		echo $categories_list; // phpcs:ignore

	}

	// Close the full-width container.
	echo '</div></div></div>';

	// Put all the content into a var.
	$content = ob_get_contents();

	// Stop the Output Buffering.
	ob_end_clean();

	// Display everything.
	echo $content; // phpcs:ignore

}
add_action( 'genesis_before_loop', 'course_maker_blog_header_output', 20 );

/**
 * Opens the blog posts container
 *
 * @return string
 */
function course_maker_blog_posts_wrapper_open() {

	if ( genesis_is_root_page() || ! is_home() && ! is_archive() ) {
		return;
	}

	// Open the container divs.
	echo '<div class="entry-content blog-posts-grid">';
	echo '<div class="alignfull">';
	echo '<div class="container-content" style="max-width: 1200px; margin: 0 auto;">';

	// Show 'New Articles' header text on first Blog page.
	if ( is_home() ) {

		// Get value of 'paged' var to determine current page - if null set to 1.
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		// If this is the first page.
		if ( 1 === $paged ) {

			echo '<h2 class="blog-posts-title">' . esc_html__( 'New Articles', 'coursemaker' ) . '</h2>';

		} else {
			/* Translators: %d is the page number */
			echo '<h2 class="blog-posts-title">' . sprintf( esc_html__( 'Articles Page %d', 'coursemaker' ), absint( $paged ) ) . '</h2>';
		}
	}

	echo '<div class="blog-posts-wrapper">';

}
add_action( 'genesis_before_loop', 'course_maker_blog_posts_wrapper_open', 30 );

// * Remove default Pagination
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

/**
 * Closes the blog posts container
 *
 * @return string
 */
function course_maker_blog_posts_wrapper_close() {

	if ( genesis_is_root_page() || ! is_home() && ! is_archive() ) {
		return;
	}

	echo '</div>';

}
add_action( 'genesis_after_endwhile', 'course_maker_blog_posts_wrapper_close', 20 );

/**
 * Adds Pagination after 'blog-posts-wrapper' element
 *
 * @return string
 */
function course_maker_reposition_pagination() {

	if ( genesis_is_root_page() || ! is_home() && ! is_archive() ) {
		return;
	}

	// Use the default Pagination.
	genesis_posts_nav();

	// Close container divs.
	echo '</div></div></div>';

}
add_action( 'genesis_after_endwhile', 'course_maker_reposition_pagination', 30 );

/**
 * Opens the Article Wrapper
 *
 * @return string
 */
function course_maker_open_article_wrap() {

	if ( genesis_is_root_page() || ! is_home() && ! is_archive() ) {
		return;
	}

	echo '<section class="cm-featured-post widget featured-content post-' . get_the_ID() . ' type-' . esc_attr( get_post_type() ) . '">';
	echo '<div class="widget-wrap">';

}
add_action( 'genesis_before_entry', 'course_maker_open_article_wrap', 1 );

/**
 * Closes the Article Wrapper
 *
 * @return string
 */
function course_maker_close_article_wrap() {

	if ( genesis_is_root_page() || ! is_home() && ! is_archive() ) {
		return;
	}

	echo '</div>';
	echo '</section>';

}
add_action( 'genesis_after_entry', 'course_maker_close_article_wrap', 1 );

/**
 * Opens the Entry Wrapper
 *
 * @return string
 */
function course_maker_open_entry_wrap() {

	if ( genesis_is_root_page() || ! is_home() && ! is_archive() ) {
		return;
	}

	echo '<div class="stripe"></div>';
	echo '<div class="wrapper">';

}
add_action( 'genesis_entry_header', 'course_maker_open_entry_wrap', 0 );

/**
 * Closes the Entry Wrapper
 *
 * @return string
 */
function course_maker_close_entry_wrap() {

	if ( genesis_is_root_page() || ! is_home() && ! is_archive() ) {
		return;
	}

	echo '</div>';

}
add_action( 'genesis_entry_footer', 'course_maker_close_entry_wrap', 99 );

// * Move featured image to before post title
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );

/**
 * Shortens long post titles on Blog Archive page
 *
 * @return string
 */
function course_maker_custom_blog_post_titles() {

	// If we are on a category page...
	if ( is_category() ) {

		add_filter( 'genesis_post_title_text', 'course_maker_shorten_long_post_titles', 1 );

		/**
		 * Shortens long post titles on Blog Archive page
		 *
		 * @param string $title The title text to modify.
		 * @return string
		 */
		function course_maker_shorten_long_post_titles( $title ) {

			// Get the title.
			$title = get_the_title();

			// Get the title length.
			$title_length = strlen( $title );

			// Create a character limit.
			$title_char_limit = 80;

			// If the title is longer than our limit...
			if ( $title_length > $title_char_limit ) {

				// Create a new var that is substring of the original string.
				$newtitle = substr( $title, 0, $title_char_limit );

				// Add the ellipses.
				$title = $newtitle . '...';

			}

			return $title;

		}
	}

}
add_action( 'genesis_before', 'course_maker_custom_blog_post_titles' );

/**
 * Adds the Learn More link
 *
 * @return string
 */
function course_maker_add_readmore_link() {

	if ( genesis_is_root_page() || ! is_home() && ! is_archive() ) {
		return;
	}

	echo '<a href="' . esc_url( get_the_permalink() ) . '" class="more-link">' . esc_html__( 'Learn More', 'coursemaker' ) . '</a>';

}
add_action( 'genesis_entry_content', 'course_maker_add_readmore_link', 20 );

// * SINGLE POST - Add Featured Image above Post Title
add_action( 'genesis_before_entry', 'course_maker_add_single_post_featured_image', 50 );
/**
 * Adds the Featured Image above the Post Title
 *
 * @return string
 */
function course_maker_add_single_post_featured_image() {

	if ( ! is_singular() ) {
		return;
	}

	if ( has_post_thumbnail() ) {

		$post_id = get_the_ID();

		echo '<div class="featured-image">';
		echo '<div class="stripe"></div>';
		echo '<a href="' . esc_url( get_the_permalink() ) . '">';
		echo get_the_post_thumbnail( $post_id, 'featured-image' );
		echo '</a>';
		echo '</div>';

	}

}

/**
 * Adds extra CSS classes to the .content element
 *
 * @param array $attributes An array of Attributes to modify.
 * @return array
 */
function course_maker_add_single_post_content_class( $attributes ) {

	if ( ! is_singular() ) {
		return;
	}

	$attributes['class'] = $attributes['class'] . ' entry-content';
	return $attributes;

}
add_filter( 'genesis_attr_content', 'course_maker_add_single_post_content_class' );

/**
 * Modify output of image for archive images.
 *
 * @param string $output Image output.
 * @param array  $args   Array of args passed.
 * @param int    $id     ID of image.
 * @param string $html   HTML output.
 * @param string $url    URL of image.
 * @param string $src    SRC of image.
 */
function course_maker_get_blog_archive_images( string $output, array $args, int $id, string $html, $url, string $src ) {
	// Make sure width/height of attachment is reasonable.
	$attachment_src = wp_get_attachment_image_src( $id );
	if ( $attachment_src && is_array( $attachment_src ) ) {
		$width  = $attachment_src[1];
		$height = $attachment_src[2];
		if ( $width <= 1 || $height <= 1 ) {
			return '';
		}
	}
	return $output;
}
add_filter( 'genesis_get_image', 'course_maker_get_blog_archive_images', 10, 6 );
