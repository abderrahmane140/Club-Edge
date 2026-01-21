<?php
// require_once "../src/core/Database.php";
// require __DIR__ . "/../../src/core/Database.php";
// class Auth{

//     private $pdo;

//     public function __construct()
//     {
//         $this->pdo = Database::getConnection();
//     }


//     public function insertInfo($fullName, $email, $password){
//     try {
//         $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
//         $stmt = $this->pdo->prepare($sql);
//         $stmt->execute([
//             ':name' => $fullName,
//             ':email' => $email,
//             ':password' => $password,
//         ]);
//         return true;
//     } catch (PDOException $e) {
//         error_log("Database Error: " . $e->getMessage());
//         return false;
//     }
// }
// }