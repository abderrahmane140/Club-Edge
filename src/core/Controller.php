<?php

namespace Src\core;
class Controller {

    protected function view(string $view, array $data = []) : void{
        extract($data);
        require_once __DIR__ . "/../views/{$view}.php";
    }

    protected function redirect(string $url){
        header("Location: {$url}");
        exit;
    }
}