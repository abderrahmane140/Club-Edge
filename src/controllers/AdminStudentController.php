<?php

namespace  Src\controllers;

use Src\core\Controller;

class AdminStudentController extends Controller
{


    //afficher la liste des etudiants
    public function index()
    {
        $this->view('admin/manageStudent');
    }



    //ban a student
    public function ban()
    {

    }


    //active a student status

    public function unban()
    {

    }

    //update student info
    public function update(){

    }

}