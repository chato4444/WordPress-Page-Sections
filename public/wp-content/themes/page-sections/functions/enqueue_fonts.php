<?php
add_action('wp_enqueue_scripts', 'sxs_enqueue_fonts');
function sxs_enqueue_fonts() {
	wp_register_style( 'sxs-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,400,400i,700,700i,900&display=swap', false );
	wp_enqueue_style( 'sxs-google-fonts');
}