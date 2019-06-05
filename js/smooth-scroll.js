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

	setTimeout(function () {
		if (location.hash) {
			/* we need to scroll to the top of the window first, because the browser will always jump to the anchor first before JavaScript is ready, thanks Stack Overflow: http://stackoverflow.com/a/3659116 */
			window.scrollTo(0, 0);
			target = location.hash.split('#');
			smoothScrollTo($('#' + target[1]) );
		}
	}, 1);

	// taken from: http://css-tricks.com/snippets/jquery/smooth-scrolling/
	$('nav > ul > li > a[href*=#]:not([href=#]), a[href*=#]:not([href=#])').click(function () { // ensures that Reviews tab works in WooCommerce single product pages by limiting the scope to only the # links in nav
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			smoothScrollTo($(this.hash));
			return false;
		}
	});

	function smoothScrollTo(target) {
		target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

		if (target.length) {
			$('html,body').animate({
				scrollTop: target.offset().top-62 /* where 63px is the height of fixed header */
			}, 2000);
		}
	}

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

		// The SiteHeader element to target
		var sh = $( ".site-header" );

		// Set OuterHeight var
		var oh = $( sh ).outerHeight();

		// Log in console
		// console.log( 'site header height: ' + oh + 'px' );

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
