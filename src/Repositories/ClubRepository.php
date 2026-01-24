<?php

namespace Src\Repositories;
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

    // count Members 

    public function countMembers(int $clubId): int {

        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM club_members WHERE club_id = :club_id"
        );
        $stmt->execute(['club_id' => $clubId]);
        return (int)$stmt->fetchColumn();
    }
     

    public function studentHasClub(int $studentId): bool{

        $stmt = $this->db->prepare(
            "SELECT 1 FROM club_members WHERE student_id = :student_id"
        );
        $stmt->execute(['student_id' => $studentId]);
        return (bool)$stmt->fetch();
    }

    public function addMember(int $clubId, int $studentId): void{

        $stmt = $this->db->prepare(
            "INSERT INTO club_members (club_id, student_id)
             VALUES (:club_id, :student_id)"
        );
        $stmt->execute([
            'club_id' => $clubId,
            'student_id' => $studentId
        ]);
    }

    // les Clubs d'un event specifique 

    public function getClubByEvent(int $eventId): int {
        $stmt = $this->db->prepare(
            "SELECT club_id FROM events WHERE id = :id"
        );
        $stmt->execute(['id' => $eventId]);
        return (int)$stmt->fetchColumn();
    }

    public function registerStudent(int $eventId, int $studentId): void {
        $stmt = $this->db->prepare(
            "INSERT INTO event_participants (event_id, student_id)
             VALUES (:event_id, :student_id)"
        );
        $stmt->execute([
            'event_id' => $eventId,
            'student_id' => $studentId
        ]);
    }
    // checket if un members og club 

    public function isStudentMemberOfClub(int $studentId, int $clubId): bool {

        $stmt = $this->db->prepare(
            "SELECT 1 FROM club_members 
             WHERE student_id = :student_id AND club_id = :club_id"
        );
        $stmt->execute(['student_id' => $studentId,'club_id' => $clubId]);
        return (bool)$stmt->fetch();
    }


}
