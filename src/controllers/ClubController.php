<?php
namespace Src\controllers;

use Src\core\Controller;
use Src\Repositories\ClubRepository;

class ClubController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../views/home/home.blade.php';
    }

    public function club()
    {
        // $database = new Database();
        $clubRepo = new ClubRepository();
        $data = $clubRepo->getAll();

        require __DIR__ . '/../views/club/club.blade.php';
    }
}
