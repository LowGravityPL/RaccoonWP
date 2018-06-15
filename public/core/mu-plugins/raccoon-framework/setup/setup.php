<?php
declare(strict_types=1);

/**
 * Register default WP themes directory (to get WP Core themes)
 */
if ( ! defined('WP_DEFAULT_THEME')) {
    register_theme_directory(ABSPATH . 'wp-content/themes');
}

/**
 * Disallow indexing of the site on non-PROD environment
 */
if (defined('WP_ENV') && WP_ENV !== 'production' && ! is_admin()) {
    add_action('pre_option_blog_public', '__return_zero');
}