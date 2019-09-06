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

$authorName      = __( 'Quote Author', 'coursemaker' );
$authorTitle     = __( 'Business or Professional Title', 'coursemaker' );
$testimonialText = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In venenatis bibendum ipsum, nec scelerisque metus. Suspendisse ultrices in risus et aliquam. Maecenas ut risus mauris. Sed luctus diam vitae faucibus venenatis.';

return array(
	'socialproofslider_testimonial_author_name'  => '<p>' . $authorName . '</p>',
	'socialproofslider_testimonial_author_title' => '<p>' . $authorTitle . '</p>',
	'socialproofslider_testimonial_text'         => '<p>' . $testimonialText . '</p>',
);
