<?php

if (isset($_COOKIE['autoconnection']) && !isset($_SESSION['connecte'])) {

    require_once('bdd.php');

    $cookie = htmlspecialchars($_COOKIE['autoconnection']);

    $req = $bdd->prepare('SELECT COUNT(*) as cookieNumber FROM users WHERE cookie = ?');
    $req->execute([$cookie]);

    $numberCookie = $req->fetchColumn();

    if ($numberCookie == 1) {

        $infos = $bdd->prepare('SELECT* FROM users WHERE cookie = ?');
        $infos->execute([$cookie]);

        while ($user = $infos->fetch()) {
            $_SESSION['connecte'] = true;
            $_SESSION['forename'] = $user['forename'];
        }
    }
}
