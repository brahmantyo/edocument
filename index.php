<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(__DIR__));

global $uri;$uri = $_SERVER['REQUEST_URI'];
global $url;$url = isset($_GET['url']) ? $_GET['url'] : null ;

require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'library' . DS . 'bootstrap.php');