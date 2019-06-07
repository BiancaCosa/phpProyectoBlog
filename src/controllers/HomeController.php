<?php
namespace App\controllers;
use App\models\entities\User;
use App\DoctrineManager;
use App\models\entities\Post;


class HomeController extends Controller {

    public function index(){
        $doctrineManager=$this->container->get(DoctrineManager::class);
        $repository=$doctrineManager->em->getRepository(Post::class);
        $posts=$repository->findAll();
        $this->viewManager->renderTemplate('index.view.html');
    }
}

