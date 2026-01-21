<?php

namespace Src\Services;
use Src\models\User;

class AdminstudentService
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


    public function updateStudent(User $User)
    {
        if($User->getName() == null){
            die('name is not set');
        }
        $this->Userrepo->updateName($User->getName());
    }


}