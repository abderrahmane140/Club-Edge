<?php
namespace Src\controllers;

use Src\core\Controller;
use Src\Repositories\ClubRepository;
use Src\core\Database;

class ClubController extends Controller
{
    public function index()
    {
        $this->view('home/home');
    }

    public function club()
    {
        // $database = new Database();
        $clubRepo = new ClubRepository(Database::getConnection());
        $data = $clubRepo->getAll();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $userName = $_SESSION['user']['name'] ?? 'Invité'; // Default if not logged in (though should be for this page)

        $this->view('club/club', ['data' => $data, 'userName' => $userName]);
    }

    public function test(){
        echo "hhhhhh";
    }

    public function details() {
        if (!isset($_GET['idClub'])) {
            header('Location: /club');
            exit;
        }
        $id = $_GET['idClub'];
        $clubRepo = new ClubRepository(Database::getConnection());
        
        $club = $clubRepo->getById($id); 

        // Check is member and get current club
        if (session_status() === PHP_SESSION_NONE) {
             session_start();
        }
        $isMember = false;
        $userClub = null;
        if (isset($_SESSION['user'])) {
             $isMember = $clubRepo->isMember($_SESSION['user']['id'], $id);
             $userClub = $clubRepo->getUserClub($_SESSION['user']['id']);
        }
        
        $this->view('club/detailsClub', ['club' => $club, 'isMember' => $isMember, 'userClub' => $userClub]);
    }

    public function join() {
        // Redundant with confirmPresence but kep for routing
         $this->confirmPresence();
    }

    public function confirmPresence() {
         if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
             header('Location: /login');
             exit;
        }
        
        if (!isset($_POST['idClub'])) {
             header('Location: /club');
             exit;
        }

        $clubId = $_POST['idClub'];
        $userId = $_SESSION['user']['id'];

        $clubRepo = new ClubRepository(Database::getConnection());
        $success = $clubRepo->addMember($clubId, $userId);

        // Redirect back with success/error ? 
        // For now just redirect
         header('Location: /myClub');
    }

    public function myClub() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
             header('Location: /login');
             exit;
        }

        $userId = $_SESSION['user']['id'];
        $clubRepo = new ClubRepository(Database::getConnection());
        $userClub = $clubRepo->getUserClub($userId);

        if (!$userClub) {
            // Check if user is a president (might be linked directly in clubs table)
            // Or maybe getUserClub already handles it?
            // Assuming getUserClub joins on members, but president is NOT ALWAYS in members table depending on implementation.
            // Let's check if he is a president of any club
            $stmt = Database::getConnection()->prepare("SELECT * FROM clubs WHERE president_id = :userId");
            $stmt->execute(['userId' => $userId]);
            $presidentClub = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($presidentClub) {
               $userClub = $presidentClub;
            } else {
                 header('Location: /club');
                 exit;
            }
        }
        
        // CHECK IF PRESIDENT
        if ($userClub['president_id'] == $userId) {
             header('Location: /president');
             exit;
        }

        // STUDENT VIEW
        $members = $clubRepo->getMembers($userClub['id']);
        
        // Fetch Articles
        $articleRepo = new \Src\Repositories\ArticleRepository(Database::getConnection());
        $articles = $articleRepo->getByClubId($userClub['id']);

        $this->view('club/myClub', ['club' => $userClub, 'members' => $members, 'articles' => $articles]);
    }

    public function presidentDashboard() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
             header('Location: /login');
             exit;
        }

        $userId = $_SESSION['user']['id'];
        
        // Get Club where user is president
        $stmt = Database::getConnection()->prepare("SELECT * FROM clubs WHERE president_id = :userId");
        $stmt->execute(['userId' => $userId]);
        $club = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$club) {
             // Not a president
             header('Location: /myClub');
             exit;
        }

        $clubRepo = new ClubRepository(Database::getConnection());
        $members = $clubRepo->getMembers($club['id']);
        
        $eventRepo = new \Src\Repositories\EventRepository(Database::getConnection());
        $finishedEvents = $eventRepo->getFinishedEvents($club['id']);
        
        // Filter events that already have articles
        $articleRepo = new \Src\Repositories\ArticleRepository(Database::getConnection());
        $pendingEvents = [];
        foreach($finishedEvents as $event) {
            if (!$articleRepo->existsForEvent($event['id'])) {
                $pendingEvents[] = $event;
            }
        }

        $this->view('president/President', [
            'club' => $club, 
            'members' => $members, 
            'pendingEvents' => $pendingEvents
        ]);
    }

    public function createEvent() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;
        
        $userId = $_SESSION['user']['id'];
        
        // Verify President
        $stmt = Database::getConnection()->prepare("SELECT id FROM clubs WHERE president_id = :userId");
        $stmt->execute(['userId' => $userId]);
        $clubId = $stmt->fetchColumn();

        if (!$clubId) die("Unauthorized");

        $title = $_POST['title'];
        $date = $_POST['date'];
        $location = $_POST['location'];
        $description = $_POST['description'];

        $eventRepo = new \Src\Repositories\EventRepository(Database::getConnection());
        $eventRepo->create($clubId, $title, $description, $date, $location);

        header('Location: /president');
        exit;
    }

    public function createArticle() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

        $userId = $_SESSION['user']['id'];
        
        // Verify President
        $stmt = Database::getConnection()->prepare("SELECT id FROM clubs WHERE president_id = :userId");
        $stmt->execute(['userId' => $userId]);
        $clubId = $stmt->fetchColumn();

        if (!$clubId) die("Unauthorized");

        $eventId = $_POST['event_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $articleRepo = new \Src\Repositories\ArticleRepository(Database::getConnection());
        $articleRepo->create($clubId, $eventId, $title, $content);

        header('Location: /president');
        exit;
    }
}
