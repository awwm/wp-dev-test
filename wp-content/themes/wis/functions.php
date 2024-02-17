<?php
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
