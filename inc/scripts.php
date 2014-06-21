<?php
/**
 * Enqueue scripts and styles
 */
function testwordpress_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array('jquery'), '20120206', true );

 
}
add_action( 'wp_enqueue_scripts', 'testwordpress_scripts' );
