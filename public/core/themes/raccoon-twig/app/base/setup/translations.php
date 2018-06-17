<?php
declare(strict_types=1);

namespace RaccoonTheme;

add_action('after_setup_theme', __NAMESPACE__ . '\\setup_theme_translations');

/**
 * Registers domain and loads theme translations
 * More information about translating can be found in the docs.
 */
function setup_theme_translations()
{
    load_theme_textdomain(
        'raccoonwp',
        get_template_directory() . '/translations'
    );
}