<?php
require_once "models/UsersModel.php";
require_once "models/ArticlesModel.php";
class MainController
{

    public $usersModel;
    public $articlesModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->articlesModel = new ArticlesModel();
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
            }
        }
    }
}
