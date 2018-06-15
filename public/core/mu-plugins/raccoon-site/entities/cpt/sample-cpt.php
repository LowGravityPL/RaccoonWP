<?php
declare(strict_types=1);

//See the documentation at https://github.com/johnbillion/extended-cpts/wiki/Basic-usage
add_action('init', function () {
    register_extended_post_type('book', [
        'show_in_feed'  => true,
        'admin_cols'    => [
            'book_featured_image' => [
                'title'          => __('Book cover', 'raccoonwp'),
                'featured_image' => 'thumbnail',
            ],
            'book_genre'          => [
                'title'    => __('Book Genre', 'raccoonwp'),
                'taxonomy' => 'book_genre',
            ],
        ],
        'admin_filters' => [
            'book_genre' => [
                'title'    => __('Select genre', 'raccoonwp'),
                'taxonomy' => 'book_genre',
            ],
        ],
        'labels' => [
            'add_new'      => __('Add new', 'raccoonwp'),
            'add_new_item' => __('Add new book', 'raccoonwp'),
            'edit_item'    => __('Edit book', 'raccoonwp'),
            'all_items'    => __('All Books', 'raccoonwp'),
        ]
    ], [
        'plural'       => __('Books', 'raccoonwp'),
        'singular'     => __('Book', 'raccoonwp'),
    ]);
});