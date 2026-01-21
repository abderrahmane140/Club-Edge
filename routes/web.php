<?php

require_once __DIR__ . '/../src/core/Router.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$router = new Router();

$router->get('/', function() {
    require __DIR__ . '/../resources/views/home.blade.php';
});

$router->get('/register', function() {
    require __DIR__ . '/../resources/views/signup.blade.php';
});

$router->post('/register', 'AuthController@register');

return $router;