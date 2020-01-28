<?php


namespace Engine\Core\Router;


class Router
{
    /**
     * В массиве хранится список всех роутов
     * @var array
     */
    private $routes = [];
    private $dispatcher;
    private $host;

    /**
     * Router constructor.
     * @param $host
     */
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * Добавляет роуты
     * @param $key
     * @param $pattern
     * @param $controller
     * @param string $method
     */
    public function add($key, $pattern, $controller, $method = 'GET')
    {
        $this->routes[$key] = [
            'pattern'    => $pattern,
            'controller' => $controller,
            'method'     => $method
        ];
    }

    public function dispatch($method, $uri)
    {

    }

    public function getDispatcher()
    {
        if($this->dispatcher === null)
        {

        }

        return $this->dispatcher;
    }
}