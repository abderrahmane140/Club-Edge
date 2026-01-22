<?php

class ClubService {

    private ClubRepository $clubRepository;

    public function __construct(ClubRepository $clubRepository) {
        $this->clubRepository = $clubRepository;
    }

    public function getAllClubs(): array {
        return $this->clubRepository->getAll();
    }

    public function getClubById(int $id): array {
        if ($id <= 0) {
            throw new Exception("Club ID is required");
        }

        $club = $this->clubRepository->getById($id);

        if (!$club) {
            throw new Exception("Club not found");
        }

        return $club;

        
    
    }

    public function createClub(
        string $name,
        ?string $description = null,
        ?int $president_id = null
    ): void {
        $this->validateName($name);

        if (!$this->clubRepository->create($name, $description, $president_id)) {
            throw new Exception("Failed to create club");
        }
    }

    public function updateClub(
        int $id,
        string $name,
        ?string $description = null,
        ?int $president_id = null
    ): void {
        if ($id <= 0) {
            throw new Exception("Club ID is required");
        }

        $this->validateName($name);

        if (!$this->clubRepository->getById($id)) {
            throw new Exception("Club not found");
        }

        if (!$this->clubRepository->update($id, $name, $description, $president_id)) {
            throw new Exception("Failed to update club");
        }
    }

    public function deleteClub(int $id): void {
        if ($id <= 0) {
            throw new Exception("Club ID is required");
        }

        if (!$this->clubRepository->getById($id)) {
            throw new Exception("Club not found");
        }

        if (!$this->clubRepository->delete($id)) {
            throw new Exception("Failed to delete club");
        }
    }

    public function countClubs(): int {
        return count($this->clubRepository->getAll());
    }

    /*  private helper */

    private function validateName(string $name): void {
        if (trim($name) === '') {
            throw new Exception("Club name is required");
        }

        if (mb_strlen($name) > 150) {
            throw new Exception("Club name must not exceed 150 characters");
        }
    }
}

















