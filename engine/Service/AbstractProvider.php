<?php


namespace Engine\Service;


abstract class AbstractProvider
{
    /**
     * @var \Engine\DI\DI;
     */
    protected $di;

    /**
     * AbstractProvider constructor.
     * Внутрь конструктора передается DI контейнер и все что будет передаваться будет записываться в переменную protected $di
     * @param \Engine\DI\DI $di
     */
    public function __construct(\Engine\DI\DI $di)
    {
        $this->di = $di;
    }

    /**
     * Инициализация нового сервиса в DI контейнер
     * @return mixed
     */
    abstract function init();
}