<?php
/** Basics, DO NOT EDIT */

/* Load composer autoloader */
require_once(dirname(__DIR__) . '/vendor/autoload.php');

// Initializing new instance of RaccoonApp which does all of WP configuration init in similar way wp-config did
$app = new \RaccoonWP\RaccoonApp();
$app->initialize();

//Set up MySQL table prefix for that installation
$table_prefix = getenv('DB_PREFIX') ?: 'wp_';

//Include WordPress
require_once(ABSPATH . 'wp-settings.php');