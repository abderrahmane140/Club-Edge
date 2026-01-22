<?php

require_once __DIR__ .  '/src/core/Database.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/core/Router.php';


$envFile = __DIR__ . '/.env';

if (!file_exists($envFile)) {
    die('.env file not found');
}

$lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    if (str_starts_with(trim($line), '#')) continue;
    if (!str_contains($line, '=')) continue;

    [$key, $value] = explode('=', $line, 2);
    $_ENV[trim($key)] = trim($value);
}

$router = new Router();

/* ROUTES */
$router->get('/', 'ClubController@index');
$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@register');
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@login');
$router->get('/club', 'ClubController@club');
$router->post('/club', 'ClubController@club');
$router->post('/admin/delete', 'AdminController@delete');
$router->get('/admin', 'AdminController@index');
$router->get('/admin/etudiants/{id}', 'AdminController@edit');
$router->post('/admin/etudiants/{id}', 'AdminController@edit');



$router->post('/admin/std', 'Adminstudentcontroller@index');





/* DISPATCH (VERY IMPORTANT) */
$router->dispatch();


