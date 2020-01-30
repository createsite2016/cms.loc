<?php


namespace Engine\Service\View;


use Engine\Service\AbstractProvider;
use Engine\Core\Template\View;

class Provider extends AbstractProvider
{

    /**
     * @var string
     */
    public $serviceName = 'view';

    /**
     * Инициализирует новый сервис в DI контейнер
     * @inheritDoc
     */
    public function init()
    {
        $view = new View();
        $this->di->set($this->serviceName, $view);
    }
}