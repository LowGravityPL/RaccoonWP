<?php

/**
 * Renders the post archive view.
 */

use RaccoonSite\DefaultPostHelper;
use Timber\Timber;

$data = Timber::context();
$data['posts'] = DefaultPostHelper::getCurrentPostsList();

Timber::render('index.twig', $data);
