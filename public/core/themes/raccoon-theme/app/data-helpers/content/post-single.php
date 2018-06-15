<?php
declare(strict_types=1);

namespace RaccoonTheme;

/**
 * Grabs the current (main) WP_Query for single post page
 * It's nothing else as regular The Loop in disguise.
 *
 * @return array|null
 */
function get_current_post_data()
{
    global $wp_query;
    if (is_main_query() && $wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            the_post();

            return [
                'title'   => get_the_title(),
                'content' => apply_filters('the_content', get_the_content()),
            ];
        }
    }

    return null;
}
