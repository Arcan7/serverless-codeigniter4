<?php
// Définir le répertoire racine
define('FCPATH', dirname(__DIR__) . '/public/');
chdir(FCPATH);

// Récupérer le chemin du front controller
$pathsPath = FCPATH . '../app/Config/Paths.php';

// Charger la classe Paths
require $pathsPath;
$paths = new Config\Paths();

// Vérifier si l'application est installée
if (!is_file($paths->systemDirectory . '/Boot.php')) {
    exit('Application not installed! Please follow instructions in README.md');
}

// Configuration pour Vercel
$paths->setSystemDirectory(dirname(__DIR__) . '/system');
$paths->setApplicationDirectory(dirname(__DIR__) . '/app');
$paths->setWritableDirectory('/tmp'); // Utiliser le dossier temporaire de Vercel

// Load framework bootstrap file
require $paths->systemDirectory . '/Boot.php';

// Lancer l'application
$app = new CodeIgniter\Boot\Boot();
exit($app->bootWeb($paths));
?>