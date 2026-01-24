<?php

class Router
{
    private array $routes = [];

    public function get(string $path, string $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, string $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    private function addRoute(string $method, string $path, string $handler): void
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function dispatch(): void
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = $_SERVER['REQUEST_URI'];
        
        // Strip query string
        if (($pos = strpos($requestUri, '?')) !== false) {
            $requestUri = substr($requestUri, 0, $pos);
        }

        // Auto-detect base path
        $scriptName = $_SERVER['SCRIPT_NAME']; // /index.php or /Club-Edge/index.php
        $scriptDir = dirname($scriptName);     // / or /Club-Edge
        
        // Normalize slashes (Windows might return backslashes in dirname)
        $scriptDir = str_replace('\\', '/', $scriptDir);

        // Ensure scriptDir has no trailing slash (unless it's just /)
        if ($scriptDir !== '/' && substr($scriptDir, -1) === '/') {
             $scriptDir = substr($scriptDir, 0, -1);
        }

        // Case-insensitive check for base path
        if ($scriptDir !== '/' && stripos($requestUri, $scriptDir) === 0) {
             $requestUri = substr($requestUri, strlen($scriptDir));
        }
        
        // Ensure URI starts with /
        if ($requestUri === '' || $requestUri[0] !== '/') {
            $requestUri = '/' . $requestUri;
        }

        // echo "Debug: URI processed: " . $requestUri . "<br>"; 

        foreach ($this->routes as $route) {
            $pattern = $this->convertToRegex($route['path']);
            
            if ($route['method'] === $requestMethod && preg_match($pattern, $requestUri, $matches)) {
                array_shift($matches); // Remove full match
                $this->callHandler($route['handler'], $matches);
                return;
            }
        }

        // 404 Not Found
        http_response_code(404);
        echo "404 - Page Not Found. URI: " . htmlspecialchars($requestUri);
    }

    private function convertToRegex(string $path): string
    {
        // Convert route path to regex pattern
        // Example: /admin/etudiants/{id} becomes /admin/etudiants/([^/]+)
        $pattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $path);
        return '#^' . $pattern . '$#';
    }

    private function callHandler(string $handler, array $params = []): void
    {
        [$controllerName, $method] = explode('@', $handler);

        // Add namespace to controller
        $controllerClass = "Src\\controllers\\" . $controllerName;

        // Check if controller exists
        if (!class_exists($controllerClass)) {
            die("Error: Controller class '{$controllerClass}' not found. Make sure the file exists in src/controllers/ and is properly autoloaded.");
        }

        // Check if method exists
        if (!method_exists($controllerClass, $method)) {
            die("Error: Method '{$method}' not found in controller '{$controllerClass}'");
        }

        // Instantiate controller and call method
        $controller = new $controllerClass();
        call_user_func_array([$controller, $method], $params);
    }
}