<?php

namespace RaccoonSite;

use RaccoonMUFramework\DefaultDataHelper;

/**
 * Class DefaultPostHelper contains static methods which provide basic data for rendering archive
 * and single view for built-in post.
 *
 * @package RaccoonSite
 */
class DefaultPostHelper extends DefaultDataHelper
{

    /**
     * Grabs the main query for archive(index) page and retrieves the post data.
     * It's nothing else than The Loop in disguise
     * @return array
     */
    public static function getCurrentPostsList()
    {
        global $wp_query;
        $posts = [];

        if (is_main_query() && $wp_query->have_posts()) {
            while ($wp_query->have_posts()) {
                the_post();

                $posts[] = self::getPostCardData(
                    get_the_ID()
                );
            }
        }

        return $posts;
    }

    /**
     * Retrieves the data for single post to be used to generate post-card view
     *
     * @param $post_id
     * @return array
     */
    public static function getPostCardData($post_id)
    {
        $post_tags       = get_the_tags($post_id) ?: [];
        $post_class      = get_post_class('', $post_id);
        $post_categories = get_the_category($post_id) ?: [];

        //todo: extract to a helper [Lucas]
        if ( ! empty($post_tags)) {
            $post_tags = array_map(function ($tag) {
                return $tag->name;
            }, $post_tags);
        }

        if ( ! empty($post_categories)) {
            $post_categories = array_map(function ($cat) {
                return $cat->name;
            }, $post_categories);
        }

        //todo: ensure that we use post_id everywhere
        return [
            'ID'                 => $post_id,
            'class'              => implode(' ', $post_class),
            'permalink'          => get_post_permalink($post_id),
            'title'              => get_the_title($post_id),
            'featured_image'     => get_the_post_thumbnail_url($post_id),
            'excerpt'            => get_the_excerpt($post_id),
            'author_name'        => get_the_author(),
            'author_archive_url' => get_author_posts_url(get_the_author_meta('ID')),
            'date'               => get_the_date($post_id),
            'tags'               => implode(', ', $post_tags),
            'categories'         => implode(', ', $post_categories),
        ];
    }

    /**
     * Grabs the current (main) WP_Query for single post page
     * It's nothing else as regular The Loop in disguise.
     *
     * @return array|null
     */
    public static function getCurrentPostData()
    {
        global $wp_query;
        if (is_main_query() && $wp_query->have_posts()) {
            while ($wp_query->have_posts()) {
                the_post();

                return [
                    'ID'      => get_the_ID(),
                    'title'   => get_the_title(),
                    'content' => apply_filters('the_content', get_the_content()),
                ];
            }
        }

        return null;
    }
}
