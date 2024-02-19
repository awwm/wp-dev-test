<?php
// Add Custom Fields Meta Box
function wis_events_add_meta_box() {
    add_meta_box(
        'event_details',
        __('Event Details', 'wis-events'),
        'wis_events_display_meta_box',
        'events',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'wis_events_add_meta_box');

// Display Custom Fields
function wis_events_display_meta_box($post) {
    // Add nonce field
    wp_nonce_field('save_event_details', 'event_details_nonce');
    
    // Retrieve current value of the fields
    $event_date = get_post_meta($post->ID, 'event_date', true);
    $event_location = get_post_meta($post->ID, 'event_location', true);
    $event_summary = get_post_meta($post->ID, 'event_summary', true);

    // HTML for fields
    ?>
    <p>
        <label for="event_date"><?php _e('Event Date', 'wis-events'); ?></label>
        <input type="date" id="event_date" name="event_date" value="<?php echo esc_attr($event_date); ?>" />
    </p>
    <p>
        <label for="event_location"><?php _e('Event Location', 'wis-events'); ?></label>
        <input type="text" id="event_location" name="event_location" value="<?php echo esc_attr($event_location); ?>" />
    </p>
    <p>
        <label for="event_summary"><?php _e('Event Summary', 'wis-events'); ?></label><br>
        <textarea id="event_summary" name="event_summary" style="width: 100%;"><?php echo esc_textarea($event_summary); ?></textarea>
    </p>
    <?php
}
