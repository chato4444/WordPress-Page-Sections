<?php
// Add slug to body class
add_filter( 'body_class', function ( $classes ) {
    global $post;
    if ( is_home() ) {
        $key = array_search( 'blog', $classes );
        if ( $key > - 1 ) {
            unset( $classes[ $key ] );
        }

        $classes[] = sanitize_html_class( "page--homepage" );
    } elseif ( is_page() ) {
        $classes[] = sanitize_html_class( "page--" . $post->post_name );
    } elseif ( is_singular() ) {
        $classes[] = sanitize_html_class( "post--" . $post->post_name );
    }

    return $classes;
} );