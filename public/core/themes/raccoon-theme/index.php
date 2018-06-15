<?php
/**
 * Renders the post archive view.
 */
use function RaccoonTheme\get_current_posts_list;

$data            = Timber::get_context();
$data[ 'posts' ] = get_current_posts_list();

\Timber::render('index.twig', $data);