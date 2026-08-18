<?php

namespace RaccoonSite;

use RaccoonMUFramework\DefaultDataHelper;

/**
 * Class DefaultPageHelper contains static methods which provide basic data for rendering
 * the single view of a built-in page.
 *
 * @package RaccoonSite
 */
class DefaultPageHelper extends DefaultDataHelper
{

    /**
     * Grabs the current (main) WP_Query for a page and retrieves its data.
     * It's nothing else than The Loop in disguise.
     *
     * @return array|null
     */
    public static function getCurrentPageData()
    {
        global $wp_query;
        if (is_main_query() && $wp_query->have_posts()) {
            while ($wp_query->have_posts()) {
                the_post();

                $page_id = get_the_ID();

                return [
                    'ID'             => $page_id,
                    'title'          => get_the_title($page_id),
                    'content'        => apply_filters('the_content', get_the_content()),
                    'featured_image' => get_the_post_thumbnail_url($page_id, 'full'),
                ];
            }
        }

        return null;
    }
}
