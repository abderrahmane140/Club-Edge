<?php
namespace Src\Repositories;
use Src\core\Database;
class ReviewRepository{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function createReview($id_event, $id_student, $rating, $comment){
        $sql = "INSERT INTO reviews (event_id, student_id, rating, comment)
                VALUES (:event_id, :student_id, :rating, :comment)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':event_id' => $id_event,
            ':student_id' => $id_student,
            ':rating' => $rating,
            ':comment' => $comment
        ]);
    }
}