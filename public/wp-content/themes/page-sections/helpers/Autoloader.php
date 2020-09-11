<?php

/**
 * new Custom_Class -> folder/Custom_Class.php
 *
 * Class Autoloader
 */
class Autoloader {
    // Unable to concat class const in PHP 5.5.36
    //const FUNCTIONS_DIR = THEME_ROOT . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR;

    /**
     * Check the following folders for class files
     *
     * @var array
     */
    protected static $paths = array(
        'helpers',
    );

    public static function addPath( $path ) {
        $path = realpath( $path );
        if ( $path ) {
            self::$paths[] = $path;
        }
    }

    /**
     * @param $class
     */
    public static function load( $class ) {
        $classPath = $class . '.php';
        foreach ( self::$paths as $path ) {
            if ( is_file( THEME_ROOT . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $classPath ) ) {
                require_once THEME_ROOT . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $classPath;

                return;
            }
        }
    }

    /**
     * Load all php files in functions directory
     */
    public static function loadFunctionFiles() {
        $files = glob( THEME_ROOT . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . '/*.php' );

        foreach ( $files as $file ) {
            require_once( $file );
        }

        return;
    }
}

spl_autoload_register( array( 'Autoloader', 'load' ) );