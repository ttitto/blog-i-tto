<?php

namespace Blogitto;

class App
{

    protected static $router;

    /**
     * @return \Blogitto\Router
     */
    public static function getRouter()
    {
        return self::$router;
    }

    public static function run($uri)
    {
        self::$router = new Router($uri);
    }

} 