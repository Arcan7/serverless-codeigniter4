<?php
// Path to the front controller (index.php)
define('FCPATH', dirname(__DIR__) . '/public/');

/*
 * ---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 * ---------------------------------------------------------------
 */

// Load our paths config file
require FCPATH . '../app/Config/Paths.php';
// ^^^ Change this line if you move your application folder

$paths = new Config\Paths();

// Location of the framework bootstrap file.
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Load environment settings from .env files into $_SERVER and $_ENV
require_once SYSTEMPATH . 'Config/DotEnv.php';
(new CodeIgniter\Config\DotEnv(ROOTPATH))->load();

// Define ENVIRONMENT
if (! defined('ENVIRONMENT')) {
    define('ENVIRONMENT', env('CI_ENVIRONMENT', 'production'));
}

// Load Config Cache
$factoriesCache = [];
if (is_file(WRITEPATH . 'cache/Config/factoriesCache.php')) {
    $factoriesCache = require WRITEPATH . 'cache/Config/factoriesCache.php';
}

// Launch the framework
$app = Config\Services::codeigniter();
$app->initialize();
$context = is_cli() ? 'php-cli' : 'web';
$app->setContext($context);

// Run the app
$app->run();