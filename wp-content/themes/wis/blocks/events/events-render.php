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
        echo '<div class="events flex flex-wrap justify-between gap-8 mt-4">';
        $row_counter = 0; // Initialize row counter

        while ($events_query->have_posts()) :
            $events_query->the_post();
            $event_date = get_post_meta(get_the_ID(), 'event_date', true);
            $event_location = get_post_meta(get_the_ID(), 'event_location', true);
            $event_summary = get_post_meta(get_the_ID(), 'event_summary', true);
            $event_category = wp_get_post_terms(get_the_ID(), 'event_category', array('fields' => 'names'));
            ?>
            <article class="event flex flex-col lg:w-[30%] md:w-[45%] w-full">
                <?php if ($showFeaturedImage && has_post_thumbnail()) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                <div class="event-content relative px-4 -mt-16">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <?php if (!empty($event_category)) : ?>
                            <div class="event-category flex items-baseline">
                                <span class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                    <?php echo esc_html(implode(', ', $event_category)); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                        <h4 class="mt-3 text-xl font-semibold uppercase leading-tight truncate"><?php the_title(); ?></h4>
                        <div class="event-summary">
                            <?php echo wpautop(esc_html($event_summary)); ?>
                        </div>
                        <?php if ($event_date) : ?>
                            <div class="event-meta text-gray-600 uppercase text-xs font-semibold tracking-wider mt-2"><strong>Date:</strong> <?php echo esc_html($event_date); ?></div>
                        <?php endif; ?>
                        <?php if ($event_location) : ?>
                            <div class="event-meta text-gray-600 uppercase text-xs font-semibold tracking-wider"><strong>Location:</strong> <?php echo esc_html($event_location); ?></div>
                        <?php endif; ?>
                        <?php if ($linkToDetailPage) : ?>
                            <div class="mt-4">
                                <a href="<?php the_permalink(); ?>" class="read-more text-teal-600 text-md font-semibold">Read More</a>
                            </div>
                        <?php endif; ?>
                    </div>
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
