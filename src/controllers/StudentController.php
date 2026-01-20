<?php

namespace App\Controllers;

use App\Repositories\ClubRepository;
use App\Repositories\EventRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\ArticleRepository;
use App\Services\ClubService;
use App\Services\EventService;

class StudentController extends Controller
{
    private ClubRepository $clubRepository;
    private EventRepository $eventRepository;
    private ReviewRepository $reviewRepository;
    private ArticleRepository $articleRepository;
    private ClubService $clubService;
    private EventService $eventService;

    public function __construct()
    {
        $this->clubRepository    = new ClubRepository();
        $this->eventRepository   = new EventRepository();
        $this->reviewRepository  = new ReviewRepository();
        $this->articleRepository = new ArticleRepository();
        $this->clubService       = new ClubService();
        $this->eventService      = new EventService();
    }

    // 🔹 Tableau de bord étudiant
    public function dashboard()
    {
        return $this->render('student/dashboard');
    }

    // 🔹 Clubs

    // Liste des clubs
    public function listClubs()
    {
        $clubs = $this->clubRepository->getAll();
        return $this->render('student/clubs/index', compact('clubs'));
    }

    // Détails d’un club
    public function showClub(int $clubId)
    {
        $club = $this->clubRepository->findById($clubId);
        if (!$club) {
            return $this->redirect('/404');
        }
        return $this->render('student/clubs/show', compact('club'));
    }

    // S’inscrire à un club
    public function joinClub(int $clubId)
    {
        $studentId = $_SESSION['user_id'];
        try {
            $this->clubService->joinClub($studentId, $clubId);
            return $this->redirect('/student/dashboard');
        } catch (\Exception $e) {
            return $this->render('errors/error', ['message' => $e->getMessage()]);
        }
    }

    // 🔹 Événements

    // Liste des événements d’un club
    public function listEvents(int $clubId)
    {
        $events = $this->eventRepository->getByClub($clubId);
        return $this->render('student/events/index', compact('events'));
    }

    // Inscription à un événement
    public function registerEvent(int $eventId)
    {
        $studentId = $_SESSION['user_id'];
        try {
            $this->eventService->registerStudent($studentId, $eventId);
            return $this->redirect('/student/dashboard');
        } catch (\Exception $e) {
            return $this->render('errors/error', ['message' => $e->getMessage()]);
        }
    }

    // Laisser un avis et une note
    public function leaveReview(int $eventId)
    {
        $studentId = $_SESSION['user_id'];
        $rating    = $_POST['rating'] ?? null;
        $comment   = $_POST['comment'] ?? '';

        if (!$rating) {
            return $this->render('errors/error', ['message' => 'Veuillez donner une note']);
        }

        try {
            $this->reviewRepository->create($eventId, $studentId, $rating, $comment);
            return $this->redirect('/student/dashboard');
        } catch (\Exception $e) {
            return $this->render('errors/error', ['message' => $e->getMessage()]);
        }
    }

    // 🔹 Articles

    // Liste des articles d’un club
    public function listArticles(int $clubId)
    {
        $articles = $this->articleRepository->getByClub($clubId);
        return $this->render('student/articles/index', compact('articles'));
    }
}
