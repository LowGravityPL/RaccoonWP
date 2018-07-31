<?php

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('SCRIPT_DEBUG', true);
define('SAVEQUERIES', true);


define('EMPTY_TRASH_DAYS', getenv('EMPTY_TRASH_DAYS') ?: 7);
define('WP_POST_REVISIONS', getenv('WP_POST_REVISIONS') ?: 2);
define('IMAGE_EDIT_OVERWRITE', getenv('IMAGE_EDIT_OVERWRITE') ?: true);

//Allow for file modifications done from WP admin panel in dev environment
define('DISALLOW_FILE_EDIT', false);
define('DISALLOW_FILE_MODS', false);

//    example of how to disable plugins on this environment
//    replace the plugins with the ones which fit your use case
//    define('ENV_DISABLED_PLUGINS', [
//        'gutenberg/gutenberg.php',
//        'autoptimize/autoptimize.php',
//    ]);