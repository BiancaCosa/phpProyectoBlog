<?php
namespace App\controllers;
use  App\DoctrineManager;
use App\models\entities\User;
use Kint;

class RegisterController extends Controller
{
    public function index()
    {
       $this->viewManager->renderTemplate("register.view.html");
    }
    public function register(DoctrineManager $doctrine)
    {
        $name = $_POST['name'];
        $email= $_POST['email'];
        $password = $_POST['passwd'];
       
        $user = new User();
        $user->name = $name;
        $user->email= $email;
        $user->password = sha1($password);
        $doctrine->em->persist($user);
        $doctrine->em->flush();
        
    }
}