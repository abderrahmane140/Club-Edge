<?php

namespace Src\Repositories;

use Src\core\Database;

class ClubRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM clubs ORDER BY created_at DESC";
        return $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM clubs WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }


    public function create($name, $description, $president_id = null)
    {
        $stmt = $this->db->prepare("
        INSERT INTO clubs (name, description, president_id)
        VALUES (:name, :description, :president_id)
    ");

        return $stmt->execute([
            'name' => $name,
            'description' => $description,
            'president_id' => $president_id
        ]);
    }


    public function update($id, $name, $description, $president_id = null)
    {
        $stmt = $this->db->prepare("
        UPDATE clubs
        SET name = :name,
            description = :description,
            president_id = :president_id
        WHERE id = :id
    ");

        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'president_id' => $president_id
        ]);
    }


    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM clubs WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }


    public function countMembers(int $clubId): int
    {

        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM club_members WHERE club_id = :club_id"
        );
        $stmt->execute(['club_id' => $clubId]);
        return (int)$stmt->fetchColumn();
    }


    public function studentHasClub(int $studentId): bool
    {

        $stmt = $this->db->prepare(
            "SELECT 1 FROM club_members WHERE student_id = :student_id"
        );
        $stmt->execute(['student_id' => $studentId]);
        return (bool)$stmt->fetch();
    }

    public function addMember(int $clubId, int $studentId): void
    {

        $stmt = $this->db->prepare(
            "INSERT INTO club_members (club_id, student_id)
             VALUES (:club_id, :student_id)"
        );
        $stmt->execute([
            'club_id' => $clubId,
            'student_id' => $studentId
        ]);
    }

    public function getClubByEvent(int $eventId): int
    {
        $stmt = $this->db->prepare(
            "SELECT club_id FROM events WHERE id = :id"
        );
        $stmt->execute(['id' => $eventId]);
        return (int)$stmt->fetchColumn();
    }

    public function registerStudent(int $eventId, int $studentId): void
    {
        $stmt = $this->db->prepare(
            "INSERT INTO event_participants (event_id, student_id)
             VALUES (:event_id, :student_id)"
        );
        $stmt->execute([
            'event_id' => $eventId,
            'student_id' => $studentId
        ]);
    }

    public function isStudentMemberOfClub(int $studentId, int $clubId): bool
    {

        $stmt = $this->db->prepare(
            "SELECT 1 FROM club_members 
             WHERE student_id = :student_id AND club_id = :club_id"
        );
        $stmt->execute(['student_id' => $studentId, 'club_id' => $clubId]);
        return (bool)$stmt->fetch();
    }
}
