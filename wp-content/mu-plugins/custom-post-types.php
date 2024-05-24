<?php

function custom_post_types() {
    register_post_type (
        'event',
        array(
            // Excerpt support on WP Admin panel. Spell out what parts are wanted with modern support.
            'supports' => array('title', 'editor', 'excerpt'),
            // Custom slug
            'rewrite' => array('slug'=> 'events'),
            // To show all custom posts in one page
            'has_archive' => true,
            'public' => true,
            // Use modern block editor. (Relies on JS)
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Custom Post Type',
                'add_new_item' => 'Add New Event',
                'edit_item' => 'Edit Event',
                'all_items' => 'All Custom Posts',
                'singular_name' => 'Custom Post'
            ),
            'menu_icon' => 'dashicons-admin-generic'
        )
    );
}

add_action('init', 'custom_post_types');

?>