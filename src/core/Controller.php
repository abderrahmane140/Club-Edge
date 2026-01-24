<?php


namespace Src\core;

use eftec\bladeone\BladeOne;

abstract class Controller {





    protected function view(string $view, array $data = []): void {
        // Remove .blade or .php extension if present
        $view = str_replace(['.blade.php', '.php', '.blade'], '', $view);
        
        // BladeOne prefers dot notation
        $view = str_replace('/', '.', $view);
        
        $views = __DIR__ . '/../views';
        $cache = __DIR__ . '/../../cache';

        // Use BladeOne for standalone usage
        $blade = new \eftec\bladeone\BladeOne($views, $cache, \eftec\bladeone\BladeOne::MODE_AUTO);

        echo $blade->run($view, $data);
    }

    protected function redirect(string $url){
        header("Location: {$url}");
        exit;
    }
}