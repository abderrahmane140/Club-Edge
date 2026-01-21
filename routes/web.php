<?php

require_once __DIR__ . '/../src/core/Router.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$router = new Router();

$router->get('/', function() {
    require __DIR__ . '/../src/views/home/home.blade.php';
});

$router->get('/register', function() {
    require __DIR__ . '/../src/views/auth/signup.blade.php';
});

$router->post('/register', 'AuthController@register');

return $router;