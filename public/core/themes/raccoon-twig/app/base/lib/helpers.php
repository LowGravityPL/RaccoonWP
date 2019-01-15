<?php

declare(strict_types=1);

namespace RaccoonTheme;

/**
 * Returns the dist (compiled) path for give assets. Its just a wrapper around asset loader class.
 *
 * @param string $asset_path path to asset in assets directory ('images/something.png')
 * @return string
 */
function get_asset_path($asset_path)
{
    return AssetsLoader::getInstance()->getAssetPath($asset_path);
}