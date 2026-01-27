<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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
$router->get('/admin/create', 'ClubController@create');
$router->post('/admin/save', 'AdminController@update');
$router->post('/admin/create', 'ClubController@createClub');



$router->post('/admin/std', 'Adminstudentcontroller@index');

$router->get('/detailsClub', 'ClubController@details');
$router->get('/myClub', 'ClubController@myClub');
$router->post('/joinClub', 'ClubController@join');
$router->post('/confirmPresence', 'ClubController@confirmPresence');
$router->post('/logout', 'AuthController@logout');

/* PRESIDENT ROUTES */
$router->get('/president', 'ClubController@presidentDashboard');
$router->post('/president/create-event', 'ClubController@createEvent');
$router->post('/president/create-article', 'ClubController@createArticle');





/* DISPATCH (VERY IMPORTANT) */
$router->dispatch();


