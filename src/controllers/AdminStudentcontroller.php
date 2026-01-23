<?php

namespace Src\controllers;
use Src\models\User;
use Src\Services\AdminstudentService;
class AdminStudentcontroller extends \Src\core\Controller
{
    private $service;

    public function __construct()

    {
        $this->service= new AdminstudentService();
    }





    //afficher la liste des etudiants
    public function index()
    {
        $data= $this->service->getStudents();
        $this->view('admin/manageStudent', ['data' => $data]);
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
    $user = $this->service->getStudent($id);
    $data['student']= $user;
    $this->view('admin/visualiseProfile',$data);// blade here
    }


    public function update()
    {
        //SANITIZE POST DATA or empty
        echo "amine";
        // ?? means if first value is null intialise with empty array .
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? [];
        $User = new User($_POST['name'],$_POST['email'],$_POST['password'],$_POST['role'],$_POST['id']);
        $this->service->updateStudent($User);
        $data['student']=$User;
        $this->view('admin/visualiseProfile',$data); //blade here
    }

}