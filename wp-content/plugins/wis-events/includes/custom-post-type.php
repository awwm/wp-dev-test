<?php
// Register Custom Post Type
function wis_events_register_post_type() {
    register_post_type('events',
        array(
            'labels' => array(
                'name' => __('Events', 'wis-events'),
                'singular_name' => __('Event', 'wis-events')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-calendar-alt',
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'wis_events_register_post_type');
