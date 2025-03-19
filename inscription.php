<?php
session_start();

if (isset($_SESSION['connecte'])) {
    header("location: index.php");
    exit();
}

$champsRequis = ['name', 'forename', 'email', 'telephone', 'password', 'check_password'];
$formulaireValide = true;

foreach ($champsRequis as $champ) {
    if (empty($_POST[$champ])) {
        $formulaireValide = false;
        break;
    }
}

if ($formulaireValide) {
    $name           = htmlspecialchars($_POST['name']);
    $forename       = htmlspecialchars($_POST['forename']);
    $email          = htmlspecialchars($_POST['email']);
    $telephone      = htmlspecialchars($_POST["telephone"]);
    $password       = htmlspecialchars($_POST['password']);
    $checkPassword  = htmlspecialchars($_POST["check_password"]);

    require_once 'src/modules/bdd.php';

    if ($password !== $checkPassword) {
        $_SESSION['errorSubscribe'] = 'Les deux mots de passe saisis ne sont pas identiques.';
        header('location: inscription.php');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errorSubscribe'] = 'Cette adresse email n\'est pas valide.';
        header('location: inscription.php');
        exit();
    }

    $regex = '/^(\+33\s*|0)[1-9]\s*[0-9]{2}(\s*[0-9]{2}){3}\s*$/';
    if (!filter_var($telephone, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => $regex]])) {
        $_SESSION['errorSubscribe'] = 'Ce numéro de téléphone n\'est pas valide.';
        header('location: inscription.php');
        exit();
    }

    $req = $bdd->prepare('SELECT COUNT(*) as user FROM users WHERE email = ? ');
    $req->execute([$email]);

    $resultat = $req->fetchColumn();

    if ($resultat > 0) {
        $_SESSION['errorSubscribe'] = 'Cette adresse email est déjà utilisée.';
        header('location: inscription.php');
        exit();
    }


    $password = password_hash($password, PASSWORD_DEFAULT);
    $cookie = password_hash($email, PASSWORD_DEFAULT);

    $ajoutUser = $bdd->prepare('INSERT INTO users(name, forename, email, telephone, password, cookie) VALUES(?,?,?,?,?,?)');
    $ajoutUser->execute([$name, $forename, $email, $telephone, $password, $cookie]);
    $_SESSION['successSubscribe'] = 'Votre inscription est validée. Vous pouvez maintenant vous connecter.';
    header('location: inscription.php');
    exit();
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="style/css/style.css">
    <title>Inscription</title>
</head>

<body>

    <?php
    require_once 'src/modules/header.php';
    require_once "src/modules/navbar.php";
    ?>

    <form method="POST" action="inscription.php" class="container_principal text_center">
        <h2>Inscription</h2>

        <div class="grid grid_inscription">
            <p>
                <label for="forename">Prénom: </label><br>
                <input type="text" name="forename" id="forename" placeholder="Votre prénom" autocomplete="given-name" required class="input_block">
            </p>
            <p>
                <label for="name">Nom de famille: </label><br>
                <input type="text" name="name" id="name" placeholder="Votre nom" autocomplete="family-name" required class="input_block">

            </p>
        </div>
        <div class="grid grid_inscription">
            <p>
                <label for="email">Adresse mail: </label><br>
                <input type="email" name="email" id="email_inscription" placeholder="Votre adresse email" autocomplete="email" required class="input_block">
            </p>
            <p>
                <label for="telephone">Téléphone: </label><br>
                <input type="tel" name="telephone" id="telephone" placeholder="Votre n° de téléphone" autocomplete="tel" required class="input_block">
            </p>
        </div>
        <div class="grid grid_inscription">
            <p>
                <label for="password">Mot de passe: </label><br>
                <input type="password" name="password" id="password_inscription" placeholder="Votre mot de passe" autocomplete="new-password" required class="input_block">
            </p>

            <p>
                <label for="check_password">Saisissez à nouveau votre mot de passe: </label><br>
                <input type="password" name="check_password" id="check_password" placeholder="Votre mot de passe" required class="input_block">
            </p>
        </div>
        <p>
            <input type="submit" value="Envoyer" class="bouton">
        </p>

        <?php
        if (isset($_SESSION['errorSubscribe'])) {
            echo '<p class="error">' . htmlspecialchars($_SESSION['errorSubscribe']) . '</p>';
            unset($_SESSION['errorSubscribe']);
        } else if (isset($_SESSION['successSubscribe'])) {
            echo '<p class="success">' . htmlspecialchars($_SESSION['successSubscribe']) . '</p>';
            unset($_SESSION['successSubscribe']);
        }
        ?>

    </form>

    <?php require_once("src/modules/footer.php") ?>

</body>

</html>