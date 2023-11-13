<?php

declare(strict_types=1);

namespace RaccoonTheme;

use Timber\Timber;

function add_to_timber_context($data)
{
    //add default header data to all templates
    $data['header_data']['info'] = LayoutDataHelper::getDefaultHeaderData();

    //add menu
    $data['header_data']['menu_header'] = Timber::get_menu('primary_header');

    //add default footer data to all templates
    $data['footer_data'] = LayoutDataHelper::getDefaultFooterData();

    //add sidebar
    $data['sidebar']['data'] = Timber::get_widgets('sidebar-primary');

    return $data;
}

function initialize_twig_support()
{
    if (class_exists('Timber\Timber')) {

        add_filter('timber/context', __NAMESPACE__ . '\\add_to_timber_context');

        //add templates location
        Timber::$locations = __DIR__ . '/../../templates';
    }
}

initialize_twig_support();
