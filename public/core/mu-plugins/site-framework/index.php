<?php
declare(strict_types=1);

namespace RaccoonSite;

//Basic set up
require_once(__DIR__ . '/setup/login-logo.php');
require_once(__DIR__ . '/setup/acf-json.php');

//Data helpers
require_once(__DIR__ . '/DataHelpers/DefaultPostHelper.php');

//load CPTs and tax here
require_once(__DIR__ . '/entities/cpt/sample-cpt.php');
require_once(__DIR__ . '/entities/tax/sample-tax.php');

//load translations
load_muplugin_textdomain(
    'raccoonwp',
    '/site-framework/translations'
);