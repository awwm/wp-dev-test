<?php
// Save Custom Fields
function wis_events_save_custom_fields($post_id) {
    // Check if nonce is set
    if (!isset($_POST['event_details_nonce'])) {
        return $post_id;
    }
    // Verify nonce
    if (!wp_verify_nonce($_POST['event_details_nonce'], 'save_event_details')) {
        return $post_id;
    }
    // Check if autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    // Save fields
    update_post_meta($post_id, 'event_date', sanitize_text_field($_POST['event_date']));
    update_post_meta($post_id, 'event_location', sanitize_text_field($_POST['event_location']));
    update_post_meta($post_id, 'short_description', sanitize_text_field($_POST['short_description']));
}
add_action('save_post', 'wis_events_save_custom_fields');