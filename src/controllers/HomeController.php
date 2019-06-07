<?php
namespace App\controllers;
use App\models\entities\User;

class HomeController extends Controller {

    public function index(){
        $this->viewManager->renderTemplate('index.view.html');
    }
}

