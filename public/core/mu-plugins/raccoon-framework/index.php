<?php
declare(strict_types=1);

namespace RaccoonMUFramework;

//As those are not class based files (mostly) we do not rely on PSR-4 autoloader here.
require_once(__DIR__ . '/helpers/acf-json.php');
require_once(__DIR__ . '/helpers/get-entity-list.php');
require_once(__DIR__ . '/helpers/include-theme-partial.php');
require_once(__DIR__ . '/setup/setup.php');
require_once(__DIR__ . '/setup/disable-plugins.php');
require_once(__DIR__ . '/Lib/PluginDisabler.php');
