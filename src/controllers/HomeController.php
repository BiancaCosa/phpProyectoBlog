<?php
namespace App\controllers;
use App\services\Postservice;
use App\models\entities\Post;



class HomeController extends Controller {

    public function index(){

        $PostsService=$this->container->get(PostsService::class);
        $PostsService->getPosts();
        $this->viewManager->renderTemplate('index.view.html', ['posts'=>$posts]);
    }
}

