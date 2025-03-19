<?php
session_start();

if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}

$champsRequis = ['email', 'password'];
$formulaireValide = true;

foreach ($champsRequis as $champ) {
    if (empty($_POST[$champ])) {
        $formulaireValide = false;
        break;
    }
}

if ($formulaireValide) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    require_once('bdd.php');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: ../../index.php?errorconnect=true&message=Cette adresse mail n\'est pas valide.');
        exit();
    }

    $req = $bdd->prepare('SELECT COUNT(*) as numberEmail from users WHERE email = ?');
    $req->execute([$email]);

    $resultat = $req->fetchColumn();
    if ($resultat != 1) {
        header('location: ../../index.php?errorconnect=true&message= Adresse mail ou mot de passe invalide.');
        exit();
    }

    $req2 = $bdd->prepare('SELECT * FROM users WHERE email = ?');
    $req2->execute([$email]);

    while ($user = $req2->fetch()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['connecte'] = true;
            $_SESSION['forename'] = $user['forename'];

            if (isset($_POST['autoconnect'])) {
                setcookie('autoconnection', $user['cookie'], time() + 365 * 24 * 3600, '/', '', true, true);
            }
            header('location: ../../index.php');
            exit();
        } else {
            header('location: ../../index.php?errorconnect=true&message=Adresse mail ou mot de passe invalide.');
            exit();
        }
    }
}
