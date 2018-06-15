<?php

namespace RaccoonMUFramework;

/**
 * Parse the WP_Query posts based on the callbacks per post type.
 *
 * @param array               $settings {
 * @type array                $post_ids optional
 * @type array|string         $post_type required Pass as string i.e. 'post_type' or an array ['post_type1', 'post_type2']
 * @type array                $per_page Define how many posts you want to retrieve on page.
 * @type array                $query_args Query args supported by \WP_Query
 * }
 * @param Callable|Callable[] $parseCallback Pass simple callback to parse all the data based on \WP_Post class or pass and array of callbacks with key named with post_type.
 * @see [Link to the documentation]
 *
 * @return array
 */
function get_entity_list($settings = [], $parseCallback)
{
    // Pagination settings
    $posts_per_page = isset($settings[ 'per_page' ]) && intval($settings[ 'per_page' ]) ? $settings[ 'per_page' ] : -1;
    $per_page       = isset($_POST[ 'data' ][ 'per_page' ]) ? intval($_POST[ 'data' ][ 'per_page' ]) : $posts_per_page; // Per page ajax handling.
    $page           = isset($_POST[ 'data' ][ 'page' ]) ? intval($_POST[ 'data' ][ 'page' ]) : 1;
    $offset         = $per_page * ($page - 1);

    // WordPress query settings.
    $settings[ 'query_args' ] = isset($settings[ 'query_args' ]) && is_array($settings[ 'query_args' ]) ? $settings[ 'query_args' ] : [];
    $settings[ 'post_type' ]  = isset($settings[ 'post_type' ]) ? $settings[ 'post_type' ] : [];

    // Bail early since there is not data to be retrieved, as there is no post_type given.
    if (empty($settings[ 'post_type' ])) {
        // Return standard array schema to prevent ajax calls failing.
        return [
            'found_posts'   => 0,
            'max_num_pages' => 1,
            'current_page'  => 1,
            'data'          => [],
        ];
    }

    // Use of union to disable overriding defaults.
    $data_query_args = [
            'posts_per_page' => $per_page,
            'offset'         => $offset,
            'post_type'      => $settings[ 'post_type' ],
            'post_status'    => 'publish',
        ] + $settings[ 'query_args' ];

    // Limit posts only to given ids.
    if (isset($settings[ 'post_ids' ]) && ! empty($settings[ 'post_ids' ])) {
        $data_query_args[ 'post__in' ] = $settings[ 'post_ids' ];
    }

    $data_query = new \WP_Query($data_query_args);
    $objects    = [];

    // Add required info for pagination.
    $output = [
        'found_posts'   => $data_query->found_posts,
        'max_num_pages' => $data_query->max_num_pages,
        'current_page'  => $page,
    ];

    if ($data_query->have_posts()) {
        $i = 0;
        while ($data_query->have_posts()) {
            // Get post type to choose the right parser function.
            $data_query->the_post();
            $post_type = $data_query->post->post_type;

            // Calling parsing function based on passed callback.
            if (is_array($parseCallback) && isset($parseCallback[ $post_type ])) {
                if (is_array($parseCallback[ $post_type ])) {
                    // ['post_type1' => [ $classInstance, 'methodName']]
                    if (method_exists(...$parseCallback[ $post_type ])) {
                        $objects[ $i ] = call_user_func_array($parseCallback[ $post_type ], [$data_query->post]);
                    }
                } elseif (function_exists($parseCallback[ $post_type ])) {
                    // ['post_type1' => 'callback']
                    $objects[ $i ] = call_user_func_array($parseCallback[ $post_type ], [$data_query->post]);
                }

            } elseif (is_array($parseCallback)) {
                // [ $objInstance, 'method']
                if (method_exists(... $parseCallback)) {
                    $objects[ $i ] = call_user_func_array($parseCallback, [$data_query->post]);
                }
            } else {
                // 'parse_function'
                if (function_exists($parseCallback)) {
                    $objects[ $i ] = call_user_func_array($parseCallback, [$data_query->post]);
                }
            }

            $objects[ $i ][ 'post_type' ] = $post_type;
            $i++;
        }
        // Restore original Post Data
        wp_reset_postdata();
    }
    $output[ 'data' ] = $objects;

    return $output;
}