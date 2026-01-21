<?php

namespace Src\Controllers;

use Src\core\Controller;
use Src\Repositories\EventRepository;
use Src\Models\Event;

class EventController extends Controller
{
    private EventRepository $repository;

    public function __construct()
    {
        $this->repository = new EventRepository();
    }

 
    public function index()
    {
        $events = $this->repository->findAll();
        $this->view('events/index.php');
    }


    public function show($id)
    {
        $event = $this->repository->findById((int)$id);

        if (!$event) {
            http_response_code(404);
            $this->view('errors/404.php');
            return;
        }

        $this->view('events/show.php');
    }

 
    public function create()
    {
        $this->view('events/create.php');
    }


    public function store()
    {
        $event = new Event(
            $_POST['titre'],
            $_POST['bio'],
            $_POST['date'],
            $_POST['lieu'],
            $_POST['img']
        );

        $this->repository->create($event);

        $this->redirect('events');
        exit;
    }

    public function edit($id)
    {
        $event = $this->repository->findById((int)$id);
        $this->view('events/edit.php');
    }


    public function update($id)
    {
        $event = new Event(
            $_POST['titre'],
            $_POST['bio'],
            $_POST['date'],
            $_POST['lieu'],
            $_POST['img'],
            (int)$id
        );

        $this->repository->update($event);

        $this->redirect('events');
        exit;
    }

    public function delete($id)
    {
        $this->repository->delete((int)$id);

        $this->redirect('events');
        exit;
    }

    public function getEventByClub(int $id){
        $event = $this->repository->getEventByClub((int)$id);
        $this->view('events',$event);
    }

    public function getUsersByEvent(int $eventId){
        $event = $this->repository->getUsersByEvent((int)$eventId);
        $this->view('events',$event);
    }
}

