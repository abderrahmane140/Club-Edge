<?php


namespace Src\core;

use eftec\bladeone\BladeOne;

abstract class Controller {





    protected function view(string $view, array $data = []): void {
        $view = str_replace(['.blade.php', '.php', '.blade'], '', $view);
        
        $view = str_replace('/', '.', $view);
        
        $views = __DIR__ . '/../views';
        $cache = __DIR__ . '/../../cache';

        $blade = new \eftec\bladeone\BladeOne($views, $cache, \eftec\bladeone\BladeOne::MODE_AUTO);

        echo $blade->run($view, $data);
    }

    protected function redirect(string $url){
        header("Location: {$url}");
        exit;
    }
}