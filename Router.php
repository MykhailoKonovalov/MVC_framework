<?php

namespace Router;

use Config\Controller;
use Controllers;
use Models\ModelMenu;

class Router
{
    public static function start()
    {
        $routes = explode('/', $_SERVER["REQUEST_URI"]);
        if (!empty($routes[1])) {
            $controllerName = "Controller" . ucfirst($routes[1]);
            $modelName = "Model" . ucfirst($routes[1]);
        } else {
            $controllerName = "ControllerMain";
            $modelName = "ModelMain";
        }

        if (!empty(($routes[2]))) {
            $actionName = "action" . ucfirst(stristr($routes[2], '?', true));
        } else {
            $actionName = "actionIndex";
        }

        if (file_exists("models" . DIRECTORY_SEPARATOR . $modelName . ".php")) {
            require_once "models" . DIRECTORY_SEPARATOR . $modelName . ".php";
        }

        if (file_exists('controllers' . DIRECTORY_SEPARATOR . $controllerName . '.php')) {
            require_once 'controllers' . DIRECTORY_SEPARATOR . $controllerName . '.php';
        } else {
            Router::error404();
        }

        $controllerName = "\\Controllers\\" . $controllerName;
        $controller = new $controllerName();
        $action = $actionName;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Router:: error404();
        }
    }

    public static function error404()
    {
        header("Location:http://localhost/404");
    }
}
