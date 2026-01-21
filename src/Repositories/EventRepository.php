<?php

namespace Src\Repositories;

use PDO;
use Src\Models\Event;
use Src\Core\Database;

class EventRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    // CREATE
    public function create(Event $event): bool
    {
        $sql = "INSERT INTO events (titre, bio, date, lieu, img)
                VALUES (:titre, :bio, :date, :lieu, :img)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'titre' => $event->getTitre(),
            'bio'   => $event->getBio(),
            'date'  => $event->getDate(),
            'lieu'  => $event->getLieu(),
            'img'   => $event->getImg(),
        ]);
    }

    // GET ALL
    public function findAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM events ORDER BY date DESC");

        $events = [];
        while ($row = $stmt->fetch()) {
            $events[] = new Event(
                $row['titre'],
                $row['bio'],
                $row['date'],
                $row['lieu'],
                $row['img'],
                $row['id']
            );
        }

        return $events;
    }

    // READ ONE
    public function findById(int $id): ?Event
    {
        $stmt = $this->db->prepare("SELECT * FROM events WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Event(
            $row['titre'],
            $row['bio'],
            $row['date'],
            $row['lieu'],
            $row['img'],
            $row['id']
        );
    }

    // UPDATE
    public function update(Event $event): bool
    {
        $sql = "UPDATE events SET
                    titre = :titre,
                    bio = :bio,
                    date = :date,
                    lieu = :lieu,
                    img = :img
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'titre' => $event->getTitre(),
            'bio'   => $event->getBio(),
            'date'  => $event->getDate(),
            'lieu'  => $event->getLieu(),
            'img'   => $event->getImg(),
            'id'    => $event->getId(),
        ]);
    }

    // DELETE
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM events WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
