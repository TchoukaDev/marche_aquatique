<?php

class ArticlesController extends MainController
{

    public function addArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (!empty($_POST['title']) && (!empty($_POST['content']))) {
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $image = "";
                if (!empty($_FILES['image']) && $_FILES['image']['error'] === 0) {
                    $file = $_FILES['image'];
                    $image = Utilities::uploadImage($file, "articleError", "infos_diverses");
                };

                $result = $this->articlesModel->addArticleDb($title, $content, $image);
                if ($result === false) {
                    $_SESSION['articleError'] = "Erreur: Votre contenu n'a pas pu être publié, veuillez réessayer.";
                } else {
                    $_SESSION['articleSuccess'] = "Votre contenu a bien été publié.";
                }
                header("location: " . ROOT . "infos_diverses");
                exit();
            } else
                $_SESSION['articleError'] = "Veuillez compléter tous les champs du formulaire.";;
            header("location: " . ROOT . "infos_diverses");
            exit();
        }
    }

    public function updateArticle()
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $fields = ['title', 'content', 'articleId'];
            $validForm = true;
            foreach ($fields as $field) {
                if (empty($field)) {
                    $_SESSION['articleError'] = "Veuillez compléter tous les champs du formulaire";
                    header("location:" . ROOT . "infos_diverses");
                    exit();
                }
            }
            if ($validForm) {
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $id = htmlspecialchars($_POST['articleId']);
                if (!empty($_FILES['image']) && $_FILES['image']['error'] === 0) {
                    $file = $_FILES['image'];
                    $image = Utilities::uploadImage($file, "articleError", "infos_diverses");
                } else $image = '';

                $result = $this->articlesModel->updateArticleDb($title, $content, $image, $id);
                if ($result === false) {
                    $_SESSION['articleError'] = "Erreur: votre contenu n'a pas pu être modifié.";
                } else {
                    $_SESSION['articleSuccess'] = "Le contenu de votre publication a bien été modifié.";
                }
                header("location:" . ROOT . "infos_diverses");
                exit();
            }
        }
    }

    public function deleteArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (empty($_POST['articleId'])) {
                $_SESSION['articleError'] = "Veuillez compléter tous les champs du formulaire";

                header("location:" . ROOT . "infos_diverses");
                exit();
            }

            $id = htmlspecialchars($_POST['articleId']);

            $result = $this->articlesModel->deleteArticleDb($id);
            if ($result === false) {
                $_SESSION['articleError'] = "Erreur: votre contenu n'a pas pu être supprimé.";
            } else {
                $_SESSION['articleSuccess'] = "Votre publication a bien été supprimée..";
            }
            header("location:" . ROOT . "infos_diverses");
            exit();
        }
    }
}
