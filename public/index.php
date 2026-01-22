<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/core/Router.php';

$router = new Router();

$router->get('/', 'ClubController@index');
$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@register');

$router->dispatch();

