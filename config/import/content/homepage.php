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
<!-- wp:generateblocks/container {"uniqueId":"11b7bd23","containerWidth":1280,"paddingTop":"25","paddingBottom":"25","paddingUnit":"%","paddingRightTablet":"2","paddingLeftTablet":"2","backgroundColor":"#000000","bgImage":{"id":942,"image":{"url":"$course_maker_homepage_hero_image_url","height":1059,"width":1921,"orientation":"landscape"}},"bgOptions":{"selector":"pseudo-element","opacity":0.9,"overlay":false,"position":"center center","size":"cover","repeat":"no-repeat","attachment":""},"innerZindex":1,"align":"full","isDynamic":true,"blockVersion":2,"className":"homepage-hero"} -->
<!-- wp:generateblocks/headline {"uniqueId":"82b67672","element":"h1","alignment":"center","textColor":"#ffffff","fontFamily":"400","fontSize":72,"fontSizeTablet":48,"fontSizeMobile":36,"lineHeight":1.1,"letterSpacing":0.18,"marginBottom":"0"} -->
<h1 class="gb-headline gb-headline-82b67672 gb-headline-text">Go to the Head of The Class</h1>
<!-- /wp:generateblocks/headline -->

<!-- wp:generateblocks/headline {"uniqueId":"369009cf","alignment":"center","textColor":"#ffffff","fontSize":35,"fontSizeTablet":28,"fontSizeMobile":24,"lineHeight":1.1,"marginBottom":"0","paddingBottom":"0"} -->
<h2 class="gb-headline gb-headline-369009cf gb-headline-text">Lead your class, with this clear, vibrant, easy-to edit Genesis theme.&nbsp;</h2>
<!-- /wp:generateblocks/headline -->

<!-- wp:generateblocks/headline {"uniqueId":"f1482ff9","element":"p","alignment":"center","textColor":"#ffffff","fontSize":24,"fontSizeTablet":20,"marginTop":"20","marginBottom":"0"} -->
<p class="gb-headline gb-headline-f1482ff9 gb-headline-text">This theme is packed full of features and functionality to help you market your new course. The homepage layout will drive traffic to your site and engage users with your online course materials while communicating that you’re an authority in your space, without actually saying that—unless you want it to!</p>
<!-- /wp:generateblocks/headline -->

<!-- wp:generateblocks/button-container {"uniqueId":"d158e393","alignment":"center","marginTop":"50","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/button {"uniqueId":"8919d844","hasUrl":true,"target":true,"backgroundColor":"#878B89","textColor":"#ffffff","backgroundColorHover":"#4c4d50","textColorHover":"#ffffff","fontWeight":"400","fontSize":22,"fontSizeTablet":18,"textTransform":"uppercase","letterSpacing":0.2,"paddingTop":"20","paddingRight":"31","paddingBottom":"15","paddingLeft":"31","borderSizeTop":"0","borderSizeRight":"0","borderSizeBottom":"0","borderSizeLeft":"0","borderRadiusTopRight":"0","borderRadiusBottomRight":"0","borderRadiusBottomLeft":"0","borderRadiusTopLeft":"0"} -->
<a class="gb-button gb-button-8919d844 gb-button-text" href="https://buildmybrandid.com/wordpress-themes/" target="_blank" rel="noopener noreferrer">Buy the Theme</a>
<!-- /wp:generateblocks/button -->
<!-- /wp:generateblocks/button-container -->
<!-- /wp:generateblocks/container -->

<!-- wp:generateblocks/container {"uniqueId":"ef08f68c","containerWidth":1205,"paddingTop":"145","paddingRight":"20","paddingBottom":"145","paddingLeft":"20","paddingTopTablet":"80","paddingBottomTablet":"80","backgroundColor":"#E5E3E3","align":"full","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/headline {"uniqueId":"9966a02b","element":"p","alignment":"right","textColor":"#868C89","fontSize":24,"fontSizeMobile":22,"marginTop":"0","marginBottom":"0","paddingTop":"0","paddingBottom":"0"} -->
<p class="gb-headline gb-headline-9966a02b gb-headline-text">Take a look at this example of our Pro Theme by brandiD, built exclusively for the Genesis framework.</p>
<!-- /wp:generateblocks/headline -->

<!-- wp:generateblocks/headline {"uniqueId":"9b0dae36","element":"p","alignment":"right","textColor":"#868C89","fontSize":24,"fontSizeMobile":20,"marginTop":"22","marginBottom":"0","paddingTop":"0","paddingBottom":"0"} -->
<p class="gb-headline gb-headline-9b0dae36 gb-headline-text">We like it so much, we’re going to use it to market our own personal branding class.</p>
<!-- /wp:generateblocks/headline -->

<!-- wp:generateblocks/button-container {"uniqueId":"2944853c","alignment":"right","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/button {"uniqueId":"e0fa26d5","hasUrl":true,"target":true,"backgroundColor":"#868C89","textColor":"#ffffff","backgroundColorHover":"#5C675E","textColorHover":"#ffffff","fontSize":22,"fontSizeTablet":18,"textTransform":"uppercase","letterSpacing":0.2,"marginTop":"50","paddingTop":"20","paddingRight":"31","paddingBottom":"15","paddingLeft":"31","borderRadiusTopRight":"0","borderRadiusBottomRight":"0","borderRadiusBottomLeft":"0","borderRadiusTopLeft":"0"} -->
<a class="gb-button gb-button-e0fa26d5 gb-button-text" href="https://youtube.com/watch?v=YbRubFUmAtc" target="_blank" rel="noopener noreferrer">Watch Video</a>
<!-- /wp:generateblocks/button -->
<!-- /wp:generateblocks/button-container -->
<!-- /wp:generateblocks/container -->

<!-- wp:generateblocks/container {"uniqueId":"45d0ebde","innerContainer":"full","align":"full","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/grid {"uniqueId":"400d115f","columns":2,"horizontalGap":20,"verticalGap":40,"verticalAlignment":"center","horizontalGapTablet":0,"verticalGapTablet":0,"isDynamic":true,"blockVersion":2,"className":"alignfull"} -->
<!-- wp:generateblocks/container {"uniqueId":"96e58150","isGrid":true,"gridId":"400d115f","width":33.33,"widthTablet":100,"widthMobile":100,"flexGrow":1,"paddingRight":"10","paddingLeft":"10","paddingUnit":"%","paddingBottomMobile":"0","marginRight":"0","marginLeft":"0","marginTopTablet":"40","marginBottomTablet":"40","marginBottomMobile":"40","removeVerticalGap":true,"isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/headline {"uniqueId":"b7cc84fd","element":"div","fontSize":45,"fontSizeMobile":36,"lineHeight":1.3,"letterSpacing":0.2} -->
<div class="gb-headline gb-headline-b7cc84fd gb-headline-text">Build your brand, build your business.</div>
<!-- /wp:generateblocks/headline -->
<!-- /wp:generateblocks/container -->

<!-- wp:generateblocks/container {"uniqueId":"ebebfc1b","isGrid":true,"gridId":"400d115f","width":66.66,"widthTablet":100,"widthMobile":100,"flexGrowTablet":1,"paddingTop":"6","paddingRight":"10","paddingBottom":"6","paddingLeft":"10","paddingUnit":"%","paddingBottomTablet":"6","marginTop":"66","marginBottom":"66","marginTopTablet":"0","marginRightTablet":"0","marginBottomTablet":"0","marginLeftTablet":"0","backgroundColor":"#5C675E","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/headline {"uniqueId":"ffad57ae","element":"p","textColor":"#ffffff","fontSize":24,"fontSizeMobile":20,"marginBottomTablet":"0"} -->
<p class="gb-headline gb-headline-ffad57ae gb-headline-text">This theme is packed full of features and functionality to help you market your new course. The homepage layout will drive traffic to your site and engage users with your online course materials while communicating that you’re an authority in your space, without actually saying that—unless you want it to!</p>
<!-- /wp:generateblocks/headline -->
<!-- /wp:generateblocks/container -->
<!-- /wp:generateblocks/grid -->
<!-- /wp:generateblocks/container -->

<!-- wp:generateblocks/container {"uniqueId":"6375a9b5","containerWidth":1200,"paddingBottom":"80","paddingBottomTablet":"60","align":"full","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/grid {"uniqueId":"2ff34dbf","columns":2,"horizontalGap":80,"verticalAlignment":"center","verticalAlignmentTablet":"flex-start","horizontalAlignmentTablet":"flex-start","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/container {"uniqueId":"75f8ea42","isGrid":true,"gridId":"2ff34dbf","width":46,"widthTablet":100,"widthMobile":100,"removeVerticalGapTablet":true,"isDynamic":true,"blockVersion":2} -->
<!-- wp:image {"align":"center","id":122,"sizeSlug":"full"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><img src="$course_maker_homepage_optin_image_url" alt="Opt-in Image" class="wp-image-122"/></figure></div>
<!-- /wp:image -->
<!-- /wp:generateblocks/container -->

<!-- wp:generateblocks/container {"uniqueId":"ee2c3011","isGrid":true,"gridId":"2ff34dbf","width":54,"widthTablet":100,"widthMobile":100,"paddingTopTablet":"40","paddingRightTablet":"20","paddingLeftTablet":"20","isDynamic":true,"blockVersion":2,"className":"opt-in"} -->
<!-- wp:generateblocks/headline {"uniqueId":"8c8c680f","textColor":"#464F56","fontWeight":"400","fontSize":44,"fontSizeTablet":45,"fontSizeMobile":36,"lineHeight":1.4,"lineHeightTablet":1.3,"letterSpacing":0.2} -->
<h2 class="gb-headline gb-headline-8c8c680f gb-headline-text">Start building your personal brand for free.</h2>
<!-- /wp:generateblocks/headline -->

<!-- wp:shortcode -->
[gravityform id=2 title=false description=false ajax=true]
<!-- /wp:shortcode -->

<!-- wp:generateblocks/headline {"uniqueId":"ffd6c56e","element":"p","textColor":"#5E6270","fontSize":24,"fontSizeMobile":20,"lineHeight":2,"marginTopTablet":"-15","marginBottomTablet":"0","paddingTopTablet":"0"} -->
<p class="gb-headline gb-headline-ffd6c56e gb-headline-text">Sign up and we'll email you a free PDF about Personal Branding. We respect your privacy, and never share your information.</p>
<!-- /wp:generateblocks/headline -->
<!-- /wp:generateblocks/container -->
<!-- /wp:generateblocks/grid -->
<!-- /wp:generateblocks/container -->

<!-- wp:genesis-blocks/gb-container {"containerPaddingTop":5,"containerPaddingRight":8,"containerPaddingBottom":5,"containerPaddingLeft":8,"containerMarginTop":0,"containerMarginBottom":0,"containerMaxWidth":1200,"containerBackgroundColor":"#e6e5e3","align":"full","className":"features","llms_visibility_in":"any_course"} -->
<div style="background-color:#e6e5e3;padding-left:8%;padding-right:8%;padding-bottom:5%;padding-top:5%" class="wp-block-genesis-blocks-gb-container alignfull features gb-block-container"><div class="gb-container-inside"><div class="gb-container-content" style="max-width:1200px"><!-- wp:paragraph {"align":"center","textColor":"gray","fontSize":"huge"} -->
<p class="has-text-align-center has-gray-color has-text-color has-huge-font-size" id="experience">Course Experience</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Over the past six years I've been reading, researching and culling some of the best exercises from some of the greatest minds out there. Then, I combined all that collective wisdom with practices that I've developed to help me build my business. The outcome is wrapped into a framework that I've been using successfully ever since.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[display-posts category="courses" image-size="featured" posts_per_page="4" layout="featured"]
<!-- /wp:shortcode --></div></div></div>
<!-- /wp:genesis-blocks/gb-container -->

<!-- wp:generateblocks/container {"uniqueId":"60eab06d","innerContainer":"full","containerWidth":1200,"paddingTop":"72","paddingBottom":"260","paddingTopTablet":"36","paddingBottomTablet":"130","paddingTopMobile":"0","paddingBottomMobile":"0","marginBottomMobile":"0","align":"full","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/grid {"uniqueId":"5e1e4f79","columns":2,"horizontalGap":0,"isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/container {"uniqueId":"ab0cf3ef","isGrid":true,"gridId":"5e1e4f79","width":36,"widthTablet":42,"widthMobile":100,"backgroundColor":"#5D675D","verticalAlignment":"center","removeVerticalGap":true,"isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/container {"uniqueId":"e710abb0","containerWidth":420,"paddingTop":"153","paddingBottom":"153","paddingTopTablet":"76.5","paddingRightTablet":"20","paddingBottomTablet":"76.5","paddingLeftTablet":"20","paddingTopMobile":"38","paddingBottomMobile":"38","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/headline {"uniqueId":"73ced6b0","textColor":"#ffffff","fontSize":45,"fontSizeTablet":42,"fontSizeMobile":36,"lineHeight":1.3,"letterSpacing":0.2,"marginTopMobile":"0","marginBottomMobile":"15","paddingTopMobile":"0"} -->
<h2 class="gb-headline gb-headline-73ced6b0 gb-headline-text">Praise</h2>
<!-- /wp:generateblocks/headline -->

<!-- wp:generateblocks/headline {"uniqueId":"3b9eede8","element":"p","textColor":"#ffffff","linkColor":"#ffffff","linkColorHover":"#f2f1ef","fontSize":24,"fontSizeTablet":18,"fontSizeMobile":20} -->
<p class="gb-headline gb-headline-3b9eede8 gb-headline-text">The <a href="https://wordpress.org/plugins/social-proof-testimonials-slider/" target="_blank" rel="noreferrer noopener nofollow">Social Proof Slider by brandiD</a> is perfect for sharing testimonials from people who have taken your course and loved it, or anyone else who has praised your business. Look at our examples.</p>
<!-- /wp:generateblocks/headline -->
<!-- /wp:generateblocks/container -->
<!-- /wp:generateblocks/container -->

<!-- wp:generateblocks/container {"uniqueId":"4c0394f3","isGrid":true,"gridId":"5e1e4f79","width":64,"widthTablet":58,"widthMobile":100,"paddingRightTablet":"20","paddingLeftTablet":"20","paddingTopMobile":"25","paddingBottomMobile":"0","verticalAlignment":"center","verticalAlignmentMobile":"","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/container {"uniqueId":"5bace73c","containerWidth":692,"fontWeight":"400","fontSize":24,"fontSizeTablet":18,"fontSizeMobile":20,"isDynamic":true,"blockVersion":2} -->
<!-- wp:social-proof-slider/main {"textalign":"left","showdots":true,"padding":0,"testimonialtextcolor":"#5e6270","authornamecolor":"#5e6270","authortitlecolor":"#5e6270","className":"homepage-slider"} /-->
<!-- /wp:generateblocks/container -->
<!-- /wp:generateblocks/container -->
<!-- /wp:generateblocks/grid -->
<!-- /wp:generateblocks/container -->

<!-- wp:generateblocks/container {"uniqueId":"b92cd72c","containerWidth":1200,"paddingTop":"0","marginTop":"0","align":"full","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/grid {"uniqueId":"af4e689c","columns":2,"horizontalGap":28,"isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/container {"uniqueId":"ee9cbd68","isGrid":true,"gridId":"af4e689c","width":38,"widthTablet":100,"widthMobile":100,"orderTablet":2,"paddingLeftTablet":"20","verticalAlignment":"center","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/headline {"uniqueId":"30dcbaa1","textColor":"#5D675D","fontSize":42,"fontSizeMobile":36,"lineHeight":1.3,"letterSpacing":0.2,"marginTop":"0","marginBottom":"0","paddingBottom":"68","paddingTopTablet":"30","paddingBottomTablet":"20"} -->
<h2 class="gb-headline gb-headline-30dcbaa1 gb-headline-text">About Rachel Gogos</h2>
<!-- /wp:generateblocks/headline -->

<!-- wp:generateblocks/headline {"uniqueId":"2a85788a","element":"p","textColor":"#5E6270","fontSize":24,"fontSizeMobile":20} -->
<p class="gb-headline gb-headline-2a85788a gb-headline-text">This theme is packed full of features and functionality to help you market your new course. The homepage layout will drive traffic to your site and engage users with your online course materials while communicating that you’re an authority in your space, without actually saying that—unless you want it to!</p>
<!-- /wp:generateblocks/headline -->
<!-- /wp:generateblocks/container -->

<!-- wp:generateblocks/container {"uniqueId":"5abaa583","isGrid":true,"gridId":"af4e689c","width":62,"widthMobile":100,"flexGrowTablet":1,"orderTablet":1,"paddingTopMobile":"32","verticalAlignment":"center","verticalAlignmentTablet":"center","removeVerticalGapMobile":true,"alignmentTablet":"center","isDynamic":true,"blockVersion":2} -->
<!-- wp:image {"align":"center","id":129,"sizeSlug":"full","linkDestination":"custom"} -->
<div class="wp-block-image"><figure class="aligncenter size-full"><a href="https://www.youtube.com/watch?v=YbRubFUmAtc" rel="wp-video-lightbox"><img src="$course_maker_homepage_about_image_url" alt="Picture of Rachel Gogos" class="wp-image-129"/></a></figure></div>
<!-- /wp:image -->
<!-- /wp:generateblocks/container -->
<!-- /wp:generateblocks/grid -->
<!-- /wp:generateblocks/container -->

<!-- wp:genesis-blocks/gb-container {"containerPaddingTop":10,"containerPaddingRight":8,"containerPaddingBottom":10,"containerPaddingLeft":8,"containerMarginTop":0,"containerMarginBottom":0,"containerMaxWidth":900,"containerBackgroundColor":"#e6e5e3","align":"full","className":"features"} -->
<div style="background-color:#e6e5e3;padding-left:8%;padding-right:8%;padding-bottom:10%;padding-top:10%" class="wp-block-genesis-blocks-gb-container alignfull features gb-block-container"><div class="gb-container-inside"><div class="gb-container-content" style="max-width:900px"><!-- wp:generateblocks/container {"uniqueId":"ba6204ca","containerWidth":1200,"textColor":"#5E6270","align":"full","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/headline {"uniqueId":"848521fc","alignment":"center","textColor":"","fontSize":44,"fontSizeTablet":42,"fontSizeMobile":36,"lineHeightMobile":1.3,"letterSpacingMobile":0.2} -->
<h2 class="gb-headline gb-headline-848521fc gb-headline-text">You Ask, We Tell</h2>
<!-- /wp:generateblocks/headline -->

<!-- wp:generateblocks/headline {"uniqueId":"45189897","element":"p","alignment":"center","fontSize":30,"fontSizeMobile":24} -->
<p class="gb-headline gb-headline-45189897 gb-headline-text">Here are some commonly asked questions</p>
<!-- /wp:generateblocks/headline -->

<!-- wp:genesis-blocks/gb-accordion -->
<div class="wp-block-genesis-blocks-gb-accordion gb-block-accordion"><details><summary class="gb-accordion-title">Is this theme right for me?</summary><div class="gb-accordion-text"><!-- wp:paragraph -->
<p>If you’ve already built or are ready to start creating a course you plan to teach, then get this theme now! It’s fully customizable, and designed for an optimum course-sharing experience. Your students will put the site on their own personal honor roll.</p>
<!-- /wp:paragraph --></div></details></div>
<!-- /wp:genesis-blocks/gb-accordion -->

<!-- wp:genesis-blocks/gb-accordion -->
<div class="wp-block-genesis-blocks-gb-accordion gb-block-accordion"><details><summary class="gb-accordion-title">What plugins are supported?</summary><div class="gb-accordion-text"><!-- wp:paragraph -->
<p>This theme supports a multitude of plugins, including:</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>Lifter LMS</li><li>LearnDash</li><li>WooCommerce</li><li>MemberPress</li><li>Genesis Simple FAQ</li><li>and more.</li></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>If you need specific support, please consult our <a href="https://buildmybrandid.com/product-support/" target="_blank" rel="noreferrer noopener">Product Support page</a>.</p>
<!-- /wp:paragraph --></div></details></div>
<!-- /wp:genesis-blocks/gb-accordion -->

<!-- wp:genesis-blocks/gb-accordion -->
<div class="wp-block-genesis-blocks-gb-accordion gb-block-accordion"><details><summary class="gb-accordion-title">Where do my lessons and course material go?</summary><div class="gb-accordion-text"><!-- wp:paragraph -->
<p>If you're using the&nbsp;<a href="https://lifterlms.com/" target="_blank" rel="noreferrer noopener">LifterLMS plugin</a>, Lessons and course material should be added to the “lessons” post type accessible from the WordPress dashboard. As with the rest of the site, these posts are fully customizable and can be adjusted to your needs—add as many or as few lessons as you’d like.</p>
<!-- /wp:paragraph --></div></details></div>
<!-- /wp:genesis-blocks/gb-accordion -->

<!-- wp:genesis-blocks/gb-accordion -->
<div class="wp-block-genesis-blocks-gb-accordion gb-block-accordion"><details><summary class="gb-accordion-title">What are the color combinations for this theme?</summary><div class="gb-accordion-text"><!-- wp:paragraph -->
<p>You tell us! You are free to choose whatever colors you’d like via the super-simple customizer and use them on Gutenberg blocks. This way, your courses can look like you, sound like you, and truly be <strong>ALL YOU</strong>!</p>
<!-- /wp:paragraph --></div></details></div>
<!-- /wp:genesis-blocks/gb-accordion -->
<!-- /wp:generateblocks/container --></div></div></div>
<!-- /wp:genesis-blocks/gb-container -->

<!-- wp:generateblocks/container {"uniqueId":"564d7b9e","containerWidth":1200,"paddingTop":"82","paddingBottom":"82","paddingRightTablet":"20","paddingLeftTablet":"20","backgroundColor":"#F3F2F2","align":"full","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/grid {"uniqueId":"323b3786","columns":2,"horizontalGap":80,"horizontalGapMobile":0,"verticalGapMobile":0,"isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/container {"uniqueId":"99ae6436","isGrid":true,"gridId":"323b3786","width":50,"widthMobile":100,"flexGrow":1,"verticalAlignment":"center","removeVerticalGapMobile":true,"isDynamic":true,"blockVersion":2} -->
<!-- wp:image {"id":131} -->
<figure class="wp-block-image"><img src="$course_maker_homepage_policy_image_url" alt="" class="wp-image-131"/></figure>
<!-- /wp:image -->
<!-- /wp:generateblocks/container -->

<!-- wp:generateblocks/container {"uniqueId":"be62af13","isGrid":true,"gridId":"323b3786","width":50,"widthMobile":100,"verticalAlignment":"center","isDynamic":true,"blockVersion":2} -->
<!-- wp:generateblocks/headline {"uniqueId":"dab4e0a6","fontSize":44,"fontSizeTablet":42,"fontSizeMobile":36,"lineHeight":1.3,"letterSpacing":0.2} -->
<h2 class="gb-headline gb-headline-dab4e0a6 gb-headline-text">Your Add/Drop Policy</h2>
<!-- /wp:generateblocks/headline -->

<!-- wp:generateblocks/headline {"uniqueId":"76cfd343","element":"p","fontSize":24,"fontSizeMobile":20} -->
<p class="gb-headline gb-headline-76cfd343 gb-headline-text">Write a really solid guarantee for your class and place it here. Something like “If you’re not totally satisfied with this course, we’ll give 100% of your money back, no questions asked. Oh, and you can keep all the downloadable audiobooks and audio course. That’s how absolutely certain we are that you’ll find tremendous, life-changing value in every lesson.”</p>
<!-- /wp:generateblocks/headline -->
<!-- /wp:generateblocks/container -->
<!-- /wp:generateblocks/grid -->
<!-- /wp:generateblocks/container -->
CONTENT;
