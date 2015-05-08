<?php

namespace Core;

use Exception;

class View {
    protected $data;
    protected $path;

    public function  __construct($data = array(), $path = null)
    {

        if (!$path)  {
            $path = self::getDefaultViewPath();
        }

        if (!file_exists($path)) {
            throw new Exception('Template file is not found');
        }

        $this->path = $path;
        $this->data = $data;
    }

    protected  static function getDefaultViewPath()
    {
        $router = App::getRouter();
        if (!$router) {
            return false;
        }

        $template_directDirname = strtolower(str_replace('Controller', '', $router->getController()));
        $template_name = $router->getMethodPrefix() . $router->getAction() . '.php';

        return VIEWS_PATH . DIRECTORY_SEPARATOR . $template_directDirname . DIRECTORY_SEPARATOR . $template_name;
    }

    public function render(){
        $data = $this->data;
        ob_start();
        include($this->path);
        $content = ob_get_clean();
        return $content;
    }
} 