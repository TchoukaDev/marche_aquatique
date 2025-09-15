<?php

session_start();
//Définir constant ROOT qui contient la racine du site
define('ROOT', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

require_once 'controllers/MainController.php';
require_once 'controllers/PageController.php';
require_once 'controllers/GalleryController.php';
require_once 'controllers/InfosController.php';
require_once 'controllers/Utilities.php';
require_once 'controllers/SignUpController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/LogoutController.php';
require_once 'views/commons/fragments/modale.php';
$pageController = new PageController();

try {
    if (empty($_GET['page'])) {
        $url[0] = "accueil";
    } else {
        //Mettre dans un tableau les différentes parties de l'URL qui sont séparées par les /
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    }
    switch ($url[0]) {
        case "accueil":
            $pageController->accueilPage();
            break;
        case "presentation":
            $pageController->presentationPage();
            break;
        case "marche_aquatique":
            $pageController->marcheAquatiquePage();
            break;
        case "seances":
            $pageController->seancesPage();
            break;
        case "galerie":
            $galerieController = new GalleryController();
            if (isset($url[1])) {
                switch ($url[1]) {
                    case "addImage":
                        $galerieController->addImage();
                        break;
                    case "deleteImage":
                        $galerieController->deleteImage();
                        break;
                    default:
                        $pageController->galeriePage();
                }
            } else $pageController->galeriePage();
            break;
        case 'competitions':
            $pageController->competitionsPage();
            break;
        case "infos_diverses":
            $infosController = new Infoscontroller();
            if (isset($url[1])) {
                switch ($url[1]) {
                    case 'addInfo':
                        $infosController->addInfo();
                        break;
                    case 'updateInfo':
                        $infosController->updateInfo();
                        break;
                    case "deleteInfo":
                        $infosController->deleteInfo();
                        break;
                    default:
                        $pageController->infosPage();
                }
            } else $pageController->infosPage();
            break;
        case "contact":
            $pageController->contactPage();
            break;
        case "inscription":
            $signUpController = new SignUpController();
            $signUpController->signUp();
            $pageController->inscriptionPage();
            break;
        case 'connexion':
            $loginController = new LoginController();
            $loginController->login();
            break;
        case 'deconnexion':
            $logoutController = new LogoutController();
            $logoutController->logout();
            break;
        case 'confidentialite':
            $pageController->confidentialitePage();
            break;
        case "mentions":
            $pageController->mentionsPage();
            break;
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    $pageController->errorPage($e->getMessage());
}
