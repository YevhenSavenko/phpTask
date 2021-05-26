<?php

namespace Core;

class Route
{
    private static $action;
    private static $controller;

    private static function getURI(): string
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim(($_SERVER['REQUEST_URI']), '/');
        }
    }

    public static function init()
    {

        $uri = self::getURI();
        $pathPart = explode('?', $uri);
        $pathHead = explode('/', array_shift($pathPart));


        if (isset($pathHead[0])) {
            if ($pathHead[0] === 'index.php') {
                array_shift($pathHead);
            }
        }

        self::$controller = !empty($pathHead[0]) ? $pathHead[0] : 'index';
        self::$action = !empty($pathHead[1]) ? $pathHead[1] : 'index';
    }

    public static function getController()
    {
        return self::$controller;
    }

    public static function getAction()
    {
        return self::$action;
    }
}
