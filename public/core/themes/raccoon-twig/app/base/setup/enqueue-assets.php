<?php
declare(strict_types=1);

namespace RaccoonTheme;

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\add_theme_assets');

/**
 * Enqueues basic theme styles and scripts
 */
function add_theme_assets()
{
    wp_enqueue_style(
        'raccoonwp-main-css',
        get_asset_path('app.css'),
        false,
        null
    );

    wp_enqueue_script(
        'raccoon-main-js',
        get_asset_path('app.js'),
        ['jquery'],
        null,
        true
    );
}