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
    // Retrieve current value of the fields
    $event_date = get_post_meta($post->ID, 'event_date', true);
    $event_location = get_post_meta($post->ID, 'event_location', true);

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
    <?php
}

// Add Short Description below the title
function wis_events_display_short_description_field($post) {
    // Retrieve current value of the field
    $short_description = get_post_meta($post->ID, 'short_description', true);
    ?>
    <div id="short-description-block">
        <label for="short_description"><?php _e('Short Description', 'wis-events'); ?></label><br>
        <textarea id="short_description" name="short_description" style="width: 100%;"><?php echo esc_textarea($short_description); ?></textarea>
    </div>
    <?php
    // Add nonce field for security
    wp_nonce_field('save_event_details', 'event_details_nonce');
}
add_action('edit_form_after_title', 'wis_events_display_short_description_field');
