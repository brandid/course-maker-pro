<?php
/**
 * Display Post Shortcode custom functions for the Course Maker Pro theme.
 *
 * @since 2.0
 *
 * @package Course Maker Pro
 */

// Get the number of chars to show - set in Genesis Settings.
$char_limit = (int) genesis_get_option( 'content_archive_limit' );

// If char limit setting is not assigned, set a default.
if ( empty( $char_limit ) ) {
	$char_limit = 140;
}

// String to append after trimmed chars.
$append_string = '...';

// Get the content excerpt.
$original_content = get_the_excerpt();

// If content is less than or equal to char length, append_string should be empty.
if ( strlen( $original_content ) <= $char_limit ) {
	$append_string = '';
}

$the_content = substr( $original_content, 0, $char_limit ) . $append_string;

echo '<section class="cm-featured-post widget featured-content post-' . get_the_ID() . ' type-' . esc_attr( get_post_type() ) . '">';
	echo '<div class="widget-wrap">';
		echo '<article class="entry">';
			echo '<div class="stripe"></div>';
			echo '<div class="wrapper">';

				// Display the Image.
				echo '<a class="block-link" href="' . esc_url( get_permalink() ) . '">' . get_the_post_thumbnail() . '</a>';

				// Display the Title.
				echo '<header class="entry-header"><h4 class="entry-title" itemprop="headline"><a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h4></header>';

				// Open the Post Content container.
				echo '<div class="entry-content">';

				// Show the Post Excerpt.
				echo $the_content; // phpcs:ignore

				// Show the Learn More link.
				echo '<a href="' . esc_url( get_the_permalink() ) . '" class="more-link">' . esc_html( __( 'Learn More', 'coursemaker' ) ) . '</a>';

				// Close the Post Content container.
				echo '</div>';

			echo '</div>';
		echo '</article>';
	echo '</div>';
echo '</section>';
