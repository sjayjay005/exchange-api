<?php

namespace App\Lib;


use Monolog\ErrorHandler;
use Monolog\Handler\StreamHandler;

class Logger extends \Monolog\Logger
{
    private $loggers = [];

    public function __construct($key = "app", $config = null)
    {
        parent::__construct($key);

        if (empty($config)) {
            $LOG_PATH = Config::get('LOG_PATH', __DIR__ . '../../logs');
            $config = [
                'logfile' => "{$LOG_PATH}/{$key}.log",
                'loglevel' => \Monolog\Logger::DEBUG
            ];
        }

        $this->pushHandler(new StreamHandler($config['logFile'], $config['loglevel']));
    }

    public static function getInstance($key = "app", $config = null)
    {
        if (empty(self::$loggers[$key])) {
            self::$loggers[$key] = new Logger($key, $config);
        }

        return self::$loggers[$key];
    }

    /**
     * Generating simple log files errors.log, requests.log and app.log
     * errors.log will be active while the rest will be used on-demand
     */
    public static function enableSystemLogs()
    {
        $LOG_PATH = Config::get('LOG_PATH', __DIR__ . '../../logs');

        //Error Log
        self::$loggers['error'] = new Logger('errors');
        self::$loggers['error']->pushHandler(new StreamHandler("{$LOG_PATH}/errors.log"));
        ErrorHandler::register(self::$loggers['error']);

        //Request log
        $data = [
            $_SERVER,
            $_REQUEST,
            trim(file_get_contents("php//input"))
        ];

        self::$loggers['request'] = new Logger('request');
        self::$loggers['request']->pushHandler(new StreamHandler("{$LOG_PATH}/request.log"));
        self::$loggers['request']->info("REQUEST", $data);
    }
}