<?php

namespace RaccoonMUFramework;

/**
 * Class AcfJsonHelper helps in setting up acf-json path to be stored outside default theme location
 * @package RaccoonWP\Core
 */
Class AcfJsonHelper
{
    /** @var path to the directory where acf-json should be stored. */
    public static $path;

    public static function setup($path)
    {
        if (file_exists($path)) {
            self::$path = $path;
            add_filter('acf/settings/save_json', [ __NAMESPACE__  . '\\AcfJsonHelper', 'set_acf_json_save_path']);
            add_filter('acf/settings/load_json', [ __NAMESPACE__  . '\\AcfJsonHelper', 'set_acf_json_load_path']);
        } else {
            error_log('ACF Json directory doesn\'t exist ' . $path);
        }
    }

    public static function set_acf_json_save_path()
    {
        return self::$path;
    }

    public static function set_acf_json_load_path($paths)
    {
        unset($paths[ 0 ]);
        // append path
        $paths[] = self::$path;

        return $paths;
    }
}