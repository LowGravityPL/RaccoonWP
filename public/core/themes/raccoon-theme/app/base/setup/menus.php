<?php
declare(strict_types=1);

namespace RaccoonTheme;

add_action('after_setup_theme', __NAMESPACE__ . '\\setup_theme_menus');

/**
 * Register theme navigation menus
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
 */
function setup_theme_menus()
{
    register_nav_menus([
        'primary_header' => __('Primary Header Menu', 'raccoonwp'),
        'primary_footer' => __('Footer Menu', 'raccoonwp'),
    ]);
}