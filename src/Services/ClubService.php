<?php



class ClubService {
    private $clubRepository;

    public function __construct(ClubRepository $clubRepository) {
        $this->clubRepository = $clubRepository;
    }

   
    public function getAllClubs() {
        try {
            return $this->clubRepository->getAll();
        } catch (Exception $e) {
            throw new Exception("Error fetching clubs: " . $e->getMessage());
        }
    }

  
    public function getClubById($id) {
        try {
            if (empty($id)) {
                throw new Exception("Club ID is required");
            }
            return $this->clubRepository->getById($id);
        } catch (Exception $e) {
            throw new Exception("Error fetching club: " . $e->getMessage());
        }
    }

 
    public function createClub($name, $description = null, $president_id = null) {
        try {
            if (empty($name)) {
                throw new Exception("Club name is required");
            }

           
            if (strlen($name) > 150) {
                throw new Exception("Club name must not exceed 150 characters");
            }

            return $this->clubRepository->create($name, $description, $president_id);
        } catch (Exception $e) {
            throw new Exception("Error creating club: " . $e->getMessage());
        }
    }

   
    public function updateClub($id, $name, $description = null, $president_id = null) {
        try {
            if (empty($id)) {
                throw new Exception("Club ID is required");
            }

            if (empty($name)) {
                throw new Exception("Club name is required");
            }

            if (strlen($name) > 150) {
                throw new Exception("Club name must not exceed 150 characters");
            }

          
            $club = $this->clubRepository->getById($id);
            if (!$club) {
                throw new Exception("Club not found");
            }

            return $this->clubRepository->update($id, $name, $description, $president_id);
        } catch (Exception $e) {
            throw new Exception("Error updating club: " . $e->getMessage());
        }
    }

   
    public function deleteClub($id) {
        try {
            if (empty($id)) {
                throw new Exception("Club ID is required");
            }

            $club = $this->clubRepository->getById($id);
            if (!$club) {
                throw new Exception("Club not found");
            }

            return $this->clubRepository->delete($id);
        } catch (Exception $e) {
            throw new Exception("Error deleting club: " . $e->getMessage());
        }
    }

   
    public function clubExists($id) {
        try {
            $club = $this->clubRepository->getById($id);
            return $club !== null && !empty($club);
        } catch (Exception $e) {
            return false;
        }
    }

   
    public function countClubs() {
        try {
            $clubs = $this->clubRepository->getAll();
            return count($clubs) ?? 0;
        } catch (Exception $e) {
            throw new Exception("Error counting clubs: " . $e->getMessage());
        }
    }

   

    public function joinClub(int $studentId, int $clubId): void {

        
        if ($this->clubRepository->studentHasClub($studentId)) {
            throw new Exception("Vous êtes déjà inscrit dans un club.");
        }

        $memberCount = $this->clubRepository->countMembers($clubId);
        if ($memberCount >= 8) {
            throw new Exception("Ce club a atteint le nombre maximum de membres.");
        }

        $this->clubRepository->addMember($clubId, $studentId);

        if ($memberCount === 0) {
            $this->clubRepository->setPresident($clubId, $studentId);
            $this->userRepository->changeRole($studentId, 'president');
        }
    }
}
