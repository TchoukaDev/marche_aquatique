<?php

class PdoModel
{
    public static $db;

    protected function setDb()
    {
        try {
            if (self::$db === null) {
                // require 'vendor/autoload.php';

                // $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
                // $dotenv->load();


                require_once "./config.php";
                // Variables d'environnement
                $dbHost = $_ENV['DB_HOST'];
                $dbName = $_ENV['DB_NAME'];
                $dbUser = $_ENV['DB_USER'];
                $dbPassword = $_ENV['DB_PASSWORD'];

                self::$db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$db;
        } catch (PDOException $e) {
            die("Erreur de connexion: " . $e->getMessage());
        }
    }
}
