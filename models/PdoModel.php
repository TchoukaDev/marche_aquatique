<?php

class PdoModel
{
    public static $db;

    protected function setDb()
    {
        try {
            if (self::$db === null) {
                require 'vendor/autoload.php';

                $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
                $dotenv->load();

                $dbHost = $_ENV['DB_HOST'] ?? 'Valeur par défaut';
                $dbName = $_ENV['DB_NAME'] ?? 'Valeur par défaut';
                $dbUser = $_ENV['DB_USER'] ?? 'Valeur par défaut';
                $dbPassword = $_ENV['DB_PASSWORD'] ?? 'Valeur par défaut';

                self::$db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$db;
        } catch (PDOException $e) {
            die("Erreur de connexion: " . $e->getMessage());
        }
    }
}
