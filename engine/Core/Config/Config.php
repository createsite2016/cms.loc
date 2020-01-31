<?php


namespace Engine\Core\Config;


class Config
{
    public static function item($key, $group = 'main')
    {
        $groupItems = static::file($group);

        return isset($groupItems[$key]) ? $groupItems[$key] : null;
    }

    /**
     * Получение конфиг файла
     * @param $group
     * @return bool|mixed
     * @throws \Exception
     */
    public static function file($group)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . strtolower(ENV) . '/Config/' . $group . '.php';

        if(file_exists($path))
        {
            $items = require_once $path;

            if(is_array($items))
            {
                return $items;
            }
            else
            {
                throw new \Exception(
                    sprintf('Конфигурационный файл <strong>%s</strong> не массив.', $path)
                );
            }
        }
        else
        {
            throw new \Exception(
                sprintf('Не удалось получить файл конфига, конфиг <strong>%s</strong> не найден.', $path)
            );
        }

        return false;
    }
}