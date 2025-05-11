<?php

class GalleryController extends MainController
{
    public function addImage()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // Vérifie qu'au moins un fichier a été envoyé
            if (empty($_FILES['images']['name'][0])) {
                $_SESSION['galleryError'] = "Vous devez sélectionner au moins une image.";
                header('Location: ' . ROOT . 'galerie');
                exit();
            }

            $files = $_FILES['images'];
            $count = count($files['name']);

            for ($i = 0; $i < $count; $i++) {
                // Construction d'un fichier unique pour chaque image
                $file = [
                    'name' => $files['name'][$i],
                    'type' => $files['type'][$i],
                    'tmp_name' => $files['tmp_name'][$i],
                    'error' => $files['error'][$i],
                    'size' => $files['size'][$i]
                ];

                if ($file['error'] !== 0) {
                    $_SESSION['galleryError'] = "Un problème est survenu lors de l'ajout d'une image.";
                    header('Location: ' . ROOT . 'galerie');
                    exit();
                }

                $image = Utilities::uploadImage("public/uploads/gallery/", $file, 'galleryError', 'galerie');
                $result = $this->galleryModel->addImageDb($image);

                if ($result === false) {
                    $_SESSION['galleryError'] = "Une image n'a pas pu être ajoutée.";
                    header('Location: ' . ROOT . 'galerie');
                    exit();
                }
            }

            $_SESSION['gallerySuccess'] = "Toutes les images ont été ajoutées avec succès.";
            header('Location: ' . ROOT . 'galerie');
            exit();
        }
    }
    public function deleteImage()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (empty($_POST['imagesName'])) {
                $_SESSION['galleryError'] = "Veuillez sélectionner une image à supprimer";
                header("location:" . ROOT . "galerie");
                exit();
            }

            $names = $_POST['imagesName'];

            foreach ($names as $name) {

                $result = $this->galleryModel->deleteImageDb(htmlspecialchars($name));
                if ($result === false) {
                    $_SESSION['galleryError'] = "Erreur: les images n'a pas pu être supprimées.";
                    header("location:" . ROOT . "galerie");
                    exit();
                }
                if (!Utilities::unlinkImage("public/uploads/gallery/", $name, "galerie")) {
                    $_SESSION['galleryError'] = "Erreur: les images n'a pas pu être supprimées.";
                } else $_SESSION['gallerySuccess'] = "Les images sélectionnées ont bien été supprimées.";
            }
            header("location:" . ROOT . "galerie");
            exit();
        }
    }
}
