<?php

require_once __DIR__ .  '/src/core/Database.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/core/Router.php';


$router = new Router();

/* ROUTES */
$router->get('/', 'ClubController@index');
$router->get('/register', 'AuthController@register');
$router->post('/register', 'AuthController@register');
$router->get('/login', 'AuthController@login');
$router->post('/login', 'AuthController@login');
$router->get('/club', 'ClubController@club');
$router->post('/club', 'ClubController@club');
$router->get('/admin', 'AdminController@index');
$router->post('/admin', 'AdminController@index');

/* DISPATCH (VERY IMPORTANT) */
$router->dispatch();

$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        [$key, $value] = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value);
    }
}