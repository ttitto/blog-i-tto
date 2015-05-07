<?php
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT . DIRECTORY_SEPARATOR . 'views');
define('NS', 'Core');
define('NS_APP', 'Blogitto');

require_once(ROOT . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'init.php');

\Core\App::run($_SERVER['REQUEST_URI']);

