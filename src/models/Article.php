<?php

namespace Src\models;

class Article
{
    private int $id;
    private int $clubId;
    private int $eventId;
    private string $title;
    private string $content;
    private string $createdAt;

    public function __construct(int $clubId, int $eventId, string $title, string $content, ?string $createdAt = null, ?int $id = null)
    {
        $this->id = $id ?? 0;
        $this->clubId = $clubId;
        $this->eventId = $eventId;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt ?? date('Y-m-d H:i:s');
    }

    public function getId(): int { return $this->id; }
    public function getClubId(): int { return $this->clubId; }
    public function getEventId(): int { return $this->eventId; }
    public function getTitle(): string { return $this->title; }
    public function getContent(): string { return $this->content; }
    public function getCreatedAt(): string { return $this->createdAt; }

    public function setId(int $id): void { $this->id = $id; }
}
