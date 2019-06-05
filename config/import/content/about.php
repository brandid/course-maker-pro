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

$course_maker_about_headshot_image_url = CHILD_URL . '/config/import/images/home-about-default.jpg';

$course_maker_contact_page_url = get_bloginfo('url') . '/contact/';

return <<<CONTENT
<!-- wp:image {"id":555,"linkDestination":"custom"} -->
<figure class="wp-block-image"><a href="https://www.youtube.com/watch?v=YbRubFUmAtc" rel="wp-video-lightbox"><img src="$course_maker_about_image_url" alt="" class="wp-image-555"/></a></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras placerat aliquet metus at fringilla. Praesent turpis enim, pellentesque sit amet aliquet id, rhoncus nec dui. Nulla quis dui nisi. Morbi convallis, ante sed aliquam rutrum, massa elit fermentum eros, sed eleifend leo dui sit amet sem. Proin enim purus, ultricies non suscipit a, imperdiet a turpis.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Pellentesque at magna et turpis accumsan posuere. In maximus orci enim, id tincidunt massa ultrices eget. Donec mauris ex, scelerisque ac nisi in, tempus tincidunt arcu. Ut semper eget sapien mattis vehicula.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"className":"is-style-squared"} -->
<div class="wp-block-button is-style-squared"><a class="wp-block-button__link" href="$course_maker_contact_page_url">Contact Me</a></div>
<!-- /wp:button -->
CONTENT;
