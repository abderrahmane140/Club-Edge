<?php
// app/Controllers/AuthController.php

require_once __DIR__ . '/../../src/repositories/UserRepository.php';
use Src\core\Controller;
class AuthController extends Controller
{
    public function register()
    {
        // require __DIR__ . "/../views/auth/signup.blade.php";
        $this->view('signup.blade');
        // $instance = new Src\core\Controller;
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $name     = $_POST['fullName'] ?? null;
            $email    = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $role = "student";
    
            if (!isset($name) || !$email || !$password) {
                die('Tous les champs sont obligatoires');
            }
    
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
            $repo = new UserRepository();
            $repo->create($name, $email, $hashedPassword, $role);
        }


        // header('Location: /');
        // exit;
    }
}
