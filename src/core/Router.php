<?php
class Router {

    private array $routes = [];

    public function get($uri, $action){
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action) {
        $this->routes['POST'][$uri] = $action;
    }

public function dispatch() {

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = str_replace('/ClubEdge', '', $uri);

    $method = $_SERVER['REQUEST_METHOD'];

    foreach ($this->routes[$method] ?? [] as $route => $action) {

        $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route);
        $pattern = "#^{$pattern}$#";

        if (preg_match($pattern, $uri, $matches)) {

            array_shift($matches);

            [$controller, $methodName] = explode('@', $action);
            require_once __DIR__ . "/../controllers/$controller.php";
            $controllerInstance = new $controller;
            $controllerInstance->$methodName(...$matches);
            return;
        }
    }

    http_response_code(404);
    echo "404 Not Found";
}

}
