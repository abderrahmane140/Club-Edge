<?php

namespace Src\Repositories;

use PDO;

class ClubRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM clubs ORDER BY created_at DESC";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM clubs WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(string $name, ?string $description = null, $president_id = null): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO clubs (name, description, president_id)
             VALUES (:name, :description, :president_id)"
        );

        return $stmt->execute([
            'name' => $name,
            'description' => $description,
            'president_id' => $president_id
        ]);
    }

    public function update(int $id, string $name, ?string $description = null, $president_id = null): bool
    {
        $stmt = $this->db->prepare(
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

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM clubs WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function addMember(int $clubId, int $studentId): bool
    {
        try {
            $this->db->beginTransaction();

            // Insert member
            $stmt = $this->db->prepare("INSERT INTO club_members (club_id, student_id) VALUES (:clubId, :studentId)");
            $stmt->execute(['clubId' => $clubId, 'studentId' => $studentId]);

            // Check if club has a president
            $checkStmt = $this->db->prepare("SELECT president_id FROM clubs WHERE id = :clubId");
            $checkStmt->execute(['clubId' => $clubId]);
            $club = $checkStmt->fetch(PDO::FETCH_ASSOC);

            // If no president, assign this user
            if (!$club['president_id']) {
                $updateStmt = $this->db->prepare("UPDATE clubs SET president_id = :studentId WHERE id = :clubId");
                $updateStmt->execute(['studentId' => $studentId, 'clubId' => $clubId]);
            }

            $this->db->commit();
            return true;
        } catch (\PDOException $e) {
            $this->db->rollBack();
            // Likely duplicate entry or constraint violation
            return false;
        }
    }

    public function getMembers(int $clubId): array
    {
        $stmt = $this->db->prepare(
            "SELECT u.id, u.name, u.email, u.role
             FROM users u
             JOIN club_members cm ON u.id = cm.student_id
             WHERE cm.club_id = :clubId"
        );
        $stmt->execute(['clubId' => $clubId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isMember(int $userId, int $clubId): bool
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM club_members WHERE student_id = :userId AND club_id = :clubId");
        $stmt->execute(['userId' => $userId, 'clubId' => $clubId]);
        return $stmt->fetchColumn() > 0;
    }

    public function getUserClub(int $userId)
    {
        $stmt = $this->db->prepare(
            "SELECT c.* 
             FROM clubs c
             JOIN club_members cm ON c.id = cm.club_id
             WHERE cm.student_id = :userId"
        );
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
