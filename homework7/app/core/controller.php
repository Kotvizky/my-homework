<?php

namespace MyApp\Core;
use MyApp\Config;
use Illuminate\Database\Capsule\Manager as Capsule;

class Controller
{
    public $model;
    public $view;

    public static function user($field)
    {
        return $_SESSION['user'][$field];
    }


    public function __construct()
    {

        $this->view = new View();
    }

    public function message($message)
    {
        $_SESSION['message'] = $message;
    }

}