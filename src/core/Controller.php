<?php

abstract class Controller {

    protected function view(string $view, array $data = []) : void{
        extract($data);
        require_once __DIR__ . "/../views/{$view}.php";
    }



    protected function redirect(string $url){
        header("Location: {$url}");
        exit;
    }

    protected function json(array $data, int $statusCode = 200) {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }
}