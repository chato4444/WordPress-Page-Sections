<?php
define( 'THEME_ROOT', dirname( __FILE__ ) );

/**
 * Init helpers autoloader
 *
 * Files loaded in 'helper/' directory should match the class name.
 * Ex:
 * Page_Sections_Settings.php > class Page_Sections_Settings {}
 */
require_once( 'helpers/Autoloader.php' );

// Generic theme setup tasks - load prior to other functions
require_once( 'functions/theme_support.php' );

/**
 * Init function files autoloader
 *
 * All php files will be loaded in the 'functions/' directory.
 */
Autoloader::loadFunctionFiles();

