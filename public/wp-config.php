<?php
/** Basics,
 * Please DO NOT EDIT this file. If you need any configuration set up or constants applied
 * please use RaccoonWP/configuration directory
 */

/* Load composer autoloader */
require_once(dirname(__DIR__) . '/vendor/autoload.php');

// Initializing new instance of RaccoonApp which does all of WP configuration init in similar way wp-config did
$root_directory = dirname(__FILE__, 2);
$app = new \RaccoonWP\RaccoonApp($root_directory, 'public');
$app->initialize();

//Set up MySQL table prefix for that installation
$table_prefix = $_ENV['DB_PREFIX'] ?: 'wp_';

//Include WordPress
require_once(ABSPATH . 'wp-settings.php');
