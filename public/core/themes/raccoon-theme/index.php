<?php
/**
 * Renders the post archive view.
 */
use RaccoonSite\DefaultPostHelper;

$data            = Timber::get_context();
$data[ 'posts' ] = DefaultPostHelper::get_current_posts_list();

\Timber::render('index.twig', $data);