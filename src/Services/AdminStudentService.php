<?php

namespace Src\Services;

class AdminStudentService
{
    public $Userrepo;
    public function __construct()
    {
        $this->Userrepo = new \Src\Repositories\UserRepository();
    }


    public function getStudents()
    {
      return  $this->Userrepo->getAllStudents();
    }


    public function deleteStd($id)
    {
        if($id<=0){
            exit();
        }
        $this->Userrepo->deleteUser($id);
    }
}