<?php
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DIRECTORY_SEPARATOR.'views');
define('NS', 'Blogitto');

require_once(ROOT . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'init.php');

$router = new \Blogitto\Router($_SERVER['REQUEST_URI']);
