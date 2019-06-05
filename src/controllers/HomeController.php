<?php
namespace App\controllers;

class HomeController extends Controller {

    public function index(){
        $this->viewManager->renderTemplate('index.view.html');
    }
}

