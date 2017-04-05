<?php

namespace HW52\Core;

class Controller
{

    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function message($message)
    {
        $_SESSION['message'] = $message;
    }

}