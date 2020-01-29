<?php
// точка запуска моего приложения
namespace Engine;

use Engine\Helper\Common;

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
        $this->router->add('home', '/', 'HomeController:index');
        $this->router->add('product', '/product/12', 'ProductController:index');
        $this->router->add('product', '/news', 'HomeController:news');

        $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());


        list($class, $action) = explode(':', $routerDispatch->getController(), 2);

        $controller = '\\Cms\\Controller\\' . $class;
        call_user_func_array([new $controller($this->di), $action], $routerDispatch->getParameters());

        //print_r($routerDispatch);
    }
}