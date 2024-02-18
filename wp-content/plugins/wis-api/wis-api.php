<?php
/*
Plugin Name: Wis API
Description: Adds a custom block for displaying api fetched records.
Version: 1.0
Author: Abdul Wahab
Text Domain: wis-api
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Initialize the Gutenberg block
function wis_api_block_init() {
    // Register the block type using the register_block_type function
	register_block_type( __DIR__ . '/build/api-block' );
}
// Hook the block initialization function into the 'init' action
add_action( 'init', 'wis_api_block_init' );