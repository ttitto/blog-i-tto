<?php

namespace Core;

use Exception;

class App
{

    protected static $router;
    public static $db;

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
        self::$db = new Db(Config::get('db.host'), Config::get('db.user'), Config::get('db.password'), Config::get('db.db_name'));
        Lang::load(self::$router->getLanguage());

        $controller_class = NS_APP . DIRECTORY_SEPARATOR . self::$router->getController() . 'Controller';
        $controller_method = self::$router->getMethodPrefix() . self::$router->getAction();

        $controller_obj = new $controller_class();
        if (method_exists($controller_obj, $controller_method)) {
            $view_path = $controller_obj->$controller_method();
            $view_object = new View($controller_obj->getData(), $view_path);
            $content = $view_object->render();
        } else {
            throw new Exception('Action could not be found.');
        }

        $layout = self::$router->getRoute();
        $layout_path = VIEWS_PATH . DIRECTORY_SEPARATOR . $layout . '.html';
        $layout_view_obj = new View(compact('content'), $layout_path);
        echo $layout_view_obj->render();
    }

} 