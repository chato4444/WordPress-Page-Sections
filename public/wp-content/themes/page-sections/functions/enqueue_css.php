<?php
/**
 * Styles included in head
 */
add_action('wp_enqueue_scripts', function() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' );

    wp_register_style( 'main', Asset_Version::getVersionParam( '/css/main.css' ) );
    wp_enqueue_style( 'main' );

	// EXTERNAL EXAMPLES
	/*
	wp_register_style( 'ico-moon', 'https://s3.amazonaws.com/icomoon.io/123456/EXAMPLE/style.css?331cn9', '', '1.0', 'all' );
	wp_enqueue_style( 'ico-moon' );
	*/

	/*
	wp_register_style( 'swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.6/css/swiper.min.css', '', '1.0', 'all' );
	wp_enqueue_style( 'swiper-js' );
	*/



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