<?php

namespace HW52\Core;

use \ReflectionMethod;

class Route
{
    const CONTROLLER_NAMESPACE = 'HW52\Controllers\\';

    /**
     *
     */
    public static function start()
    {
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

    public static function ErrorPage404()
    {
        echo '<br><br>404'; die();
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:'.$host.'404');
    }

}