<?php
require __DIR__ . "/../src/controllers/AuthController.php";
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => ['AuthController', 'signup'],
    '/signup' => ['AuthController', 'signup'],
];

$path = rtrim($path, '/');
if ($path === '') $path = '/';

if (isset($routes[$path])) {
    [$controller, $method] = $routes[$path];

    $controllerObj = new $controller();

    if (method_exists($controllerObj, $method)) {
        $controllerObj->$method();
    } else {
        http_response_code(500);
        echo "Method not found.";
    }
} else {
    http_response_code(404);
    echo "Page not found.";
}