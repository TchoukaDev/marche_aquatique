<?php

class PageController extends MainController
{

    public function accueilPage()
    {

        $datasPage = [
            'title' => 'Les randonneurs des sables - Accueil',
            'view' => 'views/pages/accueil.php',
            'layout' => 'views/commons/layout.php'
        ];
        Utilities::renderPage($datasPage);
    }

    public function presentationPage()
    {
        $datasPage = [
            'title' => 'Présentation',
            'view' => 'views/pages/presentation.php',
            'layout' => 'views/commons/layout.php'
        ];
        Utilities::renderPage($datasPage);
    }

    public function marcheAquatiquePage()
    {
        $datasPage = [
            'title' => 'Marche aquatique',
            'view' => 'views/pages/marche_aquatique.php',
            'layout' => 'views/commons/layout.php'
        ];
        Utilities::renderPage($datasPage);
    }

    public function seancesPage()
    {
        $datasPage = [
            'title' => 'Séances',
            'view' => 'views/pages/seances.php',
            'layout' => 'views/commons/layout.php'
        ];
        Utilities::renderPage($datasPage);
    }

    public function galeriePage()
    {
        $images = $this->galleryModel->getAllImages();
        $datasPage = [
            'title' => 'Galerie',
            'images' => $images,
            'view' => 'views/pages/galerie.php',
            'layout' => 'views/commons/layout.php'
        ];
        Utilities::renderPage($datasPage);
    }
    public function competitionsPage()
    {
        $datasPage = [
            'title' => 'Compétitions',
            'view' => 'views/pages/competitions.php',
            'layout' => 'views/commons/layout.php'
        ];
        Utilities::renderPage($datasPage);
    }
    public function infosPage()
    {

        $articles = $this->articlesModel->getAllArticles();
        require_once 'views/commons/fragments/modale.php';
        $datasPage = [
            'title' => 'Infos diverses',
            'articles' => $articles,
            'deleteArticleModal' => $deleteArticleModal,
            'view' => 'views/pages/infos_diverses.php',
            'layout' => 'views/commons/layout.php'
        ];
        Utilities::renderPage($datasPage);
    }
    public function inscriptionPage()
    {
        $datasPage = [
            'title' => 'Inscription',
            'view' => 'views/pages/inscription.php',
            'layout' => 'views/commons/layout.php'
        ];
        Utilities::renderPage($datasPage);
    }
    public function contactPage()
    {
        $datasPage = [
            'title' => 'Nous contacter',
            'view' => 'views/pages/contact.php',
            'layout' => 'views/commons/layout.php'
        ];
        Utilities::renderPage($datasPage);
    }
    public function confidentialitePage()
    {
        $datasPage = [
            'title' => 'Politique de confidentialité',
            'view' => 'views/pages/confidentialite.php',
            'layout' => 'views/commons/layout.php'
        ];
        Utilities::renderPage($datasPage);
    }
    public function mentionsPage()
    {
        $datasPage = [
            "title" => "Mentions légales",
            "view" => "views/pages/mentions.php",
            "layout" => "views/commons/layout.php"
        ];
        Utilities::renderPage($datasPage);
    }
    public function errorPage($message)
    {
        $datasPage = [
            'title' => 'Erreur',
            'view' => 'views/pages/erreur.php',
            'layout' => 'views/commons/layout.php',
            'message' => $message
        ];
        Utilities::renderPage($datasPage);
    }
}
