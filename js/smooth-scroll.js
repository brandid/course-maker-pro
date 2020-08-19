jQuery(document).ready(function ($) {

    /* De-Bouncer script: pause resize calculations until last resize event is finished */
	/* http://www.hnldesign.nl/work/code/debouncing-events-with-jquery/ */
	var deBouncer = function($,cf,of, interval){
		var debounce = function (func, threshold, execAsap) {
			var timeout;
			return function debounced () {
				var obj = this, args = arguments;
				function delayed () {
					if (!execAsap)
						func.apply(obj, args);
					timeout = null;
				}
				if (timeout)
					clearTimeout(timeout);
				else if (execAsap)
					func.apply(obj, args);
				timeout = setTimeout(delayed, threshold || interval);
			};
		};
		jQuery.fn[cf] = function(fn){  return fn ? this.bind(of, debounce(fn)) : this.trigger(cf); };
	};

	// Register DeBouncing functions
	// deBouncer(jQuery,'new eventname', 'original event', timeout);
	// Note: keep the jQuery namespace in mind, don't overwrite existing functions!
	deBouncer(jQuery,'smartresize', 'resize', 50);
    deBouncer(jQuery,'smartscroll', 'scroll', 50);

	/**
     * Adds smooth scrolling functionality to the site.
     * Supports URL hashes.
     *
     */

    // taken from: https://css-tricks.com/snippets/jquery/smooth-scrolling/
    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        // On-page links
        if ( location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
				// Get header height
				var headerheight = getSiteHeaderHeight();
				var targetoffset = target.offset().top - parseFloat(headerheight);
                $('html, body').animate({
                    scrollTop: targetoffset
                }, 2000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });

	function addScrolled() {
		if (window.innerWidth > 1022) {
			if ( $( document ).scrollTop() > 0 ){
				$( '.site-header.sticky' ).addClass( 'scrolled' );
			} else {
				$( '.site-header.sticky' ).removeClass( 'scrolled' );
			}
		}
	};

	// Get the current .site-header height in px
	function getSiteHeaderHeight() {

		// Only needed above 1023px
		if (window.innerWidth > 1023) {

			// The SiteHeader element to target
			var sh = $( ".site-header" );

			// Set OuterHeight var
			var oh = $( sh ).outerHeight();

			// Add 30px for spacing
			oh = parseFloat(oh + 30);

			// Move further for Admin Bar
			if ( $( 'body' ).hasClass( "admin-bar" ) ) {

				oh = parseFloat( oh + 32);

			}

			// // Log in console
			// console.log( 'oh: ' + oh + 'px' );

		} else {

			// Set OuterHeight var
			var oh = 0;

			// Add 30px for spacing
			oh = parseFloat(oh + 30);

			// Move further for Admin Bar
			if ( $( 'body' ).hasClass( "admin-bar" ) ) {

				oh = parseFloat( oh + 46);

			}

			// // Log in console
			// console.log( 'oh: ' + oh + 'px' );

		}

		// Return the val
		return oh;

	}

	/*
	* If User wants the Sticky Nav, then the body must have some
	* padding-top in order to offset the static-position of the header.
	* The height of the header div will be different on each site.
	* We need to *dynamically* adjust the padding-top on the
	* .site-inner element for two responsive CSS breakpoints --
	* the header div is not "sticky" at widths lower than 1024px
	*/
	// Update the padding-top on .site-inner
	function updateSiteInnerTopPadding(){

		// Set target element to receive padding-top
		var si = $( "body:not(.home) .site-inner" );

		// Only needed above 1023px
		if (window.innerWidth > 1023) {
			// Only required if sticky nav is on
			if ( $( ".site-header" ).hasClass( "sticky" ) ) {

				// Get header height and set as NewHeight var
				var nh = getSiteHeaderHeight();

				// Add 30px for spacing
				nh = parseInt(nh + 30);

				// Manually set target element padding-top
				$( si ).css("padding-top", nh);
			}
		} else {
			// Remove top padding
			$( si ).css("padding-top", "30px");
		}
	}

	//$( document ).on('scroll', addScrolled);
    $( window ).smartscroll( function(e) {
        addScrolled();
    } );

	//$( window ).on('resize', addScrolled);
    $( window ).smartresize( function(e) {
        addScrolled();
		updateSiteInnerTopPadding();
    } );

	updateSiteInnerTopPadding();

});
