<?php

define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

// WP_DEBUG_LOG only works with WP_DEBUG on, so log errors and warnings through PHP, outside the web root.
ini_set('log_errors', '1');
ini_set('error_log', dirname(__DIR__) . '/debug.log');

define('SCRIPT_DEBUG', false);
define('SAVEQUERIES', false);

define('EMPTY_TRASH_DAYS', getenv('EMPTY_TRASH_DAYS') ?: 7);
define('WP_POST_REVISIONS', getenv('WP_POST_REVISIONS') ?: 10);
define('IMAGE_EDIT_OVERWRITE', getenv('IMAGE_EDIT_OVERWRITE') ?: true);

//Disallow file modifications done from WP admin panel.
define('DISALLOW_FILE_EDIT', true);
define('DISALLOW_FILE_MODS', true);