<?php
declare(strict_types=1);

namespace RaccoonSite;

add_action('login_enqueue_scripts', __NAMESPACE__ . '\\inject_login_logo_css');
add_filter('login_headerurl', __NAMESPACE__ . '\\adjust_login_logo_url');
add_filter('login_headertitle', __NAMESPACE__ . '\\setup_login_logo_title');

function inject_login_logo_css()
{ ?>
	<style type="text/css">
		#login h1 a, .login h1 a {
			background-image: url(<?= WPMU_PLUGIN_URL; ?>/site-framework/assets/raccoon-logo-scaled.png);
			background-size: contain;
			width: 256px;
			height: 223px;
		}

		#login {
			padding-top: 4% !important;
		}
	</style>
<?php }

function adjust_login_logo_url()
{
    return home_url();
}

function setup_login_logo_title()
{
    return 'Based on RaccoonWP. Check the project out on GitHub!';
}