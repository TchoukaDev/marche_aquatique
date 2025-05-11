<?php

class Utilities
{
    public static function renderPage($datasPage)
    {
        extract($datasPage);
        ob_start();
        require $view;
        $content = ob_get_clean();
        require $layout;
    }

    public static function uploadImage($directory, $file, $error, $redirection)
    {
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $validExtensions = ["png", "jpg", "jpeg", "gif"];

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
        if ($file['size'] > 5000000) {
            $_SESSION[$error] = "Erreur: l'image ne doit pas dépasser 5Mo.";
            header("location:" . ROOT . $redirection);
            exit();
        }
        if (!in_array($extension, $validExtensions)) {
            $_SESSION[$error] = "Erreur: le format de l'image doit être de type jpg, jpeg, png ou gif.";
            header("location:" . ROOT . $redirection);
            exit();
        }

        $fileRenamed = time() . rand() . rand() . "_" . $file['name'];
        $targetfile = $directory . $fileRenamed;
        if (file_exists($targetfile)) {
            $_SESSION[$error] = "Erreur: ce nom de fichier existe déjà, veuillez réessayer";
            header("location:" . ROOT . $redirection);
            exit();
        }
        if (!move_uploaded_file($file['tmp_name'], $targetfile)) {
            $_SESSION[$error] = "Erreur: une erreur est survenue lors du chargement de l'image, veuillez réessayer";
            header("location:" . ROOT . $redirection);
            exit();
        } else {
            return $fileRenamed;
        }
    }

    public static function unlinkImage($directory, $file, $redirection)
    {
        if (!unlink($directory . $file)) {
            $_SESSION['galleryError'] = "Erreur: le fichier à supprimer n'existe pas.";
            header("location:" . ROOT . $redirection);
            exit();
        } else return true;
    }

    public static function showArray($array)
    {
        echo '<pre>';
        print_r($array);
        echo 'pre>';
    }
}
