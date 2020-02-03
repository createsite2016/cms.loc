<?php

namespace Cms\Controller;

use Engine\Controller;

class CmsController extends Controller
{
    /**
     * HomeController constructor.
     * @param \Engine\DI\DI $di
     */
    public function __construct($di)
    {
        parent::__construct($di);
    }

    public function page404()
    {
        echo '404 страница';
    }
}