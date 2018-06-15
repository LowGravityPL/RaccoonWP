<?php
declare(strict_types=1);

/**
 * A very simple (poor) autoloader for helper files. At this complexity level we do not need anything more sophisticated.
 */

//content
require_once(__DIR__ . '/content/post-archive.php');
require_once(__DIR__ . '/content/post-card.php');
require_once(__DIR__ . '/content/post-single.php');

//layout
require_once(__DIR__ . '/layout/header-default.php');
require_once(__DIR__ . '/layout/footer-default.php');