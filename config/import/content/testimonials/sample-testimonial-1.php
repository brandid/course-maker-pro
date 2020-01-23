<?php
/**
 * Course Maker Pro - One-Click Demo Install - Sample Testimonial content.
 *
 * Visit `/wp-admin/admin.php?page=genesis-getting-started` to trigger import.
 *
 * @package Course Maker Pro
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

$author_name      = __( "Author's Name", 'coursemaker' );
$author_title     = __( 'Business or Professional Title', 'coursemaker' );
$testimonial_text = __( "Rachel is an amazing teacher. Her personal branding course wasn't just useful, it was fun, too -- and it gave me the confidence I need to start my own business.", 'coursemaker' );

return array(
	'socialproofslider_testimonial_author_name'  => '<p>' . $author_name . '</p>',
	'socialproofslider_testimonial_author_title' => '<p>' . $author_title . '</p>',
	'socialproofslider_testimonial_text'         => '<p>' . $testimonial_text . '</p>',
);
