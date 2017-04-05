<?php

namespace HW52\Controllers;

use \HW52\Core\Controller;

class ControllerLogoff extends Controller
{

    public function actionIndex()
    {
        unset($_SESSION['user']);
        unset($_SESSION['idUser ']);

        header('Location: /');

        setcookie("hash", '', time()+60);
        setcookie("login", '', time()+60);
    }

}