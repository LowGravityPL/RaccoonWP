<?php

/**
 * Renders the single post view.
 */

use RaccoonSite\DefaultPostHelper;
use Timber\Timber;

$data = Timber::context();
$data['post'] = DefaultPostHelper::getCurrentPostData();

Timber::render('single.twig', $data);
