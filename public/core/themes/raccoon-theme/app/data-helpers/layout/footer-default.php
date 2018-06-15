<?php
declare(strict_types=1);

namespace RaccoonTheme;

/**
 * Returns basic footer data used by footer-default template
 *
 * @return array
 */
function get_footer_data()
{
    return [
        'copyright' => [
            'url'  => 'https://lowgravity.pl',
            'year' => 2018,
            'name' => 'LowGravity.pl',
        ],
    ];
}