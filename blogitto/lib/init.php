<?php
require_once(ROOT . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php');

function __autoload($class_name)
{
    $class_name = str_replace(NS_APP . DIRECTORY_SEPARATOR, '', $class_name);
    $class_path = ROOT . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . str_replace(NS . DIRECTORY_SEPARATOR, '', $class_name) . '.php';
    $controller_path = ROOT . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $class_name . '.php';
    $model_path = ROOT . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $class_name . '.php';

    if (file_exists($class_path)) {
        require_once($class_path);
    } elseif (file_exists($controller_path)) {
        require_once($controller_path);
    } elseif (file_exists($model_path)) {
        require_once($model_path);
    } else {
        throw new Exception('Could not load file for ' . $class_name);
    }
}

function __($key, $default_lang_value){
    return \Core\Lang::get($key, $default_lang_value);
}
