<?php
/*
My assets
*/

// CSS
function themeslug_enqueue_style() {
	wp_enqueue_style( 'libraries', get_stylesheet_directory_uri() . '/wos/dist/css/libraries.min.css', false );
	wp_enqueue_style( 'templates', get_stylesheet_directory_uri() . '/wos/dist/css/templates.min.css', false );
}
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );

// JS
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
function themeslug_enqueue_script() {
	wp_enqueue_script( 'bootstrap-scripts', get_stylesheet_directory_uri() . '/wos/lib/bootstrap/js/bootstrap.bundle.js',array( 'jquery' ),'',true);
	wp_enqueue_script( 'libraries', get_stylesheet_directory_uri() . '/wos/dist/js/libraries.min.js',array( 'jquery' ),'',true);
	wp_enqueue_script( 'templates', get_stylesheet_directory_uri() . '/wos/dist/js/templates.min.js',array( 'jquery' ),'',true);
}
add_action('wp_enqueue_scripts','themeslug_enqueue_script');
