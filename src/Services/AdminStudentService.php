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


    public function getStudent($id)
    {
        if(!empty($id) || $id<=0){
            return null;
        }
        $user = $this->Userrepo->findById($id);
        return new \Src\models\User($user['name'],$user['email'],$user['password'], $user['role'], $user['id']);
    }


}