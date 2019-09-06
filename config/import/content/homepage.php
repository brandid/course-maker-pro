<?php
/**
 * Course Maker Pro - One-Click Demo Install - Homepage content
 *
 * Visit `/wp-admin/admin.php?page=genesis-getting-started` to trigger import.
 *
 * @package Course Maker Pro
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// * Default Images
$course_maker_homepage_hero_image_url   = CHILD_URL . '/config/import/images/home-hero-default-bg.jpg';
$course_maker_homepage_optin_image_url  = CHILD_URL . '/config/import/images/home-optin-default.jpg';
$course_maker_homepage_about_image_url  = CHILD_URL . '/config/import/images/home-about-default.jpg';
$course_maker_homepage_policy_image_url = CHILD_URL . '/config/import/images/home-policy-default.jpg';

// * Begin Creating Content Output
return <<<CONTENT
<!-- wp:atomic-blocks/ab-container {"containerPaddingTop":10,"containerPaddingRight":8,"containerPaddingBottom":10,"containerPaddingLeft":8,"containerMarginTop":0,"containerMarginBottom":0,"containerWidth":"full","containerMaxWidth":1200,"containerBackgroundColor":"#313131","containerImgID":120,"containerDimRatio":70,"className":"welcome"} -->
<div style="background-color:#313131;padding-left:8%;padding-right:8%;padding-bottom:10%;padding-top:10%" class="wp-block-atomic-blocks-ab-container welcome ab-block-container alignfull"><div class="ab-container-inside"><div class="ab-container-image-wrap"><img class="ab-container-image has-background-dim-70 has-background-dim" src="$course_maker_homepage_hero_image_url" alt=""/></div><div class="ab-container-content" style="max-width:1200px"><!-- wp:paragraph {"align":"center","textColor":"white","fontSize":"huge"} -->
<p style="text-align:center" class="has-text-color has-huge-font-size has-white-color">Get to the Head of the Class</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"white","fontSize":"large"} -->
<p style="text-align:center" class="has-text-color has-large-font-size has-white-color">Lead your class with this clear, vibrant, easy-to-edit Genesis theme.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"white"} -->
<p style="text-align:center" class="has-text-color has-white-color">This theme is packed full of features and functionality to help you market your new course. The homepage layout will drive traffic to your site and engage users with your online course materials while communicating that you're an authority in your space, without actually saying that -- unless you want it to!</p>
<!-- /wp:paragraph -->

<!-- wp:button {"backgroundColor":"accent","textColor":"white","align":"center","className":"is-style-squared target-blank"} -->
<div class="wp-block-button aligncenter is-style-squared target-blank"><a class="wp-block-button__link has-text-color has-white-color has-background has-accent-background-color" href="https://thebrandidthemes.com/product/course-maker-theme/">Buy The Theme</a></div>
<!-- /wp:button --></div></div></div>
<!-- /wp:atomic-blocks/ab-container -->

<!-- wp:atomic-blocks/ab-container {"containerPaddingTop":5,"containerPaddingRight":8,"containerPaddingBottom":5,"containerPaddingLeft":8,"containerMarginTop":0,"containerMarginBottom":0,"containerWidth":"full","containerMaxWidth":900,"containerBackgroundColor":"#e6e4e3"} -->
<div style="background-color:#e6e4e3;padding-left:8%;padding-right:8%;padding-bottom:5%;padding-top:5%" class="wp-block-atomic-blocks-ab-container ab-block-container alignfull"><div class="ab-container-inside"><div class="ab-container-content" style="max-width:900px"><!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
<p style="text-align:center" class="has-medium-font-size">The Course Maker Pro theme, built exclusively for the Genesis framework, is packed full of features and functionality to help you market your new online course. </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
<p style="text-align:center" class="has-medium-font-size">We like the theme so much, we use it for our own personal branding course!</p>
<!-- /wp:paragraph -->

<!-- wp:button {"align":"center","className":"is-style-squared wp-video-lightbox"} -->
<div class="wp-block-button aligncenter is-style-squared wp-video-lightbox"><a class="wp-block-button__link" href="https://www.youtube.com/watch?v=YbRubFUmAtc">Watch Video</a></div>
<!-- /wp:button --></div></div></div>
<!-- /wp:atomic-blocks/ab-container -->

<!-- wp:atomic-blocks/ab-columns {"columns":2,"layout":"ab-2-col-wideright","align":"full"} -->
<div class="wp-block-atomic-blocks-ab-columns ab-layout-columns-2 ab-2-col-wideright alignfull"><div class="ab-layout-column-wrap ab-block-layout-column-gap-2 ab-is-responsive-column"><!-- wp:atomic-blocks/ab-column {"paddingUnit":"%","paddingTop":6,"paddingRight":10,"paddingBottom":6,"paddingLeft":10,"columnVerticalAlignment":"center"} -->
<div class="wp-block-atomic-blocks-ab-column ab-block-layout-column ab-is-vertically-aligned-center"><div class="ab-block-layout-column-inner" style="padding-top:6%;padding-right:10%;padding-bottom:6%;padding-left:10%"><!-- wp:paragraph {"align":"right","textColor":"accent","fontSize":"large"} -->
<p style="text-align:right" class="has-text-color has-large-font-size has-accent-color">Build your brand, build your business.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:atomic-blocks/ab-column -->

<!-- wp:atomic-blocks/ab-column {"backgroundColor":"accent","textColor":"white","paddingUnit":"%","paddingTop":6,"paddingRight":10,"paddingBottom":6,"paddingLeft":10,"columnVerticalAlignment":"center"} -->
<div class="wp-block-atomic-blocks-ab-column ab-block-layout-column ab-is-vertically-aligned-center"><div class="ab-block-layout-column-inner has-accent-background-color has-white-color" style="padding-top:6%;padding-right:10%;padding-bottom:6%;padding-left:10%"><!-- wp:paragraph {"align":"left","textColor":"white"} -->
<p style="text-align:left" class="has-text-color has-white-color">This theme is packed full of features and functionality to help you market your new course. The homepage layout will drive traffic to your site and engage users with your online course materials while communicating that you’re an authority in your space, without actually saying so — unless you want it to!</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:atomic-blocks/ab-column --></div></div>
<!-- /wp:atomic-blocks/ab-columns -->

<!-- wp:atomic-blocks/ab-container {"containerPaddingTop":10,"containerPaddingRight":8,"containerPaddingBottom":10,"containerPaddingLeft":8,"containerMarginTop":0,"containerMarginBottom":0,"containerWidth":"full","containerMaxWidth":1200,"className":"opt-in"} -->
<div style="padding-left:8%;padding-right:8%;padding-bottom:10%;padding-top:10%" class="wp-block-atomic-blocks-ab-container opt-in ab-block-container alignfull"><div class="ab-container-inside"><div class="ab-container-content" style="max-width:1200px"><!-- wp:atomic-blocks/ab-columns {"columns":2,"layout":"ab-2-col-equal"} -->
<div class="wp-block-atomic-blocks-ab-columns ab-layout-columns-2 ab-2-col-equal"><div class="ab-layout-column-wrap ab-block-layout-column-gap-2 ab-is-responsive-column"><!-- wp:atomic-blocks/ab-column {"columnVerticalAlignment":"center"} -->
<div class="wp-block-atomic-blocks-ab-column ab-block-layout-column ab-is-vertically-aligned-center"><div class="ab-block-layout-column-inner"><!-- wp:image {"id":122} -->
<figure class="wp-block-image"><img src="$course_maker_homepage_optin_image_url" alt="" class="wp-image-122"/></figure>
<!-- /wp:image --></div></div>
<!-- /wp:atomic-blocks/ab-column -->

<!-- wp:atomic-blocks/ab-column {"columnVerticalAlignment":"center"} -->
<div class="wp-block-atomic-blocks-ab-column ab-block-layout-column ab-is-vertically-aligned-center"><div class="ab-block-layout-column-inner"><!-- wp:paragraph {"textColor":"accent","fontSize":"large"} -->
<p class="has-text-color has-large-font-size has-accent-color">Start building your brand for free.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p style="text-align:center"><strong><em>To display an Opt-in form, simply install your favorite Forms plugin. Then, replace this text with your Form Shortcode or Block.</em></strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sign up and we'll email you a free PDF about Personal Branding. We respect your privacy, and never share your information.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:atomic-blocks/ab-column --></div></div>
<!-- /wp:atomic-blocks/ab-columns --></div></div></div>
<!-- /wp:atomic-blocks/ab-container -->

<!-- wp:atomic-blocks/ab-container {"containerPaddingTop":10,"containerPaddingRight":8,"containerPaddingBottom":10,"containerPaddingLeft":8,"containerMarginTop":0,"containerMarginBottom":0,"containerWidth":"full","containerMaxWidth":1200,"containerBackgroundColor":"#e6e5e3","className":"features"} -->
<div style="background-color:#e6e5e3;padding-left:8%;padding-right:8%;padding-bottom:10%;padding-top:10%" class="wp-block-atomic-blocks-ab-container features ab-block-container alignfull"><div class="ab-container-inside"><div class="ab-container-content" style="max-width:1200px"><!-- wp:paragraph {"align":"center","textColor":"gray","fontSize":"huge"} -->
<p style="text-align:center" class="has-text-color has-huge-font-size has-gray-color">Course Experience</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p style="text-align:center">Over the past six years I've been reading, researching and culling some of the best exercises from some of the greatest minds out there. Then, I combined all that collective wisdom with practices that I've developed to help me build my business. The outcome is wrapped into a framework that I've been using successfully ever since.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[display-posts category="general" image-size="featured" posts_per_page="4" layout="featured"]
<!-- /wp:shortcode --></div></div></div>
<!-- /wp:atomic-blocks/ab-container -->

<!-- wp:atomic-blocks/ab-columns {"columns":2,"layout":"ab-2-col-wideright","align":"full"} -->
<div class="wp-block-atomic-blocks-ab-columns ab-layout-columns-2 ab-2-col-wideright alignfull"><div class="ab-layout-column-wrap ab-block-layout-column-gap-2 ab-is-responsive-column"><!-- wp:atomic-blocks/ab-column {"backgroundColor":"accent","paddingUnit":"%","paddingTop":6,"paddingRight":10,"paddingBottom":6,"paddingLeft":10,"columnVerticalAlignment":"center"} -->
<div class="wp-block-atomic-blocks-ab-column ab-block-layout-column ab-is-vertically-aligned-center"><div class="ab-block-layout-column-inner has-accent-background-color" style="padding-top:6%;padding-right:10%;padding-bottom:6%;padding-left:10%"><!-- wp:paragraph {"align":"right","textColor":"white","fontSize":"large"} -->
<p style="text-align:right" class="has-text-color has-large-font-size has-white-color">Praise</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"right","textColor":"white"} -->
<p style="text-align:right" class="has-text-color has-white-color">The <a href="https://wordpress.org/plugins/social-proof-testimonials-slider/" target="_blank" rel="noreferrer noopener">Social Proof Slider</a> by brandiD is perfect for sharing testimonials from people who have taken your course and loved it, or anyone else who has praised your business. Look at our examples.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:atomic-blocks/ab-column -->

<!-- wp:atomic-blocks/ab-column {"paddingUnit":"%","paddingTop":6,"paddingRight":10,"paddingBottom":6,"paddingLeft":10,"columnVerticalAlignment":"center"} -->
<div class="wp-block-atomic-blocks-ab-column ab-block-layout-column ab-is-vertically-aligned-center"><div class="ab-block-layout-column-inner" style="padding-top:6%;padding-right:10%;padding-bottom:6%;padding-left:10%"><!-- wp:shortcode -->
[social-proof-slider]
<!-- /wp:shortcode --></div></div>
<!-- /wp:atomic-blocks/ab-column --></div></div>
<!-- /wp:atomic-blocks/ab-columns -->

<!-- wp:atomic-blocks/ab-container {"containerPaddingTop":10,"containerPaddingRight":8,"containerPaddingBottom":10,"containerPaddingLeft":8,"containerMarginBottom":0,"containerWidth":"full","containerMaxWidth":1200} -->
<div style="padding-left:8%;padding-right:8%;padding-bottom:10%;padding-top:10%" class="wp-block-atomic-blocks-ab-container ab-block-container alignfull"><div class="ab-container-inside"><div class="ab-container-content" style="max-width:1200px"><!-- wp:atomic-blocks/ab-columns {"columns":2,"layout":"ab-2-col-equal"} -->
<div class="wp-block-atomic-blocks-ab-columns ab-layout-columns-2 ab-2-col-equal"><div class="ab-layout-column-wrap ab-block-layout-column-gap-2 ab-is-responsive-column"><!-- wp:atomic-blocks/ab-column {"columnVerticalAlignment":"center"} -->
<div class="wp-block-atomic-blocks-ab-column ab-block-layout-column ab-is-vertically-aligned-center"><div class="ab-block-layout-column-inner"><!-- wp:paragraph {"textColor":"gray","fontSize":"large"} -->
<p class="has-text-color has-large-font-size has-gray-color">About Rachel Gogos</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>This theme is packed full of features and functionality to help you market your new course. The homepage layout will drive traffic to your site and engage users with your online course materials while communicating that you’re an authority in your space, without actually saying so — unless you want it to!</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:atomic-blocks/ab-column -->

<!-- wp:atomic-blocks/ab-column {"columnVerticalAlignment":"center"} -->
<div class="wp-block-atomic-blocks-ab-column ab-block-layout-column ab-is-vertically-aligned-center"><div class="ab-block-layout-column-inner"><!-- wp:image {"id":129,"linkDestination":"custom"} -->
<figure class="wp-block-image"><a href="https://www.youtube.com/watch?v=YbRubFUmAtc" rel="wp-video-lightbox"><img src="$course_maker_homepage_about_image_url" alt="" class="wp-image-129"/></a></figure>
<!-- /wp:image --></div></div>
<!-- /wp:atomic-blocks/ab-column --></div></div>
<!-- /wp:atomic-blocks/ab-columns --></div></div></div>
<!-- /wp:atomic-blocks/ab-container -->

<!-- wp:atomic-blocks/ab-container {"containerPaddingTop":10,"containerPaddingRight":8,"containerPaddingBottom":10,"containerPaddingLeft":8,"containerMarginTop":0,"containerMarginBottom":0,"containerWidth":"full","containerMaxWidth":900,"containerBackgroundColor":"#e6e4e3"} -->
<div style="background-color:#e6e4e3;padding-left:8%;padding-right:8%;padding-bottom:10%;padding-top:10%" class="wp-block-atomic-blocks-ab-container ab-block-container alignfull"><div class="ab-container-inside"><div class="ab-container-content" style="max-width:900px"><!-- wp:paragraph {"align":"center","textColor":"gray","fontSize":"huge"} -->
<p style="text-align:center" class="has-text-color has-huge-font-size has-gray-color">You Ask, We Tell</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p style="text-align:center">Here are some commonly asked questions</p>
<!-- /wp:paragraph -->

<!-- wp:atomic-blocks/ab-accordion -->
<div class="wp-block-atomic-blocks-ab-accordion ab-block-accordion ab-font-size-18"><details><summary class="ab-accordion-title">Is this theme right for me?</summary><div class="ab-accordion-text"><!-- wp:paragraph -->
<p>If you’ve already built or are ready to start creating a course you plan to teach, then get this theme now! It’s fully customizable, and designed for an optimum course-sharing experience. Your students will put the site on their own personal honor roll.</p>
<!-- /wp:paragraph --></div></details></div>
<!-- /wp:atomic-blocks/ab-accordion -->

<!-- wp:atomic-blocks/ab-accordion -->
<div class="wp-block-atomic-blocks-ab-accordion ab-block-accordion ab-font-size-18"><details><summary class="ab-accordion-title">What plugins are supported?</summary><div class="ab-accordion-text"><!-- wp:paragraph -->
<p>This theme supports a multitude of plugins, including:</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>Course Maker Modules</li><li>LearnDash</li><li>Lifter LMS</li><li>WooCommerce</li><li>MemberPress</li><li>Genesis Simple FAQ</li><li>and more.</li></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>If you need specific support, please consult our <a href="https://thebrandidthemes.com/forum/" rel="noreferrer noopener" target="_blank">Support Forum</a>.</p>
<!-- /wp:paragraph --></div></details></div>
<!-- /wp:atomic-blocks/ab-accordion -->

<!-- wp:atomic-blocks/ab-accordion -->
<div class="wp-block-atomic-blocks-ab-accordion ab-block-accordion ab-font-size-18"><details><summary class="ab-accordion-title">Where do my lessons and course material go?</summary><div class="ab-accordion-text"><!-- wp:paragraph -->
<p>If you're using the <a href="https://lifterlms.com" rel="noreferrer noopener" target="_blank">LifterLMS plugin</a>, Lessons and course material should be added to the “lessons” post type accessible from the WordPress dashboard. As with the rest of the site, these posts are fully customizable and can be adjusted to your needs—add as many or as few lessons as you’d like.</p>
<!-- /wp:paragraph --></div></details></div>
<!-- /wp:atomic-blocks/ab-accordion -->

<!-- wp:atomic-blocks/ab-accordion -->
<div class="wp-block-atomic-blocks-ab-accordion ab-block-accordion ab-font-size-18"><details><summary class="ab-accordion-title">What are the color combinations for this theme?</summary><div class="ab-accordion-text"><!-- wp:paragraph -->
<p>You tell us! You are free to choose whatever colors you’d like via the super-simple customizer and use them on Gutenberg blocks. This way, your courses can look like you, sound like you, and truly be <strong>ALL YOU</strong>!</p>
<!-- /wp:paragraph --></div></details></div>
<!-- /wp:atomic-blocks/ab-accordion --></div></div></div>
<!-- /wp:atomic-blocks/ab-container -->

<!-- wp:atomic-blocks/ab-container {"containerPaddingTop":10,"containerPaddingRight":8,"containerPaddingBottom":10,"containerPaddingLeft":8,"containerMarginBottom":0,"containerWidth":"full","containerMaxWidth":1200,"containerBackgroundColor":"#f2f1ef"} -->
<div style="background-color:#f2f1ef;padding-left:8%;padding-right:8%;padding-bottom:10%;padding-top:10%" class="wp-block-atomic-blocks-ab-container ab-block-container alignfull"><div class="ab-container-inside"><div class="ab-container-content" style="max-width:1200px"><!-- wp:atomic-blocks/ab-columns {"columns":2,"layout":"ab-2-col-equal"} -->
<div class="wp-block-atomic-blocks-ab-columns ab-layout-columns-2 ab-2-col-equal"><div class="ab-layout-column-wrap ab-block-layout-column-gap-2 ab-is-responsive-column"><!-- wp:atomic-blocks/ab-column {"columnVerticalAlignment":"center"} -->
<div class="wp-block-atomic-blocks-ab-column ab-block-layout-column ab-is-vertically-aligned-center"><div class="ab-block-layout-column-inner"><!-- wp:image {"id":131} -->
<figure class="wp-block-image"><img src="$course_maker_homepage_policy_image_url" alt="" class="wp-image-131"/></figure>
<!-- /wp:image --></div></div>
<!-- /wp:atomic-blocks/ab-column -->

<!-- wp:atomic-blocks/ab-column {"columnVerticalAlignment":"center"} -->
<div class="wp-block-atomic-blocks-ab-column ab-block-layout-column ab-is-vertically-aligned-center"><div class="ab-block-layout-column-inner"><!-- wp:paragraph {"textColor":"gray","fontSize":"large"} -->
<p class="has-text-color has-large-font-size has-gray-color">Your Add/Drop Policy</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Write a really solid guarantee for your class and place it here. Something like “If you’re not totally satisfied with this course, we’ll give 100% of your money back, no questions asked. Oh, and you can keep all the downloadable audiobooks and audio course. That’s how absolutely certain we are that you’ll find tremendous, life-changing value in every lesson.”</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:atomic-blocks/ab-column --></div></div>
<!-- /wp:atomic-blocks/ab-columns --></div></div></div>
<!-- /wp:atomic-blocks/ab-container -->
CONTENT;
