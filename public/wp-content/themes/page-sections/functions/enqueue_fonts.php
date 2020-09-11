<?php
add_action('wp_enqueue_scripts', 'page_sections_enqueue_fonts');
function page_sections_enqueue_fonts() {
	wp_register_style( 'page-sections-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400,400i,700,700i,900&display=swap', false );
	wp_enqueue_style( 'page-sections-google-fonts');
}