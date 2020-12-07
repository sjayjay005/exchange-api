<?php namespace App\Model;

use App\Lib\Config;

class Currencies
{
    private static $DATA = [];

    public static function all()
    {
        return self::$DATA;
    }

    public static function add($currency)
    {
        $currency->id = count(self::$DATA) + 1;
        self::$DATA[] = $currency;
        self::save();
        return $currency;
    }

    public static function findById(int $id)
    {
        foreach (self::$DATA as $currency) {
            if ($currency->id === $id) {
                return $currency;
            }
        }
        return [];
    }

    public static function load()
    {
        $DB_PATH = Config::get('DB_PATH', __DIR__ . '/../../db.json');
        self::$DATA = json_decode(file_get_contents($DB_PATH));
    }

    public static function save()
    {
        $DB_PATH = Config::get('DB_PATH', __DIR__ . '/../../db.json');
        file_put_contents($DB_PATH, json_encode(self::$DATA, JSON_PRETTY_PRINT));
    }
}