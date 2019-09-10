<?php
/**
 * Course Maker Pro - Theme supports declarations.
 *
 * @package Course Maker Pro
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis-sample/
 */

return array(
	'custom-logo'                     => array(
		'width'       => 260,
		'height'      => 100,
		'flex-width'  => true,
		'flex-height' => true,
	),
	'html5'                           => array(
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
	),
	'genesis-accessibility'           => array(
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	),
	'genesis-after-entry-widget-area' => '',
	'genesis-footer-widgets'          => 3,
	'genesis-menus'                   => array(
		'primary'         => __( 'Header Menu - Standard', 'coursemaker' ),
		'primary-members' => __( 'Header Menu - Members', 'coursemaker' ),
		'secondary'       => __( 'Footer Menu', 'coursemaker' ),
	),
);
