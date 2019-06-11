<?php
namespace App\services;
use App\DoctrineManager;
use App\models\entities\Post;

class PostsService{

private $repository;
private $doctrine;

    public function __construct(DoctrineManager $doctrine){
        $this->doctrine = $doctrine;
        $this->repository = $doctrine->em->getRepository(Post::class);
    }

    public function getPosts(){
        return $this->repository->findAll();
    }

    public function getPostsByIdUser(int $id){
        return $this->repository->findByIdUSer($id);
    }

    public function deletePostUserById(int $idUser, int $idPost){
        $post = $this->repository->find($idPost);
        if (!$post) throw new \Exception("El post no existe.");
        if ($post->idUser !== $idUser) throw new \Exception("El ususario no tiene permisos.");
        $this->doctrine->em->remove($post);
        $this->doctrine->em->flush();
    }

    public function getPostUserById(int $idUSer, int $idPost):Post {
        $post=$this->repository->find($idPost);
        if(!$post) throw new \Exception("El post no existe.");
        if ($post->idUser !== $idUser) throw new \Exception("El ususario no tiene permisos.");
        return $post;
    }

    public function pullPostUserById(int $idUSer, Post $post):Post{
        if ($post->idUSer !== $idUSer) throw new \Exception("El ususario no tiene permisos.");
        $this->doctrine->em->merge($post);
        $this->doctrine->em->flush();
        return $post;
    }
}
