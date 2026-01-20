<?php

namespace  Src\controllers;
use Src\Services\AdminStudentService;

class AdminStudentController extends \src\core\Controller
{
    private $service;

    public function __construct()
    {
        $this->service= new AdminStudentService();
    }





    //afficher la liste des etudiants
    public function index()
    {
        $data= $this->service->getStudents();
        $this->view('admin/manageStudent.blade',$data);
    }



    //ban a student
    public function delete($id)
    {
        $this->service->deleteStd($id);
       $this->index();
    }


    //active a student status



    //update student info
    public function edit($id){

        $this->service->Userrepo->

    }

}