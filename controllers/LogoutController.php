<?php

class LogoutController
{
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        setcookie("autoLogin", "", time() - 1, "/");
        header('location: accueil');
        exit();
    }
}
