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
        'post_type' => 'events', // Adjust post type slug as per your setup
        'posts_per_page' => $numberOfPosts,
    );
    $events_query = new WP_Query($event_args);

    // Start output buffer
    ob_start();

    // Display block title and description
    if ($blockTitle) {
        echo '<h2>' . esc_html($blockTitle) . '</h2>';
    }
    if ($blockDescription) {
        echo wpautop(esc_html($blockDescription));
    }

    // Display events
    if ($events_query->have_posts()) :
        while ($events_query->have_posts()) :
            $events_query->the_post();
            ?>
            <div class="event">
                <?php if ($showFeaturedImage && has_post_thumbnail()) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                <div class="event-content">
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <?php if ($linkToDetailPage) : ?>
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata(); // Reset post data
    else :
        ?>
        <p>No events found.</p>
    <?php endif;

    // End output buffer and return content
    return ob_get_clean();
}

 
