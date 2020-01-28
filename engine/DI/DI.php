<?php

namespace Engine\DI;

class DI
{
    /** Контейнер зависимостей
     * @var array
    */
    private $container = [];

    /**
     * C помощью этой функции мы будем добавлять зависимость в контейнер
     * @param $key
     * @param $value
     * @return $this
    */
    public function set($key, $value)
    {
        $this->container[$key] = $value;

        return $this;
    }

    /**
     * Получение зависимости по ключу
     * @param $key
     * @return mixed
    */
    public function get($key)
    {
        return $this->has($key);
    }

    /**
     * Проверяем если зависимость в нашем контейнере
     * @param $key
     * @return bool
    */
    public function has($key)
    {
        return isset($this->container[$key]) ? $this->container[$key] : null;
    }
}