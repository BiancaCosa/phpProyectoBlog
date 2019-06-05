<?php
namespace App\controllers;
use App\DoctrineManager;

class HomeController extends Controller {

    public function index(DoctrineManager $doctrine){
        $this->viewManager->renderTemplate('index.view.html');
    }
}

