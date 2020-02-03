<?php

namespace Cms\Controller;

class HomeController extends CmsController
{
    public function index()
    {
        $data = ['name' => 'Andrey'];
        $this->view->render('index',$data);
    }

    public function news($id = null)
    {
        echo $id;
    }
}