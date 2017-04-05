<?php

namespace HW52\Core;

class Controller
{

    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
        session_start();
    }

//    public function actionIndex()
//    {
//        echo 'controllerIndex';
//    }

}