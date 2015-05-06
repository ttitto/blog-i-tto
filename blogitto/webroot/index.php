<?php
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DIRECTORY_SEPARATOR.'views');

$url = $_SERVER['REQUEST_URI'];
print_r($url);