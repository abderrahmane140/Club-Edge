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

                // ✅ FULL namespace
                $controllerClass = "Src\\Controllers\\$controller";

                if (!class_exists($controllerClass)) {
                    http_response_code(500);
                    echo "Controller not found: $controllerClass";
                    return;
                }

                $controllerInstance = new $controllerClass();

                if (!method_exists($controllerInstance, $methodName)) {
                    http_response_code(500);
                    echo "Method not found: $methodName";
                    return;
                }

                $controllerInstance->$methodName(...$matches);
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
