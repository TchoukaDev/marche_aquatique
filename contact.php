<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="shortcut icon" href="images/favicon.jpeg" type="image/jpeg">
    <title>Les randonneurs des sables du Born - Accueil</title>
</head>

<body id="flex_body_accueil">
    <?php
    require_once 'src/modules/header.php';
    require_once "src/modules/navbar.php"
    ?>

    <form method="POST" action="traitement_contact.php" id="contact_formulaire" class="contact form_container text_center">
        <h2>Contactez-nous</h2>

        <h3>
            Si vous avez une question ou besoin d'une information, vous pouvez nous contacter via le formulaire suivant:
        </h3>
        <p>
            <label for="nom">Nom: </label>
            <input type="text" name="nom" id="nom" placeholder="Votre nom" required>
            <label for="prenom">Prénom: </label>
            <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required></br>
        </p>
        <div id="erreur_formulaire"></div>
        <p>
            <label for="mail">Adresse mail: </label>
            <input type="email" name="mail" id="mail" placeholder="Votre adresse email">
            <label for="telephone">Numéro de téléphone: </label>
            <input type="tel" name="telephone" id="telephone" placeholder="Votre n° de téléphone">
        </p>
        <div id="erreur_choix_formulaire"></div>
        <p>
            Vous préférez être contacté par:
            <label for="choix_telephone">téléphone</label>
            <input type="checkbox" name="choix_telephone" id="choix_telephone">
            <label for="choix_mail">mail</label>
            <input type="checkbox" name="choix_mail" id="choix_mail">
        </p>

        <p>
            Message:
        </p>
        <p>
            <textarea class="padding10" name="message_contact" id="message_contact" placeholder="Ecrivez votre demande" rows="20" cols="100"></textarea>
        </p>
        <p>
            <input type="submit" value="Envoyer">
        </p>
        </div>
    </form>

    <?php
    require_once 'src/modules/footer.php';
    ?>

    <script src="script_main.js"></script>
    <script src="script_contact.js"></script>
</body>

</html>