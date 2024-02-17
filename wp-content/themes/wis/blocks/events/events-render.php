<?php
/**
 * Events Block
 *
 * @package wis
 * @since 1.0.0
 */

 function render_events_block($attributes) {
    // Extract attributes
    $blockTitle = isset($attributes['blockTitle']) ? $attributes['blockTitle'] : 'Events Block';
    $blockDescription = isset($attributes['blockDescription']) ? $attributes['blockDescription'] : '';
    $numberOfPosts = isset($attributes['numberOfPosts']) ? $attributes['numberOfPosts'] : 5;
    $showFeaturedImage = isset($attributes['showFeaturedImage']) ? $attributes['showFeaturedImage'] : true;
    $linkToDetailPage = isset($attributes['linkToDetailPage']) ? $attributes['linkToDetailPage'] : true;

    // Query events based on attributes
    $event_args = array(
        'post_type' => 'events', // Evets post type slug as per your setup
        'posts_per_page' => $numberOfPosts,
    );
    $events_query = new WP_Query($event_args);

    // Start output buffer
    ob_start();

    // Display block title and description
    if ($blockTitle || $blockDescription) {
        echo '<div class="block-section-head prose">';
        if ($blockTitle) {
            echo '<h2>' . esc_html($blockTitle) . '</h2>';
        }
        if ($blockDescription) {
            echo '<div class="block-description">' . wpautop(esc_html($blockDescription)) . '</div>';
        }
        echo '</div>';
    }

    // Display events
    if ($events_query->have_posts()) :
        echo '<div class="events">';
        while ($events_query->have_posts()) :
            $events_query->the_post();
            $event_date = get_post_meta(get_the_ID(), 'event_date', true);
            $event_location = get_post_meta(get_the_ID(), 'event_location', true);
            $event_summary = get_post_meta(get_the_ID(), 'event_summary', true);
            ?>
            <article class="event pros">
                <h3><?php the_title(); ?></h3>
                <?php if ($event_date) : ?>
                    <p class="event-meta"><strong>Date:</strong> <?php echo esc_html($event_date); ?></p>
                <?php endif; ?>
                <?php if ($event_location) : ?>
                    <p class="event-meta"><strong>Location:</strong> <?php echo esc_html($event_location); ?></p>
                <?php endif; ?>
                <?php if ($showFeaturedImage && has_post_thumbnail()) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                <div class="event-content">
                    <?php echo wpautop(esc_html($event_summary)); ?>
                </div>
                <?php if ($linkToDetailPage) : ?>
                    <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                <?php endif; ?>
            </article>
        <?php endwhile;
        echo '</div>'; // Close .events
        wp_reset_postdata(); // Reset post data
    else :
        ?>
        <p>No events found.</p>
    <?php endif;

    // End output buffer and return content
    return ob_get_clean();
}


 
