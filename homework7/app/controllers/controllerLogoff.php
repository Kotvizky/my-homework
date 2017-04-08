<?php

namespace MyApp\Controllers;

use MyApp\Core\Controller;

class ControllerLogoff extends Controller
{

    public function actionIndex()
    {
        unset($_SESSION['user']);

        header('Location: /');

        setcookie("hash", '', time()+60);
        setcookie("id", '', time()+60);
    }

}