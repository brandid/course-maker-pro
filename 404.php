<?php
/**
 * Course Maker Pro Theme
 *
 * This file adds 404 page to the Course Maker Pro Theme.
 *
 * @package Course Maker Pro
 * @author  thebrandiD
 * @license GPL-2.0+
 * @link    https://thebrandidthemes.com/
 */

// * Remove default loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'genesis_404' );
/**
 * This function outputs a 404 "Not Found" error message
 *
 * @since 1.6
 */
function genesis_404() {

	// Get the filtering params.
	$params = array();
	global $query_string;
	$args = explode( '&', $query_string );

	foreach ( $args as $value ) {
		$query               = explode( '=', $value );
		$params[ $query[0] ] = urldecode( $query[1] );
	}

	echo genesis_html5() ? '<article class="entry">' : '<div class="post hentry">';

	esc_html(
		sprintf(
			'<h1 class="entry-title">%s</h1>',
			__( 'Not found, error 404', 'coursemaker' )
		)
	);

	echo '<div class="entry-content">';

	if ( genesis_html5() ) :

		esc_html(
			sprintf(
				'<p>%s <a href="%s">%s</a> %s</p>',
				__( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s', 'coursemaker' ),
				__( 'homepage', 'coursemaker' ),
				__( 'and see if you can find what you are looking for. Or, you can try finding it by using the search form below.', 'coursemaker' ),
				trailingslashit( home_url() )
			)
		);

		get_search_form();

	else :

		esc_html(
			sprintf(
				'<p>%s <a href="%s">%s</a> %s</p>',
				__( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s', 'coursemaker' ),
				__( 'homepage', 'coursemaker' ),
				__( 'and see if you can find what you are looking for. Or, you can try finding it by using the search form below.', 'coursemaker' ),
				trailingslashit( home_url() )
			)
		);

	endif;

	if ( ! genesis_html5() ) {
		genesis_sitemap( 'h4' );
	} elseif ( genesis_a11y( '404-page' ) ) {
		esc_html( '<h2>' . __( 'Sitemap', 'coursemaker' ) . '</h2>' );
		genesis_sitemap( 'h3' );
	}

	echo '</div>';

	echo genesis_html5() ? '</article>' : '</div>';

}

genesis();
