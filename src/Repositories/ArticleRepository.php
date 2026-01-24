<?php
namespace Src\Repositories;
use PDO;
use Src\core\Database;
class ArticleRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }


    public function create(int $clubId, int $eventId, string $title, string $content): bool
    {
        $sql = "
            INSERT INTO articles (club_id, event_id, title, content)
            VALUES (:club_id, :event_id, :title, :content)
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'club_id' => $clubId,
            'event_id' => $eventId,
            'title'    => $title,
            'content'  => $content
        ]);
    }

 
    public function getAll(): array
    {
        $sql = "
            SELECT 
                a.id,
                a.title,
                a.content,
                a.created_at,
                c.name AS club_name,
                e.title AS event_title
            FROM articles a
            JOIN clubs c ON c.id = a.club_id
            JOIN events e ON e.id = a.event_id
            ORDER BY a.created_at DESC
        ";

        return $this->pdo->query($sql)->fetchAll();
    }
}
