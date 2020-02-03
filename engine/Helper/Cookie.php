<?php

namespace Engine\Helper;
/**
 * Class Cookie для работы с куки (запись/чтение/удаление)
 * @package Engine\Helper
 */
class Cookie
{
    /**
     * Добавить cookies
     * @param $key
     * @param $value
     * @param int $time
     */
    public static function set($key, $value, $time = 31536000)
    {
        setcookie($key, $value, time() + $time, '/') ;
    }

    /**
     * Получить cookies по ключу
     * @param $key
     * @return null
     */
    public static function get($key)
    {
        if ( isset($_COOKIE[$key]) ) {
            return $_COOKIE[$key];
        }
        return null;
    }

    /**
     * Удалить cookies по ключу
     * @param $key
     */
    public static function delete($key)
    {
        if ( isset($_COOKIE[$key]) ) {
            self::set($key, '', -3600);
            unset($_COOKIE[$key]);
        }
    }
}