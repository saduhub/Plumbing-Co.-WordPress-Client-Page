<?php

function enqueue_main_styles() {
    wp_enqueue_script('main_js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('google_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font_awesome_icons', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('extra_styles', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'enqueue_main_styles');

function theme_features() {
    // Register menus that can be modified from admin portal.
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerLocationOne', 'Footer Location One');
    register_nav_menu('footerLocationTwo', 'Footer Location Two');
    // Add title tag to each tab.
    add_theme_support('title-tag');
    // Add featured image support for blog posts (Need to add thumbnail param when registering professor post type.)
    add_theme_support('post-thumbnails');
}
// After setup theme, call theme_features function.
add_action('after_setup_theme', 'theme_features');

// Manipulate default URL based queries.
function adjust_events_query($query) {
    if (!is_admin() AND is_post_type_archive('program') AND $query-> is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC'); 
        $query->set('posts_per_page', -1);  
    }

    if (!is_admin() AND is_post_type_archive('event') AND $query-> is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date'); 
        $query->set('orderby', 'meta_value_num'); 
        $query->set('order', 'ASC'); 
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )
        )); 
    }
}

add_action('pre_get_posts', 'adjust_events_query');
