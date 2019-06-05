<?php
/**
* Course Maker Theme
*
* This file adds custom search form to the Course Maker theme.
*
* @package Course Maker Pro
* @author  thebrandiD
* @license GPL-2.0+
* @link    https://thebrandidthemes.com/
*/

$unique_id = esc_attr( uniqid( 'search-form-' ) );

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'coursemaker' ); ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'coursemaker' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

	<button type="submit" class="search-submit"><?php  echo course_maker_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'coursemaker' ); ?></span></button>
</form>
