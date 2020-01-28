<?php
// точка запуска моего приложения
namespace Engine;

class Cms
{
    /**
     * @var DI
    */
    private $di;

    public $router;

    /**
     * CMS конструктор, сюда передаются все зависимости
     * @param $di
    */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }


    /**
     * Запуск моего приложения
     */
    public function run()
    {
        //$this->router->add('home', '/', 'HomeController:index');
        //$this->router->add('product', '/product/{id}', 'ProductController:index');

        print_r($this->di);
    }
}