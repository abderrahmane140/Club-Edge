<?php

namespace Src\Controllers;

use Src\Repositories\ClubRepository;
use Src\Repositories\EventRepository;
use Src\Repositories\ReviewRepository;
use Src\Repositories\ArticleRepository;
use Src\Services\ClubService;
use Src\Services\EventService;

class StudentController extends Controller{

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

    // Dashboard étudiant
    public function dashboard()
    {
        return $this->view('');
    }

    // Liste des clubs
    public function listClubs()
    {
        $clubs = $this->clubRepository->getAll();
        return $this->view('club/club.blade', compact('clubs'));
    }

    // Détails d’un club

    public function showClub(int $clubId)
    {
        $club = $this->clubRepository->getById($clubId);

        if (!$club) {
            return $this->redirect('/404');
        }

        return $this->view('club/detailsClub.blade', compact('club'));
    }

    // S’inscrire à un club

    public function joinClub(int $clubId)
    {
        $studentId = $_SESSION['user_id'];

        try {
            $this->clubService->joinClub($studentId, $clubId);

            return $this->redirect('/club/myClub.blade');

        } catch (\Exception $e) {
            return $this->view('errors/error', ['message' => $e->getMessage()]);
        }
    }


    // Liste des événements d’un club
    public function listEvents(int $clubId){

        $events = $this->eventRepository->getByClub($clubId);
        return $this->view('club/myClub.blade', compact('events'));
    }

    // Inscription à un événement
    public function registerEvent(int $eventId)
    {
        $studentId = $_SESSION['user_id'];

        try {
            $this->eventService->registerStudent($studentId, $eventId);
            return $this->redirect('club/myClub.blade');

        } catch (\Exception $e) {
            return $this->view('errors/error', ['message' => $e->getMessage()]);
        }
    }

    // Laisser un avis
    public function leaveReview(int $eventId)
    {
        $studentId = $_SESSION['user_id'];
        $rating    = $_POST['rating'] ?? null;
        $comment   = $_POST['comment'] ?? '';

        if (!$rating) {
            return $this->view('errors/error', [
                'message' => 'Veuillez donner une note'
            ]);
        }

        try {
            $this->reviewRepository->createReview(
                $eventId,
                $studentId,
                $rating,
                $comment
            );

            return $this->redirect('events/events.blade');

        } catch (\Exception $e) {
            return $this->view('errors/error', ['message' => $e->getMessage()]);
        }
    } 

    // Liste des articles d’un club
    public function listArticles(int $clubId) {
        
        $articles = $this->articleRepository->getByClub($clubId);
        return $this->view('club/myClub.blade', compact('articles'));
    }

    // Les Events d'un Club
    public function getByClub(int $clubId): array
    {
        
    }

   
}

