<?php
require_once 'vendor/autoload.php';

// Déterminer l'environnement (depuis variable système ou défaut)
$environment = $_SERVER['APP_ENV'] ?? 'local';

$envFiles = ['.env']; // Toujours charger .env en premier

// Ajouter le fichier spécifique à l'environnement
switch ($environment) {
    case 'production':
        $envFiles[] = '.env.production';
        break;
    case 'local':
        $envFiles[] = '.env.local';
}

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, $envFiles);
$dotenv->safeLoad();
