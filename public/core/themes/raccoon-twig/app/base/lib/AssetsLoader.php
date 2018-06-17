<?php

namespace RaccoonTheme;

/**
 * Class AssetsLoader
 */
class AssetsLoader
{
    /**
     * Assets folder URI.
     * @var string
     */
    protected $distFolderUri;

    /**
     * Array of paths to assets derived from manifest.json.
     * @var array
     */
    protected $assets;

    static private $instance;

    /**
     * Consturctor for ManifestLoader object.
     * @param string $distPath path to dist folder relative to theme's root
     * @param string $manifestPath path to manifest folder relative to theme's root
     */
    function __construct($distPath, $manifestPath)
    {
        $this->distFolderUri = get_stylesheet_directory_uri() . '/' . $distPath . '';
        $this->assets        = $this->loadManifest(get_stylesheet_directory() . '/' . $manifestPath);

        self::$instance = $this;
    }

    /**
     * Load manifest from disk
     * @param string $manifest manifest.json location on disk
     * @return array
     */
    private function loadManifest($manifest)
    {
        if (file_exists($manifest)) {
            return json_decode(file_get_contents($manifest), true);
        } else {
            return [];
        }
    }

    /**
     * Return path to an asset if it exists in manifest
     * @param string $name asset name/path
     * @return string
     */
    public function getAssetPath($name)
    {
        if (isset($this->assets[ $name ])) {
            return $this->distFolderUri . $this->assets[ $name ];
        } else {
            return $this->distFolderUri . $name;
        }
    }

    public static function getInstance()
    {

        if (is_null(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}