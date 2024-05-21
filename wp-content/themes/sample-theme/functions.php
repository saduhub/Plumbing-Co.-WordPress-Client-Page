<?php

function enqueue_main_styles() {
    wp_enqueue_style( 'main_styles', get_stylesheet_uri());
}

add_action( 'wp_enqueue_scripts', 'enqueue_main_styles' );
