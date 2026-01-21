<?php


namespace Src\core;

abstract class Controller {

    protected function view(string $folder,string $view, array $data = []) : void{
        extract($data);
        // require_once __DIR__ . "/../views/home/home.blade.php";
        require_once __DIR__ . "/../views/{$folder}/{$view}.php";
    }

    protected function redirect(string $url){
        header("Location: {$url}");
        exit;
    }
}