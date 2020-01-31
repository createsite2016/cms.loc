<?php

namespace Admin\Controller;

use Engine\Controller;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     * @param \Engine\DI\DI $di
     */
    public function __construct($di)
    {
        parent::__construct($di);
    }
}