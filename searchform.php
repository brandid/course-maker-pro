<?php
/**
 * Course Maker Pro Theme
 *
 * This file adds custom search form to the Course Maker Pro Theme.
 *
 * @package Course Maker Pro
 * @author  thebrandiD
 * @license GPL-2.0+
 * @link    https://thebrandidthemes.com/
 */

$unique_id = esc_attr( uniqid( 'search-form-' ) );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php esc_html( $unique_id ); ?>">
		<span class="screen-reader-text"><?php esc_html( _x( 'Search for:', 'label', 'coursemaker' ) ); ?></span>
	</label>
	<input type="search" id="<?php esc_html( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_html( esc_attr_x( 'Search &hellip;', 'placeholder', 'coursemaker' ) ); ?>" value="<?php esc_html( get_search_query() ); ?>" name="s" />

	<?php
	if ( is_page_template( array( 'page-templates/about.php' ) ) ) {
		?>
		<button class="search-submit" type="submit">
			<span class="search-submit-text screen-reader-text"><?php esc_html_e( 'Search', 'coursemaker' ); ?></span>
			<span class="search-submit-icon"><?php echo course_maker_get_svg( array( 'icon' => 'search' ) ); ?></span>
		</button>
		<?php
	} else {
		?>
			<!-- <button type="submit" class="search-submit"><span class="screen-reader-text"><?php _x( 'Search', 'submit button', 'coursemaker' ); ?></span></button> -->
			<input class="search-submit" type="submit" value="Search">
		<?php
	}
	?>
</form>
