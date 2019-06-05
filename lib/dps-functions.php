<?php
/**
* Loads custom Display Posts Shortcode plugin functions for Course Maker theme.
*
* @since 2.0
*
* @package Course Maker Pro
*/

/**
 * Template Parts with Display Posts Shortcode
 *
 * @param   string     $output,             current output of post
 * @param   array      $original_atts,      original attributes passed to shortcode
 * @return  string     $output
 */
function cm_dps_template_part( $output, $original_atts ) {
	// Return early if our "layout" attribute is not specified
	if( empty( $original_atts['layout'] ) )
		return $output;
	ob_start();
	get_template_part( 'lib/dps/dps', $original_atts['layout'] );
	$new_output = ob_get_clean();
	if( !empty( $new_output ) )
		$output = $new_output;
	return $output;
}
add_action( 'display_posts_shortcode_output', 'cm_dps_template_part', 10, 2 );
