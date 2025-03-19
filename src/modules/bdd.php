<?php
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}

try {
    $bdd = new PDO('mysql:host=localhost;dbname=randonneurs_des_sables;charset=utf8', 'root', '');
} catch (Exception $e) {
    die("Erreur de connexion: " . $e->getMessage());
}
