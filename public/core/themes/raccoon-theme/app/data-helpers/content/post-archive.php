<?php
declare(strict_types=1);

namespace RaccoonTheme;

/**
 * Grabs the main query for archive(index) page and retrieves the post data.
 * It's nothing else than The Loop in disguise
 * @return array
 */
function get_current_posts_list()
{
    global $wp_query;
    $posts = [];

    if (is_main_query() && $wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            the_post();

            $posts[] = get_post_card_data(
                get_the_ID()
            );
        }
    }

    return $posts;
}
