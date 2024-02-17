<?php
/*
Plugin Name: Wis Events
Description: Adds a custom post type for Events.
Version: 1.0
Author: Abdul Wahab
Text Domain: wis-events
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files.
require_once plugin_dir_path(__FILE__) . 'includes/custom-post-type.php';
require_once plugin_dir_path(__FILE__) . 'includes/taxonomy.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-box.php';
require_once plugin_dir_path(__FILE__) . 'includes/custom-fields.php';

// Activation hook.
register_activation_hook(__FILE__, 'wis_events_activate');
function wis_events_activate() {
    // Add activation tasks here.
}

// Deactivation hook.
register_deactivation_hook(__FILE__, 'wis_events_deactivate');
function wis_events_deactivate() {
    // Add deactivation tasks here.
}
