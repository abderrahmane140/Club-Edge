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
    public function delete()
    {
        $id = $_POST['std_id'] ?: null;
        $this->service->deleteStd($id);
       $this->index();
       exit();
    }


    //active a student status



    //visualise student info
    public function edit($id){
        if($user = $this->service->getStudent($id)){
            $data['student']= $user;
            $this->view('admin/visualiseProfile.blade.php',$data);
        } else {
            $this->index();
        }
    }


    public function update()
    {
        if () //method post updati dkxi ( id deja fl form dw )
    }

}