<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title><?php wp_title(); ?></title>

    <link rel="dns-prefetch" href="https://fonts.googleapis.com/"/>
    <link rel="preload" as="font" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css"/>

    <link rel="icon" href="<?php echo get_site_url(); ?>/favicon-32x32.png" sizes="32x32"/>
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_site_url(); ?>/favicon-512x512.png"/>
    <meta name="msapplication-TileImage" content="<?php echo get_site_url(); ?>/favicon-512x512.png"/>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="main-container">
        <header>
            Header
        </header>