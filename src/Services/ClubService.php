<?php

namespace Src\Services;

use Exception;
use Src\Repositories\ClubRepository;

class ClubService
{
    private ClubRepository $clubRepository;

    public function __construct(ClubRepository $clubRepository)
    {
        $this->clubRepository = $clubRepository;
    }

    public function getAllClubs(): array
    {
        return $this->clubRepository->getAll();
    }

    public function getClubById($id)
    {
        if (empty($id)) {
            throw new Exception("Club ID is required");
        }

        return $this->clubRepository->getById((int)$id);
    }

    public function createClub($name, $description = null, $president_id = null): bool
    {
        if (empty($name)) {
            throw new Exception("Club name is required");
        }

        if (strlen($name) > 150) {
            throw new Exception("Club name must not exceed 150 characters");
        }

        return $this->clubRepository->create($name, $description, $president_id);
    }

    public function updateClub($id, $name, $description = null, $president_id = null): bool
    {
        if (empty($id)) {
            throw new Exception("Club ID is required");
        }

        if (empty($name)) {
            throw new Exception("Club name is required");
        }

        if (strlen($name) > 150) {
            throw new Exception("Club name must not exceed 150 characters");
        }

        $club = $this->clubRepository->getById((int)$id);
        if (!$club) {
            throw new Exception("Club not found");
        }

        return $this->clubRepository->update((int)$id, $name, $description, $president_id);
    }

    public function deleteClub($id): bool
    {
        if (empty($id)) {
            throw new Exception("Club ID is required");
        }

        $club = $this->clubRepository->getById((int)$id);
        if (!$club) {
            throw new Exception("Club not found");
        }

        return $this->clubRepository->delete((int)$id);
    }

    public function canCreate()
    {
       if( $this->clubRepository->getCount() <= 8 ){
           return true;
       }
       return false;
    }
}
