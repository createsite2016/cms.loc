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

    /**
     * На вход приниманиет di контейнер
     * Controller constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
    }
}