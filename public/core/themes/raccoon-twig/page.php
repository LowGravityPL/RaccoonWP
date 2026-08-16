<?php

/**
 * Renders the single page view.
 */

use RaccoonSite\DefaultPageHelper;
use Timber\Timber;

$data = Timber::context();
$data['page'] = DefaultPageHelper::getCurrentPageData();

Timber::render('page.twig', $data);
