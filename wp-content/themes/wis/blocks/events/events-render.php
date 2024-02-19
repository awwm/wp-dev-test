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
            echo '<div class="block-description">' . wpautop($blockDescription) . '</div>';
        }
        echo '</div>';
    }

    // Display events
    if ($events_query->have_posts()) :
        echo '<div class="events">';
        $row_counter = 0; // Initialize row counter

        while ($events_query->have_posts()) :
            $events_query->the_post();
            $event_date = get_post_meta(get_the_ID(), 'event_date', true);
            $event_location = get_post_meta(get_the_ID(), 'event_location', true);
            $event_summary = get_post_meta(get_the_ID(), 'event_summary', true);
            $event_category = wp_get_post_terms(get_the_ID(), 'event_category', array('fields' => 'names'));
            ?>
            <article class="event prose flex <?php echo $row_counter % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse'; ?> flex-col w-full max-w-full gap-8">
                <?php if ($showFeaturedImage && has_post_thumbnail()) : ?>
                    <div class="featured-image md:w-3/5 w-full">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                <div class="event-content md:w-2/5 w-full">
                    <h3><?php the_title(); ?></h3>
                    <?php if (!empty($event_category)) : ?>
                        <p class="event-category"><?php echo esc_html(implode(', ', $event_category)); ?></p>
                    <?php endif; ?>
                    <?php if ($event_date) : ?>
                        <p class="event-meta"><strong>Date:</strong> <?php echo esc_html($event_date); ?></p>
                    <?php endif; ?>
                    <?php if ($event_location) : ?>
                        <p class="event-meta"><strong>Location:</strong> <?php echo esc_html($event_location); ?></p>
                    <?php endif; ?>
                    <div class="event-summary">
                        <?php echo wpautop(esc_html($event_summary)); ?>
                    </div>
                    <?php if ($linkToDetailPage) : ?>
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                    <?php endif; ?>
                </div>
                <div style="clear:both;"></div>
            </article>
        <?php $row_counter++; // Increment row counter
            endwhile;
        echo '</div>'; // Close .events
        wp_reset_postdata(); // Reset post data
    else :
        ?>
        <p>No events found.</p>
    <?php endif;

    // End output buffer and return content
    return ob_get_clean();
}
