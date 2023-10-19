<?php

session_start();

require '../vendor/autoload.php';

use \core\Router;
use \middlewares\ExampleMiddleware;

$router = new Router();

$router->get('/', 'HomeController@index', new ExampleMiddleware());
$router->get('/home', 'HomeController@index');
$router->get('/update', 'UpdateController@index');
$router->get('/login', 'LoginController@index');

$router->run();