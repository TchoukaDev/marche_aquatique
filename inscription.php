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
        header('location: inscription.php?error=true&message=Les deux mots de passe saisis ne sont pas identiques.');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: inscription.php?error=true&message=Votre adresse email n\'est pas valide.');
        exit();
    }

    $regex = '/^(\+33\s*|0)[1-9]\s*[0-9]{2}(\s*[0-9]{2}){3}\s*$/';
    if (!filter_var($telephone, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => $regex]])) {
        header('location: inscription.php?error=true&message=Le numéro de téléphone n\'est pas valide.');
        exit();
    }

    $req = $bdd->prepare('SELECT COUNT(*) as user FROM users WHERE email = ? ');
    $req->execute([$email]);

    $resultat = $req->fetchColumn();
    // // echo "<pre>";
    // // var_dump([
    // //     'email' => $email,
    // //     'count' => $resultat,
    // //     'type' => gettype($resultat)
    // // ]);
    // // echo "</pre>";
    // exit();
    if ($resultat > 0) {
        header('location: inscription.php?error=true&message=Cette adresse email est déjà utilisée.');
        exit();
    }


    $password = password_hash($password, PASSWORD_DEFAULT);
    $cookie = password_hash($email, PASSWORD_DEFAULT);

    $ajoutUser = $bdd->prepare('INSERT INTO users(name, forename, email, telephone, password, cookie) VALUES(?,?,?,?,?,?)');
    $ajoutUser->execute([$name, $forename, $email, $telephone, $password, $cookie]);
    header('location: inscription.php?success=true');
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

    <form method="POST" action="inscription.php" class="contact form_container text_center">
        <h2>Inscription</h2>

        <p>
            <label for="forename">Prénom: </label>
            <input type="text" name="forename" id="forename" placeholder="Votre prénom" required>
            <label for="name">Nom de famille: </label>
            <input type="text" name="name" id="name" placeholder="Votre nom" required>
        </p>
        <p>
            <label for="email">Adresse mail: </label>
            <input type="email" name="email" id="email" placeholder="Votre adresse email">
        </p>
        <label for="telephone">Téléphone</label>
        <input type="tel" name="telephone" id="telephone" required placeholder="Votre n° de téléphone">
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required placeholder="Votre mot de passe">
        </p>
        <p>
            <label for="check_password">Saisissez à nouveau votre mot de passe</label>
            <input type="password" name="check_password" id="check_password" required placeholder="Votre mot de passe">
        </p>

        <p>
            <input type="submit" value="Envoyer">
        </p>

        <?php
        if (isset($_GET['error']) && isset($_GET['message'])) {
            echo '<p class= alert error>' . htmlspecialchars($_GET['message']) . '</p>';
        } else if (isset($_GET['success'])) {
            echo '<p class= alert success> Votre inscription est validée. Vous pouvez maintenant vous connecter.</p>';
        }
        ?>

    </form>



    <?php require_once("src/modules/footer.php") ?>

</body>

</html>