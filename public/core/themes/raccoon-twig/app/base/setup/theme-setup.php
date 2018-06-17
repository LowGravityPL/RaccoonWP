<?php
declare(strict_types=1);

namespace RaccoonTheme;

add_action('after_setup_theme', __NAMESPACE__ . '\\setup_theme');
add_action('init', __NAMESPACE__ . '\\initialize_asset_loader_class');

/**
 * Theme setup, add various supports
 */
function setup_theme()
{
    /**
     * Enable post thumbnails
     * @link http://codex.wordpress.org/Post_Thumbnails
     */
    add_theme_support('post-thumbnails');

    /**
     * Add support for custom logo.
     *
     * @see https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
     */
    add_theme_support('custom-logo');

    /**
     * Create Proper WordPress Titles
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
     */
    add_theme_support('title-tag');

    /**
     * Enable HTML5 markup support
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
    ]);
}

/**
 * Initializes assets loader
 *
 * todo: find a better localization for this. Use app container?
 */
function initialize_asset_loader_class()
{
    require_once(__DIR__ . '/../lib/AssetsLoader.php');
    new AssetsLoader('', 'dist/assets-manifest.json');
}