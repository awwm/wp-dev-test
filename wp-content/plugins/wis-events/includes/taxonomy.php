<?php
// Register Custom Taxonomy
function wis_events_register_taxonomy() {
    register_taxonomy(
        'event_category',
        'events',
        array(
            'label' => __('Event Categories', 'wis-events'),
            'rewrite' => array('slug' => 'event-category'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'wis_events_register_taxonomy');
