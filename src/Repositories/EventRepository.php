<?php

namespace Src\Repositories;

use PDO;

class EventRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create(int $clubId, string $title, string $description, string $date, string $location): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO events (club_id, title, description, event_date, location) 
             VALUES (:clubId, :title, :description, :date, :location)"
        );

        return $stmt->execute([
            'clubId' => $clubId,
            'title' => $title,
            'description' => $description,
            'date' => $date,
            'location' => $location
        ]);
    }

    public function getByClubId(int $clubId): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM events WHERE club_id = :clubId ORDER BY event_date DESC"
        );
        $stmt->execute(['clubId' => $clubId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFinishedEvents(int $clubId): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM events 
             WHERE club_id = :clubId AND event_date < NOW()
             ORDER BY event_date DESC"
        );
        $stmt->execute(['clubId' => $clubId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
