<?php
class LoginController extends MainController
{

    public function login()
    {
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



            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = 'Cette adresse mail n\'est pas valide';
                header('location: accueil');
                exit();
            }

            $resultat = $this->usersModel->countEmail($email);
            if ($resultat !== 1) {
                $_SESSION['error'] = 'Adresse mail ou mot de passe invalide';
                header('location: accueil');
                exit();
            }

            $user = $this->usersModel->selectUserbyEmail($email);

            if (password_verify($password, $user['password'])) {
                $_SESSION['connected'] = true;
                $_SESSION['user'] = $user;

                if ($user['isAdmin'] === 1) {
                    $_SESSION['admin'] = true;
                }

                if (isset($_POST['autoLogin'])) {
                    setcookie('autoLogin', $user['cookie'], time() + 365 * 24 * 3600, '/', '', true, true);
                }
                header('location: accueil');
                exit();
            } else {
                $_SESSION['error'] = 'Adresse mail ou mot de passe invalide';
                header('location: accueil');
                exit();
            }
        }
    }
}
