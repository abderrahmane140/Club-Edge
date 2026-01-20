<?php

namespace Src\Repositories;
use Src\models\User;
use Src\core\Database;
class UserRepository
{
    private  $pdo;
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id ");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row ?: null;
    }


    public function getAllStudents()
    {
        $query = "select * from users where role != 'admin' ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }


    public function deleteUser($id): bool
    {
        $query = 'delete from users where id = :id';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id',$id);
        return $stmt->execute();
    }

    public function modifyStudent(User $user)
    {
        $query = "update users set name=:name, email=:email, password=:password, role=:role where id=:id ";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':name',$user->getName());
        $stmt->bindValue(':email',$user->getEmail());
        $stmt->bindValue(':password',$user->getPassword());
        $stmt->bindValue(':role',$user->getRole());
        $stmt->bindValue(':id',$user->getId());
        $stmt->execute();
    }


}