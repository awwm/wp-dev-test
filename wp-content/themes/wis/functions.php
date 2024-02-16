<?php
// Enqueue stylesheets and scripts
function wis_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('wis-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'wis_enqueue_scripts');
