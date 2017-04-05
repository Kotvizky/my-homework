<?php

namespace HW52\Core;

use \ReflectionMethod;
use \HW52\Config;
use \HW52\Models\ModelUsers;

class Route
{
    const CONTROLLER_NAMESPACE = 'HW52\Controllers\\';

    /**
     *
     */
    public static function start()
    {

        session_start();

        if (!empty($_COOKIE) && $_COOKIE['login'] && $_COOKIE['hash']) {
            $user = ModelUsers::checkCookie();
            if ($user) {
                $_SESSION['user'] = $user['login'];
                $_SESSION['idUser'] = $user['id'];
                //print_r($_SESSION); print_r($user);die();
            }
        }

        $controllerName = 'Main';
        $actionName = 'Index';


        // http://mvc/controller/action/id
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем контроллер
        if (!empty($routes[1])) {
            $controllerName =  strtolower($routes[1]);
        }

        // получаем действие
        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }

        if (!self::checkAccess($controllerName)) {
            $_SESSION['message'] = 'Для доступа необходима регистрация!';
            header('Location: /');
            exit();
        }

        $controllerName = 'Controller' . ucfirst($controllerName);
        $actionName = 'action' . ucfirst($actionName);

        // получаем Id
        if (!empty($routes[3])) {
            $id = $routes[3];
        }


        $controller_class = self::CONTROLLER_NAMESPACE.$controllerName;
        $routeExist = false;

        if (class_exists($controller_class)) {
            $controller = new $controller_class;
            if (method_exists($controller, $actionName)) {
                $reflection = new ReflectionMethod($controller, $actionName);
                if (!empty($reflection->getParameters())) {
                    $controller->$actionName($id);
                } else {
                    $controller->$actionName();
                }
                 $routeExist = true;
            }
        }

        if (!$routeExist) {
            Route::ErrorPage404();
        }
    }

    protected function checkAccess($controller)
    {
        $access = true;
        if ((!$_SESSION['user']) && in_array($controller, Config::$adminControllers)) {
            $access = false;
        }
        return $access;
    }


    public static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:'.$host.'404');
    }

}