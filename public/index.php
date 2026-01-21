<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/core/Router.php';

$router = new Router();

/* ROUTES */
$router->get('/', 'ClubController@index');

/* DISPATCH (VERY IMPORTANT) */
$router->dispatch();

