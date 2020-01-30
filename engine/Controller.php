<?php


namespace Engine;


use Engine\DI\DI;

abstract class Controller
{
    /**
     * @var DI
     */
    protected $di;

    protected $db;

    protected $view;

    /**
     * На вход приниманиет di контейнер
     * Controller constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->view = $this->di->get('view');
    }
}