<?php
declare(strict_types=1);

namespace RaccoonTheme;

function initialize_twig_support() {

    /**
     * Bail if Timber plugin is not active.
     */
    if ( ! class_exists('Timber')) {

        add_action('admin_notices', function () {
            ?>
            <div class="error">
                <p>
                    Raccoon theme relies on Timber plugin to process Twig templates. Please activate it.
                    <a href="' . esc_url(admin_url('plugins.php')) . '">
                        <?= esc_url(admin_url('plugins.php')) ?>
                    </a>
                </p>
            </div>
            <?php
        });
    }

    add_filter('timber_context', __NAMESPACE__ . '\\add_to_timber_context');

    function add_to_timber_context($data)
    {
        //add default header data to all templates
        $data[ 'header_data' ][ 'info' ] = LayoutDataHelper::getDefaultHeaderData();

        //add menu
        $data[ 'header_data' ][ 'menu_header' ] = new \Timber\Menu( 'primary_header' );
        
        //add default footer data to all templates
        $data[ 'footer_data' ] = LayoutDataHelper::getDefaultFooterData();

        return $data;
    }

    //add templates location
    \Timber::$locations = __DIR__ . '/../../templates';
}

initialize_twig_support();




