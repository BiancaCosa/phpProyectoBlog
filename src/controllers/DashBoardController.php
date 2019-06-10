<?php
namespace App\controllers;
use App\services\USersService;
use App\services\PostsService;

class DashBoardController extends ControllerAuth {

    public function index(){
        
        $PostsService=$this->container->get(PostsService::class);
        $posts = $PostsService->getPostsByIdUser($id);
        $this->viewManager->renderTemplate('dashboard.view.html',['user'=>$user->email, 'posts'=>$posts]);
    }
}