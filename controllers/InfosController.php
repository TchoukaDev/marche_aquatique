<?php

class InfosController extends MainController
{

    public function addInfo()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (!empty($_POST['title']) && (!empty($_POST['content']))) {
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $image = "";
                if (!empty($_FILES['image']) && $_FILES['image']['error'] === 0) {
                    $file = $_FILES['image'];
                    $image = Utilities::uploadImage('public/uploads/infos/', $file, "infoError", "infos_diverses");
                };

                $result = $this->infosModel->create(["title" => $title, "content" => $content, "image" => $image]);
                if ($result === false) {
                    $_SESSION['infoError'] = "Erreur: Votre contenu n'a pas pu être publié, veuillez réessayer.";
                } else {
                    $_SESSION['infoSuccess'] = "Votre contenu a bien été publié.";
                }
                header("location: " . ROOT . "infos_diverses");
                exit();
            } else
                $_SESSION['infoError'] = "Veuillez compléter tous les champs du formulaire.";;
            header("location: " . ROOT . "infos_diverses");
            exit();
        }
    }

    public function updateInfo()
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $fields = ['title', 'content', 'infoId'];
            $validForm = true;
            foreach ($fields as $field) {
                if (empty($field)) {
                    $_SESSION['infoError'] = "Veuillez compléter tous les champs du formulaire";
                    header("location:" . ROOT . "infos_diverses");
                    exit();
                }
            }
            if ($validForm) {
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $id = htmlspecialchars($_POST['infoId']);
                if (!empty($_FILES['image']) && $_FILES['image']['error'] === 0) {
                    $file = $_FILES['image'];
                    $image = Utilities::uploadImage('public/uploads/infos', $file, "infoError", "infos_diverses");
                } else $image = '';

                $result = $this->infosModel->update(["title" => $title, "content" => $content, "image" => $image], $id);
                if ($result === false) {
                    $_SESSION['infoError'] = "Erreur: votre contenu n'a pas pu être modifié.";
                } else {
                    $_SESSION['infoSuccess'] = "Le contenu de votre publication a bien été modifié.";
                }
                header("location:" . ROOT . "infos_diverses");
                exit();
            }
        }
    }

    public function deleteInfo()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (empty($_POST['infoId'])) {
                $_SESSION['infoError'] = "Veuillez compléter tous les champs du formulaire";

                header("location:" . ROOT . "infos_diverses");
                exit();
            }

            $id = htmlspecialchars($_POST['infoId']);
            if (!empty($_POST['infoImage'])) {
                $image = htmlspecialchars($_POST['infoImage']);

                Utilities::unlinkImage('public/uploads/infos/', $image, "infos_diverses", "infoError");
            }
            $result = $this->infosModel->delete($id);
            if ($result === false) {
                $_SESSION['infoError'] = "Erreur: votre contenu n'a pas pu être supprimé.";
            } else {
                $_SESSION['infoSuccess'] = "Votre publication a bien été supprimée..";
            }
            header("location:" . ROOT . "infos_diverses");
            exit();
        }
    }
}
