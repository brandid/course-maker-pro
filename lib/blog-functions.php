<?php
/**
* Loads custom Blog functions for Course Maker theme.
*
* @since 2.0
*
* @package Course Maker Pro
*/

add_filter( 'genesis_pre_get_option_site_layout', 'course_maker_force_fullwidth_layout' );
function course_maker_force_fullwidth_layout( $opt ) {

	if ( is_archive() ) {
		return 'full-width-content';
	}

}

//* Function to output <ul> list of Blog Post Categories
function course_maker_output_category_list() {

    // Create array of arguments
    $category_args = array(
        'title_li' => '',
        'echo' => '0'
    );

    // Assign var with all categories
    $categories = wp_list_categories( $category_args );

    // Get Blog URL
    $blogURL = get_post_type_archive_link( 'post' );

    // Add 'ALL' item to list of categories
    $categories .= '<li class="cat-item-all"><a href="'.$blogURL.'">All</a></li>';

    // If 'current-cat' class does not exist in the list of categories
    if ( strpos( $categories, 'current-cat' ) == false ) {

        // add the class to the 'All' item
        $categories = str_replace( 'cat-item-all', 'cat-item-all current-cat', $categories );

    }

    return '<ul class="blog-categories">'. $categories . '</ul>';

}

//* Function to output all posts with "Featured Article" meta data
function course_maker_show_featured_articles() {

    $args = array(
        'meta_query' => array(
            array(
                'key' => '_featured_article',
                'value' => '1',
                'compare' => '=',
            )
        )
    );

    // New WP_Query
    $featured_article_query = new WP_Query( $args );

    // Exit if no posts are marked as "Featured Articles"
    if ( ! $featured_article_query->have_posts() ) {
        return;
    }

    // Begin Output Buffering
    ob_start();

    // Open container
    echo '<div class="featured-articles">';

    if ( $featured_article_query->have_posts() ) {

        while ( $featured_article_query->have_posts() ) {

            $featured_article_query->the_post();

			$post_id = get_the_ID();

			// Create character limit for blog post titles
			$title_char_limit = 60;

			// Create var with shortened post title
			$post_title = substr( get_the_title(), 0, $title_char_limit ); // Limit the title to 60 chars

			// If title is longer than limit, add ellipses
			if ( strlen( $post_title > $title_char_limit ) ) {
				$post_title .= "...";
			}

            // Open container
            echo '<div class="featured-article">';

            // Open text container
            echo '<div class="text-container">';

            // 'Featured Article' header text
            echo '<div class="featured-article-item-header">' . __( 'Featured Article', 'coursemaker' ) . '</div>';

            // Post Title
            echo '<h2 class="entry-title"><a href="' . get_the_permalink() . '" class="entry-title-link">' . $post_title . '</a></h2>';

            // Open Author info container
            echo '<div class="author-info">';

            // Get the Author
            $theAuthor = get_the_author();
            $theAuthorID = get_the_author_meta( 'ID' );

            // Get the link to the Author page
            $theAuthorLink = get_author_posts_url( $theAuthorID );

            // Get the categories of the current post
            $category = get_the_category();

            // Assign var to the first category
            $firstCategory = $category[0]->cat_name;

            // Get link to first category
            $firstCategoryLink = get_category_link( $category[0] );

            // Author Image
            echo '<div class="image">';

            echo '<a href="' . $theAuthorLink . '">' . get_avatar( $theAuthorID, 64 ) . '</a>';

            echo '</div>';

            // Author Text
            echo '<div class="author-text">';

            echo '<p class="author-name"><a href="' . $theAuthorLink . '">' . $theAuthor . '</a></p>';

            echo '<p class="post-category"><a href="' . $firstCategoryLink . '">' . $firstCategory . '</a></p>';

            echo '</div>';

            // Close Author info container
            echo '</div>';

            // Close text container
            echo '</div>';

            // Featured Image
            if ( has_post_thumbnail() ) {

                echo '<div class="featured-img">';
                echo '<a href="' . get_the_permalink() . '">';
                echo get_the_post_thumbnail( $post_id, 'featured-article' );
                echo '</a>';
                echo '</div>';

            }

            // Close container
            echo '</div>';

        }

    }

    // Close container
    echo '</div>';

    // JS output
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function ($) {

        /*
        * Featured Articles Slider
		* uses Slick JS by Ken Wheeler
        * configuration options: https://kenwheeler.github.io/slick/
        --------------------------------------------------------------------- */
        $(".blog-header-extras .featured-articles").not(".slick-initialized").slick({
    		autoplay: true,
    		autoplaySpeed: 5000,
    		adaptiveHeight: false,
            slidesToShow: 1,
            slidesToScroll: 1,
    		fade: false,
    		arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><span class="fa fa-angle-left"></span></button>',
            nextArrow: '<button type="button" class="slick-next"><span class="fa fa-angle-right"></span></button>',
            dots: true,
    		infinite: true,
    	});

    });
    </script>
    <?php

    // Save contents to a var
    $output = ob_get_contents();

    // End Output Buffering
    ob_end_clean();

    // Restore original Post Data
    wp_reset_postdata();

    // Return everything
    return $output;

}

//* Blog Header Output
function course_maker_blog_header_output() {

	if ( genesis_is_root_page() || !is_home() && !is_archive() ) {
        return;
	}

	// Get Customizer settings
	$enable_blog_carousel = get_theme_mod( 'enable_blog_carousel', true );
	$enable_blog_categories = get_theme_mod( 'enable_blog_categories', true );

	// Exit if both "disable" Customizer settings are set
	if ( !$enable_blog_carousel && !$enable_blog_categories ) {
		return;
	}

    // Start Output Buffering
    ob_start();

    /* Open full-width container
    ----------------------------------------- */
    echo '<div class="entry-content blog-header-extras">';
    echo '<div class="alignfull" style="padding: 0 8%;">';
    echo '<div class="container-content" style="max-width: 1200px; margin: 0 auto;">';

    /* Featured Articles slider
    ----------------------------------------- */

	if ( $enable_blog_carousel ) {

	    $featured_articles_items = course_maker_show_featured_articles();

	    echo $featured_articles_items;

	}

    /* Categories list
    ----------------------------------------- */

	if ( $enable_blog_categories ) {

	    $categories_list = course_maker_output_category_list();

	    echo $categories_list;

	}

    /* Close full-width container
    ----------------------------------------- */
    echo '</div></div></div>';

    // Put all content into a var
	$content = ob_get_contents();

    // Stop Output Buffering
    ob_end_clean();

    // Display everything
	echo $content;

}
add_action( 'genesis_before_loop', 'course_maker_blog_header_output', 20 );

//* Open blog posts container
function course_maker_blog_posts_wrapper_open() {

    if ( genesis_is_root_page() || !is_home() && !is_archive() ) {
		return;
	}

    // Open container divs
    echo '<div class="entry-content blog-posts-grid">';
    echo '<div class="alignfull">';
    echo '<div class="container-content" style="max-width: 1200px; margin: 0 auto;">';

    //* Show 'New Articles' header text on first Blog page
    if ( is_home() ) {

        // Get value of 'paged' var to determine current page - if null set to 1
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // If this is the first page
        if ( 1 == $paged ) {

            echo '<h2 class="blog-posts-title">' . __( 'New Articles', 'coursemaker' ) . '</h2>';
            /* TODO: MAKE THIS EDITABLE WITH A CUSTOMIZER SETTING */

        }

    }

    echo '<div class="blog-posts-wrapper">';

}
add_action( 'genesis_before_loop', 'course_maker_blog_posts_wrapper_open', 30 );

//* Remove default Pagination
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

//* Close blog posts container
function course_maker_blog_posts_wrapper_close() {

    if ( genesis_is_root_page() || !is_home() && !is_archive() ) {
		return;
	}

    echo '</div>'; // close .blog-posts-wrapper

}
add_action( 'genesis_after_endwhile', 'course_maker_blog_posts_wrapper_close', 20 );

//* Add Pagination after 'blog-posts-wrapper'
function course_maker_reposition_pagination() {

	if ( genesis_is_root_page() || !is_home() && !is_archive() ) {
		return;
	}

    // Default Pagination
    genesis_posts_nav();

    // Close container divs
    echo '</div></div></div>';

}
add_action( 'genesis_after_endwhile', 'course_maker_reposition_pagination', 30 );

//* Open Article Wrapper
function course_maker_open_article_wrap() {

    if ( genesis_is_root_page() || !is_home() && !is_archive() ) {
		return;
	}

    echo '<section class="cm-featured-post widget featured-content post-' . get_the_ID() . ' type-' . get_post_type() . '">';
    echo '<div class="widget-wrap">';

}
add_action( 'genesis_before_entry', 'course_maker_open_article_wrap', 1 );

//* Close Article Wrapper
function course_maker_close_article_wrap() {

    if ( genesis_is_root_page() || !is_home() && !is_archive() ) {
		return;
	}

    echo '</div>';
    echo '</section>';

}
add_action( 'genesis_after_entry', 'course_maker_close_article_wrap', 1 );

//* Open Entry Wrapper
function course_maker_open_entry_wrap() {

    if ( genesis_is_root_page() || !is_home() && !is_archive() ) {
		return;
	}

    echo '<div class="stripe"></div>';
    echo '<div class="wrapper">';

}
add_action( 'genesis_entry_header', 'course_maker_open_entry_wrap', 0 );

//* Close Entry Wrapper
function course_maker_close_entry_wrap() {

    if ( genesis_is_root_page() || !is_home() && !is_archive() ) {
		return;
	}

    echo '</div>';

}
add_action( 'genesis_entry_footer', 'course_maker_close_entry_wrap', 99 );

//* Move featured image to before post title
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );

//* Add Learn More link
function course_maker_add_readmore_link() {

    if ( genesis_is_root_page() || !is_home() && !is_archive() ) {
		return;
	}

    echo '<a href="' . get_the_permalink() . '" class="more-link">' . __( 'Learn More', 'coursemaker' ) . '</a>';

}
add_action( 'genesis_entry_content', 'course_maker_add_readmore_link', 20 );

//* SINGLE POST - Add Featured Image above Post Title
add_action( 'genesis_before_entry', 'course_maker_add_single_post_featured_image', 50 );
function course_maker_add_single_post_featured_image() {

	if ( ! is_singular() ) {
		return;
	}

	if ( has_post_thumbnail() ) {

		$post_id = get_the_ID();

		echo '<div class="featured-image">';
		echo '<div class="stripe"></div>';
		echo '<a href="' . get_the_permalink() . '">';
		echo get_the_post_thumbnail( $post_id, 'featured-image' );
		echo '</a>';
		echo '</div>';

	}

}

//* SINGLE POST - Add extra CSS class to .content element
function course_maker_add_single_post_content_class( $attributes ) {

	if ( ! is_singular() ) {
		return;
	}

	$attributes['class'] = $attributes['class']. ' entry-content';
    return $attributes;

}
add_filter( 'genesis_attr_content', 'course_maker_add_single_post_content_class' );
