<?php

namespace Core;

class Router
{
    protected $uri;
    protected $controller;
    protected $action;
    protected $params;
    protected $route;
    protected $method_prefix;
    protected $language;

    public function  __construct($uri)
    {
        $this->uri = urldecode(trim($uri, '/'));

        $routes = Config::get('routes');

        $this->route = Config::get('default_route');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : Config::get('routes')['default'];
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');
        $this->language = Config::get('default_language');

        // Parse url like /lng/method_prefix/controller/action/param1/param2/...
        $uri_parts = explode('?', $this->uri);
        $path = $uri_parts[0];
        $path_parts = explode('/', $path);

        if (count($path_parts)) {
            if (in_array(strtolower(current($path_parts)), array_keys($routes))) {
                $this->route = strtolower(current($path_parts));
                $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : Config::get('routes')['default'];
                array_shift($path_parts);
            } elseif (in_array(strtolower(current($path_parts)), Config::get('languages'))) {
                $this->language = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            if (current($path_parts)) {
                $this->controller = ucfirst(strtolower(current($path_parts)));
                array_shift($path_parts);
            }

            if (current($path_parts)) {
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            $this->params = $path_parts;
        }
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }
} 