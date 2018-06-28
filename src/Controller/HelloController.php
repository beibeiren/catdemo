<?php
namespace App\Controller;

use App\Controller\AppController;


class HelloController extends AppController
{

    public function index()
    {
        $this->autoRender = true;
        $this->viewBuilder()->enableAutoLayout(true);
        $this->viewBuilder()->setLayout("hello");
        // $this->setAction("other");
        // $this->redirect("/hello/other");
    }

    public  function  other() {
        $this->autoRender = true;
        $this->viewBuilder()->enableAutoLayout(true);
        $this->viewBuilder()->setLayout("hello");

    }

}
