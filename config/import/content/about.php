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

$course_maker_about_image_url = CHILD_URL . '/config/import/images/about-rachel-gogos.jpg';

$course_maker_contact_page_url = home_url() . '/contact/';

return <<<CONTENT
<!-- wp:embed {"url":"https://youtu.be/fiBni4Mj-jM","type":"video","providerNameSlug":"youtube","responsive":true,"align":"center","className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
<figure class="wp-block-embed aligncenter is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
https://youtu.be/fiBni4Mj-jM
</div><figcaption><meta charset="utf-8"><strong>Rachel Gogos</strong></figcaption></figure>
<!-- /wp:embed -->

<!-- wp:image {"align":"right","id":694,"sizeSlug":"medium"} -->
<div class="wp-block-image"><figure class="alignright size-medium"><a href="https://youtube.com" rel="wp-video-lightbox"><img src="$course_maker_about_image_url" alt="" class="wp-image-694"/></a><figcaption><meta charset="utf-8"><strong>Rachel Gogos</strong></figcaption></figure></div>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>When writing your bio, don’t hide your light under a bushel! If you’re uncomfortable tooting your own horn, pretend you’re describing someone else who is a top expert in their field. Include details that help to show off your authority, credibility, and passion for the content you’re teaching. But remember, this isn’t a straight résumé. Sprinkle in some of your personality to help visitors connect to you and trust that you’re the perfect person to teach them this topic—because you are!</p>
<!-- /wp:paragraph -->

<!-- wp:quote {"align":"left"} -->
<blockquote class="wp-block-quote has-text-align-left"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse lobortis mauris vel sem rhoncus tempor. Ut tincidunt malesuada hendrerit. Etiam a ex in velit tincidunt mattis. Cras bibendum molestie lectus eget auctor. Etiam hendrerit nisl et venenatis pharetra. Pellentesque bibendum nibh purus, sit amet hendrerit turpis egestas eu. Phasellus maximus justo at tortor aliquam porta. Donec maximus ultricies hendrerit. Aenean a turpis a lectus tristique tempus at eget nisl. Pellentesque bibendum efficitur sem, rhoncus cursus ex mollis nec. Nullam eu laoreet est, commodo dapibus lectus. Donec vestibulum risus et erat suscipit, nec auctor neque iaculis. Suspendisse porttitor sapien at nulla dignissim maximus. Suspendisse eget felis in elit tristique tristique nec vitae mauris. Nunc viverra, nunc in rhoncus vehicula, dolor sapien cursus dui, faucibus feugiat enim erat egestas enim. Fusce maximus venenatis semper.</p><cite>Rachel Gogos</cite></blockquote>
<!-- /wp:quote -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","orientation":"horizontal"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":0}}} -->
<div class="wp-block-button"><a class="wp-block-button__link no-border-radius" href="$course_maker_contact_page_url">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
CONTENT;
