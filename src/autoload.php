<?php

spl_autoload_register(static function (string $fullPath){
    $path  = str_replace('App', 'src', $fullPath);
    $path  = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    $path .= '.php';

    if (file_exists($path)) {
        require_once($path);
    }
});