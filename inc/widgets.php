<?php
//widget
function testwordpress_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'testwordpress' ),
        'id' => 'sidebar-1',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Second Wiget Area', 'testwordpress' ),
        'id' => 'sidebar-2',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
 
}
add_action( 'widgets_init', 'testwordpress_widgets_init' );