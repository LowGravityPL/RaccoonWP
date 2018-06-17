<?php

/**
 * Renders the single post view.
 */

use RaccoonSite\DefaultPostHelper;

$data            = Timber::get_context();
$data[ 'post' ] = DefaultPostHelper::getCurrentPostData();

\Timber::render('single.twig', $data);