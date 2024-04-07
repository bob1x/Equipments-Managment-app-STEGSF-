<?php

const BASE_PATH = __DIR__ . '/../';
//var_dump(BASE_PATH);
require BASE_PATH . 'core/functions.php'; //5ater yelzmou yara il functions 9bal me ye3mel

spl_autoload_register(function ($class) {
    //Core\Database
    $class = str_replace("\\", '/', $class);
    
    require base_path($class.'.php');

});

$router = new \core\Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method =$_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

