<?php

namespace App\Lib;


class Config
{
    private static $config;

    /**
     * Reads config.php and checks wheather or not key exists
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public static function get($key, $default = null)
    {
        if (is_null(self::$config)) {
            self::$config = require_once(__DIR__ . '/../config.php');
        }

        return !empty(self::$config[$key]) ? self::$config[$key] : $default;
    }
}
