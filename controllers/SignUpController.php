<?php
class SignUpController extends PageController
{
    function signUp()
    {
        if (isset($_SESSION['connected'])) {
            header("location:accueil");
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
            $name = htmlspecialchars($_POST['name']);
            $forename = htmlspecialchars($_POST['forename']);
            $email = htmlspecialchars($_POST['email']);
            $telephone = htmlspecialchars($_POST["telephone"]);
            $password = htmlspecialchars($_POST['password']);
            $checkPassword = htmlspecialchars($_POST["check_password"]);


            if ($password !== $checkPassword) {
                $_SESSION['errorSignUp'] = 'Les deux mots de passe saisis ne sont pas identiques.';
                header('location: inscription');
                exit();
            }

            if (strlen($password) < 8) {
                $_SESSION['errorSignUp'] = "Le mot de passe doit contenir au moins 8 caractères";
                header('location: inscription');
                exit();
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errorSignUp'] = 'Cette adresse email n\'est pas valide.';
                header('location: inscription');
                exit();
            }

            $regex = '/^(\+33\s*|0)[1-9]\s*[0-9]{2}(\s*[0-9]{2}){3}\s*$/';
            if (!filter_var($telephone, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => $regex]])) {
                $_SESSION['errorSignUp'] = 'Ce numéro de téléphone n\'est pas valide.';
                header('location: inscription');
                exit();
            }

            $resultat = $this->usersModel->countEmail($email);
            if ($resultat > 0) {
                $_SESSION['errorSignUp'] = 'Cette adresse email est déjà utilisée.';
                header('location: inscription');
                exit();
            }


            $password = password_hash($password, PASSWORD_DEFAULT);
            $cookie = password_hash($email, PASSWORD_DEFAULT);
            $resultat = $this->usersModel->createUser($name, $forename, $email, $telephone, $password, $cookie);
            if ($resultat === false) {
                $_SESSION['errorSignUp'] = 'Une erreur est survenue lors de l\'inscription, veuillez rééssayer.';
                header('location: inscription');
                exit();
            } else  $_SESSION['successSignUp'] = 'Votre inscription est validée. Vous pouvez maintenant vous connecter.';
            header('location: inscription');
            exit();
        }
    }
}
