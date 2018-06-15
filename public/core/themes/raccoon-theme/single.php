<?php

/**
 * Renders the single post view.
 */

use function RaccoonTheme\get_current_post_data;

$data            = Timber::get_context();
$data[ 'post' ] = get_current_post_data();

\Timber::render('single.twig', $data);