<?php

function custom_post_types() {
    register_post_type (
        'event',
        array(
            // Create event related permission and stops treating this custom post type as a regular post type.
            'capability_type' => 'event',
            'map_meta_cap' => true,
            // Excerpt support on WP Admin panel. Spell out what parts are wanted with modern support. 'custom-fields' added below alongside wp admin panel custom field creator, but plugin for custom fields will be used instead. 
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
                'all_items' => 'All Programs',
                'singular_name' => 'Program'
            ),
            'menu_icon' => 'dashicons-admin-generic'
        )
    );

    register_post_type (
        'program',
        array( 
            'supports' => array('title', 'editor'),
            'rewrite' => array('slug'=> 'programs'),
            'has_archive' => true,
            'public' => true,
            // Use modern block editor. (Relies on JS)
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Programs',
                'add_new_item' => 'Add New Program',
                'edit_item' => 'Edit Program',
                'all_items' => 'All Custom Posts',
                'singular_name' => 'Custom Post'
            ),
            'menu_icon' => 'dashicons-admin-generic'
        )
    );

    register_post_type (
        'professor',
        array( 
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug'=> 'professors'),
            'has_archive' => true,
            'public' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Professors',
                'add_new_item' => 'Add New Professor',
                'edit_item' => 'Edit Professor',
                'all_items' => 'All Professors',
                'singular_name' => 'Professor'
            ),
            'menu_icon' => 'dashicons-admin-generic'
        )
    );

    register_post_type (
        'campus',
        array( 
            'capability_type' => 'event',
            'map_meta_cap' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug'=> 'campuses'),
            'has_archive' => true,
            'public' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Campuses',
                'add_new_item' => 'Add New Campus',
                'edit_item' => 'Edit Campus',
                'all_items' => 'All Campuses',
                'singular_name' => 'Campus'
            ),
            'menu_icon' => 'dashicons-admin-generic'
        )
    );

    register_post_type('note', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor'),
        'public' => false,
        'show_ui' => true,
        'labels' => array(
          'name' => 'Notes',
          'add_new_item' => 'Add New Note',
          'edit_item' => 'Edit Note',
          'all_items' => 'All Notes',
          'singular_name' => 'Note'
        ),
        'menu_icon' => 'dashicons-admin-generic'
    ));
}

add_action('init', 'custom_post_types');

?>