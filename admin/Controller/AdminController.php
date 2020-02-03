<?php

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;

class AdminController extends Controller
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * AdminController constructor.
     * @param \Engine\DI\DI $di
     */
    public function __construct($di)
    {
        parent::__construct($di);

        $this->auth = new Auth();

        $this->checkAuthorization();

        if(isset($this->request->get['logout']))
        {
            $this->auth->unAuthorize();
        }
    }

    /**
     *  Проверка авторизации пользователя
     */
    public function checkAuthorization()
    {
        if($this->auth->hashUser() !== null)
        {
            $this->auth->authorize($this->auth->hashUser());
        }

        if(!$this->auth->authorized())
        {
            // если пользователь не авторизован
            header('Location: /admin/login/', true, 301);
            exit;
        }
    }
}