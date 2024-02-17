<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wis
 * @since 1.0.0
 */

// Enqueue stylesheets and scripts

function wis_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style(
        'wis-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get( 'Version' )
    );

    // Enqueue built CSS file
    wp_enqueue_style(
        'wis-main-style',
        get_template_directory_uri() . '/dist/css/style.css',
        [],
        wp_get_theme()->get( 'Version' )
    );

    // Enqueue built JavaScript file
    wp_enqueue_script(
        'wis-main-script',
        get_template_directory_uri() . '/dist/js/app.min.js',
        ['wp-element'],
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action('wp_enqueue_scripts', 'wis_enqueue_scripts');

function register_events_block_script() {
    wp_enqueue_script(
        'event-block-script', // Handle
        get_template_directory_uri() . '/blocks/events/events.js', // Path to JavaScript file
        array('wp-blocks', 'wp-components', 'wp-element', 'wp-block-editor'), // Dependencies
        wp_get_theme()->get( 'Version' ), // Version number
        true // In footer
    );

    wp_enqueue_style(
        'block-editor-styles', // Handle
        get_template_directory_uri() . '/dist/css/backend-style.css', // Path to compiled CSS file
        array(), // Dependencies
        wp_get_theme()->get( 'Version' ), // Version number
        'all' // Media
    );
}
add_action('enqueue_block_editor_assets', 'register_events_block_script');

function render_events() {
    // Include the file containing your custom block class
    require_once get_template_directory() . '/blocks/events/events-render.php';

    register_block_type(
        'wis/events', // Block name (must match the name used in JavaScript registration)
        array(
            'render_callback' => 'render_events_block', // Callback function for rendering
        )
    );
}
add_action('init', 'render_events');

