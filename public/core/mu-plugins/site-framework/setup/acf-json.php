<?php

use RaccoonMUFramework\AcfJsonHelper;

//run below only if you have ACF plugin and want to store acf-json outside of a theme (as it should be in most of the cases)
//todo: avoid anonymous callback
add_action('plugins_loaded', function () {
    if (! function_exists('is_plugin_active')) {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    }
    if (\is_plugin_active('advanced-custom-fields-pro/acf.php') || \is_plugin_active('advanced-custom-fields/acf.php')) {
        AcfJsonHelper::setup(dirname(__FILE__, 2) . '/acf-json');
    }
});
