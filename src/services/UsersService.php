<?php
namespace App\services;
use App\models\entities\User;
use App\DoctrineManager;

class UserService{

    private $doctrine;
    public function __construct(DoctrineManager $doctrine){
        $this->doctrine = $doctrine;
    }

    public function getUserById(int $id):User{
        $em = $this->doctrine->em->getRepository(User::class);
        return $repository->find($id);
    }
}

