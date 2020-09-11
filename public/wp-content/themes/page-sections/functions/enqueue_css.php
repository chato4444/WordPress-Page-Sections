<?php
/**
 * Styles included in head
 */
add_action('wp_enqueue_scripts', function() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' );

    // https://linearicons.com/free
    wp_register_style( 'linear-icons', 'https://cdn.linearicons.com/free/1.0.0/icon-font.min.css', '', '1.0', 'all' );
    wp_enqueue_style( 'linear-icons' );

    wp_register_style( 'main', Asset_Version::getVersionParam( '/css/main.css' ) );
    wp_enqueue_style( 'main' );
}, 101);

/**
 * Styles included in footer
 */
add_action( 'get_footer', function() {
    /**
     * To load styles in the footer (if using something like Critical CSS):
     */
	/*
	wp_register_style( 'main', Asset_Version::getVersionParam( '/css/main.css' ) );
	wp_enqueue_style( 'main' );
	*/
});