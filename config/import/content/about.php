<?php
/**
 * Course Maker Pro - One-Click Demo Install - About page content.
 *
 * Visit `/wp-admin/admin.php?page=genesis-getting-started` to trigger import.
 *
 * @package Course Maker Pro
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

$course_maker_about_image_url = CHILD_URL . '/config/import/images/home-about-default.jpg';

$course_maker_contact_page_url = get_bloginfo('url') . '/contact/';

return <<<CONTENT
<!-- wp:heading {"level":3} -->
<h3><strong>About the Course</strong></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Use this section to give visitors a deeper look into the details of your must-take course. Start with a high-level overview of what your class will teach them and why it’s unmissable. Then, get into the nitty gritty. Consider sharing information about your framework or process, explain how participants can use what they learn, and outline the benefits they’ll experience thanks to your course. </p>
<!-- /wp:paragraph -->

<!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":3} -->
<h3><strong>About the Instructor, Rachel Gogos</strong></h3>
<!-- /wp:heading -->

<!-- wp:image {"id":1,"linkDestination":"custom"} -->
<figure class="wp-block-image"><a href="https://www.youtube.com/watch?v=YbRubFUmAtc" rel="wp-video-lightbox"><img src="$course_maker_about_image_url" alt="" class="wp-image-1"/></a></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>When writing your bio, don’t hide your light under a bushel! If you’re uncomfortable tooting your own horn, pretend you’re describing someone else who is a top expert in their field. Include details that help to show off your authority, credibility, and passion for the content you’re teaching. But remember, this isn’t a straight résumé. Sprinkle in some of your personality to help visitors connect to you and trust that you’re the perfect person to teach them this topic—because you are!</p>
<!-- /wp:paragraph -->

<!-- wp:button {"className":"is-style-squared"} -->
<div class="wp-block-button is-style-squared"><a class="wp-block-button__link" href="$course_maker_contact_page_url">Contact Me</a></div>
<!-- /wp:button -->
CONTENT;
