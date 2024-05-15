<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css');
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ), wp_get_theme()->get('Version') );
}

function my_theme_add_editor_styles() {
    add_editor_style('style.css'); 
}

add_action('admin_init', 'my_theme_add_editor_styles');

