<?php

namespace Src\Controllers;

use src\Repositories\ClubRepository;
use src\Repositories\EventRepository;
use src\Repositories\ReviewRepository;
use src\Repositories\ArticleRepository;


class StudentController extends Controller {

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

    //  Tableau de bord étudiant
    public function dashboard()
    {
        return $this->render('student/dashboard');
    }

    //  Clubs

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

    
}
