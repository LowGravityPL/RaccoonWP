<?php

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
define('SCRIPT_DEBUG', false);
define('SAVEQUERIES', false);

define('EMPTY_TRASH_DAYS', getenv('EMPTY_TRASH_DAYS') ?: 7);
define('WP_POST_REVISIONS', getenv('WP_POST_REVISIONS') ?: 2);
define('IMAGE_EDIT_OVERWRITE', getenv('IMAGE_EDIT_OVERWRITE') ?: true);

//Disallow file modifications done from WP admin panel.
define('DISALLOW_FILE_EDIT', true);