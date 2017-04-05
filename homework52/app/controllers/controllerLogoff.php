<?php

namespace HW52\Controllers;

use \HW52\Core\Controller;

class ControllerLogoff extends Controller
{

    public function actionIndex()
    {
        session_destroy();
        header('Location: /');
    }

}