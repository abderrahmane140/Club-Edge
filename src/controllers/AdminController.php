<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../Services/ClubService.php';
require_once __DIR__ . '/../Repositories/ClubRepository.php';
require_once __DIR__ . '/../models/Club.php';

class AdminController extends Controller {
    private $clubService;

    public function __construct() {
        $database = new Database();
        $this->clubService = new ClubService(new ClubRepository($database));
    }

    public function currentClub() {
        try {
            if (!isset($_GET['id'])) {
                return json_encode(['success' => false, 'message' => 'Club ID is required']);
            }

            $clubId = $_GET['id'];
            $club = $this->clubService->getClubById($clubId);

            if (!$club) {
                return json_encode(['success' => false, 'message' => 'Club not found']);
            }

            return json_encode(['success' => true, 'data' => $club]);
        } catch (Exception $e) {
            return json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

 
    public function deleteClub() {
        try {
            if (!isset($_POST['id'])) {
                return json_encode(['success' => false, 'message' => 'Club ID is required']);
            }

            $clubId = $_POST['id'];
            $this->clubService->deleteClub($clubId);

            return json_encode(['success' => true, 'message' => 'Club deleted successfully']);
        } catch (Exception $e) {
            return json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

 
    public function editClub() {
        try {
            if (!isset($_POST['id']) || !isset($_POST['name'])) {
                return json_encode(['success' => false, 'message' => 'Club ID and name are required']);
            }

            $clubId = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'] ?? null;
            $president_id = $_POST['president_id'] ?? null;

            $this->clubService->updateClub($clubId, $name, $description, $president_id);

            return json_encode(['success' => true, 'message' => 'Club updated successfully']);
        } catch (Exception $e) {
            return json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }


    public function createClub() {
        try {
            if (!isset($_POST['name'])) {
                return json_encode(['success' => false, 'message' => 'Club name is required']);
            }

            $name = $_POST['name'];
            $description = $_POST['description'] ?? null;
            $president_id = $_POST['president_id'] ?? null;

            $this->clubService->createClub($name, $description, $president_id);

            return json_encode(['success' => true, 'message' => 'Club created successfully']);
        } catch (Exception $e) {
            return json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

 
    public function getAllClubs() {
        try {
            $clubs = $this->clubService->getAllClubs();
            return json_encode(['success' => true, 'data' => $clubs]);
        } catch (Exception $e) {
            return json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
