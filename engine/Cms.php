<?php
// точка запуска моего приложения
namespace Engine;

use Engine\Core\Router\DispatchedRoute;
use Engine\DI\DI;
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
    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
    }


    /**
     * Запуск моего приложения
     */
    public function run()
    {
        try {

            require_once __DIR__ . '/../cms/Route.php';

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

            if ($routerDispatch == null) {
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }


            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = '\\Cms\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);
        } catch (\Exception $e){

            echo $e->getMessage();
            exit;
        }
    }
}