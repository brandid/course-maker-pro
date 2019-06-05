<?php

//* Get the content excerpt
$original_content = get_the_excerpt();

// Number of chars to show - set in Genesis Settings
$char_limit = (int) genesis_get_option( 'content_archive_limit' );

// String to append after trimmed chars
$append_string = '...';

// If content is less than or equal to char length, append_string should be empty
if ( strlen( $original_content ) <= $char_limit ) {
    $append_string = '';
}

$the_content = substr( $original_content, 0, $char_limit ) . $append_string;

echo '<section class="cm-featured-post widget featured-content post-' . get_the_ID() . ' type-' . get_post_type() . '">';
    echo '<div class="widget-wrap">';
        echo '<article class="entry">';
            echo '<div class="stripe"></div>';
            echo '<div class="wrapper">';

                // IMG
                echo '<a class="block-link" href="' . get_permalink() . '">' . get_the_post_thumbnail() . '</a>';

                // TITLE
        		echo '<header class="entry-header"><h4 class="entry-title" itemprop="headline"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4></header>';

                // START CONTENT
                echo '<div class="entry-content">';

                // EXCERPT
                echo $the_content;

                // LEARN MORE LINK
                echo '<a href="' . get_the_permalink() . '" class="more-link">Learn More</a>';

                // END CONTENT
                echo '</div>';

            echo '</div>';
        echo '</article>';
    echo '</div>';
echo '</section>';
