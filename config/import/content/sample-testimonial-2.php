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

$authorName      = __( 'Testimonial Author', 'coursemaker' );
$authorTitle     = __( 'Business or Professional Title', 'coursemaker' );
$testimonialText = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras elit est, malesuada id turpis vitae, fermentum egestas mauris. Phasellus convallis dolor a pretium varius. Aliquam lacinia elit quis egestas tempus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.';

return array(
	'socialproofslider_testimonial_author_name'  => '<p>' . $authorName . '</p>',
	'socialproofslider_testimonial_author_title' => '<p>' . $authorTitle . '</p>',
	'socialproofslider_testimonial_text'         => '<p>' . $testimonialText . '</p>',
);
