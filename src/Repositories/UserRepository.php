<?php

namespace Src\Repositories;
use Src\core\Database;
use Src\models\User;
use PDO;

class UserRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function create($name, $email, $password, $role): int
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO users (name, email, password, role)
            VALUES (:name, :email, :password, :role)
            RETURNING id
        ");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role,
        ]);

        return (int) $stmt->fetchColumn();
    }

    public function findByEmail(string $email): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ?: null;
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ?: null;
    }


    public function getAllStudents()
    {
        $query = "select * from users where role != 'admin' ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function deleteUser($id): bool
    {
        // First, untie the user from any club they lead (set president_id to NULL)
        $stmtPrep = $this->pdo->prepare("UPDATE clubs SET president_id = NULL WHERE president_id = :id");
        $stmtPrep->execute([':id' => $id]);

        // Then delete the user
        $query = 'delete from users where id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id',$id);
        return $stmt->execute();
    }

    public function updateName($name)
    {
        $query = " update users set name=:name ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':name',$name);
        $stmt->execute();
    }


}