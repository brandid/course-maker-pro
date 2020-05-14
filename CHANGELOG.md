# Course Maker Pro Theme Changelog

## [2.0.4] - May 13, 2020
* Fix: Corrects AB column padding issue in the demo homepage import content file
* Fix: Fixes a PHP undefined variable notice
* Fix: Removes unnecessary 404 page template
* Fix: Removes forced full-width page layout when Block Editor is used
* Fix: Removes assigned demo content page layouts - pages will use the global Customizer setting unless assigned discretely (blog page remains assigned full-width by default for aesthetics)
* Fix: Fixes styles for Search input field so submit button is Accessible and visible at all times
* Fix: Fixes print styles for LifterLMS Certificate page
* Add: Adds support for Featured Articles Slider on Content/Sidebar and Sidebar/Content page layouts

## [2.0.3] - Jan 7, 2020
This release includes the following updates:
* Add: Adds JSON Sample Course import files
* Add: Adds new Customizer setting for "LifterLMS: Use Default Styles"
* Add: Adds compatibility for Featured Articles Slider and Categories List to work with content/sidebar and sidebar/content page layouts
* Fix: Adds a border to the WooCommerce Cart/Checkout input fields. Ensures custom WooCommerce styles are enqueued on Cart and Checkout pages.
* Fix: Removes flexbox flex-grow on Lesson items in the Course Syllabus page
* Fix: Removes forced full-width page layout on pages using the Block Editor
* Fix: Sets a max-width on Comments container items
* Fix: Updates Theme URI
* Fix: Update LifterLMS functions to apply the selected default site layout as a body class (replaces the hard-coded "content-sidebar" class). Adds styles for "sidebar-content" layout on LifterLMS pages.
* Fix: Declares explicit theme support for LifterLMS course and lesson sidebars
* Fix: Conditionally loads custom LifterLMS CSS file based on the current Site Layout setting
* Fix: Adjusts LifterLMS Syllabus and Lesson Preview templates to conditionally show Custom Layout based on the current Site Layout setting
* Update: Moves OCTS import content into folders for clearer organization
* Update: Disables Yoast SEO plugin schema

## [2.0.2] - Initial release
The initial release of the Course Maker Pro theme.
