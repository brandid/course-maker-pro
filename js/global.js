// any global scripts needed for theme goes here
;
(function($) {

    'use strict';

    $("body").addClass("js").removeClass('no-js');

    // Add a custom class to the links with image so we can remove border styling
    $("a > img").parent().addClass("link-has-image");

    // Make Gutenberg button blocks with a custom class open links in a new window
    $('.wp-block-button.target-blank > a').attr('target', '_blank');

    // Make Gutenberg button blocks with a custom class open links in WP Video Lightbox
    $('.wp-block-button.wp-video-lightbox > a').attr('rel', 'wp-video-lightbox');

    // Add a custom class to the 'After Entry' widget on Single Posts
    $(".widget-area.after-entry").addClass("alignfull");

    // Add a custom class to the 'Leave a Reply' section on Single Posts
    $(".comment-respond").addClass("alignfull");

})(jQuery);
