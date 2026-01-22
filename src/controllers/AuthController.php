<?php
// app/Controllers/AuthController.php

require_once __DIR__ . '/../Repositories/UserRepository.php';

use Src\core\Controller;

class AuthController extends Controller
{
    public function register()
    {
        // require __DIR__ . "/../views/auth/signup.blade.php";
        $this->view('auth/signup.blade');
        // $instance = new Src\core\Controller;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // var_dump($_POST);
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


        // header('Location: /login');
        // exit;
    }

    public function login()
{
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        $this->view('auth/login.blade');
        return;
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        die("Tous les champs sont obligatoires");
    }

    $repo = new UserRepository();
    $user = $repo->findByEmail($email);

    if (!$user) {
        die("Compte introuvable");
    }

    if (!password_verify($password, $user['password'])) {
        die("Mot de passe incorrect");
    }

    $_SESSION['user'] = [
        'id'    => $user['id'],
        'name'  => $user['nom'] ?? $user['name'] ?? '',
        'email' => $user['email'],
        'role'  => $user['role']
    ];

    $role = strtolower(trim($user['role'] ?? ''));

    if ($role === "student") {
        header("Location: /club");
        exit;
    } elseif ($role === "admin") {
        header("Location: /admin");
        exit;
    }

    header("Location: /");
    exit;
}

}
