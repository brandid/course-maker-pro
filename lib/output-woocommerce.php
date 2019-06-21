<?php
/**
* Custom WooCommerce functions for Course Maker theme.
*
* @package Course Maker Pro
*/

//* Remove h1.page-title on WooCommerce product archives
add_filter( 'woocommerce_show_page_title', function() {
	return false;
} );

// Color WooCommerce elements with "Link Color" from Customizer
add_action( 'wp_enqueue_scripts', 'course_maker_custom_woocommerce_css' );
function course_maker_custom_woocommerce_css() {

	$appearance = genesis_get_config( 'appearance' );

	$color_accent = get_theme_mod( 'course_maker_theme_accentcolor_setting', $appearance['default-colors']['accent'] );
	$color_linksbuttons = get_theme_mod( 'course_maker_theme_linksbuttons_setting', $appearance['default-colors']['linksbuttons'] );
	$color_hover = get_theme_mod( 'course_maker_theme_hover_setting', $appearance['default-colors']['hover'] );

	$css = '';

	$css .= sprintf( '
		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button,
		.woocommerce input.button.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt {
			background-color: %s;
		}

		.woocommerce div.product p.price,
		.woocommerce div.product span.price,
		.woocommerce-message:before,
		.woocommerce-info:before,
		.woocommerce-MyAccount-navigation ul li.is-active a,
		.woocommerce-MyAccount-navigation ul li a:hover {
			color: %s;
		}

		.woocommerce-message,
		.woocommerce-info {
			border-top-color: %s;
		}

		',
		$color_linksbuttons
	);

	if ( $css ) {
		wp_add_inline_style( genesis_get_theme_handle() . '-woocommerce-styles', $css );
	}

}

// *OPTIONAL* Removes Order Notes - Additional Information - Title
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

// *OPTIONAL* Removes Order Notes - Additional Information - Field
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );
function remove_order_notes( $fields ) {

	unset( $fields['order']['order_comments'] );
	return $fields;

}
