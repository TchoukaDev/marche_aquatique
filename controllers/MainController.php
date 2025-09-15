<?php
require_once "models/PdoModel.php";
require_once "models/BaseModel.php";
require_once "models/UsersModel.php";
require_once "models/InfosModel.php";
require_once "models/GalleryModel.php";
class MainController
{

    public $usersModel;
    public $infosModel;
    public $galleryModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->infosModel = new InfosModel();
        $this->galleryModel = new GalleryModel();
        $this->autoLogin();
    }
    public function autoLogin()
    {


        if (isset($_COOKIE['autoLogin']) && !isset($_SESSION['connected'])) {

            $cookie = htmlspecialchars($_COOKIE['autoLogin']);

            $user = $this->usersModel->selectUserbyCookie($cookie);
            if ($user) {
                $_SESSION['connected'] = true;
                $_SESSION['user'] = $user;

                if ($user['isAdmin'] === 1) {
                    $_SESSION['admin'];
                }
            }
        }
    }
}
