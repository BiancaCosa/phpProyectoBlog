<?php
namespace App\services;
use App\DoctrineManager;
use App\database\models\entities\Post;

class PostService{


private $doctrine;
    public function __construct(DoctrineManager $doctrine){
        $this->repository = $doctrine->em->getRepository(Post::class);
    }

    public function getPost(){
        return $this->repository->findAll();
    }

    public function getPostsByIdUser(int $id){
        return $this->repository->findByIdUSer($id);
    }
}
