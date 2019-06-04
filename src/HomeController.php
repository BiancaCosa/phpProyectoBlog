<?php
namespace App\controllers;
 use App\ViewManager;

class HomeControllers{


    public function index(){
        $viewManager = new ViewManager();
        $viewManager->renderTemplate('index.view.html');
    }
}

