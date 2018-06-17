<?php
declare(strict_types=1);

namespace RaccoonTheme;

add_action('widgets_init', __NAMESPACE__ . '\\add_theme_sidebars');

/**
 * Registers theme sidebars
 */
function add_theme_sidebars()
{
    register_sidebar([
        'name'          => __('Primary sidebar', 'raccoonwp'),
        'id'            => 'sidebar-primary',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ]);
}