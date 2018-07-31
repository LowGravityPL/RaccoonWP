<?php
declare(strict_types=1);

//See the documentation at https://github.com/johnbillion/extended-cpts/wiki/Basic-usage

add_action('init', function () {
    register_extended_taxonomy('book_genre', 'book', [

    ], [
        'singular' => __('Genre', 'raccoonwp'),
        'plural'   => __('Genres', 'raccoonwp'),
        'slug'     => 'book-genres',
    ]);
});