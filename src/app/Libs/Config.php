<?php
/**
 * Created by PhpStorm.
 * User: Young
 * Date: 2017/11/1
 * Time: 15:07
 */

namespace App\Libs;


class Config
{
    private static $config = [];

    public static function getConfig()
    {
        return self::$config;
    }

    public static function setItem($key, $var)
    {
        if (!isset(self::$config['items'][$key])) {
            self::$config['items'][$key] = $var;
        }
    }

    public static function getItem($key)
    {
        if (isset(self::$config['items'][$key])) {
            return self::$config['items'][$key];
        } else {
            throw new \Exception("No key : ".$key);
        }
    }

    public static function setInstance($key, $var)
    {
        if (!isset(self::$config[$key])) {
            self::$config[$key] = $var;
        }
    }

    public static function getInstance($key)
    {
        if (isset(self::$config['container'][$key])) {
            return self::$config['container'][$key];
        } else {
            throw new \Exception("No key : ".$key);
        }
    }

    public static function setSettings($key, $var)
    {
        if (!isset(self::$config[$key])) {
            self::$config[$key] = $var;
        }
    }

    public static function getSettings($key='')
    {
        if (isset(self::$config['settings'][$key])) {
            return self::$config['settings'][$key];
        } else {
            throw new \Exception("No settings key : ".$key);
        }
    }
}