<?php

/**
 * This file is the entry point for Vercel
 */

// Path to the front controller
define('FCPATH', dirname(__DIR__) . '/public/');

// Path to the project root directory
define('ROOTPATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);

// Path to the system directory
define('SYSTEMPATH', ROOTPATH . 'system' . DIRECTORY_SEPARATOR);

// Path to the writable directory which will be using /tmp on Vercel
define('WRITEPATH', '/tmp/');

// The path to the "application" directory
define('APPPATH', ROOTPATH . 'app' . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
chdir(FCPATH);

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 */

// LOAD OUR PATHS CONFIG FILE
require FCPATH . '../app/Config/Paths.php';
$paths = new Config\Paths();

// LOAD THE FRAMEWORK BOOT FILE
require SYSTEMPATH . 'Boot.php';

// Define environment
if (!defined('ENVIRONMENT')) {
    define('ENVIRONMENT', $_ENV['CI_ENVIRONMENT'] ?? 'production');
}

// Temporarily switch to system directory
chdir(SYSTEMPATH);

// Load the framework constants
require SYSTEMPATH . 'Config/Constants.php';

// Return to the project root
chdir(ROOTPATH);

// Modifier la configuration du cache pour Vercel
\Config\Services::cache()->handler = 'array';
\Config\Services::cache()->backupHandler = 'dummy';

exit(CodeIgniter\Boot::bootWeb($paths));