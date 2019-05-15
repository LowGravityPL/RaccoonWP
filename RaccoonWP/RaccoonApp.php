<?php
declare(strict_types=1);

namespace RaccoonWP;

use Dotenv\Dotenv;

/**
 * Class RaccoonApp
 * @package RaccoonWP
 */
class RaccoonApp
{

    /** @var string Minimal PHP version */
    const MIN_PHP_VERSION = '7.1.3';
    /** @var string Name of the WP installation directory */
    const WP_INSTALL_DIRECTORY_NAME = 'wp';
    /** @var string Name of the content (wp-content) directory */
    const CONTENT_DIRECTORY_NAME = 'core';
    /** @var string Name of the public (web root) directory */
    const WEB_ROOT_DIRECTORY_NAME = 'public';

    /**
     * Instance of RaccoonApp
     *
     * @var null
     */
    protected static $instance = null;

    protected $root_dir;
    protected $public_root_dir;
    protected $wp_dir_name;
    protected $content_dir_name;

    /**
     * RaccoonApp constructor.
     */
    public function __construct()
    {

        try {
            $this->checkRequirements();
        } catch (\Exception $e) {
            echo 'Error during requirements check: ', $e->getMessage(), "\n";
            die();
        }

        $this->root_dir        = dirname(__FILE__, 2);
        $this->public_root_dir = $this->root_dir . '/' . self::WEB_ROOT_DIRECTORY_NAME;
    }

    /**
     * Checks if the system meets minimum requirements like PHP version of presence of DotEnv class
     *
     * @throws \Exception
     * @return void
     */
    protected function checkRequirements()
    {
        if (version_compare(phpversion(), self::MIN_PHP_VERSION, '<')) {
            throw new \Exception('Your installed PHP version is not sufficient to run RaccoonWP project');
        }
        if ( ! class_exists('\\Dotenv\\Dotenv')) {
            throw new \Exception('Dotenv extension is missing. Did you run composer install?');
        }
    }

    /**
     * Initializes the Raccoon application instance
     *
     * @return void
     */
    public function initialize()
    {
        $this->initializeDotEnv();
        $this->setupApplication();

        self::setInstance($this);
    }

    /**
     * Use DotEnv and load environment configuration from .env file
     *
     * @return void
     */
    protected function initializeDotEnv()
    {
        $dotenv = Dotenv::create($this->root_dir);

        if (file_exists($this->root_dir . '/.env')) {

            $dotenv->load();
            $dotenv->required([
                'DB_NAME',
                'DB_USER',
                'DB_PASSWORD',
                'WP_HOME',
            ]);
        }
    }

    /**
     * Set up all WordPress constants similar way as its done in original wp-config
     *
     * @return void
     */
    protected function setupApplication()
    {

        $env_type = getenv('WP_ENV') ?: 'production';
        define('WP_ENV', $env_type);
        $this->MaybeLoadEnvironmentConfiguration($env_type);

        /**
         * DB settings
         */
        define('DB_NAME', getenv('DB_NAME'));
        define('DB_USER', getenv('DB_USER'));
        define('DB_PASSWORD', getenv('DB_PASSWORD'));
        define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
        define('DB_CHARSET', 'utf8mb4');
        define('DB_COLLATE', '');

        define('AUTH_KEY', getenv('AUTH_KEY'));
        define('SECURE_AUTH_KEY', getenv('SECURE_AUTH_KEY'));
        define('LOGGED_IN_KEY', getenv('LOGGED_IN_KEY'));
        define('NONCE_KEY', getenv('NONCE_KEY'));
        define('AUTH_SALT', getenv('AUTH_SALT'));
        define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
        define('LOGGED_IN_SALT', getenv('LOGGED_IN_SALT'));
        define('NONCE_SALT', getenv('NONCE_SALT'));

        //URLs and directories
        define('WP_HOME', getenv('WP_HOME'));

        if(getenv('WP_SITEURL') ) {
            define('WP_SITEURL', getenv('WP_SITEURL'));
        } else {
            define('WP_SITEURL', getenv('WP_HOME') . '/' . self::WP_INSTALL_DIRECTORY_NAME);
        }

        define('WP_CONTENT_DIR', $this->public_root_dir . '/' . self::CONTENT_DIRECTORY_NAME);
        define('WP_CONTENT_URL', WP_HOME . '/' . self::CONTENT_DIRECTORY_NAME);

        //Disallow WordPress from updating itself automatically since we manage its version in Composer
        define('AUTOMATIC_UPDATER_DISABLED', true);

        // Set the absolute path to the WordPress directory.
        if ( ! defined('ABSPATH')) {
            define('ABSPATH', $this->public_root_dir . '/' . $this->wp_dir_name . '/');
        }
    }

    /**
     * Loads environment specific configuration if the file exists.
     *
     * Configuration files can be used to store all the environment data which actually can
     * and should land in the repository (contrary to .env files with DB access data and other critical information)
     */
    protected function MaybeLoadEnvironmentConfiguration($env_type)
    {
        if (strlen(trim($env_type)) === 0) {
            return;
        }

        $conf_file = __DIR__ . '/configuration/' . $env_type . '.php';
        if (file_exists($conf_file)) {
            require_once($conf_file);
        }
    }

    /**
     * Store the current instance of the class
     *
     * @param RaccoonApp $instance
     * @return RaccoonApp
     */
    public static function setInstance(RaccoonApp $instance)
    {
        return self::$instance = $instance;
    }

    /**
     * Return the instance of the class
     *
     * @return RaccoonApp
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
