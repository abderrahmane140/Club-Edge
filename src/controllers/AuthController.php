<?php
require __DIR__ . "/../models/Auth.php";
class AuthController{

    public function signup(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            var_dump($_POST);
            
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $hashPassword = password_hash($password, PASSWORD_DEFAULT);

            $newUser = new Auth();

            $newUser->insertInfo($fullName, $email, $hashPassword);

            echo "khdaaaam !!!!";
            
        } else {
            // Handle GET request - show the signup form
            require __DIR__ . "/../views/signup.blade.php";
        }
    }
}