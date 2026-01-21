<?php
class UserRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = \Database::getConnection();
    }

    public function create($name, $email, $password, $role): int
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO users (name, email, password)
            VALUES (:name, :email, :password, :role)
        ");
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password_hash' => $password,
            'role' => $role,
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
}
