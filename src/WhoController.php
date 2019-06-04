<?php
namespace App\controllers;
 use App\ViewManager;

class WhoControllers{


    public function index(){
        $viewManager = new ViewManager();
        $viewManager->renderTemplate('who.view.html');
    }
}

