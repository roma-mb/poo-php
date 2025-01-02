<?php

declare(strict_types=1);

namespace App\langs;

final class Lang
{
    public static function get(string $message, string $language = 'en', array $replace = []): string
    {
        $levels = explode('.', $message);
        $fileName = array_shift($levels) . '.php';
        $path = __DIR__ . DIRECTORY_SEPARATOR . $language . DIRECTORY_SEPARATOR;
        $fileNotExists = !file_exists("{$path}{$fileName}");

        if ($fileNotExists) {
            return '';
        }

        $data = include($path . $fileName);
        $message = self::getMessage($levels, $data);

        foreach ($replace as $key => $value) {
            $message = str_replace($key, $value, $message);
        }

        return $message;
    }

    private static function getMessage(array $levels, array $data)
    {
        $message = '';

        foreach ($levels as $key => $level) {
            $message = $data[$level] ?? '';

            if (is_array($message)) {
                unset($levels[$key]);
                $message = self::getMessage($levels, $message);
                break;
            }
        }

        return $message;
    }
}
