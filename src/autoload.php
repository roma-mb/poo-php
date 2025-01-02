<?php

declare(strict_types=1);

spl_autoload_register(static function (string $fullPath) {
    $path  = str_replace(['App', '\\'], ['src', DIRECTORY_SEPARATOR], $fullPath) . '.php';

    if (file_exists($path)) {
        require_once($path);
    }
});
