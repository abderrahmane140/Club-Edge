<?php

class User
{
    private ?int $id = null;
    private string $name;
    private string $email;
    private string $passwordHash;
    private string $role;

    public function __construct(
        string $name,
        string $email,
        string $passwordHash,
        string $role = 'student'
    ) {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPasswordHash($passwordHash);
        $this->setRole($role);
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function getRole(): string
    {
        return $this->role;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        if (strlen($name) < 2) {
            throw new InvalidArgumentException("Le nom doit contenir au moins 2 caractères");
        }
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Email invalide");
        }
        $this->email = strtolower($email);
    }

    public function setPasswordHash(string $passwordHash): void
    {
        if ($passwordHash === '') {
            throw new InvalidArgumentException("Mot de passe invalide");
        }
        $this->passwordHash = $passwordHash;
    }

    public function setRole(string $role): void
    {
        $allowed = ['student', 'coach', 'admin'];
        if (!in_array($role, $allowed)) {
            throw new InvalidArgumentException("Rôle invalide");
        }
        $this->role = $role;
    }
}
