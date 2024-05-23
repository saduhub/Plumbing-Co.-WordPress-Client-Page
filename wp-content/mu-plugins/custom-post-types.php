<?php

function custom_post_types() {
    register_post_type (
        'event',
        array(
            'public' => true,
            'labels' => array(
                'name' => 'Custom Post Type'
            ),
            'menu_icon' => 'dashicons-admin-generic'
        )
    );
}

add_action('init', 'custom_post_types');

?>