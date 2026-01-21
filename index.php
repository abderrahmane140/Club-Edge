<?php

require_once __DIR__ .  '/src/core/Database.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/core/Router.php';


$router = new Router();

/* ROUTES */
$router->get('/', 'ClubController@index');  
$router->get('/events', 'EventController@index');
$router->get('/events/show/{id}', 'EventController@show');
$router->get('/events/create', 'EventController@create');
$router->post('/events/store', 'EventController@store');
$router->get('/events/edit/{id}', 'EventController@edit');
$router->post('/events/update/{id}', 'EventController@update');
$router->post('/events/delete/{id}', 'EventController@delete');


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
