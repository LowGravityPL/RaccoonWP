<?php
declare(strict_types=1);

/**
 * Disable products on this particular environment
 */
if (defined('ENV_DISABLED_PLUGINS')) {
    $plugins_to_disable = maybe_unserialize(ENV_DISABLED_PLUGINS);

    if ( ! empty($plugins_to_disable) && is_array($plugins_to_disable)) {

        require_once(dirname(__FILE__, 2) . '/Lib/PluginDisabler.php');
        $utility = new \RaccoonMUFramework\PluginDisabler($plugins_to_disable);

        //part below is optional but for me it is crucial
        error_log('Locally disabled plugins: ' . var_export($plugins_to_disable, true));
    }
}