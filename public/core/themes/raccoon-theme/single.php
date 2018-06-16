<?php

/**
 * Renders the single post view.
 */

use RaccoonSite\DefaultPostHelper;

$data            = Timber::get_context();
$data[ 'post' ] = DefaultPostHelper::get_current_post_data();

\Timber::render('single.twig', $data);