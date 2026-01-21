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

        //  Get URL path
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace('/public', '', $uri);

        // Get request method
        $method = $_SERVER['REQUEST_METHOD'];

        // Loop through routes of this method
        foreach ($this->routes[$method] ?? [] as $route => $action) {

            // Convert {param} to regex
            $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route);
            $pattern = "#^{$pattern}$#";

            //  Check if URL matches route
            if (preg_match($pattern, $uri, $matches)) {

                //  Remove full match, keep params only
                array_shift($matches);

                // Load controller & method
                [$controller, $methodName] = explode('@', $action);
                require_once __DIR__ . "/../controllers/$controller.php";

                // Call method with params
                $controllerInstance = new $controller;
                $controllerInstance->$methodName(...$matches);
                return;
            }
        }

        //  No route matched
        http_response_code(404);
        echo $uri;
        echo "404 Not Found";
    }
}