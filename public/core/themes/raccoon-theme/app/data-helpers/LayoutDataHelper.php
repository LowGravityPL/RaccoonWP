<?php
declare(strict_types=1);

namespace RaccoonTheme;

use RaccoonMUFramework\DefaultDataHelper;

/**
 * Simple class with static methods providing data for layout components like header of footer.
 * @package RaccoonTheme
 */
class LayoutDataHelper extends DefaultDataHelper
{

    /**
     * Returns basic header data used by header-default template
     *
     * @return array
     */
    public static function get_default_header_data()
    {
        //default RaccoonWP logo
        $logo_url = get_asset_path('assets/images/raccoon-logo_scaled.png');

        //todo: extract to a helper [Lucas]
        $custom_logo_id = get_theme_mod('custom_logo');
        if ($custom_logo_id) {
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');

            if (is_array($image) && ! empty($image[ 0 ])) {
                $logo_url = $image[ 0 ];
            }
        }

        return [
            'home_url'         => get_home_url(),
            'site_logo_url'    => $logo_url,
            'site_title'       => get_bloginfo('name'),
            'site_description' => get_bloginfo('description'),
        ];
    }

    /**
     * Returns basic footer data used by footer-default template
     *
     * @return array
     */
    public static function get_default_footer_data()
    {
        return [
            'copyright' => [
                'url'  => 'https://lowgravity.pl',
                'year' => 2018,
                'name' => 'LowGravity.pl',
            ],
        ];
    }
}