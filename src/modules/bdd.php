<?php
require __DIR__ . '../../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}
$dbHost = $_ENV['DB_HOST'] ?? 'Valeur par défaut';
$dbName = $_ENV['DB_NAME'] ?? 'Valeur par défaut';
$dbUser = $_ENV['DB_USER'] ?? 'Valeur par défaut';
$dbPassword = $_ENV['DB_PASSWORD'] ?? 'Valeur par défaut';


try {
    $bdd = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion: " . $e->getMessage());
}
