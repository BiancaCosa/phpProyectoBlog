<?php

namespace App\controllers;
use App\services\UsersServices;
use App\DoctrineManager;
use App\models\entities\Post;
use App\services\PostsServices;

class PostController extends ControllerAuth {
    public function index(){
        $this->viewManager->renderTemplate('form-post.view.html',['user', $this->user->email]);
    }

    public function create(DocttrineManager $doctrine){
        $title= $_POST['title'];
        $body= $_POST['body'];
        $idUser= $this->user->id;

        $post = new Post();
        $post->title= $title;
        $post->body= $body;
        $post->IdUSer = $idUSer;
        $doctrine->em->persist($post);
        $doctrine->em->flush();
        $this->redictTo('dashboard');
    }

    public function delete($id){
        $postService =$this->container->get(PostsService::class);
        try{
            $postService->deletePostUSerById($this->user->id, $id);
            $this->redirectTo('dashboard');
        }catch(\Exception $e){
            $this->logger->error($e->getMessage());
        }
     
       
    }

    public function edit($id){
        $postService = $this->container->get(PostsService::class);
        try{
            $post=$postService->getPostUserById($this->user->id, $id);
            $this->viewManager->renderTemplate('edit-post.view.html', ['post'=>$post]); 
        }catch(\Exception $e){
            $this->logger->error($e->getmessage());
        }
    }

    public function update($id){
        $postService =$this->container->get(PostsService::class);
        try{
         $post = $postService-> getPostUserById($this->user->id, $id);

        $title= $_POST['title'];
        $body= $_POST['body'];
        $post->title = $title;
         $post->body= $body;
        $postService->pullPostUserById($this->user->id, $post);
        $this->redirectTo('dashboard');
        }catch (\Exception $e){
            $this->logger->error($e->getMessage());
        }
    }
}