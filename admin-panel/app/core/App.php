<?php

namespace Core;

class App
{
    public static function run()
    {
        Route::init();

        $controllerClass = '\\Controllers\\' . ucfirst(Route::getController()) . 'Controller';
        $pathControllerClass = sprintf("%s/../controllers/%sController.php", __DIR__, ucfirst(Route::getController()));

        if (!file_exists($pathControllerClass)) {
            echo 'Error';
            exit;
        }

        $action = Route::getAction() . 'Action';
        $controller = new $controllerClass();

        if (!method_exists($controller, $action)) {
            echo 'Error2';
            exit;
        }

        $controller->$action();
    }
}
