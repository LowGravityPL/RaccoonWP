<?php
/**
 * Renders the post archive view.
 */
use RaccoonSite\DefaultPostHelper;

$data            = Timber::get_context();
$data[ 'posts' ] = DefaultPostHelper::getCurrentPostsList();

\Timber::render('index.twig', $data);