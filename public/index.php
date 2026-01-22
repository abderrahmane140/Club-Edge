<?php

require_once __DIR__ . '/../vendor/autoload.php';


if (file_exists(__DIR__ . '/../.env')) {
    $env = parse_ini_file(__DIR__ . '/../.env');
    foreach ($env as $key => $value) {
        $_ENV[$key] = $value;
    }



}

require_once __DIR__ . '/../routes/web.php';
