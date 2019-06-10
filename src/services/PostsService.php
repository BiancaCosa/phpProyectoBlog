<?php
namespace App\services;
use App\DoctrineManager;
use App\database\models\entities\Post;
use Kint;

class PostService{


private $doctrine;
    public function __construct(DoctrineManager $doctrine){
        $this->doctrine = $doctrine;
    }

    public function getPost(){
        $em = $this->doctrine->em->getRepository(Post::class);
        return $repository->findAll();
    }
}
