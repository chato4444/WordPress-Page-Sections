<?php


// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'menus' );
    load_theme_textdomain( 'pagesections', get_template_directory() . '/languages' );
}

add_action( 'init', function () {
    register_nav_menus( array( // Using array to specify more menus if needed
        'header-menu' => __( 'Header Menu', 'pagesections' ), // Main Navigation
        'footer-menu' => __( 'Footer Menu', 'pagesections' ), // Main Navigation
    ) );
} );

// Remove surrounding <div> from WP Navigation
add_filter( 'wp_nav_menu_args', function ( $args = '' ) {
    $args['container'] = false;

    return $args;
} );

// Remove invalid rel attribute
add_filter( 'the_category', function ( $thelist ) {
    return str_replace( 'rel="category tag"', 'rel="tag"', $thelist );
} );

// Remove inline Recent Comment Styles from wp_head()
add_action( 'widgets_init', function () {
    global $wp_widget_factory;
    remove_action( 'wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style',
    ) );
} );

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );

    return $html;
}

// Remove width and height dynamic attributes to thumbnails
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
// Remove width and height dynamic attributes to post images
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );


/* BEGIN SVG capabilities */
add_filter( 'upload_mimes', function( $mimes ){
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
});

/**
 * Enqueue SVG javascript and stylesheet in admin
 */
add_action( 'admin_enqueue_scripts', function( $hook ){
    wp_enqueue_style( 'admin-svg-style', get_theme_file_uri( '/css/admin/svg.css' ) );
    wp_enqueue_script( 'admin-svg-script', get_theme_file_uri( '/js/admin/wp-svg.js' ), 'jquery' );
    wp_localize_script( 'admin-svg-script', 'script_vars',
        array( 'AJAXurl' => admin_url( 'admin-ajax.php' ) ) );
});

/**
 * Ajax get_attachment_url_media_library
 */
add_action( 'wp_ajax_svg_get_attachment_url', function(){
    $url          = '';
    $attachmentID = isset( $_REQUEST['attachmentID'] ) ? $_REQUEST['attachmentID'] : '';
    if ( $attachmentID ) {
        $url = wp_get_attachment_url( $attachmentID );
    }

    echo $url;

    die();
});

/**
 * Remove type attribute from scripts - avoid validation errors
 */
add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);