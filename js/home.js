(function($) {
    'use strict';

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
	deBouncer( jQuery, 'smartresize', 'resize', 50 );

    if ($(document).scrollTop() > 0) {
        $('.custom-header-background').addClass('light');
    }

    $(document).on('scroll', function() {

        if ($(document).scrollTop() > 0) {
            $('.custom-header-background').addClass('light');
        } else {
            $('.custom-header-background').removeClass('light');
        }

    });

    // Get the current .site-header height in px
	function getSiteHeaderHeight() {

		// The SiteHeader element to target
		var sh = $( ".site-header" );

		// Set OuterHeight var
		var oh = $( sh ).outerHeight();

		// Return the val
		return oh;

	}

	/*
	* If User wants the Sticky Nav, then the body must have some
	* padding-top in order to offset the static-position of the header.
	* The height of the header div will be different on each site.
	* We need to *dynamically* adjust the padding-top on the
	* first block on the page for two responsive CSS breakpoints --
	* the header div is not "sticky" at widths lower than 1024px
	*/
	// Update the padding-top on .site-inner
	function updateSiteInnerTopPadding(){

		// Set target element to receive padding-top
		var el = $( "main.content > article.page > .entry-content > div" );

        // Get bottom padding of target element -- to be used as "default" for top padding
        var pb = $(el).prop('style')['padding-bottom'];

		// Only needed above 1023px
		if ( window.innerWidth > 1023 ) {

			// Only required if sticky nav is on
			if ( $( ".site-header" ).hasClass( "sticky" ) ) {

				// Get header height and set as NewHeight var
				var hh = getSiteHeaderHeight();

				// Add padding to existing padding
				var nh = parseInt(hh + 30);

				// Manually set target element padding-top
				$( el ).css("padding-top", nh);
			}

		} else {

            // Get target element padding-top value
            var elpt = $( el ).css("padding-top");

            // If target element padding-top is not the same as padding-bottom
            if ( elpt !== pb ) {

                // Set target element padding-top same as padding-bottom
                $( el ).css("padding-top", pb);

            }

        }

	}

    $( window ).smartresize( function(e) {
		updateSiteInnerTopPadding();
    } );

    updateSiteInnerTopPadding();


})(jQuery);
