<?php
add_filter( 'body_class', function ( $classes ) {
    if (basename( get_page_template() ) !== 'page-sections.php' ) {
        return $classes;
    }
    $classes[] = 'page-sections';

    return $classes;
} );