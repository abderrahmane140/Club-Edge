<?php

use Src\core\Controller;
class AdminController extends Controller
{
    public function index()
    {
        $this->view('admin/manageStudent');
    }
}