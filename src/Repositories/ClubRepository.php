<?php

class ClubRepository {

    private Database $db;

    public function __construct(Database $database) {
        $this->db = $database;
    }

    public function getAll(): array {
        $sql = "SELECT * FROM clubs ORDER BY created_at DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?array {
        $sql = "SELECT * FROM clubs WHERE id = :id";
        $club = $this->db->query($sql, ['id' => $id])->fetch(PDO::FETCH_ASSOC);
        return $club ?: null;
    }

    public function create(string $name, ?string $description, ?int $president_id): bool {
        $sql = "
            INSERT INTO clubs (name, description, president_id)
            VALUES (:name, :description, :president_id)
        ";

        return $this->db->query($sql, [
            'name' => $name,
            'description' => $description,
            'president_id' => $president_id
        ]) !== false;
    }

    public function update(int $id, string $name, ?string $description, ?int $president_id): bool {
        $sql = "
            UPDATE clubs
            SET name = :name,
                description = :description,
                president_id = :president_id
            WHERE id = :id
        ";

        return $this->db->query($sql, [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'president_id' => $president_id
        ]) !== false;
    }

    public function delete(int $id): bool {
        $sql = "DELETE FROM clubs WHERE id = :id";
        return $this->db->query($sql, ['id' => $id]) !== false;
    }
}
