<?php

/**
 * exchange API V1
 *
 * @author    sjayjay005
 * @link      https://github.com/sjayjay005
 *
 */

namespace App\Lib;

class App{
    public static function run(){
        Logger::enableSystemLogs();
        Twig_AutoLoader::register();
    }
}