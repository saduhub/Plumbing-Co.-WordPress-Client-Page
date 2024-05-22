<?php

function enqueue_main_styles() {
    wp_enqueue_style( 'font_awesome_icons', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style( 'main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style( 'extra_styles', get_theme_file_uri('/build/index.css'));
}

add_action( 'wp_enqueue_scripts', 'enqueue_main_styles' );
