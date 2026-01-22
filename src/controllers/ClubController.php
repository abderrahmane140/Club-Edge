<?php

class ClubController extends Controller
{
    private $clubRepository;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->clubRepository = new ClubRepository($this->db);
    }

    public function adminPanel()
    {
        $clubs = $this->clubRepository->getAll();
        return $this->view('adminClubsPanel', ['clubs' => $clubs]);
    }

    public function index()
    {
        $clubs = $this->clubRepository->getAll();
        return $this->view('clubsPage', ['clubs' => $clubs]);
    }

    public function show($id)
    {
        $club = $this->clubRepository->getById($id);
        if (!$club) {
            return $this->json(['success' => false, 'message' => 'Club not found'], 404);
        }

        $events = [];
        $memberCount = 0;


        return $this->view('clubDetail', [
            'club' => $club,
            'events' => $events,
            'memberCount' => $memberCount
        ]);
    }

    public function current()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) return $this->json(['success' => false, 'message' => 'Club ID required']);

        $club = $this->clubRepository->getById($id);
        if (!$club) return $this->json(['success' => false, 'message' => 'Club not found']);

        return $this->json(['success' => true, 'data' => $club]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return $this->json(['success' => false, 'message' => 'Invalid request method']);

        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $president_id = $_POST['president_id'] ?? null;

        if (empty($name)) return $this->json(['success' => false, 'message' => 'Club name is required']);

        try {
            $result = $this->clubRepository->create($name, $description, $president_id);

            return $this->json(['success' => true,'message' => 'Club created successfully']);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return $this->json(['success' => false, 'message' => 'Invalid request method']);

        $id = $_POST['id'] ?? null;
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $president_id = $_POST['president_id'] ?? null;

        if (!$id || empty($name)) return $this->json(['success' => false, 'message' => 'Club ID and name are required']);

        $club = $this->clubRepository->getById($id);
        if (!$club) return $this->json(['success' => false, 'message' => 'Club not found']);

        try {
            $result = $this->clubRepository->update($id, $name, $description, $president_id);

            return $this->json(['success' => true,'message' => 'Club updated successfully']);
        } catch (\Exception $e) {
            return $this->json(['success' => false,'message'=>$e->getMessage()]);
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return $this->json(['success' => false, 'message' => 'Invalid request method']);

        $id = $_POST['id'] ?? null;
        if (!$id) return $this->json(['success' => false, 'message' => 'Club ID is required']);

        $club = $this->clubRepository->getById($id);
        if (!$club) return $this->json(['success' => false, 'message' => 'Club not found']);

        try {
            $this->clubRepository->delete($id);
            return $this->json(['success' => true, 'message' => 'Club deleted successfully']);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function join()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return $this->json(['success' => false, 'message' => 'Invalid request method']);

        $clubId = $_POST['club_id'] ?? null;
        $userId = $_SESSION['user_id'] ?? null;
        if (!$clubId || !$userId) return $this->json(['success' => false, 'message' => 'Club ID and User ID required']);

        try {
            $this->db->query(
                "INSERT INTO club_members (club_id, student_id) VALUES (:club_id, :student_id)",
                ['club_id' => $clubId, 'student_id' => $userId]
            );

            return $this->json(['success' => true,'message'=>'You have joined the club successfully']);
        } catch (\Exception $e) {
            return $this->json(['success' => false,'message'=>$e->getMessage()]);
        }
    }

    public function leave()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return $this->json(['success' => false, 'message' => 'Invalid request method']);

        $clubId = $_POST['club_id'] ?? null;
        $userId = $_SESSION['user_id'] ?? null;
        if (!$clubId || !$userId) return $this->json(['success' => false, 'message' => 'Club ID and User ID required']);

        try {
            // Remove user from club
            return $this->json(['success' => true,'message'=>'You have left the club']);
        } catch (\Exception $e) {
            return $this->json(['success' => false,'message'=>$e->getMessage()]);
        }
    }

    public function members($id)
    {
        $club = $this->clubRepository->getById($id);
        if (!$club) return $this->json(['success' => false, 'message' => 'Club not found']);

        try {
            $members = [];
            return $this->json(['success' => true,'data'=>$members]);
        } catch (\Exception $e) {
            return $this->json(['success' => false,'message'=>$e->getMessage()]);
        }
    }

    public function search()
    {
        $query = trim($_GET['q'] ?? '');
        if (empty($query)) return $this->json(['success' => false, 'message' => 'Search query required']);

        try {
           $clubs = [];
            return $this->json(['success' => true,'data'=>$clubs]);
        } catch (\Exception $e) {
            return $this->json(['success' => false,'message'=>$e->getMessage()]);
        }
    }
}
