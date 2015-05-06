<?php

namespace Core;

use Exception;

class App
{

    protected static $router;

    /**
     * @return \Core\Router
     */
    public static function getRouter()
    {
        return self::$router;
    }

    public static function run($uri)
    {
        self::$router = new Router($uri);

        $controller_class =NS_APP.DIRECTORY_SEPARATOR. self::$router->getController() . 'Controller';
        $controller_method = self::$router->getMethodPrefix() . self::$router->getAction();

        $controller_obj = new $controller_class();
        if (method_exists($controller_obj, $controller_method)) {
            $view_path = $controller_obj->$controller_method();

        } else {
            throw new Exception('Action could not be found.');
        }
    }

} 