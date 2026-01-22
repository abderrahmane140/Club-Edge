<?php
use Src\core\Database;

class ClubRepository {
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    // Get all clubs
    public function getAll(): array {
        $query = "SELECT * FROM clubs ORDER BY created_at DESC";
        return $this->pdo->query($query)->fetchAll();
    }

    // Get club by ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM clubs WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Create a new club
    public function create($name, $description, $president_id = null): bool {
        $stmt = $this->pdo->prepare(
            "INSERT INTO clubs (name, description, president_id) 
             VALUES (:name, :description, :president_id)"
        );
        return $stmt->execute([
            'name' => $name,
            'description' => $description,
            'president_id' => $president_id
        ]);
    }

    // Update an existing club
    public function update($id, $name, $description, $president_id = null): bool {
        $stmt = $this->pdo->prepare(
            "UPDATE clubs 
             SET name = :name, description = :description, president_id = :president_id 
             WHERE id = :id"
        );
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'president_id' => $president_id
        ]);
    }

    // Delete a club
    public function delete($id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM clubs WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
