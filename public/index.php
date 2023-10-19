<?php

session_start();

require '../vendor/autoload.php';

use core\Router;

$router = new Router();

$router->get('/{id}', 'HomeController@index');
$router->get('/home', 'HomeController@index');
$router->get('/update', 'UpdateController@index');
$router->get('/login', 'LoginController@index');

$router->run();