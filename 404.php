<?php
/**
 * Course Maker Theme
 *
 * This file adds 404 page to the Course Maker theme.
 *
 * @package Course Maker Pro
 * @author  thebrandiD
 * @license GPL-2.0+
 * @link    https://thebrandidthemes.com/
 */

//* Remove default loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'genesis_404' );
/**
 * This function outputs a 404 "Not Found" error message
 *
 * @since 1.6
 */
function genesis_404() {

	//get filtering params
	$params = array();
	global $query_string;
	$args = explode( '&', $query_string );

	foreach ( $args as $value ) {
		$query = explode( '=',$value );
		$params[ $query[0] ] = urldecode( $query[1] );
	}
	// if (function_exists('d')) {
	//  d($args);
	// }

	echo genesis_html5() ? '<article class="entry">' : '<div class="post hentry">';

		printf( '<h1 class="entry-title">%s</h1>', apply_filters( 'genesis_404_entry_title', __( 'Not found, error 404', 'coursemaker' ) ) );
		echo '<div class="entry-content">';

	if ( genesis_html5() ) :

		echo apply_filters( 'genesis_404_entry_content', '<p>' . sprintf( __( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it by using the search form below.', 'coursemaker' ), trailingslashit( home_url() ) ) . '</p>' );

		get_search_form();

			else :
	?>

			<p><?php printf( __( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it with the information below.', 'coursemaker' ), trailingslashit( home_url() ) ); ?></p>



	<?php
			endif;

			if ( ! genesis_html5() ) {
				genesis_sitemap( 'h4' );
			} elseif ( genesis_a11y( '404-page' ) ) {
				echo '<h2>' . __( 'Sitemap', 'coursemaker' ) . '</h2>';
				genesis_sitemap( 'h3' );
			}

			echo '</div>';

			echo genesis_html5() ? '</article>' : '</div>';

}

genesis();
