<?php
add_action( 'wp_enqueue_scripts', function () {
	wp_deregister_script( 'wp-embed' );

	if ( ! is_admin() ) {
		// Update jQuery version
		wp_deregister_script( 'jquery-core' );
		wp_register_script( 'jquery-core', "https://code.jquery.com/jquery-3.5.1.min.js", array(), '3.5.1', true );
		wp_deregister_script( 'jquery-migrate' );
		wp_register_script( 'jquery-migrate', "https://code.jquery.com/jquery-migrate-3.3.1.min.js", array(), '3.3.1', true );

		// Move jQuery to footer
		wp_scripts()->add_data( 'jquery', 'group', 1 );
		wp_scripts()->add_data( 'jquery-core', 'group', 1 );
		wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
	}

	//Examples
	/*
	wp_register_script( 'swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.6/js/swiper.min.js', array( 'jquery' ), '4.2.6', true );
	wp_enqueue_script( 'swiper-js' );

	wp_register_script( 'match-height', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js', array( 'jquery' ), '0.7.2', true );
	wp_enqueue_script( 'match-height' );

	wp_register_script( 'form-validator', '//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'form-validator' );
	*/

	if ( ! is_admin() ) {
		wp_register_script( 'pagesections-main', Asset_Version::getVersionParam( '/js/main.min.js#async' ), array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'pagesections-main' );
	}
} );

/**
 * Add async attribute to script tag by appending #async to script URL
 *
 * Ex: /js/main.min.js#async
 */
add_filter('clean_url', function( $url ) {
	if ( strpos( $url, '#async' ) === false ) {
		return $url;
	}

	if ( is_admin() ) {
		return str_replace( '#async', '', $url );
	}

	return str_replace( '#async', '', $url ) . "' async='async";

}, 11, 1);