<?php

namespace Src\Repositories;

use PDO;
use Src\models\Article;

class ArticleRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create(int $clubId, int $eventId, string $title, string $content): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO articles (club_id, event_id, title, content) 
             VALUES (:clubId, :eventId, :title, :content)"
        );

        return $stmt->execute([
            'clubId' => $clubId,
            'eventId' => $eventId,
            'title' => $title,
            'content' => $content
        ]);
    }

    public function getByClubId(int $clubId): array
    {
        $stmt = $this->db->prepare(
            "SELECT a.*, e.title as event_title 
             FROM articles a
             JOIN events e ON a.event_id = e.id
             WHERE a.club_id = :clubId
             ORDER BY a.created_at DESC"
        );
        $stmt->execute(['clubId' => $clubId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function existsForEvent(int $eventId): bool
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM articles WHERE event_id = :eventId");
        $stmt->execute(['eventId' => $eventId]);
        return $stmt->fetchColumn() > 0;
    }
}
